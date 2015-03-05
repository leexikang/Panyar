<?php

$DBuser = 'root';
$DBpassword = 'root';
	$connm = new PDO("mysql:localhost", $DBuser, $DBpassword );
	$sql = "CREATE DATABASE panyar";
	if($connm->query($sql) ){
        echo "panyar database has been created <br/>";
	}else{
		echo "can't not create panyar database <br/>";
    }
    echo 'hola';
    $conn = new PDO("mysql:host=localhost;dbname=panyar", $DBuser, $DBpassword);


/// admin Table ///
	$sql= "CREATE TABLE `admin` (
		`adminId` int(11) NOT NULL,
		`adminName` varchar(40) DEFAULT NULL,
		`password` varchar(40) DEFAULT NULL,
		PRIMARY KEY (`adminId`)
    )";
    echo 'min';
	checktable($conn, $sql, 'admin');

	$sql = "INSERT INTO `admin` VALUES (1,'MinSan','1234');";

	checkinput($conn, $sql, 'admin');

/// Category Table ///
	$sql = "CREATE TABLE `category` (
  `categoryId` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`categoryId`)
    )";
	checktable($conn, $sql, 'category');

    $sql = "INSERT INTO `category` VALUES (1,'Programming'),(2,'Business Development'),(3,'English learning'),(4,'Science '),(5,'Graphic Design'),(6,'Computer Basic'),(7,'Video Editing'),(8,'Photographing')";
    checkinput($conn, $sql, 'category');

	$sql = "CREATE TABLE `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) DEFAULT NULL,
  `address` varchar(40) NOT NULL,
  `password` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `intro` text NOT NULL,
  PRIMARY KEY (`id`) )";

    checktable($conn, $sql, 'client');

    $sql = "INSERT INTO `client` VALUES (1,'IBCT','Thit Sa','123','ibct@gmail.com',''),(2,'MCC','Mha Road','123','MCC@gmail.com',''),(3,'KMD','Min Nar Road','123','KMD@gmail.com','Best Traning Center In Myanmar '),(4,'MAD','Kin Ha Road','123','MAD@gmail.com',''),(5,'I-NET','That Pang Road','123','inet@gmail.com',''),(6,'BCT','That Pang Road','123','IBCT@gmail.com','Best Services For Your Future'),(7,'G-Link','Greant Road','123','glink@gmail.com',''),(8,'Trion','Tida Min Road','123','Trion@gmail.com',''),(9,'MIT','Shwe Phy Pala Zar','123','MIT@gmail.com',''),(10,'Zan','Thit Sa','123','zan@gmail.com',''),(11,'Kang','','123','kang@gmail.com','');";
        checkinput($conn, $sql, 'client');



    $sql = " CREATE TABLE `course` (
  `courseId` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) DEFAULT NULL,
  `courseName` varchar(50) DEFAULT NULL,
  `categoryId` int(11) DEFAULT NULL,
  `description` text,
  `note` text,
  `startTime` time DEFAULT NULL,
  `endTime` time DEFAULT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `fee` int(11) NOT NULL,
  `photo` varchar(80) NOT NULL,
  PRIMARY KEY (`courseId`),
  KEY `id` (`id`),
  KEY `categoryId` (`categoryId`),
  CONSTRAINT `course_ibfk_1` FOREIGN KEY (`id`) REFERENCES `client` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `course_ibfk_2` FOREIGN KEY (`categoryId`) REFERENCES `category` (`categoryId`) ON DELETE CASCADE ON UPDATE CASCADE)";
   checktable($conn, $sql, 'course');
    $sql = "INSERT INTO `course` VALUES (1,1,'Java Web Development ',1,'','','13:00:00','15:30:00','2015-03-20','2015-06-20',30000,'image/web-development-design.jpg'),(2,1,'Video Editing Basic',7,'','','12:30:00','15:30:00','2015-06-20','2015-10-20',120000,'image/Free-Video-Editing.jpg'),(3,1,'Advance PHP Web Development',1,'','','12:30:00','14:30:00','2015-01-21','2015-06-21',18000,'image/web-development.jpg'),(4,1,'Web Development With Django',1,'','','09:30:00','11:00:00','2015-09-05','2015-12-05',45000,'image/python-im-web-django-1-728.jpg'),(5,1,'Graphic Design With Adobe illustrator',7,'','','10:30:00','12:00:00','2015-01-21','2015-06-21',1800000,'image/670px-Become-a-Graphic-Designer-Step-02.jpg'),(6,1,'Graphic Design Advance',5,'','','10:30:00','12:00:00','2015-01-20','2015-06-20',2500000,'image/graphic_banner.jpg'),(7,2,'ROR Advance Web Development',1,'','','12:30:00','14:00:00','2015-06-20','2015-06-20',12000,'image/companies-using-ruby-on-rails.jpg'),(8,2,'Django Web App Basic',1,'','','09:30:00','11:00:00','2015-03-20','2015-06-20',120000,'image/django-logo-negative.png'),(9,2,'Basic Photography',8,'','','09:30:00','14:00:00','2015-01-21','2015-06-20',12000000,'image/Close-up-of-photographer--008.jpg'),(10,3,'Web Development With ROR',1,'','','12:30:00','14:00:00','2015-01-20','2015-09-20',200000,'image/companies-using-ruby-on-rails.jpg'),(11,4,'IELTS',3,'','','09:30:00','12:00:00','2015-03-20','2015-06-20',1800000,'image/ielts-b.jpg'),(12,4,'',3,'','','12:30:00','14:30:00','2015-06-20','2015-06-20',1800000,'image/IELTS_OfficialTestCentre_logo.jpg'),(13,10,'English learning ',3,'','','09:30:00','12:00:00','2015-09-20','2015-09-20',120000,'image/learn-english-online-in-bangkok.png'),(14,3,'Photography Basic',8,'','','12:30:00','14:30:00','2015-03-20','2015-06-20',205000,'image/o-TRAVEL-PHOTOGRAPHY-facebook.jpg'),(15,4,'Computer ',6,'','','09:30:00','11:00:00','2015-06-20','2015-09-20',12000,'image/onlinecomputercourse.jpg'),(16,5,'IELTS',3,'','','09:30:00','11:00:00','2015-01-20','2015-03-20',3000,'image/english-is-fun.jpg'),(17,5,'Video Editing Advance',7,'','','12:30:00','14:30:00','2015-03-20','2015-06-20',1400000,'image/video.jpg'),(18,6,'Photography Advance',8,'','','12:30:00','14:30:00','2015-12-20','2015-12-20',1800000,'image/learn-how-to-take-better-pictures.jpg'),(19,6,'Microsoft Office',6,'','','09:30:00','12:00:00','2015-02-20','2015-06-20',1800000,'image/26_10_2013_14_03_00_mb3sh5bfavfmv3ln174qsfl591_77irhljis7.jpg'),(20,6,'Computer Basic',6,'','','10:30:00','12:00:00','2015-03-20','2015-06-20',1800000,'image/Hcom-Academy-Short-Course-Basic-Computer1-450x306.jpg'),(21,7,'Photography with Adobe',8,'','','09:30:00','14:00:00','2015-09-20','2015-09-20',120000,'image/a-guide-to-video-editing-on-the-mac-1.jpg'),(22,7,'Advance Video Editing',7,'','','18:00:00','20:00:00','2015-09-20','2015-09-20',120000,'image/video.jpg'),(23,8,'Advance Web Development',1,'','','09:30:00','14:00:00','2015-06-20','2015-09-20',120000,'image/web-development (1).jpg'),(24,9,'Video Editing Advance',7,'','','13:00:00','15:30:00','2015-06-20','2015-06-20',1800000,'image/a-guide-to-video-editing-on-the-mac-1.jpg'),(25,9,'PHP Web Development',1,'','','10:30:00','12:00:00','2015-01-20','2015-06-20',20000,'image/webdevelopmentbanner.png'),(26,9,'Learning English For Kid ',3,'','','12:30:00','14:00:00','2015-06-20','2015-09-20',2000,'image/images.jpg'),(27,8,'Basic Web Development',1,'','','09:30:00','14:00:00','2016-01-20','2016-01-20',120000,'image/webdevelopmentbanner.png'),(28,8,'Agile',2,'','','09:30:00','14:00:00','2015-06-20','2015-06-20',120000,'image/agile_banner.jpg'),(29,10,'Business Mangement',2,'','','09:30:00','14:00:00','2015-06-20','2015-09-20',120000,'image/business-management.jpg'),(30,10,'Programming with Python',1,'','','09:30:00','14:00:00','2015-09-20','2016-01-20',120000,'image/Python-Programming-Language.png');";
    checkinput( $conn, $sql, 'course');


    $sql = "CREATE TABLE `payment` (
  `paymentId` int(11) NOT NULL AUTO_INCREMENT,
  `paymentType` varchar(30) DEFAULT NULL,
  `pincode` varchar(20) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  PRIMARY KEY (`paymentId`),
  KEY `id` (`id`),
  CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`id`) REFERENCES `client` (`id`) ON DELETE CASCADE ON UPDATE CASCADE)";
    checktable( $conn, $sql,'payment');

    $sql = "INSERT INTO `payment` VALUES (2,'Visa','1321341231',1),(3,'Visa','1231232412',1),(4,'Visa','123214142',1),(5,'paypal','1231141241241',10),(6,'visa','123141241241',11);";
    checkinput( $conn, $sql, 'payment');

