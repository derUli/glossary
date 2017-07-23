<?php

class Term extends Model
{

    private $title = null;

    private $description = null;

    public function loadByID($id)
    {
        $sql = "select id, title from `{prefix}glossary_term` where id = ?";
        $args = array(
            intval($id)
        );
        $query = Database::pQuery($sql, $args, true);
        $single = Database::fetchSingle($query);
        $this->fillVars($single);
    }

    protected function fillVars($result = null)
    {
        if ($result == null) {
            $this->title = null;
            $this->setID(null);
        } else {
            $this->title = $result->title;
            $this->setID($result->id);
        }
    }

    protected function insert()
    {
        $sql = "INSERT INTO `{prefix}glossary_term` (title, description) values (?, ?)";
        $args = array(
            $this->getTitle(),
            $this->getDescription()
        );
        $query = Database::pQuery($sql, $args, true);
        $this->setID(Database::getLastInsertID());
    }

    protected function update()
    {
        $sql = "update `{prefix}glossary_term` set title = ?, description = ? where id = ?";
        $args = array(
            $this->getTitle(),
            $this->getDescription(),
            $this->getID()
        );
        Database::pQuery($sql, $args, true);
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($val)
    {
        $this->title = is_string($val) ? $val : null;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($val)
    {
        $this->description = is_string($val) ? $val : null;
    }

    public function delete()
    {
        $sql = "delete from `{prefix}glossary_term` where id = ?";
        $args = array(
            $this->getID()
        );
        Database::pQuery($sql, $args, true);
        $this->fillVars();
    }

    public static function getAll($order = "title")
    {
        $sql = "select id from `{prefix}glossary_term` order by $order";
        $query = Database::query($sql, true);
        $result = array();
        while ($row = Database::fetchObject($query)) {
            $result[] = new Term($row->id);
        }
        return $result;
    }

    public static function getAllByGlossaryId($glossaryId, $order = "title")
    {
        $sql = "select id from `{prefix}glossary_term` where glossary_id = ? order by $order";
        $args = array(
            intval($glossaryId)
        );
        $query = Database::pQuery($sql, $args, true);
        $result = array();
        while ($row = Database::fetchObject($query)) {
            $result[] = new Term($row->id);
        }
        return $result;
    }
}