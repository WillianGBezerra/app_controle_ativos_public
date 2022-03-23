<?php foreach($estados as $indice => $estado):  ?>
	<tr>
		<div class="col-sm-1" id="<?= $estado->id ?>">
			<td><?= $estado->estado ?></td>
		</div>
	</tr>
<?php endforeach; ?>