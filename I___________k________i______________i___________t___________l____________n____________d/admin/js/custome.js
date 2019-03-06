/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function checkAll() {
    var chkRedgNo = document.getElementsByName("chkRedgNo[]").length;
    if (_("chkCheckAll").checked === true) {
        for (var i = 0; i < chkRedgNo; i++) {
            document.getElementsByName("chkRedgNo[]")[i].checked = true;
        }
    } else {
        for (var i = 0; i < chkRedgNo; i++) {
            document.getElementsByName("chkRedgNo[]")[i].checked = false;
        }
    }
}

function validateDownloadForm() {
    var chkRedgNo = document.getElementsByName("chkRedgNo[]").length;
    var count = 0;
    for (var i = 0; i < chkRedgNo; i++) {
        if (document.getElementsByName("chkRedgNo[]")[i].checked === true) {
            count++;
        }
    }
    if (count === 0) {
        _("download-msgDiv").className = "alert alert-danger alert-dismissible text-text-danger";
        _("download-msgDiv").innerHTML = "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button> Please select at least one Checkbox.";
        return false;
    } else {
        _("download-msgDiv").className = "";
        _("download-msgDiv").innerHTML = "";
    }
}

// This function defines when the document will finishes loading the following we can do followng task
// 1. Can apply DataTable functionality
$(document).ready(function () {

    // Call the dataTable function using the id of the table 
    // need to include all the dataTable.bootstrap CSS and JS file
    $('#tblDataTable').dataTable({
        "bFilter": false,
        "bPaginate": true,
        "bLengthChange": false,
        "bSort": false,
        "bInfo": false,
        "bAutoWidth": false,
        "iDisplayLength": 10,
        "dom": '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>'
    });
});

function refreshDataTable() {
    $('#tblDataTable').dataTable({
        "bFilter": false,
        "bPaginate": true,
        "bLengthChange": false,
        "bSort": false,
        "bInfo": false,
        "bAutoWidth": false,
        "iDisplayLength": 10,
        "dom": '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>'
    });
}

// Datepicker function for call details page defines here 
$(function () {
    $("#txtLastDate,#txtNextDate").datepicker({
        showOn: "button",
        buttonImage: "datepicker/img/calendar.gif",
        buttonImageOnly: true,
        dateFormat: "dd-mm-yy",
        showAnim: "slideDown"
    });
});

//
$(function () {
    $("#txtAddModalNextDate").datepicker({
        showOn: "button",
        buttonImage: "datepicker/img/calendar.gif",
        buttonImageOnly: true,
        minDate: 0,
        dateFormat: "dd-mm-yy",
        showAnim: "slideDown"
    });
});
// This date picker funciton call when the edit call details form is loaded by ajax call
function displayEditCallDetailsDatePicker() {
    $("#txtEditModalNextDate").datepicker({
        showOn: "button",
        buttonImage: "datepicker/img/calendar.gif",
        buttonImageOnly: true,
        minDate: 0,
        dateFormat: "dd-mm-yy",
        showAnim: "slideDown"
    });
    // $("#txtEditModalNextDate").datepicker("option", "dateFormat", "dd-mm-yy");
    // $("#txtEditModalNextDate").datepicker("option", "showAnim", "slideDown");
}

function _(e1) {
    return document.getElementById(e1);
}

var refeshCallDetailsTable = function () {
    var userId = _("hidUserId").value;
    var xmlhttp;
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function ()
    {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200)
        {
            _("frmTblAnnouncement").innerHTML = xmlhttp.responseText;
            refreshDataTable();
        } else {
            _("frmTblAnnouncement").innerHTML = "<div style='margin-left: 40%;margin-top: 25%;margin-bottom: 25%;font-size: 23px;font-weight: bold;'> <img src='../images/loading_Animation.gif' alt='Loaing Image' style='height: 50px;'>Please wait...</div>";
        }
    };
    xmlhttp.open("GET", "../ajax/ajax_refreshCallDetailsTable.php?userId=" + userId, true);
    xmlhttp.send();
};

