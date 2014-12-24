<?php
require("config/header.php");
require('vendor/autoload.php');

use Panyar\User;

    if( isset($_POST['edit']) ){

        $email = $_POST['email'];
        $intro = $_POST['intro'];

        $data = array(
            'email' => $email,
            'intro' => $intro
        );
        $userInsert = new User();

        $userInsert->updateInfo( $data, 1);
    }

$userObj = new User();
$user = $userObj->fetchById( 1 ); //////////////////////


?>
    <section class="main" >
<?php require("config/clientNav.php"); ?>

   <section class="content" >
    <div class="contentWrapper">
     <div>
     <FORM class="login_form" method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
              <label for="email"> Email </label>
        <input type="email" name="email" id="email" value="<?php echo $user->email ?>"/><br/>
    </div>
    <div>

    <div>
        <label for='intro'> Tell people about your center </label> <br/>
        <textarea cols="45em" rows="15em" name='intro' ><?php echo $user->intro ?></textarea>
    </div>
    <div>

        <input type='submit' value='Eidt' name='edit' />
    </div>
    </FORM>


    <div>

    </section>
<br/>


<?php


require("config/footer.php");

?>
