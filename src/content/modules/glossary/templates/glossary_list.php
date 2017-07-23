<?php
$glossaries = Glossary::getAll();
?>
<table>
	<thead>
		<tr>
			<th>Titel</th>
			<td><strong><?php translate("view");?></strong></td>
			<td><strong><?php translate("edit");?></strong></td>
			<td><strong><?php translate("delete");?></strong></td>
		</tr>
	</thead>
	<tbody>
	<?php foreach($glossaries as $glossary){?>
	<tr>
			<td><?php Template::escape($glossary->getTitle());?></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	<?php }?>
	</tbody>
</table>