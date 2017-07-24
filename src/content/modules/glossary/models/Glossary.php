<?php

class Glossary extends Model
{

    private $title = null;

    public function loadByID($id)
    {
        $sql = "select id, title from `{prefix}glossary` where id = ?";
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
            $this->setID(intval($result->id));
        }
    }

    protected function insert()
    {
        $sql = "INSERT INTO `{prefix}glossary` (title) values (?)";
        $args = array(
            $this->getTitle()
        );
        $query = Database::pQuery($sql, $args, true);
        $this->setID(Database::getLastInsertID());
    }

    protected function update()
    {
        $sql = "update `{prefix}glossary` set title = ? where id = ?";
        $args = array(
            $this->getTitle(),
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

    public function delete()
    {
        $sql = "delete from `{prefix}glossary` where id = ?";
        $args = array(
            $this->getID()
        );
        Database::pQuery($sql, $args, true);
        $this->fillVars();
    }

    public static function getAll($order = "title")
    {
        $sql = "select id from `{prefix}glossary` order by $order";
        $query = Database::query($sql, true);
        $result = array();
        while ($row = Database::fetchObject($query)) {
            $result[] = new Glossary($row->id);
        }
        return $result;
    }

    public function getTerms()
    {
        if ($this->getID() === null) {
            return null;
        }
        return Term::getAllByGlossaryId($this->getID());
    }
}