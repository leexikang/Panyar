<?php
require("vendor/autoload.php");
require("config/header.php");
?>

 <section class="main" >


    <article >
     <ul class="category">
    <li> <br/> <a href="#">Web Development</a> </li>
    <li> <br/> <a href="#">Bussiness Management </a> </li>
                    <li> <br/> <a href="#">Web Development</a> </li>
    <li> <br/> <a href="#">Bussiness Management </a> </li>
    <li> <br/> <a href="#">create course </a> </li><li> <br/> <a href="#">Web Development</a> </li>
    <li> <br/> <a href="#">Bussiness Management </a> </li>
    <li> <br/> <a href="#">create course </a> </li><li> <br/> <a href="#">Web Development</a> </li> </ul>
<?php
$course = new Course();
$data = $course->fetchAll(1);

?>
    </article>
    <section class="content" >
        <div class="element">
        <img  src="1.jpg">
        <span><?php echo $data->courseName ?> </span> <br/>
        <span><?php echo substr($data->startTime, 0,5) . ' to ' . substr( $data->endTime, 0, 5 ) ?> </span> <br/>
        <span> <?php echo $data->startDate . ' to ' . $data->endDate ?></span> <br/>
        <span> center: kmd </span> <br/>

        </div>
        <div class="element">
         <img  src="2.jpg">
        <span> name: advanced web development name: advanced web development   </span> <br/>
        <span> time: 12:30 to 1:30 </span> <br/>
        <span> date: 12.5.5 </span> <br/>
        <span> center: kmd </span> <br/>

       </div>
        <div class="element">
         <img  src="3.jpg">
        <span> name: advanced web development name: advanced web development   </span> <br/>
        <span> time: 12:30 to 1:30 </span> <br/>
        <span> date: 12.5.5 </span> <br/>
        <span> center: kmd </span> <br/>
       </div>
         <div class="element">
        <img  src="1.jpg">
        <span> name: advanced web development name: advanced web development   </span> <br/>
        <span> time: 12:30 to 1:30 </span> <br/>
        <span> date: 12.5.5 </span> <br/>
        <span> center: kmd </span> <br/>

        </div>
        <div class="element">
         <img  src="1.jpg">
        <span> name: advanced web development name: advanced web development   </span> <br/>
        <span> time: 12:30 to 1:30 </span> <br/>
        <span> date: 12.5.5 </span> <br/>
        <span> center: kmd </span> <br/>

       </div>
        <div class="element">
         <img  src="1.jpg">
        <span> name: advanced web development name: advanced web development   </span> <br/>
        <span> time: 12:30 to 1:30 </span> <br/>
        <span> date: 12.5.5 </span> <br/>
        <span> center: kmd </span> <br/>
       </div>
   </section>


    </section>
<?php
require("config/footer.php");
?>


