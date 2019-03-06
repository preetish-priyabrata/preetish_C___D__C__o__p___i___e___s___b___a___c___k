function showTribe_Types(str) 
{
	if (window.XMLHttpRequest) 
			 {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } 
				else 
				{
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () 
				{
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
                        document.getElementById("tribetype").innerHTML = xmlhttp.responseText;
                    }
                }


                xmlhttp.open("GET", "ajax/tribetype.php?tribename="+str, true);
                xmlhttp.send();	
    }
function showsection(str)
		{
			if (window.XMLHttpRequest) 
			 {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } 
				else 
				{
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () 
				{
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
                        document.getElementById("section").innerHTML = xmlhttp.responseText;
                    }
                }


                xmlhttp.open("GET", "ajax/showsection.php?class="+str, true);
                xmlhttp.send();	
		}

function updt_showDistrict(state, sid) {
	
        if (state == "") {
            document.getElementById("district_name").innerHTML = "<option value=''>--Select--</option>";
            return;
        } else {
			
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("district_name").innerHTML = xmlhttp.responseText;
                    showBlock(document.getElementById("district_name").value, 'state');
                }
            }
			
            xmlhttp.open("GET", "ajax/updt_getDistrict.php?state=" + state + "&stdid=" + sid, true);
			
            xmlhttp.send();
        }
//                    showBlock(district_name.value,this.id);
    }

    function updt_showBlock(district, state) {
        var stateName = document.getElementById(state).value;
        if (district == "") {
            document.getElementById("block_name").innerHTML = "<option value=''>--Select--</option>";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("block_name").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "ajax/updt_getBlock.php?district=" + district + "&state=" + stateName, true);
            xmlhttp.send();
        }
    }

function showBlock(str)
		{
			 if (window.XMLHttpRequest) 
			 {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } 
				else 
				{
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () 
				{
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
                        document.getElementById("block_interface").innerHTML = xmlhttp.responseText;
                    }
                }


                xmlhttp.open("GET", "ajax/search_block.php?dist="+str, true);
                xmlhttp.send();	
		}

function showrecords(str)
		{
			if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById("student_info").innerHTML = xmlhttp.responseText;
                    }
                }
//+"&num="+num

                xmlhttp.open("GET", "ajax/show_records.php?query="+str, true);
                xmlhttp.send();	
		}
function get_students(qry)
{
	var activity = document.getElementById("activity").checked;
	var sports_games = document.getElementById("sports_games").checked;
	var music = document.getElementById("music").checked;
	var dance = document.getElementById("dance").checked;
	var instrumental = document.getElementById("instrumental").checked;
	var yoga_meditation = document.getElementById("yoga_meditation").checked;
	var vocat = document.getElementById("voca").checked;
	var english_access= document.getElementById("english").checked;
	var submit_btn= document.getElementById("submit").value;
	if (window.XMLHttpRequest) {
		
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById("student_info").innerHTML = xmlhttp.responseText;
                    }
                }
//+"&num="+num

                xmlhttp.open("GET", "ajax/show_records.php?activity="+activity+"&sports="+sports_games+"&music="+music+"&dance="+dance+"&instrumental="+instrumental+"&yogameditation="+yoga_meditation+"&vocational="+vocat+"&englishaccess="+english_access+"&submit="+submit_btn+"&query="+qry, true);
                xmlhttp.send();	
}
	