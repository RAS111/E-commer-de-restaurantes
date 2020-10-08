<?php

require_once '../../class/Pedido.php';
require_once '../../class/Item.php';
require_once '../../class/Menu.php';
require_once '../../class/Producto.php';
require_once '../../class/Cliente.php';

$listadoPedido = Pedido::obtenerTodos();
$listadoItem = Item::obtenerTodos();
$listadoMenu = Menu::obtenerTodos();
$listadoProducto = Producto::obtenerPorRubro();
$listadoCliente = Cliente::obtenerTodos();

?>
<!DOCTYPE html>
<html>
	<?php include_once('../../head.php');?>

<body>

	<?php require_once '../../menu.php';?>
	<?php require_once "../../header.php"; ?>
	<?php require_once "../../sidebar.php"; ?>
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<h4 class="text-black h4">Registrar Pedido</h4>
					</div>	
					<hr>	
					<div class="wizard-content">
						<form class="tab-wizard wizard-circle wizard" name="frmDatos" id="frmDatos" >
							<section>
								<div class="row">
									<div class="col-md-4" >
										<div class="form-group ">
											<label>Cliente </label>
											<select name="cboCliente" id="cboCliente"  class="custom-select2 form-control">
												<option value="0">Seleccionar</option>
												<?php foreach ($listadoCliente as $cliente): ?>

													<option value="<?php echo $cliente->getIdCliente(); ?>">
														<?php echo $cliente; ?>
													</option>

												<?php endforeach ?>
											</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Fecha</label>
											<input type="date" name="txtFecha" id="txtFecha" class="form-control date-picker" placeholder="Seleccionar Fecha de Nacimiento">
										</div>
									</div>
									<div class="col-md-4" >
										<div class="form-group ">
											<label>Tipo de envio </label>
											<select name="cboTipoEnvio" id="cboTipoEnvio"  class="custom-select form-control">
												<option value="0">Seleccionar</option>
												<option value="Local">Local</option>
												<option value="Retiro en local">Retiro en Local</option>
												<option value="Delivery">Delivery</option>
											</select>
										</div>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-md-6 col-sm-12 mb-30">
										<div class="btn-list">
											<button type="button" class="btn" data-bgcolor="#007bb5" data-color="#ffffff" onclick="abrirListaMenu();">
												Ver Menu
											</button>
											<button type="button" class="btn" data-bgcolor="#007bb5" data-color="#ffffff" onclick="abrirListaProductos();">
												Ver Bebidas
											</button>
										</div>	
									</div>	
								</div>
								<table id="id_detalle_venta" class="data-table table stripe hover nowrap">
									<thead>
										<tr>
											<th class="table-plus datatable-nosort">ID</th>
											<th>Menu</th>
											<th>Cantidad</th>
											<th>Precio Unitario</th>
											<th>Subtotal</th>
											<th class="datatable-nosort">Action</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td>
												
											</td>
										</tr>
									</tbody>
								</table>
								<div class="row row-cols-2">
									<div class="col">
										<p class="lead">Totales</p>
										<div class="table-responsive">
											<table class="table table-sm">
												<tbody>
													<tr>
														<th class="w-50">Total:</th>
														<td id="id_total">$0.0</td>
													</tr>
													<tr>
														<th>Pago</th>
														<td><input id="id_pago" type="text" class="form-control"></td>
													</tr>
													<tr>
														<th>Vuelto:</th>
														<td id="id_vuelto">$0.0</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</section>
							<input type="button" onclick="guardarFormVentas();" class="btn btn-success" value="Guardar">	
							<!--para validaciones con js<input type="button" value="Guardar" onclick="validarDatos();">-->			
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal lista de productos -->
    <div class="modal fade" id="id_lista_menu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Menu</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<table class="table table-striped table-sm" id="id_tabla_productos">
						<thead>
							<tr>
							<th>ID</th>
							<th>Nombre</th>
							<th>precio</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($listadoMenu as $menu): ?>
							<tr onclick="setCantidadProducto('<?=$menu->getIdItem();?>', '<?=$menu->getNombre();?>', '<?=$menu->getPrecio()?>');">
								<td><?=$menu->getIdItem();?></td>
								<td><?=$menu->getNombre();?></td>
								<td>$<?=$menu->getPrecio();?></td>
							</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button"  class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				</div>
            </div>
        </div>
    </div>
	 <!-- Modal lista de productos -->

	 <!-- Modal lista de productos -->
    <div class="modal fade" id="id_lista_productos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Bebidas</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<table class="table table-striped table-sm" id="id_tabla_productos">
						<thead>
							<tr>
							<th>ID</th>
							<th>Nombre</th>	
							<th>Stock</th>
							<th>precio</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($listadoProducto as $producto): ?>
								<tr onclick="setCantidadProducto('<?=$producto->getIdItem();?>', '<?=$producto->getNombre();?>','<?=$producto->getPrecio()?>' ,'<?=$producto->getStockActual()?>');">
									<td><?=$producto->getIdItem();?></td>
									<td><?=$producto->getNombre();?></td>
									<td><?=$producto->getStockActual();?></td>
									<td>$<?=$producto->getPrecio();?></td>	
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button"  class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				</div>
            </div>
        </div>
    </div>
	 <!-- Modal lista de productos -->
			 

	<?php include_once('../../file_js.php');?>
	
