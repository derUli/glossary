<?php
$acl = new ACL();
if ($acl->hasPermission(getModuleMeta("glossary", "admin_permission"))) {
    $id = Request::getVar("id", null, "int");
    if (! $id) {
        Request::javascriptRedirect(ModuleHelper::buildAdminURL("glossary"));
    }
    
    $term = new Term($id);
    ?>
<h1><?php translate("edit_term");?></h1>
<p>
	<a
		href="<?php echo ModuleHelper::buildActionURL("term_list", "id=".$term->getGlossaryID());?>"
		class="btn btn-default"><?php translate("back");?></a>
</p>
<?php echo ModuleHelper::buildMethodCallForm("TermController", "update", array("id"=>$id));?>
<p>
	<strong><?php translate("title")?></strong> <br /> <input type="text"
		name="title" value="<?php Template::escape($term->getTitle());?>"
		required>
</p>
<p>
	<strong><?php translate("description")?></strong> <br />
	<textarea name="description" required><?php Template::escape($term->getDescription());?></textarea>
</p>
<p>
	<input type="submit" value="<?php translate("save");?>">
</p>
</form>
<?php
} else {
    noperms();
}
?>