$sql = "CREATE TABLE `report` (
  `id` int(11) NOT NULL DEFAULT '0',
  `joinDate` date NOT NULL DEFAULT '0000-00-00',
  `paymentExpireDate` date DEFAULT NULL,
  PRIMARY KEY (`id`,`joinDate`),
  CONSTRAINT `report_ibfk_1` FOREIGN KEY (`id`) REFERENCES `client` (`id`) ON DELETE CASCADE ON UPDATE CASCADE)";

    checktable( $conn, $sql, 'report');

    $sql = "INSERT INTO `report` VALUES (1,'2014-12-02','2015-01-03'),(2,'2014-12-05','2015-01-16'),(3,'2013-04-00','2015-04-23'),(4,'2013-12-17','2016-04-23'),(5,'2013-05-01','2015-08-01'),(6,'2013-08-01','2015-09-18'),(7,'2013-04-10','2015-11-21'),(8,'2013-05-01','2016-03-11'),(9,'2011-05-04','2016-03-18'),(10,'2013-09-04','2015-09-11');";
    checkinput( $conn, $sql, 'report');


    function checktable($config,$sqlstat, $tablename){
        if($config->query($sqlstat)){
            echo $tablename." has been created. <br/>";
        }else{
            echo "can't create ". $tablename . " table <br/>";
        }
    }

    function checkinput($config, $sqlstat, $table){
        if($config->query($sqlstat)){
            echo " data has been added to". $table ." <br/>";
        }else{
            echo "can't create insert data into ". $table . " table <br/>";
        }
    }
?>
