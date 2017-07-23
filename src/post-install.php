<?php
$migrator = new DBMigrator("module/glossary", ModuleHelper::buildModuleRessourcePath("glossary", "sql/up"));
$migrator->migrate();