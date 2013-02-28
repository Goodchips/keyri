<div id='home'>
	<?php $portals = Webapp::getPortalsWithUserInfo($db_link); ?>
	<table id="datatable">
		<thead>
			<tr>
				<th>id</th>
				<th>Ville</th>
				<th>Nom</th>
				<th>Image</th>
				<th>Clés</th>
				<th>tooltip_keys</th>
				<th>Intérêt</th>
				<th>tooltip_grades</th>
				<th><?php echo $_SESSION['user']['nickname'] ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($portals as $portal): ?>
			<tr class="row">
				<td class="hidden"><?php echo $portal['id']; ?></td>
				<td><?php echo $portal['city']; ?></td>
				<td><?php echo $portal['name']; ?></td>
				<td><img src="<?php echo $portal['img']; ?>"/></td>
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
							<td><input type="button" class="button-keys-minus" value="-" /></td>
							<td>
								<input type="button" class="button-keys" value="<?php echo $portal['user_keys']; ?>" />
								<input type="text" maxlength="2" class="text-keys" value="<?php echo $portal['user_keys']; ?>" />
							</td>
							<td><input type="button" class="button-keys-plus" value="+" /></td>
						</tr>	
						<tr><td colspan="3">Intêret</td></tr>
						<tr>
							<td><input type="button" class="button-grade-minus" value="-" /></td>
							<td>
								<input type="button" class="button-grade" value="<?php echo $portal['user_grade']; ?>" />
								<input type="text" maxlength="2" class="text-grade" value="<?php echo $portal['user_grade']; ?>" />
							</td>
							<td><input type="button" class="button-grade-plus" value="+" /></td>
						</tr>						
					</table>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>		
	</table>
</div>