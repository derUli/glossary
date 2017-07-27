<?php
$term_id = ViewBag::get("term_id");
if ($term_id) {
    $term = new Term($term_id);
    ?>
<p>
	<strong><?php Template::escape($term->getTitle());?></strong> <?php Template::escape($term->getDescription());?></p>
<?php }