function addCallDetails() {
//    textAddDesc, textAddRemarks, txtAddModalNextDate, hidRedgNo, msgDiv    
    var desc = _("textAddDesc").value;
    var remark = _("textAddRemarks").value;
    var contactedNo = _("ddlContactNo").value;
    var duration = _("ddlDuration").value;
    var nextDate = _("txtAddModalNextDate").value;
    var userId = _("hidUserId").value;
//    var userId = _("hidUserId").value;    

    if (desc === "") {
        _("add-msgDiv").className = "alert alert-danger alert-dismissible text-text-danger";
        _("add-msgDiv").innerHTML = "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button> Description field can't be empty.";
        _("textAddDesc").focus();
        return false;
//    } else if (remark === "") {
//        _("add-msgDiv").className = "alert alert-danger alert-dismissible text-text-danger";
//        _("add-msgDiv").innerHTML = "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button> Remark field can't be empty.";
//        _("textAddRemarks").focus();
//        return false;
//    } else if (nextDate === "") {
//        _("add-msgDiv").className = "alert alert-danger alert-dismissible text-text-danger";
//        _("add-msgDiv").innerHTML = "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button> Please select a next call date.";
//        _("txtAddModalNextDate").focus();
//        return false;
    }
    var formdata = "desc=" + desc + "&remark=" + remark + "&contactedNo=" + contactedNo + "&duration=" + duration + "&nextDate=" + nextDate + "&userId=" + userId;
    var xmlhttp;
    if (window.XMLHttpRequest)
    { //code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else
    { //code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function ()
    {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200)
        {
            var rspText = xmlhttp.responseText;
//            alert(rspText);
            console.log(rspText);
            if (rspText === "success") {
                _("add-msgDiv").className = "alert alert-success  text-success";
                _("add-msgDiv").innerHTML = "Call details added successfully.";
                refeshCallDetailsTable();

                closeAddCallDetailsForm();
            } else {
                _("add-msgDiv").className = "alert alert-danger  text-text-danger";
                _("add-msgDiv").innerHTML = rspText;//"Error while adding call details.";
            }
        } else {
            _("add-msgDiv").className = "alert alert-success  text-success";
            _("add-msgDiv").innerHTML = "<button type='button' class='close' ><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button><img src='../images/loading_Animation.gif' alt='Loaing Image' style='height: 25px;'> Please wait...";
        }
    };
    xmlhttp.open('POST', '../ajax/ajax_addCallDetails.php', true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(formdata);
}

function closeAddCallDetailsForm() {
    _("textAddDesc").value = "";
    _("textAddRemarks").value = "";
    _("txtAddModalNextDate").value = "";
    _('frmAddCall').style.display = 'none';
    _("textAddDesc").focus();
}

// this function will be fired when the add call details modal will be closed
$('#myModal-add').on('hidden.bs.modal', function () {
    closeAddCallDetailsForm();
    _("add-msgDiv").className = "";
    _("add-msgDiv").innerHTML = "";
});

function viewEditCallDetailsForm() {
    var radioButton = document.getElementsByName("rdoDetailNo").length;
    var callHistoryId = 0;
    var counter = 0;
    for (var i = 0; i < radioButton; i++) {
        if (document.getElementsByName("rdoDetailNo")[i].checked === true) {
            callHistoryId = document.getElementsByName("rdoDetailNo")[i].value;
            counter++;
        }
    }
    if (counter === 0) {
        _("panel-body-msgDiv").className = "alert alert-danger alert-dismissible text-success";
        _("panel-body-msgDiv").innerHTML = "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button> Please select a call detail.   ";
        return false;
    } else {
        $('#myModal-edit').modal();
        var xmlhttp;

        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function ()
        {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200)
            {
                _("call-edit-modal").innerHTML = xmlhttp.responseText;
                displayEditCallDetailsDatePicker();
            } else {
                _("call-edit-modal").innerHTML = "<div style='margin-left: 40%;margin-top: 25%;margin-bottom: 25%;font-size: 23px;font-weight: bold;'> <img src='../images/loading_Animation.gif' alt='Loaing Image' style='height: 50px;'>Please wait...</div>";
            }
        };
        xmlhttp.open("GET", "../ajax/ajax_displayCallDetailsEditForm.php?callId=" + callHistoryId, true);
        xmlhttp.send();
    }
}

var updateCallDetails = function () {
//    textEditDesc, textEditRemarks, txtEditModalNextDate, ddlContactNo, ddlDuration
    var callId = _("hidCallId").value;
    var desc = _("textEditDesc").value;
    var remark = _("textEditRemarks").value;
    var contactedNo = _("ddlContact").value;
    var duration = _("ddlCallDuration").value;
    var nextDate = _("txtEditModalNextDate").value;

    if (desc === "") {
        _("edit-msgDiv").className = "alert alert-danger alert-dismissible text-text-danger";
        _("edit-msgDiv").innerHTML = "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button> Description field can't be empty.";
        _("textEditDesc").focus();
        return false;
//    } else if (remark === "") {
//        _("edit-msgDiv").className = "alert alert-danger alert-dismissible text-text-danger";
//        _("edit-msgDiv").innerHTML = "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button> Remark field can't be empty.";
//        _("textEditRemarks").focus();
//        return false;
//    } else if (nextDate === "") {
//        _("edit-msgDiv").className = "alert alert-danger alert-dismissible text-text-danger";
//        _("edit-msgDiv").innerHTML = "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button> Please select a next call date.";
//        _("txtEditModalNextDate").focus();
//        return false;
    }

    var formdata = "desc=" + desc + "&remark=" + remark + "&contact=" + contactedNo + "&duration=" + duration + "&nextDate=" + nextDate + "&callId=" + callId;
//    alert(formdata);
    var xmlhttp;
    if (window.XMLHttpRequest)
    { //code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else
    { //code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function ()
    {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200)
        {
            var rspText = xmlhttp.responseText;
//            alert(rspText);
            if (rspText === "success") {
                _("edit-msgDiv").className = "alert alert-success alert-dismissible text-success";
                _("edit-msgDiv").innerHTML = "Call details updated successfully.";
                _("edit-detials-div").innerHTML = "";
                refeshCallDetailsTable();
            } else {
                _("edit-msgDiv").className = "alert alert-danger alert-dismissible text-text-danger";
                _("edit-msgDiv").innerHTML = "Error while updating Call details.";
            }
        }
        else {
            _("edit-msgDiv").className = "alert alert-success alert-dismissible text-success";
            _("edit-msgDiv").innerHTML = "Please wait...";
        }
    };
    xmlhttp.open('POST', '../ajax/ajax_updateCallDetails.php', true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(formdata);
};

// this function will be fired when the add call details modal will be closed
$('#myModal-edit').on('hidden.bs.modal', function () {
    _("panel-body-msgDiv").className = "";
    _("panel-body-msgDiv").innerHTML = "";
    closeCallDetailsEditFrom();
});

function closeCallDetailsEditFrom() {
    _("call-edit-modal").innerHTML = "";
}

function viewCallDetailsForm() {
    var radioButton = document.getElementsByName("rdoDetailNo").length;
    var callHistoryId = 0;
    var counter = 0;
    for (var i = 0; i < radioButton; i++) {
        if (document.getElementsByName("rdoDetailNo")[i].checked === true) {
            callHistoryId = document.getElementsByName("rdoDetailNo")[i].value;
            counter++;
        }
    }
    if (counter === 0) {
        _("panel-body-msgDiv").className = "alert alert-danger alert-dismissible text-danger";
        _("panel-body-msgDiv").innerHTML = "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button> Please select a call detail.   ";
        return false;
    } else {
        $('#myModal-view').modal();

        var xmlhttp;

        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function ()
        {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200)
            {
                _("call-view-modal").innerHTML = xmlhttp.responseText;
            } else {
                _("call-view-modal").innerHTML = "<div style='margin-left: 40%;margin-top: 25%;margin-bottom: 25%;font-size: 23px;font-weight: bold;'> <img src='../images/loading_Animation.gif' alt='Loaing Image' style='height: 50px;'>Please wait...</div>";
            }
        };
        xmlhttp.open("GET", "../ajax/ajax_viewCallDetails.php?callId=" + callHistoryId, true);
        xmlhttp.send();
    }
}

// this function will be fired when the add call details modal will be closed
$('#myModal-view').on('hidden.bs.modal', function () {
    _("panel-body-msgDiv").className = "";
    _("panel-body-msgDiv").innerHTML = "";
    closeCallDetailsViewFrom();
});

function closeCallDetailsViewFrom() {
    _("call-view-modal").innerHTML = "";
}

function searchCallDetails() {
    var userId = _("hidUserId").value;
    var lastCallDate = _("txtLastDate").value;
    var nextCallDate = _("txtNextDate").value;
    if (lastCallDate === "" && nextCallDate === "") {
        _("search-msgDiv").className = "alert alert-danger alert-dismissible text-danger";
        _("search-msgDiv").innerHTML = "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Please select a date."
        return false;
    } else {
        var xmlhttp;

        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function ()
        {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200)
            {
                _("frmTblAnnouncement").innerHTML = xmlhttp.responseText;
                refreshDataTable();
            } else {
                _("frmTblAnnouncement").innerHTML = "<div style='margin-left: 40%;margin-top: 25%;margin-bottom: 25%;font-size: 23px;font-weight: bold;'> <img src='../images/loading_Animation.gif' alt='Loaing Image' style='height: 50px;'>Please wait...</div>";
            }
        };
        xmlhttp.open("GET", "../ajax/ajax_searchCallDetails.php?lastDate=" + lastCallDate + "&nextDate=" + nextCallDate
                + "&userId=" + userId, true);
        xmlhttp.send();
    }
}

function resetSearchForm() {
    _("txtLastDate").value = "";
    _("txtNextDate").value = "";
    refeshCallDetailsTable();
}

function searchCandidateFromCareer(val) {
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function ()
    {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200)
        {
            var rspText = xmlhttp.responseText;
            _("tbl-search-result").innerHTML = rspText;
//                refreshDataTable();
        } else {
//                _("tbl-search-result").innerHTML = "<div style='margin-left: 40%;margin-top: 25%;margin-bottom: 25%;font-size: 23px;font-weight: bold;'> <img src='../images/loading_Animation.gif' alt='Loaing Image' style='height: 50px;'>Please wait...</div>";
        }
    };
    xmlhttp.open("GET", "../ajax/ajax_searchCandidateFromCareer.php?val=" + val, true);
    xmlhttp.send();
}

