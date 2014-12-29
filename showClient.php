<?php

require('config/initRequire.php');
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
 <button> <a href='/'> Back </a> </button> 
  </section>


    </section>
<?php
require("config/footer.php");
?>


