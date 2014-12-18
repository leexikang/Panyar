<?php
require("config/header.php");
require('vendor/autoload.php');

use Panyar\User;

    if( isset($_GET['edit']) ){

        $name = $_GET['email'];
        $email = $_GET['email'];
        $intro = $_GET['intro'];

        $data = array(
            'name' => $name,
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
     <FORM class="login_form" method="GET" action="<?php $_SERVER['PHP_SELF'] ?>">
        <div> 
        <label for='name' > Name  </label>
        <input type="text" name='name' id='name' value="<?php echo $user->name ?>" />

    <div>
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
