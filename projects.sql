-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2018 at 03:23 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projects`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(9) NOT NULL,
  `activity_prefix` varchar(250) DEFAULT NULL,
  `activity_number` int(6) DEFAULT NULL,
  `reference_no` varchar(250) DEFAULT NULL,
  `linked_project` varchar(50) DEFAULT NULL,
  `activity_name` varchar(50) DEFAULT NULL,
  `activity_start_date` varchar(50) DEFAULT NULL,
  `activity_end_date` varchar(50) DEFAULT NULL,
  `activity_stakeholder` varchar(50) DEFAULT NULL,
  `linked_documents` varchar(100) DEFAULT NULL,
  `initiatives` varchar(250) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `changed` varchar(20) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `date_recorded` varchar(50) DEFAULT NULL,
  `time_recorded` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `departmental_objectives`
--

CREATE TABLE `departmental_objectives` (
  `id` int(6) NOT NULL,
  `reference_no` int(5) DEFAULT NULL,
  `department_code` varchar(50) DEFAULT NULL,
  `department_name` varchar(50) DEFAULT NULL,
  `departmental_objective` varchar(500) DEFAULT NULL,
  `departmental_sub_objective` varchar(500) DEFAULT NULL,
  `changed` varchar(50) NOT NULL DEFAULT 'no',
  `created_by` varchar(100) DEFAULT NULL,
  `date_recorded` varchar(50) DEFAULT NULL,
  `time_recorded` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departmental_objectives`
--

INSERT INTO `departmental_objectives` (`id`, `reference_no`, `department_code`, `department_name`, `departmental_objective`, `departmental_sub_objective`, `changed`, `created_by`, `date_recorded`, `time_recorded`) VALUES
(12, 6, 'LACS', 'Legal Affairs and Corporation Secretary\r\n', 'To facilitate efficient conduct of Board Business including Board and Board Committee meetings by coordinating Board secretarial services', '', 'no', 'EVANS FIKI KAZUNGU', '10/18/2018', '03:36:05pm'),
(13, 7, 'MS', 'Market Supervision', 'Effective monitoring and supervision of capital market operations.', 'To protect investors. To ensure efficient market operations. To detect market abuses/manipulation by carrying out real time monitoring of trading in the market. To carry out onsite and offsite inspections. ', 'no', 'ISAAC MWANGI KIMANI', '10/19/2018', '10:24:36am'),
(17, 8, 'DU', 'Derivatives Unit', 'To establish a robust, facilitative and responsive policy, legal and regulatory framework for derivatives and spot commodities markets', '', 'no', 'PETER ODERA ONYANGO', '10/19/2018', '10:30:11am'),
(18, 7, 'IE', 'Investigations & Enforcement', '1. To effectively investigate securities law violation for appropriate enforcement recommendation and ensure resolution of investor complaints for remedial purposes\r\n', '', 'no', 'FRANCIS KIAGO NDIRANGU', '10/19/2018', '10:31:13am'),
(19, 9, 'IARM', 'Internal Audit & Risk Management', 'To provide independent and objective assurance to improve the Authority\'s operations in risk management, internal control and governance processes.', '', 'no', 'JOSEPH MOBISA ONGWAE', '10/19/2018', '10:40:52am'),
(20, 10, 'ICT', 'Information Communication Technology', 'To provide and maintain reliable ICT Infrastructure', '', 'no', 'MARO JILLO ABDALLA', '10/23/2018', '01:52:56pm'),
(21, 11, 'ICT', 'Information Communication Technology', 'To Secure ICT Systems and data from threats', '', 'no', 'MARO JILLO ABDALLA', '10/23/2018', '01:46:05pm'),
(22, 12, 'ICT', 'Information Communication Technology', 'To identify and implement  effective software solutions to drive efficiency of internal and market facing operations of the Authority', '', 'no', 'MARO JILLO ABDALLA', '10/23/2018', '01:46:22pm'),
(23, 13, 'ICT', 'Information Communication Technology', 'To manage ICT operations, processes and resources prudently', '', 'no', 'MARO JILLO ABDALLA', '10/23/2018', '01:46:40pm'),
(25, 14, 'SPU', 'Strategic Projects Department', ' To support the execution of the strategic projects (Internal/External) through an effective and efficient monitoring and evaluation methodology.\r\n', '', 'no', 'MARO JILLO ABDALLA', '10/23/2018', '03:59:54pm'),
(26, 15, 'SPU', 'Strategic Projects Department', 'To ensure effective prioritization and execution of projects to ease on responsibility balancing and resource allocation.\r\n', '', 'no', 'MARO JILLO ABDALLA', '10/23/2018', '04:00:34pm');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(6) NOT NULL,
  `department_code` varchar(50) DEFAULT NULL,
  `department_name` varchar(250) DEFAULT NULL,
  `department_title` varchar(250) DEFAULT NULL,
  `date_created` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_code`, `department_name`, `department_title`, `date_created`) VALUES
(1, 'CA', 'Corporate Approvals', 'Manager Corporate Approvals', ''),
(2, 'CC', 'Corporate Communication', '', ''),
(3, 'DU', 'Derivatives Unit', 'Manager Derivatives', ''),
(4, 'FIN', 'Finance', 'Manager Finance', ''),
(5, 'HCA', 'Human Capital & Administration', 'Manager Human Capital & Administration', ''),
(6, 'IARM', 'Internal Audit & Risk Management', 'Manager Internal Audit & Risk Management', ''),
(7, 'ICT', 'Information Communication Technology', 'Manager Information Communication Technology', ''),
(8, 'IE', 'Investigations & Enforcement', 'Manager Investigations & Enforcement', ''),
(9, 'IEPA', 'Investor Education & Public Awareness', 'Manager Investor Education & Public Awareness', ''),
(10, 'MDD', 'Market Development Department', '', ''),
(11, 'MS', 'Market Supervision', 'Manager Market Supervision', ''),
(12, 'PROC', 'Procurement', '', ''),
(13, 'SPRF', 'Strategy, Policy & Regulatory Framework', '', ''),
(14, 'SPU', 'Strategic Projects Department', 'Manager Strategic Projects', ''),
(15, 'CMFIU', 'Capital Markets Fraud Investigation Unit\r\n', 'Head Capital Markets Fraud Investigation Unit', ''),
(16, 'LACS', 'Legal Affairs and Corporation Secretary\r\n', 'Manager Legal Affairs and Corporation Secretary', '');

-- --------------------------------------------------------

--
-- Table structure for table `programmes`
--

CREATE TABLE `programmes` (
  `id` int(9) NOT NULL,
  `programme_prefix` varchar(50) DEFAULT NULL,
  `programme_number` int(6) DEFAULT NULL,
  `reference_no` varchar(250) DEFAULT NULL,
  `programme_name` varchar(50) DEFAULT NULL,
  `programme_description` varchar(250) DEFAULT NULL,
  `programme_start_date` varchar(50) DEFAULT NULL,
  `programme_end_date` varchar(50) DEFAULT NULL,
  `programme_status` varchar(100) DEFAULT NULL,
  `linked_documents` varchar(100) DEFAULT NULL,
  `changed` varchar(10) NOT NULL DEFAULT 'no',
  `created_by` varchar(50) DEFAULT NULL,
  `date_recorded` varchar(50) DEFAULT NULL,
  `time_recorded` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programmes`
--

INSERT INTO `programmes` (`id`, `programme_prefix`, `programme_number`, `reference_no`, `programme_name`, `programme_description`, `programme_start_date`, `programme_end_date`, `programme_status`, `linked_documents`, `changed`, `created_by`, `date_recorded`, `time_recorded`) VALUES
(107, 'PROG', 1, 'PROG/1', 'CMA Strategic Plan 2018-2023', 'This is CMA\'s Strategic Plan', '10/09/2018', '12/31/2023', 'Active', 'Capital Markets Strategic Plan 2018-2023 Full Version.pdf', 'no', 'MARO JILLO ABDALLA', '10/11/2018', '10:04:56am');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(9) NOT NULL,
  `project_prefix` varchar(50) DEFAULT NULL,
  `project_number` int(6) DEFAULT NULL,
  `reference_no` varchar(250) DEFAULT NULL,
  `project_name` varchar(250) DEFAULT NULL,
  `programme_reference_no` varchar(100) DEFAULT NULL,
  `project_start_date` varchar(50) DEFAULT NULL,
  `project_end_date` varchar(50) DEFAULT NULL,
  `project_status` varchar(50) DEFAULT NULL,
  `internal_budget_line` varchar(50) DEFAULT NULL,
  `external_budget_line` varchar(50) DEFAULT NULL,
  `funding_agency` varchar(50) DEFAULT NULL,
  `project_phase` varchar(50) DEFAULT NULL,
  `project_owner` varchar(50) DEFAULT NULL,
  `senior_user` varchar(50) DEFAULT NULL,
  `senior_contractor` varchar(50) DEFAULT NULL,
  `project_advisor` varchar(50) DEFAULT NULL,
  `changed` varchar(50) NOT NULL DEFAULT 'no',
  `created_by` varchar(50) DEFAULT NULL,
  `date_recorded` varchar(50) DEFAULT NULL,
  `time_recorded` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `risks`
--

