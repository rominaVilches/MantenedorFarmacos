<?php
	require("conexion.php");

	$sql = "SELECT nomLab FROM laboratorio";

	$buscar = $mysqli->query($sql);

	if (isset($_GET['nombre'])) {
		$sql = "UPDATE farmaco SET stoFar = (stoFar -1) WHERE nomFar = '".$_GET['nombre']."' && stoFar > 0 ";
		$eliminar = $mysqli->query($sql);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Mantenedor Fármacos</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-sacale=1.0">
	<link rel="stylesheet" href="css/estilo.css" />
	<script src="js/validacion.js" ></script>
</head>
<body>
	<div>
		<div class="busqueda">
			<form name="form1" id="form1" method="post" action="mantenedorFarmacos.php">
				<h1>BUSQUEDA DE FARMACOS</h1>
				<label class="label1" id="lb" for="busquedaLab">Laboratorio: </label>
				<select name="busquedaLab" id="busquedaLab">
					<option value="">--- Seleccione ---</option>
					<?php
					foreach ($buscar as $fila) {
					?>
					<option value="<?php echo $fila['nomLab']; ?>"><?php echo $fila['nomLab']; ?></option>
					<?php } ?>
				</select>
				<input type="submit" name="btnBuscar" id="btnBuscar" value="Buscar">
			</form>
			
			<table border="1">
				<tr>
					<th>Nombre</th>
					<th>Laboratorio</th>
					<th>Stock</th>
					<th>Precio</th>
				</tr>
				<?php 
					if(isset($_POST['btnBuscar'])){
						$lab = $_POST['busquedaLab'];

						if (empty($lab)) {
							$sql = "SELECT nomFar, labFar, stoFar, preFar FROM farmaco WHERE stoFar > 0 ORDER BY stoFar DESC";
						}else{
							$sql = "SELECT nomFar, labFar, stoFar, preFar FROM farmaco WHERE labFar='$lab' && stoFar > 0  ORDER BY stoFar DESC";
						}

						$listar = $mysqli->query($sql);
						foreach ($listar as $fila){
				?>
					<tr>
						<td> <a href="mantenedorFarmacos.php?nombre=<?php echo $fila['nomFar']; ?>"> <?php echo $fila['nomFar']; ?> </td>
						<td> <?php echo $fila['labFar']; ?> </td>
						<td> <?php echo $fila['stoFar']; ?> </td>
						<td> <?php echo $fila['preFar']; ?> </td>
					</tr>
				<?php 
					} } 
					else{
						$sql = "SELECT nomFar, labFar, stoFar, preFar FROM farmaco WHERE stoFar > 0 ORDER BY stoFar DESC";
						$listar = $mysqli->query($sql);
						foreach ($listar as $fila) {
				?>			
					<tr>
						<td> <a href="mantenedorFarmacos.php?nombre=<?php echo $fila['nomFar']; ?>"> <?php echo $fila['nomFar']; ?> </td>
						<td> <?php echo $fila['labFar']; ?> </td>
						<td> <?php echo $fila['stoFar']; ?> </td>
						<td> <?php echo $fila['preFar']; ?> </td>
					</tr>		
				<?php 
					} } 	
				?>
			</table> 
			

		</div>

		<div>
			<?php
				if(isset($_POST['btnGuardar'])){
					$sql = "INSERT INTO farmaco (codFar, nomFar, labFar, stoFar, preFar, obsFar) VALUES (NULL, '".$_POST['nombre']."', '".$_POST['laboratorio']."', ".$_POST['stock'].", ".$_POST['precio'].", '".$_POST['observacion']."')" ; 
					$agregar = $mysqli->query($sql);
					header('location:mantenedorFarmacos.php?m=Farmaco Registrado con Exito');
				}
			?>
			<h2> <?php if(isset($_GET['m'])){ echo $_GET['m'];}?></h2>
			<form name="form2" id="form2" method="post" action="mantenedorFarmacos.php" onSubmit="return valida();">
				<h1>AGREGUE UN NUEVO FÁRMACO</h1>
				<div class="d">
					<label class="label" for="nombre">Nombre:</label>
					<input type="text" name="nombre" id="nombre" placeholder="Paracetamol" onBlur="obligatorio('nombre','errorNombre');"/>
					<span id="errorNombre" class="textoError"></span>
				</div>
				<div class="d">
					<label class="label" for="laboratorio">Laboratorio: </label>
					<select name="laboratorio" id="laboratorio" onBlur="obligatorio('laboratorio','errorLaboratorio');">
						<option value="">--- Seleccione ---</option>
						<?php
						foreach ($buscar as $fila) {
						?>
						<option value="<?php echo $fila['nomLab']; ?>"><?php echo $fila['nomLab']; ?></option>
						<?php } ?>
					</select>
					<span id="errorLaboratorio" class="textoError"></span>
				</div>
				<div class="d">
					<label class="label" for="stock">Stock:</label>
					<input type="number" name="stock" id="stock" placeholder="20" onBlur="obligatorio('stock','errorStock');"/>
					<span id="errorStock" class="textoError"></span>
				</div>
				<div class="d">
					<label class="label" for="precio">Precio:</label>
					<input type="number" name="precio" id="precio" placeholder="1500" onBlur="obligatorio('precio','errorPrecio');"/>
					<span id="errorPrecio" class="textoError"></span>
				</div>
				<div class="d">
					<label class="label" for="observacion">Observacion:</label>
					<textarea name="observacion" id="observacion" placeholder="Comprimidos, Crema, Locion, etc" onBlur="obligatorio('observacion','errorObservacion');"></textarea>
					<span id="errorObservacion" class="textoError"></span>
				</div>
				<div>
					<input type="submit" name="btnGuardar" id="btnGuardar" value="Guardar">
				</div>
				
			</form>
		</div>

	</div>
</body>
</html>