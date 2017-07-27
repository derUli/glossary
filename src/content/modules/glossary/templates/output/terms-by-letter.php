<?php
$glossary_id = ViewBag::get("glossary_id");
$letter = ViewBag::get("letter");
if ($glossary_id) {
    
        $terms = Term::getAllbyGlossaryAndFirstLetter($glossary_id, $letter);
        ?>
<?php foreach($terms as $term){?>
<p>
	<strong><?php Template::escape($term->getTitle())?></strong> <?php Template::escape($term->getDescription());?></p>
<?php }

        }?>