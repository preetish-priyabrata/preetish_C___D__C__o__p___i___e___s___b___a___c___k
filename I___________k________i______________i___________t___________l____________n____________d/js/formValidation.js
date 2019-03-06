
function showExperienceDetails() {
    var flag = 0;
    var error = document.getElementsByClassName('required');
    for (var i = 0; i < error.length; i++) {
        if (document.getElementsByClassName('required')[i].value == "") {
            flag = 1;
            document.getElementById("message_box").className = "alert-danger alert";
            document.getElementById("message_box").style.display = 'block';
            document.getElementById("message_box").innerHTML = "Please fill required (*) fields and click on 'Save and Continue'";
//            alert("Please fill required fields and click on 'Save and Continue'");
            exit;
        } else {
            continue;
        }
    }
    if (flag == 0) {
        var stud = validateStudentPersonalDetails();
//        alert(stud);
        if (stud === true) {
            document.getElementById('acad_work_details').style.display = 'block';
            document.getElementById('per_details').style.display = 'none';
        } else {
//            alert(stud);
            document.getElementById('acad_work_details').style.display = 'none';
            document.getElementById('per_details').style.display = 'block';
        }
    } else {
        document.getElementById('acad_work_details').style.display = 'none';
        document.getElementById('per_details').style.display = 'block';
    }
}



function validateCandidateRegistration() {
//    return false;
    var phoneno = /^\d{10}$/;
    var alpha = /^[a-zA-Z ]+$/;
    var alphaNumeric = /^[a-zA-Z 0-9]+$/;
    var spl = /^[0-9a-zA-Z ]+$/;
    var numbers = /^[0-9]+$/;
    var mailPatern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    var userName = document.user_registration.userName.value;
    var password = document.user_registration.password.value;
    var confPassword = document.user_registration.confPassword.value;
    var firstName = document.user_registration.firstName.value;
    var middleName = document.user_registration.middleName.value;
    var lastName = document.user_registration.lastName.value;
    var email = document.user_registration.email.value;
    var mobileNo = document.user_registration.mobileNo.value;
    var mornFromTime = document.user_registration.mornFromHour.value + document.user_registration.mornFromMin.value;
    var mornToTime = document.user_registration.mornToHour.value + document.user_registration.mornToMin.value;
    var evenFromTime = document.user_registration.evenFromHour.value + document.user_registration.evenFromMin.value;
    var evenToTime = document.user_registration.evenToHour.value + document.user_registration.evenToMin.value;
    var degree = document.user_registration.degree.value;
    var specialization = document.user_registration.specialization.value;
    var file = document.user_registration.resume.value;

    if (!userName.match(spl)) {
        document.getElementById("message_box").style.display = 'block';
        document.getElementById("message_box").innerHTML = "User id should not contain any spl character";
        document.user_registration.userName.focus();
        return false;
    } else
    if (!password.match(spl)) {
        document.getElementById("message_box").style.display = 'block';
        document.getElementById("message_box").innerHTML = "Password should not contain any spl character";
        document.user_registration.password.focus();
        return false;
    } else
    if (confPassword != password) {
        document.getElementById("message_box").style.display = 'block';
        document.getElementById("message_box").innerHTML = "Input password and confirm password should be same";
        document.user_registration.confPassword.focus();
        return false;
    } else
    if (!firstName.match(alphaNumeric)) {
//        alert("First name should not contain any spl character ");
        document.getElementById("message_box").style.display = 'block';
        document.getElementById("message_box").innerHTML = "First name should not contain any spl character";
        document.user_registration.firstName.focus();
        return false;
    } else
    if (middleName != '' && !middleName.match(alphaNumeric)) {
        document.getElementById("message_box").style.display = 'block';
        document.getElementById("message_box").innerHTML = "Middle name should not contain any spl character";
        document.user_registration.middleName.focus();
        return false;
    } else
    if (!lastName.match(alphaNumeric)) {
//        alert("Last name should not contain any spl character ");
        document.getElementById("message_box").style.display = 'block';
        document.getElementById("message_box").innerHTML = "Last name should not contain any spl character";
        document.user_registration.lastName.focus();
        return false;
    } else
    if (!mobileNo.match(phoneno)) {
//        alert("Invalid entry for mobile number");
        document.getElementById("message_box").style.display = 'block';
        document.getElementById("message_box").innerHTML = "Invalid entry for mobile number";
        document.user_registration.mobileNo.focus();
        return false;
    } else
    if (email != '' && !email.match(mailPatern)) {
//        alert("You have enter a wrong email address");
        document.getElementById("message_box").style.display = 'block';
        document.getElementById("message_box").innerHTML = "You have entered a wrong email address";
        document.user_registration.email.focus();
        return false;
    } else
    if (mornFromTime > mornToTime) {
        document.getElementById("message_box").style.display = 'block';
        document.getElementById("message_box").innerHTML = "Prefered morning call time seems to be invalid.";
        document.user_registration.mornToMin.focus();
        return false;
    } else
    if (evenFromTime > evenToTime) {
        document.getElementById("message_box").style.display = 'block';
        document.getElementById("message_box").innerHTML = "Prefered evening call time seems to be invalid.";
        document.user_registration.evenToMin.focus();
        return false;
    } else
    if (degree === '') {
        document.getElementById("message_box").style.display = 'block';
        document.getElementById("message_box").innerHTML = "Please select your degree";
        document.user_registration.degree.focus();
        return false;
    } else
    if (specialization == '--Select--') {
        document.getElementById("message_box").className = "alert-danger alert";
        document.getElementById("message_box").style.display = 'block';
        document.getElementById("message_box").innerHTML = "Please select your specialization";
        document.user_registration.specialization.focus();
        return false;
    } else
    if (file != '') {
        var ext = file.substr(file.lastIndexOf('.') + 1);
        var ext = ext.toLowerCase();
        if (ext != 'pdf') {
            document.getElementById("message_box").className = "alert-danger alert";
            document.getElementById("message_box").style.display = 'block';
            document.getElementById("message_box").innerHTML = "You can only upload pdf file";
            document.user_registration.resume.focus();
            return false;
        } else {
            document.getElementById('user_registration').submit();
        }
    }
    else
    {
        document.getElementById('user_registration').submit();
    }


}

