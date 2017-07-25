<?php

class GlossaryModule extends Controller
{

    private $moduleName = "glossary";

    public function getSettingsHeadline()
    {
        return get_translation("glossary");
    }

    public function getSettingsLinkText()
    {
        return get_translation("edit");
    }

    public function settings()
    {
        return Template::executeModuleTemplate($this->moduleName, "glossary/list.php");
    }
}