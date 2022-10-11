function validation(form) {
	let username 	= form._login;
	let psw 		= form._psw;

	if (username.value.length == '' && psw.value.length == '') {
		username.style.border = '3px solid #ff6a4e';
		psw.style.border = '3px solid #ff6a4e';
		return false;
	} else {
		if (username.value.length == '') {
			username.style.border = '3px solid #ff6a4e';
			return false;
		}
		if (psw.value.length == '') {
			psw.style.border = '3px solid #ff6a4e';
			return false;
		}
	}

	pwd_handler(form);
	return true;
}

function inputEvent(event) {
	this.style.border = '3px solid #858584';
}

function pwd_handler(form) {
    if (form._psw.value != '') {
	    form.md5_psw.value 	= CryptoJS.MD5(form._psw.value);
		form._psw.value 	= '';
    }
}

function setErrColor(form) {
	let username 	= form._login;
	let psw 		= form._psw;
	
	username.style.border 	= '3px solid #ff6a4e';
	psw.style.border 		= '3px solid #ff6a4e';
}

function setInputListener(form) {
	let username 	= form._login;
	let psw 		= form._psw;

	username.addEventListener('input', inputEvent);
	psw.addEventListener('input', inputEvent);
}