CREATE TABLE `risks` (
  `id` int(9) NOT NULL,
  `risk_prefix` varchar(250) DEFAULT NULL,
  `risk_number` int(6) DEFAULT NULL,
  `reference_no` varchar(250) DEFAULT NULL,
  `linked_project` varchar(50) DEFAULT NULL,
  `objective` varchar(250) DEFAULT NULL,
  `risk_description` varchar(250) DEFAULT NULL,
  `key_risk_indicator` varchar(250) DEFAULT NULL,
  `risk_drivers` varchar(250) DEFAULT NULL,
  `current_kri_level` varchar(250) DEFAULT NULL,
  `impact` varchar(250) DEFAULT NULL,
  `impact_score` varchar(50) DEFAULT NULL,
  `likelihood_score` varchar(50) DEFAULT NULL,
  `overall_score` int(5) DEFAULT NULL,
  `treatment_action` varchar(250) DEFAULT NULL,
  `person_responsible` varchar(50) DEFAULT NULL,
  `changed` varchar(50) NOT NULL DEFAULT 'no',
  `created_by` varchar(50) DEFAULT NULL,
  `date_recorded` varchar(50) DEFAULT NULL,
  `time_recorded` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `risk_drivers`
--

CREATE TABLE `risk_drivers` (
  `id` int(6) NOT NULL,
  `risk_id` int(6) DEFAULT NULL,
  `risk_reference` varchar(250) DEFAULT NULL,
  `risk_drivers` varchar(500) DEFAULT NULL,
  `key_risk_indicator` varchar(500) DEFAULT NULL,
  `current_kri_level` varchar(500) DEFAULT NULL,
  `treatment_action` varchar(500) DEFAULT NULL,
  `changed` varchar(50) NOT NULL DEFAULT 'no',
  `status` varchar(50) NOT NULL DEFAULT 'on hold'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `risk_drivers`
--

INSERT INTO `risk_drivers` (`id`, `risk_id`, `risk_reference`, `risk_drivers`, `key_risk_indicator`, `current_kri_level`, `treatment_action`, `changed`, `status`) VALUES
(135, 1, 'ICT/R/1', 'Use of obsolete or End-of-Life/End-of-Support technology.', '1. Frequency of failed or faulty server/network devices and associated peripherals.', '', '1.Implement scheduled preventive maintenance program for IT Assets.', 'yes', 'on hold'),
(136, 1, 'ICT/R/1', 'Poorly maintained servers.', 'Percentage of server/application software nearing or beyond its end-of-life or end-of-support. ', '', 'Enforce an effective patch management process', 'yes', 'on hold'),
(137, 1, 'ICT/R/1', 'Use of obsolete or End-of-Life/End-of-Support technology.', '1. Frequency of failed or faulty server/network devices and associated peripherals.', '', '1.Implement scheduled preventive maintenance program for IT Assets.', 'yes', 'on hold'),
(138, 1, 'ICT/R/1', 'Poorly maintained servers.', 'Percentage of server/application software nearing or beyond its end-of-life or end-of-support. ', '', 'Enforce an effective patch management process', 'yes', 'on hold'),
(139, 1, 'ICT/R/1', 'Use of obsolete or End-of-Life/End-of-Support technology.', '1. Frequency of failed or faulty server/network devices and associated peripherals.', '', '1.Implement scheduled preventive maintenance program for IT Assets.', 'no', 'on hold'),
(140, 1, 'ICT/R/1', 'Poorly maintained servers.', 'Percentage of server/application software nearing or beyond its end-of-life or end-of-support. ', '', 'Enforce an effective patch management process', 'no', 'on hold'),
(141, 1, 'SPU/R/1', 'Staff with a negative attitude towards a project (They feel it will endanger their jobs).', 'Delay in execution of the Authority\'s strategy', '', 'Continued liaison between external partners and internal coordination teams to ensure less delay in strategy execution. ', 'yes', 'on hold'),
(142, 1, 'SPU/R/1', ' Staff not being adequately involved in project conceptualization and execution.', 'Disbursement of funds/ commitments outside the scheduled timelines ', '', 'Noting lessons learned from existing consultancies to learn how to do the next ones better.', 'yes', 'on hold'),
(143, 1, 'SPU/R/1', 'Staff with a negative attitude towards a project (They feel it will endanger their jobs).', 'Delay in execution of the Authority\'s strategy', '', 'Continued liaison between external partners and internal coordination teams to ensure less delay in strategy execution. ', 'no', 'on hold'),
(144, 1, 'SPU/R/1', ' Staff not being adequately involved in project conceptualization and execution.', 'Disbursement of funds/ commitments outside the scheduled timelines ', '', 'Noting lessons learned from existing consultancies to learn how to do the next ones better.', 'no', 'on hold');

-- --------------------------------------------------------

--
-- Table structure for table `risk_management`
--

CREATE TABLE `risk_management` (
  `id` int(9) NOT NULL,
  `reference_no` int(6) DEFAULT NULL,
  `department_code` varchar(50) DEFAULT NULL,
  `risk_opportunity` varchar(50) DEFAULT NULL,
  `risk_reference` varchar(250) DEFAULT NULL,
  `strategic_objective` varchar(250) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `departmental_objective` varchar(250) DEFAULT NULL,
  `departmental_sub_objective` varchar(250) DEFAULT NULL,
  `risk_description` varchar(250) DEFAULT NULL,
  `impact` varchar(250) DEFAULT NULL,
  `impact_score` varchar(50) DEFAULT NULL,
  `likelihood_score` varchar(50) DEFAULT NULL,
  `overall_score` int(5) DEFAULT NULL,
  `person_responsible` varchar(50) DEFAULT NULL,
  `changed` varchar(50) NOT NULL DEFAULT 'no',
  `status` varchar(50) NOT NULL DEFAULT 'pending approval',
  `risk_status` varchar(50) NOT NULL DEFAULT 'open',
  `comments` varchar(250) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `date_recorded` varchar(50) DEFAULT NULL,
  `time_recorded` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `risk_management`
--

INSERT INTO `risk_management` (`id`, `reference_no`, `department_code`, `risk_opportunity`, `risk_reference`, `strategic_objective`, `department`, `departmental_objective`, `departmental_sub_objective`, `risk_description`, `impact`, `impact_score`, `likelihood_score`, `overall_score`, `person_responsible`, `changed`, `status`, `risk_status`, `comments`, `created_by`, `date_recorded`, `time_recorded`) VALUES
(82, 1, 'ICT', 'risk', 'ICT/R/1', 'Facilitate the development,\r\n                    diversification and uptake of capital\r\n                    markets products and services', 'Information Communication Technology', 'To provide and maintain reliable ICT Infrastructure & working tools to enable execution of authorityâ€™s business activities. ', '', 'Server and Network Infrastructure Failures', '1. Unavailability of network and computing resources. \r\n2. Partial or full business disruption. \r\n3. User frustration and poor ICT service delivery', '5', '4', 20, 'Manager Information Communication Technology', 'yes', 'pending approval', 'open', NULL, 'MARO JILLO ABDALLA', '10/22/2018', '12:29:09pm'),
(83, 1, 'ICT', 'risk', 'ICT/R/1', 'Facilitate the development,\r\n                    diversification and uptake of capital\r\n                    markets products and services', 'Information Communication Technology', 'To provide and maintain reliable ICT Infrastructure & working tools to enable execution of authorityâ€™s business activities. ', '', 'Server and Network Infrastructure Failures', '1. Unavailability of network and computing resources. \r\n2. Partial or full business disruption. \r\n3. User frustration and poor ICT service delivery', '5', '4', 20, 'Manager', 'yes', 'approved', 'open', '', 'MARO JILLO ABDALLA', '10/22/2018', '12:29:41pm'),
(84, 1, 'ICT', 'risk', 'ICT/R/1', 'Facilitate the development,\r\n                    diversification and uptake of capital\r\n                    markets products and services', 'Information Communication Technology', 'To provide and maintain reliable ICT Infrastructure & working tools to enable execution of authorityâ€™s business activities. ', '', 'Server and Network Infrastructure Failures', '1. Unavailability of network and computing resources. \r\n2. Partial or full business disruption. \r\n3. User frustration and poor ICT service delivery', '5', '4', 20, 'Manager Information Communication Technology', 'no', 'approved', 'open', '', 'MARO JILLO ABDALLA', '10/22/2018', '12:36:34pm'),
(85, 1, 'SPU', 'risk', 'SPU/R/1', 'Ensure sound market infrastructure,\r\n                    institutions and operations', 'Strategic Projects Department', ' To support the execution of the strategic projects (Internal/External) through an effective and efficient monitoring and evaluation methodology.\r\n', '', 'Strategy execution delay arising from reliance on external funding partners\r\n', 'â€¢ Delay in the Authority meeting its objectives.\r\nâ€¢ Resources being stretched to accommodate timelines that have been delayed. \r\nâ€¢ Declining budget and project performance.\r\n\r\n', '4', '5', 20, 'MSPU', 'yes', 'pending approval', 'open', NULL, 'MARO JILLO ABDALLA', '10/23/2018', '04:03:30pm'),
(86, 1, 'SPU', 'risk', 'SPU/R/1', 'Ensure sound market infrastructure,\r\n                    institutions and operations', 'Strategic Projects Department', ' To support the execution of the strategic projects (Internal/External) through an effective and efficient monitoring and evaluation methodology.\r\n', '', 'Strategy execution delay arising from reliance on external funding partners\r\n', 'â€¢ Delay in the Authority meeting its objectives.\r\nâ€¢ Resources being stretched to accommodate timelines that have been delayed. \r\nâ€¢ Declining budget and project performance.\r\n\r\n', '4', '5', 20, 'MSPU', 'no', 'approved', 'open', '', 'MARO JILLO ABDALLA', '10/23/2018', '04:04:25pm');

-- --------------------------------------------------------

--
-- Table structure for table `sign_in_logs`
--

CREATE TABLE `sign_in_logs` (
  `id` int(6) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `time_signed_in` varchar(50) DEFAULT NULL,
  `time_signed_out` varchar(50) DEFAULT NULL,
  `date_recorded` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sign_in_logs`
--

INSERT INTO `sign_in_logs` (`id`, `email`, `name`, `ip_address`, `time_signed_in`, `time_signed_out`, `date_recorded`) VALUES
(1, 'mabdalla@cma.or.ke', 'MARO JILLO ABDALLA', '::1', '2018/10/17 08:08:14', '2018/10/17 09:50:21', '2018/10/17'),
(2, 'ekazungu@cma.or.ke', 'EVANS FIKI KAZUNGU', '::1', '2018/10/17 09:50:41', '2018/10/17 09:51:23', '2018/10/17'),
(3, 'mabdalla@cma.or.ke', 'MARO JILLO ABDALLA', '::1', '2018/10/17 09:51:38', '2018/10/17 10:31:29', '2018/10/17'),
(4, 'mabdalla@cma.or.ke', 'MARO JILLO ABDALLA', '::1', '2018/10/17 10:34:17', '2018/10/17 11:54:50', '2018/10/17'),
(5, 'mabdalla@cma.or.ke', 'MARO JILLO ABDALLA', '::1', '2018/10/17 10:34:17', '2018/10/17 11:54:50', '2018/10/17'),
(6, 'mabdalla@cma.or.ke', 'MARO JILLO ABDALLA', '10.0.70.106', '2018/10/17 11:45:14', NULL, '2018/10/17'),
(7, 'mabdalla@cma.or.ke', 'MARO JILLO ABDALLA', '::1', '2018/10/17 11:55:45', '2018/10/17 17:14:42', '2018/10/17'),
(8, 'Shamiah@cma.or.ke', 'WYCKLIFFE  SHAMIAH', '::1', '2018/10/17 17:14:49', '2018/10/17 17:18:18', '2018/10/17'),
(9, 'mabdalla@cma.or.ke', 'MARO JILLO ABDALLA', '::1', '2018/10/18 08:07:26', '2018/10/18 09:33:39', '2018/10/18'),
(10, 'mabdalla@cma.or.ke', 'MARO JILLO ABDALLA', '::1', '2018/10/18 09:33:52', '2018/10/18 10:22:26', '2018/10/18'),
(11, 'mabdalla@cma.or.ke', 'MARO JILLO ABDALLA', '::1', '2018/10/18 10:24:15', '2018/10/18 12:36:54', '2018/10/18'),
(12, 'mabdalla@cma.or.ke', 'MARO JILLO ABDALLA', '10.0.70.106', '2018/10/18 12:03:14', '2018/10/18 12:27:39', '2018/10/18'),
(13, 'mabdalla@cma.or.ke', 'MARO JILLO ABDALLA', '10.0.70.106', '2018/10/18 12:27:57', '2018/10/18 12:30:12', '2018/10/18'),
(14, 'mabdalla@cma.or.ke', 'MARO JILLO ABDALLA', '::1', '2018/10/18 14:15:02', '2018/10/18 14:41:57', '2018/10/18'),
(15, 'mabdalla@cma.or.ke', 'MARO JILLO ABDALLA', '::1', '2018/10/18 14:42:23', '2018/10/18 14:43:25', '2018/10/18'),
(16, 'mabdalla@cma.or.ke', 'MARO JILLO ABDALLA', '::1', '2018/10/18 15:02:44', '2018/10/18 15:08:06', '2018/10/18'),
(17, 'mabdalla@cma.or.ke', 'MARO JILLO ABDALLA', '10.0.75.149', '2018/10/18 15:04:29', '2018/10/18 15:05:25', '2018/10/18'),
(18, 'mabdalla@cma.or.ke', 'MARO JILLO ABDALLA', '::1', '2018/10/18 15:12:14', '2018/10/18 15:32:22', '2018/10/18'),
(19, 'ekazungu@cma.or.ke', 'EVANS FIKI KAZUNGU', '::1', '2018/10/18 15:34:24', '2018/10/18 15:42:00', '2018/10/18'),
(20, 'mabdalla@cma.or.ke', 'MARO JILLO ABDALLA', '::1', '2018/10/18 15:42:35', '2018/10/18 16:29:58', '2018/10/18'),
(21, 'mabdalla@cma.or.ke', 'MARO JILLO ABDALLA', '10.0.70.106', '2018/10/19 09:33:53', '2018/10/19 09:33:59', '2018/10/19'),
(22, 'mabdalla@cma.or.ke', 'MARO JILLO ABDALLA', '10.0.70.106', '2018/10/19 10:04:04', '2018/10/19 11:04:09', '2018/10/19'),
(23, 'mabdalla@cma.or.ke', 'MARO JILLO ABDALLA', '10.0.70.94', '2018/10/19 10:14:21', NULL, '2018/10/19'),
(24, 'IMwangi@cma.or.ke', 'ISAAC MWANGI KIMANI', '10.0.70.92', '2018/10/19 10:14:55', NULL, '2018/10/19'),
(25, 'AKimata@cma.or.ke', 'ANASTASIA NJAMBI KIMATA', '10.0.70.110', '2018/10/19 10:14:56', NULL, '2018/10/19'),
(26, 'JMwangi@cma.or.ke', 'JAMES WANENE MWANGI', '10.0.70.150', '2018/10/19 10:15:29', NULL, '2018/10/19'),
(27, 'FNdirangu@cma.or.ke', 'FRANCIS KIAGO NDIRANGU', '10.0.70.182', '2018/10/19 10:15:41', NULL, '2018/10/19'),
(28, 'LMumina@cma.or.ke', 'LAWRENCE MUENDO MUMINA', '10.0.70.109', '2018/10/19 10:16:40', NULL, '2018/10/19'),
(29, 'POnyango@cma.or.ke', 'PETER ODERA ONYANGO', '10.0.70.179', '2018/10/19 10:17:07', NULL, '2018/10/19'),
(30, 'TGithendu@cma.or.ke', 'ERIC TIMOTHY GITHENDU', '10.0.70.146', '2018/10/19 10:17:49', NULL, '2018/10/19'),
(31, 'JMobisa@cma.or.ke', 'JOSEPH MOBISA ONGWAE', '10.0.70.127', '2018/10/19 10:37:27', NULL, '2018/10/19'),
(32, 'ekazungu@cma.or.ke', 'EVANS FIKI KAZUNGU', '10.0.70.106', '2018/10/19 11:49:34', '2018/10/19 11:52:47', '2018/10/19'),
(33, 'mabdalla@cma.or.ke', 'MARO JILLO ABDALLA', '::1', '2018/10/19 13:26:40', '2018/10/19 13:32:40', '2018/10/19'),
(34, 'Pkariuki@cma.or.ke', 'peter chege kariuki', '::1', '2018/10/19 13:35:18', '2018/10/19 14:10:01', '2018/10/19'),
(35, 'mabdalla@cma.or.ke', 'MARO JILLO ABDALLA', '::1', '2018/10/19 14:56:54', NULL, '2018/10/19'),
(36, 'Pkariuki@cma.or.ke', 'peter chege kariuki', '::1', '2018/10/19 15:54:20', '2018/10/19 16:07:33', '2018/10/19'),
(37, 'Pkariuki@cma.or.ke', 'peter chege kariuki', '::1', '2018/10/19 16:07:51', NULL, '2018/10/19'),
(38, 'Pkariuki@cma.or.ke', 'peter chege kariuki', '::1', '2018/10/22 09:43:06', '2018/10/22 09:59:00', '2018/10/22'),
(39, 'Pkariuki@cma.or.ke', 'peter chege kariuki', '::1', '2018/10/22 09:59:44', '2018/10/22 11:14:08', '2018/10/22'),
(40, 'mabdalla@cma.or.ke', 'MARO JILLO ABDALLA', '::1', '2018/10/22 11:14:37', '2018/10/22 11:34:54', '2018/10/22'),
(41, 'mabdalla@cma.or.ke', 'MARO JILLO ABDALLA', '::1', '2018/10/22 11:35:06', '2018/10/22 12:20:22', '2018/10/22'),
(42, 'mabdalla@cma.or.ke', 'MARO JILLO ABDALLA', '::1', '2018/10/22 12:21:56', NULL, '2018/10/22'),
(43, 'mabdalla@cma.or.ke', 'MARO JILLO ABDALLA', '::1', '2018/10/22 14:47:54', '2018/10/22 16:28:21', '2018/10/22'),
(44, 'mabdalla@cma.or.ke', 'MARO JILLO ABDALLA', '::1', '2018/10/22 16:35:12', '2018/10/22 16:54:32', '2018/10/22'),
(45, 'mabdalla@cma.or.ke', 'MARO JILLO ABDALLA', '::1', '2018/10/23 09:23:52', '2018/10/23 10:15:21', '2018/10/23'),
(46, 'mabdalla@cma.or.ke', 'MARO JILLO ABDALLA', '::1', '2018/10/23 10:15:32', '2018/10/23 13:59:44', '2018/10/23'),
(47, 'ekazungu@cma.or.ke', 'EVANS FIKI KAZUNGU', '::1', '2018/10/23 14:00:03', '2018/10/23 14:28:42', '2018/10/23'),
(48, 'mabdalla@cma.or.ke', 'MARO JILLO ABDALLA', '::1', '2018/10/23 14:28:52', '2018/10/23 15:04:09', '2018/10/23'),
(49, 'ekazungu@cma.or.ke', 'EVANS FIKI KAZUNGU', '::1', '2018/10/23 15:04:25', '2018/10/23 15:08:53', '2018/10/23'),
(50, 'mabdalla@cma.or.ke', 'MARO JILLO ABDALLA', '::1', '2018/10/23 15:09:33', '2018/10/23 15:12:33', '2018/10/23'),
(51, 'mabdalla@cma.or.ke', 'MARO JILLO ABDALLA', '::1', '2018/10/23 15:12:44', '2018/10/23 15:20:37', '2018/10/23'),
(52, 'mabdalla@cma.or.ke', 'MARO JILLO ABDALLA', '::1', '2018/10/23 15:26:41', '2018/10/23 15:41:42', '2018/10/23'),
(53, 'ekazungu@cma.or.ke', 'EVANS FIKI KAZUNGU', '::1', '2018/10/23 15:42:15', '2018/10/23 15:51:39', '2018/10/23'),
(54, 'mabdalla@cma.or.ke', 'MARO JILLO ABDALLA', '::1', '2018/10/23 15:52:11', '2018/10/23 15:55:30', '2018/10/23'),
(55, 'mabdalla@cma.or.ke', 'MARO JILLO ABDALLA', '::1', '2018/10/23 15:56:14', '2018/10/23 15:56:31', '2018/10/23'),
(56, 'ekazungu@cma.or.ke', 'EVANS FIKI KAZUNGU', '::1', '2018/10/23 15:56:41', '2018/10/23 15:57:02', '2018/10/23'),
(57, 'mabdalla@cma.or.ke', 'MARO JILLO ABDALLA', '::1', '2018/10/23 15:57:12', NULL, '2018/10/23'),
(58, 'mabdalla@cma.or.ke', 'MARO JILLO ABDALLA', '::1', '2018/10/24 09:29:45', NULL, '2018/10/24'),
(59, 'mabdalla@cma.or.ke', 'MARO JILLO ABDALLA', '::1', '2018/10/24 15:20:53', NULL, '2018/10/24');

-- --------------------------------------------------------

--
-- Table structure for table `staff_users`
--

CREATE TABLE `staff_users` (
  `staff_users_id` int(11) NOT NULL,
  `EmpNo` varchar(100) DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Department` varchar(255) DEFAULT NULL,
  `DepartmentCode` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'active',
  `access_level` varchar(50) NOT NULL DEFAULT 'standard',
  `designation` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_users`
--

INSERT INTO `staff_users` (`staff_users_id`, `EmpNo`, `Name`, `Email`, `Department`, `DepartmentCode`, `status`, `access_level`, `designation`) VALUES
(1, 'CMA0013', 'EMMY JERONO ROTICH', 'ERotich@cma.or.ke', 'CE Office', '', 'active', 'standard', 'Office Assistant'),
(2, 'CMA0042', 'RICHARD OLIECH ODUONG', 'ROliech@cma.or.ke', 'Procurement', 'PROC', 'active', 'standard', 'Stores Assistant'),
(3, 'CMA0048', 'ROSELINE MWALI MKONGO', 'RMkongo@cma.or.ke', 'Human Capital and Administration', 'HCA', 'active', 'standard', 'Driver'),
(4, 'CMA0054', 'MARY JEROBON KIPTOO', 'Kiptoo@cma.or.ke', 'Human Capital and Administration', 'HCA', 'active', 'standard', 'Senior Officer Administration'),
(5, 'CMA0055', 'ZEPHANIAH KIPCHIRCHIR CHEBII', 'chebii@cma.or.ke', 'Human Capital and Administration', 'HCA', 'active', 'standard', 'Registry Clerk'),
(6, 'CMA0065', 'LUKE EZEKIEL OMBARA', 'ombara@cma.or.ke', 'ICT', 'ICT', 'active', 'standard', 'Director Regulatory Policy and Stratgy'),
(7, 'CMA0077', 'JOHNSTONE KAILA OLTETIA', 'Oltetia@cma.or.ke', 'Market Supervision', 'MS', 'active', 'standard', 'Seconded'),
(8, 'CMA0078', 'WYCKLIFFE  SHAMIAH', 'Shamiah@cma.or.ke', 'Market Operations Administration', 'ICT', 'active', 'standard', 'Director Market Operations'),
(9, 'CMA0084', 'ESTHER JEROP MAIYO', 'Maiyo@cma.or.ke', 'Internal Audit & Risk Management', 'IARM', 'active', 'standard', 'Manager, Internal Audit and Risk Mgt'),
(10, 'CMA0089', 'WILBERFORCE  ONGONDO', 'WOngondo@cma.or.ke', 'Research, Market Infrasructure & Product Devnt', 'MDD', 'active', 'standard', 'Assistant Manager Research'),
(11, 'CMA0099', 'SAMUEL KAMUNYU NJOROGE', 'SNjoroge@cma.or.ke', 'Investor Education and Public Awareness', 'IEPA', 'active', 'standard', 'Manager Investor Education and Public Awareness'),
(12, 'CMA0100', 'PAUL MURITHI MUTHAURA', 'PMuthaura@cma.or.ke', 'Administration', 'HCA', 'active', 'standard', 'Chief Executive'),
(13, 'CMA0106', 'WILLYSON NYALE YANGA', 'WYanga@cma.or.ke', 'Corporate approvals', 'CA', 'active', 'standard', 'Assistant Manager Financial Analysis'),
(14, 'CMA0107', 'LUCY NYAMBURA KIMANI', 'LKimani@cma.or.ke', 'Investor Education and Public Awareness', 'IEPA', 'active', 'standard', 'Senior Investor Education Officer'),
(15, 'CMA0108', 'TIMOTHY MUNENE KAARIA', 'Timothy@cma.or.ke', 'Corporate approvals', 'CA', 'active', 'standard', 'Officer - Licensing and Approvals'),
(16, 'CMA0114', 'JOSHUA MBICHU GICHIRI', 'JGichiri@cma.or.ke', 'Investor Education and Public Awareness', 'IEPA', 'active', 'standard', 'Senior Officer - Knowledge Management '),
(17, 'CMA0115', 'EDWIN NYABUGA ONGERA', 'EOngera@cma.or.ke', 'Market Supervision', 'MS', 'active', 'standard', 'Senior Officer Compliance'),
(18, 'CMA0116', 'RONALD KIBET NGENO', 'RNgeno@cma.or.ke', 'Market Supervision', 'MS', 'active', 'standard', 'Market Infrastructure and Systems Officer'),
(19, 'CMA0117', 'JOSEPH NTURITU MWENDA', 'JMwenda@cma.or.ke', 'Derivatives', 'DU', 'active', 'standard', 'Head Derivatives contract de'),
(20, 'CMA0118', 'KENDI  BARIU', 'Bkendi@cma.or.ke', 'Market Supervision', 'MS', 'active', 'standard', 'Assistant Manager Surveillance'),
(21, 'CMA0119', 'FELISTUS NJOKI NDERITU', 'FNderitu@cma.or.ke', 'CE Office', '', 'active', 'standard', 'Executive Secretary'),
(22, 'CMA0121', 'DAVID KANYI NUTHU', 'DKanyi@cma.or.ke', 'Derivatives', 'DU', 'active', 'standard', 'Head, Price and Market Surveillance'),
(23, 'CMA0123', 'JOHN NJOROGE MBUGUA', 'JNjoroge@cma.or.ke', 'Finance', 'FIN', 'active', 'standard', 'Manager Finance'),
(24, 'CMA0127', 'ESTHER MUKONYO GITONGA', 'EGitonga@cma.or.ke', 'Investor Education and Public Awareness', 'IEPA', 'active', 'standard', 'Investor Education Officer'),
(25, 'CMA0129', 'JOHN CHEGE WAWERU', 'JWaweru@cma.or.ke', 'Human Capital and Administration', 'HCA', 'active', 'standard', 'Driver'),
(26, 'CMA0130', 'NICHOLAS MUSILI MUTUNGA', 'NMutunga@cma.or.ke', 'CE Office', '', 'active', 'standard', 'Driver'),
(27, 'CMA0132', 'EVERLYN LOKO MBITHI', 'EMbithi@cma.or.ke', 'Market Supervision', 'MS', 'active', 'standard', 'Assistant Manager Risk Analysis'),
(28, 'CMA0135', 'RICHARD MUNYIRI MUIGAI', 'RMuigai@cma.or.ke', 'Derivatives', 'DU', 'active', 'standard', 'Head, Licensing Insp and Audit Compliance'),
(29, 'CMA0137', 'DANIEL NGENGA WARUTERE', 'DWarutere@cma.or.ke', 'Market Supervision', 'MS', 'active', 'standard', 'Manager Market Supervision'),
(30, 'CMA0144', 'JAIRUS LITUNGILU MUAKA', 'JMuaka@cma.or.ke', 'Strategy Policy', 'SPRF', 'active', 'standard', 'Assistant Manager Strategy and Policy'),
(31, 'CMA0145', 'ISAAC MUASYA KIMANI', 'IMuasya@cma.or.ke', 'Information Communication Technology(ICT)', 'ICT', 'active', 'standard', 'Business Analyst'),
(32, 'CMA0146', 'CHARITY WANGARI MUTUA', 'CMutua@cma.or.ke', 'Human Capital and Administration', 'HCA', 'active', 'standard', 'Assistant Manager Human Capital and Administration'),
(33, 'CMA0147', 'VERONICA MORAA NYAMWEYA', 'VNyamweya@cma.or.ke', 'Market Supervision', 'MS', 'active', 'standard', 'Senior Officer Surveillance'),
(34, 'CMA0149', 'RUTH NGIMA WACHIRA', 'RNgima@cma.or.ke', 'Human Capital and Administration', 'HCA', 'active', 'standard', 'Office Assistant'),
(35, 'CMA0151', 'PETER  MBALU', 'PMbalu@cma.or.ke', 'CE Office', '', 'active', 'standard', 'Office Assistant'),
(36, 'CMA0152', 'LAWRENCE MUENDO MUMINA', 'LMumina@cma.or.ke', 'Investigation & Enforcement', 'IE', 'active', 'standard', 'Assistant Manager Investigation'),
(37, 'CMA0154', 'RICHARD KIPYEGON CHIRCHIR', 'muthuirobert@gmail.com', 'Information Communication Technology(ICT)', 'ICT', 'active', 'standard', 'Manager-Information, Communication and Technology'),
(38, 'CMA0155', 'PETER LEMAIYAN SAIGILU', 'PSaigilu@cma.or.ke', 'Finance', 'FIN', 'active', 'standard', 'Assistant Manager Finance'),
(39, 'CMA0157', 'ROSE SAPITAN SARUNI KASERO', 'RLeruk@cma.or.ke', 'Human Capital and Administration', 'HCA', 'active', 'standard', 'Registry Clerk'),
(40, 'CMA0158', 'LYDIA MUTHONI KINYANJUI', 'LKinyanjui@cma.or.ke', 'Strategy Policy', 'SPRF', 'active', 'standard', 'Senior Officer Strategy and Policy'),
(41, 'CMA0159', 'MARY MUTHONI NJUGUNA', 'MNjuguna@cma.or.ke', 'Corporate approvals', 'CA', 'inactive', 'standard', 'Manager Corporate Approvals'),
(42, 'CMA0160', 'JUSTUS AGOTI NYAMEYIO', 'JAgoti@cma.or.ke', 'Research, Market Infrasructure & Product Devnt', 'MDD', 'active', 'standard', 'Senior Research Officer'),
(43, 'CMA0161', 'KONRAD NAMADA AFANDE', 'KAfande@cma.or.ke', 'Investigation & Enforcement', 'IE', 'active', 'standard', 'Assistant Manager Investor Education and Public Awareness'),
(44, 'CMA0164', 'CHARLES MWANIKI THEURI', 'CMwaniki@cma.or.ke', 'Internal Audit & Risk Management', 'IARM', 'active', 'standard', 'Internal Audit Assistant'),
(45, 'CMA0166', 'DOROTHY ZIGE MWANDANDA', 'DMwandanda@cma.or.ke', 'CE Office', '', 'active', 'standard', 'Administrative Assistant'),
(46, 'CMA0167', 'COLIN MULWA MAWEU', 'cmaweu@cma.or.ke', 'Investigation & Enforcement', 'IE', 'active', 'standard', 'Assistant Manager Enforcement'),
(47, 'CMA0168', 'ANTONY GEORGE MWANGI', 'AMwangi@cma.or.ke', 'Communication', 'CC', 'active', 'standard', 'Assistant Manager Corporate Communications'),
(48, 'CMA0170', 'ESTHER SYOMBUA MANTHI', 'EManthi@cma.or.ke', 'Corporate approvals', 'CA', 'active', 'standard', 'Assistant Manager Licensing and Approvals'),
(49, 'CMA0174', 'EVA NANEU SAIYUAH', 'esaiyuah@cma.or.ke', 'Market Supervision', 'MS', 'active', 'standard', 'Senior Officer Compliance'),
(50, 'CMA0175', 'PAULINE NALIAKA LUSWETI', 'PLusweti@cma.or.ke', 'Corporate approvals', 'CA', 'active', 'standard', 'Senior Officer Financial Analysis'),
(51, 'CMA0179', 'ANDREW KAMAMI MUTHABUKU', 'AMuthabuku@cma.or.ke', 'Human Capital and Administration', 'HCA', 'active', 'standard', 'Manager'),
(52, 'CMA0180', 'CHRISTINE NYANGERI GESARE', 'CNyangeri@cma.or.ke', 'Investigation & Enforcement', 'IE', 'active', 'standard', 'Senior Officer Investigations'),
(53, 'CMA0181', 'BEATRICE CHEPKEMOI RERE', 'BRere@cma.or.ke', 'Corporation Secretary- Administration', 'LACS', 'active', 'standard', 'Administrative Assistant'),
(54, 'CMA0182', 'LEAH  MULI', 'lkoyiet@cma.or.ke', 'Communication', 'CC', 'active', 'standard', 'Communications Officer'),
(55, 'CMA0183', 'LAWRENCE NJERU NYAGA', 'LNyaga@cma.or.ke', 'Internal Audit & Risk Management', 'IARM', 'active', 'standard', 'Assistant Manager Internal Audit and Risk Mgt'),
(56, 'CMA0185', 'EDWIN NYAGA NJAMURA', 'ENjamura@cma.or.ke', 'Corporate Services-Administration', 'HCA', 'active', 'standard', 'Director Corporate Services'),
(57, 'CMA0186', 'FAITH MWENDE CHRISTOPHER', 'fmwende@cma.or.ke', 'Market Supervision', 'MS', 'active', 'standard', 'Officer Compliance'),
(58, 'CMA0187', 'HALKANO HARO HUQA', 'Hhalkano@cma.or.ke', 'Investor Education and Public Awareness', 'IEPA', 'active', 'standard', 'Investor Education Officer'),
(59, 'CMA0189', 'JANET MWIKALI KITUKU', 'JKituku@cma.or.ke', 'Human Capital and Administration', 'HCA', 'active', 'standard', 'Human Capital Officer'),
(60, 'CMA0190', 'SAMUEL NJUGUNA GACHANJA', 'sgachanja@cma.or.ke', 'Research, Market Infrasructure & Product Devnt', 'MDD', 'active', 'standard', 'Officer Infrastructure and Product Development Officer'),
(61, 'CMA0191', 'EDNA MORAA ONDIEKI', 'EMoraa@cma.or.ke', 'Investigation & Enforcement', 'IE', 'active', 'standard', 'Senior Officer Enforcement'),
(62, 'CMA0194', 'STEPHEN MOCHACHE ORINA', 'SOrina@cma.or.ke', 'Procurement', 'PROC', 'active', 'standard', 'Procurement Officer'),
(63, 'CMA0195', 'LILIAN CHEBET MISOI', 'LMisoi@cma.or.ke', 'Market Supervision', 'MS', 'active', 'standard', 'Senior Officer Surveillance'),
(64, 'CMA0197', 'VICTOR OLUOCH OTIENO', 'VOtieno@cma.or.ke', 'Corporate approvals', 'CA', 'active', 'standard', 'Senior Officer Financial Analysis'),
(65, 'CMA0198', 'MARGARET WAMBUI CHARAGU', 'MCharagu@cma.or.ke', 'Human Capital and Administration', 'HCA', 'active', 'standard', 'Receptionist'),
(66, 'CMA0199', 'HILLARY CHERUIYOT BIWOTT', 'HBiwott@cma.or.ke', 'Regulatory Framework', 'SPRF', 'active', 'standard', 'Legal Officer Regulatory Framework'),
(67, 'CMA0202', 'JOSEPHINE WANGARI KANGONGA', 'JKangonga@cma.or.ke', 'Regulatory Framework', 'SPRF', 'active', 'standard', 'Assistant Manager-Regulatory Framework'),
(68, 'CMA0205', 'KEFA MICHAEL GITAU NGOIRI', 'KNgoiri@cma.or.ke', 'Finance', 'FIN', 'active', 'standard', 'Accountant'),
(69, 'CMA0206', 'NINAH MUSANGA SITTI', 'NSitti@cma.or.ke', 'Investigation & Enforcement', 'IE', 'active', 'standard', 'Senior Officer Investigations'),
(70, 'CMA0207', 'PHILLIP ANDEKA NABWAYO', 'PNabwayo@cma.or.ke', 'Corporate approvals', 'CA', 'active', 'standard', 'Officer Licensing and Approvals'),
(71, 'CMA0208', 'ANASTASIA NJAMBI KIMATA', 'AKimata@cma.or.ke', 'Market Supervision', 'MS', 'active', 'standard', 'Risk Officer'),
(72, 'CMA0209', 'FRANCIS KIAGO NDIRANGU', 'FNdirangu@cma.or.ke', 'Investigation & Enforcement', 'IE', 'active', 'standard', 'Officer Enforcement'),
(73, 'CMA0210', 'ERIC TIMOTHY GITHENDU', 'TGithendu@cma.or.ke', 'Corporation Secretary- Administration', 'LACS', 'active', 'standard', 'Legal Officer Litigation'),
(74, 'CMA0213', 'DOUGLAS MWANIKI NGERE', 'DMwaniki@cma.or.ke', 'Information Communication Technology(ICT)', 'ICT', 'active', 'standard', 'Network and Security Administrator'),
(75, 'CMA0214', 'HARISON OMONDI OGOLLAH', 'HOgollah@cma.or.ke', 'Finance', 'FIN', 'active', 'standard', 'Systems Specialist Finance'),
(76, 'CMA0215', 'JOACHIM NJAGI WANDAKA', 'JWandaka@cma.or.ke', 'Corporate approvals', 'CA', 'active', 'standard', 'Officer  Licensing and Approvals'),
(77, 'CMA0216', 'JAMES WANENE MWANGI', 'JMwangi@cma.or.ke', 'Human Capital and Administration', 'HCA', 'active', 'standard', 'Senior Officer  Learning and Development'),
(78, 'CMA0217', 'JAMES MUTHOKA KIVUVA', 'jkivuva@cma.or.ke', 'ICT', 'ICT', 'active', 'standard', 'Manager Strategic Projects'),
(79, 'CMA0218', 'MATTHEW WAKOLI MUKISU', 'MMukisu@cma.or.ke', 'Derivatives', 'DU', 'active', 'standard', 'Manager Derivatives'),
(80, 'CMA0219', 'VIOLA KILEL CHELANGAT', 'VChelangat@cma.or.ke', 'Research, Market Infrasructure & Product Devnt', 'MDD', 'active', 'standard', 'Officer  Product Development'),
(81, 'CMA0220', 'JOSEPH MOBISA ONGWAE', 'JMobisa@cma.or.ke', 'Internal Audit & Risk Management', 'IARM', 'active', 'standard', 'Internal Auditor'),
(82, 'CMA0221', 'ANNE ADHIAMBO NALO', 'ANalo@cma.or.ke', 'Research, Market Infrasructure & Product Devnt', 'MDD', 'active', 'standard', 'Officer Product Development'),
(83, 'CMA0222', 'ISAAC MWANGI KIMANI', 'IMwangi@cma.or.ke', 'Market Supervision', 'MS', 'active', 'standard', 'Risk Officer'),
(84, 'CMA0223', 'ABUBAKAR ABUBAKAR HASSAN', 'AHassan@cma.or.ke', 'Investigations & Enforcement', 'IE', 'active', 'standard', 'Manager'),
(85, 'CMA0224', 'BRENDA CHERONO RUTTO', 'BCheronoRutto@cma.or.ke', 'Finance', 'FIN', 'active', 'standard', 'Assistant Accountant'),
(86, 'CMA0225', 'ALEXANDER NJAU CHEGE', 'ANjau@cma.or.ke', 'Human Capital & Administration', 'HCA', 'active', 'standard', 'Change Project Coordinator'),
(87, 'CMA0226', 'PETER ODERA ONYANGO', 'POnyango@cma.or.ke', 'Derivatives', 'DU', 'active', 'standard', 'Head Risk Analysis and Stress'),
(88, 'CMA0227', 'HELLEN KWAMBOKA OMBATI', 'HOmbati@cma.or.ke', 'Corporation Secretary- Administration', 'LACS', 'active', 'standard', 'Manager Legal Affairs and Corporation Secretary'),
(89, 'CMA0229', 'LISHBA NAISINKOI MOSE', 'LMose@cma.or.ke', 'Strategic Projects Department', 'SPU', 'active', 'standard', 'Projects Officer'),
(90, 'CMA0230', 'KELVIN KIPCHUMBA CHERUIYOT', 'KCheruiyot@cma.or.ke', 'Market Supervision', 'MS', 'active', 'standard', 'Officer Surveillance'),
(91, 'CMA0232', 'ISSA RASHID MWAKIWIWI', 'IMwakiwiwi@cma.or.ke', 'Market Supervision', 'MS', 'active', 'standard', 'Officer Compliance'),
(92, 'CMA0233', 'IRENE MUSITSA LUKOBA', 'ILukoba@cma.or.ke', 'Corporation Secretary- Administration', 'LACS', 'inactive', 'standard', 'Legal Officer Contract and Advisory'),
(93, 'CMA0234', 'SOITA  WASIKE', 'SWasike@cma.or.ke', 'Investigation & Enforcement', 'IE', 'active', 'standard', 'Officer Investigations'),
(94, 'CMA0235', 'JOSEPHINE KEMUNTO MOKAYA', 'JMokaya@cma.or.ke', 'Capital Markets Fraud Investigation Unit', 'CMFIU', 'active', 'standard', 'Head - CMFIU'),
(95, 'CMA0236', 'ROSEMARY KANYORO WAIRIMU', 'RKanyoro@cma.or.ke', 'Corporate approvals', 'CA', 'active', 'standard', 'Officer Financial Analyst'),
(96, 'CMA0238', 'REUBEN BORO GITAHI', 'RGitahi@cma.or.ke', 'Investigation & Enforcement', 'IE', 'active', 'standard', 'Technical Expert  Forensic Investigations'),
(97, 'CMA0239', 'JEREMIAH KIBET YEGO', 'JYego@cma.or.ke', 'Procurement', 'PROC', 'active', 'standard', 'Assistant Manager Procurement'),
(98, 'CMA0240', 'ELKANA ONYARI MOKUA', 'EMokua@cma.or.ke', 'Market Supervision', 'MS', 'active', 'standard', 'Officer Surveillance'),
(99, 'CMA0241', 'CYRILLA MOYOKA MASIACHE', 'CMasiache@cma.or.ke', 'Corporate approvals', 'CA', 'active', 'standard', 'Officer Licensing and Approvals'),
(100, 'CMA0243', 'MARGARET ODHIAMBO AWINO', 'MAwino@cma.or.ke', 'Strategy Policy', 'SPRF', 'active', 'standard', 'Strategy and Policy Officer'),
(101, 'CMA0244', 'BONIFACE NGII MUTINDA', 'BMutinda@cma.or.ke', 'Corporate approvals', 'CA', 'active', 'standard', 'Officer Financial Analyst'),
(102, 'CMA0245', 'GODWIN KIMATHI KINOTI', 'GKinoti@cma.or.ke', 'Finance', 'FIN', 'active', 'standard', 'Assistant Accountant'),
(103, 'CMA0246', 'DAISY JEROTICH KIPRONO', 'DKiprono@cma.or.ke', 'Market Supervision', 'MS', 'active', 'standard', 'Officer Compliance'),
(104, 'CMA0247', 'SAFIA Adhi RAMATA', 'SRamata@cma.or.ke', 'Finance', 'FIN', 'active', 'standard', 'Assistant Accountant'),
(105, 'CMA0248', 'DOUGLAS NYAWIRA GICHAGA', 'DGichaga@cma.or.ke', 'Investigation & Enforcement', 'IE', 'active', 'standard', 'Officer Investigations'),
(106, 'CMA0249', 'BREITNER ONCHURU NYANTIKA', 'BNyantika@cma.or.ke', 'Strategy Policy', 'SPRF', 'active', 'standard', 'Strategy and Policy Officer'),
(107, 'CMFIU08', 'NEVERT  MUTEA', 'NMutea@cma.or.ke', 'Capital Markets Fraud Investigation Unit', 'CMFIU', 'active', 'standard', 'CMFIU'),
(108, 'CMFIU15', 'SAMUEL NYANGE MWASHO', 'SMwasho@cma.or.ke', 'Capital Markets Fraud Investigation Unit', 'CMFIU', 'active', 'standard', 'CMFIU'),
(109, 'CMFIU26', 'SAMUEL  CHUMO', 'CKipkoech@cma.or.ke', 'Capital Markets Fraud Investigation Unit', 'CMFIU', 'active', 'standard', 'CMFIU'),
(110, 'CMFIU27', 'KODHECK MATANGI OMARI', 'OMatangi@cma.or.ke', 'Capital Markets Fraud Investigation Unit', 'CMFIU', 'active', 'standard', 'CMFIU'),
(111, 'CMFIU28', 'ACHILLES FRANCIS OMONDI', 'FAchilles@cma.or.ke', 'Capital Markets Fraud Investigation Unit', 'CMFIU', 'active', 'standard', 'CMFIU'),
(112, 'CMFIU29', 'WINNIE ROSE BISE', 'No email', 'Capital Markets Fraud Investigation Unit', 'CMFIU', 'active', 'standard', 'CMFIU'),
(113, 'CMFIU30', 'CONSOLATA  MWELU', 'NMwelu@cma.or.ke', 'Capital Markets Fraud Investigation Unit', 'CMFIU', 'active', 'standard', 'CMFIU'),
(114, 'CMFIU31', 'JAMES  ASWANI', 'ANahashon@cma.or.ke', 'Capital Markets Fraud Investigation Unit', 'CMFIU', 'active', 'standard', 'CMFIU'),
(115, 'CMFIU32', 'SHEHE MKOFIRA MARO', 'SMaro@cma.or.ke', 'Capital Markets Fraud Investigation Unit', 'CMFIU', 'active', 'standard', 'CMFIU'),
(116, 'CMFIU33', 'LUCY WANJIRU MACHARIA', 'LMacharia@cma.or.ke', 'Capital Markets Fraud Investigation Unit', 'CMFIU', 'active', 'standard', 'CMFIU'),
(117, 'GT00011', 'JANET ACHIENG ODHIAMBO', 'JOdhiambo@cma.or.ke', 'Corporate Services-Administration', 'HCA', 'active', 'standard', 'Graduate Trainees'),
(118, 'GT00012', 'DENIS MACHUHI KAMAU', 'Dmachuhi@cma.or.ke', 'Corporate Services-Administration', 'HCA', 'active', 'standard', 'Graduate Trainees'),
(119, 'GT00013', 'JOY VIVIAN KENDI', 'JKendi@cma.or.ke', 'Corporate Services-Administration', 'HCA', 'active', 'standard', 'Graduate Trainees'),
(120, 'GT00014', 'SHADRACK YAKO SABORA', 'SSabora@cma.or.ke', 'Corporate Services-Administration', 'HCA', 'active', 'standard', 'Graduate Trainees'),
(121, 'GT00015', 'VIVIAN NALUENDE DABANI', 'VDabani@cma.or.ke', 'Corporate Services-Administration', 'HCA', 'active', 'standard', 'Graduate Trainees'),
(122, 'GT00016', 'JAMES HILLARY ODERO OBONYO', 'JObonyo@cma.or.ke', 'Corporate Services-Administration', 'HCA', 'active', 'standard', 'Graduate Trainees'),
(123, 'GT00017', 'EDNA KASICHANA KABAILA', 'EKabaila@cma.or.ke', 'Corporate Services-Administration', 'HCA', 'active', 'standard', 'Graduate Trainees'),
(124, 'GT00018', 'DAVID AKILIMALI CHIPINDE', 'DChipinde@cma.or.ke', 'Corporate Services-Administration', 'HCA', 'active', 'standard', 'Graduate Trainees'),
(125, 'GT00019', 'JOSEPH NGETI MWAKIO', 'JMwakio@cma.or.ke', 'Human Capital and Administration', 'HCA', 'active', 'standard', 'Graduate Trainees'),
(126, 'GT00020', 'GEOFFREY GESICHO ANYUGA', 'GAnyuga@cma.or.ke', 'Corporate Services-Administration', 'HCA', 'active', 'standard', 'Graduate Trainees'),
(127, 'INT00224', 'ELVIS SAMSON NJUGUNA GITAU', 'EGitau@cma.or.ke', 'Communication', 'CC', 'active', 'standard', 'Intern'),
(128, 'INT00230', 'JOSEPH MAINA NJUGUNA', 'Jnjuguna@cma.or.ke', 'Corporate Services-Administration', 'HCA', 'active', 'standard', 'Intern'),
(129, 'INT00232', 'EVANS FIKI KAZUNGU', 'ekazungu@cma.or.ke', 'Corporation Secretary- Administration', 'LACS', 'active', 'standard', 'Intern'),
(130, 'INT54462', 'JOSEPHINE ONGACHI ONG\'AYI', 'josephineongachi@gmail.com', 'Finance', 'FIN', 'active', 'standard', 'Intern'),
(131, 'TEMP00104', 'JOY WAWIRA GACHORA', 'jgachora@cma.or.ke', 'Investigation & Enforcement', 'IE', 'active', 'standard', 'Enforcement'),
(132, 'TEMP00107', 'SAMSON MWAURA MBUGUA', 'Smbugua@cma.or.ke', 'Strategy Policy', 'SPRF', 'active', 'standard', 'CMMP'),
(133, 'TEMP00109', 'HELEN ACHIENG OUMA', 'HOuma@cma.or.ke', 'Administration', 'HCA', 'active', 'standard', 'Adminitrative Assistant'),
(134, 'TEMP00110', 'SERAH MUTHANZE MBALUKA', 'SMBALUKA@cma.or.ke', 'Strategy Policy', 'SPRF', 'active', 'standard', 'Adminitrative Assistant'),
(135, 'TEMP00112', 'OBED MULIRO MONYANCHA', 'omonyancha@cma.or.ke', 'Corporate approvals', 'CA', 'active', 'standard', 'Financial Analysis'),
(136, 'TEMP00114', 'MONICAH KARIMI NJIRU', 'MNjiru@cma.or.ke', 'Human Capital and Administration', 'HCA', 'active', 'standard', 'HRA'),
(137, 'TEMP00115', 'HILLARY SWAHILI MULINDI', 'HMulindi@cma.or.ke', 'ICT', 'ICT', 'active', 'standard', 'CMMP'),
(138, 'TEMP00116', 'JANE WAMBUI MWANGI', 'JWambui@cma.or.ke', 'Strategy Policy', 'SPRF', 'active', 'standard', 'CMMP'),
(139, 'TEMP00117', 'JOSPHINE MUSANGI KIMANZI', 'JKimanzi@cma.or.ke', 'Strategy Policy', 'SPRF', 'active', 'standard', 'CMMP'),
(140, 'TEMP00121', 'DOUGLAS OWINO OKAKA', 'DOkaka@cma.or.ke', 'Corporate Services-Administration', 'HCA', 'active', 'standard', 'Office Assistant'),
(141, 'TEMP00122', 'KEVIN JEFWA RUA', 'KRua@cma.or.ke', 'Information Communication Technology(ICT)', 'ICT', 'active', 'standard', 'ICT'),
(142, 'TEMP00123', 'LINET NYABOKE OBENGA', 'LObenga@cma.or.ke', 'Information Communication Technology(ICT)', 'ICT', 'active', 'standard', 'ICT'),
(143, 'TEMP00126', 'DENNIS OKARI NYAKUNDI', 'DNyakundi@cma.or.ke', 'Information Communication Technology(ICT)', 'ICT', 'active', 'standard', 'ICT'),
(144, 'TEMP00127', 'CYNTHIA ZAWADI BARASA', 'Cbarasa@cma.or.ke', 'Corporate approvals', 'CA', 'active', 'standard', 'Legal Assistant Corporate Approvals'),
(145, 'TEMP00128', 'WESLEY BARONGO NYANDORO', 'WNyandoro@cma.or.ke', 'Corporate approvals', 'CA', 'active', 'standard', 'Financial Analysis'),
(146, 'TEMP00129', 'MICHAEL MUIGWA MWAURA', 'MMwaura@cma.or.ke', 'Corporation', '', 'suspended', 'standard', 'Legal Affairs and Coporation Secretary'),
(147, 'TEMP00130', 'REDEMPTER NTHENYA MUTINDA', 'RMutinda@cma.or.ke', 'Procurement', 'PROC', 'active', 'standard', 'Procurement'),
(148, 'TEMP00131', 'KEVIN ODARI CLAY', 'KClay@cma.or.ke', 'Regulatory Framework', 'SPRF', 'active', 'standard', 'Regulatory Framework'),
(149, 'TEMP00132', 'HUMPHREY OMARI MOTURI', 'HMoturi@cma.or.ke', 'Investor Education and Public Awareness', 'IEPA', 'active', 'standard', 'Resource Centre'),
(150, 'TEMP00133', 'SHEILLA BONI WILLIAMS', 'SWilliams@cma.or.ke', 'Investigation & Enforcement', 'IE', 'active', 'standard', 'Investigation'),
(151, 'TEMP00134', 'JAMES KIMATHI GITONGA', 'JGitonga@cma.or.ke', 'Human Capital and Administration', 'HCA', 'active', 'standard', 'HRA'),
(152, 'TEMP00135', 'CHARITY SIANTO PAITA', 'cpaita@cma.or.ke', 'Human Capital and Administration', 'HCA', 'active', 'standard', 'HRA'),
(153, 'TEMP00136', 'ALFRED JOHN OSIEMO', 'AOsiemo@cma.or.ke', 'Market Supervision', 'MS', 'active', 'standard', 'Market Development'),
(154, 'TEMP54461', 'MARO JILLO ABDALLA', 'mabdalla@cma.or.ke', 'Strategic Projects Department', 'SPU', 'active', 'admin', 'TEMP PHP MYSQL WEB DEVELOPER'),
(158, 'TEST001', 'Test User', 'testuser@test.com', 'Capital Markets Fraud Investigation Unit\r\n', 'LACS', 'active', 'standard', 'Test User '),
(159, 'INT000237', 'PETER CHEGE KARIUKI', 'Pkariuki@cma.or.ke', 'Strategic Projects Department', 'SPU', 'active', 'admin', 'Intern');

-- --------------------------------------------------------

--
-- Table structure for table `strategic_objectives`
--

CREATE TABLE `strategic_objectives` (
  `id` int(11) NOT NULL,
  `reference_no` int(11) DEFAULT NULL,
  `strategic_objective` varchar(500) DEFAULT NULL,
  `changed` varchar(50) NOT NULL DEFAULT 'no',
  `created_by` varchar(100) DEFAULT NULL,
  `date_recorded` varchar(50) DEFAULT NULL,
  `time_recorded` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `strategic_objectives`
--

INSERT INTO `strategic_objectives` (`id`, `reference_no`, `strategic_objective`, `changed`, `created_by`, `date_recorded`, `time_recorded`) VALUES
(2, 1, 'Ensuring a robust, facilitative and\r\n                    responsive policy and regulatory\r\n                    framework for capital market\r\n                    development and efficiency', 'no', 'Abdalla', '09/19/2018', '11:16:10am'),
(3, 2, 'Facilitate the development,\r\n                    diversification and uptake of capital\r\n                    markets products and services', 'no', 'Abdalla', '09/19/2018', '11:16:34am'),
(4, 3, 'Ensure sound market infrastructure,\r\n                    institutions and operations', 'no', 'Abdalla', '09/19/2018', '11:16:47am'),
(5, 4, 'Leveraging technology to drive\r\n                    efficiency in the capital markets\r\n                    value chain', 'no', 'Abdalla', '09/19/2018', '11:17:03am'),
(6, 5, ' Ensure optimal institutional\r\n                    efficiency and effectiveness of CMA', 'no', 'Abdalla', '09/19/2018', '11:17:18am'),
(7, 6, 'Enhancing strategic influence', 'no', 'Abdalla', '09/19/2018', '11:17:34am');

-- --------------------------------------------------------

--
-- Table structure for table `update_risk_status`
--

CREATE TABLE `update_risk_status` (
  `id` int(6) NOT NULL,
  `dep_code` varchar(50) DEFAULT NULL,
  `reference_no` varchar(250) DEFAULT NULL,
  `risk_description` varchar(500) DEFAULT NULL,
  `period_from` varchar(250) DEFAULT NULL,
  `quarter` varchar(250) DEFAULT NULL,
  `risk_management_strategy_undertaken` text,
  `effect_of_risk_to_authority` text,
  `action_to_be_undertaken` text,
  `prior_impact_score` varchar(50) DEFAULT NULL,
  `prior_likelihood_score` varchar(50) DEFAULT NULL,
  `prior_overall_score` int(5) DEFAULT NULL,
  `current_impact_score` varchar(50) DEFAULT NULL,
  `current_likelihood_score` varchar(50) DEFAULT NULL,
  `current_overall_score` int(5) DEFAULT NULL,
  `changed` varchar(50) NOT NULL DEFAULT 'no',
  `updated_by` varchar(250) DEFAULT NULL,
  `date_updated` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `update_risk_status`
--

INSERT INTO `update_risk_status` (`id`, `dep_code`, `reference_no`, `risk_description`, `period_from`, `quarter`, `risk_management_strategy_undertaken`, `effect_of_risk_to_authority`, `action_to_be_undertaken`, `prior_impact_score`, `prior_likelihood_score`, `prior_overall_score`, `current_impact_score`, `current_likelihood_score`, `current_overall_score`, `changed`, `updated_by`, `date_updated`) VALUES
(4, NULL, 'ICT/R/1', 'Server and Network Infrastructure Failures', '2018-2019', 'April - June', '&lt;ol&gt;&lt;li&gt;&lt;span style=\"font-size:10.0pt;font-family:\'Corbel\',sans-serif;\"&gt;Conducted the scheduled preventive maintenance exercise for ICT infrastructure and network components&lt;/span&gt;&lt;p style=\"margin-left:12.8pt;\"&gt;&lt;span style=\"font-size:10.0pt;font-family:\'Corbel\',sans-serif;\"&gt;&amp;nbsp;&lt;/span&gt;&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"font-size:10.0pt;font-family:\'Corbel\',sans-serif;\"&gt;Managed and maintained an effective patch management setup for server and client systems&lt;/span&gt;&lt;p style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:normal;\"&gt;&lt;span lang=\"EN-GB\" style=\"font-size:10.0pt;font-family:\'Corbel\',sans-serif;\"&gt;&amp;nbsp;&lt;/span&gt;&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"font-size:10.0pt;font-family:\'Corbel\',sans-serif;\"&gt;Conducted a successful failover test of select ICT systems to the hot Disaster Recovery site&lt;/span&gt;&lt;p style=\"margin-bottom:0in;margin-bottom:.0001pt;\"&gt;&lt;span lang=\"EN-GB\" style=\"font-size:10.0pt;line-height:115%;font-family:\'Corbel\',sans-serif;\"&gt;&amp;nbsp;&lt;/span&gt;&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"font-size:10.0pt;font-family:\'Corbel\',sans-serif;\"&gt;Ensured availability of stand-by server and network peripheral replacements such as storage system and server hard drives.&lt;/span&gt;&lt;/li&gt;&lt;/ol&gt;&lt;p&gt;&lt;/p&gt;', '&lt;span lang=\"EN-GB\" style=\"font-size:10.0pt;line-height:115%;font-family:\'Corbel\',sans-serif;\"&gt;Risk did not crystallize or materialize&lt;/span&gt; ', '&lt;ol&gt;&lt;li&gt;&lt;span style=\"font-size:10.0pt;font-family:\'Corbel\',sans-serif;\"&gt;Ensure SLA&amp;rsquo;s for maintenance services are in place and maintenance programs executed as per schedule for IT Assets.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"font-size:10.0pt;font-family:\'Corbel\',sans-serif;\"&gt;Monitor and evaluate the effectiveness of patch management process.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"font-size:10.0pt;font-family:\'Corbel\',sans-serif;\"&gt;Manage and update IT Assets Database.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"font-size:10.0pt;font-family:\'Corbel\',sans-serif;\"&gt;Review ICT Authority guidelines and policy on IT security and comply.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"font-size:10.0pt;font-family:\'Corbel\',sans-serif;\"&gt;Repair the Biometric access control to the Data Centre.&lt;/span&gt;&lt;/li&gt;&lt;/ol&gt;', '5', '4', 20, '5', '4', 20, 'yes', 'MARO JILLO ABDALLA', '10/22/2018'),
(5, 'ICT', 'ICT/R/1', 'Server and Network Infrastructure Failures', '2018-2019', 'April - June', '&lt;ol&gt;&lt;li&gt;&lt;span style=\"font-size:10.0pt;font-family:\'Corbel\',sans-serif;\"&gt;Conducted the scheduled preventive maintenance exercise for ICT infrastructure and network components&lt;/span&gt;&lt;p style=\"margin-left:12.8pt;\"&gt;&lt;span style=\"font-size:10.0pt;font-family:\'Corbel\',sans-serif;\"&gt;&amp;nbsp;&lt;/span&gt;&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"font-size:10.0pt;font-family:\'Corbel\',sans-serif;\"&gt;Managed and maintained an effective patch management setup for server and client systems&lt;/span&gt;&lt;p style=\"margin-bottom:0in;margin-bottom:.0001pt;line-height:normal;\"&gt;&lt;span lang=\"EN-GB\" style=\"font-size:10.0pt;font-family:\'Corbel\',sans-serif;\"&gt;&amp;nbsp;&lt;/span&gt;&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"font-size:10.0pt;font-family:\'Corbel\',sans-serif;\"&gt;Conducted a successful failover test of select ICT systems to the hot Disaster Recovery site&lt;/span&gt;&lt;p style=\"margin-bottom:0in;margin-bottom:.0001pt;\"&gt;&lt;span lang=\"EN-GB\" style=\"font-size:10.0pt;line-height:115%;font-family:\'Corbel\',sans-serif;\"&gt;&amp;nbsp;&lt;/span&gt;&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"font-size:10.0pt;font-family:\'Corbel\',sans-serif;\"&gt;Ensured availability of stand-by server and network peripheral replacements such as storage system and server hard drives.&lt;/span&gt;&lt;/li&gt;&lt;/ol&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;', '&lt;span lang=\"EN-GB\" style=\"font-size:10.0pt;line-height:115%;font-family:\'Corbel\',sans-serif;\"&gt;Risk did not crystallize or materialize&lt;/span&gt; ', '&lt;ol&gt;&lt;li&gt;&lt;span style=\"font-size:10.0pt;font-family:\'Corbel\',sans-serif;\"&gt;Ensure SLA&amp;rsquo;s for maintenance services are in place and maintenance programs executed as per schedule for IT Assets.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"font-size:10.0pt;font-family:\'Corbel\',sans-serif;\"&gt;Monitor and evaluate the effectiveness of patch management process.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"font-size:10.0pt;font-family:\'Corbel\',sans-serif;\"&gt;Manage and update IT Assets Database.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"font-size:10.0pt;font-family:\'Corbel\',sans-serif;\"&gt;Review ICT Authority guidelines and policy on IT security and comply.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"font-size:10.0pt;font-family:\'Corbel\',sans-serif;\"&gt;Repair the Biometric access control to the Data Centre.&lt;/span&gt;&lt;/li&gt;&lt;/ol&gt;', '5', '4', 20, '5', '2', 10, 'no', 'MARO JILLO ABDALLA', '10/23/2018'),
(6, 'SPU', 'SPU/R/1', 'Strategy execution delay arising from reliance on external funding partners\r\n', '2018-2019', 'October - December', '&lt;ul&gt;&lt;li&gt;&lt;strong&gt;&lt;span style=\"font-size:10.0pt;line-height:150%;font-family:\'Corbel\',sans-serif;\"&gt;Continued liaison&lt;/span&gt;&lt;/strong&gt;&lt;span style=\"font-size:10.0pt;line-height:150%;font-family:\'Corbel\',sans-serif;\"&gt; between external partners and internal coordination teams to ensure less delay in strategy execution. &lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;strong&gt;&lt;span style=\"font-size:10.0pt;line-height:150%;font-family:\'Corbel\',sans-serif;\"&gt;Noting lessons learned&lt;/span&gt;&lt;/strong&gt;&lt;span style=\"font-size:10.0pt;line-height:150%;font-family:\'Corbel\',sans-serif;\"&gt; from existing consultancies to learn how to do the next ones better.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;strong&gt;&lt;span lang=\"EN-GB\" style=\"font-size:10.0pt;line-height:115%;font-family:\'Corbel\',sans-serif;\"&gt;Ensuring internal project teams have signed off&amp;nbsp;&lt;/span&gt;&lt;/strong&gt;on any documentation or process before engaging external partners.&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;&lt;/p&gt;', '&lt;ul&gt;&lt;li&gt;&lt;span style=\"font-size:10.0pt;line-height:150%;font-family:\'Corbel\',sans-serif;\"&gt;Delay in the Authority meeting its strategic objectives.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"font-size:10.0pt;line-height:150%;font-family:\'Corbel\',sans-serif;\"&gt;Resources being stretched to accommodate timelines that have been delayed. &lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"font-size:10.0pt;line-height:150%;font-family:\'Corbel\',sans-serif;\"&gt;Declining budget and project performance.&amp;nbsp;&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span style=\"font-size:10.0pt;line-height:150%;font-family:\'Corbel\',sans-serif;\"&gt;&lt;/span&gt;Fatigue of resources from waiting on projects that do not kick off.&amp;nbsp;&lt;/li&gt;&lt;/ul&gt;', '&lt;ul&gt;&lt;li&gt;&lt;span style=\"font-size:10.0pt;line-height:150%;font-family:\'Corbel\',sans-serif;\"&gt;Continued liaison with FSSP PIU to continue improving on project turnaround times and coordination with the National Treasury to decrease procurement delays. &lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span lang=\"EN-GB\" style=\"font-size:10.0pt;line-height:115%;font-family:\'Corbel\',sans-serif;\"&gt;Increase pressure on PIU to deliver on their proposed execution timelines.&lt;/span&gt;&lt;/li&gt;&lt;/ul&gt;', '4', '5', 20, '4', '5', 20, 'no', 'MARO JILLO ABDALLA', '10/23/2018');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departmental_objectives`
--
ALTER TABLE `departmental_objectives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programmes`
--
ALTER TABLE `programmes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `risks`
--
ALTER TABLE `risks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `risk_drivers`
--
ALTER TABLE `risk_drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `risk_management`
--
ALTER TABLE `risk_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sign_in_logs`
--
ALTER TABLE `sign_in_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_users`
--
ALTER TABLE `staff_users`
  ADD PRIMARY KEY (`staff_users_id`);

--
-- Indexes for table `strategic_objectives`
--
ALTER TABLE `strategic_objectives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `update_risk_status`
--
ALTER TABLE `update_risk_status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departmental_objectives`
--
ALTER TABLE `departmental_objectives`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `programmes`
--
ALTER TABLE `programmes`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `risks`
--
ALTER TABLE `risks`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `risk_drivers`
--
ALTER TABLE `risk_drivers`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `risk_management`
--
ALTER TABLE `risk_management`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `sign_in_logs`
--
ALTER TABLE `sign_in_logs`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `staff_users`
--
ALTER TABLE `staff_users`
  MODIFY `staff_users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `strategic_objectives`
--
ALTER TABLE `strategic_objectives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `update_risk_status`
--
ALTER TABLE `update_risk_status`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