<script>

var total = 0.0;
var vuelto = 0.0;
var detalle_ventas = [];
var indice = 0;

function abrirListaMenu(){
    $('#id_lista_menu').modal('show');
}
function abrirListaProductos(){
    $('#id_lista_productos').modal('show');
}

function setCantidadProducto(id, nombre, precio, stock){
    
    let cantidad = parseInt(prompt('Ingrese la cantidad'));
    
    if (cantidad == null || cantidad == 0){
		return false;
	} else if(isNaN(cantidad)){
		return false;
	}

	if (cantidad > stock) {
		alert("No hay stock suficiente");
		return;
	}

    let subtotal = calcularSubtotal(cantidad, precio);
    let items = {};

    items['id_item'] = id;
    items['precio'] = precio;
    items['cantidad'] = cantidad;
    
    detalle_ventas.push(items);

    $('#id_detalle_venta tr:last').before('<tr id=' + indice + ' ><td >' + id + '</td><td>' + nombre + '</td><td>' + cantidad + '</td><td>' + '$' + precio + '</td><td>' + '$' + + subtotal + '</td><td> 	<a class="dropdown-item"><i class="dw dw-delete-3" onclick="eliminarArticulo(' + indice + ');"></i></a></td></tr>')
    indice += 1;
}

function calcularSubtotal(cantidad, precio){
    let resultado = parseFloat(cantidad) * parseFloat(precio);
    total += resultado; //acumula cantidad
    $('#id_total').text('$' + total);
    return resultado;
}

$('#id_pago').on('keypress',function(e) {
    if(e.which == 13) {
    	e.preventDefault();
        calcularVuelto();
    }
});

function calcularVuelto(){
    let valor_pago = $('#id_pago').val();
    let resultado =  valor_pago - total;
    $('#id_vuelto').text('$' + resultado);
}

function restarSubtotal(cantidad, precio){
    let resultado = parseFloat(cantidad) * parseFloat(precio);
    total -= resultado; //restar cantidad
    $('#id_total').text('$' + total);
    return resultado;
}

/*------------
eliminar de la tabla
---------*/

function eliminarArticulo(i){
    $('#' + i).remove(); // removemos de la tabla
    restarSubtotal(detalle_ventas[i].cantidad, detalle_ventas[i].precio);
    detalle_ventas.splice(i, 1); // quita un elemento del array
}


/*------------
eliminar de la tabla
---------*/

/*------------------
 guardar formulario
----------------*/
function guardarFormVentas(){

	let fecha = $('#txtFecha').val();
	let cliente = $('#cboCliente').val();
	let tipoEnvio = $('#cboTipoEnvio').val();

    if (detalle_ventas.length > 0){
        $.ajax({
            type: 'post',
            url: 'procesar/guardar.php',
            data: {
            	'fecha': fecha,
            	'cliente': cliente,
            	'tipoEnvio': tipoEnvio,
                'items': detalle_ventas
            },
           	success: function(data){
               window.location.href = '../pedidos/listado.php?mensaje=1';
            }
        })
    }else{
    	alert("error");
        //$('#id_message_validacion').show(); // esto imprime un mensaje de error
    }
}
/*------------------
 guardar formulario
----------------*/

</script>

	
</body>
</html>

