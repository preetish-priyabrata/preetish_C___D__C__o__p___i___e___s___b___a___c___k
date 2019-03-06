function allRequired(form) {
    var elements = document.getElementById(form).elements;
    for (i = 0; i < elements.length; i++) {
        if (elements[i].value === '') {
            elements[i].focus();
            alert("You have not fill your details.");
            return false;
            exit();
        }
    }
    
    return true;
}