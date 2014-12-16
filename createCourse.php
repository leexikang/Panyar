<?php
require("vendor/autoload.php");
require("config/header.php");

$msg = array();
    if( isset($_POST['edit']) ){

            $courseName = $_POST['courseName'];
            $description = $_POST['description'];
            $startTime= $_POST['startTime'];
            $endTime = $_POST['endTime'];
            $startDate = $_POST['startDate'];
            $endDate = $_POST['endDate'];
            $fee = $_POST['fee'];
            $category = $_POST['category'];
            $note = $_POST['note'];


            if( empty($_POST['courseName'] ) OR empty( $_POST['startTime'] )
                OR empty( $_POST['startDate'] )  ){

                    $msg["allRequire"] = "Please fill all the fields";

                }


            if( !Validation::timeValidation($startTime) AND !Validation::timeValidation($endTime)
                AND empty($msg["allRequire"]) ){
                $msg['time'] = "Please enter valide Time Format HH:MM";
            }

            if( !Validation::dateValidation($startDate) AND !Validation::dateValidation($endDate)
            AND empty($msg["allRequire"]) ){
                $msg['date'] ='Please enter valide Date format DD:MM:YYYY';
            }


            if( !Validation::validateInt( $fee ) AND empty( $msg['allRequire'] ) ){

                $msg['fee'] = 'Please enter the right fee';

            }

            if( $msg == null AND isset( $_POST['edit'] ) ){

                // change data to array and pass to InsertAll as parm

                $data = array(
                    'courseName' => $courseName,
                    'description' => $description,
                    'startTime' => $startTime,
                    'endTime' => $endTime,
                    'startDate' => $startDate,
                    'endDate' => $endDate,
                    'fee' => $fee,
                    'category' => $category,
                    'note' => $note
                );
                $course = new Course();
                $course->InsertAll( $data );

           }
    }


?>
    <section class="main" >
<?php require("config/clientNav.php"); ?>
    <section class="content" >
    <div class="contentWrapper">

    <FORM class="login_form" method='POST' action="<?php $_SERVER['PHP_SELF']?>" >
		<div>
		<label for="courseName"> Name: (require)</label>  <br/>
		<input type="text" name="courseName" id="courseName" />
        <br/>
    </div>

	<div>
        <label for= 'description'>Description </label> <br/>
        <textArea rows='5' cols='50' name='description' id='description'></textArea>
    </div>

    <div>
        <label>Course's time (require) </label> <br/> <br/>
        <span class="warningMessage"> Please use the HH:MM pattern. eg. 01:05 </span> <br/>
        <input class='smallInput' type="text" name='startTime'  />
        <span> To </span>
        <input class='smallInput' type="text" name='endTime' />
        <span class="messageError"><?php echo (isset($msg['time']) ? $msg['time'] : null )  ?> </span>
    </div>

    <div>

        <label>Course Duration (require) </label> <br/> <br/>
        <span class="warningMessage"> Please use the YYYY-MM-DD pattern. eg. 2014-01-06 </span> <br/>
        <input class='smallInput' type="text" name='startDate' />
        <span> To </span>
        <input class='smallInput' type="text" name='endDate' />
        <span class="messageError"><?php echo (isset($msg['date']) ? $msg['date'] : null )  ?> </span>
    </div>

    <div>
        <label> Fee </label> <br/>
        <input  type="text" name='fee' placeholder=" $" />
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
        <textArea rows='15' cols='50' name='note' id='note'></textArea>
    </div>


        <span class='messageError'><?php echo (isset($msg['allRequire']) ? $msg['allRequire'] : null ) ?></span>
	<div>
	<input type="submit" value='Create' name='edit' />
	</div>
    </FORM>

</div>

 	</section>
<br/>


<?php
require("config/footer.php");
?>
