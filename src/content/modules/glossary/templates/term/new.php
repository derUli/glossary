<?php
$acl = new ACL();
if ($acl->hasPermission(getModuleMeta("glossary", "admin_permission"))) {
    $id = Request::getVar("glossary_id", null, "int");
    if (! $id) {
        Request::javascriptRedirect(ModuleHelper::buildAdminURL("glossary"));
    }
    
    ?>
<h1><?php translate("create_new_term");?></h1>
<p>
	<a
		href="<?php echo ModuleHelper::buildActionURL("term_list", "id=".$id);?>"
		class="btn btn-default"><?php translate("back");?></a>
</p>
<?php echo ModuleHelper::buildMethodCallForm("TermController", "create");?>
<input type="hidden" name="glossary_id"
	value="<?php echo $id;?>">
<p>
	<strong><?php translate("title")?></strong> <br /> <input type="text"
		name="title" value="" required>
</p>
<p>
	<strong><?php translate("description")?></strong> <br />
	<textarea name="description" required></textarea>
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