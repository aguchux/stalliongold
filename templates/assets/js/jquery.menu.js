/*TOGGLE MENU AT DATABASE*/
function toggle_visibility(id) {
	var e = document.getElementById(id);
	if (e.style.display == 'block') {
		e.style.display = 'none';
	} else {
		e.style.display = 'block';
	}
}


/*TOGGLE PASSWORD AT LOGIN*/

function myFunction() {
	var x =
document.getElementById("myInput");
	if (x.type === "password") {
		x.type = "text";
	} else {
		x.type = "password";
	}
}

