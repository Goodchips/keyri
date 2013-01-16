<div id='home'>
	<?php $portals = Webapp::getPortals($db_link); ?>
	<table id="datatable">
		<thead>
			<tr>
				<th>id</th>
				<th>Ville</th>
				<th>Nom</th>
				<th>Image</th>
				<th>Clés</th>
				<th class="hidden">tooltip_keys</th>
				<th>Intérêt</th>
				<th class="hidden">tooltip_grades</th>
				<th>@<th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($portals as $portal): ?>
			<tr>
				<td><?php echo $portal['id']; ?></td>
				<td><?php echo $portal['city']; ?></td>
				<td><?php echo $portal['name']; ?></td>
				<td><img src="<?php echo $portal['img']; ?>" width="120" /></td>
				<td class="keys"><span><?php echo empty($portal['keys']) ? '0': $portal['keys']; ?></span></td>
				<td class="hidden"><?php if (count($portal['tooltip_keys']) > 0): ?>
					<?php print_r($portal['tooltip_keys']); ?>
				<?php endif; ?></td>				
				<td class="grades"><span><?php echo empty($portal['grades']) ? '0': $portal['grades']; ?></span></td>
				<td class="hidden"><?php if (count($portal['tooltip_grades']) > 0): ?>
					<?php print_r($portal['tooltip_grades']); ?>
				<?php endif; ?></td>
				<td>K<br/>-&nbsp;X&nbsp;+<br/><br/>G<br/>-&nbsp;Y&nbsp;+</td>
			</tr>
			<?php endforeach; ?>
		</tbody>		
	</table>
</div>