function validateStudentPersonalDetails() {
//    alert();
    var phoneno = /^\d{10}$/;
    var alpha = /^[a-zA-Z ]+$/;
    var spl = /^[0-9a-zA-Z ]+$/;
    var numbers = /^[0-9]+$/;
    var mailPatern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    var userName = document.user_registration.userName.value;
    var password = document.user_registration.password.value;
    var firstName = document.user_registration.firstName.value;
    var lastName = document.user_registration.lastName.value;
    var email = document.user_registration.email.value;
    var mobileNo = document.user_registration.mobileNo.value;
    var phoneNo = document.user_registration.phoneNo.value;
    var city = document.user_registration.city.value;
    if (!userName.match(spl)) {
        alert("User id should not contain any spl character");
        document.user_registration.userName.focus();
        return false;
    } else
    if (!password.match(spl)) {
        alert("Password should not contain any spl character");
        document.user_registration.password.focus();
        return false;
    } else
    if (!firstName.match(alpha)) {
        alert("First name should not contain any spl character and alphabet only");
        document.user_registration.firstName.focus();
        return false;
    } else
    if (!lastName.match(alpha)) {
        alert("Last name should not contain any spl character and alphabet only");
        document.user_registration.lastName.focus();
        return false;
    } else
    if (!mobileNo.match(phoneno)) {
        alert("Invalid entry for mobile number");
        document.user_registration.mobileNo.focus();
        return false;
    } else
    if (phoneNo != '' && !phoneNo.match(numbers)) {
        alert("Invalid entry for phone number");
        document.user_registration.phoneNo.focus();
        return false;
    } else
    if (!email.match(mailPatern)) {
        alert("You have enter a wrong email address");
        document.user_registration.email.focus();
        return false;
    } else
    {
        return true;
    }

}

function validateUserRegistration() {
    var degree = document.user_registration.degree.value;
    var specialization = document.user_registration.specialization.value;
    if (degree === '') {
        if (document.getElementById('acad_work_details').style.display === 'block') {
            alert("Please select your academic degree");
            document.user_registration.degree.focus();
            return false;
        } else {
            document.getElementById("message_box").className = "alert-danger alert";
            document.getElementById("message_box").style.display = 'block';
            document.getElementById("message_box").innerHTML = "Please fill required (*) fields and click on 'Save and Continue'";
            return false;
        }
    } else
    if (specialization == '--Select--') {
        alert("Please select your specialization");
        document.user_registration.specialization.focus();
        return false;
    } else {
        var totalExpYr = document.user_registration.totalExpYr.value;
        var totalExpMth = document.user_registration.totalExpMth.value;
        var totalCalExpMth = (Number(totalExpYr) * 12) + Number(totalExpMth);

        var expInMth = document.getElementsByName('exp[]');
        var totalCalMth = 0;
        for (var i = 0; i < expInMth.length; i++) {
            if (expInMth[i].value == '') {
                expInMth[i].value = 0;
            }
            totalCalMth = Number(totalCalMth) + Number(expInMth[i].value);
        }
        if (totalCalExpMth < totalCalMth) {
            alert("Experience details and total experience doesnot match");
            return false;
        } else {
            return true;
        }
    }


}

