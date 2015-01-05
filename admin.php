<?php

require('vendor/autoload.php');
require('config/helperFunction.php');
session_start();
require("config/header.php");
if( checkSession() ){

    header('location: index.php');
}

use Panyar\Admin;
use Panyar\Validation;

$msg = array();

$username = ( isset( $username ) ? $username : null );
    if( isset($_POST['login']) ){

        $username = $_POST['username'];
        $password = $_POST['password'];

        if( empty($_POST['username'] ) OR empty( $_POST['password'] ) ){

            $msg["allRequire"] = "Please fill all the fields";

        }else if( ! Validation::checkLogin( new Admin(), $username, $password)  ){
                $msg["loginFail"] = "Username and Password are not matched.";
        }

        if( $msg == null AND isset( $_POST['login'] ) ){

            $userObj = new Admin();
            $user = $userObj->fetchByName( $username );
            var_dump($user);
            setSessionCookie( 'id', $user->adminId );
            setSessionCookie( 'username', $user->adminName);
            setSessionCookie('admin', true);
            header('Location: adminHome.php');

        }
    }

?>
    <section class="content">
<div class="contentWrapper">
<FORM class="login_form" method="POST" action="<?php echo $_SERVER['PHP_SELF']?> ">
        <div> 
        <label for="username"> Username </label>
        <input type="text" name="username" id="username" value="<?php echo $username ?>" /> 
    </div>
    <div>
        <label for="password"> Password:</label>
        <input type="password" name="password" id="password" /><br/>
    </div>
        <div>
        <input type="submit" value="login" name="login" />
    </div>
        <span class='messageError' ><?php echo (isset($msg['allRequire']) ? $msg['allRequire'] : null );
echo (isset($msg['loginFail']) ? $msg['loginFail'] : null ) ?></span> <br/> <br/>

</div>
    </FORM>
<br/><br/><br/>
</section>
 </body> 
 </html>
<?php

    require("config/footer.php");
