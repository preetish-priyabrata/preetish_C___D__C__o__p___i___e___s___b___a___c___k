function show_submited_applications()
{
	var exam=document.getElementById("exam").value;
	var mnth=document.getElementById("mnth").value;
	var year=document.getElementById("year").value;
	if(exam!="" && mnth!="" && year!="")
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
						
                        document.getElementById("submited_apps").innerHTML = xmlhttp.responseText;
 

                    }
                }


                xmlhttp.open("GET", "ajax/show_submited_applications.php?examname="+exam+"&mon="+mnth+"&yr="+year, true);
                xmlhttp.send();	
	}
	else
	{
		alert("please enter all the information");
	}
}
function show_room_no(str)
{
	var exam=document.getElementById("exam").value;
	if(exam!="")
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
						
                        document.getElementById("roomno").innerHTML = xmlhttp.responseText;
 

                    }
                }


                xmlhttp.open("GET", "ajax/show_room_no.php?examname="+exam+"&center="+str, true);
                xmlhttp.send();	
	}
	else
	{
		alert("please enter all the information");
	}
}
function show_intimation_table()
{
	var exam=document.getElementById("exam").value;
	var mnth=document.getElementById("mnth").value;
	var year=document.getElementById("year").value;
	if(exam!="" && mnth!="" && year!="")
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
						
                        document.getElementById("show_intimation_table").innerHTML = xmlhttp.responseText;
 

                    }
                }


                xmlhttp.open("GET", "ajax/show_intimation_table.php?examname="+exam+"&mon="+mnth+"&yr="+year, true);
                xmlhttp.send();	
	}
	else
	{
		alert("please enter all the information");
	}
}
function show_qualified_table()
{
	var exam=document.getElementById("exam").value;
	var mnth=document.getElementById("mnth").value;
	var year=document.getElementById("year").value;
	if(exam!="" && mnth!="" && year!="")
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
						
                        document.getElementById("show_qualified_table").innerHTML = xmlhttp.responseText;
 

                    }
                }


                xmlhttp.open("GET", "ajax/show_qualified_table.php?examname="+exam+"&mon="+mnth+"&yr="+year, true);
                xmlhttp.send();	
	}
	else
	{
		alert("please enter all the information");
	}
}
function show_qualifieds()
{
	var co_ur=document.getElementById("co_ur").value;
	var co_bl=document.getElementById("co_bl").value;
	var co_bl_w=document.getElementById("co_bl_w").value;
	var co_bl_bpl=document.getElementById("co_bl_bpl").value;
	var co_obc_cl=document.getElementById("co_obc_cl").value;
	var co_obc_cl_w=document.getElementById("co_obc_cl_w").value;
	var co_obc_cl_bpl=document.getElementById("co_obc_cl_bpl").value;
	var co_obc_sl=document.getElementById("co_obc_sl").value;
	var co_obc_sl_w=document.getElementById("co_obc_sl_w").value;
	var co_obc_sl_bpl=document.getElementById("co_obc_sl_bpl").value;
	var co_st=document.getElementById("co_st").value;
	var co_st_w=document.getElementById("co_st_w").value;
	var co_st_bpl=document.getElementById("co_st_bpl").value;
	var co_sc=document.getElementById("co_sc").value;
	var co_sc_w=document.getElementById("co_sc_w").value;
	var co_sc_bpl=document.getElementById("co_sc_bpl").value;
	var co_pt=document.getElementById("co_pt").value;
	var co_pt_w=document.getElementById("co_pt_w").value;
	var exam1=document.getElementById("exam1").value;
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
						
                        document.getElementById("show_qualified").innerHTML = xmlhttp.responseText;
 

                    }
                }


                xmlhttp.open("GET", "ajax/show_qualified_info.php?c_ur="+co_ur+"&c_bl="+co_bl+"&c_bl_w="+co_bl_w+"&c_bl_bpl="+co_bl_bpl+"&c_obc_cl="+co_obc_cl+"&c_obc_cl_w="+co_obc_cl_w+"&c_obc_cl_bpl="+co_obc_cl_bpl+"&c_obc_sl="+co_obc_sl+"&c_obc_sl_w="+co_obc_sl_w+"&c_obc_sl_bpl="+co_obc_sl_bpl+"&c_st="+co_st+"&c_st_w="+co_st_w+"&c_st_bpl="+co_st_bpl+"&c_sc="+co_sc+"&c_sc_w="+co_sc_w+"&c_sc_bpl="+co_sc_bpl+"&c_pt="+co_pt+"&c_pt_w="+co_pt_w+"&exm1="+exam1, true);
                xmlhttp.send();	
	
}
function show_seat_reservation_info()
{
	var exam1=document.getElementById("exam1").value;
	var year1=document.getElementById("year1").value;
	var mnth1=document.getElementById("mnth1").value;
	if(exam1!="" && mnth1!="" && year1!="")
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
                        document.getElementById("seat_reservation_info").innerHTML = xmlhttp.responseText;
 

                    }
                }


                xmlhttp.open("GET", "ajax/show_seat_reservation_info.php", true);
                xmlhttp.send();	
	}
	else
	{
		alert("please enter all the information");
	}
}

