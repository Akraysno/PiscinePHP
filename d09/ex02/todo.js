var i = 0;

function setCookie(name, value, days) {
	var d = new Date();
	d.setTime(d.getTime() + (days * 24 * 60 * 60 * 1000));
	var expires = "expires=" + d.toUTCString();
	document.cookie = name + "=" + value + ";" + expires + ";path=/";
}

function getCookie(nom, ca) {
	var c = ca[i];
	while (c.charAt(0) === ' ') { c = c.substring(1); }
	if (c.indexOf(nom) === 0) { return (c.substring(nom.length, c.length)); }
}

function add_todo(id, text) {
	if (text) {
		var new_div = document.createElement('div'),
			new_text = document.createTextNode(text),
			new_id = "child" + i;
		new_div.id = new_id;
		new_div.onclick = function () { this.remove(); };
		new_div.innerHTML = text;
		document.getElementById(id).insertBefore(new_div, document.getElementById(id).firstChild);
		setCookie("todo" + i, text, 5);
		i += 1;
	}
}

function checkCookie() {
	var decodedCookie = decodeURIComponent(document.cookie),
		ca = document.cookie.split(';');
	while (i < ca.length) {
		var nom = "todo" + i + "=",
			value = getCookie(nom, ca);
		add_todo('ft_list', value);
		i += 1;
	}
	i += 1;
}