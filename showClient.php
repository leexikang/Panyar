<?php

require('vendor/autoload.php');
require('config/helperFunction.php');
session_start();
require("config/header.php");
use Panyar\User;
use Panyar\Course;

?>

 <section class="main" >
    <article>


  </article>
    <section class="content" >
<?php
    if( isset ($_GET['name'] ) ){

        $courseObj = new Course();
        $courses = $courseObj->fetchByClient( $_GET['name'] );
    foreach( $courses as $course ){

    $clientName = $course->username;
?>

        <div class="element">
        <img  src="<?php echo $course->photo ?>">
        <span><?php echo $course->courseName ?> </span> <br/>
        <span><?php echo substr($course->startTime, 0,5) . ' to ' . substr( $course->endTime, 0, 5 ) ?> </span> <br/>
        <span> <?php echo $course->startDate . ' to ' . $course->endDate ?></span> <br/>
        <span> <a href= "showCourse.php?id=<?php echo $course->courseId; ?>"> View Details </a> </span>
        </div>
<?php
    }
    }else{
        header('location: /');
    }
?>
 <button> <a href='index.php'> Back </a> </button>
  </section>


    </section>
<?php
require("config/footer.php");
?>


