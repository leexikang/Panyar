<?php
require('config/initRequire.php');
use Panyar\Course;

if( $_GET['id'] ) {

    $courseObj =  new Course();

    $course = $courseObj->fetchById(  $_GET['id'] );

    $courseId = $course->courseId;
    $courseName = $course->courseName;
    $description = $course->description;
    $startTime = $course->startTime;
    $endTime = $course->endTime;
    $startDate = $course->startDate;
    $endDate = $course->endDate;
    $fee = $course->fee;
    $note = $course->note;
    $path = $course->photo;

}

$action = 'edit';
require('config/FormController.php');

require('config/CourseForm.php');
require('config/footer.php');

