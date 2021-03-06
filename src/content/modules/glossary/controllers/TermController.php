<?php

class TermController extends Controller
{

    private $moduleName = "glossary";

    public function create()
    {
        $glossary_id = Request::getVar("glossary_id", null, "int");
        $title = Request::getVar("title");
        $description = Request::getVar("description");
        if ($title and $description and $glossary_id) {
            $term = new Term();
            $term->setGlossaryID(intval($glossary_id));
            $term->setTitle($title);
            $term->setDescription($description);
            $term->save();
        }
        
        Request::redirect(ModuleHelper::buildActionURL("term_list", "id=" . $glossary_id));
    }

    public function update()
    {
        $id = Request::getVar("id", "int");
        $title = Request::getVar("title");
        $description = Request::getVar("description");
        $glossary_id = null;
        if ($id) {
            $term = new Term($id);
            $term->setTitle($title);
            $term->setDescription($description);
            $term->save();
            $glossary_id = $term->getGlossaryID();
        }
        Request::redirect(ModuleHelper::buildActionURL("term_list", "id=" . $glossary_id));
    }

    public function delete()
    {
        $glossary_id = null;
        $id = Request::getVar("id", null, "int");
        if ($id) {
            $term = new Term(intval($id));
            
            $glossary_id = $term->getGlossaryID();
            $term->delete();
        }
        var_dump($term);
        Request::redirect(ModuleHelper::buildActionURL("term_list", "id=" . $glossary_id));
    }
}