-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2015 at 04:01 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kiss_info`
--

-- --------------------------------------------------------

--
-- Table structure for table `std_education_achive`
--

CREATE TABLE IF NOT EXISTS `std_education_achive` (
  `achive_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `competition_level` varchar(100) NOT NULL,
  `prize` varchar(100) NOT NULL,
  `place` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `std_education_activity`
--

CREATE TABLE IF NOT EXISTS `std_education_activity` (
  `activity_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `activity` varchar(100) NOT NULL,
  `activity_other` varchar(100) DEFAULT NULL,
  `games` varchar(100) NOT NULL,
  `game_other` varchar(100) DEFAULT NULL,
  `music` varchar(100) NOT NULL,
  `music_other` varchar(100) DEFAULT NULL,
  `dance` varchar(100) NOT NULL,
  `dance_other` varchar(100) DEFAULT NULL,
  `instrumental` varchar(100) NOT NULL,
  `instrumental_other` varchar(100) DEFAULT NULL,
  `yoga` varchar(100) NOT NULL,
  `yoga_other` varchar(100) DEFAULT NULL,
  `vocational` varchar(100) NOT NULL,
  `vocational_other` varchar(100) DEFAULT NULL,
  `english_access` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `std_education_information`
--

CREATE TABLE IF NOT EXISTS `std_education_information` (
  `education_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `education_infra_avail` varchar(100) NOT NULL,
  `infra_other` varchar(100) DEFAULT NULL,
  `drop_outs` varchar(100) NOT NULL,
  `cause_drop_outs` varchar(100) NOT NULL,
  `subject_like` varchar(100) NOT NULL,
  `hobbies` varchar(100) NOT NULL,
  `doing_before_kiss` varchar(100) NOT NULL,
  `improvment_after_kiss` varchar(100) NOT NULL,
  `improvment_other` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `std_education_other`
--

CREATE TABLE IF NOT EXISTS `std_education_other` (
  `edu_other_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `ambition` varchar(100) NOT NULL,
  `ambition_plan` varchar(100) NOT NULL,
  `kiss_role_ambition` varchar(100) NOT NULL,
  `obj_achive_involve` varchar(100) NOT NULL,
  `student_behaviour` varchar(100) NOT NULL,
  `remark` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `std_general_geo`
--

CREATE TABLE IF NOT EXISTS `std_general_geo` (
  `std_geo_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `mother_name` varchar(100) NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `state_name` varchar(100) NOT NULL,
  `district_name` varchar(100) NOT NULL,
  `block_name` varchar(100) NOT NULL,
  `panchayat_name` varchar(100) NOT NULL,
  `village_name` varchar(100) NOT NULL,
  `disstance_to_kiss` varchar(100) NOT NULL,
  `tribe_name` varchar(100) NOT NULL,
  `tribe_type` varchar(100) NOT NULL,
  `dialect_speek` varchar(100) NOT NULL,
  `diff_able_cat` varchar(100) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `religion_other` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `std_general_information`
--

CREATE TABLE IF NOT EXISTS `std_general_information` (
  `std_id` int(11) NOT NULL,
  `std_name` varchar(100) NOT NULL,
  `std_pic` varchar(100) NOT NULL,
  `join_year` varchar(100) NOT NULL,
  `join_class` varchar(100) NOT NULL,
  `pg_specialization` varchar(100) DEFAULT NULL,
  `info_kiss` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `maritial_status` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL,
  `class_year` varchar(100) DEFAULT NULL,
  `section` varchar(100) NOT NULL,
  `roll_no` varchar(100) NOT NULL,
  `blood_group` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `mentor_name` varchar(100) NOT NULL,
  `mentor_ph` varchar(100) NOT NULL,
  `l_gaurdian_name` varchar(100) NOT NULL,
  `l_gaurdian_ph` varchar(100) NOT NULL,
  `parents_ph` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `std_household_background`
--

CREATE TABLE IF NOT EXISTS `std_household_background` (
  `std_beg_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `0_6_male` int(50) DEFAULT NULL,
  `7_17_male` int(50) DEFAULT NULL,
  `adult_male` int(50) DEFAULT NULL,
  `0_6_female` int(50) DEFAULT NULL,
  `7_17_female` int(50) DEFAULT NULL,
  `adult_female` int(50) DEFAULT NULL,
  `total_male` int(50) NOT NULL,
  `total_female` int(50) NOT NULL,
  `total_member` int(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `std_household_capital_assets`
--

CREATE TABLE IF NOT EXISTS `std_household_capital_assets` (
  `capital_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `num_bullock_cart` int(11) DEFAULT NULL,
  `num_plough` int(11) DEFAULT NULL,
  `num_thresher` int(11) DEFAULT NULL,
  `no_vehicle` int(11) DEFAULT NULL,
  `num_tv` int(11) DEFAULT NULL,
  `num_radio` int(11) DEFAULT NULL,
  `num_fan` int(11) DEFAULT NULL,
  `num_other` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `std_household_drink_source`
--

CREATE TABLE IF NOT EXISTS `std_household_drink_source` (
  `source_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `open_well_owner` int(11) DEFAULT NULL,
  `open_well_quality` int(11) DEFAULT NULL,
  `tube_well_owner` int(11) DEFAULT NULL,
  `tube_well_quality` int(11) DEFAULT NULL,
  `piped_owner` int(11) DEFAULT NULL,
  `piped_quality` int(11) DEFAULT NULL,
  `PTR_owner` int(11) DEFAULT NULL,
  `PTR_quality` int(11) DEFAULT NULL,
  `other_owner` int(11) DEFAULT NULL,
  `other_quality` int(11) DEFAULT NULL,
  `problem_info` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `std_household_house_type`
--

CREATE TABLE IF NOT EXISTS `std_household_house_type` (
  `house_type_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `mud_house_hut` int(11) DEFAULT NULL,
  `mudhouse_hut_room` int(11) DEFAULT NULL,
  `thatched_house` int(11) DEFAULT NULL,
  `thatched_room` int(11) DEFAULT NULL,
  `semi_pucca` int(11) DEFAULT NULL,
  `semi_pucca_room` int(11) DEFAULT NULL,
  `pucca` int(11) DEFAULT NULL,
  `pucca_room` int(11) DEFAULT NULL,
  `other` int(11) DEFAULT NULL,
  `other_room` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `std_household_occupation`
--

CREATE TABLE IF NOT EXISTS `std_household_occupation` (
  `occu_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `male_earn` int(50) DEFAULT NULL,
  `female_earn` int(50) DEFAULT NULL,
  `occu_primary` varchar(100) DEFAULT NULL,
  `occu_secondary` varchar(100) DEFAULT NULL,
  `occu_code` int(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `std_household_other_observe`
--

CREATE TABLE IF NOT EXISTS `std_household_other_observe` (
  `observe_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `festival_type` varchar(100) DEFAULT NULL,
  `dance_song_type` varchar(100) DEFAULT NULL,
  `kitchen_utensils` varchar(100) DEFAULT NULL,
  `food_avail` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `std_household_rel_education`
--

CREATE TABLE IF NOT EXISTS `std_household_rel_education` (
  `std_rel_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `relative_name` varchar(100) NOT NULL,
  `relative_class` varchar(100) NOT NULL,
  `relation` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `std_household_stock_poultry`
--

CREATE TABLE IF NOT EXISTS `std_household_stock_poultry` (
  `asset_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `num_cow` int(11) DEFAULT NULL,
  `num_bullock` int(11) DEFAULT NULL,
  `num_buffalo` int(11) DEFAULT NULL,
  `num_calf` int(11) DEFAULT NULL,
  `num_goat` int(11) DEFAULT NULL,
  `num_poultry` int(11) DEFAULT NULL,
  `num_others` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `std_income_agriculture`
--

CREATE TABLE IF NOT EXISTS `std_income_agriculture` (
  `agri_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `paddy_area` varchar(100) DEFAULT NULL,
  `paddy_area_unit` varchar(100) DEFAULT NULL,
  `other_corp_area` varchar(100) DEFAULT NULL,
  `corp_area_unit` varchar(100) DEFAULT NULL,
  `forest_area` varchar(100) DEFAULT NULL,
  `forest_area_unit` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `std_income_daily`
--

CREATE TABLE IF NOT EXISTS `std_income_daily` (
  `daily_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `nrega_work_day` varchar(100) DEFAULT NULL,
  `agri_work_day` varchar(100) DEFAULT NULL,
  `migration_work_day` varchar(100) DEFAULT NULL,
  `other_work_day` varchar(100) DEFAULT NULL,
  `nrega_card_no` varchar(100) DEFAULT NULL,
  `total_income` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `std_income_gov_scheme`
--

CREATE TABLE IF NOT EXISTS `std_income_gov_scheme` (
  `scheme_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `scheme` varchar(100) NOT NULL,
  `scheme_info` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `std_income_livestock`
--

CREATE TABLE IF NOT EXISTS `std_income_livestock` (
  `livestock_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `milk_quantity` varchar(100) DEFAULT NULL,
  `poultry_quantity` varchar(100) DEFAULT NULL,
  `cow_quantity` varchar(100) DEFAULT NULL,
  `bullock_quantity` varchar(100) DEFAULT NULL,
  `fish_quantity` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `std_income_other_facilities`
--

CREATE TABLE IF NOT EXISTS `std_income_other_facilities` (
  `facilities_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `panchayat_distance` varchar(100) NOT NULL,
  `anganwadi_distance` varchar(100) NOT NULL,
  `primary_school_diss` varchar(100) NOT NULL,
  `secondary_school_diss` varchar(100) NOT NULL,
  `high_school_diss` varchar(100) NOT NULL,
  `college_distance` varchar(100) NOT NULL,
  `health_center_diss` varchar(100) NOT NULL,
  `po_distance` varchar(100) NOT NULL,
  `bank_distance` varchar(100) NOT NULL,
  `ps_distance` varchar(100) NOT NULL,
  `pds_distance` varchar(100) NOT NULL,
  `bus_distance` varchar(100) NOT NULL,
  `railway_distance` varchar(100) NOT NULL,
  `market_distance` varchar(100) NOT NULL,
  `community_distance` varchar(100) NOT NULL,
  `veterinary_distance` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `std_income_parentsid`
--

CREATE TABLE IF NOT EXISTS `std_income_parentsid` (
  `identification_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `identification` varchar(100) NOT NULL,
  `identification_info` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `std_income_parents_banking`
--

CREATE TABLE IF NOT EXISTS `std_income_parents_banking` (
  `banking_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `banking` varchar(100) NOT NULL,
  `banking_info` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `std_income_use_openion`
--

CREATE TABLE IF NOT EXISTS `std_income_use_openion` (
  `use_openion_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `cooking_use` varchar(100) NOT NULL,
  `cooking_other` varchar(100) DEFAULT NULL,
  `lighting_use` varchar(100) NOT NULL,
  `lighting_other` varchar(100) DEFAULT NULL,
  `house_electrified` varchar(100) NOT NULL,
  `road_opinion` varchar(100) NOT NULL,
  `road_other` varchar(100) DEFAULT NULL,
  `transport_facilities` varchar(100) NOT NULL,
  `transport_other` varchar(100) DEFAULT NULL,
  `shop_available` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `std_sanitation_health`
--

CREATE TABLE IF NOT EXISTS `std_sanitation_health` (
  `sanitation_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `sanitation` varchar(100) NOT NULL,
  `health_infra_owner` varchar(100) NOT NULL,
  `infra_owner_other` varchar(100) DEFAULT NULL,
  `type_medicine` varchar(100) NOT NULL,
  `type_medicine_other` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `std_education_achive`
--
ALTER TABLE `std_education_achive`
  ADD PRIMARY KEY (`achive_id`), ADD KEY `std_id` (`std_id`);

--
-- Indexes for table `std_education_activity`
--
ALTER TABLE `std_education_activity`
  ADD PRIMARY KEY (`activity_id`), ADD KEY `std_id` (`std_id`);

--
-- Indexes for table `std_education_information`
--
ALTER TABLE `std_education_information`
  ADD PRIMARY KEY (`education_id`), ADD KEY `std_id` (`std_id`);

--
-- Indexes for table `std_education_other`
--
ALTER TABLE `std_education_other`
  ADD PRIMARY KEY (`edu_other_id`), ADD KEY `std_id` (`std_id`);

--
-- Indexes for table `std_general_geo`
--
ALTER TABLE `std_general_geo`
  ADD PRIMARY KEY (`std_geo_id`), ADD KEY `std_id` (`std_id`);

--
-- Indexes for table `std_general_information`
--
ALTER TABLE `std_general_information`
  ADD PRIMARY KEY (`std_id`);

--
-- Indexes for table `std_household_background`
--
ALTER TABLE `std_household_background`
  ADD PRIMARY KEY (`std_beg_id`), ADD KEY `std_id` (`std_id`);

--
-- Indexes for table `std_household_capital_assets`
--
ALTER TABLE `std_household_capital_assets`
  ADD PRIMARY KEY (`capital_id`), ADD KEY `std_id` (`std_id`);

--
-- Indexes for table `std_household_drink_source`
--
ALTER TABLE `std_household_drink_source`
  ADD PRIMARY KEY (`source_id`), ADD KEY `std_id` (`std_id`);

--
-- Indexes for table `std_household_house_type`
--
ALTER TABLE `std_household_house_type`
  ADD PRIMARY KEY (`house_type_id`), ADD KEY `std_id` (`std_id`);

--
-- Indexes for table `std_household_occupation`
--
ALTER TABLE `std_household_occupation`
  ADD PRIMARY KEY (`occu_id`), ADD KEY `std_id` (`std_id`);

--
-- Indexes for table `std_household_other_observe`
--
ALTER TABLE `std_household_other_observe`
  ADD PRIMARY KEY (`observe_id`), ADD KEY `std_id` (`std_id`);

--
-- Indexes for table `std_household_rel_education`
--
ALTER TABLE `std_household_rel_education`
  ADD PRIMARY KEY (`std_rel_id`), ADD KEY `std_id` (`std_id`);

--
-- Indexes for table `std_household_stock_poultry`
--
ALTER TABLE `std_household_stock_poultry`
  ADD PRIMARY KEY (`asset_id`), ADD KEY `std_id` (`std_id`);

--
-- Indexes for table `std_income_agriculture`
--
ALTER TABLE `std_income_agriculture`
  ADD PRIMARY KEY (`agri_id`), ADD KEY `std_id` (`std_id`);

--
-- Indexes for table `std_income_daily`
--
ALTER TABLE `std_income_daily`
  ADD PRIMARY KEY (`daily_id`), ADD KEY `std_id` (`std_id`);

--
-- Indexes for table `std_income_gov_scheme`
--
ALTER TABLE `std_income_gov_scheme`
  ADD PRIMARY KEY (`scheme_id`), ADD KEY `std_id` (`std_id`);

--
-- Indexes for table `std_income_livestock`
--
ALTER TABLE `std_income_livestock`
  ADD PRIMARY KEY (`livestock_id`), ADD KEY `std_id` (`std_id`);

--
-- Indexes for table `std_income_other_facilities`
--
ALTER TABLE `std_income_other_facilities`
  ADD PRIMARY KEY (`facilities_id`), ADD KEY `std_id` (`std_id`);

--
-- Indexes for table `std_income_parentsid`
--
ALTER TABLE `std_income_parentsid`
  ADD PRIMARY KEY (`identification_id`), ADD KEY `std_id` (`std_id`);

--
-- Indexes for table `std_income_parents_banking`
--
ALTER TABLE `std_income_parents_banking`
  ADD PRIMARY KEY (`banking_id`), ADD KEY `std_id` (`std_id`);

--
-- Indexes for table `std_income_use_openion`
--
ALTER TABLE `std_income_use_openion`
  ADD PRIMARY KEY (`use_openion_id`), ADD KEY `std_id` (`std_id`);

--
-- Indexes for table `std_sanitation_health`
--
ALTER TABLE `std_sanitation_health`
  ADD PRIMARY KEY (`sanitation_id`), ADD KEY `std_id` (`std_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `std_education_achive`
--
ALTER TABLE `std_education_achive`
  MODIFY `achive_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `std_education_activity`
--
ALTER TABLE `std_education_activity`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `std_education_information`
--
ALTER TABLE `std_education_information`
  MODIFY `education_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `std_education_other`
--
ALTER TABLE `std_education_other`
  MODIFY `edu_other_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `std_general_geo`
--
ALTER TABLE `std_general_geo`
  MODIFY `std_geo_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `std_general_information`
--
ALTER TABLE `std_general_information`
  MODIFY `std_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `std_household_background`
--
ALTER TABLE `std_household_background`
  MODIFY `std_beg_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `std_household_capital_assets`
--
ALTER TABLE `std_household_capital_assets`
  MODIFY `capital_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `std_household_drink_source`
--
ALTER TABLE `std_household_drink_source`
  MODIFY `source_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `std_household_house_type`
--
ALTER TABLE `std_household_house_type`
  MODIFY `house_type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `std_household_occupation`
--
ALTER TABLE `std_household_occupation`
  MODIFY `occu_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `std_household_other_observe`
--
ALTER TABLE `std_household_other_observe`
  MODIFY `observe_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `std_household_rel_education`
--
ALTER TABLE `std_household_rel_education`
  MODIFY `std_rel_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `std_household_stock_poultry`
--
ALTER TABLE `std_household_stock_poultry`
  MODIFY `asset_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `std_income_agriculture`
--
ALTER TABLE `std_income_agriculture`
  MODIFY `agri_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `std_income_daily`
--
ALTER TABLE `std_income_daily`
  MODIFY `daily_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `std_income_gov_scheme`
--
ALTER TABLE `std_income_gov_scheme`
  MODIFY `scheme_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `std_income_livestock`
--
ALTER TABLE `std_income_livestock`
  MODIFY `livestock_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `std_income_other_facilities`
--
ALTER TABLE `std_income_other_facilities`
  MODIFY `facilities_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `std_income_parentsid`
--
ALTER TABLE `std_income_parentsid`
  MODIFY `identification_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `std_income_parents_banking`
--
ALTER TABLE `std_income_parents_banking`
  MODIFY `banking_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `std_income_use_openion`
--
ALTER TABLE `std_income_use_openion`
  MODIFY `use_openion_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `std_sanitation_health`
--
ALTER TABLE `std_sanitation_health`
  MODIFY `sanitation_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `std_education_achive`
--
ALTER TABLE `std_education_achive`
ADD CONSTRAINT `std_education_achive_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `std_general_information` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `std_education_activity`
--
ALTER TABLE `std_education_activity`
ADD CONSTRAINT `std_education_activity_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `std_general_information` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `std_education_information`
--
ALTER TABLE `std_education_information`
ADD CONSTRAINT `std_education_information_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `std_general_information` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `std_education_other`
--
ALTER TABLE `std_education_other`
ADD CONSTRAINT `std_education_other_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `std_general_information` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `std_general_geo`
--
ALTER TABLE `std_general_geo`
ADD CONSTRAINT `std_general_geo_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `std_general_information` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `std_household_background`
--
ALTER TABLE `std_household_background`
ADD CONSTRAINT `std_household_background_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `std_general_information` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `std_household_capital_assets`
--
ALTER TABLE `std_household_capital_assets`
ADD CONSTRAINT `std_household_capital_assets_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `std_general_information` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `std_household_drink_source`
--
ALTER TABLE `std_household_drink_source`
ADD CONSTRAINT `std_household_drink_source_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `std_general_information` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `std_household_house_type`
--
ALTER TABLE `std_household_house_type`
ADD CONSTRAINT `std_household_house_type_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `std_general_information` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `std_household_occupation`
--
ALTER TABLE `std_household_occupation`
ADD CONSTRAINT `std_household_occupation_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `std_general_information` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `std_household_other_observe`
--
ALTER TABLE `std_household_other_observe`
ADD CONSTRAINT `std_household_other_observe_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `std_general_information` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `std_household_rel_education`
--
ALTER TABLE `std_household_rel_education`
ADD CONSTRAINT `std_household_rel_education_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `std_general_information` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `std_household_stock_poultry`
--
ALTER TABLE `std_household_stock_poultry`
ADD CONSTRAINT `std_household_stock_poultry_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `std_general_information` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `std_income_agriculture`
--
ALTER TABLE `std_income_agriculture`
ADD CONSTRAINT `std_income_agriculture_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `std_general_information` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `std_income_daily`
--
ALTER TABLE `std_income_daily`
ADD CONSTRAINT `std_income_daily_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `std_general_information` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `std_income_gov_scheme`
--
ALTER TABLE `std_income_gov_scheme`
ADD CONSTRAINT `std_income_gov_scheme_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `std_general_information` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `std_income_livestock`
--
ALTER TABLE `std_income_livestock`
ADD CONSTRAINT `std_income_livestock_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `std_general_information` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `std_income_other_facilities`
--
ALTER TABLE `std_income_other_facilities`
ADD CONSTRAINT `std_income_other_facilities_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `std_general_information` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `std_income_parentsid`
--
ALTER TABLE `std_income_parentsid`
ADD CONSTRAINT `std_income_parentsid_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `std_general_information` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `std_income_parents_banking`
--
ALTER TABLE `std_income_parents_banking`
ADD CONSTRAINT `std_income_parents_banking_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `std_general_information` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `std_income_use_openion`
--
ALTER TABLE `std_income_use_openion`
ADD CONSTRAINT `std_income_use_openion_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `std_general_information` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `std_sanitation_health`
--
ALTER TABLE `std_sanitation_health`
ADD CONSTRAINT `std_sanitation_health_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `std_general_information` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