function searchCandidateFromCurrentOpenings(val) {
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function ()
    {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200)
        {
            var rspText = xmlhttp.responseText;
            _("tbl-search-result").innerHTML = rspText;
//                refreshDataTable();
        } else {
//                _("tbl-search-result").innerHTML = "<div style='margin-left: 40%;margin-top: 25%;margin-bottom: 25%;font-size: 23px;font-weight: bold;'> <img src='../images/loading_Animation.gif' alt='Loaing Image' style='height: 50px;'>Please wait...</div>";
        }
    };
    xmlhttp.open("GET", "../ajax/ajax_currentOpeningCandidateList.php?val=" + val, true);
    xmlhttp.send();
}

function searchCandidate(param) {
    if (param !== "" && param === 'all') {
        var url = "?param=" + "all";
        var xmlhttp;

        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function ()
        {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200)
            {
                var rspText = xmlhttp.responseText;
                _("tbl-search-result").innerHTML = rspText;
                refreshDataTable();
            } else {
                _("tbl-search-result").innerHTML = "<div style='margin-left: 40%;margin-top: 25%;margin-bottom: 25%;font-size: 23px;font-weight: bold;'> <img src='../images/loading_Animation.gif' alt='Loaing Image' style='height: 50px;'>Please wait...</div>";
            }
        };
        xmlhttp.open("GET", "../ajax/ajax_SearchCandidate.php" + url, true);
        xmlhttp.send();
    } else {
        var name = _("txtName").value;
        var qualification = _("cmbQualification").value;
        var year = _("cmbYear").value;
        var keyword = _("txtKeyword").value;
        var fromDate = _("txtLastDate").value;
        var toDate = _("txtNextDate").value;

        if (name === "" && qualification === "" && year === "" && keyword === "" && fromDate === "" && toDate === "") {
            _("search-msgDiv").className = "alert alert-danger alert-dismissible text-danger";
            _("search-msgDiv").innerHTML = "<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Field should not be left empty."
            return false;
        } else {
            var url = "?name=" + name + "&qualif=" + qualification + "&year=" + year + "&keyword=" + keyword + "&fromDate=" + fromDate + "&toDate=" + toDate;
            var xmlhttp;

            if (window.XMLHttpRequest)
            {// code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            }
            else
            {// code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function ()
            {
                if (xmlhttp.readyState === 4 && xmlhttp.status === 200)
                {
                    var rspText = xmlhttp.responseText;
                    _("tbl-search-result").innerHTML = rspText;
                    refreshDataTable();
                } else {
                    _("tbl-search-result").innerHTML = "<div style='margin-left: 40%;margin-top: 25%;margin-bottom: 25%;font-size: 23px;font-weight: bold;'> <img src='../images/loading_Animation.gif' alt='Loaing Image' style='height: 50px;'>Please wait...</div>";
                }
            };
            xmlhttp.open("GET", "../ajax/ajax_SearchCandidate.php" + url, true);
            xmlhttp.send();
        }
    }
}

function generareStaffList(staff, event) {

//    document.getElementById('modalBox').style.display= 'block';
//    document.getElementById('modalContent').style.display= 'block';

    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function ()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            var result = xmlhttp.responseText;
            if (result == 0) {
                document.getElementById("staffList").style.display = 'block';
                document.getElementById("staffSearchResult").innerHTML = 'No match';
            } else {
                document.getElementById("staffList").style.display = 'block';
                document.getElementById("staffList").innerHTML = result;
            }
        }
    }
    if (staff) {
        var key = event.keyCode;
        if (key === 13) {
            xmlhttp.open("GET", "../ajax/ajax_viewStaffList.php?staff=" + staff, true);
            xmlhttp.send();
        }
    }
    else {
        xmlhttp.open("GET", "../ajax/ajax_viewStaffList.php", true);
        xmlhttp.send();
    }


}
