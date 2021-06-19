<?php 
	$id = array();
	$i = 0;
	foreach ($rows as $key => $cols) {
		foreach ($cols as $key => $value) {
			if($key == 'id'){
				$id[$i] = $value;
				$i++;
			}
		}
	}
	$i = 0;
?>

<section class="tablecontainer">
	<table class="">
	<thead>
		<tr>
		<?php
		foreach ($headers as $key => $value) {//Por cada título en el arreglo creamos una columna
			?>
			<th scope="col"><?=$value?></th>
			<?php
		}
		?>
			<th scope="col"> Acciones </th>
		</tr>
	</thead>
	<tbody>
	<?php
		foreach ($rows as $key => $cols) { //Por cada elemento en $rows creamos una fila. Rows contiene 1 objeto por usuario (el objeto se compone de un arreglo indexado)
		?>
		<tr>
		<?php
			foreach ($cols as $key => $col) {//Accedemos a los valores que tiene almacenado cada fila uno a uno
			?>
				<td scope="col"><?=$col?></td><!--Agregamos ese valor a la fila correspondiente-->
			<?php
			}
			?>
			<td>
				<a class='btn-modificar' href="<?=BASE_DIR?>Usuario/showEdit&id=<?= $id[$i] ?>">Edit</a>
				<a class='btn-eliminar' href="<?=BASE_DIR?>Usuario/delete&id=<?= $id[$i] ?>">Delete</a>
			</td>
		</tr>
		<?php
		$i++;
		}
		?>

	</tbody>
	</table>
</section>