<?php

require_once '../../class/Compra.php';
require_once '../../class/Producto.php';
require_once '../../class/Proveedor.php';
require_once '../../class/FormaPago.php';

$listadoCompra = Compra::obtenerTodos();
$listadoProducto = Producto::obtenerTodos();
$listadoProveedor = Proveedor::obtenerTodos();
$listadoFormaPago = FormaPago::obtenerTodos();

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
						<h4 class="text-black h4">Registrar Compra</h4>
					</div>	
					<hr>	
					<div class="wizard-content">
						<form class="tab-wizard wizard-circle wizard" name="frmDatos" id="frmDatos" >
							<section>
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label>Fecha</label>
											<input type="date" name="txtFecha" id="txtFecha" class="form-control date-picker" placeholder="Seleccionar Fecha de Nacimiento" value="<?php echo date("Y-m-d");?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>N° de Compra</label>
											<input type="text" name="txtNumero" id="txtNumero" class="form-control">
										</div>
									</div>
									
									<div class="col-md-3" >
										<div class="form-group ">
											<label>Proveedor </label>
											<select name="cboProveedor" id="cboProveedor"  class="custom-select2 form-control">
												<option value="0">Seleccionar</option>
												<?php foreach ($listadoProveedor as $proveedor): ?>

													<option value="<?php echo $proveedor->getIdProveedor(); ?>">
														<?php echo $proveedor; ?>
													</option>

												<?php endforeach ?>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Forma de pago </label>
											<select name="cboFormaPago" id="cboFormaPago" class="custom-select form-control">
												<option value="0">Seleccionar</option>
												<?php foreach ($listadoFormaPago as $formaPago): ?>

													<option value="<?php echo $formaPago->getIdFormaPago(); ?>">
														<?php echo $formaPago; ?>
													</option>
												<?php endforeach ?>
											</select>
										</div>
									</div>
								</div>
								
								<hr>
								<div class="row">
									<div class="col-md-6 col-sm-12 mb-30">
										<div class="btn-list">
											<button type="button" class="btn" data-bgcolor="#007bb5" data-color="#ffffff" onclick="abrirListaProductos();">
												Ver Productos
											</button>
											<button type="button" class="btn btn-success" onclick="abrirProductos();">
												<i class="icon-copy dw dw-add"></i>
											</button>
										</div>	
									</div>	
								</div>
								<table id="id_detalle_venta" class="data-table table stripe hover nowrap">
									<thead>
										<tr>
											<th class="table-plus datatable-nosort">ID</th>
											<th>Nombre</th>
											<th>Cantidad</th>
											<th>Precio Unitario</th>
											<th>Subtotal</th>
											<th class="datatable-nosort">Accion</th>
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
								<div class="row">
									<div class="col-6 mt-3 pt-3"></div>
									<div class="col-6 mt-3 pt-3">
										<p class="lead">Monto a pagar</p>
										<div class="table-responsive">
											<table class="table table-sm">
												<tbody>
													<tr>
														<th class="w-50">Total:</th>
														<td id="id_total">$0.0</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Observacion</label>
											<textarea class="form-control" name="txtObservacion" id="txtObservacion"></textarea>
										</div>
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

	<!-- Modal Crear Productos -->
    <div class="modal fade" id="id_agregar_producto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Crear Producto</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php

				require_once '../../class/Rubro.php';

				$listadoRubro = Rubro::obtenerTodos();
				?>
				<form form class="tab-wizard wizard-circle wizard" name="frmDatos" id="frmDatos" method="POST" action="procesar/guardar_producto.php">
					<div class="select-role">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Nombre</label>
									<input type="text" name="txtNombre" id="txtNombre"  class="form-control">
								</div>
							</div>
							<div class="col-md-6" >
								<div class="form-group ">
									<label>Precio</label>
									<input type="text" name="txtPrecio" id="txtPrecio" class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Stock Minimo</label>
									<input type="text" name="txtStockMinimo" id="txtStockMinimo" class="form-control">
								</div>
							</div>
							<div class="col-md-6" >
								<div class="form-group ">
									<label>Stock Actual</label>
									<input type="text" name="txtStockActual" id="txtStockActual" class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Stock Maximo</label>
									<input type="text" name="txtStockMaximo" id="txtStockMaximo"  class="form-control">
								</div>
							</div>
							<div class="col-md-6" >
								<div class="form-group ">
									<label>Rubro </label>
									<select name="cboRubro" id="cboRubro"  class="custom-select form-control">
										<option value="0">Seleccionar</option>
										<?php foreach ($listadoRubro as $rubro): ?>

											<option value="<?php echo $rubro->getIdRubro(); ?>">
												<?php echo $rubro; ?>
											</option>

										<?php endforeach ?>
									</select>
								</div>
							</div>
						</div>
					</div>
				
				<div class="modal-footer">
					<button type="button"  class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<input type="submit" class="btn btn-success" value="Guardar" onclick="validarDatos();">
				</div>
				</form>
            </div>
        </div>
    </div>
	<!-- Modal Crear Productos -->
			 

	<!-- Modal lista de productos -->
    <div class="modal fade" id="id_lista_productos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Productos</h5>
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
								<tr onclick="setCantidadProducto('<?=$producto->getIdProducto();?>', '<?=$producto->getNombre();?>','<?=$producto->getPrecio()?>' ,'<?=$producto->getStockActual()?>');">
									<td><?=$producto->getIdProducto();?></td>
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