function show_reservation_info()
{
	var exam2=document.getElementById("exam2").value;
	var year2=document.getElementById("year2").value;
	var mnth2=document.getElementById("mnth2").value;
	if(exam2!="" && mnth2!="" && year2!="")
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
                        document.getElementById("reservation_info").innerHTML = xmlhttp.responseText;
 

                    }
                }


                xmlhttp.open("GET", "ajax/show_reservation_info.php", true);
                xmlhttp.send();	
	}
	else
	{
		alert("please enter all the information");
	}
}
function show_updt_phn_pwd(str)
{
	document.getElementById('update').disabled = false;
	var utype=document.getElementById('utype2').value;
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
                        document.getElementById("show_user_info").innerHTML = xmlhttp.responseText;
 				
                    }
                }


                xmlhttp.open("GET", "ajax/show_updt_phn_pwd.php?username="+str+"&usertype="+utype, true);
                xmlhttp.send();	
	}
function show_updt_username(str)
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
                        document.getElementById("uname2").innerHTML = xmlhttp.responseText;
 				
                    }
                }


                xmlhttp.open("GET", "ajax/show_updt_username.php?usertype="+str, true);
                xmlhttp.send();	
	}
function show_del_username(str)
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
                        document.getElementById("uname3").innerHTML = xmlhttp.responseText;
 				
                    }
                }


                xmlhttp.open("GET", "ajax/show_del_username.php?usertype="+str, true);
                xmlhttp.send();	
	}
function show_manage_exam_updt_info(str)
{
	document.getElementById('update').disabled = false;
	var exam=document.getElementById('ename2').value;
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
                        document.getElementById("show_date_venue").innerHTML = xmlhttp.responseText;
 				$("#doe2").datepicker({
                     changeMonth: true,
                    changeYear: true,
					yearRange: "1980:2020",
					dateFormat: "yy-mm-dd" 
                });

                    }
                }


                xmlhttp.open("GET", "ajax/show_manage_exam_updt_info.php?examdep="+str +"&examname="+exam, true);
                xmlhttp.send();	
	}
function show_manage_exam_updt_dep(str)
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
                        document.getElementById("dep2").innerHTML = xmlhttp.responseText;
 

                    }
                }


                xmlhttp.open("GET", "ajax/show_manage_exam_updt_dep.php?examname="+str, true);
                xmlhttp.send();	
	}


function show_centre_todel()
{
	var exam=document.getElementById("ename3").value;
	var mnth=document.getElementById("mnth3").value;
	var year=document.getElementById("year3").value;
	if(exam=="state IT officer" && mnth=="Jan" && year=="2016")
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
                        document.getElementById("cen3").innerHTML = xmlhttp.responseText;
 

                    }
                }


                xmlhttp.open("GET", "ajax/show_centre.php", true);
                xmlhttp.send();	
	}
}
function show_centre()
{
	var exam=document.getElementById("ename2").value;
	var mnth=document.getElementById("mnth2").value;
	var year=document.getElementById("year2").value;
	if(exam=="state IT officer" && mnth=="Jan" && year=="2016")
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
                        document.getElementById("cen2").innerHTML = xmlhttp.responseText;
 

                    }
                }


                xmlhttp.open("GET", "ajax/show_centre.php", true);
                xmlhttp.send();	
	}
}
function show_centre_details(str)
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
                        document.getElementById("centre_details").innerHTML = xmlhttp.responseText;
 

                    }
                }


                xmlhttp.open("GET", "ajax/show_centre_details.php?centre="+str, true);
                xmlhttp.send();	
	}
