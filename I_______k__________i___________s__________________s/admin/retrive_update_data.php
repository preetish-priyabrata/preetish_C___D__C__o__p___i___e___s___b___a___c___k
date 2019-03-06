<?php

//General Information by Students/Parents
error_reporting(0);
session_start();
if (isset($_REQUEST['update'])) {

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    #############################
    #STUDENT GENERAL INFORAMTION#
    #############################
//Student General Infomation for 'std_general_information'
	$bpl_card_no= test_input($_REQUEST['bpl_card_no']);
    $std_name = test_input($_REQUEST['name']);
    $join_year = $_REQUEST['yoj'];
    $join_class = $_REQUEST['coj'];
    if ($_REQUEST['pg_stream_coj'] != "") {
        $pg_specialization = $_REQUEST['pg_stream_coj'];
    }
    $info_kiss = test_input($_REQUEST['know']);
    $gender = $_REQUEST['gender'];
    $maritial_status = $_REQUEST['Mstatus'];
    $class = $_REQUEST['standard'];
    if ($_REQUEST['pg'] != "") {
        $class_yr = $_REQUEST['pg'];
    } else if ($_REQUEST['+2year'] != "") {
        $class_yr = $_REQUEST['+2year'];
    } else if ($_REQUEST['+3year'] != "") {
        $class_yr = $_REQUEST['+3year'];
    }
    $section = test_input($_REQUEST['section']);
    $roll_no = test_input($_REQUEST['rollNo']);
    $blood_group = $_REQUEST['bgroup'];

    //date of birth
    $dob = $_REQUEST['date'] . '/' . $_REQUEST['month'] . '/' . $_REQUEST['years'];
    $mentor_name = test_input($_REQUEST['mentor']);
    $mentor_ph = test_input($_REQUEST['mentor_ph']);
    $l_gaurdian_name = test_input($_REQUEST['local_gaurdian']);
    $l_gaurdian_ph = test_input($_REQUEST['Lcontact']);
    $parents_ph = test_input($_REQUEST['Pcontact']);
    
    $str1 = "UPDATE `std_general_information` SET std_bpl_card_no='$bpl_card_no',  std_name='$std_name',join_year='$join_year',join_class='$join_class',pg_specialization='$pg_specialization',info_kiss='$info_kiss',gender='$gender',maritial_status='$maritial_status',class='$class',class_year='$class_yr',section='$section',roll_no='$roll_no',blood_group='$blood_group',dob='$dob',mentor_name='$mentor_name',mentor_ph='$mentor_ph',l_gaurdian_name='$l_gaurdian_name',l_gaurdian_ph='$l_gaurdian_ph',parents_ph='$parents_ph' WHERE `std_id`='$sid'";

    $sql1 = mysqli_query($con, $str1);
//Student General Information for 'std_general_geo'	

    $mother_name = test_input($_REQUEST['motherName']);
    $father_name = test_input($_REQUEST['fatherName']);
    $state_name = $_REQUEST['state'];
    $district_name = $_REQUEST['district_name'];
    $block_name = $_REQUEST['block_name'];
    $panchayat_name = test_input($_REQUEST['panchayat']);
    $village_name = test_input($_REQUEST['village']);
    $disstance_to_kiss = test_input($_REQUEST['distance_village']);
    $tribe_name = $_REQUEST['tribe'];
	if ($_REQUEST['tribe']=="scheduled" && $_REQUEST['sch_tribes']!="") {
        $tribe_type = $_REQUEST['sch_tribes'];
    } else if ($_REQUEST['tribe']=="primitive" && $_REQUEST['prm_tribes']!="") {
        $tribe_type = $_REQUEST['prm_tribes'];
    }
    $dialect_speek = $_REQUEST['dialect'];
    $diff_able_cat = $_REQUEST['belongs'];
    $religion = $_REQUEST['religion'];
    if (test_input($_REQUEST['textarea_religion']) != "") {
        $religion_other = test_input($_REQUEST['textarea_religion']);
    }


   $str2 = "UPDATE std_general_geo SET mother_name='$mother_name',father_name='$father_name',state_name='$state_name',district_name='$district_name',block_name='$block_name',panchayat_name='$panchayat_name',village_name='$village_name',disstance_to_kiss='$disstance_to_kiss',tribe_name='$tribe_name',tribe_type='$tribe_type',dialect_speek='$dialect_speek',diff_able_cat='$diff_able_cat',religion='$religion',religion_other='$religion_other' WHERE `std_id`='$sid'";


    $sql2 = mysqli_query($con, $str2);

    ########################
    #HOUSE HOLD INFORMATION#
    ########################
//Student House Hold Information for 'std_household_background'

    $male_0_6 = test_input($_REQUEST['male1']);
    $male_7_17 = test_input($_REQUEST['male2']);
    $adult_male = test_input($_REQUEST['male3']);
    $female_0_6 = test_input($_REQUEST['female1']);
    $female_7_17 = test_input($_REQUEST['female2']);
    $adult_female = test_input($_REQUEST['female3']);
    $total_male = test_input($_REQUEST['male_total']);
    $total_female = test_input($_REQUEST['female_total']);
    $total_member = test_input($_REQUEST['total_member']);

    $str3 = "UPDATE `std_household_background` SET `0_6_male`='$male_0_6', `7_17_male`='$male_7_17', `adult_male`='$adult_male', `0_6_female`='$female_0_6', `7_17_female`='$female_7_17', `adult_female`='$adult_female', `total_male`='$total_male', `total_female`='$total_female', `total_member`='$total_member' WHERE `std_id`='$sid'";

    $sql3 = mysqli_query($con, $str3);

//Student House Hold Information for 'std_household_rel_education'
    //note: array here
   $query1="DELETE FROM std_household_rel_education where `std_id`='$sid'";
   $result1=mysqli_query($con,$query1);
											   
	$relative_name = $_REQUEST['rel_name'];
    $relative_class = $_REQUEST['rel_class'];
    $relation = $_REQUEST['relationship'];

    for ($i = 0; $i < count($relative_name); $i++) {
        if ($relative_name[$i] != "") {
            $relative_Name = test_input($relative_name[$i]);
            $relative_Class = test_input($relative_class[$i]);
            $Relation = test_input($relation[$i]);
            $str4 = "INSERT INTO std_household_rel_education SET std_id='$sid',relative_name='$relative_Name',relative_class='$relative_Class',relation='$Relation'";
            $sql4 = mysqli_query($con, $str4);
        }
    }
											   //while($row=mysqli_fetch_assoc($result1))
//											   {
//											    $json1[] = $row["std_rel_id"];
//												  }
//												$std_rel_id=explode('"',json_encode($json1));
//												$Rel_id= (count($std_rel_id)-(count($std_rel_id)/2));
    //for ($i = 0; $i < count($relative_name); $i++) 
//	{
//			$relative_Name = test_input($relative_name[$i]);
//            $relative_Class = test_input($relative_class[$i]);
//            $Relation = test_input($relation[$i]);
//			for ($j = 0; $j < $Rel_id; $j++) 
//			{
//			$k=1;		
//			$str4 = "UPDATE std_household_rel_education SET relative_name='$relative_Name', relative_class='$relative_Class', relation='$Relation' WHERE std_id='$sid' AND std_rel_id='$std_rel_id[$k]'";
//            $sql4 = mysqli_query($con, $str4);
//			$k+2;
//			}
//			if($relative_name[$i]!="")
//			{
//			$str_insert1 = "INSERT INTO std_household_rel_education SET std_rel_id=NULL, std_id='$sid', relative_name='$relative_Name', relative_class='$relative_Class', relation='$Relation'";
//            $sql_insert1 = mysqli_query($con, $str_insert1);
//			}
//	}
//Student House Hold Information for 'std_household_occupation'

    $male_earn = test_input($_REQUEST['male_earn']);
    $female_earn = test_input($_REQUEST['female_earn']);
    $occu_primary = test_input($_REQUEST['erning_primary']);
    $occu_secondary = test_input($_REQUEST['erning_secondary']);
    $occu_code = test_input($_REQUEST['occu_code']);

    $str5 = "UPDATE `std_household_occupation` SET `male_earn`='$male_earn', `female_earn`='$female_earn', `occu_primary`='$occu_primary', `occu_secondary`='$occu_secondary', `occu_code`='$occu_code' WHERE `std_id`='$sid'";
    $sql5 = mysqli_query($con, $str5);

//Student House Hold Information for 'std_household_drink_source'

    $open_well_owner = test_input($_REQUEST['openwell']);
    $open_well_quality = test_input($_REQUEST['openwell2']);
    $tube_well_owner = test_input($_REQUEST['tubewell']);
    $tube_well_quality = test_input($_REQUEST['tubewell2']);
    $piped_owner = test_input($_REQUEST['piped']);
    $piped_quality = test_input($_REQUEST['piped2']);
    $PTR_owner = test_input($_REQUEST['ptr']);
    $PTR_quality = test_input($_REQUEST['ptr2']);
    $other_owner = test_input($_REQUEST['others']);
    $other_quality = test_input($_REQUEST['others2']);
    $problem_info = test_input($_REQUEST['waterplm']);

    $str6 = "UPDATE `std_household_drink_source` SET `open_well_owner`='$open_well_owner', `open_well_quality`='$open_well_quality', `tube_well_owner`='$tube_well_owner', `tube_well_quality`='$tube_well_quality', `piped_owner`='$piped_owner', `piped_quality`='$piped_quality', `PTR_owner`='$PTR_owner', `PTR_quality`='$PTR_quality', `other_owner`='$other_owner', `other_quality`='$other_quality', `problem_info`='$problem_info' WHERE `std_id`='$sid'";

    $sql6 = mysqli_query($con, $str6);

//Student House Hold Information for 'std_household_stock_poultry'

    $num_cow = test_input($_REQUEST['cow']);
    $num_bullock = test_input($_REQUEST['bullock']);
    $num_buffalo = test_input($_REQUEST['buffalo']);
    $num_calf = test_input($_REQUEST['calf']);
    $num_goat = test_input($_REQUEST['sheep']);
    $num_poultry = test_input($_REQUEST['poultry']);
    $num_others = test_input($_REQUEST['others']);

    $str7 = "UPDATE `std_household_stock_poultry SET `num_cow`='$num_cow', `num_bullock`='$num_bullock', `num_buffalo`='$num_buffalo', `num_calf`='$num_calf', `num_goat`='$num_goat', `num_poultry`='$num_poultry', `num_others`='$num_others' WHERE `std_id`='$sid'";

    $sql7 = mysqli_query($con, $str7);

//Student House Hold Information for 'std_household_house_type'

    $mud_house_hut = test_input($_REQUEST['mud_house_hut']);
    $mudhouse_hut_room = test_input($_REQUEST['mudhouse']);
    $thatched_house = test_input($_REQUEST['thatched_house']);
    $thatched_room = test_input($_REQUEST['thachedhouse']);
    $semi_pucca = test_input($_REQUEST['semi_pucca']);
    $semi_pucca_room = test_input($_REQUEST['semipucca']);
    $pucca = test_input($_REQUEST['Pucca']);
    $pucca_room = test_input($_REQUEST['pucca']);
    $other = test_input($_REQUEST['Other']);
    $other_room = test_input($_REQUEST['other']);

    $str8 = "UPDATE `std_household_house_type` SET `mud_house_hut`='$mud_house_hut', `mudhouse_hut_room`='$mudhouse_hut_room', `thatched_house`='$thatched_house', `thatched_room`='$thatched_room', `semi_pucca`='$semi_pucca', `semi_pucca_room`='$semi_pucca_room', `pucca`='$pucca', `pucca_room`='$pucca_room', `other`='$other', `other_room`='$other_room' WHERE `std_id`='$sid'";

    $sql8 = mysqli_query($con, $str8);

//Student House Hold Information for 'std_household_capital_assets'

    $num_bullock_cart = test_input($_REQUEST['bullock_cart']);
    $num_plough = test_input($_REQUEST['plough']);
    $num_thresher = test_input($_REQUEST['thresher']);
    $num_vehicle = test_input($_REQUEST['vehicle']);
    $num_tv = test_input($_REQUEST['tv']);
    $num_radio = test_input($_REQUEST['radio']);
    $num_fan = test_input($_REQUEST['fan']);
    $num_other = test_input($_REQUEST['other']);

    $str9 = "UPDATE `std_household_capital_assets` SET `num_bullock_cart`='$num_bullock_cart', `num_plough`='$num_plough', `num_thresher`='$num_thresher', `no_vehicle`='$num_vehicle', `num_tv`='$num_tv', `num_radio`='$num_radio', `num_fan`='$num_fan', `num_other`='$num_other' WHERE `std_id`='$sid'";

    $sql9 = mysqli_query($con, $str9);

//Student House Hold Information for 'std_household_other_observe'

    $festival_type = test_input($_REQUEST['festivalstype']);
    $dance_song_type = test_input($_REQUEST['dance_song_type']);
    $kitchen_utensils = test_input($_REQUEST['utensilType']);
    $food_avail = test_input($_REQUEST['food_avail']);

    $str10 = "UPDATE `std_household_other_observe` SET `festival_type`='$festival_type', `dance_song_type`='$dance_song_type', `kitchen_utensils`='$kitchen_utensils', `food_avail`='$food_avail' WHERE `std_id`='$sid'";

    $sql10 = mysqli_query($con, $str10);


    ##########################
    #ANUAL INCOME INFORMATION#
    ##########################
//Anual Income for 'std_income_agriculture'

    $paddy_area = test_input($_REQUEST['paddy']);
    $paddy_area_unit = test_input($_REQUEST['paddy_measure']);
    $other_corp_area = test_input($_REQUEST['other_corp']);
    $corp_area_unit = test_input($_REQUEST['cash_crop_measure']);
    $forest_area = test_input($_REQUEST['forest']);
    $forest_area_unit = test_input($_REQUEST['minor_forest_measure']);

    $str11 = "UPDATE `std_income_agriculture` SET `paddy_area`='$paddy_area', `paddy_area_unit`='$paddy_area_unit', `other_corp_area`='$other_corp_area', `corp_area_unit`='$corp_area_unit', `forest_area`='$forest_area', `forest_area_unit`='$forest_area_unit' WHERE `std_id`='$sid'";

    $sql11 = mysqli_query($con, $str11);

//Anual Income for 'std_income_livestock'	

    $milk_quantity = test_input($_REQUEST['milk_qun']);
    $poultry_quantity = test_input($_REQUEST['poultry_qun']);
    $cow_quantity = test_input($_REQUEST['cow_qun']);
    $bullock_quantity = test_input($_REQUEST['bullock_qun']);
    $fish_quantity = test_input($_REQUEST['fish_qun']);

    $str12 = "UPDATE `std_income_livestock` SET `milk_quantity`='$milk_quantity', `poultry_quantity`='$poultry_quantity', `cow_quantity`='$cow_quantity', `bullock_quantity`='$bullock_quantity', `fish_quantity`='$fish_quantity' WHERE `std_id`='$sid'";

    $sql12 = mysqli_query($con, $str12);

//Anual Income for 'std_income_daily'

    $nrega_work_day = test_input($_REQUEST['nrega']);
    $agri_work_day = test_input($_REQUEST['agri_labour']);
    $migration_work_day = test_input($_REQUEST['migration']);
    $other_work_day = test_input($_REQUEST['other_wage']);
    $nrega_card_no = test_input($_REQUEST['nrega_card_no']);
    $total_income = test_input($_REQUEST['total_annual_income']);

    $str13 = "UPDATE `std_income_daily` SET `nrega_work_day`='$nrega_work_day', `agri_work_day`='$agri_work_day', `migration_work_day`='$migration_work_day', `other_work_day`='$other_work_day', `nrega_card_no`='$nrega_card_no', `total_income`='$total_income' WHERE `std_id`='$sid'";

    $sql13 = mysqli_query($con, $str13);

//Anual Income for 'std_income_gov_scheme'
 $query2="DELETE FROM std_income_gov_scheme where `std_id`='$sid'";
   $result2=mysqli_query($con,$query2);

    if($_REQUEST['other_card_no']!="")
{
$oth_scheme = $_REQUEST['oth_scheme'];
$oth_scheme_info = $_REQUEST['other_card_no'];
$str_oth = "INSERT INTO `std_income_gov_scheme`(`scheme_id`, `std_id`, `scheme`, `scheme_info`) VALUES (NULL,'$sid', '$oth_scheme', '$oth_scheme_info')";
$sql_oth = mysqli_query($con, $str_oth);
}
$scheme = $_REQUEST['scheme'];
    $scheme_info = $_REQUEST['card_no'];
   $j = 0;
    for ($i = 0; $i < count($scheme_info); $i++) {
        if ($scheme_info[$i] != "") {
			
            $scheme1 = test_input($scheme[$j]);
            $scheme_info1 = test_input($scheme_info[$i]);
			
			$str14 = "INSERT INTO `std_income_gov_scheme`(`scheme_id`, `std_id`, `scheme`, `scheme_info`) VALUES (NULL,'$sid','$scheme1','$scheme_info1')";
			$sql14 = mysqli_query($con, $str14);
		$j++;	
            
        }
    }

//Anual Income for 'std_income_parents_banking'
$query3="DELETE FROM std_income_parents_banking where `std_id`='$sid'";
$result3=mysqli_query($con,$query3);
 
 if($_REQUEST['oth_banking_info']!="")
{
$oth_banking = $_REQUEST['oth_banking'];
$oth_banking_info = $_REQUEST['oth_banking_info'];
$str_oth2 = "INSERT INTO `std_income_parents_banking`(`banking_id`, `std_id`, `banking`, `banking_info`) VALUES (NULL,'$sid','$oth_banking','$oth_banking_info')";
$sql_oth2 = mysqli_query($con, $str_oth2);
}  
    $banking = $_REQUEST['account'];
    $banking_info = $_REQUEST['bank'];
    $c = 0;
    for ($i = 0; $i < count($banking_info); $i++) {
        if ($banking_info[$i] != "") {
            $banking1 = test_input($banking[$c]);
            $banking_info1 = test_input($banking_info[$i]);
            $str15 = "INSERT INTO `std_income_parents_banking`(`banking_id`, `std_id`, `banking`, `banking_info`) VALUES (NULL,'$sid','$banking1','$banking_info1')";
            $sql15 = mysqli_query($con, $str15);
            $c++;
        }
    }

//Anual Income for 'std_income_parentsid'
$query4="DELETE FROM std_income_parentsid where `std_id`='$sid'";
$result4=mysqli_query($con,$query4);
 if($_REQUEST['oth_identification_info']!="")
{
$oth_identification = $_REQUEST['oth_identification'];
$oth_identification_info = $_REQUEST['oth_identification_info'];
$str_oth3 = "INSERT INTO `std_income_parentsid` (`identification_id`, `std_id`, `identification`, `identification_info`) VALUES (NULL,'$sid','$oth_identification','$oth_identification_info')";
$sql_oth3 = mysqli_query($con, $str_oth3);
}    
	$identification = $_REQUEST['identification'];
    $identification_info = $_REQUEST['id_card'];
    $d = 0;
    for ($i = 0; $i < count($identification_info); $i++) {
        if ($identification_info[$i] != "") {
            $identification1 = test_input($identification[$d]);
            $identification_info1 = test_input($identification_info[$i]);
            $str16 = "INSERT INTO `std_income_parentsid`(`identification_id`, `sid`, `identification`, `identification_info`) VALUES (NULL,'$std_id','$identification1','$identification_info1')";
            $sql16 = mysqli_query($con, $str16);
            $d++;
        }
    }

//Anual Income for 'std_income_use_openion'

    $cooking_use = implode("-", $_REQUEST['cooking']);
    if ($_REQUEST['cooking_other'] != "") {
        $cooking_other = $_REQUEST['cooking_other'];
    }
    $lighting_use = implode("-", $_REQUEST['lighting']);
    if ($_REQUEST['lighting_other'] != "") {
        $lighting_other = $_REQUEST['lighting_other'];
    }
    $house_electrified = test_input($_REQUEST['house_electrify']);
    $road_opinion = test_input($_REQUEST['road']);
    if ($_REQUEST['road_other'] != "") {
        $road_other = $_REQUEST['road_other'];
    }
    $transport_facilities = implode("-", $_REQUEST['road_comm']);
    if ($_REQUEST['transport_other'] != "") {
        $transport_other = $_REQUEST['transport_other'];
    }
    $shop_available = test_input($_REQUEST['shop_avail']);

    $str17 = "UPDATE `std_income_use_openion` SET `cooking_use`='$cooking_use', `cooking_other`='$cooking_other', `lighting_use`='$lighting_use', `lighting_other`='$lighting_other', `house_electrified`='$house_electrified', `road_opinion`='$road_opinion', `road_other`='$road_other', `transport_facilities`='$transport_facilities', `transport_other`='$transport_other', `shop_available`='$shop_available' WHERE `std_id`='$sid'";

    $sql17 = mysqli_query($con, $str17);

//Anual Income for 'std_income_other_facilities'

    $panchayat_distance = test_input($_REQUEST['panchayat_diss']);
    $anganwadi_distance = test_input($_REQUEST['anganwadi_diss']);
    $primary_school_diss = test_input($_REQUEST['p_school_diss']);
    $secondary_school_diss = test_input($_REQUEST['s_school_diss']);
    $high_school_diss = test_input($_REQUEST['h_school_diss']);
    $college_distance = test_input($_REQUEST['college_diss']);
    $health_center_diss = test_input($_REQUEST['helth_center_diss']);
    $po_distance = test_input($_REQUEST['po_diss']);
    $bank_distance = test_input($_REQUEST['bank_diss']);
    $ps_distance = test_input($_REQUEST['ps_distance']);
    $pds_distance = test_input($_REQUEST['pds_distance']);
    $bus_distance = test_input($_REQUEST['bus_diss']);
    $railway_distance = test_input($_REQUEST['railway_diss']);
    $market_distance = test_input($_REQUEST['market_diss']);
    $community_distance = test_input($_REQUEST['community_diss']);
    $veterinary_distance = test_input($_REQUEST['veterinary_diss']);

    $str18 = "UPDATE `std_income_other_facilities` SET `panchayat_distance`='$panchayat_distance', `anganwadi_distance`='$anganwadi_distance', `primary_school_diss`='$primary_school_diss', `secondary_school_diss`='$secondary_school_diss', `high_school_diss`='$high_school_diss', `college_distance`='$college_distance', `health_center_diss`='$health_center_diss', `po_distance`='$po_distance', `bank_distance`='$bank_distance', `ps_distance`='$ps_distance', `pds_distance`='$pds_distance', `bus_distance`='$bus_distance', `railway_distance`='$railway_distance', `market_distance`='$market_distance', `community_distance`='$community_distance', `veterinary_distance`='$veterinary_distance' WHERE `std_id`='$sid'";

    $sql18 = mysqli_query($con, $str18);


    #######################
    #SANITATION AND HEALTH#
    #######################

    $sanitation = implode("-", $_REQUEST['sanitation']);
    $health_infra_owner = implode("-", $_REQUEST['ownership']);
    $infra_owner_other = test_input($_REQUEST['owner_other']);
    $type_medicine = implode("-", $_REQUEST['medicine']);
    $type_medicine_other = test_input($_REQUEST['medicine_other']);


    $str19 = "UPDATE `std_sanitation_health` SET `sanitation`='$sanitation', `health_infra_owner`='$health_infra_owner', `infra_owner_other`='$infra_owner_other', `type_medicine`='$type_medicine', `type_medicine_other`='$type_medicine_other' WHERE `std_id`='$sid'";

    $sql19 = mysqli_query($con, $str19);
    #######################
    #EDUCATION INFORMATION#
    #######################
//Education info for 'std_education_information'

    $education_infra_avail = test_input($_REQUEST['edu_infra']);
    $drop_outs = test_input($_REQUEST['dropouts']);
    $cause_drop_outs = implode("-", $_REQUEST['drop-out']);
    $subject_like = test_input($_REQUEST['subject_like']);
    $hobbies = test_input($_REQUEST['hobbies']);
    $doing_before_kiss = test_input($_REQUEST['before_kiss']);
    $improvment_after_kiss = implode("-", $_REQUEST['improved_areas']);
    $infra_other = test_input($_REQUEST['infra_other2']);
    $improvment_other = test_input($_REQUEST['other_improve']);

    $str20 = "UPDATE `std_education_information` SET `education_infra_avail`='$education_infra_avail', `infra_other`='$infra_other', `drop_outs`='$drop_outs', `cause_drop_outs`='$cause_drop_outs', `subject_like`='$subject_like', `hobbies`='$hobbies', `doing_before_kiss`='$doing_before_kiss', `improvment_after_kiss`='$improvment_after_kiss', `improvment_other`='$improvment_other' WHERE `std_id`='$sid'";
    $sql20 = mysqli_query($con, $str20);

//Education info for 'std_education_activity'

    $activity = implode("-", $_REQUEST['activities']);
    $activity_other = test_input($_REQUEST['other_activity']);
    $games = implode("-", $_REQUEST['sports']);
    $game_other = test_input($_REQUEST['textarea_sports']);
    $music = implode("-", $_REQUEST['music']);
    $music_other = test_input($_REQUEST['textarea_music']);
    $dance = implode("-", $_REQUEST['dance']);
    $dance_other = test_input($_REQUEST['textarea_dance']);
    $instrumental = implode("-", $_REQUEST['instrumental']);
    $instrumental_other = test_input($_REQUEST['textarea_instrumental']);
    $yoga = implode("-", $_REQUEST['yoga']);
    $yoga_other = test_input($_REQUEST['textarea_yoga']);
    $vocational = test_input($_REQUEST['vocational']);
    $vocational_other = test_input($_REQUEST['textarea_vocational']);
    //$tailoring = test_input($_REQUEST['tailoring']);
    $english_access = test_input($_REQUEST['english_access']);

    $str21 = "UPDATE `std_education_activity` SET `activity`='$activity', `activity_other`='$activity_other', `games`='$games', `game_other`='$game_other', `music`='$music', `music_other`='$music_other', `dance`='$dance', `dance_other`='$dance_other', `instrumental`='$instrumental', `instrumental_other`='$instrumental_other', `yoga`='$yoga', `yoga_other`='$yoga_other', `vocational`='$vocational', `vocational_other`='$vocational_other', `english_access`='$english_access' WHERE `std_id`='$sid'";

    $sql21 = mysqli_query($con, $str21);

//Education info for 'std_education_achive'

 $query5="DELETE FROM std_education_achive where `std_id`='$sid'";
   $result5=mysqli_query($con,$query5);
											   
	    $competition_level = $_REQUEST['comp_level'];
    $prize = $_REQUEST['prize'];
    $place = $_REQUEST['place'];
    $year = $_REQUEST['year'];

    for ($i = 0; $i < count($competition_level); $i++) {
        if ($competition_level[$i] != "") {
                        $competition_level1 = test_input($competition_level[$i]);
            $prize1 = test_input($prize[$i]);
            $place1 = test_input($place[$i]);
            $year1 = test_input($year[$i]);
            $str22 = "INSERT INTO `std_education_achive`(`achive_id`, `std_id`, `competition_level`, `prize`, `place`, `year`) VALUES (NULL,'$sid','$competition_level1','$prize1','$place1','$year1')";
            $sql22 = mysqli_query($con, $str22);
        }
    }





//Education info for 'std_education_other'

    $ambition = test_input($_REQUEST['ambition']);
    $ambition_plan = test_input($_REQUEST['ambition_plan']);
    $kiss_role_ambition = test_input($_REQUEST['ambition_achive']);
    $obj_achive_involve = test_input($_REQUEST['obj_achive_involve']);
    $student_behaviour = test_input($_REQUEST['behavior']);
    $remark = test_input($_REQUEST['remark']);

    $str23 = "UPDATE `std_education_other` SET `ambition`='$ambition', `ambition_plan`='$ambition_plan', `kiss_role_ambition`='$kiss_role_ambition', `obj_achive_involve`='$obj_achive_involve', `student_behaviour`='$student_behaviour', `remark`='$remark' WHERE `std_id`='$sid'";

    $sql23 = mysqli_query($con, $str23);

//Dataentry user Log entry

    $str24 = "INSERT INTO `updation_user_log_information`(`log_id`, `record_id`, `operator_id`, `sub_date`) VALUES (NULL,'$sid','$operator_id',NOW())";

    $sql24 = mysqli_query($con, $str24);

    header("location:updation-success.php");
}
?>