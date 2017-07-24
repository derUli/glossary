<?php
$glossaries = Glossary::getAll();
?>
<p>
	<a href="<?php echo ModuleHelper::buildActionURL("glossary_new");?>"
		class="btn btn-default"><?php translate("new");?></a>
</p>
<table class="tablesorter">
	<thead>
		<tr>
			<th>Titel</th>
			<td><strong><?php translate("code_to_embed");?></strong></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</thead>
	<tbody>
		</a>
		</td>
	<?php foreach($glossaries as $glossary){?>
	<tr>
			<td><?php Template::escape($glossary->getTitle());?></td>
			<td><input type="text"
				value="[glossary]<?php echo $glossary->getID();?>[/glossary]"
				readonly onclick="this.select();"></td>
			<td></td>
			<td><a
				href="<?php echo ModuleHelper::buildActionURL("glossary_edit", "id=".$glossary->getID());?>">
					<img src="gfx/edit.png" alt="<?php translate("edit");?>"
					title="<?php translate("edit");?>">
			</a></td>
			<td></td>
		</tr>
	<?php }?>
	</tbody>
</table>