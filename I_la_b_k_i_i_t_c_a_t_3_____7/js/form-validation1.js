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
    var len = $(".roomselect:checked").length;
            if(len==0 && len!=1){
                alert('Select Any one Batch ');
                return false;
            }else if(len=='1'){

            }else{
                alert('Select Any one Batch ');
                return false;
                exit();
            }
    return true;
}