<?php
require("config/header.php");
?>
    <section class="main" >
<?php require("config/clientNav.php"); ?>
    <section class="content" >
    <div class="contentWrapper">

    <FORM class="login_form" method="GET" action="createCourse.php">
		<div> 
		<label for="courseName"> Name: </label> <br/>
		<input type="text" name="courseName" id="courseName" />
        <span class="messageError">Mi Na<?php echo (isset($msg['courseName']) ? $msg['courseName'] : null )  ?> </span>
        <br/>
    </div>

	<div>
        <label for= 'description'>Description </label> <br/>
        <textArea rows='5' cols='50' name='description' id='description'></textArea>
    </div>

    <div>
        <label>Course's time</label> <br/>
        <input class='smallInput' type="text" name='startTime'  />
        <span> To </span>
        <input class='smallInput' type="text" name='endTime' />
    </div>

    <div>

        <label>Course Duration </label> <br/>
        <input class='smallInput' type="text" name='startDate' />
        <span> To </span>
        <input class='smallInput' type="text" name='endDate' />
    </div>

    <div>
        <label> Fee </label> <br/>
        <input  type="text" name='fee' placeholder=" $" />
    </div>

		<div>
        <label for='category' > Category: </label> <br/>
        <select>
        <option> min </option>
        </select>
    </div>

	<div>
        <label for='note'>Note: </label> <br/>
        <textArea rows='15' cols='50' name='note' id='note'></textArea>
    </div>


	<div>
	<input type="submit" value="Signup" name="signup" />
        <span><?php echo (isset($msg['allRequire']) ? $msg['allRequire'] : null ) ?></span>
	</div>
    </FORM>

</div>

 	</section>
<br/>


<?php
require("config/footer.php");
?>
