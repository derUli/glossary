<?php
$acl = new ACL();
if ($acl->hasPermission(getModuleMeta("glossary", "admin_permission"))) {
    ?><?php

    $id = Request::getVar("id", null, "int");
    if (! $id) {
        Request::javascriptRedirect(ModuleHelper::buildAdminURL("glossary"));
    }
    $data = new Glossary($id);
    ?>
<h1><?php translate("edit_glossary");?></h1>
<p>
	<a href="<?php echo ModuleHelper::buildAdminURL("glossary");?>"
		class="btn btn-default"><?php translate("back");?></a>
</p>
<?php echo ModuleHelper::buildMethodCallForm("GlossaryController", "update");?>
<p>
	<strong><?php translate("title")?></strong> <br /> <input type="text"
		name="title" value="<?php Template::escape($data->getTitle());?>"
		required>
</p>
<input type="hidden" name="id" value="<?php echo $id;?>">
<p>
	<input type="submit" value="<?php translate("save");?>">
</p>
</form>
<?php
} else {
    noperms();
}
?>