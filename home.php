
<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: index.php');
}
?>



<?php include("includes/head.php"); ?>
<body style="background-color: #009FDF">

<br><br>
<div class="form2" style="text-align: center;">
	<a href='logout.php' class="float-right" style="padding-right: 15px;">Cerrar Sesion</a>


	





	<br>
	<br>
	<img src="imgs/logo.png" width="200px" style="padding-bottom: 15px">
	<a href="nuevoRegistro.php" class="btn btn-info">Nuevo Registro</a>
	<a href="tareasDiarias.php" target="_blank" class="btn btn-info">Control de Tareas</a>

	<h1 style="text-align: center; color: darkblue" >Control - Información de Clientes</h1>
 <div class="input-group col-md-8" style="padding-left: 35%;">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
 	 <input  id="buscador"  type="text" class="form-control" placeholder="Buscar Cliente">	
</div>

<script type="text/javascript">
	jQuery('.texto-gris').each(function() {            
    var valorActual = jQuery(this).val();
 
    jQuery(this).focus(function(){                
        if( jQuery(this).val() == valorActual ) {
            jQuery(this).val('');
            jQuery(this).removeClass('texto-gris');
        };
    });
 
    jQuery(this).blur(function(){
        if( jQuery(this).val() == '' ) {
            jQuery(this).val(valorActual);
            jQuery(this).addClass('texto-gris');
        };
    });
});	



	jQuery("#buscador").keyup(function(){
    if( jQuery(this).val() != ""){
        jQuery("#clientes tbody>tr").hide();
        jQuery("#clientes td:contiene-palabra('" + jQuery(this).val() + "')").parent("tr").show();
    }
    else{
        jQuery("#clientes tbody>tr").show();
    }
});
 
jQuery.extend(jQuery.expr[":"], 
{
    "contiene-palabra": function(elem, i, match, array) {
        return (elem.textContent || elem.innerText || jQuery(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
    }
});
</script>

<?php 
  {	
  $sql1= "select * from controlclientes";
  $query = $con->query($sql1);
  }
?>

	<table class="table" id="clientes" style="text-align: left;">
		<thead>
			<tr>
				<th>Cedula</th>
				<th>Nombre Completo</th>
				<th>Teléfono</th>
				<th>Correo</th>
				<th>Estatus de Trabajo</th>
				<th>Opciones</th>

			</tr>
		</thead>
		<tbody>
			<tr>
     <?php while ($r=$query->fetch_array()):?>
				
				<td><?php echo $r["cedula"]; ?></td>
				<td><?php echo $r["nombre"]." ".$r["apellidoUno"]." ".$r["apellidoDos"]; ?></td>
				<td><?php echo $r["telefonoUno"]; ?> | <?php echo $r["telefonoUno"]; ?></td>
				<td><?php echo $r["correo"]; ?></td>
				<td><?php echo $r["estatusTrabajo"]; ?></td>
				<td>
					<a href="editar.php?id=<?php echo $r["id"];?>">Editar</a>
					|
					 <a href="mostrar.php?id=<?php echo $r["id"] ?>">Mostar</a> 
					|
					<a href="eliminarRegistro.php?id=<?php echo $r["id"];?>" id="del-<?php echo $r["id"];?>" onclick="return confirm('¿Seguro de eliminar este Registro?')">Eliminar</a>
					

			</tr>
        <?php endwhile;?>
		</tbody>
	</table>
</div>

<div class="footer"><span style="color: grey"> Copyright &copy;2019</span> 
	<span > || || |||
	<img style="float: center;" width="50px" src="imgs/disow_logo.png">

||| || ||
		<strong style="color: gray">Version:</strong> <span style="color: gray" >1.2.0</span></span>
</div>


</html>

<style type="text/css">
.footer {

 margin-top: 150px;
  background-color: #efefef;
  text-align: center;
  color: Black;
}

</style>