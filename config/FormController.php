<?php
use Panyar\Category;
use Panyar\Validation;
use Panyar\Course;

$msg = array();
$categoryObj = new Category();
$categories = $categoryObj->fetchAll();

if( isset($_POST['edit']) ){

            $courseName = $_POST['courseName'];
            $description = $_POST['description'];
            $startTime= $_POST['startTime'];
            $endTime = $_POST['endTime'];
            $startDate = $_POST['startDate'];
            $endDate = $_POST['endDate'];
            $fee = $_POST['fee'];
            $categoryId = $_POST['categoryId'];
            $note = $_POST['note'];
            $coursePhoto = $_FILES['coursePhoto']['name'];
            $tmp = $_FILES['coursePhoto']['tmp_name'];
            $photoType = $_FILES['coursePhoto']['type'];


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

            if( !Validation::validatePhotoType( $photoType ) AND empty( $msg['allRequire'] ) ){

                $msg['photo'] = 'Please upload only jpg png jpeg';
            }

            if( $msg == null AND isset( $_POST['edit'] ) ){

                // change data to array and pass to InsertAll as parm

                $path = "image/" . $coursePhoto;
                move_uploaded_file( $tmp, $path );

                $data = array(
                    'courseName' => $courseName,
                    'description' => $description,
                    'startTime' => $startTime,
                    'endTime' => $endTime,
                    'startDate' => $startDate,
                    'endDate' => $endDate,
                    'fee' => $fee,
                    'category' => $categoryId,
                    'note' => $note,
                    'photo' => $path,
                    'id' => $_SESSION['id']
                );

                $course = new Course();
                var_dump( $data );

                if ( $action == 'edit' ){

                        $photo = new Course();
                        $data['photo'] = $photo->checkPhotoPath( $path, $_GET['id'] );
                        $data['courseId'] = $_GET['id'];
                        $course->edit( $data );

                    }else{

                        $course->InsertAll( $data );

                    }

                header("Location: showClient.php?name={$_SESSION['username']}" );

            }

          }