function show_cat_details(examname)
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
                        document.getElementById("cat_result").innerHTML = xmlhttp.responseText;
 

                    }
                }
				xmlhttp.open("GET", "ajax/show_category_results.php?exam="+examname, true);
                xmlhttp.send();	
	}
	
function show_total_appeared()
{
	var exam=document.getElementById("exam").value;
	var year=document.getElementById("year").value;
	var mnth=document.getElementById("mnth").value;
	//var cutoffmark=document.getElementById("cutoffmark").value;
	if((exam!="") && (year!="") && (mnth!=""))
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
                        document.getElementById("show_total_appeared").innerHTML = xmlhttp.responseText;
 

                    }
                }


                xmlhttp.open("GET", "ajax/show_total_appeared.php?examname="+exam+"&mon="+mnth+"&yr="+year, true);
                xmlhttp.send();	
	}
	else
	{
		alert("Please enter all the information");
	}
		}

function show_collect_attendance()
{
	
	var exam=document.getElementById("exam").value;
	var year=document.getElementById("year").value;
	var mnth=document.getElementById("mnth").value;
	var cen=document.getElementById("center").value;
	if((exam!="") && (year!="") && (mnth!="") && (center!=""))
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
                        document.getElementById("show_report").innerHTML = xmlhttp.responseText;
 

                    }
                }


                xmlhttp.open("GET", "ajax/show_collect_attendance.php?exam_name="+exam+"&mon="+mnth+"&yr="+year+"&centre="+cen, true);
                xmlhttp.send();	
	}
	else
	{
		alert("Please enter all the information");
	}
		}
function show_candidate_rollno()
{
	
	var exam=document.getElementById("exam").value;
	var year=document.getElementById("year").value;
	var mnth=document.getElementById("mnth").value;
	var cen=document.getElementById("center").value;
	if((exam!="") && (year!="") && (mnth!="") && (center!=""))
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
                        document.getElementById("show_report").innerHTML = xmlhttp.responseText;
 

                    }
                }


                xmlhttp.open("GET", "ajax/show_candidates_rollno.php?exam_name="+exam+"&mon="+mnth+"&yr="+year+"&centre="+cen, true);
                xmlhttp.send();	
	}
	else
	{
		alert("Please enter all the information");
	}
		}
function show_center_report()
{
	var exam=document.getElementById("exam").value;
	var year=document.getElementById("year").value;
	var mnth=document.getElementById("mnth").value;
	var center=document.getElementById("center").value;
	if((exam!="") && (year!="") && (mnth!="") && (center!=""))
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
                        document.getElementById("show_report").innerHTML = xmlhttp.responseText;
 

                    }
                }


                xmlhttp.open("GET", "ajax/show_center_attnd_report.php?exam_name="+exam+"&mon="+mnth+"&yr="+year+"&center="+center, true);
                xmlhttp.send();	
	}
	else
	{
		alert("Please enter all the information");
	}
		}
function show_concise_report()
{
	var exam=document.getElementById("exam").value;
	var year=document.getElementById("year").value;
	var mnth=document.getElementById("mnth").value;
	if((exam!="") && (year!="") && (mnth!=""))
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
                        document.getElementById("show_report").innerHTML = xmlhttp.responseText;
 

                    }
                }


                xmlhttp.open("GET", "ajax/show_concise_attnd_report.php?exam_name="+exam+"&mon="+mnth+"&yr="+year, true);
                xmlhttp.send();	
	}
	else
	{
		alert("Please enter all the information");
	}
		}
function show_result_info()
{
	var exam=document.getElementById("exam").value;
	var year=document.getElementById("year").value;
	var mnth=document.getElementById("mnth").value;
	if((exam!="") && (year!="") && (mnth!=""))
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
                        document.getElementById("show_result").innerHTML = xmlhttp.responseText;
 

                    }
                }


                xmlhttp.open("GET", "ajax/show_result_report.php?exam_name="+exam+"&mon="+mnth+"&yr="+year, true);
                xmlhttp.send();	
	}
	else
	{
		alert("Please enter all the information");
	}
		}

