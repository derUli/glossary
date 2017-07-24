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

    public function update()
    {
        $id = Request::getVar("id", "int");
        $title = Request::getVar("title");
        if ($id) {
            $glossary = new Glossary($id);
            $glossary->setTitle($title);
            $glossary->save();
        }
        Request::redirect(ModuleHelper::buildAdminURL($this->moduleName));
    }

    public function delete()
    {
        $id = Request::getVar("id", "int");
        if ($id) {
            $glossary = new Glossary($id);
            $glossary->delete();
        }
        Request::redirect(ModuleHelper::buildAdminURL($this->moduleName));
    }
}
