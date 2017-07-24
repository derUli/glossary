<?php

class GlossaryController extends Controller
{

    private $moduleName = "glossary";

    public function create()
    {
        $title = Request::getVar("title");
        if ($title) {
            $glossary = new Glossary();
            $glossary->setTitle($title);
            $glossary->save();
        }
        Request::redirect(ModuleHelper::buildAdminURL($this->moduleName));
    }
}
