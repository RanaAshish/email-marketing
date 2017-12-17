-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2015 at 09:20 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `emailmarketing`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fname`, `lname`, `email`, `password`) VALUES
(1, 'Mikinj', 'Mistry', 'me.mikinj@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `campaign`
--

CREATE TABLE IF NOT EXISTS `campaign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email_subject` varchar(255) NOT NULL,
  `from_name` varchar(255) NOT NULL,
  `from_email` varchar(1500) NOT NULL,
  `type` varchar(255) NOT NULL,
  `creationDate` date NOT NULL,
  `content` text,
  `user_id` int(11) NOT NULL,
  `template_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `template_id` (`template_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `campaign`
--

INSERT INTO `campaign` (`id`, `name`, `email_subject`, `from_name`, `from_email`, `type`, `creationDate`, `content`, `user_id`, `template_id`) VALUES
(5, 'Ganesha', 'Ganesha', 'mikinj', 'me.mikinj@gmail.com', 'HTML Email', '2015-12-21', '\n                                            <div tabindex="5001" class="no-margn nicescroll todo-list scroll" style="background-color: whitesmoke; overflow: hidden;">\n                                                <style type="text/css">\n                                                    /*for template*/\n                                                    .drop\n                                                    {\n                                                        background-color:whitesmoke;\n                                                        margin: 5px,5px;\n                                                        min-height: 60px;\n                                                    }\n                                                    .notdisplayDel\n                                                    {\n                                                        display: none;\n                                                    }\n\n                                                    .imgPortable \n                                                    {\n                                                        max-height: 100%;\n                                                        max-width: 100%;\n                                                    }\n                                                    .abtn\n                                                    {\n                                                        border-radius: 2px;\n                                                        box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.1);\n                                                        font-family: "Nunito",sans-serif;\n                                                        letter-spacing: 0.2px;\n                                                        opacity: 0.93;\n                                                        display: inline-block;\n                                                        margin-bottom: 0px;\n                                                        font-weight: normal;\n                                                        text-align: center;\n                                                        vertical-align: middle;\n                                                        cursor: pointer;\n                                                        background-image: none;\n                                                        border: 1px solid transparent;\n                                                        white-space: nowrap;\n                                                        padding: 6px 12px;\n                                                        font-size: 14px;\n                                                        line-height: 1.42857;\n                                                        -moz-user-select: none;\n                                                    }\n\n                                                </style>\n                                                <!-- ngRepeat: (key, item) in lists.list1 --><div ng-repeat="(key, item) in lists.list1" class="col-sm-12 nestedDemo ng-scope" style="width: 100%">\n                                                    <!-- ngIf: !typeOfCapagin(item) --><!-- ngInclude: ctype --><div class="ng-scope" ng-if="!typeOfCapagin(item)" ng-include="ctype" dnd-list="item"><!-- ngIf: item.length == 0 -->\n<!-- ngRepeat: (k,con) in item --><!-- ngInclude: con.type --><div draggable="true" ng-repeat="(k,con) in item" dnd-draggable="con" dnd-effect-allowed="move" dnd-selected="lists.selected = con" dnd-moved="item.splice($index,1)" ng-include="con.type" style="text-decoration: none" class="dropzone2 ng-scope" ng-class="{selected: lists.selected === con}"><div class="drop ng-scope">\n    \n    <div draggable="true" class="ng-binding" ng-bind-html="con.data" style="padding: 15px;word-wrap: normal;" dnd-nodrag=""><div align="center"><h2>Happy Ganesh Chaturthi</h2></div></div>\n</div>\n</div><!-- end ngRepeat: (k,con) in item -->\n</div><!-- end ngIf: !typeOfCapagin(item) -->\n                                                    <!-- ngIf: typeOfCapagin(item) && item.length == 2 -->\n                                                    <!-- ngIf: typeOfCapagin(item) && item.length == 3 -->\n                                                </div><!-- end ngRepeat: (key, item) in lists.list1 --><div ng-repeat="(key, item) in lists.list1" class="col-sm-12 nestedDemo ng-scope" style="width: 100%">\n                                                    <!-- ngIf: !typeOfCapagin(item) --><!-- ngInclude: ctype --><div class="ng-scope" ng-if="!typeOfCapagin(item)" ng-include="ctype" dnd-list="item"><!-- ngIf: item.length == 0 -->\n<!-- ngRepeat: (k,con) in item --><!-- ngInclude: con.type --><div draggable="true" ng-repeat="(k,con) in item" dnd-draggable="con" dnd-effect-allowed="move" dnd-selected="lists.selected = con" dnd-moved="item.splice($index,1)" ng-include="con.type" style="text-decoration: none" class="dropzone2 ng-scope" ng-class="{selected: lists.selected === con}"><div class="drop ng-scope">\n    <div style="background-color: black;opacity: 0.5;position: absolute;width:96.5%" class="displayDel notdisplayDel" id="del">\n        <div style="float: right;">\n            <button type="button" ng-click="deleteWidget($event,key,k,k1)" class="del btn btn-small btn-inverse waves waves-light"><span class="fa fa-trash"></span></button>\n            <button type="button" ng-click="chktype(''image'',$event)" class="edit btn btn-small btn-inverse waves waves-light" btn-type="info" ng-init="type = info"><span class="fa fa-pencil"></span></button>\n        </div>\n    </div>\n    <div draggable="true" class="displayData" style="padding: 15px; text-align: center;" dnd-nodrag="" ng-style="con.divcss">\n        <img style="border-color: rgb(128, 0, 0); border-style: double; border-width: 11px;" src="http://localhost/EmailMarketing/template/BasicTemplate/20/img/img_4170.jpg" alt="image" ng-style="con.cssstyle" class="imgPortable"><br>\n    </div>\n</div>\n</div><!-- end ngRepeat: (k,con) in item -->\n</div><!-- end ngIf: !typeOfCapagin(item) -->\n                                                    <!-- ngIf: typeOfCapagin(item) && item.length == 2 -->\n                                                    <!-- ngIf: typeOfCapagin(item) && item.length == 3 -->\n                                                </div><!-- end ngRepeat: (key, item) in lists.list1 --><div ng-repeat="(key, item) in lists.list1" class="col-sm-12 nestedDemo ng-scope" style="width: 100%">\n                                                    <!-- ngIf: !typeOfCapagin(item) --><!-- ngInclude: ctype --><div class="ng-scope" ng-if="!typeOfCapagin(item)" ng-include="ctype" dnd-list="item"><!-- ngIf: item.length == 0 -->\n<!-- ngRepeat: (k,con) in item --><!-- ngInclude: con.type --><div draggable="true" ng-repeat="(k,con) in item" dnd-draggable="con" dnd-effect-allowed="move" dnd-selected="lists.selected = con" dnd-moved="item.splice($index,1)" ng-include="con.type" style="text-decoration: none" class="dropzone2 ng-scope" ng-class="{selected: lists.selected === con}"><div class="drop ng-scope" style="">\n<div style="background-color: black;opacity: 0.5;position: absolute;width:96.5%" class="notdisplayDel" id="del">\n    <div style="float: right;">\n        \n        <button type="button" ng-click="deleteWidget($event,key,k,k1)" class="del btn btn-small btn-inverse waves waves-light"><span class="fa fa-trash"></span></button>\n        <button type="button" ng-click="chktype(''btn'',$event)" class="edit btn btn-small btn-inverse waves waves-light" btn-type="info" ng-init="type = btn"><span class="fa fa-pencil"></span></button>\n    </div>\n</div>\n    <div draggable="true" ng-style="con.divcss" class="displayData" style="padding: 15px; min-height: 64px; text-align: center;" dnd-nodrag="">\n        <a style="border-color: black; border-style: solid; border-width: 1px; font-family: Times New Roman; color: rgb(255, 255, 255); font-size: 15px; background-color: rgb(51, 184, 108);" href="" ng-class="con.cssclass" ng-style="con.cssstyle" class="abtn ng-binding">Open above image</a>\n    </div>\n</div>\n</div><!-- end ngRepeat: (k,con) in item -->\n</div><!-- end ngIf: !typeOfCapagin(item) -->\n                                                    <!-- ngIf: typeOfCapagin(item) && item.length == 2 -->\n                                                    <!-- ngIf: typeOfCapagin(item) && item.length == 3 -->\n                                                </div><!-- end ngRepeat: (key, item) in lists.list1 -->\n                                            </div>\n                                        ', 20, 55),
(6, 'nj', 'nn', 'nj', 'nj@n.sd', 'HTML Email', '2015-12-22', '\n                                            <div tabindex="5001" style="overflow: hidden;" class="no-margn nicescroll todo-list scroll">\n                                                <style type="text/css">\n                                                    /*for template*/\n                                                    .drop\n                                                    {\n                                                        background-color:whitesmoke;\n                                                        margin: 5px,5px;\n                                                        min-height: 60px;\n                                                    }\n                                                    .notdisplayDel\n                                                    {\n                                                        display: none;\n                                                    }\n\n                                                    .imgPortable \n                                                    {\n                                                        max-height: 100%;\n                                                        max-width: 100%;\n                                                    }\n                                                    .abtn\n                                                    {\n                                                        border-radius: 2px;\n                                                        box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.1);\n                                                        font-family: "Nunito",sans-serif;\n                                                        letter-spacing: 0.2px;\n                                                        opacity: 0.93;\n                                                        display: inline-block;\n                                                        margin-bottom: 0px;\n                                                        font-weight: normal;\n                                                        text-align: center;\n                                                        vertical-align: middle;\n                                                        cursor: pointer;\n                                                        background-image: none;\n                                                        border: 1px solid transparent;\n                                                        white-space: nowrap;\n                                                        padding: 6px 12px;\n                                                        font-size: 14px;\n                                                        line-height: 1.42857;\n                                                        -moz-user-select: none;\n                                                    }\n\n                                                </style>\n                                                <!-- ngRepeat: (key, item) in lists.list1 --><div ng-repeat="(key, item) in lists.list1" class="col-sm-12 nestedDemo ng-scope">\n                                                    <!-- ngInclude: ctype --><div class="ng-scope" ng-include="ctype" dnd-list="item"><!-- ngIf: item.length == 0 -->\n<!-- ngRepeat: (k,con) in item --><!-- ngInclude: con.type --><div draggable="true" ng-repeat="(k,con) in item" dnd-draggable="con" dnd-effect-allowed="move" dnd-selected="lists.selected = con" dnd-moved="item.splice($index,1)" ng-include="con.type" style="text-decoration: none" class="dropzone2 ng-scope" ng-class="{selected: lists.selected === con}"><div class="drop ng-scope">\n    \n    <div draggable="true" class="ng-binding" ng-bind-html="con.data" style="padding: 15px;word-wrap: normal;" dnd-nodrag="">Add Header Info</div>\n</div>\n</div><!-- end ngRepeat: (k,con) in item -->\n</div>\n                                                </div><!-- end ngRepeat: (key, item) in lists.list1 --><div ng-repeat="(key, item) in lists.list1" class="col-sm-12 nestedDemo ng-scope">\n                                                    <!-- ngInclude: ctype --><div class="ng-scope" ng-include="ctype" dnd-list="item"><!-- ngIf: item.length == 0 -->\n<!-- ngRepeat: (k,con) in item --><!-- ngInclude: con.type --><div draggable="true" ng-repeat="(k,con) in item" dnd-draggable="con" dnd-effect-allowed="move" dnd-selected="lists.selected = con" dnd-moved="item.splice($index,1)" ng-include="con.type" style="text-decoration: none" class="dropzone2 ng-scope" ng-class="{selected: lists.selected === con}"><div class="drop ng-scope">\n    <div style="background-color: black;opacity: 0.5;position: absolute;width:96.5%" class="displayDel notdisplayDel" id="del">\n        <div style="float: right;">\n            <button type="button" ng-click="deleteWidget($event,key,k,k1)" class="del btn btn-small btn-inverse waves waves-light"><span class="fa fa-trash"></span></button>\n            <button type="button" ng-click="chktype(''image'',$event)" class="edit btn btn-small btn-inverse waves waves-light" btn-type="info" ng-init="type = info"><span class="fa fa-pencil"></span></button>\n        </div>\n    </div>\n    <div draggable="true" class="displayData" style="padding: 15px; text-align: center;" dnd-nodrag="" ng-style="con.divcss">\n        <img style="border-color: black; border-style: solid; border-width: 1px;" src="http://localhost/EmailMarketing/template/user/images/empty-image.png" alt="image" ng-style="con.cssstyle" class="imgPortable"><br>\n    </div>\n</div>\n</div><!-- end ngRepeat: (k,con) in item -->\n</div>\n                                                </div><!-- end ngRepeat: (key, item) in lists.list1 --><div ng-repeat="(key, item) in lists.list1" class="col-sm-12 nestedDemo ng-scope">\n                                                    <!-- ngInclude: ctype --><div class="ng-scope" ng-include="ctype" dnd-list="item"><!-- ngIf: item.length == 0 -->\n<!-- ngRepeat: (k,con) in item --><!-- ngInclude: con.type --><div draggable="true" ng-repeat="(k,con) in item" dnd-draggable="con" dnd-effect-allowed="move" dnd-selected="lists.selected = con" dnd-moved="item.splice($index,1)" ng-include="con.type" style="text-decoration: none" class="dropzone2 ng-scope" ng-class="{selected: lists.selected === con}"><div class="drop ng-scope" style="">\n<div style="background-color: black;opacity: 0.5;position: absolute;width:96.5%" class="notdisplayDel" id="del">\n    <div style="float: right;">\n        \n        <button type="button" ng-click="deleteWidget($event,key,k,k1)" class="del btn btn-small btn-inverse waves waves-light"><span class="fa fa-trash"></span></button>\n        <button type="button" ng-click="chktype(''btn'',$event)" class="edit btn btn-small btn-inverse waves waves-light" btn-type="info" ng-init="type = btn"><span class="fa fa-pencil"></span></button>\n    </div>\n</div>\n    <div draggable="true" ng-style="con.divcss" class="displayData" style="padding: 15px; min-height: 64px; text-align: center;" dnd-nodrag="">\n        <a style="border-color: black; border-style: solid; border-width: 1px; font-family: Times New Roman; color: rgb(255, 255, 255); font-size: 15px; background-color: rgb(51, 184, 108);" href="" ng-class="con.cssclass" ng-style="con.cssstyle" class="abtn ng-binding">Button</a>\n    </div>\n</div>\n</div><!-- end ngRepeat: (k,con) in item --><!-- ngInclude: con.type --><div draggable="true" ng-repeat="(k,con) in item" dnd-draggable="con" dnd-effect-allowed="move" dnd-selected="lists.selected = con" dnd-moved="item.splice($index,1)" ng-include="con.type" style="text-decoration: none" class="dropzone2 ng-scope" ng-class="{selected: lists.selected === con}"><div class="drop ng-scope">\n    <div style="background-color: black;opacity: 0.5;position: absolute;width:96.5%" class="notdisplayDel" id="del">\n        <div style="float: right;">\n            <button type="button" ng-click="deleteWidget($event, key, k,k1)" class="del btn btn-small btn-inverse waves waves-light"><span class="fa fa-trash"></span></button>\n            <button type="button" ng-click="chktype(''text'', $event)" class="edit btn btn-small btn-inverse waves waves-light" btn-type="info" ng-init="type = info"><span class="fa fa-pencil"></span></button>\n        </div>\n    </div>\n    <div draggable="true" class="ng-binding" ng-bind-html="con.data" style="padding: 15px;word-wrap: normal;" dnd-nodrag="">Add Footer Info</div>\n</div>\n</div><!-- end ngRepeat: (k,con) in item -->\n</div>\n                                                </div><!-- end ngRepeat: (key, item) in lists.list1 -->\n                                            </div>\n                                        ', 20, 57);

-- --------------------------------------------------------

--
-- Table structure for table `campaign_subscriber`
--

CREATE TABLE IF NOT EXISTS `campaign_subscriber` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `delivered` tinyint(1) DEFAULT NULL,
  `opened` tinyint(1) DEFAULT NULL,
  `OpenInCountry` int(11) DEFAULT NULL,
  `campaign_id` int(11) NOT NULL,
  `subscriber_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `OpenInCountry` (`OpenInCountry`),
  KEY `campaign_id` (`campaign_id`),
  KEY `subscriber_id` (`subscriber_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `campaign_subscriber`
--

INSERT INTO `campaign_subscriber` (`id`, `delivered`, `opened`, `OpenInCountry`, `campaign_id`, `subscriber_id`) VALUES
(8, 0, 0, NULL, 5, 25),
(9, 0, 0, NULL, 5, 28),
(10, 0, 0, NULL, 5, 31),
(11, 0, 0, NULL, 6, 25),
(12, 0, 0, NULL, 6, 28),
(13, 0, 0, NULL, 6, 31);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `state_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `state_id` (`state_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `state_id`) VALUES
(1, 'Surat', 1),
(2, 'Ahemadabad', 1),
(3, 'Mumbai', 2),
(4, 'Pune', 2);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(1, 'India'),
(2, 'USA'),
(3, 'Pakistan'),
(4, 'China'),
(5, 'England'),
(6, 'Russia'),
(7, 'Brazil'),
(8, 'South Africa'),
(9, 'Australiya'),
(10, 'Srilanka'),
(11, 'Bangladesh'),
(13, 'Canada');

-- --------------------------------------------------------

--
-- Table structure for table `group_subscriber`
--

CREATE TABLE IF NOT EXISTS `group_subscriber` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `subscriber_id` int(11) NOT NULL,
  `AddingTime` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `subscriber_id` (`subscriber_id`),
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `group_subscriber`
--

INSERT INTO `group_subscriber` (`id`, `group_id`, `subscriber_id`, `AddingTime`) VALUES
(13, 3, 13, '2015-12-21 21:47:04'),
(14, 3, 14, '2015-12-21 21:47:04'),
(15, 3, 15, '2015-12-21 21:47:04'),
(16, 3, 16, '2015-12-21 21:47:04'),
(17, 3, 17, '2015-12-21 21:47:04'),
(18, 3, 18, '2015-12-21 21:47:04'),
(19, 3, 19, '2015-12-21 21:47:04'),
(20, 3, 20, '2015-12-21 21:47:05'),
(21, 3, 21, '2015-12-21 21:47:05'),
(22, 3, 22, '2015-12-21 21:47:05'),
(24, 3, 24, '2015-12-21 21:47:05'),
(25, 3, 25, '2015-12-21 21:47:05'),
(26, 3, 26, '2015-12-21 21:47:05'),
(27, 3, 27, '2015-12-21 21:47:05'),
(28, 3, 28, '2015-12-21 21:47:05'),
(29, 3, 29, '2015-12-21 21:47:05'),
(30, 3, 30, '2015-12-21 21:47:05'),
(31, 2, 25, '2015-12-21 21:47:39'),
(32, 2, 28, '2015-12-21 21:48:07'),
(33, 2, 31, '2015-12-21 21:48:36'),
(34, 5, 32, '2015-12-22 06:18:56');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(1500) NOT NULL,
  `creationTime` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`, `creationTime`, `user_id`) VALUES
(2, 'Close Friends', 'Nearest Friends', '2015-12-21 03:28:44', 20),
(3, 'College Friends', 'J p Dawer College', '2015-12-21 03:29:16', 20),
(4, 'Facebook Friends', 'Conatain all type of friends', '2015-12-21 03:30:27', 20),
(5, 'yahoo Contect', 'Yahoo Email id', '2015-12-21 03:31:10', 20);

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE IF NOT EXISTS `plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `maximum_subscriber` int(11) NOT NULL,
  `maximum_mail` int(11) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`id`, `name`, `maximum_subscriber`, `maximum_mail`, `duration`, `price`, `description`) VALUES
(46, 'Free Plan', 100, 500, '28 day', 0, NULL),
(50, 'Diwali Special', 1000, 7800, '2 month', 500, NULL),
(53, 'Crismas Dhamaka', 1500, 10000, '3 month', 550, 'Hello'),
(54, 'Testing Plan', 20, 5, '2 day', 1, 'Testing purpose');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `name`, `country_id`) VALUES
(1, 'Gujarat', 1),
(2, 'Maharastra', 1),
(8, 'Jhonish burg', 8),
(9, 'Punjab', 3),
(10, 'Punjab', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE IF NOT EXISTS `subscriber` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(1500) NOT NULL,
  `RegistrationTime` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `subscriber`
--

INSERT INTO `subscriber` (`id`, `fname`, `lname`, `email`, `RegistrationTime`, `user_id`) VALUES
(13, 'Mikinj', '', 'mikinj.mistry@gmail.com', '2015-12-21 21:47:04', 20),
(14, 'Shashank', '', 'shashankpatel811@gmail.com', '2015-12-21 21:47:04', 20),
(15, 'Siddharth', '', 'sarfalesiddharth@gmail.com', '2015-12-21 21:47:04', 20),
(16, 'Pavan', '', 'patel172@gmail.com', '2015-12-21 21:47:04', 20),
(17, 'Lalit', '', 'lalittarsariya37@gmail.com', '2015-12-21 21:47:04', 20),
(18, 'Avinash', '', 'odavinash2506@gmail.com', '2015-12-21 21:47:04', 20),
(19, 'Abhay', '', 'patelabhay440@yahoo.in', '2015-12-21 21:47:04', 20),
(20, 'Parul', '', 'parul920.solanki@gmail.com', '2015-12-21 21:47:05', 20),
(21, 'Divya', '', 'divpatel.075@gmail.com', '2015-12-21 21:47:05', 20),
(22, 'Taruna', '', 'pateltaruna.148@gmail.com', '2015-12-21 21:47:05', 20),
(24, 'Siddharth', '', 'sarfalesiddharth@outlook.com', '2015-12-21 21:47:05', 20),
(25, 'Mikinj', 'Mistry', 'mikinj.mistry@yahoo.com', '2015-12-21 21:47:05', 20),
(26, 'Mikinj', '', 'mikinj.mistry@zoho.com', '2015-12-21 21:47:05', 20),
(27, 'Mikinj', '', 'mikinj.mistry@yandex.com', '2015-12-21 21:47:05', 20),
(28, 'Ashish', 'Rana', 'ashisharana@yahoo.com', '2015-12-21 21:47:05', 20),
(29, 'Mikinj', '', 'mikinj.mistry@hotmail.com', '2015-12-21 21:47:05', 20),
(30, 'Pinki', '', 'pinkyshirawala@gmail.com', '2015-12-21 21:47:05', 20),
(31, 'Siddharth', 'Sarfale', 'sarfalesiddharth@yahoo.com', '2015-12-21 21:48:36', 20),
(32, 'Fenil', 'Mistry', 'fenilmistry24@gmail.com', '2015-12-22 06:18:56', 20),
(33, 'Mikinj', '', 'mikinj.mistry@gmail.com', '2015-12-23 03:03:03', 23),
(34, 'Shashank', '', 'shashankpatel811@gmail.com', '2015-12-23 03:03:03', 23),
(35, 'Siddharth', '', 'sarfalesiddharth@gmail.com', '2015-12-23 03:03:03', 23),
(36, 'Pavan', '', 'patel172@gmail.com', '2015-12-23 03:03:03', 23),
(37, 'Lalit', '', 'lalittarsariya37@gmail.com', '2015-12-23 03:03:03', 23),
(38, 'Avinash', '', 'odavinash2506@gmail.com', '2015-12-23 03:03:03', 23),
(39, 'Abhay', '', 'patelabhay440@yahoo.in', '2015-12-23 03:03:04', 23),
(40, 'Parul', '', 'parul920.solanki@gmail.com', '2015-12-23 03:03:04', 23),
(41, 'Divya', '', 'divpatel.075@gmail.com', '2015-12-23 03:03:04', 23),
(42, 'Taruna', '', 'pateltaruna.148@gmail.com', '2015-12-23 03:03:04', 23),
(43, 'Ami', '', 'akupatel159@gmail.com', '2015-12-23 03:03:04', 23),
(44, 'Siddharth', '', 'sarfalesiddharth@outlook.com', '2015-12-23 03:03:04', 23),
(45, 'Mikinj', '', 'mikinj.mistry@yahoo.com', '2015-12-23 03:03:04', 23),
(46, 'Mikinj', '', 'mikinj.mistry@zoho.com', '2015-12-23 03:03:04', 23),
(47, 'Mikinj', '', 'mikinj.mistry@yandex.com', '2015-12-23 03:03:04', 23),
(48, 'Ashish', '', 'ashisharana@yahoo.com', '2015-12-23 03:03:04', 23),
(49, 'Mikinj', '', 'mikinj.mistry@hotmail.com', '2015-12-23 03:03:04', 23),
(50, 'Pinki', '', 'pinkyshirawala@gmail.com', '2015-12-23 03:03:04', 23);

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE IF NOT EXISTS `template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `model` text NOT NULL,
  `creationTime` datetime NOT NULL,
  `type` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`id`, `name`, `model`, `creationTime`, `type`, `user_id`) VALUES
(53, 'Ganesha', '{\n  "column0": [\n    {\n      "data": "<div align=\\"center\\"><h2>Happy Ganesh Chaturthi</h2></div>",\n      "type": "http://localhost/EmailMarketing/template/paging/text.php",\n      "info": "Text"\n    }\n  ],\n  "column1": [\n    {\n      "data": "Upload Image",\n      "type": "http://localhost/EmailMarketing/template/paging/image.php",\n      "sc": "http://localhost/EmailMarketing/template/BasicTemplate/20/img/img_4170.jpg",\n      "thumbnil": "http://localhost/EmailMarketing/template/BasicTemplate/20/thumbnil/img_4170.jpg",\n      "info": "Image",\n      "cssstyle": {\n        "border-color": "#800000",\n        "border-style": "double",\n        "border-width": 11\n      },\n      "divcss": {\n        "text-align": "center"\n      }\n    }\n  ],\n  "column3": [\n    {\n      "data": "Open above image",\n      "info": "Button",\n      "type": "http://localhost/EmailMarketing/template/paging/Button.php",\n      "class": "btnicon",\n      "cssclass": "",\n      "cssstyle": {\n        "border-color": "black",\n        "border-style": "solid",\n        "border-width": 1,\n        "font-family": "Times New Roman",\n        "color": "#ffffff",\n        "font-size": 15,\n        "background-color": "#33b86c"\n      },\n      "fileurl": "",\n      "divcss": {\n        "text-align": "center"\n      }\n    }\n  ]\n}', '2015-12-21 21:41:51', 'save', 20),
(54, 'Simple Template', '{\n  "column0": [\n    {\n      "data": "<h3 align=\\"center\\">Template</h3>",\n      "info": "Text",\n      "type": "http://localhost/EmailMarketing/template/paging/text.php",\n      "class": "text"\n    },\n    {\n      "data": "Open Bellow Images",\n      "info": "Button",\n      "type": "http://localhost/EmailMarketing/template/paging/Button.php",\n      "class": "btnicon",\n      "cssclass": "",\n      "cssstyle": {\n        "border-color": "black",\n        "border-style": "solid",\n        "border-width": 1,\n        "font-family": "Algerian",\n        "color": "#ffffff",\n        "font-size": 15,\n        "background-color": "#33b86c",\n        "width": "100%"\n      },\n      "fileurl": "http://localhost/EmailMarketing/template/BasicTemplate/20/img/img_1802.jpg",\n      "divcss": {\n        "text-align": "center"\n      }\n    }\n  ],\n  "column1": [\n    [\n      {\n        "data": "Image Description<br>",\n        "info": "Image caption",\n        "type": "http://localhost/EmailMarketing/template/paging/imageCap.php",\n        "sc": "http://localhost/EmailMarketing/template/BasicTemplate/20/img/img_5517.jpg",\n        "class": "imgcap",\n        "thumbnil": "http://localhost/EmailMarketing/template/BasicTemplate/20/thumbnil/img_5517.jpg",\n        "cssstyle": {\n          "border-color": "black",\n          "border-style": "solid",\n          "border-width": 1\n        },\n        "divcss": {\n          "text-align": "center"\n        }\n      }\n    ],\n    [\n      {\n        "data": "Upload New image",\n        "info": "Image",\n        "type": "http://localhost/EmailMarketing/template/paging/image.php",\n        "sc": "http://localhost/EmailMarketing/template/BasicTemplate/20/img/img_1802.jpg",\n        "thumbnil": "http://localhost/EmailMarketing/template/BasicTemplate/20/thumbnil/img_1802.jpg",\n        "class": "img",\n        "cssstyle": {\n          "border-color": "black",\n          "border-style": "solid",\n          "border-width": 1\n        },\n        "divcss": {\n          "text-align": "center"\n        }\n      }\n    ]\n  ],\n  "column2": []\n}', '2015-12-21 21:44:11', 'save', 20),
(55, 'Ganesha', '{\n  "column0": [\n    {\n      "data": "<div align=\\"center\\"><h2>Happy Ganesh Chaturthi</h2></div>",\n      "type": "http://localhost/EmailMarketing/template/paging/text.php",\n      "info": "Text"\n    }\n  ],\n  "column1": [\n    {\n      "data": "Upload Image",\n      "type": "http://localhost/EmailMarketing/template/paging/image.php",\n      "sc": "http://localhost/EmailMarketing/template/BasicTemplate/20/img/img_4170.jpg",\n      "thumbnil": "http://localhost/EmailMarketing/template/BasicTemplate/20/thumbnil/img_4170.jpg",\n      "info": "Image",\n      "cssstyle": {\n        "border-color": "#800000",\n        "border-style": "double",\n        "border-width": 11\n      },\n      "divcss": {\n        "text-align": "center"\n      }\n    }\n  ],\n  "column3": [\n    {\n      "data": "Open above image",\n      "info": "Button",\n      "type": "http://localhost/EmailMarketing/template/paging/Button.php",\n      "class": "btnicon",\n      "cssclass": "",\n      "cssstyle": {\n        "border-color": "black",\n        "border-style": "solid",\n        "border-width": 1,\n        "font-family": "Times New Roman",\n        "color": "#ffffff",\n        "font-size": 15,\n        "background-color": "#33b86c"\n      },\n      "fileurl": "",\n      "divcss": {\n        "text-align": "center"\n      }\n    }\n  ]\n}', '2015-12-21 22:03:09', '', 20),
(56, 'Amrita', '{\n  "column0": [],\n  "column1": [\n    {\n      "data": "Upload Image",\n      "type": "http://localhost/EmailMarketing/template/paging/image.php",\n      "sc": "http://localhost/EmailMarketing/template/BasicTemplate/22/img/img_5327.jpg",\n      "thumbnil": "http://localhost/EmailMarketing/template/BasicTemplate/22/thumbnil/img_5327.jpg",\n      "info": "Image",\n      "cssstyle": {\n        "border-color": "#ff0080",\n        "border-style": "ridge",\n        "border-width": 15\n      },\n      "divcss": {\n        "text-align": "center"\n      }\n    }\n  ],\n  "column3": []\n}', '2015-12-22 05:18:34', 'save', 22),
(57, 'nj', '{\n  "column0": [\n    {\n      "data": "Add Header Info",\n      "type": "http://localhost/EmailMarketing/template/paging/text.php",\n      "info": "Text"\n    }\n  ],\n  "column1": [\n    {\n      "data": "Upload Image",\n      "type": "http://localhost/EmailMarketing/template/paging/image.php",\n      "sc": "http://localhost/EmailMarketing/template/user/images/empty-image.png",\n      "thumbnil": "http://localhost/EmailMarketing/template/user/images/empty-image.png",\n      "info": "Image",\n      "cssstyle": {\n        "border-color": "black",\n        "border-style": "solid",\n        "border-width": 1\n      },\n      "divcss": {\n        "text-align": "center"\n      }\n    }\n  ],\n  "column3": [\n    {\n      "data": "Button",\n      "info": "Button",\n      "type": "http://localhost/EmailMarketing/template/paging/Button.php",\n      "class": "btnicon",\n      "cssclass": "",\n      "cssstyle": {\n        "border-color": "black",\n        "border-style": "solid",\n        "border-width": 1,\n        "font-family": "Times New Roman",\n        "color": "#ffffff",\n        "font-size": 15,\n        "background-color": "#33b86c"\n      },\n      "fileurl": "",\n      "divcss": {\n        "text-align": "center"\n      }\n    },\n    {\n      "data": "Add Footer Info",\n      "type": "http://localhost/EmailMarketing/template/paging/text.php",\n      "info": "Text"\n    }\n  ]\n}', '2015-12-22 19:42:55', '', 20);

-- --------------------------------------------------------

--
-- Table structure for table `trackreport`
--

CREATE TABLE IF NOT EXISTS `trackreport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `word_id` int(11) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `campaign_id` (`campaign_id`),
  KEY `word_id` (`word_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `trackword`
--

CREATE TABLE IF NOT EXISTS `trackword` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `word` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `trackword`
--

INSERT INTO `trackword` (`id`, `word`) VALUES
(2, 'bomb'),
(3, 'Harami'),
(5, 'horror'),
(6, 'terrorist');

-- --------------------------------------------------------

--
-- Table structure for table `user_plan`
--

CREATE TABLE IF NOT EXISTS `user_plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `activation_date` date NOT NULL,
  `email_sent` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `plan_id` (`plan_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `user_plan`
--

INSERT INTO `user_plan` (`id`, `user_id`, `plan_id`, `activation_date`, `email_sent`) VALUES
(9, 20, 46, '2015-12-20', 3),
(10, 20, 54, '2015-12-21', 3),
(11, 22, 46, '2015-12-22', 0),
(12, 23, 46, '2015-12-22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `IsActivated` tinyint(1) NOT NULL,
  `RegisteredTime` datetime NOT NULL,
  `workforce` int(11) DEFAULT NULL,
  `age_Organization` int(11) DEFAULT NULL,
  `name_organization` varchar(255) DEFAULT NULL,
  `website` varchar(1000) DEFAULT NULL,
  `address` varchar(5000) DEFAULT NULL,
  `type_organization` varchar(255) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `profile_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `city_id` (`city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fname`, `lname`, `password`, `email`, `IsActivated`, `RegisteredTime`, `workforce`, `age_Organization`, `name_organization`, `website`, `address`, `type_organization`, `city_id`, `profile_status`) VALUES
(20, 'Mikinj Mistry', 'Mikinj', 'Mistry', '12', 'me.mikinj@gmail.com', 1, '2015-12-21 03:27:07', 10, NULL, NULL, 'BulkEmail', NULL, NULL, NULL, 0),
(22, 'Mikinj', NULL, NULL, '123', 'mikinj.mistry@zoho.com', 1, '2015-12-22 04:09:30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(23, 'Ashish Rana', 'Ashish', 'Rana', '123', 'ashisharana@yahoo.com', 1, '2015-12-22 06:11:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `campaign`
--
ALTER TABLE `campaign`
  ADD CONSTRAINT `campaign_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `campaign_ibfk_2` FOREIGN KEY (`template_id`) REFERENCES `template` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `campaign_subscriber`
--
ALTER TABLE `campaign_subscriber`
  ADD CONSTRAINT `campaign_subscriber_ibfk_1` FOREIGN KEY (`OpenInCountry`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `campaign_subscriber_ibfk_2` FOREIGN KEY (`campaign_id`) REFERENCES `campaign` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `campaign_subscriber_ibfk_3` FOREIGN KEY (`subscriber_id`) REFERENCES `subscriber` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `group_subscriber`
--
ALTER TABLE `group_subscriber`
  ADD CONSTRAINT `group_subscriber_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `group_subscriber_ibfk_2` FOREIGN KEY (`subscriber_id`) REFERENCES `subscriber` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `state`
--
ALTER TABLE `state`
  ADD CONSTRAINT `state_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subscriber`
--
ALTER TABLE `subscriber`
  ADD CONSTRAINT `subscriber_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `template`
--
ALTER TABLE `template`
  ADD CONSTRAINT `template_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trackreport`
--
ALTER TABLE `trackreport`
  ADD CONSTRAINT `trackreport_ibfk_1` FOREIGN KEY (`word_id`) REFERENCES `trackword` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trackreport_ibfk_2` FOREIGN KEY (`campaign_id`) REFERENCES `campaign` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_plan`
--
ALTER TABLE `user_plan`
  ADD CONSTRAINT `user_plan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_plan_ibfk_2` FOREIGN KEY (`plan_id`) REFERENCES `plan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
