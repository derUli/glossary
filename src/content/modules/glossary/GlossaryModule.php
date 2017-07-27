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
                $output = Template::executeModuleTemplate($this->moduleName, "output/all.php");
                $html = str_replace($placeholder, $output, $html);
            }
        }
        
        preg_match_all("/\[term]([0-9]+)\[\/term]/", $html, $match);
        
        if (count($match) > 0) {
            for ($i = 0; $i < count($match[0]); $i ++) {
                $placeholder = $match[0][$i];
                $id = unhtmlspecialchars($match[1][$i]);
                ViewBag::set("term_id", $id);
                $output = Template::executeModuleTemplate($this->moduleName, "output/term.php");
                $html = str_replace($placeholder, $output, $html);
            }
        }
        preg_match_all("/\[terms\-by\-letter](.+)\[\/terms\-by\-letter]/", $html, $match);
        
        if (count($match) > 0) {
            for ($i = 0; $i < count($match[0]); $i ++) {
                $placeholder = $match[0][$i];
                $value = unhtmlspecialchars($match[1][$i]);
                $splitted = explode(",", $value);
                ViewBag::set("glossary_id", trim(intval($splitted[0])));
                ViewBag::set("letter", trim(strtoupper($splitted[1])));
                $output = Template::executeModuleTemplate($this->moduleName, "output/terms-by-letter.php");
                $html = str_replace($placeholder, $output, $html);
            }
        }
        return $html;
    }
}