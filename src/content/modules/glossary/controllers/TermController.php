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
}