
function viewLogin() {
    var email = document.getElementById('applEmail').value;
    document.getElementById('applUserName').value = email;
    document.getElementById('submitDetails').style.display = 'none';
    document.getElementById('submitReg').style.display = 'block';
}

function viewOtherEligibilityBox(id) {
    document.getElementById('otherEligibility').style.display = 'block';
    if (document.getElementById(id).style.display == 'none') {
        document.getElementById(id).style.display = 'block';
    } else {
        document.getElementById(id).style.display = 'none';
    }
}

function viewEligibility(clas) {
    var element = document.getElementsByClassName(clas);
    var loop = element.length;
    for (var i = 0; i < loop; i++) {
        element[i].value = '';
        element[i].readOnly = false;
//       element[i].style.display= 'none';
    }
    if (clas === 'iti') {
        var clas = 'diploma';
    } else {
        var clas = 'iti';
    }
    var element = document.getElementsByClassName(clas);
    var loop = element.length;
    for (var i = 0; i < loop; i++) {
        element[i].value = 'not applicable';
        element[i].readOnly = true;
//       element[i].style.display= 'none';
    }
}

function clearHtml(id) {
    alert(id);
    document.getElementById(id).innerHTML = '';
}

function addNewBranch(tableID) {
    var table = document.getElementById(tableID);

    var rowCount = table.rows.length;
    var row = table.insertRow(rowCount);

    var cell1 = row.insertCell(0);
    var element1 = document.createElement("input");
    element1.type = "text";
    element1.name = "branch[]";
    cell1.appendChild(element1);

    var cell2 = row.insertCell(1);
    var element2 = document.createElement("input");
    element2.type = "text";
    element2.name = "intake[]";
    cell2.appendChild(element2);

    var cell3 = row.insertCell(2);
    var element3 = document.createElement("input");
    element3.type = "text";
    element3.name = "curIntake[]";
    cell3.appendChild(element3);

}

function viewClosingDatePanel(value) {
    if (value == 'News') {
        document.getElementById('closingDate').value = 'N/A';
        document.getElementById('closingDate').readOnly = true;
    } else {
        document.getElementById('closingDate').readOnly = false;
        document.getElementById('closingDate').value = '';
    }
}

function generateDegreeList(edn) {
    if (edn === 'UG') {
        document.getElementById('degree').innerHTML = "<option value= ''>--Select--</option>\n\
                                                        <option>B.Tech.</option>\n\
                                                        <option>B.Sc.</option>\n\
                                                        <option>B.Arts.</option>\n\
                                                        <option>B.Com.</option>";
    }
    if (edn === 'PG') {
        document.getElementById('degree').innerHTML = "<option value= ''>--Select--</option>\n\
                                                        <option>M.Tech.</option>\n\
                                                        <option>MCA</option>\n\
                                                        <option>MBA</option>\n\
                                                        ";
    }
    if (edn === 'VOCATIONAL') {
        document.getElementById('degree').innerHTML = "<option value= ''>--Select--</option>\n\
                                                        <option>ITI</option>\n\
                                                        <option>DIPLOMA</option>\n\
                                                        ";
    }

}

function generateSpecializationList(degree) {
    if (degree === 'MBA') {
        document.getElementById('specialization').innerHTML = "<option>--Select--</option>\n\
                                                        <option>HR</option>\n\
                                                        <option>Finance</option>\n\
                                                        <option>Marketing</option>\n\
                                                        <option>Operation</option>\n\
                                                        ";
    } else if ((degree === 'M.Tech.') || (degree === 'B.Tech.')) {
        document.getElementById('specialization').innerHTML = "<option>--Select--</option>\n\
                                                        <option>Computer Science</option>\n\
                                                        <option>IT</option>\n\
                                                        <option>ETC</option>\n\
                                                        ";
    } else if (degree === 'ITI') {
        document.getElementById('specialization').innerHTML = "<option>--Select--</option>\n\
                                                        <option>FITTER</option>\n\
                                                        <option>TURNER</option>\n\
                                                        <option>ELECTRICIAN</option>\n\
                                                        ";
    } else if (degree === 'DIPLOMA') {
        document.getElementById('specialization').innerHTML = "<option>--Select--</option>\n\
                                                        <option>Computer Science</option>\n\
                                                        <option>IT</option>\n\
                                                        <option>ETC</option>\n\
                                                        <option>Others</option>\n\
                                                        ";
    }
    else {
        document.getElementById('specialization').innerHTML = "<option value=''>--Select--</option>\n\
                                                        ";
    }
}

function calculateNoOfMonth(ele) {
    var fromMon = document.getElementsByName('fromMon[]')[ele].value;
    var fromYear = document.getElementsByName('fromYear[]')[ele].value;
    var toMon = document.getElementsByName('toMon[]')[ele].value;
    var toYear = document.getElementsByName('toYear[]')[ele].value;
//    var fromDate= 01+"-"+fromMon+"-"+fromYear;
//    var toDate= 30+"-"+toMon+"-"+toYear;


    var oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
    var firstDate = new Date(fromYear, fromMon, 01);
    var secondDate = new Date(toYear, toMon, 30);
    if (firstDate < secondDate) {
//        alert(firstDate+"-"+secondDate);
        var diffDays = Math.round(Math.abs((firstDate.getTime() - secondDate.getTime()) / (oneDay)));
        var month = Math.round(diffDays / 30);
    } else {
        var month = '';
    }

    document.getElementsByName('exp[]')[ele].value = month;

}

function nextelementFocus(e) {
    var noOfElement = document.getElementById('user_registration');
    if (e.keyCode === 13) {
        for (var i = 0; i < noOfElement.length; i++) {
            if (document.user_registration.elements[i] === document.activeElement) {
                document.user_registration.elements[++i].focus();
            }
        }
    }
}

function submitForm() {
//    alert(id);
    document.getElementById("user_registration").submit();
}