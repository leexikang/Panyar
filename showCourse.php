<?php
require("config/header.php");
require('vendor/autoload.php');
require('config/helperFunction.php');

use Panyar\Course;

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
    <a href='' class='first' > Back </a>
    <a href=#'> Edit </a>
    <a href='#'> Delete </a>
    </div>

        </section>

		</section>

<?php


require("config/footer.php");

?>
