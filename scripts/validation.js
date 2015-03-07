/*jslint node: true */
/*global console: true, alert: true, document: true */
'use strict';

function removeLeftSpaces(strng) {
	var i = 0;
	while (strng[i] === ' ') {
		i += 1;
	}
	if (i > 0) {
		strng = strng.substr(i, strng.length);
	}
	return strng;
}

function validateForm() {
	var ok = true,
		error = '',
		expEmail = /^(.+\@.+\..+)$/,
		name = removeLeftSpaces(document.getElementById('name')).value,
		email = removeLeftSpaces(document.getElementById('email')).value,
		subject = removeLeftSpaces(document.getElementById('subject')).value,
		message = removeLeftSpaces(document.getElementById('message')).value;

	if (!(expEmail.test(email))) {
		error += 'You must enter a correct e-mail.\n';
		ok = false;
	}

	if (subject === null || subject === '') {
		error += 'You must enter a subject.\n';
		ok = false;
	}
	if (message === null || message === '') {
		error += 'You must enter a message.\n';
		ok = false;
	}
	
	if (!ok) {
		alert(error);
		return false;
	}
	return true;
}