function abrirProductos(){
    $('#id_agregar_producto').modal('show');
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

    let subtotal = calcularSubtotal(cantidad, precio);
    let items = {};


    items['indice'] = indice;
    items['id'] = id;
    items['precio'] = precio;
    items['cantidad'] = cantidad;
    items['subtotal'] = subtotal;

    detalle_ventas.push(items);
    console.log(detalle_ventas);

    $('#id_detalle_venta tr:last').before('<tr id=' + indice + ' ><td >' + id + '</td><td>' + nombre + '</td><td>' + cantidad + '</td><td>' + '$' + precio + '</td><td>' + '$' + + subtotal + '</td><td> 	<a class="dropdown-item"><i class="dw dw-delete-3" onclick="eliminarProducto(' + indice + ');"></i></a></td></tr>')
    indice += 1;
}


function calcularSubtotal(cantidad, precio){
    let resultado = parseFloat(cantidad) * parseFloat(precio);
    total += resultado; //acumula cantidad
    $('#id_total').text('$' + total);
    return resultado;
}


function restarSubtotal(precio){
    let resultado = precio;
    total -= resultado; //restar cantidad
    $('#id_total').text('$' + total);
    console.log(resultado);
    return total;

}

function eliminarProducto(indiceDelete){
	let respuesta=[];
	for (let index = 0; index < detalle_ventas.length; index++){
		if(detalle_ventas[index].indice !== indiceDelete){
			respuesta.push(detalle_ventas[index])
			//console.log(respuesta[index]);
		} else {
			console.log('borra este id');
			console.log(index);
			$('#' + detalle_ventas[index].indice).remove();
			restarSubtotal(detalle_ventas[index].subtotal);
			//respuesta.splice(index, 1);
		}
	}
	//console.log(respuesta);
	detalle_ventas = respuesta;
	console.log(detalle_ventas);
	return detalle_ventas;		
}

function guardarFormVentas(){
	let fecha = $('#txtFecha').val();
	let numero = $('#txtNumero').val();
	let observacion = $('#txtObservacion').val();
	let proveedor = $('#cboProveedor').val();
	let formaPago = $('#cboFormaPago').val();

	if (numero.trim() == "") {
        alert("El numero de compra no debe estar vacio");
        return;
    }

	if (proveedor == 0) {
		alert("Debe seleccionar el proveedor");
		return;
	}
	if (formaPago == 0) {
		alert("Debe seleccionar la forma de pago");
		return;
	}

    if (detalle_ventas.length > 0){
        $.ajax({
            type: 'post',
            url: 'procesar/guardar.php',
            data: {
            	'fecha': fecha,
            	'numero': numero,
            	'observacion': observacion,
            	'proveedor': proveedor,
            	'formaPago': formaPago,
                'items': detalle_ventas
            },
           	success: function(data){
               //console.log(data);
               window.location.href = '../compras/listado.php?mensaje=1';
            }
        })
    }else{
    	alert("error");
        //$('#id_message_validacion').show(); // esto imprime un mensaje de error
    }
}

</script>

	
</body>
</html>

