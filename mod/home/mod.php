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
				<th>myKeyRI<th>
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
					<table class="tooltip">
					<?php foreach ($portal['tooltip_keys'] as $item): ?>
						<tr>
							<td class="name"><?php echo $item['nickname']; ?></td>
							<td class="number"><?php echo $item['keys']; ?></td>
						</tr>
					<?php endforeach; ?>
					</table>
				<?php endif; ?></td>				
				<td class="grades"><span><?php echo empty($portal['grades']) ? '0': $portal['grades']; ?></span></td>
				<td class="hidden"><?php if (count($portal['tooltip_grades']) > 0): ?>
					<table class="tooltip">
					<?php foreach ($portal['tooltip_grades'] as $item): ?>
						<tr>
							<td class="name"><?php echo $item['nickname']; ?></td>
							<td class="number"><?php echo $item['grade']; ?></td>
						</tr>
					<?php endforeach; ?>
					</table>
				<?php endif; ?></td>
				<td>
					<table class="actions">
						<tr><td colspan="3">Clés</td></tr>
						<tr>
							<td>-</td>
							<td>0</td>
							<td>+</td>
						</tr>	
						<tr><td colspan="3">Intêret</td></tr>
						<tr>
							<td>-</td>
							<td>0</td>
							<td>+</td>
						</tr>						
					</table>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>		
	</table>
</div>