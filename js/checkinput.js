function validateForm() {
    var x = document.forms["login"]["password"].value;
    if (x == "") {
        alert("Password must be filled out");
        return false;
    }
}
