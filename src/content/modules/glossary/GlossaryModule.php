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

    public function contentFilter($html)
    {
        preg_match_all("/\[glossary]([0-9]+)\[\/glossary]/", $html, $match);
        
        if (count($match) > 0) {
            for ($i = 0; $i < count($match[0]); $i ++) {
                $placeholder = $match[0][$i];
                $id = unhtmlspecialchars($match[1][$i]);
                ViewBag::set("glossary_id", $id);
                $html = Template::executeModuleTemplate($this->moduleName, "output/all.php");
                $html = str_replace($placeholder, $html, $html);
            }
        }
        return $html;
    }
}