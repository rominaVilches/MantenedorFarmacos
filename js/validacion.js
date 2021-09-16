
function valida(){
	var nombre = document.getElementById('nombre');
	var laboratorio = document.getElementById('laboratorio');
	var stock = document.getElementById('stock');
	var precio = document.getElementById('precio');
	var observacion = document.getElementById('observacion');

	if(nombre.value == ''){
		alert('Debe ingresar el Nombre');
		nombre.focus();
		return false;
	}

	if(laboratorio.selectedIndex == 0){
		alert('Debe seleccionar un Laboratorio');
		laboratorio.focus();
		return false;
	}

	if(stock.value == ''){
		alert('Debe ingresar el Stock');
		stock.focus();
		return false;
	}

	if(precio.value == ''){
		alert('Debe ingresar el Precio');
		precio.focus();
		return false;
	}

	if(observacion.value == ''){
		alert('Debe ingresar una Observacion del producto');
		observacion.focus();
		return false;
	}

	return true;
}

function obligatorio(campo, error){
	var campo =document.getElementById(campo);
	if(campo.value == ''){
		document.getElementById(error).innerHTML = 'Campo Obligatorio';
		campo.style.cssText = 'border: 3px solid #FF0000; border-radius: 3px;';
	} else {
		document.getElementById(error).innerHTML = '';
		campo.style.cssText = 'backgroundColor= #fff';
	}
}