/*global console: true, alert: true */
'use strict';

function eliminarEspaciosIzquierda(cadena) {
	var i = 0;
	while (cadena[i] == ' ')
		i++;
	if (i > 0)
		cadena = cadena.substr(i, cadena.length);
	return cadena;
}

function esDNI(dni) {
	var numero, letr, letra;
	var expDni = /^[XYZ]?\d{5,8}[A-Z]$/;

	if (expDni.test(dni) === true) {
		numero = dni.substr(0, dni.length - 1);
		numero = numero.replace('X', 0);
		numero = numero.replace('Y', 1);
		numero = numero.replace('Z', 2);
		letr = dni.substr(dni.length - 1, 1);
		numero = numero % 23;
		letra = 'TRWAGMYFPDXBNJZSQVHLCKET';
		letra = letra.substring(numero, numero + 1);
		if (letra != letr) {
			return false;
		} else {
			return true;
		}
	} else {
		return false;
	}
}

function validateForm() {
	var ok = true;
	var error = '';
	var expNombre = /^([a-z 0-9 ñáéíóú]{1,100})$/i;
	var expTelefono = /^\d{9}$/;
	var expFecha = /^(0?[1-9]|[12][0-9]|3[01])[\/](0?[1-9]|1[012])[/\\/](19|20)\d{2}$/;
	var expCorreo = /^(.+\@.+\..+)$/;
	var expDir = /^([a-z 0-9 ñáéíóú,ºª]{5,100})$/i;
	var expCP = /^([1-9]{2}|[0-9][1-9]|[1-9][0-9])[0-9]{3}$/;
	var name = eliminarEspaciosIzquierda(document.getElementById('name')).value;
	var email = eliminarEspaciosIzquierda(document.getElementById('email')).value;
	var subject = eliminarEspaciosIzquierda(document.getElementById('subject')).value;
	var message = eliminarEspaciosIzquierda(document.getElementById('message')).value;

	if (!(expCorreo.test(email))) {
		error += 'You must enter a correct e-mail.\n';
		ok = false;
	}

	if (subject == null || subject == '') {
		error += 'You must enter a subject.\n';
		ok = false;
	}
	if (message == null || subject == '') {
		error += 'You must enter a message.\n';
		ok = false;
	}
	console.log('Terminando validación');
	if (!ok) {
		alert(error);
		return false;
	}
	return true;
}