function validateResumeUpload() {
    var keyWord = document.getElementsByName('keyword[]')[0].value;
    var file = document.resumeUpload.resume.value;
    var ext = file.substr(file.lastIndexOf('.') + 1);
    var ext = ext.toLowerCase();
    if (keyWord == "") {
        var file = isFileChoosen();
        if (file == false) {
            return false;
        } else {
            alert("Please enter keyword for your resume");
            document.getElementsByName('keyword[]')[0].focus();
            return false;
        }
    }
    else if (keyWord != '' && ext != '') {
        if (ext != 'pdf') {
            alert("You can upload only .pdf file");
            document.resumeUpload.resume.focus();
            return false;
        }

    }

}
function isFileChoosen() {
    var file = document.resumeUpload.resume.value;

    if (file == "") {
        alert("Please select file to upload");
        document.resumeUpload.resume.focus();
        return false;
    } else {
        var ext = file.substr(file.lastIndexOf('.') + 1);
        var ext = ext.toLowerCase();
        if (ext != 'pdf') {
            alert("You can upload only .pdf file");
            document.resumeUpload.resume.focus();
            return false;
        } else {
            return true;
        }
    }

}

function validateUserRegistrationUpdate() {
    var personal = validateStudentPersonalDetails();
    if (personal == true) {
        var education = validateUserRegistration();
        if (education) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }

}

function validateCareerForm() {
    var phoneno = /^\d{10}$/;
    var alpha = /^[a-zA-Z ]+$/;
    var alphaNumeric = /^[a-zA-Z 0-9]+$/;
    var spl = /^[0-9a-zA-Z ]+$/;
    var numbers = /^[0-9]+$/;
    var mailPatern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    var name = document.career.name.value;
    var fatherName = document.career.fatherName.value;
    var dob = document.career.dob.value;
    var mobile = document.career.mobile.value;
    var alt_no = document.career.alt_no.value;
    var email = document.career.email.value;
    var address = document.career.address.value;
    var degree = document.career.degree.value;
    var passYear = document.career.passYear.value;
    var file = document.career.resume.value;

    if (!name.match(spl)) {
        document.getElementById("message_box").style.display = 'block';
        document.getElementById("message_box").innerHTML = "Please enter your name.";
        document.career.name.focus();
        return false;
    } else
    if (!fatherName.match(spl)) {
        document.getElementById("message_box").style.display = 'block';
        document.getElementById("message_box").innerHTML = "Name cant be left blank";
        document.career.fatherName.focus();
        return false;
    } else
    if (!mobile.match(phoneno)) {
        document.getElementById("message_box").style.display = 'block';
        document.getElementById("message_box").innerHTML = "Invalid entry for mobile number";
        document.career.mobile.focus();
        return false;
    } else
    if (!email.match(mailPatern)) {
        document.getElementById("message_box").style.display = 'block';
        document.getElementById("message_box").innerHTML = "Please enter your email";
        document.career.email.focus();
        return false;
    } else
    if (address == "") {
        document.getElementById("message_box").style.display = 'block';
        document.getElementById("message_box").innerHTML = "Address field left blank";
        document.career.address.focus();
        return false;
    } else
    if (degree == "") {
        document.getElementById("message_box").style.display = 'block';
        document.getElementById("message_box").innerHTML = "Please enter your academic degree";
        document.career.degree.focus();
        return false;
    } else
    if (file !== '') {
        var ext = file.substr(file.lastIndexOf('.') + 1);
        var ext = ext.toLowerCase();
        if (ext !== 'pdf') {
            document.getElementById("message_box").style.display = 'block';
            document.getElementById("message_box").innerHTML = "You can only upload pdf file";
            return false;
        } else {
            document.getElementById('career').submit();
        }
    } else {
        document.getElementById('career').submit();
    }

}