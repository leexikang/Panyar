<?php
require('config/initRequire.php');

use Panyar\Course;

?>
    <section class="main" >
<?php require("config/clientNav.php"); ?>

    <section class="content">
	<br/><br/><br/>
    <table>
        <tr>
            <td class='number'>No.  </td>
            <td colspan="2" class='courseName'> CourseName </td>
    </tr>
    <tr>
<?php
$courseObj = new Course();
$courses = $courseObj->fetchByOwner( $_SESSION['id'] );
$num = 0; 
foreach ( $courses as $course ){
    $num ++;

?>
    <td class='number'> <?php echo $num ?> </td>
    <td class='courseName'> <?php echo $course->courseName ?> </td>
    <td class='view'> <a href="showCourse.php?id=<?php echo $course->courseId ?>" > View </a> </td>
</tr>
<?php
}
?>

    </table>

		</section>
		</section>

<?php


require("config/footer.php");

?>
