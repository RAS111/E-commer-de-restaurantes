<?php

	require_once "../../class/MySQL.php";

    $sql = "SELECT i.id_item, i.nombre, SUM(dp.cantidad) AS cantidad, i.precio
            FROM factura
            INNER JOIN detallepedido AS dp ON dp.id_pedido = factura.id_pedido
            INNER JOIN item AS i ON i.id_item = dp.id_item
            GROUP BY i.nombre
            ORDER BY cantidad DESC LIMIT 5";
        
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);



?>




	<table class="data-table table nowrap">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Cantidad</th>
				<th>Precio</th>
			</tr>
		</thead>
		<tbody>
			
			<?php while($row = $datos->fetch_assoc()): ?>
                <tr>
               	<td><?php echo $row['id_item'] ?></td>
                <td><?php echo $row['nombre'] ?></td>
                <td><?php echo $row['cantidad'] ?></td>
                <td>$<?php echo $row['precio'] ?></td>
                </tr>
            <?php endwhile ?>
       	</tbody>
	</table>
