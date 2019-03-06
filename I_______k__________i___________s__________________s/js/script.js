    function showTextarea(str) {
        var value = document.getElementById(str).value;
        if (value == 'others') {
            if (document.getElementById('textarea_' + str).style.display == 'none') {
                document.getElementById('textarea_' + str).style.display = 'block';
            } else {
                document.getElementById('textarea_' + str).style.display = 'none';
            }
        } else {
            document.getElementById('textarea_' + str).style.display = 'none';
        }

    }

    function showTextBox(distance) {
        var dist = document.getElementById(distance).value;
        if (dist == 4 || dist == 5 || dist == 'others' || dist == 'pg') {
            document.getElementById('distance').style.display = 'block';
        }
        else {
            document.getElementById('distance').style.display = 'none';
        }
    }

    function showTextBoxClass(idValue) {
        var dist = document.getElementById(idValue).value;
        if (dist == 'pg') {
            document.getElementById('class').style.display = 'block';
        }
        else {
            document.getElementById('class').style.display = 'none';
        }
    }

    function showCheckedValue(checkedValue) {
        var textBox = document.getElementById('edu_infra').value;
        var textboxValue = textBox.concat(checkedValue + ',');
        document.getElementById('edu_infra').value = textboxValue;
    }

//            total1male2female2total2male3female3total3male_totalfemale_totaltotal_membercalculteTotalMember(this.id)
    function calculteTotalMember(memberClass) {
        var num = memberClass.slice(-1);
        var elements = document.getElementsByClassName(memberClass);
        var total = 0;

        for (var i = 0; i < elements.length; ++i) {
            total += parseInt(elements[i].value);
        }
        var rowTotal = 'total' + num;

        var male = document.getElementsByClassName('male_row');
        var male_total = 0;

        for (var i = 0; i < male.length; ++i) {
            male_total += parseInt(male[i].value);
        }

        var female = document.getElementsByClassName('female_row');
        var female_total = 0;

        for (var i = 0; i < female.length; ++i) {
            female_total += parseInt(female[i].value);
        }
        var grand_total = male_total + female_total;
        document.getElementById(rowTotal).value = total;
        document.getElementById('male_total').value = male_total;
        document.getElementById('female_total').value = female_total;
        document.getElementById('total_member').value = grand_total;

    }

    function showYear(yearValue) {
        if (yearValue == '+2 Science' || yearValue == '+2 Commerce' || yearValue == '+2 Arts') {
            document.getElementById('+2year').style.display = "block";
        }
        else {
            document.getElementById('+2year').style.display = "none";
        }
        if (yearValue == '+3 Science' || yearValue == '+3 Commerce' || yearValue == '+3 Arts') {
            document.getElementById('+3year').style.display = "block";
        }
        else {
            document.getElementById('+3year').style.display = "none";
        }
    }

    function scrolTop() {

        var bodyRect = document.body.getBoundingClientRect();    // Y- Offset from top
        var duration = 750;

        event.preventDefault();
        jQuery(' html , body ').animate({scrollTop: 0}, duration);
        return false;
    }

    jQuery(document).ready(function () {
        $('.nav-tabs-top a[data-toggle="tab"]').on('click', function () {
            $('.nav-tabs-bottom li.active').removeClass('active')
            $('.nav-tabs-bottom a[href="' + $(this).attr('href') + '"]').parent().addClass('active');
        });

        $('.nav-tabs-bottom a[data-toggle="tab"]').on('click', function () {
            $('.nav-tabs-top li.active').removeClass('active')
            $('.nav-tabs-top a[href="' + $(this).attr('href') + '"]').parent().addClass('active');
        });

    });




    $(document).ready(function () {
        $("#uploadimage1").on('submit', (function (e) {
            e.preventDefault();
            $("#message1").empty();
            $('#loading1').show();
            $.ajax({
                url: "../../includes/ajax/update_mandap_gallery.php", // Url to which the request is send
                type: "POST", // Type of request to be send, called as method
                data: new FormData(this), // Data sent to server, a set of key/value pairs representing form fields and values 
                contentType: false, // The content type used when sending data to the server. Default is: "application/x-www-form-urlencoded"
                cache: false, // To unable request pages to be cached
                processData: false, // To send DOMDocument or non processed data file it is set to false (i.e. data should not be in the form of string)
                success: function (data)  		// A function to be called if request succeeds
                {
                    $('#loading1').hide();
                    $("#message1").html(data);
                }
            });
        }));

// Function to preview image
        $(function () {
            $("#file1").change(function () {
                $("#message1").empty();         // To remove the previous error message
                var file = this.files[0];
                var imagefile = file.type;
                var match = ["image/jpeg", "image/png", "image/jpg"];
                if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2])))
                {
                    $('#previewing1').attr('alt', 'No Image Selected Yet !');
                    $("#message1").html("<p id='error'>Please Select A valid Image File</p>" + "<h4>Note</h4>" + "<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
                    return false;
                }
                else
                {
                    var reader = new FileReader();
                    reader.onload = imageIsLoaded;
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
        function imageIsLoaded(e) {
            //$("#file1").css("color","green");
            $('#previewing1').attr('src', e.target.result);
            //$('#previewing1').css('width', '383px');
            $('#previewing1').css('height', '190px');
            $('#previewing1').css('padding', '0px');
            $('#previewing1').css('margin-bottom', '0px');
        }
        ;
    });


    function showValue(radioVal) {
        if (radioVal == 'Tailoring') {
            document.getElementById('tailoring').style.display = 'block';
        }
        else {
            document.getElementById('tailoring').style.display = 'none';
        }
        if (radioVal == 'Chemical Products') {
            document.getElementById('chemical').style.display = 'block';
        }
        else {
            document.getElementById('chemical').style.display = 'none';
        }
        if (radioVal == 'Knitting') {
            document.getElementById('knitting').style.display = 'block';
        }
        else {
            document.getElementById('knitting').style.display = 'none';
        }
        if (radioVal == 'Applique') {
            document.getElementById('applique').style.display = 'block';
        }
        else {
            document.getElementById('applique').style.display = 'none';
        }
        if (radioVal == 'Art_Craft') {
            document.getElementById('art_craft').style.display = 'block';
        }
        else {
            document.getElementById('art_craft').style.display = 'none';
        }
    }

    function showTribeTypes(tribe_value) {
        if (tribe_value == 'scheduled') {
            document.getElementById('sch_tribes').style.display = 'block';
            document.getElementById('prm_tribes').style.display = 'none';
        }
        else if (tribe_value == 'primitive') {
            document.getElementById('prm_tribes').style.display = 'block';
            document.getElementById('sch_tribes').style.display = 'none';
        }
    }


    function showDistrict(state) {
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
            xmlhttp.open("GET", "./ajax/getDistrict.php?state=" + state, true);
            xmlhttp.send();
        }
//                    showBlock(district_name.value,this.id);
    }

    function showBlock(district, state) {
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
            xmlhttp.open("GET", "./ajax/getBlock.php?district=" + district + "&state=" + stateName, true);
            xmlhttp.send();
        }
    }

    function showDropouts(val) {
        if (val == 'Yes') {
            document.getElementById('dropout_tr').style.display = "block";
            document.getElementById('dropout_row').style.display = "block";
        }
        else {
            document.getElementById('dropout_tr').style.display = "none";
            document.getElementById('dropout_row').style.display = "none";
        }
    }

    function findDistance(blockName) {
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
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
                document.getElementById("distance_village").value = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "./ajax/getDistance.php?block=" + blockName, true);
        xmlhttp.send();
    }
    function checkBlockname() {
    var block_name=document.getElementById("block_name").value;
    if (block_name == "") {
        document.getElementById("error_block_name").innerHTML = "Please enter a block name";
        return true;
    } 
}