<?php
$acl = new ACL();
if ($acl->hasPermission(getModuleMeta("glossary", "admin_permission"))) {
    ?><?php

    $id = Request::getVar("id", null, "int");
    if (! $id) {
        Request::javascriptRedirect(ModuleHelper::buildAdminURL("glossary"));
    }
    $data = new Glossary($id);
    $terms = Term::getAllByGlossaryId(intval($id));
    ?>
<h1><?php translate("terms_of_x", array("%title%" => Template::getEscape($data->getTitle())));?></h1>

<div class="row">
	<div class="col-xs-6">
		<a href="<?php echo ModuleHelper::buildAdminURL("glossary");?>"
			class="btn btn-default"><?php translate("back");?></a>
	</div>
	<div class="col-xs-6 text-right">
		<a
			href="<?php echo ModuleHelper::buildActionURL("term_new", "glossary_id=".$id);?>"
			class="btn btn-default"><?php translate("new");?></a>
	</div>
</div>
<table class="tablesorter">
	<thead>
		<tr>
			<th><?php translate("title");?></th>
			<th><?php translate("description");?></th>
			<td></td>
			<td></td>
		</tr>
	</thead>
	<tbody>
		</a>
		</td>
	<?php foreach($terms as $term){?>
	<tr>
			<td><?php Template::escape($term->getTitle());?></td>
			<td><?php Template::escape($term->getDescription());?></td>
			<td class="text-center"><a
				href="<?php echo ModuleHelper::buildActionURL("term_edit", "id=".$term->getID());?>">
					<img src="gfx/edit.png" alt="<?php translate("edit");?>"
					title="<?php translate("edit");?>">
			</a></td>
			<td class="text-center"><?php echo ModuleHelper::buildMethodCallForm("TermController", "delete", array("id" => $term->getID()));?>
			<input type="image" src="gfx/delete.gif"
				alt="<?php translate("delete")?>"
				title="<?php translate("delete")?>">
				</form></td>
		</tr>
	<?php }?>
	</tbody>
</table>

<?php
} else {
    noperms();
}
?>