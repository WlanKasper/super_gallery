function validation() {
    var _firstname = document.form_registration._firstname.value;
    var _lastname = document.form_registration._lastname.value;
    var _phone = document.form_registration._phone.value;
    if (_firstname.length == "" && _lastname.length == "" && _phone.length == "") {
        alert("You have to insert all data");
        return false;
    } else {
        if (_firstname.length == "") {
            alert("Firstname is empty");
            return false;
        }
        if (_lastname.length == "") {
            alert("Lastname field is empty");
            return false;
        }
        if (_phone.length == "") {
            alert("Phone number field is empty");
            return false;
        }
    }

}  