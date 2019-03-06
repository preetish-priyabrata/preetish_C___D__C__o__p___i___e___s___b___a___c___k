-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 01, 2017 at 09:37 PM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `l_and_t_mis`
--

-- --------------------------------------------------------

--
-- Table structure for table `lt_master_admin_login`
--

CREATE TABLE `lt_master_admin_login` (
  `slno` int(11) NOT NULL COMMENT 'auto serial no',
  `user_name` text NOT NULL COMMENT 'user name of user',
  `user_email` varchar(255) NOT NULL COMMENT 'user email id  unique no duplicate it',
  `user_pass` text NOT NULL COMMENT 'password if not set default 1234',
  `role_status` int(11) NOT NULL DEFAULT '1' COMMENT 'role status admin 1 - 0 user',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1->active 2-> inactive 3->delete',
  `date` date NOT NULL COMMENT 'date creation',
  `time` time NOT NULL COMMENT 'time of creation ',
  `image` text COMMENT 'user_image'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='it is admin user table for login information';

--
-- Dumping data for table `lt_master_admin_login`
--

INSERT INTO `lt_master_admin_login` (`slno`, `user_name`, `user_email`, `user_pass`, `role_status`, `status`, `date`, `time`, `image`) VALUES
(1, 'l&T admin', 'admin@ilab.com', '1234', 1, 1, '2017-07-17', '09:22:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lt_master_country`
--

CREATE TABLE `lt_master_country` (
  `slno` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `country_code` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lt_master_country`
--

INSERT INTO `lt_master_country` (`slno`, `country_name`, `country_code`, `status`, `date`, `time`) VALUES
(1, 'India', 'c001', 1, '2017-08-09', '13:42:23');

-- --------------------------------------------------------

--
-- Table structure for table `lt_master_district`
--

CREATE TABLE `lt_master_district` (
  `slno` int(11) NOT NULL,
  `district_name` varchar(255) NOT NULL,
  `district_code` varchar(255) NOT NULL,
  `state_code` varchar(255) NOT NULL,
  `country_code` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lt_master_district`
--

INSERT INTO `lt_master_district` (`slno`, `district_name`, `district_code`, `state_code`, `country_code`, `status`, `date`, `time`) VALUES
(1, 'Sundargarh', 'd001', 's001', 'c001', 1, '2017-08-09', '08:21:18');

-- --------------------------------------------------------

--
-- Table structure for table `lt_master_field_maintenance_job`
--

CREATE TABLE `lt_master_field_maintenance_job` (
  `fmg_slno` int(11) NOT NULL,
  `fmg_job_id` varchar(255) DEFAULT NULL COMMENT 'Here job id is store for further use',
  `fmg_machine_id` varchar(255) NOT NULL COMMENT 'here machine no is stored',
  `fmg_model_id` varchar(255) NOT NULL COMMENT 'here model no is stored                                                                             here model no is stored                        ',
  `fmg_field_location` varchar(255) NOT NULL COMMENT 'here field location is stored',
  `fmg_status` int(11) NOT NULL DEFAULT '0' COMMENT '0-->not issue 1-->completed job 2-->issue',
  `fmg_no_item` varchar(255) NOT NULL COMMENT 'no of item request',
  `fmg_date_entry` date NOT NULL COMMENT 'here date of entry of job',
  `fmg_time_entry` time NOT NULL COMMENT 'here time of entry of job',
  `fmg_date_complete` date DEFAULT NULL COMMENT 'here date of complete of job',
  `fmg_time_complete` time DEFAULT NULL COMMENT 'here time of complete of job',
  `fmg_issue_date` date DEFAULT NULL COMMENT 'here date of issue',
  `fmg_issue_time` time DEFAULT NULL COMMENT 'here time of issue'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lt_master_field_maintenance_job_detail`
--

CREATE TABLE `lt_master_field_maintenance_job_detail` (
  `fmgd_slno` int(11) NOT NULL,
  `fmgd_job_id` varchar(255) NOT NULL COMMENT 'it is connect for maintenance job id',
  `fmgd_machine_no` varchar(255) NOT NULL COMMENT 'machine no',
  `fmgd_model_id` varchar(255) NOT NULL COMMENT 'model id',
  `fmgd_field_id` varchar(255) NOT NULL COMMENT 'field location id',
  `fmgd_slno_field_stock` varchar(255) NOT NULL COMMENT 'here field stock id serial',
  `fmgd_primary_id` varchar(255) NOT NULL COMMENT 'here primary no',
  `fmgd_secondary_id` varchar(255) NOT NULL COMMENT 'here secondary no',
  `fmgd_item_name` varchar(255) NOT NULL COMMENT 'here name component',
  `fmgd_item_id` varchar(255) NOT NULL COMMENT 'here item id of master',
  `fmgd_category_name` varchar(255) NOT NULL COMMENT 'here category name',
  `fmgd_category_id` varchar(255) NOT NULL COMMENT 'here category id',
  `fmgd_unit_id` varchar(255) NOT NULL COMMENT 'here unit of component',
  `fmgd_available_id` varchar(255) NOT NULL COMMENT 'here available id',
  `fmgd_quantity_id` varchar(255) NOT NULL COMMENT 'here to be  required quantity',
  `fmgd_issue_quantity_id` varchar(255) DEFAULT NULL COMMENT 'here to be issue quantity',
  `fmgd_return_quantity` varchar(255) NOT NULL DEFAULT '0' COMMENT 'here remain quantity',
  `fmgd_damage_quantity` varchar(255) NOT NULL DEFAULT '0' COMMENT 'here damage return is stored',
  `fmgd_issue_status` int(11) NOT NULL DEFAULT '0' COMMENT '0-->not issue 1-->issue',
  `fmgd_return_status` int(11) NOT NULL DEFAULT '0' COMMENT '0-->not return 1-->return',
  `fmgd_damage_status` int(11) NOT NULL DEFAULT '0' COMMENT '0-->not damage 1-->damage'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lt_master_field_material_requsition`
--

CREATE TABLE `lt_master_field_material_requsition` (
  `fmr_slno` int(11) NOT NULL,
  `fmr_site_to_location_id` varchar(255) NOT NULL COMMENT 'to site or zonal',
  `machine_no` varchar(255) NOT NULL,
  `model_id` varchar(255) NOT NULL,
  `fmr_site_from_location_id` varchar(255) NOT NULL COMMENT 'from where request is been raised',
  `fmr_user_id` text NOT NULL COMMENT 'requested user id ',
  `fmr_unqiue_mr_id` varchar(255) DEFAULT NULL COMMENT 'Requiest no ',
  `no_items_f` int(11) NOT NULL DEFAULT '0' COMMENT 'no of items is been order',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0->for not complteing process 2-> complte status of issue->1 complete status of request',
  `no_item_issued_f` int(11) NOT NULL DEFAULT '0' COMMENT 'no of item is been issued',
  `no_item_transfered_f` int(11) NOT NULL DEFAULT '0' COMMENT 'no of items is been transfered ',
  `total_no_item_issued` int(11) NOT NULL DEFAULT '0' COMMENT 'total no of items transfer and issued value',
  `date` date NOT NULL COMMENT 'date of entered into our record',
  `time` time NOT NULL COMMENT 'time record  in system',
  `issuer_date` date DEFAULT NULL,
  `issuer_time` time DEFAULT NULL,
  `no_days_issued` int(11) NOT NULL DEFAULT '0' COMMENT 'no of day required to complete issued of products'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lt_master_field_material_requsition`
--

INSERT INTO `lt_master_field_material_requsition` (`fmr_slno`, `fmr_site_to_location_id`, `machine_no`, `model_id`, `fmr_site_from_location_id`, `fmr_user_id`, `fmr_unqiue_mr_id`, `no_items_f`, `status`, `no_item_issued_f`, `no_item_transfered_f`, `total_no_item_issued`, `date`, `time`, `issuer_date`, `issuer_time`, `no_days_issued`) VALUES
(1, 'zonal001', 'mud698', 'md2', 'field001', 'field1@ilab.com', 'field001_field_00_1', 4, 1, 0, 0, 0, '2017-11-29', '13:07:28', NULL, NULL, 0),
(2, 'zonal001', 'mud698', 'md2', 'field001', 'field1@ilab.com', 'field001_field_00_2', 4, 1, 0, 0, 0, '2017-11-29', '13:06:03', NULL, NULL, 0),
(3, 'zonal001', 'mud698', 'md2', 'field001', 'field1@ilab.com', 'field001_field_00_3', 6, 1, 0, 0, 0, '2017-11-29', '13:14:43', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lt_master_field_material_requsition_details`
--

CREATE TABLE `lt_master_field_material_requsition_details` (
  `fmrd_slno` int(11) NOT NULL COMMENT 'auto serial no increment',
  `fmrd_slno_id` text NOT NULL COMMENT 'serial no lt_master_zonal_material_requsition ',
  `fmr_unqiue_mr_id_iteam` varchar(255) NOT NULL COMMENT 'zonal_mr_id lt_master_zonal_material_requsition s equal to zmr_unqiue_mr_id',
  `fmrd_site_location_id` text NOT NULL COMMENT 'location from where mr is raised',
  `fmrd_primary_code` varchar(255) NOT NULL COMMENT 'item primary code',
  `fmrd_second_code` varchar(255) NOT NULL COMMENT 'item secondary no',
  `fmrd_name_item` text NOT NULL COMMENT 'item name',
  `fmrd_category_name` text NOT NULL COMMENT 'item_category_name',
  `fmrd_category_id` int(11) NOT NULL COMMENT 'item category id',
  `fmrd_units_required` varchar(220) NOT NULL,
  `fmrd_machine_no` varchar(255) NOT NULL,
  `fmrd_avaliable_qnt` int(11) NOT NULL DEFAULT '0' COMMENT 'presnt quantity in location on time of ordering',
  `fmrd_request_qnt` int(11) NOT NULL DEFAULT '0' COMMENT 'request quantity',
  `maintenance_id` varchar(255) DEFAULT NULL COMMENT 'where approver who approved the quantity ',
  `fmrd_issue_qnt` int(11) DEFAULT NULL COMMENT 'issuer issued quantity',
  `fmrd_date_entry` date NOT NULL COMMENT 'date of inserted',
  `fmrd_time_entry` time NOT NULL COMMENT 'time of inserted ',
  `model_id` varchar(255) DEFAULT NULL COMMENT 'date of approved',
  `fmrd_issue_date` date DEFAULT NULL COMMENT 'date of issued',
  `fmrd_issue_time` time DEFAULT NULL COMMENT 'time of issued',
  `fmrd_issue_status` int(11) NOT NULL DEFAULT '0' COMMENT '0->not issued status 1->issued status',
  `transfer_status` int(11) NOT NULL DEFAULT '0' COMMENT 'here it is check whather it transfewr 0->not transfer 1->transfer ',
  `no_days_issued` varchar(11) NOT NULL DEFAULT '0' COMMENT 'not of date issued ',
  `remark_id` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lt_master_field_material_requsition_details`
--

INSERT INTO `lt_master_field_material_requsition_details` (`fmrd_slno`, `fmrd_slno_id`, `fmr_unqiue_mr_id_iteam`, `fmrd_site_location_id`, `fmrd_primary_code`, `fmrd_second_code`, `fmrd_name_item`, `fmrd_category_name`, `fmrd_category_id`, `fmrd_units_required`, `fmrd_machine_no`, `fmrd_avaliable_qnt`, `fmrd_request_qnt`, `maintenance_id`, `fmrd_issue_qnt`, `fmrd_date_entry`, `fmrd_time_entry`, `model_id`, `fmrd_issue_date`, `fmrd_issue_time`, `fmrd_issue_status`, `transfer_status`, `no_days_issued`, `remark_id`) VALUES
(1, '1', 'field001_field_00_1', 'field001', '12356', '1234567', 'brezer', 'Consumable', 2, 'kg', 'mud698', 0, 5, 'scheduled', NULL, '2017-11-29', '13:06:46', 'md2', NULL, NULL, 0, 0, '0', '2'),
(2, '1', 'field001_field_00_1', 'field001', '898978', '11111', 'Air Circuit Breakers', 'Consumable', 2, 'centimeter', 'mud698', 0, 2, 'immediate', NULL, '2017-11-29', '13:06:46', 'md2', NULL, NULL, 0, 0, '0', '3'),
(3, '1', 'field001_field_00_1', 'field001', '2323', '2323', 'Ear phone', 'Lubricant', 1, 'liter', 'mud698', 0, 4, 'predictive', NULL, '2017-11-29', '13:06:46', 'md2', NULL, NULL, 0, 0, '0', '88'),
(4, '1', 'field001_field_00_1', 'field001', '78787', '787878', 'bear', 'Insurance', 3, 'liter', 'mud698', 0, 9, 'immediate', NULL, '2017-11-29', '13:06:46', 'md2', NULL, NULL, 0, 0, '0', '999'),
(5, '2', 'field001_field_00_2', 'field001', '12356', '1234567', 'brezer', 'Consumable', 2, 'kg', 'mud698', 0, 22, 'scheduled', NULL, '2017-11-29', '12:53:13', 'md2', NULL, NULL, 0, 0, '0', '22'),
(6, '2', 'field001_field_00_2', 'field001', '898978', '11111', 'Air Circuit Breakers', 'Consumable', 2, 'centimeter', 'mud698', 0, 2, 'predictive', NULL, '2017-11-29', '12:53:13', 'md2', NULL, NULL, 0, 0, '0', '22'),
(7, '2', 'field001_field_00_2', 'field001', '2323', '2323', 'Ear phone', 'Lubricant', 1, 'liter', 'mud698', 0, 2, 'immediate', NULL, '2017-11-29', '12:53:13', 'md2', NULL, NULL, 0, 0, '0', '2'),
(8, '2', 'field001_field_00_2', 'field001', '34567', '56789', 'Tablet', 'Insurance', 3, 'kg', 'mud698', 0, 2, 'immediate', NULL, '2017-11-29', '12:53:13', 'md2', NULL, NULL, 0, 0, '0', '2'),
(9, '3', 'field001_field_00_3', 'field001', '12356', '1234567', 'brezer', 'Consumable', 2, 'kg', 'mud698', 0, 3, 'predictive', NULL, '2017-11-29', '13:11:49', 'md2', NULL, NULL, 0, 0, '0', 'ok'),
(10, '3', 'field001_field_00_3', 'field001', '9808', '66867', 'washing machine', 'Consumable', 2, 'kg', 'mud698', 0, 2, 'scheduled', NULL, '2017-11-29', '13:11:49', 'md2', NULL, NULL, 0, 0, '0', 'ok'),
(11, '3', 'field001_field_00_3', 'field001', '898978', '11111', 'Air Circuit Breakers', 'Consumable', 2, 'centimeter', 'mud698', 0, 2, 'scheduled', NULL, '2017-11-29', '13:11:49', 'md2', NULL, NULL, 0, 0, '0', 'ok'),
(12, '3', 'field001_field_00_3', 'field001', '2323', '2323', 'Ear phone', 'Lubricant', 1, 'liter', 'mud698', 0, 3, 'predictive', NULL, '2017-11-29', '13:11:49', 'md2', NULL, NULL, 0, 0, '0', 'ok'),
(13, '3', 'field001_field_00_3', 'field001', '34567', '56789', 'Tablet', 'Insurance', 3, 'kg', 'mud698', 0, 2, 'immediate', NULL, '2017-11-29', '13:11:49', 'md2', NULL, NULL, 0, 0, '0', 'ok'),
(14, '3', 'field001_field_00_3', 'field001', '78787', '787878', 'bear', 'Insurance', 3, 'liter', 'mud698', 0, 2, 'immediate', NULL, '2017-11-29', '13:11:49', 'md2', NULL, NULL, 0, 0, '0', 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `lt_master_field_place`
--

CREATE TABLE `lt_master_field_place` (
  `slno` int(11) NOT NULL,
  `field_name` varchar(255) NOT NULL,
  `field_code` varchar(255) DEFAULT NULL,
  `manual_field_code` varchar(255) NOT NULL,
  `zonal_code` varchar(255) NOT NULL,
  `hq_code` varchar(255) NOT NULL,
  `district_code` varchar(255) NOT NULL,
  `state_code` varchar(255) NOT NULL,
  `country_code` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='here field name of zonal wish is kept here';

--
-- Dumping data for table `lt_master_field_place`
--

INSERT INTO `lt_master_field_place` (`slno`, `field_name`, `field_code`, `manual_field_code`, `zonal_code`, `hq_code`, `district_code`, `state_code`, `country_code`, `status`, `date`, `time`) VALUES
(1, 'BhU', 'field001', 'f1', 'zonal001', 'hq1', 'd001', 's001', 'c001', 1, '2017-08-10', '19:56:35'),
(2, 'Field12', 'field002', 'f2', 'zonal001', 'hq1', 'd001', 's001', 'c001', 1, '2017-08-26', '18:09:49'),
(3, 'field001', 'field003', 'f3', 'zonal001', 'hq1', 'd001', 's001', 'c001', 1, '2017-08-26', '18:10:44'),
(4, 'Field1 zonal12', 'field004', 'f4', 'zonal002', 'hq1', 'd001', 's001', 'c001', 1, '2017-08-26', '18:11:27'),
(5, 'field p0', 'field005', 'f5', 'zonal003', 'hq2', 'd001', 's001', 'c001', 1, '2017-08-26', '18:14:24'),
(6, 'iowa 3', 'field006', 'f6', 'zonal003', 'hq2', 'd001', 's001', 'c001', 1, '2017-08-26', '18:15:57'),
(7, 'Alaska', 'field007', 'f7', 'zonal001', 'hq1', 'd001', 's001', 'c001', 1, '2017-08-26', '18:16:47'),
(8, 'Arizona', 'field008', 'f8', 'zonal002', 'hq1', 'd001', 's001', 'c001', 1, '2017-08-26', '18:17:16'),
(9, 'bbsr', 'field009', 'f9', 'zonal001', 'hq1', 'd001', 's001', 'c001', 1, '2017-08-26', '18:17:57'),
(10, 'Connecticut', 'field0010', 'f10', 'zonal003', 'hq2', 'd001', 's001', 'c001', 1, '2017-08-26', '18:18:22'),
(11, 'Delaware', 'field0011', 'f11', 'zonal002', 'hq1', 'd001', 's001', 'c001', 1, '2017-08-26', '18:18:49');

-- --------------------------------------------------------

--
-- Table structure for table `lt_master_field_stock_info`
--

CREATE TABLE `lt_master_field_stock_info` (
  `field_slno` int(11) NOT NULL,
  `field_primary_code` varchar(255) NOT NULL COMMENT 'item primary',
  `field_secondary_code` varchar(255) NOT NULL COMMENT 'item secondary ',
  `field_component_name` varchar(255) NOT NULL COMMENT 'item component name',
  `field_component_id` varchar(255) NOT NULL COMMENT 'item component slno',
  `field_category_name` varchar(255) NOT NULL COMMENT 'category name',
  `field_category_id` varchar(255) NOT NULL COMMENT 'category id',
  `field_unit` varchar(255) NOT NULL COMMENT 'item unit',
  `field_qnty` int(11) NOT NULL DEFAULT '0' COMMENT 'present stock',
  `field_date` date NOT NULL COMMENT 'date of update / or entry',
  `field_time` time NOT NULL COMMENT 'time of update or entry',
  `field_location_id` varchar(255) DEFAULT NULL COMMENT 'headquarter location id'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='here stock of headquater is been stored';

--
-- Dumping data for table `lt_master_field_stock_info`
--

INSERT INTO `lt_master_field_stock_info` (`field_slno`, `field_primary_code`, `field_secondary_code`, `field_component_name`, `field_component_id`, `field_category_name`, `field_category_id`, `field_unit`, `field_qnty`, `field_date`, `field_time`, `field_location_id`) VALUES
(1, '123456', '1001', 'ABC', '1', 'Consumables', '12', 'Mtr', 5, '2017-11-29', '20:46:19', 'field001'),
(2, '7891011', '1002', 'XCV', '2', 'Consumables', '12', 'Mtr', 10, '2017-11-29', '20:46:19', 'field001'),
(3, '121314', '1003', 'KLI', '3', 'Lubricants', '13', 'Ltr', 13, '2017-11-29', '20:46:19', 'field001'),
(4, '151617', '1004', 'JKI', '4', 'Lubricant', '13', 'ltr', 18, '2017-11-29', '20:46:19', 'field002'),
(5, '181920', '1005', 'UGHT', '5', 'CONSUMABLES', '12', 'KM', 0, '2017-11-29', '20:46:19', 'field001'),
(6, '212223', '1006', 'DRT', '6', 'CONSUMABLES', '12', 'KM', 19, '2017-11-29', '20:46:19', 'field001'),
(7, '242526', '1007', 'DEW', '7', 'INSURANCE', '23', 'PIECES', 17, '2017-11-29', '20:46:19', 'field001'),
(8, '272829', '1008', 'FSA', '8', 'INSURANCE', '23', 'KG', 18, '2017-11-29', '20:46:19', 'field002'),
(9, '303132', '1009', 'VZW', '9', 'LUBRICANTS', '13', 'LTR', 15, '2017-11-29', '20:46:19', 'field001'),
(10, '333435', '10010', 'NKF', '10', 'INSURANCE', '23', 'PIECES', 20, '2017-11-29', '20:46:19', 'field002');

-- --------------------------------------------------------

--
-- Table structure for table `lt_master_hq_challan_generate`
--

CREATE TABLE `lt_master_hq_challan_generate` (
  `hqcg_slno` int(11) NOT NULL,
  `hqcg_site_mr_id` varchar(255) DEFAULT NULL COMMENT 'site mar no',
  `hqcg_item_issued` int(11) NOT NULL DEFAULT '0' COMMENT 'no of item issued',
  `hqcg_challan_no` varchar(255) DEFAULT NULL,
  `hqcg_status` int(11) NOT NULL DEFAULT '0' COMMENT '0->part challan is generate 1->success generated 2->cancellation of challan 4->saving of challan 5->other ',
  `hqcg_date` date DEFAULT NULL,
  `hqcg_time` time DEFAULT NULL,
  `hqcg_hq_location_id` varchar(255) DEFAULT NULL,
  `hqcg_zonal_location_id` varchar(255) DEFAULT NULL,
  `hqcg_issuer_id` varchar(255) DEFAULT NULL,
  `hqcg_receiver_id` varchar(255) DEFAULT NULL,
  `hqcg_receive_date` date DEFAULT NULL,
  `hqcg_receive_time` time DEFAULT NULL,
  `hqcg_receive_status` int(11) NOT NULL DEFAULT '0' COMMENT '0-->not recieve'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lt_master_hq_challan_generate`
--

INSERT INTO `lt_master_hq_challan_generate` (`hqcg_slno`, `hqcg_site_mr_id`, `hqcg_item_issued`, `hqcg_challan_no`, `hqcg_status`, `hqcg_date`, `hqcg_time`, `hqcg_hq_location_id`, `hqcg_zonal_location_id`, `hqcg_issuer_id`, `hqcg_receiver_id`, `hqcg_receive_date`, `hqcg_receive_time`, `hqcg_receive_status`) VALUES
(1, 'site_00_1', 3, 'HQ17-12-01/1', 1, '2017-12-01', '11:53:34', 'hq1', 'zonal001', 'userhq@ilab.com', NULL, NULL, NULL, 0),
(2, 'site_00_5', 2, 'HQ17-12-01/2', 1, '2017-12-01', '12:27:01', 'hq1', 'zonal001', 'userhq@ilab.com', NULL, NULL, NULL, 0),
(3, 'site_00_5', 1, 'HQ17-12-01/3', 1, '2017-12-01', '12:34:45', 'hq1', 'zonal001', 'userhq@ilab.com', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lt_master_hq_internal_damage_info`
--

CREATE TABLE `lt_master_hq_internal_damage_info` (
  `hqindi_sno` int(11) NOT NULL,
  `hqindi_primary_code` varchar(255) NOT NULL,
  `hqindi_secondary_code` varchar(255) NOT NULL,
  `hqindi_item_name` varchar(255) NOT NULL,
  `hqindi_item_type_id` varchar(255) NOT NULL,
  `hqindi_item_type_name` varchar(255) NOT NULL,
  `hqindi_unit` varchar(255) NOT NULL,
  `hqindi_qnt` int(11) NOT NULL DEFAULT '0',
  `hqindi_status` int(11) NOT NULL DEFAULT '0' COMMENT '0-> not report to officer ,1->report to office',
  `hqindi_date` date NOT NULL,
  `hqindi_time` time NOT NULL,
  `hqindi_hqlocation_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lt_master_hq_internal_issue_info`
--

CREATE TABLE `lt_master_hq_internal_issue_info` (
  `hqini_sno` int(11) NOT NULL,
  `hqini_primary_code` varchar(255) NOT NULL,
  `hqini_secondary_code` varchar(255) NOT NULL,
  `hqini_item_name` varchar(255) NOT NULL,
  `hqini_item_type_id` varchar(255) NOT NULL,
  `hqini_item_type_name` varchar(255) NOT NULL,
  `hqini_unit` varchar(255) NOT NULL,
  `hqini_qnt` int(11) NOT NULL DEFAULT '0',
  `hqini_status` int(11) NOT NULL DEFAULT '0' COMMENT '0-> not report to officer ,1->report to office',
  `hqini_date` date NOT NULL,
  `hqini_time` time NOT NULL,
  `hqini_hqlocation_id` varchar(255) NOT NULL COMMENT 'hheadquaterf location '
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='here all recode of internal issue';

-- --------------------------------------------------------

--
-- Table structure for table `lt_master_hq_issue_zonal_info`
--

CREATE TABLE `lt_master_hq_issue_zonal_info` (
  `hqzis_slno` int(11) NOT NULL,
  `temp_slno` int(11) NOT NULL,
  `zmrd_slno` varchar(255) NOT NULL,
  `hqzis_challan_id` varchar(255) NOT NULL,
  `hqzis_zonal_mr_id` varchar(255) NOT NULL,
  `hqzis_primary_id` varchar(255) NOT NULL,
  `hqzis_secondary_id` varchar(255) NOT NULL,
  `hqzis_machine_id` varchar(255) DEFAULT NULL,
  `hqzis_item_name` varchar(255) NOT NULL,
  `hqzis_item_slno_id` varchar(255) DEFAULT NULL,
  `hqzis_item_category_name` varchar(255) NOT NULL,
  `hqzis_item_category_id` varchar(255) NOT NULL,
  `hqzis_request_qnt` int(11) NOT NULL,
  `hqzis_approve_qnt` int(11) NOT NULL,
  `hqzis_hq_present_stock` int(11) NOT NULL COMMENT 'here present stock of Headquarter',
  `hqzis_issue_qnt` int(11) NOT NULL COMMENT 'here issued value to headquarter',
  `hqzis_after_issued_stock` int(11) NOT NULL COMMENT 'remain stock of head quarter',
  `hqzis_unit` varchar(255) NOT NULL,
  `hqzis_date` date NOT NULL,
  `hqzis_time` time NOT NULL,
  `hqzis_issued_status` int(11) NOT NULL DEFAULT '0' COMMENT '0=>not issued 1->isssued 2->delete 3->save',
  `hqzis_zonal_location_id` varchar(225) NOT NULL,
  `hqzis_hq_location` varchar(255) NOT NULL,
  `hqzis_receive_status` int(11) NOT NULL DEFAULT '0' COMMENT '0->not received 1->recived',
  `hqzis_transit_loss` int(11) NOT NULL DEFAULT '0' COMMENT '0=>no loss',
  `hqzis_date_receive` date DEFAULT NULL,
  `hqzis_time_receive` time DEFAULT NULL,
  `hqzis_received_qnty` int(11) NOT NULL DEFAULT '0' COMMENT '0->not received from location '
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='here issued from headquarter to zonal/site location';

--
-- Dumping data for table `lt_master_hq_issue_zonal_info`
--

INSERT INTO `lt_master_hq_issue_zonal_info` (`hqzis_slno`, `temp_slno`, `zmrd_slno`, `hqzis_challan_id`, `hqzis_zonal_mr_id`, `hqzis_primary_id`, `hqzis_secondary_id`, `hqzis_machine_id`, `hqzis_item_name`, `hqzis_item_slno_id`, `hqzis_item_category_name`, `hqzis_item_category_id`, `hqzis_request_qnt`, `hqzis_approve_qnt`, `hqzis_hq_present_stock`, `hqzis_issue_qnt`, `hqzis_after_issued_stock`, `hqzis_unit`, `hqzis_date`, `hqzis_time`, `hqzis_issued_status`, `hqzis_zonal_location_id`, `hqzis_hq_location`, `hqzis_receive_status`, `hqzis_transit_loss`, `hqzis_date_receive`, `hqzis_time_receive`, `hqzis_received_qnty`) VALUES
(1, 1, '1', 'HQ17-12-01/1', 'site_00_1', '12356', '1234567', 'mud657', 'brezer', '2', 'Consumable', '2', 10, 30, 147, 8, 139, 'kg', '2017-12-01', '11:53:34', 1, 'zonal001', 'hq1', 0, 0, NULL, NULL, 0),
(2, 2, '2', 'HQ17-12-01/1', 'site_00_1', '3456', '7890', 'mud101', 'fan', '7', 'Consumable', '2', 20, 15, 230, 8, 222, 'kg', '2017-12-01', '11:53:34', 1, 'zonal001', 'hq1', 0, 0, NULL, NULL, 0),
(3, 3, '3', 'HQ17-12-01/1', 'site_00_1', '34567', '56789', 'mud698', 'Tablet', '4', 'Insurance', '3', 30, 30, 230, 8, 222, 'kg', '2017-12-01', '11:53:34', 1, 'zonal001', 'hq1', 0, 0, NULL, NULL, 0),
(4, 4, '14', 'HQ17-12-01/2', 'site_00_5', '12356', '1234567', 'mud101', 'brezer', '2', 'Consumable', '2', 6, 5, 139, 3, 136, 'kg', '2017-12-01', '12:27:01', 1, 'zonal001', 'hq1', 0, 0, NULL, NULL, 0),
(5, 5, '15', 'HQ17-12-01/2', 'site_00_5', '3456', '7890', 'mud101', 'fan', '7', 'Consumable', '2', 3, 2, 222, 1, 221, 'kg', '2017-12-01', '12:27:01', 1, 'zonal001', 'hq1', 0, 0, NULL, NULL, 0),
(6, 6, '19', 'HQ17-12-01/3', 'site_00_5', '34567', '56789', 'mud101', 'Tablet', '4', 'Insurance', '3', 3, 2, 222, 1, 221, 'kg', '2017-12-01', '12:34:45', 1, 'zonal001', 'hq1', 0, 0, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lt_master_hq_issue_zonal_info_temp`
--

CREATE TABLE `lt_master_hq_issue_zonal_info_temp` (
  `hqzis_slno` int(11) NOT NULL,
  `zmrd_slno` varchar(255) DEFAULT NULL COMMENT '"zmrd_slno" is  serial  no  of  lt_master_zonal_material_ requsition_details  table ',
  `hqzis_challan_id` varchar(255) DEFAULT NULL,
  `hqzis_zonal_mr_id` varchar(255) DEFAULT NULL,
  `hqzis_primary_id` varchar(255) DEFAULT NULL,
  `hqzis_secondary_id` varchar(255) DEFAULT NULL,
  `hqzis_machine_id` varchar(255) DEFAULT NULL,
  `hqzis_item_name` varchar(255) DEFAULT NULL,
  `hqzis_item_slno_id` varchar(255) DEFAULT NULL COMMENT 'headquater stock serial no',
  `hqzis_item_category_name` varchar(255) DEFAULT NULL,
  `hqzis_item_category_id` varchar(255) DEFAULT NULL,
  `hqzis_request_qnt` int(11) DEFAULT NULL,
  `hqzis_approve_qnt` int(11) DEFAULT NULL,
  `hqzis_hq_present_stock` int(11) DEFAULT NULL COMMENT 'here present stock of Headquarter',
  `hqzis_issue_qnt` int(11) DEFAULT NULL COMMENT 'here issued value to headquarter',
  `hqzis_after_issued_stock` int(11) DEFAULT NULL COMMENT 'remain stock of head quarter',
  `hqzis_unit` varchar(255) DEFAULT NULL,
  `hqzis_date` date DEFAULT NULL,
  `hqzis_time` time DEFAULT NULL,
  `hqzis_issued_status` int(11) NOT NULL DEFAULT '0' COMMENT '0=>not issued 1->isssued 2->delete 3->save',
  `hqzis_zonal_location_id` varchar(225) DEFAULT NULL,
  `hqzis_hq_location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='here issued from headquarter to zonal/site location';

--
-- Dumping data for table `lt_master_hq_issue_zonal_info_temp`
--

INSERT INTO `lt_master_hq_issue_zonal_info_temp` (`hqzis_slno`, `zmrd_slno`, `hqzis_challan_id`, `hqzis_zonal_mr_id`, `hqzis_primary_id`, `hqzis_secondary_id`, `hqzis_machine_id`, `hqzis_item_name`, `hqzis_item_slno_id`, `hqzis_item_category_name`, `hqzis_item_category_id`, `hqzis_request_qnt`, `hqzis_approve_qnt`, `hqzis_hq_present_stock`, `hqzis_issue_qnt`, `hqzis_after_issued_stock`, `hqzis_unit`, `hqzis_date`, `hqzis_time`, `hqzis_issued_status`, `hqzis_zonal_location_id`, `hqzis_hq_location`) VALUES
(1, '1', 'HQ17-12-01/1', 'site_00_1', '12356', '1234567', 'mud657', 'brezer', '2', 'Consumable', '2', 10, 30, 147, 8, 139, 'kg', '2017-12-01', '11:53:34', 1, 'zonal001', 'hq1'),
(2, '2', 'HQ17-12-01/1', 'site_00_1', '3456', '7890', 'mud101', 'fan', '7', 'Consumable', '2', 20, 15, 230, 8, 222, 'kg', '2017-12-01', '11:53:34', 1, 'zonal001', 'hq1'),
(3, '3', 'HQ17-12-01/1', 'site_00_1', '34567', '56789', 'mud698', 'Tablet', '4', 'Insurance', '3', 30, 30, 230, 8, 222, 'kg', '2017-12-01', '11:53:34', 1, 'zonal001', 'hq1'),
(4, '14', 'HQ17-12-01/2', 'site_00_5', '12356', '1234567', 'mud101', 'brezer', '2', 'Consumable', '2', 6, 5, 139, 3, 136, 'kg', '2017-12-01', '12:27:01', 1, 'zonal001', 'hq1'),
(5, '15', 'HQ17-12-01/2', 'site_00_5', '3456', '7890', 'mud101', 'fan', '7', 'Consumable', '2', 3, 2, 222, 1, 221, 'kg', '2017-12-01', '12:27:01', 1, 'zonal001', 'hq1'),
(6, '19', 'HQ17-12-01/3', 'site_00_5', '34567', '56789', 'mud101', 'Tablet', '4', 'Insurance', '3', 3, 2, 222, 1, 221, 'kg', '2017-12-01', '12:34:45', 1, 'zonal001', 'hq1');

-- --------------------------------------------------------

--
-- Table structure for table `lt_master_HQ_place`
--

CREATE TABLE `lt_master_HQ_place` (
  `slno` int(11) NOT NULL,
  `hq_name` varchar(255) NOT NULL,
  `hq_code` varchar(255) DEFAULT NULL,
  `district_code` varchar(255) NOT NULL,
  `state_code` varchar(255) NOT NULL,
  `country_code` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='here only HeadQuarter Is stored';

--
-- Dumping data for table `lt_master_HQ_place`
--

INSERT INTO `lt_master_HQ_place` (`slno`, `hq_name`, `hq_code`, `district_code`, `state_code`, `country_code`, `status`, `date`, `time`) VALUES
(1, 'kasbaala', 'hq1', 'd001', 's001', 'c001', 1, '2017-08-10', '12:34:59'),
(2, 'HeadQuarter1', 'hq2', 'd001', 's001', 'c001', 1, '2017-08-10', '16:32:30');

-- --------------------------------------------------------

--
-- Table structure for table `lt_master_hq_stock_info`
--

CREATE TABLE `lt_master_hq_stock_info` (
  `hq_slno` int(11) NOT NULL,
  `hq_primary_code` varchar(255) NOT NULL COMMENT 'item primary',
  `hq_secondary_code` varchar(255) NOT NULL COMMENT 'item secondary ',
  `hq_component_name` varchar(255) NOT NULL COMMENT 'item component name',
  `hq_component_id` varchar(255) NOT NULL COMMENT 'item component slno',
  `hq_category_name` varchar(255) NOT NULL COMMENT 'category name',
  `hq_category_id` varchar(255) NOT NULL COMMENT 'category id',
  `hq_unit` varchar(255) NOT NULL COMMENT 'item unit',
  `hq_qnty` int(11) NOT NULL DEFAULT '0' COMMENT 'present stock',
  `hq_date` date NOT NULL COMMENT 'date of update / or entry',
  `hq_time` time NOT NULL COMMENT 'time of update or entry',
  `hq_location_id` varchar(255) DEFAULT NULL COMMENT 'headquarter location id'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='here stock of headquater is been stored';

--
-- Dumping data for table `lt_master_hq_stock_info`
--

INSERT INTO `lt_master_hq_stock_info` (`hq_slno`, `hq_primary_code`, `hq_secondary_code`, `hq_component_name`, `hq_component_id`, `hq_category_name`, `hq_category_id`, `hq_unit`, `hq_qnty`, `hq_date`, `hq_time`, `hq_location_id`) VALUES
(1, '12222', '22222', 'laptop', '11', 'Insurance', '3', 'centimeter', 100, '2017-11-30', '21:25:00', 'hq1'),
(2, '12356', '1234567', 'brezer', '1', 'Consumable', '2', 'kg', 136, '2017-11-30', '21:25:00', 'hq1'),
(3, '4545454', '45454544', 'desktop', '16', 'Consumable', '2', 'centimeter', 320, '2017-11-30', '21:39:48', 'hq1'),
(4, '34567', '56789', 'Tablet', '14', 'Insurance', '3', 'kg', 221, '2017-11-30', '21:39:48', 'hq1'),
(5, '323232', '313131', 'watch', '10', 'Lubricant', '1', 'centimeter', 182, '2017-11-30', '21:25:00', 'hq1'),
(6, '898989', '989898', 'TV', '8', 'Consumable', '2', 'centimeter', 250, '2017-11-30', '21:39:48', 'hq1'),
(7, '3456', '7890', 'fan', '3', 'Consumable', '2', 'kg', 221, '2017-11-30', '21:39:48', 'hq1'),
(8, '98080', '67899', 'grinder', '4', 'Insurance', '3', 'kg', 175, '2017-11-30', '21:39:48', 'hq1');

-- --------------------------------------------------------

--
-- Table structure for table `lt_master_hq_stock_transfer_info`
--

CREATE TABLE `lt_master_hq_stock_transfer_info` (
  `hqt_slno` int(11) NOT NULL COMMENT 'auto increment',
  `hqt_primary_code` varchar(255) NOT NULL COMMENT 'item primary',
  `hqt_secondary_code` varchar(255) NOT NULL COMMENT 'item secondary ',
  `hqt_component_name` varchar(255) NOT NULL COMMENT 'item component name',
  `hqt_component_id` varchar(255) NOT NULL COMMENT 'item component slno',
  `hqt_category_name` varchar(255) NOT NULL COMMENT 'item category name',
  `hqt_category_id` varchar(255) NOT NULL COMMENT 'item category id',
  `hqt_unit` varchar(255) NOT NULL COMMENT 'item unit',
  `hqt_qnty` int(11) NOT NULL DEFAULT '0' COMMENT 'Current Stock',
  `hqt_date` date NOT NULL COMMENT 'date of update / or entry',
  `hqt_time` time NOT NULL COMMENT 'time of update or entry',
  `hqt_location_id` varchar(255) DEFAULT NULL COMMENT 'headquarter location id',
  `hqt_transfer_location` varchar(255) DEFAULT NULL COMMENT 'zonal loaction or site loaction id',
  `hqt_transfer_type` int(11) NOT NULL DEFAULT '0' COMMENT '0->no transfer is done 1-> insert to stock 2->issued stock to site',
  `hqt_remark` text,
  `hqt_opening_balance` int(11) NOT NULL DEFAULT '0',
  `hqt_closing_balance` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='here stock of headquater is been stored';

--
-- Dumping data for table `lt_master_hq_stock_transfer_info`
--

INSERT INTO `lt_master_hq_stock_transfer_info` (`hqt_slno`, `hqt_primary_code`, `hqt_secondary_code`, `hqt_component_name`, `hqt_component_id`, `hqt_category_name`, `hqt_category_id`, `hqt_unit`, `hqt_qnty`, `hqt_date`, `hqt_time`, `hqt_location_id`, `hqt_transfer_location`, `hqt_transfer_type`, `hqt_remark`, `hqt_opening_balance`, `hqt_closing_balance`) VALUES
(1, '12222', '22222', 'laptop', '11', 'Insurance', '3', 'centimeter', 100, '2017-11-30', '21:25:00', 'hq1', NULL, 1, '', 0, 100),
(2, '12356', '1234567', 'brezer', '1', 'Consumable', '2', 'kg', 150, '2017-11-30', '21:25:00', 'hq1', NULL, 1, '', 0, 147),
(3, '4545454', '45454544', 'desktop', '16', 'Consumable', '2', 'centimeter', 120, '2017-11-30', '21:25:00', 'hq1', NULL, 1, '', 0, 120),
(4, '34567', '56789', 'Tablet', '14', 'Insurance', '3', 'kg', 110, '2017-11-30', '21:25:00', 'hq1', NULL, 1, '', 0, 110),
(5, '323232', '313131', 'watch', '10', 'Lubricant', '1', 'centimeter', 182, '2017-11-30', '21:25:00', 'hq1', NULL, 1, '', 0, 182),
(6, '4545454', '45454544', 'desktop', '16', 'Consumable', '2', 'centimeter', 200, '2017-11-30', '21:39:48', 'hq1', NULL, 1, 'OK', 120, 320),
(7, '898989', '989898', 'TV', '8', 'Consumable', '2', 'centimeter', 250, '2017-11-30', '21:39:48', 'hq1', NULL, 1, 'OK', 0, 250),
(8, '34567', '56789', 'Tablet', '14', 'Insurance', '3', 'kg', 120, '2017-11-30', '21:39:48', 'hq1', NULL, 1, 'OK', 110, 230),
(9, '3456', '7890', 'fan', '3', 'Consumable', '2', 'kg', 230, '2017-11-30', '21:39:48', 'hq1', NULL, 1, 'OK', 0, 230),
(10, '98080', '67899', 'grinder', '4', 'Insurance', '3', 'kg', 175, '2017-11-30', '21:39:48', 'hq1', NULL, 1, 'OK', 0, 175),
(12, '12356', '1234567', 'brezer', '1', 'Consumable', '2', 'kg', 8, '2017-12-01', '12:19:18', 'hq1', 'zonal001', 2, NULL, 147, 139),
(13, '3456', '7890', 'fan', '3', 'Consumable', '2', 'kg', 8, '2017-12-01', '12:19:18', 'hq1', 'zonal001', 2, NULL, 230, 222),
(14, '34567', '56789', 'Tablet', '14', 'Insurance', '3', 'kg', 8, '2017-12-01', '12:19:18', 'hq1', 'zonal001', 2, NULL, 230, 222),
(15, '12356', '1234567', 'brezer', '1', 'Consumable', '2', 'kg', 3, '2017-12-01', '12:27:15', 'hq1', 'zonal001', 2, NULL, 139, 136),
(16, '3456', '7890', 'fan', '3', 'Consumable', '2', 'kg', 1, '2017-12-01', '12:27:15', 'hq1', 'zonal001', 2, NULL, 222, 221),
(17, '34567', '56789', 'Tablet', '14', 'Insurance', '3', 'kg', 1, '2017-12-01', '12:35:00', 'hq1', 'zonal001', 2, NULL, 222, 221);

-- --------------------------------------------------------

--
-- Table structure for table `lt_master_hq_transtion_loss`
--

CREATE TABLE `lt_master_hq_transtion_loss` (
  `hqtrl_sno` int(11) NOT NULL,
  `hqtrl_primary_code` varchar(255) NOT NULL,
  `hqtrl_secondary_code` varchar(255) NOT NULL,
  `hqtrl_item_name` varchar(255) NOT NULL,
  `hqtrl_item_type_id` varchar(255) NOT NULL,
  `hqtrl_item_type_name` varchar(255) NOT NULL,
  `hqtrl_unit` varchar(255) NOT NULL,
  `hqtrl_qnt` int(11) NOT NULL DEFAULT '0',
  `hqtrl_status` int(11) NOT NULL DEFAULT '0' COMMENT '0-> not report to officer ,1->report to office',
  `hqtrl_date` date NOT NULL,
  `hqtrl_time` time NOT NULL,
  `hqtrl_hqlocation_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lt_master_hq_zonal_transfer_received_damage_info`
--

CREATE TABLE `lt_master_hq_zonal_transfer_received_damage_info` (
  `hqztdi_sno` int(11) NOT NULL,
  `hqztdi_primary_code` varchar(255) NOT NULL,
  `hqztdi_secondary_code` varchar(255) NOT NULL,
  `hqztdi_item_name` varchar(255) NOT NULL,
  `hqztdi_item_type_id` varchar(255) NOT NULL,
  `hqztdi_item_type_name` varchar(255) NOT NULL,
  `hqztdi_unit` varchar(255) NOT NULL,
  `hqztdi_qnt` int(11) NOT NULL DEFAULT '0',
  `hqztdi_status` int(11) NOT NULL DEFAULT '0' COMMENT '0-> not report to officer ,1->report to office',
  `hqztdi_zonal_location_id` varchar(255) NOT NULL COMMENT 'here locaTION  ID IS STORE',
  `hqztdi_challan_no` varchar(255) NOT NULL COMMENT 'site_challam no is been receide',
  `hqztdi_date` date NOT NULL,
  `hqztdi_time` time NOT NULL,
  `hqztdi_received_qnty` int(11) NOT NULL DEFAULT '0',
  `hqztdi_hqlocation_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lt_master_item_category`
--

CREATE TABLE `lt_master_item_category` (
  `slno` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_item_short` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '1' COMMENT '1-->active 2-->inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='It is hard code there will be no setting in front end user ';

--
-- Dumping data for table `lt_master_item_category`
--

INSERT INTO `lt_master_item_category` (`slno`, `category_name`, `category_item_short`, `date`, `time`, `Status`) VALUES
(1, 'Lubricant', 'lub', '2017-08-31', '00:00:38', 1),
(2, 'Consumable', 'con', '2017-08-25', '08:00:00', 1),
(3, 'Insurance', 'ins', '2017-08-25', '00:00:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lt_master_item_detail`
--

CREATE TABLE `lt_master_item_detail` (
  `slno` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `it_de_unit_m` varchar(255) NOT NULL,
  `item_primary_code` varchar(255) NOT NULL,
  `item_second_code` varchar(255) NOT NULL,
  `item_category_id` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `manufacture_name` text,
  `brand_name` text,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='here item is inserted according primary and secondry code';

--
-- Dumping data for table `lt_master_item_detail`
--

INSERT INTO `lt_master_item_detail` (`slno`, `item_name`, `it_de_unit_m`, `item_primary_code`, `item_second_code`, `item_category_id`, `status`, `manufacture_name`, `brand_name`, `date`, `time`) VALUES
(1, 'brezer', 'kg', '12356', '1234567', '2', 1, 'innovadors pvt ltd', 'teachers', '2017-10-09', '13:08:33'),
(2, ' WINE', 'kg', '23456', '3456', '2', 1, 'QUACA', 'SULA WINE', '2017-10-09', '13:11:52'),
(3, 'fan', 'kg', '3456', '7890', '2', 1, 'usha', 'usha', '2017-10-10', '15:17:26'),
(4, 'grinder', 'kg', '98080', '67899', '3', 1, 'grinder', 'usha', '2017-10-10', '15:18:43'),
(5, 'washing machine', 'kg', '9808', '66867', '2', 1, 'innovadors lab', 'whoorl', '2017-10-10', '15:19:28'),
(6, 'Air Circuit Breakers', 'centimeter', '898978', '11111', '2', 1, 'L & T', 'Bajaj finace', '2017-10-10', '15:25:02'),
(7, 'Entice', 'liter', '22222', '323232', '2', 1, 'TAMCO', 'samsung', '2017-10-10', '15:26:43'),
(8, 'TV', 'centimeter', '898989', '989898', '2', 1, 'LG Pvt Ltd.', 'LG', '2017-10-10', '15:27:55'),
(9, 'phone', 'centimeter', '111111', '121212', '2', 1, 'vivo pvt. ltd.', 'vivo', '2017-10-10', '15:29:21'),
(10, 'watch', 'centimeter', '323232', '313131', '1', 1, 'farstract.pvt.ltd.', 'Fastract', '2017-10-10', '15:30:56'),
(11, 'laptop', 'centimeter', '12222', '22222', '3', 1, 'hcl pvt.ltd.', 'HCL', '2017-10-10', '15:34:43'),
(12, 'PHONE', 'centimeter', '3333', '2222', '1', 1, 'OPPO PVT.LTD.', 'OPPO', '2017-10-10', '15:35:30'),
(13, 'Ear phone', 'liter', '2323', '2323', '1', 1, 'boss pvt.ltd.', 'BOSS', '2017-10-10', '15:37:02'),
(14, 'Tablet', 'kg', '34567', '56789', '3', 1, 'HP Pvt.Ltd', 'HP', '2017-10-10', '15:38:33'),
(15, 'bear', 'liter', '78787', '787878', '3', 1, 'wine pvt.ltd', 'rom', '2017-10-10', '15:41:34'),
(16, 'desktop', 'centimeter', '4545454', '45454544', '2', 1, 'lenovo', 'lenovo', '2017-10-10', '15:44:55');

-- --------------------------------------------------------

--
-- Table structure for table `lt_master_machine_allocation`
--

CREATE TABLE `lt_master_machine_allocation` (
  `slno` int(11) NOT NULL,
  `field_name` varchar(255) NOT NULL,
  `field_id` varchar(255) NOT NULL,
  `zonal_name` varchar(255) NOT NULL,
  `zonal_id` varchar(255) NOT NULL,
  `machine_unique_id` varchar(255) NOT NULL,
  `machine_slno` varchar(255) NOT NULL,
  `model_no` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1->used ,0->not used',
  `date_assigned` date NOT NULL,
  `time_assigned` time NOT NULL,
  `date_status_changed` date DEFAULT NULL,
  `time_status_changed` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='here all machine loaction is present ';

-- --------------------------------------------------------

--
-- Table structure for table `lt_master_machine_category`
--

CREATE TABLE `lt_master_machine_category` (
  `slno` int(11) NOT NULL,
  `machine_cat_id` varchar(255) DEFAULT NULL,
  `machine_cat_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='here machine category is stored which will help in arrange in order in or searching table';

--
-- Dumping data for table `lt_master_machine_category`
--

INSERT INTO `lt_master_machine_category` (`slno`, `machine_cat_id`, `machine_cat_name`, `status`, `date`, `time`) VALUES
(6, 'mc6', 'heavy', 1, '2017-08-11', '13:22:13'),
(7, 'mc7', 'light', 1, '2017-08-14', '14:44:09');

-- --------------------------------------------------------

--
-- Table structure for table `lt_master_machine_detail`
--

CREATE TABLE `lt_master_machine_detail` (
  `m_slno` int(11) NOT NULL,
  `machine_name` text NOT NULL,
  `client_name` varchar(255) DEFAULT NULL,
  `m_model_no` varchar(255) NOT NULL COMMENT 'Machine Model No',
  `machine_unique_id` varchar(255) DEFAULT NULL COMMENT 'Machine Sl No/Unique Code',
  `m_count` int(11) NOT NULL DEFAULT '0',
  `machine_mfg_date` date DEFAULT NULL COMMENT 'Machine Mfg date',
  `machine_commissioning` date DEFAULT NULL COMMENT 'Machine Commissioning Date',
  `m_status` int(11) NOT NULL DEFAULT '1' COMMENT '1->active 2-->inactive',
  `assign_status` int(11) NOT NULL DEFAULT '0' COMMENT '0->not Assigned or used to location',
  `edit_status` int(11) NOT NULL DEFAULT '0' COMMENT '0->all edit is possible i, 1->some protion edit is possible',
  `date_entry` date NOT NULL COMMENT 'date of entry to database',
  `time_entry` time NOT NULL COMMENT 'time of entry to databased',
  `date_assigned` date DEFAULT NULL COMMENT 'date of change in assigned ',
  `time_assign` time DEFAULT NULL COMMENT 'time record  in system',
  `date_status_change` date DEFAULT NULL,
  `time_status_change` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lt_master_machine_detail`
--

INSERT INTO `lt_master_machine_detail` (`m_slno`, `machine_name`, `client_name`, `m_model_no`, `machine_unique_id`, `m_count`, `machine_mfg_date`, `machine_commissioning`, `m_status`, `assign_status`, `edit_status`, `date_entry`, `time_entry`, `date_assigned`, `time_assign`, `date_status_change`, `time_status_change`) VALUES
(1, 'high mine', NULL, 'md5', 'ui90', 0, '2017-08-19', '2017-08-25', 2, 0, 0, '2017-08-26', '13:14:11', NULL, NULL, NULL, NULL),
(2, 'Trimmer', NULL, 'md2', 'mud657', 1, '2017-08-29', '2017-08-31', 1, 1, 1, '2017-08-26', '13:34:21', '2017-08-28', '19:22:06', '2017-08-28', '19:22:06'),
(3, 'Signtaure', NULL, 'md2', 'mud65789', 0, '2017-08-09', '2017-09-19', 1, 0, 0, '2017-08-26', '13:35:20', NULL, NULL, NULL, NULL),
(4, 'Teachers', NULL, 'md3', 'mud6578987', 0, '2017-08-15', '2017-08-27', 1, 0, 0, '2017-08-26', '13:35:53', NULL, NULL, NULL, NULL),
(5, 'Thomy Rose', NULL, 'md4', 'mud65789874', 0, '2017-08-16', '2017-08-31', 2, 0, 0, '2017-08-26', '13:37:13', NULL, NULL, NULL, NULL),
(6, 'Aura', NULL, 'md2', 'mud698', 1, '2017-08-22', '2017-08-26', 1, 1, 1, '2017-08-26', '13:37:47', '2017-08-28', '19:22:06', '2017-08-28', '19:22:06'),
(7, 'Stark Raving', NULL, 'md2', 'mud6579', 0, '2017-08-25', '2017-08-25', 1, 0, 0, '2017-08-26', '13:38:28', NULL, NULL, NULL, NULL),
(8, 'Brandy', NULL, 'md3', 'mud65780', 0, '2017-08-16', '2017-08-21', 1, 0, 0, '2017-08-26', '13:39:06', NULL, NULL, NULL, NULL),
(9, 'Ooh La Laa', NULL, 'md4', 'mud65788', 0, '2017-08-29', '1970-01-01', 1, 0, 0, '2017-08-26', '13:39:53', NULL, NULL, NULL, NULL),
(10, 'ROM', NULL, 'md3', 'mud6500', 0, '2017-08-16', '2017-08-23', 1, 0, 0, '2017-08-26', '13:41:58', NULL, NULL, NULL, NULL),
(11, 'Sampen', NULL, 'md2', 'mud12389', 0, '2017-08-25', '2017-08-22', 1, 0, 0, '2017-08-26', '13:49:06', NULL, NULL, NULL, NULL),
(12, 'up56', NULL, 'md5', '78945', 0, '2017-08-03', '2017-08-11', 1, 0, 0, '2017-08-28', '12:54:42', NULL, NULL, NULL, NULL),
(13, 'CNC TURNING CENTRE, MODEL-LC40', NULL, 'md6', 'mud100', 0, '2017-08-31', '2017-08-31', 1, 0, 0, '2017-08-28', '12:55:55', NULL, NULL, NULL, NULL),
(14, 'RADIAL DRILLING MACHINE', NULL, 'md7', 'mud101', 1, '2017-08-08', '2017-08-30', 1, 1, 1, '2017-08-28', '12:56:52', '2017-09-06', '13:28:38', '2017-09-06', '13:28:38'),
(15, 'CNC VERTICAL DRILL TAP CENTRE 	', NULL, 'md7', 'mud102', 0, '2017-08-30', '2017-08-18', 1, 0, 0, '2017-08-28', '12:57:49', NULL, NULL, NULL, NULL),
(16, 'CO ORDINATE MEASURING MACHINE (C.M.M.)', NULL, 'md9', 'mud103', 0, '2017-09-01', '2017-08-30', 1, 0, 0, '2017-08-28', '12:58:31', NULL, NULL, NULL, NULL),
(17, 'DOT PIN MARKING MACHINE', NULL, 'md10', 'mud104', 0, '2017-08-26', '2017-08-31', 1, 0, 0, '2017-08-28', '12:59:17', NULL, NULL, NULL, NULL),
(18, 'ETCHING MACHINE', NULL, 'md11', 'mud105', 0, '2017-09-01', '2017-09-28', 1, 0, 0, '2017-08-28', '13:00:07', NULL, NULL, NULL, NULL),
(19, 'BANDSAW MACHINE-1 (DCA 340) 	', NULL, 'md12', 'mud106', 1, '2017-08-25', '2017-09-16', 1, 1, 1, '2017-08-28', '13:02:29', '2017-08-30', '16:23:23', '2017-08-30', '16:23:23'),
(20, 'BROACHING MACHINE', NULL, 'md13', 'mud107', 0, '2017-08-15', '2017-08-18', 1, 0, 0, '2017-08-28', '13:03:38', NULL, NULL, NULL, NULL),
(21, 'ULTRASONIC M/C', NULL, 'md14', 'mud108', 0, '2017-08-24', '2017-12-14', 1, 0, 0, '2017-08-28', '13:04:54', NULL, NULL, NULL, NULL),
(22, 'PORTABLE HARDNESS TESTER', NULL, 'md15', 'mud109', 0, '2017-08-30', '2017-08-25', 1, 0, 0, '2017-08-28', '13:05:37', NULL, NULL, NULL, NULL),
(23, 'linux', 'usharani', 'md5', 'mud123478', 0, '2017-10-18', '2017-10-28', 1, 0, 0, '2017-10-03', '17:45:20', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lt_master_machine_detail_old`
--

CREATE TABLE `lt_master_machine_detail_old` (
  `slno` int(11) NOT NULL,
  `machine_no_id` varchar(255) DEFAULT NULL,
  `machine_cat_id` varchar(255) DEFAULT NULL,
  `machine_name` varchar(255) NOT NULL,
  `model_no` varchar(255) NOT NULL,
  `machine_no` varchar(255) NOT NULL,
  `manufacture_name` varchar(255) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `assign_status` int(11) NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lt_master_machine_model_no`
--

CREATE TABLE `lt_master_machine_model_no` (
  `slno` int(11) NOT NULL,
  `machine_category` varchar(255) NOT NULL,
  `model_no` varchar(255) NOT NULL,
  `model_id` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lt_master_machine_model_no`
--

INSERT INTO `lt_master_machine_model_no` (`slno`, `machine_category`, `model_no`, `model_id`, `status`, `date`, `time`) VALUES
(1, '1234', 'mo12', 'md1', 1, '2017-08-21', '12:32:15'),
(2, '1234', 'mo18', 'md2', 1, '2017-08-21', '12:37:44'),
(3, '1234', 'mo19', 'md3', 1, '2017-08-21', '12:38:24'),
(4, '1234', 'mo20', 'md4', 1, '2017-08-21', '12:38:52'),
(5, '1234', 'model 27', 'md5', 1, '2017-08-26', '12:03:11'),
(6, '1234', 'mod100', 'md6', 1, '2017-08-28', '12:21:20'),
(7, '1234', 'mod101', 'md7', 1, '2017-08-28', '12:21:37'),
(8, '1234', 'mod102', 'md8', 1, '2017-08-28', '12:21:57'),
(9, '1234', 'mod103', 'md9', 1, '2017-08-28', '12:22:19'),
(10, '1234', 'mod104', 'md10', 1, '2017-08-28', '12:22:48'),
(11, '1234', 'mod105', 'md11', 1, '2017-08-28', '12:23:12'),
(12, '1234', 'mod106', 'md12', 1, '2017-08-28', '12:23:37'),
(13, '1234', 'mod107', 'md13', 1, '2017-08-28', '12:24:03'),
(14, '1234', 'mod108', 'md14', 1, '2017-08-28', '12:24:34'),
(15, '1234', 'mod109', 'md15', 1, '2017-08-28', '12:24:58'),
(16, '1234', 'mod110', 'md16', 1, '2017-08-28', '12:26:17');

-- --------------------------------------------------------

--
-- Table structure for table `lt_master_machine__transfer_information`
--

CREATE TABLE `lt_master_machine__transfer_information` (
  `slno` int(11) NOT NULL,
  `model_id` text NOT NULL,
  `t_unique_id_machine` text NOT NULL,
  `t_store_site_location` text NOT NULL,
  `t_field_location_id` text NOT NULL,
  `remark` text,
  `attach_file` text,
  `t_status` int(11) NOT NULL DEFAULT '1' COMMENT '1->active 2->inactive',
  `date_creation` date NOT NULL,
  `time_creation` time NOT NULL,
  `date_update_status` date DEFAULT NULL,
  `time_update_status` time DEFAULT NULL,
  `user_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lt_master_machine__transfer_information`
--

INSERT INTO `lt_master_machine__transfer_information` (`slno`, `model_id`, `t_unique_id_machine`, `t_store_site_location`, `t_field_location_id`, `remark`, `attach_file`, `t_status`, `date_creation`, `time_creation`, `date_update_status`, `time_update_status`, `user_id`) VALUES
(1, 'md2', 'mud657', 'zonal001', 'field007', '', '2147483647-17-08-28-524bf771-3091-4530-b8bc-501ab5762c34-original.png', 1, '2017-08-28', '19:22:06', NULL, NULL, 'admin@ilab.com'),
(2, 'md2', 'mud698', 'zonal001', 'field001', '', '2147483647-17-08-28-7-Great-Apps-for-Parent-Teacher-Communication.png', 1, '2017-08-28', '19:22:06', NULL, NULL, 'admin@ilab.com'),
(3, 'md12', 'mud106', 'zonal001', 'field001', 'good', '2147483647-17-08-30-362792d6ed42047d1c28a52cacbbf58e.jpg', 1, '2017-08-30', '16:23:23', NULL, NULL, 'admin@ilab.com'),
(4, 'md7', 'mud101', 'zonal001', 'field001', 'please', '2147483647-17-09-06-Screenshot at 2017-02-01 12-02-10.png', 1, '2017-09-06', '13:28:38', NULL, NULL, 'admin@ilab.com');

-- --------------------------------------------------------

--
-- Table structure for table `lt_master_model_item_detail`
--

CREATE TABLE `lt_master_model_item_detail` (
  `i_slno` int(11) NOT NULL,
  `i_item_slno` text NOT NULL,
  `it_de_unit` varchar(255) NOT NULL,
  `i_model_id` text NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_primary_code` text NOT NULL,
  `item_second_code` text NOT NULL,
  `item_category_id` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='here item is inserted according primary and secondry code';

--
-- Dumping data for table `lt_master_model_item_detail`
--

INSERT INTO `lt_master_model_item_detail` (`i_slno`, `i_item_slno`, `it_de_unit`, `i_model_id`, `item_name`, `item_primary_code`, `item_second_code`, `item_category_id`, `status`, `date`, `time`) VALUES
(1, '1', 'kg', 'md2', 'brezer', '12356', '1234567', '2', 1, '2017-10-09', '13:08:33'),
(2, '1', 'kg', 'md3', 'brezer', '12356', '1234567', '2', 1, '2017-10-09', '13:08:33'),
(3, '1', 'kg', 'md4', 'brezer', '12356', '1234567', '2', 1, '2017-10-09', '13:08:33'),
(4, '1', 'kg', 'md5', 'brezer', '12356', '1234567', '2', 1, '2017-10-09', '13:08:33'),
(5, '1', 'kg', 'md6', 'brezer', '12356', '1234567', '2', 1, '2017-10-09', '13:08:33'),
(6, '1', 'kg', 'md7', 'brezer', '12356', '1234567', '2', 1, '2017-10-09', '13:08:33'),
(7, '1', 'kg', 'md8', 'brezer', '12356', '1234567', '2', 1, '2017-10-09', '13:08:33'),
(8, '1', 'kg', 'md9', 'brezer', '12356', '1234567', '2', 1, '2017-10-09', '13:08:33'),
(9, '1', 'kg', 'md10', 'brezer', '12356', '1234567', '2', 1, '2017-10-09', '13:08:33'),
(10, '1', 'kg', 'md11', 'brezer', '12356', '1234567', '2', 1, '2017-10-09', '13:08:33'),
(11, '1', 'kg', 'md12', 'brezer', '12356', '1234567', '2', 1, '2017-10-09', '13:08:33'),
(12, '1', 'kg', 'md13', 'brezer', '12356', '1234567', '2', 1, '2017-10-09', '13:08:33'),
(13, '1', 'kg', 'md14', 'brezer', '12356', '1234567', '2', 1, '2017-10-09', '13:08:33'),
(14, '1', 'kg', 'md15', 'brezer', '12356', '1234567', '2', 1, '2017-10-09', '13:08:33'),
(15, '1', 'kg', 'md16', 'brezer', '12356', '1234567', '2', 1, '2017-10-09', '13:08:33'),
(16, '2', 'kg', 'md14', ' WINE', '23456', '3456', '2', 1, '2017-10-09', '13:11:52'),
(17, '3', 'kg', 'md7', 'fan', '3456', '7890', '2', 1, '2017-10-10', '15:17:26'),
(18, '4', 'kg', 'md16', 'grinder', '98080', '67899', '3', 1, '2017-10-10', '15:18:43'),
(19, '5', 'kg', 'md2', 'washing machine', '9808', '66867', '2', 1, '2017-10-10', '15:19:28'),
(20, '5', 'kg', 'md3', 'washing machine', '9808', '66867', '2', 1, '2017-10-10', '15:19:28'),
(21, '5', 'kg', 'md4', 'washing machine', '9808', '66867', '2', 1, '2017-10-10', '15:19:28'),
(22, '5', 'kg', 'md5', 'washing machine', '9808', '66867', '2', 1, '2017-10-10', '15:19:28'),
(23, '5', 'kg', 'md6', 'washing machine', '9808', '66867', '2', 1, '2017-10-10', '15:19:28'),
(24, '5', 'kg', 'md7', 'washing machine', '9808', '66867', '2', 1, '2017-10-10', '15:19:28'),
(25, '5', 'kg', 'md8', 'washing machine', '9808', '66867', '2', 1, '2017-10-10', '15:19:28'),
(26, '5', 'kg', 'md9', 'washing machine', '9808', '66867', '2', 1, '2017-10-10', '15:19:28'),
(27, '5', 'kg', 'md10', 'washing machine', '9808', '66867', '2', 1, '2017-10-10', '15:19:28'),
(28, '5', 'kg', 'md11', 'washing machine', '9808', '66867', '2', 1, '2017-10-10', '15:19:28'),
(29, '5', 'kg', 'md12', 'washing machine', '9808', '66867', '2', 1, '2017-10-10', '15:19:28'),
(30, '5', 'kg', 'md13', 'washing machine', '9808', '66867', '2', 1, '2017-10-10', '15:19:28'),
(31, '5', 'kg', 'md14', 'washing machine', '9808', '66867', '2', 1, '2017-10-10', '15:19:28'),
(32, '5', 'kg', 'md15', 'washing machine', '9808', '66867', '2', 1, '2017-10-10', '15:19:28'),
(33, '5', 'kg', 'md16', 'washing machine', '9808', '66867', '2', 1, '2017-10-10', '15:19:28'),
(34, '6', 'centimeter', 'md2', 'Air Circuit Breakers', '898978', '11111', '2', 1, '2017-10-10', '15:25:02'),
(35, '6', 'centimeter', 'md3', 'Air Circuit Breakers', '898978', '11111', '2', 1, '2017-10-10', '15:25:02'),
(36, '6', 'centimeter', 'md4', 'Air Circuit Breakers', '898978', '11111', '2', 1, '2017-10-10', '15:25:02'),
(37, '6', 'centimeter', 'md5', 'Air Circuit Breakers', '898978', '11111', '2', 1, '2017-10-10', '15:25:02'),
(38, '6', 'centimeter', 'md6', 'Air Circuit Breakers', '898978', '11111', '2', 1, '2017-10-10', '15:25:02'),
(39, '6', 'centimeter', 'md7', 'Air Circuit Breakers', '898978', '11111', '2', 1, '2017-10-10', '15:25:02'),
(40, '6', 'centimeter', 'md8', 'Air Circuit Breakers', '898978', '11111', '2', 1, '2017-10-10', '15:25:02'),
(41, '6', 'centimeter', 'md9', 'Air Circuit Breakers', '898978', '11111', '2', 1, '2017-10-10', '15:25:02'),
(42, '6', 'centimeter', 'md10', 'Air Circuit Breakers', '898978', '11111', '2', 1, '2017-10-10', '15:25:02'),
(43, '6', 'centimeter', 'md11', 'Air Circuit Breakers', '898978', '11111', '2', 1, '2017-10-10', '15:25:02'),
(44, '6', 'centimeter', 'md12', 'Air Circuit Breakers', '898978', '11111', '2', 1, '2017-10-10', '15:25:02'),
(45, '6', 'centimeter', 'md13', 'Air Circuit Breakers', '898978', '11111', '2', 1, '2017-10-10', '15:25:02'),
(46, '6', 'centimeter', 'md14', 'Air Circuit Breakers', '898978', '11111', '2', 1, '2017-10-10', '15:25:02'),
(47, '6', 'centimeter', 'md15', 'Air Circuit Breakers', '898978', '11111', '2', 1, '2017-10-10', '15:25:02'),
(48, '6', 'centimeter', 'md16', 'Air Circuit Breakers', '898978', '11111', '2', 1, '2017-10-10', '15:25:02'),
(49, '7', 'liter', 'md11', 'Entice', '22222', '323232', '2', 1, '2017-10-10', '15:26:43'),
(50, '8', 'centimeter', 'md16', 'TV', '898989', '989898', '2', 1, '2017-10-10', '15:27:55'),
(51, '9', 'centimeter', 'md14', 'phone', '111111', '121212', '2', 1, '2017-10-10', '15:29:21'),
(52, '10', 'centimeter', 'md14', 'watch', '323232', '313131', '1', 1, '2017-10-10', '15:30:56'),
(53, '11', 'centimeter', 'md9', 'laptop', '12222', '22222', '3', 1, '2017-10-10', '15:34:43'),
(54, '12', 'centimeter', 'md14', 'PHONE', '3333', '2222', '1', 1, '2017-10-10', '15:35:30'),
(55, '13', 'liter', 'md2', 'Ear phone', '2323', '2323', '1', 1, '2017-10-10', '15:37:02'),
(56, '13', 'liter', 'md3', 'Ear phone', '2323', '2323', '1', 1, '2017-10-10', '15:37:02'),
(57, '13', 'liter', 'md4', 'Ear phone', '2323', '2323', '1', 1, '2017-10-10', '15:37:02'),
(58, '13', 'liter', 'md5', 'Ear phone', '2323', '2323', '1', 1, '2017-10-10', '15:37:02'),
(59, '13', 'liter', 'md6', 'Ear phone', '2323', '2323', '1', 1, '2017-10-10', '15:37:02'),
(60, '13', 'liter', 'md7', 'Ear phone', '2323', '2323', '1', 1, '2017-10-10', '15:37:02'),
(61, '13', 'liter', 'md8', 'Ear phone', '2323', '2323', '1', 1, '2017-10-10', '15:37:02'),
(62, '13', 'liter', 'md9', 'Ear phone', '2323', '2323', '1', 1, '2017-10-10', '15:37:02'),
(63, '13', 'liter', 'md10', 'Ear phone', '2323', '2323', '1', 1, '2017-10-10', '15:37:02'),
(64, '13', 'liter', 'md11', 'Ear phone', '2323', '2323', '1', 1, '2017-10-10', '15:37:02'),
(65, '13', 'liter', 'md12', 'Ear phone', '2323', '2323', '1', 1, '2017-10-10', '15:37:02'),
(66, '13', 'liter', 'md13', 'Ear phone', '2323', '2323', '1', 1, '2017-10-10', '15:37:02'),
(67, '13', 'liter', 'md14', 'Ear phone', '2323', '2323', '1', 1, '2017-10-10', '15:37:02'),
(68, '13', 'liter', 'md15', 'Ear phone', '2323', '2323', '1', 1, '2017-10-10', '15:37:02'),
(69, '13', 'liter', 'md16', 'Ear phone', '2323', '2323', '1', 1, '2017-10-10', '15:37:02'),
(70, '14', 'kg', 'md2', 'Tablet', '34567', '56789', '3', 1, '2017-10-10', '15:38:33'),
(71, '14', 'kg', 'md3', 'Tablet', '34567', '56789', '3', 1, '2017-10-10', '15:38:33'),
(72, '14', 'kg', 'md4', 'Tablet', '34567', '56789', '3', 1, '2017-10-10', '15:38:33'),
(73, '14', 'kg', 'md5', 'Tablet', '34567', '56789', '3', 1, '2017-10-10', '15:38:33'),
(74, '14', 'kg', 'md6', 'Tablet', '34567', '56789', '3', 1, '2017-10-10', '15:38:33'),
(75, '14', 'kg', 'md7', 'Tablet', '34567', '56789', '3', 1, '2017-10-10', '15:38:33'),
(76, '14', 'kg', 'md8', 'Tablet', '34567', '56789', '3', 1, '2017-10-10', '15:38:33'),
(77, '14', 'kg', 'md9', 'Tablet', '34567', '56789', '3', 1, '2017-10-10', '15:38:33'),
(78, '14', 'kg', 'md10', 'Tablet', '34567', '56789', '3', 1, '2017-10-10', '15:38:33'),
(79, '14', 'kg', 'md11', 'Tablet', '34567', '56789', '3', 1, '2017-10-10', '15:38:33'),
(80, '14', 'kg', 'md12', 'Tablet', '34567', '56789', '3', 1, '2017-10-10', '15:38:33'),
(81, '14', 'kg', 'md13', 'Tablet', '34567', '56789', '3', 1, '2017-10-10', '15:38:33'),
(82, '14', 'kg', 'md14', 'Tablet', '34567', '56789', '3', 1, '2017-10-10', '15:38:33'),
(83, '14', 'kg', 'md15', 'Tablet', '34567', '56789', '3', 1, '2017-10-10', '15:38:33'),
(84, '14', 'kg', 'md16', 'Tablet', '34567', '56789', '3', 1, '2017-10-10', '15:38:33'),
(85, '15', 'liter', 'md2', 'bear', '78787', '787878', '3', 1, '2017-10-10', '15:41:34'),
(86, '15', 'liter', 'md3', 'bear', '78787', '787878', '3', 1, '2017-10-10', '15:41:34'),
(87, '15', 'liter', 'md4', 'bear', '78787', '787878', '3', 1, '2017-10-10', '15:41:34'),
(88, '15', 'liter', 'md5', 'bear', '78787', '787878', '3', 1, '2017-10-10', '15:41:34'),
(89, '15', 'liter', 'md6', 'bear', '78787', '787878', '3', 1, '2017-10-10', '15:41:34'),
(90, '15', 'liter', 'md7', 'bear', '78787', '787878', '3', 1, '2017-10-10', '15:41:34'),
(91, '15', 'liter', 'md8', 'bear', '78787', '787878', '3', 1, '2017-10-10', '15:41:34'),
(92, '15', 'liter', 'md9', 'bear', '78787', '787878', '3', 1, '2017-10-10', '15:41:34'),
(93, '15', 'liter', 'md10', 'bear', '78787', '787878', '3', 1, '2017-10-10', '15:41:34'),
(94, '15', 'liter', 'md11', 'bear', '78787', '787878', '3', 1, '2017-10-10', '15:41:34'),
(95, '15', 'liter', 'md12', 'bear', '78787', '787878', '3', 1, '2017-10-10', '15:41:34'),
(96, '15', 'liter', 'md13', 'bear', '78787', '787878', '3', 1, '2017-10-10', '15:41:34'),
(97, '15', 'liter', 'md14', 'bear', '78787', '787878', '3', 1, '2017-10-10', '15:41:34'),
(98, '15', 'liter', 'md15', 'bear', '78787', '787878', '3', 1, '2017-10-10', '15:41:34'),
(99, '15', 'liter', 'md16', 'bear', '78787', '787878', '3', 1, '2017-10-10', '15:41:34'),
(100, '16', 'centimeter', 'md8', 'desktop', '4545454', '45454544', '2', 1, '2017-10-10', '15:44:55');

-- --------------------------------------------------------

--
-- Table structure for table `lt_master_state`
--

CREATE TABLE `lt_master_state` (
  `slno` int(11) NOT NULL,
  `state_name` varchar(255) NOT NULL,
  `state_code` varchar(255) NOT NULL,
  `country_id` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lt_master_state`
--

INSERT INTO `lt_master_state` (`slno`, `state_name`, `state_code`, `country_id`, `status`, `date`, `time`) VALUES
(1, 'Odisha', 's001', 'c001', 1, '2017-08-09', '10:29:29');

-- --------------------------------------------------------

--
-- Table structure for table `lt_master_unit_system`
--

CREATE TABLE `lt_master_unit_system` (
  `u_slno` int(11) NOT NULL,
  `name_unit` varchar(255) DEFAULT NULL,
  `u_code_unit` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lt_master_unit_system`
--

INSERT INTO `lt_master_unit_system` (`u_slno`, `name_unit`, `u_code_unit`, `status`, `date`, `time`) VALUES
(1, 'kg', 'unit001', 1, '2017-10-03', '18:37:17'),
(2, 'liter', 'unit002', 1, '2017-10-10', '15:20:29'),
(3, 'centimeter', 'unit003', 1, '2017-10-10', '15:21:03'),
(4, 'piece', 'unit004', 1, '2017-10-10', '16:10:37'),
(5, 'gram', 'unit005', 1, '2017-10-10', '18:37:49');

-- --------------------------------------------------------

--
-- Table structure for table `lt_master_user_system`
--

CREATE TABLE `lt_master_user_system` (
  `u_slno` int(11) NOT NULL,
  `user_name` text,
  `user_email` varchar(255) NOT NULL,
  `user_pass` text NOT NULL,
  `user_mobile` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `user_id` text,
  `user_designation` text,
  `user_dob` date DEFAULT NULL,
  `user_level` int(11) DEFAULT NULL,
  `hq_store_id` text,
  `sub_site_store_id` text,
  `sub_field_store_id` text,
  `u_status` int(11) NOT NULL DEFAULT '1',
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lt_master_user_system`
--

INSERT INTO `lt_master_user_system` (`u_slno`, `user_name`, `user_email`, `user_pass`, `user_mobile`, `password`, `user_id`, `user_designation`, `user_dob`, `user_level`, `hq_store_id`, `sub_site_store_id`, `sub_field_store_id`, `u_status`, `date`, `time`) VALUES
(1, 'sameee78', 'userhq@ilab.com', '81dc9bdb52d04dc20036dbd8313ed055', '123', '1234', 'user_001', 'teat89', '2017-09-20', 1, 'hq1', NULL, NULL, 1, '2017-09-04', '18:07:16'),
(2, 'sipra1', 'sipra@ilab.com', '7e5c5482570707548c22434436e329ef', '2345211290', '1016896136', 'user_002', 'head Director', '1988-06-19', 4, 'hq2', 'zonal003', 'field006', 1, '2017-09-05', '12:19:19'),
(3, 'pritish', 'pritish@ilab.com', '81dc9bdb52d04dc20036dbd8313ed055', '986534321', '1234', 'user_003', 'senior developer', '2017-03-22', 2, 'hq1', NULL, NULL, 1, '2017-09-05', '12:20:18'),
(4, 'usharani', 'usharani@ilab.com', '30ffcb8eb604b18bcad4a32b01bfecae', '897545678', '1783804273', 'user_004', 'junior developer', '1992-12-10', 2, 'hq1', NULL, NULL, 1, '2017-09-05', '12:21:58'),
(5, 'pragyan', 'zonal1@ilab.com', '81dc9bdb52d04dc20036dbd8313ed055', '98564646', '1234', 'user_005', 'HR', '1993-09-30', 3, 'hq1', 'zonal001', NULL, 1, '2017-09-05', '12:24:50'),
(6, 'Paramita', 'paramita@ilab.com', '311ca863b62f9c0954b7685ed88561df', '876767677', '1540608425', 'user_006', 'banker', '1992-09-13', 3, 'hq1', 'zonal001', NULL, 1, '2017-09-05', '12:25:44'),
(7, 'samparna', 'samparna@ilab.com', 'b8882a734e1ecf15fd3c310bd7c70f72', '9878787878', '1811298308', 'user_007', 'IT MANAGER', '1994-09-27', 3, 'hq1', 'zonal001', NULL, 1, '2017-09-05', '12:26:51'),
(8, 'Pragyan ojha', 'ojha78@ilab.com', '842b89813207abcc8ea86d42d4c96704', '987678787', '1844185674', 'user_008', 'manager', '1993-09-22', 3, 'hq1', 'zonal002', NULL, 1, '2017-09-05', '12:36:47'),
(9, 'itishree', 'itishree@ilab.com', '7de7914aed6e25604153ccf8e9e096cc', '987867676', '857035675', 'user_009', 'hr team', '1990-09-29', 3, 'hq1', 'zonal002', NULL, 1, '2017-09-05', '12:38:02'),
(10, 'liza mishra', 'liza@ilab.com', 'e7d6535be16d987370efab0abc06b88f', '989886862', '1016984298', 'user_0010', 'teacher', '1992-09-20', 3, 'hq1', 'zonal002', NULL, 1, '2017-09-05', '12:41:55'),
(11, 'sanju mishra', 'field1@ilab.com', '81dc9bdb52d04dc20036dbd8313ed055', '9878657574', '1234', 'user_0011', 'lecture', '1992-09-28', 4, 'hq1', 'zonal001', 'field001', 1, '2017-09-05', '12:46:25'),
(12, 'milan dash', 'milan@ilab.com', '7d76de62f6ce41ff623ea5bfcea79d74', '9867565647', '71109703', 'user_0012', 'credit manager', '1886-09-26', 4, 'hq1', 'zonal001', 'field001', 1, '2017-09-05', '12:47:34'),
(13, 'manju nayak', 'manjunayak@ilab.com', '7589ce1f47b8fe6709cf0e874bf93464', '987878676', '311339847', 'user_0013', 'ceo', '1991-09-23', 4, 'hq1', 'zonal001', 'field001', 1, '2017-09-05', '12:51:52'),
(14, 'harisankar', 'harisankar@ilab.com', '78fc4b0a8de1cd44bc591f84dbd391b2', '9438147975', '573791542', 'user_0014', 'developer team member', '1995-09-14', 4, 'hq1', 'zonal001', 'field001', 1, '2017-09-05', '12:57:58'),
(15, 'mani rath', 'manirath@ilab.com', '9a1eab06e75f4da12a379ee4f74d8945', '9856785572', '1061320773', 'user_0015', 'DIN', '1987-09-26', 4, 'hq1', 'zonal001', 'field002', 1, '2017-09-05', '13:02:12'),
(16, 'SASMITA RATH', 'sasmitarath@ilab.com', '086bf7e8e588cf856443e1c0625a5215', '9878786756', '1080798423', 'user_0016', 'teacher', '1992-09-27', 4, 'hq1', 'zonal001', 'field002', 1, '2017-09-05', '13:04:48'),
(17, 'meerambica', 'meerambica@ilab.com', '96bde7ec019249ba940f9373ab79c700', '9861293466', '1747987829', 'user_0017', 'HR', '1885-09-23', 4, 'hq1', 'zonal001', 'field003', 1, '2017-09-05', '13:07:26'),
(18, 'deepak', 'deepak@ilab.com', 'd5b085f11687f46f03f5139fe8c50141', '9878787878', '608327522', 'user_0018', 'engineer', '1993-09-19', 4, 'hq1', 'zonal001', 'field003', 1, '2017-09-05', '13:08:20'),
(19, 'silarani', 'silarani@ilab.com', '66cf30a450822331df8b6a018cfc27f4', '9867676766', '687657833', 'user_0019', 'designer', '1990-09-27', 4, 'hq1', 'zonal001', 'field007', 1, '2017-09-05', '13:10:12'),
(20, 'gayatri sahoo', 'gayatri', 'a0fda552ba1ab93661530732cb53b4eb', '9787867676', '1036004262', 'user_0020', 'developer', '2001-09-07', 4, 'hq1', 'zonal001', 'field007', 1, '2017-09-05', '13:11:42');

-- --------------------------------------------------------

--
-- Table structure for table `lt_master_zonal_challan_generate`
--

CREATE TABLE `lt_master_zonal_challan_generate` (
  `zqcg_slno` int(11) NOT NULL,
  `zqcg_site_mr_id` varchar(255) DEFAULT NULL COMMENT 'site mar no',
  `zqcg_item_issued` int(11) NOT NULL DEFAULT '0' COMMENT 'no of item issued',
  `zqcg_challan_no` varchar(255) DEFAULT NULL,
  `zqcg_status` int(11) NOT NULL DEFAULT '0' COMMENT '0->part challan is generate 1->success generated 2->cancellation of challan 4->saving of challan 5->other ',
  `zqcg_date` date DEFAULT NULL,
  `zqcg_time` time DEFAULT NULL,
  `zqcg_hq_location_id` varchar(255) DEFAULT NULL,
  `zqcg_zonal_location_id` varchar(255) DEFAULT NULL,
  `zqcg_issuer_id` varchar(255) DEFAULT NULL,
  `zqcg_receiver_id` varchar(255) DEFAULT NULL,
  `zqcg_receive_date` date DEFAULT NULL,
  `zqcg_receive_time` time DEFAULT NULL,
  `zqcg_receive_status` int(11) NOT NULL DEFAULT '0' COMMENT '0-->not recieve'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lt_master_zonal_hq_receive_info`
--

CREATE TABLE `lt_master_zonal_hq_receive_info` (
  `zonhqri_slno` int(11) NOT NULL,
  `zonhqri_challan_id` varchar(255) NOT NULL,
  `zonhqri_zonal_mr_id` varchar(255) NOT NULL,
  `zonhqri_primary_id` varchar(255) NOT NULL,
  `zonhqri_secondary_id` varchar(255) NOT NULL,
  `zonhqri_item_name` varchar(255) NOT NULL,
  `zonhqri_item_slno_id` varchar(255) DEFAULT NULL,
  `zonhqri_item_category_name` varchar(255) NOT NULL,
  `zonhqri_item_category_id` varchar(255) NOT NULL,
  `zonhqri_request_qnt` int(11) NOT NULL,
  `zonhqri_approve_qnt` int(11) NOT NULL,
  `zonhqri_hq_present_stock` int(11) NOT NULL,
  `zonhqri_issue_qnt` int(11) NOT NULL,
  `zonhqri_after_issued_stock` int(11) NOT NULL,
  `zonhqri_unit` varchar(255) NOT NULL,
  `zonhqri_date` date NOT NULL,
  `zonhqri_time` time NOT NULL,
  `zonhqri_received_qnty` int(11) NOT NULL DEFAULT '0' COMMENT '0->not received from location ',
  `zonhqri_receive_status` int(11) NOT NULL DEFAULT '0' COMMENT '0->not received 1->recived',
  `zonhqri_issued_status` int(11) NOT NULL DEFAULT '0' COMMENT '0=>not issued 1->isssued 2->delete 3->save',
  `zonhqri_transit_loss` int(11) NOT NULL DEFAULT '0' COMMENT '0=>no loss',
  `zonhqri_date_receive` date DEFAULT NULL,
  `zonhqri_time_receive` time DEFAULT NULL,
  `zonhqri_zonal_location_id` varchar(225) NOT NULL,
  `zonhqri_hq_location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='here zonal receive stock from hq ';

-- --------------------------------------------------------

--
-- Table structure for table `lt_master_zonal_issue_field_info`
--

CREATE TABLE `lt_master_zonal_issue_field_info` (
  `zqzis_slno` int(11) NOT NULL,
  `temp_slno` int(11) NOT NULL,
  `fmrd_slno` varchar(255) NOT NULL,
  `zqzis_challan_id` varchar(255) NOT NULL,
  `zqzis_zonal_mr_id` varchar(255) NOT NULL,
  `zqzis_primary_id` varchar(255) NOT NULL,
  `zqzis_secondary_id` varchar(255) NOT NULL,
  `zqzis_machine_id` varchar(255) DEFAULT NULL,
  `zqzis_item_name` varchar(255) NOT NULL,
  `zqzis_item_slno_id` varchar(255) DEFAULT NULL,
  `zqzis_item_category_name` varchar(255) NOT NULL,
  `zqzis_item_category_id` varchar(255) NOT NULL,
  `zqzis_request_qnt` int(11) NOT NULL,
  `zqzis_approve_qnt` int(11) NOT NULL,
  `zqzis_hq_present_stock` int(11) NOT NULL COMMENT 'here present stock of Headquarter',
  `zqzis_issue_qnt` int(11) NOT NULL COMMENT 'here issued value to headquarter',
  `zqzis_after_issued_stock` int(11) NOT NULL COMMENT 'remain stock of head quarter',
  `zqzis_unit` varchar(255) NOT NULL,
  `zqzis_date` date NOT NULL,
  `zqzis_time` time NOT NULL,
  `zqzis_issued_status` int(11) NOT NULL DEFAULT '0' COMMENT '0=>not issued 1->isssued 2->delete 3->save',
  `zqzis_zonal_location_id` varchar(225) NOT NULL,
  `zqzis_hq_location` varchar(255) NOT NULL,
  `zqzis_receive_status` int(11) NOT NULL DEFAULT '0' COMMENT '0->not received 1->recived',
  `zqzis_transit_loss` int(11) NOT NULL DEFAULT '0' COMMENT '0=>no loss',
  `zqzis_date_receive` date DEFAULT NULL,
  `zqzis_time_receive` time DEFAULT NULL,
  `zqzis_received_qnty` int(11) NOT NULL DEFAULT '0' COMMENT '0->not received from location '
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='here issued from headquarter to zonal/site location';

-- --------------------------------------------------------

--
-- Table structure for table `lt_master_zonal_issue_field_info_temp`
--

CREATE TABLE `lt_master_zonal_issue_field_info_temp` (
  `zqzis_slno` int(11) NOT NULL,
  `fmrd_slno` varchar(255) DEFAULT NULL COMMENT '"zmrd_slno" is  serial  no  of  lt_master_zonal_material_ requsition_details  table ',
  `zqzis_challan_id` varchar(255) DEFAULT NULL,
  `zqzis_zonal_mr_id` varchar(255) DEFAULT NULL,
  `zqzis_primary_id` varchar(255) DEFAULT NULL,
  `zqzis_secondary_id` varchar(255) DEFAULT NULL,
  `zqzis_machine_id` varchar(255) DEFAULT NULL,
  `zqzis_item_name` varchar(255) DEFAULT NULL,
  `zqzis_item_slno_id` varchar(255) DEFAULT NULL COMMENT 'headquater stock serial no',
  `zqzis_item_category_name` varchar(255) DEFAULT NULL,
  `zqzis_item_category_id` varchar(255) DEFAULT NULL,
  `zqzis_request_qnt` int(11) DEFAULT NULL,
  `zqzis_approve_qnt` int(11) DEFAULT NULL,
  `zqzis_hq_present_stock` int(11) DEFAULT NULL COMMENT 'here present stock of Headquarter',
  `zqzis_issue_qnt` int(11) DEFAULT NULL COMMENT 'here issued value to headquarter',
  `zqzis_after_issued_stock` int(11) DEFAULT NULL COMMENT 'remain stock of head quarter',
  `zqzis_unit` varchar(255) DEFAULT NULL,
  `zqzis_date` date DEFAULT NULL,
  `zqzis_time` time DEFAULT NULL,
  `zqzis_issued_status` int(11) NOT NULL DEFAULT '0' COMMENT '0=>not issued 1->isssued 2->delete 3->save',
  `zqzis_field_location_id` varchar(225) DEFAULT NULL,
  `zqzis_zonal_location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='here issued from headquarter to zonal/site location';

-- --------------------------------------------------------

--
-- Table structure for table `lt_master_zonal_material_requsition`
--

CREATE TABLE `lt_master_zonal_material_requsition` (
  `zmr_slno` int(11) NOT NULL,
  `zmr_site_to_location_id` varchar(255) NOT NULL COMMENT 'to head quater',
  `zmr_site_from_location_id` varchar(255) NOT NULL COMMENT 'from where request is been raised',
  `zmr_user_id` text NOT NULL COMMENT 'requested user id ',
  `zmr_unqiue_mr_id` varchar(255) DEFAULT NULL COMMENT 'Requiest no ',
  `zmr_forward_id` text NOT NULL COMMENT 'who will approver the request ',
  `forward_status` int(11) NOT NULL DEFAULT '0' COMMENT '0->not approved 1->approved',
  `no_items_z` int(11) NOT NULL DEFAULT '0' COMMENT 'no of items is been order',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0->for not complteing process 2-> complte status of issue->1 complete status of request',
  `no_item_issued_z` int(11) NOT NULL DEFAULT '0' COMMENT 'no of item is been issued',
  `no_item_transfered_z` int(11) NOT NULL DEFAULT '0' COMMENT 'no of items is been transfered ',
  `total_no_item_issued` int(11) NOT NULL DEFAULT '0' COMMENT 'total no of items transfer and issued value',
  `date` date NOT NULL COMMENT 'date of entered into our record',
  `time` time NOT NULL COMMENT 'time record  in system',
  `approver_date` date DEFAULT NULL COMMENT 'approvered date of changes',
  `approver_time` time DEFAULT NULL COMMENT 'approver time ',
  `issuer_date` date DEFAULT NULL,
  `issuer_time` time DEFAULT NULL,
  `no_days_approve` int(11) NOT NULL DEFAULT '0' COMMENT 'how many days required to complete to approved',
  `no_days_issued` int(11) NOT NULL DEFAULT '0' COMMENT 'no of day required to complete issued of products'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lt_master_zonal_material_requsition`
--

INSERT INTO `lt_master_zonal_material_requsition` (`zmr_slno`, `zmr_site_to_location_id`, `zmr_site_from_location_id`, `zmr_user_id`, `zmr_unqiue_mr_id`, `zmr_forward_id`, `forward_status`, `no_items_z`, `status`, `no_item_issued_z`, `no_item_transfered_z`, `total_no_item_issued`, `date`, `time`, `approver_date`, `approver_time`, `issuer_date`, `issuer_time`, `no_days_approve`, `no_days_issued`) VALUES
(1, 'hq1', 'zonal001', 'zonal1@ilab.com', 'site_00_1', 'user_003', 1, 3, 2, 3, 0, 3, '2017-10-11', '17:02:15', '2017-10-12', '17:32:40', '2017-12-01', '12:19:18', 0, 0),
(2, 'hq1', 'zonal001', 'zonal1@ilab.com', 'site_00_2', 'user_004', 0, 4, 1, 0, 0, 0, '2017-10-11', '17:17:51', NULL, NULL, NULL, NULL, 0, 0),
(3, 'hq1', 'zonal001', 'zonal1@ilab.com', 'site_00_3', 'user_003', 0, 3, 1, 0, 0, 0, '2017-10-11', '17:19:39', NULL, NULL, NULL, NULL, 0, 0),
(4, 'hq1', 'zonal001', 'zonal1@ilab.com', 'site_00_4', 'user_003', 0, 3, 1, 0, 0, 0, '2017-10-11', '17:23:13', NULL, NULL, NULL, NULL, 0, 0),
(5, 'hq1', 'zonal001', 'zonal1@ilab.com', 'site_00_5', 'user_003', 1, 7, 1, 3, 0, 3, '2017-10-12', '15:56:51', '2017-10-12', '17:13:30', '2017-12-01', '12:35:00', 0, 0),
(6, 'hq1', 'zonal001', 'zonal1@ilab.com', 'site_00_6', 'user_003', 0, 4, 1, 0, 0, 0, '2017-10-26', '12:15:37', NULL, NULL, NULL, NULL, 0, 0),
(7, 'hq1', 'zonal001', 'zonal1@ilab.com', 'site_00_7', 'user_003', 0, 4, 0, 0, 0, 0, '2017-10-26', '12:19:32', NULL, NULL, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lt_master_zonal_material_requsition_details`
--

CREATE TABLE `lt_master_zonal_material_requsition_details` (
  `zmrd_slno` int(11) NOT NULL COMMENT 'auto serial no increment',
  `zmrd_slno_id` text NOT NULL COMMENT 'serial no lt_master_zonal_material_requsition ',
  `zmr_unqiue_mr_id_iteam` varchar(255) NOT NULL COMMENT 'zonal_mr_id lt_master_zonal_material_requsition s equal to zmr_unqiue_mr_id',
  `zmrd_site_location_id` text NOT NULL COMMENT 'location from where mr is raised',
  `zmrd_primary_code` varchar(255) NOT NULL COMMENT 'item primary code',
  `zmrd_second_code` varchar(255) NOT NULL COMMENT 'item secondary no',
  `zmrd_name_item` text NOT NULL COMMENT 'item name',
  `zmrd_category_name` text NOT NULL COMMENT 'item_category_name',
  `zmrd_category_id` int(11) NOT NULL COMMENT 'item category id',
  `zmrd_units_required` varchar(220) NOT NULL,
  `zmrd_machine_no` varchar(255) NOT NULL,
  `zmrd_avaliable_qnt` int(11) NOT NULL DEFAULT '0' COMMENT 'presnt quantity in location on time of ordering',
  `zmrd_request_qnt` int(11) NOT NULL DEFAULT '0' COMMENT 'request quantity',
  `zmrd_approved_qnt` int(11) DEFAULT NULL COMMENT 'where approver who approved the quantity ',
  `zmrd_issue_qnt` int(11) DEFAULT NULL COMMENT 'issuer issued quantity',
  `zmrd_date_entry` date NOT NULL COMMENT 'date of inserted',
  `zmrd_time_entry` time NOT NULL COMMENT 'time of inserted ',
  `zmrd_approver_date` date DEFAULT NULL COMMENT 'date of approved',
  `zmrd_approver_time` time DEFAULT NULL COMMENT 'time of approved',
  `zmrd_issue_date` date DEFAULT NULL COMMENT 'date of issued',
  `zmrd_issue_time` time DEFAULT NULL COMMENT 'time of issued',
  `zmrd_issue_status` int(11) NOT NULL DEFAULT '0' COMMENT '0->not issued status 1->issued status',
  `transfer_status` int(11) NOT NULL DEFAULT '0' COMMENT 'here it is check whather it transfewr 0->not transfer 1->transfer ',
  `zmrd_approve_status` int(11) NOT NULL DEFAULT '0' COMMENT '0->not approver status  1->approved status',
  `no_days_approve` int(11) NOT NULL DEFAULT '0' COMMENT 'no of day approced',
  `no_days_issued` varchar(11) NOT NULL DEFAULT '0' COMMENT 'not of date issued ',
  `remark_id` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lt_master_zonal_material_requsition_details`
--

INSERT INTO `lt_master_zonal_material_requsition_details` (`zmrd_slno`, `zmrd_slno_id`, `zmr_unqiue_mr_id_iteam`, `zmrd_site_location_id`, `zmrd_primary_code`, `zmrd_second_code`, `zmrd_name_item`, `zmrd_category_name`, `zmrd_category_id`, `zmrd_units_required`, `zmrd_machine_no`, `zmrd_avaliable_qnt`, `zmrd_request_qnt`, `zmrd_approved_qnt`, `zmrd_issue_qnt`, `zmrd_date_entry`, `zmrd_time_entry`, `zmrd_approver_date`, `zmrd_approver_time`, `zmrd_issue_date`, `zmrd_issue_time`, `zmrd_issue_status`, `transfer_status`, `zmrd_approve_status`, `no_days_approve`, `no_days_issued`, `remark_id`) VALUES
(1, '1', 'site_00_1', 'zonal001', '12356', '1234567', 'brezer', 'Consumable', 2, 'kg', 'mud657', 0, 10, 30, 8, '2017-10-11', '17:02:15', '2017-10-12', '17:32:40', '2017-12-01', '12:19:18', 1, 0, 1, 0, '0', ''),
(2, '1', 'site_00_1', 'zonal001', '3456', '7890', 'fan', 'Consumable', 2, 'kg', 'mud101', 0, 20, 15, 8, '2017-10-11', '17:02:15', '2017-10-12', '17:32:40', '2017-12-01', '12:19:18', 1, 0, 1, 0, '0', ''),
(3, '1', 'site_00_1', 'zonal001', '34567', '56789', 'Tablet', 'Insurance', 3, 'kg', 'mud698', 0, 30, 30, 8, '2017-10-11', '17:02:15', '2017-10-12', '17:32:40', '2017-12-01', '12:19:18', 1, 0, 1, 0, '0', ''),
(4, '2', 'site_00_2', 'zonal001', '12356', '1234567', 'brezer', 'Consumable', 2, 'kg', 'mud698', 0, 23, NULL, NULL, '2017-10-11', '17:17:51', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '0', 'good'),
(5, '2', 'site_00_2', 'zonal001', '9808', '66867', 'washing machine', 'Consumable', 2, 'kg', 'mud101', 0, 22, NULL, NULL, '2017-10-11', '17:17:51', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '0', 'good'),
(6, '2', 'site_00_2', 'zonal001', '898978', '11111', 'Air Circuit Breakers', 'Consumable', 2, 'centimeter', 'mud698', 0, 1, NULL, NULL, '2017-10-11', '17:17:51', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '0', 'better'),
(7, '2', 'site_00_2', 'zonal001', '34567', '56789', 'Tablet', 'Insurance', 3, 'kg', 'mud101', 0, 13, NULL, NULL, '2017-10-11', '17:17:51', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '0', 'best'),
(8, '3', 'site_00_3', 'zonal001', '12356', '1234567', 'brezer', 'Consumable', 2, 'kg', 'mud101', 0, 11, NULL, NULL, '2017-10-11', '17:19:39', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '0', 'good'),
(9, '3', 'site_00_3', 'zonal001', '898978', '11111', 'Air Circuit Breakers', 'Consumable', 2, 'centimeter', 'mud698', 0, 11, NULL, NULL, '2017-10-11', '17:19:39', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '0', 'good'),
(10, '3', 'site_00_3', 'zonal001', '34567', '56789', 'Tablet', 'Insurance', 3, 'kg', 'mud101', 0, 11, NULL, NULL, '2017-10-11', '17:19:39', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '0', 'good'),
(11, '4', 'site_00_4', 'zonal001', '12356', '1234567', 'brezer', 'Consumable', 2, 'kg', 'mud101', 0, 11, NULL, NULL, '2017-10-11', '17:23:13', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '0', 'better'),
(12, '4', 'site_00_4', 'zonal001', '9808', '66867', 'washing machine', 'Consumable', 2, 'kg', 'mud698', 0, 11, NULL, NULL, '2017-10-11', '17:23:13', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '0', 'better'),
(13, '4', 'site_00_4', 'zonal001', '34567', '56789', 'Tablet', 'Insurance', 3, 'kg', 'mud698', 0, 12, NULL, NULL, '2017-10-11', '17:23:13', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '0', 'best'),
(14, '5', 'site_00_5', 'zonal001', '12356', '1234567', 'brezer', 'Consumable', 2, 'kg', 'mud101', 0, 6, 5, 3, '2017-10-12', '15:56:51', '2017-10-12', '17:13:30', '2017-12-01', '12:27:15', 1, 0, 1, 0, '0', ''),
(15, '5', 'site_00_5', 'zonal001', '3456', '7890', 'fan', 'Consumable', 2, 'kg', 'mud101', 0, 3, 2, 1, '2017-10-12', '15:56:51', '2017-10-12', '17:13:30', '2017-12-01', '12:27:15', 1, 0, 1, 0, '0', ''),
(16, '5', 'site_00_5', 'zonal001', '9808', '66867', 'washing machine', 'Consumable', 2, 'kg', 'mud101', 0, 2, 2, NULL, '2017-10-12', '15:56:51', '2017-10-12', '17:13:30', NULL, NULL, 0, 0, 1, 0, '0', ''),
(17, '5', 'site_00_5', 'zonal001', '898978', '11111', 'Air Circuit Breakers', 'Consumable', 2, 'centimeter', 'mud101', 0, 3, 3, NULL, '2017-10-12', '15:56:51', '2017-10-12', '17:13:30', NULL, NULL, 0, 0, 1, 0, '0', ''),
(18, '5', 'site_00_5', 'zonal001', '2323', '2323', 'Ear phone', 'Lubricant', 1, 'liter', 'mud101', 0, 3, 3, NULL, '2017-10-12', '15:56:51', '2017-10-12', '17:13:30', NULL, NULL, 0, 0, 1, 0, '0', ''),
(19, '5', 'site_00_5', 'zonal001', '34567', '56789', 'Tablet', 'Insurance', 3, 'kg', 'mud101', 0, 3, 2, 1, '2017-10-12', '15:56:51', '2017-10-12', '17:13:30', '2017-12-01', '12:35:00', 1, 0, 1, 0, '0', ''),
(20, '5', 'site_00_5', 'zonal001', '78787', '787878', 'bear', 'Insurance', 3, 'liter', 'mud101', 0, 3, 2, NULL, '2017-10-12', '15:56:51', '2017-10-12', '17:13:30', NULL, NULL, 0, 0, 1, 0, '0', ''),
(21, '6', 'site_00_6', 'zonal001', '12356', '1234567', 'brezer', 'Consumable', 2, 'kg', 'mud657', 0, 3, NULL, NULL, '2017-10-26', '12:15:37', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '0', 'jj'),
(22, '6', 'site_00_6', 'zonal001', '9808', '66867', 'washing machine', 'Consumable', 2, 'kg', 'mud698', 0, 6, NULL, NULL, '2017-10-26', '12:15:37', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '0', 'yhy'),
(23, '6', 'site_00_6', 'zonal001', '2323', '2323', 'Ear phone', 'Lubricant', 1, 'liter', 'mud101', 0, 6, NULL, NULL, '2017-10-26', '12:15:37', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '0', 'yy'),
(24, '6', 'site_00_6', 'zonal001', '78787', '787878', 'bear', 'Insurance', 3, 'liter', 'mud106', 0, 5, NULL, NULL, '2017-10-26', '12:15:37', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '0', 'tt'),
(25, '7', 'site_00_7', 'zonal001', '12356', '1234567', 'brezer', 'Consumable', 2, 'kg', 'mud657', 0, 0, NULL, NULL, '2017-10-26', '12:19:32', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '0', NULL),
(26, '7', 'site_00_7', 'zonal001', '898978', '11111', 'Air Circuit Breakers', 'Consumable', 2, 'centimeter', 'mud101', 0, 0, NULL, NULL, '2017-10-26', '12:19:32', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '0', NULL),
(27, '7', 'site_00_7', 'zonal001', '34567', '56789', 'Tablet', 'Insurance', 3, 'kg', 'mud106', 0, 0, NULL, NULL, '2017-10-26', '12:19:32', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '0', NULL),
(28, '7', 'site_00_7', 'zonal001', '78787', '787878', 'bear', 'Insurance', 3, 'liter', 'mud106', 0, 0, NULL, NULL, '2017-10-26', '12:19:32', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lt_master_zonal_mr_request`
--

CREATE TABLE `lt_master_zonal_mr_request` (
  `mr_z_slno` int(11) NOT NULL,
  `from_location_mr_z` varchar(255) NOT NULL COMMENT 'where the indent is been raised',
  `to_location_mr_z` varchar(255) NOT NULL COMMENT 'indent is to be forward',
  `mr_id_request_z` varchar(255) DEFAULT NULL,
  `no_item_request` int(11) NOT NULL,
  `approver_id` varchar(255) NOT NULL,
  `mr_z_status` int(11) NOT NULL DEFAULT '0' COMMENT '0->for not completed 1->for completed process for request of item 2->complete of issued of stock',
  `mr_z_approver_status` int(11) NOT NULL DEFAULT '0' COMMENT '0 ->not aqpproved by the user is in pending 1->approved by the approver,',
  `approver_email` varchar(255) DEFAULT NULL,
  `date_approved` date NOT NULL,
  `time_approved` time NOT NULL,
  `date` date NOT NULL COMMENT 'date of acreated entry of requesrt ',
  `time` time NOT NULL,
  `no_days_approve` int(11) NOT NULL DEFAULT '0' COMMENT 'here no of days count for apporover',
  `no_days_issued` int(11) NOT NULL DEFAULT '0' COMMENT 'no of days for complete issued of item'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lt_master_zonal_place`
--

CREATE TABLE `lt_master_zonal_place` (
  `slno` int(11) NOT NULL,
  `zonal_name` varchar(255) NOT NULL,
  `zonal_code` varchar(255) DEFAULT NULL,
  `hq_code` varchar(255) NOT NULL,
  `district_code` varchar(255) NOT NULL,
  `state_code` varchar(255) NOT NULL,
  `country_code` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='here all zonal is soted as per head quarter';

--
-- Dumping data for table `lt_master_zonal_place`
--

INSERT INTO `lt_master_zonal_place` (`slno`, `zonal_name`, `zonal_code`, `hq_code`, `district_code`, `state_code`, `country_code`, `status`, `date`, `time`) VALUES
(1, 'zonal144', 'zonal001', 'hq1', 'd001', 's001', 'c001', 1, '2017-08-10', '16:57:00'),
(2, 'zonal12', 'zonal002', 'hq1', 'd001', 's001', 'c001', 1, '2017-08-10', '16:57:29'),
(3, 'Zonal298', 'zonal003', 'hq2', 'd001', 's001', 'c001', 1, '2017-08-10', '19:08:01');

-- --------------------------------------------------------

--
-- Table structure for table `lt_master_zonal_stock_info`
--

CREATE TABLE `lt_master_zonal_stock_info` (
  `zonal_slno` int(11) NOT NULL,
  `zonal_primary_code` varchar(255) NOT NULL COMMENT 'item primary',
  `zonal_secondary_code` varchar(255) NOT NULL COMMENT 'item secondary ',
  `zonal_component_name` varchar(255) NOT NULL COMMENT 'item component name',
  `zonal_component_id` varchar(255) NOT NULL COMMENT 'item component slno',
  `zonal_category_name` varchar(255) NOT NULL COMMENT 'category name',
  `zonal_category_id` varchar(255) NOT NULL COMMENT 'category id',
  `zonal_unit` varchar(255) NOT NULL COMMENT 'item unit',
  `zonal_qnty` int(11) NOT NULL DEFAULT '0' COMMENT 'present stock',
  `damage_loss` int(11) NOT NULL DEFAULT '0',
  `damage_loss_status` int(11) NOT NULL DEFAULT '0' COMMENT '0-> no damage loss 1->damage loss',
  `zonal_date` date NOT NULL COMMENT 'date of update / or entry',
  `zonal_time` time NOT NULL COMMENT 'time of update or entry',
  `zonal_location_id` varchar(255) DEFAULT NULL COMMENT 'zonal location id'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='here stock of headquater is been stored';

--
-- Dumping data for table `lt_master_zonal_stock_info`
--

INSERT INTO `lt_master_zonal_stock_info` (`zonal_slno`, `zonal_primary_code`, `zonal_secondary_code`, `zonal_component_name`, `zonal_component_id`, `zonal_category_name`, `zonal_category_id`, `zonal_unit`, `zonal_qnty`, `damage_loss`, `damage_loss_status`, `zonal_date`, `zonal_time`, `zonal_location_id`) VALUES
(1, '12356\r\n', '1234567\r\n', 'brezer\r\n', '1', 'consumables', '2', 'kg\r\n', 0, 0, 0, '2017-12-01', '00:00:00', 'zonal001'),
(2, '23456\r\n', '3456\r\n', 'WINE\r\n', '2', 'consumables', '2', 'kg', 0, 0, 0, '2017-12-01', '19:24:17', 'zonal001'),
(3, '3456', '7890', 'fan\r\n', '3', 'consumables', '2', 'kg\r\n', 0, 0, 0, '2017-12-01', '19:24:17', 'zonal001'),
(4, '98080\r\n', '67899\r\n', 'grinder', '4', 'insurance', '3', 'kg', 0, 0, 0, '2017-12-01', '19:24:17', 'zonal001'),
(5, '9808', '11111', 'washing machine', '5', 'consumables', '2', 'kg', 0, 0, 0, '2017-12-01', '19:24:17', 'zonal001'),
(6, '898978', '323232', 'Air Circuit Breakers', '6', 'consumables', '2', 'centimeter', 0, 0, 0, '2017-12-01', '19:24:17', 'zonal001'),
(7, '22222', '989898', 'Entice', '7', 'consumables', '2', 'liter', 0, 0, 0, '2017-12-01', '19:24:17', 'zonal002'),
(8, '898989', '121212', 'TV', '8', 'consumables', '2', 'centimeter', 0, 0, 0, '2017-12-01', '19:24:17', 'zonal001'),
(9, '111111', '121212', 'phone', '9', 'consumables', '2', 'centimeter', 0, 0, 0, '2017-12-01', '19:24:17', 'zonal001'),
(10, '323232', '313131', 'watch', '10', 'lubricants', '1', 'centimeter', 0, 0, 0, '2017-12-01', '19:24:17', 'zonal002'),
(11, '12222', '22222', 'laptop', '11', 'insurance', '3', 'centimeter', 0, 0, 0, '2017-12-01', '19:24:17', 'zonal001'),
(12, '3333', '2222', 'PHONE', '12', 'lubricants', '1', 'centimeter', 0, 0, 0, '2017-12-01', '19:24:17', 'zonal002'),
(13, '2323', '2323', 'Ear phone', '13', 'lubricants', '1', 'liter', 0, 0, 0, '2017-12-01', '19:24:17', 'zonal001'),
(14, '34567', '56789', 'Tablet', '14', 'insurance', '3', 'kg', 0, 0, 0, '2017-12-01', '19:24:17', 'zonal001'),
(15, '78787', '787878', 'bear', '15', 'insurance', '3', 'liter', 0, 0, 0, '2017-12-01', '19:24:17', 'zonal001'),
(16, '4545454', '45454544', 'desktop', '16', 'consumables', '2', 'centimeter', 0, 0, 0, '2017-12-01', '19:24:17', 'zonal002');

-- --------------------------------------------------------

--
-- Table structure for table `lt_master_zonal_stock_transfer_info`
--

CREATE TABLE `lt_master_zonal_stock_transfer_info` (
  `zqt_slno` int(11) NOT NULL COMMENT 'auto increment',
  `zqt_primary_code` varchar(255) NOT NULL COMMENT 'item primary',
  `zqt_secondary_code` varchar(255) NOT NULL COMMENT 'item secondary ',
  `zqt_component_name` varchar(255) NOT NULL COMMENT 'item component name',
  `zqt_component_id` varchar(255) NOT NULL COMMENT 'item component slno',
  `zqt_category_name` varchar(255) NOT NULL COMMENT 'item category name',
  `zqt_category_id` varchar(255) NOT NULL COMMENT 'item category id',
  `zqt_unit` varchar(255) NOT NULL COMMENT 'item unit',
  `zqt_qnty` int(11) NOT NULL DEFAULT '0' COMMENT 'Current Stock',
  `zqt_date` date NOT NULL COMMENT 'date of update / or entry',
  `zqt_time` time NOT NULL COMMENT 'time of update or entry',
  `zqt_location_id` varchar(255) DEFAULT NULL COMMENT 'headquarter location id',
  `zqt_transfer_location` varchar(255) DEFAULT NULL COMMENT 'zonal loaction or site loaction id',
  `zqt_transfer_type` int(11) NOT NULL DEFAULT '0' COMMENT '0->no transfer is done 1-> insert to stock 2->issued stock to site',
  `zqt_remark` text,
  `zqt_opening_balance` int(11) NOT NULL DEFAULT '0',
  `zqt_closing_balance` int(11) NOT NULL DEFAULT '0',
  `damage_loss` int(11) NOT NULL DEFAULT '0',
  `damage_loss_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='here stock of headquater is been stored';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lt_master_admin_login`
--
ALTER TABLE `lt_master_admin_login`
  ADD PRIMARY KEY (`slno`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indexes for table `lt_master_country`
--
ALTER TABLE `lt_master_country`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `lt_master_district`
--
ALTER TABLE `lt_master_district`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `lt_master_field_maintenance_job`
--
ALTER TABLE `lt_master_field_maintenance_job`
  ADD PRIMARY KEY (`fmg_slno`);

--
-- Indexes for table `lt_master_field_maintenance_job_detail`
--
ALTER TABLE `lt_master_field_maintenance_job_detail`
  ADD PRIMARY KEY (`fmgd_slno`);

--
-- Indexes for table `lt_master_field_material_requsition`
--
ALTER TABLE `lt_master_field_material_requsition`
  ADD PRIMARY KEY (`fmr_slno`);

--
-- Indexes for table `lt_master_field_material_requsition_details`
--
ALTER TABLE `lt_master_field_material_requsition_details`
  ADD PRIMARY KEY (`fmrd_slno`);

--
-- Indexes for table `lt_master_field_place`
--
ALTER TABLE `lt_master_field_place`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `lt_master_field_stock_info`
--
ALTER TABLE `lt_master_field_stock_info`
  ADD PRIMARY KEY (`field_slno`);

--
-- Indexes for table `lt_master_hq_challan_generate`
--
ALTER TABLE `lt_master_hq_challan_generate`
  ADD PRIMARY KEY (`hqcg_slno`);

--
-- Indexes for table `lt_master_hq_internal_damage_info`
--
ALTER TABLE `lt_master_hq_internal_damage_info`
  ADD PRIMARY KEY (`hqindi_sno`);

--
-- Indexes for table `lt_master_hq_internal_issue_info`
--
ALTER TABLE `lt_master_hq_internal_issue_info`
  ADD PRIMARY KEY (`hqini_sno`);

--
-- Indexes for table `lt_master_hq_issue_zonal_info`
--
ALTER TABLE `lt_master_hq_issue_zonal_info`
  ADD PRIMARY KEY (`hqzis_slno`);

--
-- Indexes for table `lt_master_hq_issue_zonal_info_temp`
--
ALTER TABLE `lt_master_hq_issue_zonal_info_temp`
  ADD PRIMARY KEY (`hqzis_slno`);

--
-- Indexes for table `lt_master_HQ_place`
--
ALTER TABLE `lt_master_HQ_place`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `lt_master_hq_stock_info`
--
ALTER TABLE `lt_master_hq_stock_info`
  ADD PRIMARY KEY (`hq_slno`);

--
-- Indexes for table `lt_master_hq_stock_transfer_info`
--
ALTER TABLE `lt_master_hq_stock_transfer_info`
  ADD PRIMARY KEY (`hqt_slno`);

--
-- Indexes for table `lt_master_hq_transtion_loss`
--
ALTER TABLE `lt_master_hq_transtion_loss`
  ADD PRIMARY KEY (`hqtrl_sno`);

--
-- Indexes for table `lt_master_hq_zonal_transfer_received_damage_info`
--
ALTER TABLE `lt_master_hq_zonal_transfer_received_damage_info`
  ADD PRIMARY KEY (`hqztdi_sno`);

--
-- Indexes for table `lt_master_item_category`
--
ALTER TABLE `lt_master_item_category`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `lt_master_item_detail`
--
ALTER TABLE `lt_master_item_detail`
  ADD PRIMARY KEY (`slno`),
  ADD UNIQUE KEY `item_primary_code` (`item_primary_code`),
  ADD UNIQUE KEY `item_second_code` (`item_second_code`),
  ADD KEY `item_category_id` (`item_category_id`);

--
-- Indexes for table `lt_master_machine_allocation`
--
ALTER TABLE `lt_master_machine_allocation`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `lt_master_machine_category`
--
ALTER TABLE `lt_master_machine_category`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `lt_master_machine_detail`
--
ALTER TABLE `lt_master_machine_detail`
  ADD PRIMARY KEY (`m_slno`),
  ADD UNIQUE KEY `machine_unique_id` (`machine_unique_id`);

--
-- Indexes for table `lt_master_machine_detail_old`
--
ALTER TABLE `lt_master_machine_detail_old`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `lt_master_machine_model_no`
--
ALTER TABLE `lt_master_machine_model_no`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `lt_master_machine__transfer_information`
--
ALTER TABLE `lt_master_machine__transfer_information`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `lt_master_model_item_detail`
--
ALTER TABLE `lt_master_model_item_detail`
  ADD PRIMARY KEY (`i_slno`);

--
-- Indexes for table `lt_master_state`
--
ALTER TABLE `lt_master_state`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `lt_master_unit_system`
--
ALTER TABLE `lt_master_unit_system`
  ADD PRIMARY KEY (`u_slno`);

--
-- Indexes for table `lt_master_user_system`
--
ALTER TABLE `lt_master_user_system`
  ADD PRIMARY KEY (`u_slno`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indexes for table `lt_master_zonal_challan_generate`
--
ALTER TABLE `lt_master_zonal_challan_generate`
  ADD PRIMARY KEY (`zqcg_slno`);

--
-- Indexes for table `lt_master_zonal_hq_receive_info`
--
ALTER TABLE `lt_master_zonal_hq_receive_info`
  ADD PRIMARY KEY (`zonhqri_slno`);

--
-- Indexes for table `lt_master_zonal_issue_field_info`
--
ALTER TABLE `lt_master_zonal_issue_field_info`
  ADD PRIMARY KEY (`zqzis_slno`);

--
-- Indexes for table `lt_master_zonal_issue_field_info_temp`
--
ALTER TABLE `lt_master_zonal_issue_field_info_temp`
  ADD PRIMARY KEY (`zqzis_slno`);

--
-- Indexes for table `lt_master_zonal_material_requsition`
--
ALTER TABLE `lt_master_zonal_material_requsition`
  ADD PRIMARY KEY (`zmr_slno`);

--
-- Indexes for table `lt_master_zonal_material_requsition_details`
--
ALTER TABLE `lt_master_zonal_material_requsition_details`
  ADD PRIMARY KEY (`zmrd_slno`);

--
-- Indexes for table `lt_master_zonal_mr_request`
--
ALTER TABLE `lt_master_zonal_mr_request`
  ADD PRIMARY KEY (`mr_z_slno`),
  ADD UNIQUE KEY `mr_id_request_z` (`mr_id_request_z`);

--
-- Indexes for table `lt_master_zonal_place`
--
ALTER TABLE `lt_master_zonal_place`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `lt_master_zonal_stock_info`
--
ALTER TABLE `lt_master_zonal_stock_info`
  ADD PRIMARY KEY (`zonal_slno`);

--
-- Indexes for table `lt_master_zonal_stock_transfer_info`
--
ALTER TABLE `lt_master_zonal_stock_transfer_info`
  ADD PRIMARY KEY (`zqt_slno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lt_master_admin_login`
--
ALTER TABLE `lt_master_admin_login`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto serial no', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lt_master_country`
--
ALTER TABLE `lt_master_country`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lt_master_district`
--
ALTER TABLE `lt_master_district`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lt_master_field_maintenance_job`
--
ALTER TABLE `lt_master_field_maintenance_job`
  MODIFY `fmg_slno` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lt_master_field_maintenance_job_detail`
--
ALTER TABLE `lt_master_field_maintenance_job_detail`
  MODIFY `fmgd_slno` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lt_master_field_material_requsition`
--
ALTER TABLE `lt_master_field_material_requsition`
  MODIFY `fmr_slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `lt_master_field_material_requsition_details`
--
ALTER TABLE `lt_master_field_material_requsition_details`
  MODIFY `fmrd_slno` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto serial no increment', AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `lt_master_field_place`
--
ALTER TABLE `lt_master_field_place`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `lt_master_field_stock_info`
--
ALTER TABLE `lt_master_field_stock_info`
  MODIFY `field_slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `lt_master_hq_challan_generate`
--
ALTER TABLE `lt_master_hq_challan_generate`
  MODIFY `hqcg_slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `lt_master_hq_internal_damage_info`
--
ALTER TABLE `lt_master_hq_internal_damage_info`
  MODIFY `hqindi_sno` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lt_master_hq_internal_issue_info`
--
ALTER TABLE `lt_master_hq_internal_issue_info`
  MODIFY `hqini_sno` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lt_master_hq_issue_zonal_info`
--
ALTER TABLE `lt_master_hq_issue_zonal_info`
  MODIFY `hqzis_slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `lt_master_hq_issue_zonal_info_temp`
--
ALTER TABLE `lt_master_hq_issue_zonal_info_temp`
  MODIFY `hqzis_slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `lt_master_HQ_place`
--
ALTER TABLE `lt_master_HQ_place`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lt_master_hq_stock_info`
--
ALTER TABLE `lt_master_hq_stock_info`
  MODIFY `hq_slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `lt_master_hq_stock_transfer_info`
--
ALTER TABLE `lt_master_hq_stock_transfer_info`
  MODIFY `hqt_slno` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto increment', AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `lt_master_hq_transtion_loss`
--
ALTER TABLE `lt_master_hq_transtion_loss`
  MODIFY `hqtrl_sno` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lt_master_hq_zonal_transfer_received_damage_info`
--
ALTER TABLE `lt_master_hq_zonal_transfer_received_damage_info`
  MODIFY `hqztdi_sno` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lt_master_item_category`
--
ALTER TABLE `lt_master_item_category`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `lt_master_item_detail`
--
ALTER TABLE `lt_master_item_detail`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `lt_master_machine_allocation`
--
ALTER TABLE `lt_master_machine_allocation`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lt_master_machine_category`
--
ALTER TABLE `lt_master_machine_category`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `lt_master_machine_detail`
--
ALTER TABLE `lt_master_machine_detail`
  MODIFY `m_slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `lt_master_machine_detail_old`
--
ALTER TABLE `lt_master_machine_detail_old`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lt_master_machine_model_no`
--
ALTER TABLE `lt_master_machine_model_no`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `lt_master_machine__transfer_information`
--
ALTER TABLE `lt_master_machine__transfer_information`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `lt_master_model_item_detail`
--
ALTER TABLE `lt_master_model_item_detail`
  MODIFY `i_slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `lt_master_state`
--
ALTER TABLE `lt_master_state`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lt_master_unit_system`
--
ALTER TABLE `lt_master_unit_system`
  MODIFY `u_slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `lt_master_user_system`
--
ALTER TABLE `lt_master_user_system`
  MODIFY `u_slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `lt_master_zonal_challan_generate`
--
ALTER TABLE `lt_master_zonal_challan_generate`
  MODIFY `zqcg_slno` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lt_master_zonal_hq_receive_info`
--
ALTER TABLE `lt_master_zonal_hq_receive_info`
  MODIFY `zonhqri_slno` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lt_master_zonal_issue_field_info`
--
ALTER TABLE `lt_master_zonal_issue_field_info`
  MODIFY `zqzis_slno` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lt_master_zonal_issue_field_info_temp`
--
ALTER TABLE `lt_master_zonal_issue_field_info_temp`
  MODIFY `zqzis_slno` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lt_master_zonal_material_requsition`
--
ALTER TABLE `lt_master_zonal_material_requsition`
  MODIFY `zmr_slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `lt_master_zonal_material_requsition_details`
--
ALTER TABLE `lt_master_zonal_material_requsition_details`
  MODIFY `zmrd_slno` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto serial no increment', AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `lt_master_zonal_mr_request`
--
ALTER TABLE `lt_master_zonal_mr_request`
  MODIFY `mr_z_slno` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lt_master_zonal_place`
--
ALTER TABLE `lt_master_zonal_place`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `lt_master_zonal_stock_info`
--
ALTER TABLE `lt_master_zonal_stock_info`
  MODIFY `zonal_slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `lt_master_zonal_stock_transfer_info`
--
ALTER TABLE `lt_master_zonal_stock_transfer_info`
  MODIFY `zqt_slno` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto increment';
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
