<?php
$acl = new ACL();
if ($acl->hasPermission(getModuleMeta("glossary", "admin_permission"))) {
    ?>
<h1><?php translate("create_new_glossary");?></h1>
<p>
	<a href="<?php echo ModuleHelper::buildAdminURL("glossary");?>"
		class="btn btn-default"><?php translate("back");?></a>
</p>
<?php echo ModuleHelper::buildMethodCallForm("GlossaryController", "create");?>
<p>
	<strong><?php translate("title")?></strong> <br /> <input type="text"
		name="title" value="" required>
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