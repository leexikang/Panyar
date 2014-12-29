<?php
use Panyar\Course;
require('vendor/autoload.php');
require('config/helperFunction.php');
session_start();
require("config/header.php");

if( isset ( $_GET['id'] ) ){

    $id = $_GET['id'];

    $courseObj = new Course();
    $course = $courseObj->fetchById( $id );
}

?>
    <section class="main" >

    <section class="content">
    
    <div class='info'>
    <table>
<?php 
createAnswer( 'Course Name', $course->courseName);
createAnswer( 'Description', $course->description);
createAnswer( 'note', $course->note);
createAnswer( 'fee', $course->fee);
$time = substr($course->startTime, 0,5) . ' to ' . substr( $course->endTime, 0, 5 );
createAnswer( 'time', $time);
$date  = $course->startDate . ' to ' . $course->startDate;
createAnswer( 'Duration', $date);

?>
    </table>
    <br/>
<?php if( checkSession() ){ ?>
    <a href='showAllCourses.php' class='first' > Back </a>
    <a href="editCourse.php?id=<?php echo $course->courseId ?>"> Edit </a>
    <a href="deleteCourse.php?id=<?php echo $course->courseId ?>" > Delete </a>
<?php } else{ ?>
    <a href='/' class='first' > Back </a>
<?php  } ?>
    </div>

        </section>

        </section>

<?php


require("config/footer.php");


?>
<script type="text/javascript" src='script/app.js' >
</script>
