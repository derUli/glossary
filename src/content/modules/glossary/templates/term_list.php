<?php
$acl = new ACL();
if ($acl->hasPermission(getModuleMeta("glossary", "admin_permission"))) {
    ?><?php

    $id = Request::getVar("id", "int");
    if (! $id) {
        Request::javascriptRedirect(ModuleHelper::buildAdminURL("glossary"));
    }
    $data = new Glossary($id);
    ?>
<h1><?php translate("terms_of_x", array("%title%" => Template::getEscape($data->getTitle())));?></h1>
<p>
	<a href="<?php echo ModuleHelper::buildAdminURL("glossary");?>"
		class="btn btn-default"><?php translate("back");?></a>
</p>
<p>Not implemented yet</p>
<?php
} else {
    noperms();
}
?>