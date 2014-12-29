<?php
require('config/initRequire.php');
use Panyar\Course;

if ( isset( $_GET['id'] ) ) {

$course = new Course;
$course->deleteById( $_GET['id'] );

}
header('location: showAllCourses.php');

