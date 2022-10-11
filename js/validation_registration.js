function validation(form) {
	let username 	= form._login;
	let psw 		= form._psw;
	let psw_conf 	= form._psw_conf;


	if (username.value.length == '' && psw.value.length == '' && psw_conf.value.length == '') {
		username.style.border 	= '3px solid #ff6a4e';
		psw.style.border 		= '3px solid #ff6a4e';
		psw_conf.style.border 	= '3px solid #ff6a4e';
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
		if (psw_conf.value.length == '') {
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
    if (form._psw.value != '' && form._psw_conf.value != '') {
	    form.md5_psw.value 			= CryptoJS.MD5(form._psw.value);
	    form.md5_psw_conf.value 	= CryptoJS.MD5(form._psw_conf.value);
	    
		form._psw.value 		= '';
		form._psw_conf.value 	= '';
    }
}

function setErrColor(form) {
	let psw 		= form._psw;
	let psw_conf 	= form._psw_conf;
	
	psw.style.border 		= '3px solid #ff6a4e';
	psw_conf.style.border 	= '3px solid #ff6a4e';
}

function setInputListener(form) {
	let username 	= form._login;
	let psw 		= form._psw;
	let psw_conf 	= form._psw_conf;

	username.addEventListener('input', inputEvent);
	psw.addEventListener('input', inputEvent);
	psw_conf.addEventListener('input', inputEvent);
}