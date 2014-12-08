<?php
require("header.php");
?>
    <section class="main" >

    <article>
    <ul>
    <li> <br/> <a href="#">Create profile </a> </li>
    <li> <br/> <a href="#">show all course</a> </li>
    <li> <br/> <a href="#">create course </a> </li>
    </ul>
 	</article>
    <section class="content" >
    <div class="contentWrapper">

    <FORM class="login_form" method="GET" action="signup.php">
		<div> 
		<label for="courseName"> Name: </label> <br/>
		<input type="text" name="courseName" id="courseName" /> 
        <span><?php echo (isset($msg['courseName']) ? $msg['courseName'] : null )  ?></span>
    </div>

	<div>
        <label for= 'description'>Description </label> <br/>
        <textArea rows='5' cols='50' name='description' id='description'></textArea>
    </div>

    <div>
        <label>Course's time</label> <br/>
        <input class='smallInput' type="text" name='startTime' id='startDate' /> 
        <span> to </span>
        <input class='smallInput' type="text" name='endTime' id='startDate' /> 
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
require("footer.php");
?>
