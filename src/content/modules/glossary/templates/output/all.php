<?php
$glossary_id = ViewBag::get("glossary_id");
if ($glossary_id) {
    $glossary = new Glossary(intval($glossary_id));
    $letters = Term::getAllFirstLetters();
    ?>
<ul>
    <?php foreach ($letters as $letter){?>
<li><a
		href="#glossary-<?php echo $glossary_id;?>-<?php Template::escape($letter);?>"><?php Template::escape($letter);?></a></li>
	
	
<?php }?>
</ul>
<?php foreach ($letters as $letter){?>
<a
	id="glossary-<?php echo $glossary_id;?>-<?php Template::escape($letter);?>"
	href=""></a>
<h2><?php Template::escape($letter);?></h2>
<?php
        $terms = Term::getAllByFirstLetter($letter);
        ?>
<?php foreach($terms as $term){?>
<p>
	<strong><?php Template::escape($term->getTitle())?></strong> <?php Template::escape($term->getDescription());?></p>
<?php }?>
<?php
    }
}