function preview_acard()
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
                        document.getElementById("preview_acard").innerHTML = xmlhttp.responseText;
 

                    }
                }


                xmlhttp.open("GET", "ajax/show_admitcard.php", true);
                xmlhttp.send();	
	
		}
function show_query(qryhead)
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
                        document.getElementById("show_query").innerHTML = xmlhttp.responseText;
 

                    }
                }


                xmlhttp.open("GET", "ajax/admin_show_query.php?qry_hd="+qryhead, true);
                xmlhttp.send();	
	
		}
function show_cand_app()
{
	var dob=document.getElementById("dob").value;
	var appno=document.getElementById("appno").value;
	if((dob!="") || (appno!=""))
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
                        document.getElementById("show_app_info").innerHTML = xmlhttp.responseText;
 

                    }
                }


                xmlhttp.open("GET", "ajax/show_cand_app.php", true);
                xmlhttp.send();	
	}
	else
	{
		alert("Please enter DOB & application no");
	}
		}
function show_app_info()
{
	var fromdt=document.getElementById("fromdt").value;
	var todt=document.getElementById("todt").value;
	if((fromdt!="") && (todt!=""))
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
                        document.getElementById("show_app_info").innerHTML = xmlhttp.responseText;
 

                    }
                }


                xmlhttp.open("GET", "ajax/show_searched_apps.php", true);
                xmlhttp.send();	
	}
	else
	{
		alert("Please enter date");
	}
		}
function show_admin_app_info()
{
	var exam=document.getElementById("exam").value;
	var year=document.getElementById("year").value;
	var mnth=document.getElementById("mnth").value;
	if((exam!="") && (year!="") && (mnth!=""))
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
                        document.getElementById("show_app_info").innerHTML = xmlhttp.responseText;
 

                    }
                }


                xmlhttp.open("GET", "ajax/show_admin_searched_apps.php?exam_name="+exam+"&mon="+mnth+"&yr="+year, true);
                xmlhttp.send();	
	}
	else
	{
		alert("Please enter all the information");
	}
		}
function show_total_candidate()
{
	var exam=document.getElementById("exam").value;
	var year=document.getElementById("year").value;
	var mnth=document.getElementById("mnth").value;
	if((exam!="") && (year!="") && (mnth!=""))
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
                        document.getElementById("show_total_candidate").innerHTML = xmlhttp.responseText;
 

                    }
                }


                xmlhttp.open("GET", "ajax/show_total_candidate.php?exam_name="+exam+"&mon="+mnth+"&yr="+year, true);
                xmlhttp.send();	
	}
	else
	{
		alert("Please enter all the information");
	}
		}
function show_no_of_enrolled_candidate()
{
	var exam=document.getElementById("exam").value;
	var year=document.getElementById("year").value;
	var mnth=document.getElementById("mnth").value;
	var cen=document.getElementById("center").value;
	if((exam!="") && (year!="") && (mnth!="") && (cen!=""))
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
                        document.getElementById("show_no_of_enrolled_candidate").innerHTML = xmlhttp.responseText;
 

                    }
                }


                xmlhttp.open("GET", "ajax/show_no_of_enrolled_candidate.php?exam_name="+exam+"&mon="+mnth+"&yr="+year+"&centre="+cen, true);
                xmlhttp.send();	
	}
	else
	{
		alert("Please enter all the information");
	}
		}
function show_total_enrolled_candidate_for_acard()
{
	var exam=document.getElementById("exam").value;
	var year=document.getElementById("year").value;
	var mnth=document.getElementById("mnth").value;
	var cen=document.getElementById("center").value;
	if((exam!="") && (year!="") && (mnth!="") && (cen!=""))
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
                        document.getElementById("show_total_enrolled_candidate_for_acard").innerHTML = xmlhttp.responseText;
 

                    }
                }


                xmlhttp.open("GET", "ajax/show_total_enrolled_candidate_for_acard.php?exam_name="+exam+"&mon="+mnth+"&yr="+year+"&centre="+cen, true);
                xmlhttp.send();	
	}
	else
	{
		alert("Please enter all the information");
	}
		}
