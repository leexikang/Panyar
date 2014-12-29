<?php

require('vendor/autoload.php');
require('config/helperFunction.php');
session_start();

require("config/header.php");


use Panyar\Category;
use Panyar\Course;

?>

 <section class="main" >
    <article>

<?php

$categoryObj = new Category();
$categories  = $categoryObj->fetchAll();
echo "<ul class='category'> " ;

foreach ( $categories as $category ){

    $categoryName = $category->categoryName;
    echo '<li>  <a href="index.php?name=' . $categoryName .' "> ' .$categoryName . '</a> </li>';

}

echo '</ul>';

$courseObj = new Course();
if ( isset( $_GET['name'] ) ) {

 $name = $_GET['name'];
 $courses = $courseObj->FetchByCategory( $name );

}else{

    $courses = $courseObj->fetchJointAll();

}

?>
    </article>
    <section class="content" >
<?php

foreach( $courses as $course ){

    $clientName = $course->username;
?>

        <div class="element">
        <img  src="<?php echo $course->photo ?>">
        <span><?php echo $course->courseName ?> </span> <br/>
        <span><?php echo substr($course->startTime, 0,5) . ' to ' . substr( $course->endTime, 0, 5 ) ?> </span> <br/>
        <span> <?php echo $course->startDate . ' to ' . $course->endDate ?></span> <br/>
        <span> <a href="showClient.php?name=<?php echo $clientName ?>"> <?php echo $clientName ?> </a>  </span> <br/> 
        <span> <a href= "showCourse.php?id=<?php echo $course->courseId; ?>"> View Details </a> </span>
        </div>
<?php
}
?>
  </section>


    </section>
<?php
require("config/footer.php");
?>


