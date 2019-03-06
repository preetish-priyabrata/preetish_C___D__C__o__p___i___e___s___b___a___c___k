

function registerForDrive(stud,drive){
    var val= stud+","+drive;
    var conf= confirm("Are You Sure To Register For Campus Drive");
    if(conf){
            if (window.XMLHttpRequest)
            {// code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            }
            else
            {// code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function()
            {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                {
                    document.getElementById("result").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "../ajax/ajax_registerForDrive.php?val=" + val, true);
            xmlhttp.send();
    }else{
    }
}
function registerCollegeForDrive(coll,drive){
    var val= coll+","+drive;
    var conf= confirm("Are You Sure To Register For Campus Drive");
    if(conf){
            if (window.XMLHttpRequest)
            {// code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            }
            else
            {// code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function()
            {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                {
                    document.getElementById("result").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "../ajax/ajax_registerCollegeForDrive.php?val=" + val, true);
            xmlhttp.send();
    }else{
    }
}
function registerCollegeForTraining(trng){
    var conf= confirm("Are You Sure To Register For Campus Drive");
    if(conf){
            if (window.XMLHttpRequest)
            {// code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            }
            else
            {// code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function()
            {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                {
                    document.getElementById("training").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "../ajax/ajax_registerCollegeForTraining.php?trng=" + trng, true);
            xmlhttp.send();
    }else{
    }
}

function viewMessageDetails(msg){
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("messageBox").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "../ajax/ajax_viewUserMessage.php?msg=" + msg, true);
    xmlhttp.send();
}

function viewReplyBox(msg){
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("messageBox").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "../ajax/ajax_viewMessageReplyBox.php?msg=" + msg, true);
    xmlhttp.send();
}

function submitUserReply(msg,reply){
    var val= msg+","+reply;
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("messageBox").innerHTML = '';
            document.getElementById("messageBox").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "../ajax/ajax_viewMessageReplyBox.php?val=" + val, true);
    xmlhttp.send();
}

function viewCompanyDetails($user){
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("companyDetails").innerHTML = '';
            document.getElementById("companyDetails").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "../ajax/ajax_viewRecruitmentDetails.php?user=" + $user, true);
    xmlhttp.send();
}

function viewRegStudList(comp){
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("studentList").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "../ajax/ajax_viewRegStudList.php?comp=" + comp, true);
    xmlhttp.send();
}
function viewRegStudListForApproval(comp){
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("studentList").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "../ajax/ajax_viewRegStudList.php?company=" + comp, true);
    xmlhttp.send();
}

function viewElibleStudentList(comp){
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("studentList").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "../ajax/ajax_eligibleStudList.php?comp=" + comp, true);
    xmlhttp.send();
}

function viewMailBox(comp){
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("sendEmail").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "../ajax/ajax_viewMailBox.php?comp=" + comp, true);
    xmlhttp.send();
}
function sendEmail(subject,message,visit){
    var val= subject+","+message+","+visit;
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("sendEmail").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "../ajax/ajax_viewMailBox.php?val=" + val, true);
    xmlhttp.send();
}

function viewInbox(msg){
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("inbox").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "../ajax/ajax_viewInbox.php?msg=" + msg, true);
    xmlhttp.send();
}

function registerForTraining(trng){
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("training").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "../ajax/ajax_registerForTraining.php?trng=" + trng, true);
    xmlhttp.send();
}
function loadUserProfile(profile){
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("pageContent").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "../ajax/ajax_viewUserProfile.php?profile=" + profile, true);
    xmlhttp.send();
}
function approveCandidate(user){
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("approveUser").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "../ajax/ajax_approveUser.php?user=" + user, true);
    xmlhttp.send();
}

function findStudentList(val){
    var s_date= document.getElementById('date1').value;
    var e_date= document.getElementById('date2').value;
    if(val!== 'All'){
        var val= s_date+","+e_date;
    }    
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
//            document.getElementById("studentList").innerHTML = '';
            document.getElementById("studentList").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "../ajax/ajax_approvedCandidateList.php?val=" + val, true);
    xmlhttp.send();
}

function fetchCompanyDetails(comp){
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            var arrResult= xmlhttp.responseText.split(",");
            document.getElementById("name_companyperson").value = arrResult[0];
            document.getElementById("contact_companyperson").value = arrResult[1];
            document.getElementById("mail_companyperson").value = arrResult[2];
        }
    }
    xmlhttp.open("GET", "../ajax/ajax_companyDetails.php?comp=" + comp, true);
    xmlhttp.send();
}
function fetchCompanyVisitDetails(comp){
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("visit").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "../ajax/ajax_companyVisitDetails.php?comp=" + comp, true);
    xmlhttp.send();
}
function editCompanyVisitDetails(visit){
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("visit").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "../ajax/ajax_companyVisitDetails.php?visit=" + visit, true);
    xmlhttp.send();
}

function fetchCollegeDetails(college){
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("collegeDetails").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "../ajax/ajax_editCollegeDetails.php?college=" + college, true);
    xmlhttp.send();
}
function changePassword(){
//    alert();
    var oldPass= document.getElementById('oldPassword').value;
    var newPassword= document.getElementById('newPassword').value;
    var confPassword= document.getElementById('confPassword').value;
    var val= oldPass+","+newPassword+","+confPassword;
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("result").innerHTML = xmlhttp.responseText;
            document.getElementById("oldPassword").value = '';
            document.getElementById("newPassword").value = '';
            document.getElementById("confPassword").value = '';
        }
    }
    xmlhttp.open("GET", "../ajax/ajax_changePassword.php?val=" + val, true);
    xmlhttp.send();
}

function viewRegStudListForSelection(comp){
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("studentList").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "../ajax/ajax_viewRegStudList.php?comp_id=" + comp, true);
    xmlhttp.send();
}

function changeSelectionStatus(user,visit){
    value= user+","+visit;
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("userStatus").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "../ajax/ajax_approveUser.php?value=" +value, true);
    xmlhttp.send();
}
function isUserIdAvailable(user_id){
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {   
            
            document.getElementById("message_box").innerHTML = xmlhttp.responseText;
            if(document.getElementById("message_box").innerHTML){
                document.getElementById("message_box").style.display= 'block';
                document.user_registration.userName.focus();
            }
            
        }else{
            document.getElementById("message_box").style.display= 'none';
        }
    }
    xmlhttp.open("GET", "./ajax/ajax_checkUserIdAvailable.php?user_id=" +user_id, true);
    xmlhttp.send();
}