function show_pe_app_info()
{
	var exam=document.getElementById("exam").value;
	var year=document.getElementById("year").value;
	var mnth=document.getElementById("mnth").value;
	if((exam!="") && (year!="") && (mnth!=""))
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
                        document.getElementById("show_app_info").innerHTML = xmlhttp.responseText;
 

                    }
                }


                xmlhttp.open("GET", "ajax/show_pe_searched_apps.php?exam_name="+exam+"&yr="+year+"&mon="+mnth, true);
                xmlhttp.send();	
	}
	
	else
	{
		alert("Please enter exam, year & month");
	}
		}
function view_app_submitted(str)
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
                        document.getElementById("app_submitted").innerHTML = xmlhttp.responseText;
 

                    }
                }


                xmlhttp.open("GET", "ajax/view_app_submitted.php?exam_name="+str, true);
                xmlhttp.send();	
		}

function view_app_approved()
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
                        document.getElementById("app_approved").innerHTML = xmlhttp.responseText;
 

                    }
                }


                xmlhttp.open("GET", "ajax/view_app_approved.php", true);
                xmlhttp.send();	
		}
function view_app_rejected()
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
                        document.getElementById("app_rejected").innerHTML = xmlhttp.responseText;
 

                    }
                }


                xmlhttp.open("GET", "ajax/view_app_rejected.php", true);
                xmlhttp.send();	
		}
function show_q_details(str)
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
                        document.getElementById("q_nq_details").innerHTML = xmlhttp.responseText;
 

                    }
                }


                xmlhttp.open("GET", "ajax/show_qualified.php?exam="+str, true);
                xmlhttp.send();	
		}
function show_nq_details()
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
                        document.getElementById("q_nq_details").innerHTML = xmlhttp.responseText;
 

                    }
                }


                xmlhttp.open("GET", "ajax/show_not_qualified.php", true);
                xmlhttp.send();	
		}
function view_enrolled_cand_list_for_acard(str1, str2)
{
	document.getElementById("generate_preview").style.display="block";
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
                        document.getElementById("view_enrolled_cand_list_for_acard").innerHTML = xmlhttp.responseText;
 

                    }
                }


                xmlhttp.open("GET", "ajax/view_enrolled_cand_list_for_acard.php?exam="+str1+"&centre="+str2, true);
                xmlhttp.send();	
		}		
function view_enrolled_cand_list(str1, str2)
{
	document.getElementById("generate_preview").style.display="block";
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
                        document.getElementById("view_enrolled_cand_list").innerHTML = xmlhttp.responseText;
 

                    }
                }


                xmlhttp.open("GET", "ajax/view_enrolled_cand_list.php?exam="+str1+"&centre="+str2, true);
                xmlhttp.send();	
		}
		
function view_enrollment_no(str)
{
	document.getElementById("generate_preview").style.display="block";
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
                        document.getElementById("enrollment_no").innerHTML = xmlhttp.responseText;
 

                    }
                }


                xmlhttp.open("GET", "ajax/view_enrollment_no.php?exam="+str, true);
                xmlhttp.send();	
		}
function show_exam_date(str)
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
                        document.getElementById("centre_data").innerHTML = xmlhttp.responseText;
 

                    }
                }


                xmlhttp.open("GET", "ajax/show_exam_date.php?exam="+str, true);
                xmlhttp.send();	
		}		
function show_all_admitcard()
{
	var exam=document.getElementById("exam").value;
	var year=document.getElementById("year").value;
	var mnth=document.getElementById("mnth").value;
	if((exam!="") && (year!="") && (mnth!=""))
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
                        document.getElementById("preview_acard").innerHTML = xmlhttp.responseText;
 

                    }
                }


                xmlhttp.open("GET", "ajax/show_all_admitcard.php", true);
                xmlhttp.send();	
		}
	else
	{
		alert("Please enter all the information");
	}
		}
function show_admitcard()
{
	var exam=document.getElementById("exam").value;
	var year=document.getElementById("year").value;
	var mnth=document.getElementById("mnth").value;
	var rollno=document.getElementById("rollno").value;
	if((exam!="") && (year!="") && (mnth!="") && (rollno!=""))
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
                        document.getElementById("show_all").innerHTML = xmlhttp.responseText;
 

                    }
                }


                xmlhttp.open("GET", "ajax/show_admitcard.php", true);
                xmlhttp.send();	
		}
	else
	{
		alert("Please enter all the information");
	}
		}