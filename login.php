<?php
require("config/config.inc.php");
require("config/header.php");
require("vendor/autoload.php");

$msg = array();
    if( isset($_GET['login']) ){

            $username = $_GET['username'];
            $password = $_GET['password'];

            if( empty($_GET['username'] ) OR empty( $_GET['password'] ) ){

                    $msg["allRequire"] = "Please fill all the fields";
                }

            $form = new FormController( $username, $password );

            if( !$form->checkLogin( new User())  ){
                $msg["loginFail"] = "Username and Password are not matched.";
            }

            if( $msg == null AND isset( $_GET['login'] ) ){

                echo "login";
            }
    }

?>
    <div>
    <FORM class="login_form" method="GET" action="login.php">
        <div> 
        <label for="username"> Username </label>
        <input type="text" name="username" id="username" /> 
    </div>
    <div>
        <label for="password"> Password:</label>
        <input type="password" name="password" id="password" /><br/>
    </div>
        <div>
        <input type="submit" value="login" name="login" />
    </div>
        <span><?php echo (isset($msg['allRequire']) ? $msg['allRequire'] : null );
        echo (isset($msg['loginFail']) ? $msg['loginFail'] : null ) ?></span>
    </FORM>

 </body> 
 </html>
<?php

require("config/footer.php");
