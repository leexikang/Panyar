<?php

$courseName = ( isset($courseName) ? $courseName : null );
$description = ( isset($description) ? $description: null );
$startTime= ( isset($startTime) ? $startTime : null );
$endTime = ( isset($endTime) ? $endTime : null );
$startDate = ( isset($startDate) ? $startDate : null );
$endDate = ( isset($endDate) ? $endDate : null );
$fee = ( isset($fee) ? $fee : null );
$note = ( isset($note) ? $note : null );
$path = ( isset( $path ) ? $path : null );
?>

<div class="contentWrapper">
    <FORM class="login_form" method='POST' action="<?php $_SERVER['PHP_SELF']?>" enctype='multipart/form-data' >
		<div>
		<label for="courseName"> Name: (require)</label>  <br/>
        <input type="text" name="courseName" id="courseName" value="<?php echo $courseName ?>" />
        <br/>
    </div>

		<div>
        <label for="courseName"> Upload Photo for your course </label>  <br/>
        <input type='file' name='coursePhoto' accept='image/*' value="<?php echo $path ?>" />
        <span class="messageError"><?php echo (isset($msg['photo']) ? $msg['photo'] : null )  ?> </span>
        <br/>
    </div>


	<div>
        <label for= 'description'>Description </label> <br/>
        <textArea rows='5' cols='50' name='description' id='description' value="<?php echo $description ?>" ></textArea>
    </div>

    <div>
        <label>Course's time (require) </label> <br/> <br/>
        <span class="warningMessage"> Please use the HH:MM pattern. eg. 01:05 </span> <br/>
        <input class='smallInput' type="text" name='startTime'  value="<?php echo $startTime ?>" />
        <span> To </span>
        <input class='smallInput' type="text" name='endTime' value="<?php echo $endTime ?>" />
        <span class="messageError"><?php echo (isset($msg['time']) ? $msg['time'] : null )  ?> </span>
    </div>

    <div>

        <label>Course Duration (require) </label> <br/> <br/>
        <span class="warningMessage"> Please use the YYYY-MM-DD pattern. eg. 2014-01-06 </span> <br/>
        <input class='smallInput' type="text" name='startDate' value="<?php echo $endDate ?>" /> 
        <input class='smallInput' type="text" name='endDate' value="<?php echo $endDate ?>" />
        <span class="messageError"><?php echo (isset($msg['date']) ? $msg['date'] : null )  ?> </span>
    </div>

    <div>
        <label> Fee </label> <br/>
        <input  type="text" name='fee' placeholder=" $" value="<?php echo $fee ?>" />
        <span class="messageError"><?php echo (isset($msg['fee']) ? $msg['fee'] : null )  ?> </span>

    </div>

		<div>
        <label for='category' > Category: </label> <br/>
        <select name='category' >
        <option value="1"> min </option>
        </select>
    </div>

	<div>
        <label for='note'>Note: </label> <br/>
        <textArea rows='15' cols='50' name='note' id='note'><?php echo $note ?></textArea>
    </div>


        <span class='messageError'><?php echo (isset($msg['allRequire']) ? $msg['allRequire'] : null ) ?></span>
	<div>
	<input type="submit" value='Create' name='edit' />
	</div>
    </FORM>

</div>

