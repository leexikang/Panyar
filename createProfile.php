<?php

require('config/initRequire.php');
use Panyar\User;
$id = $_SESSION['id'];

    if( isset($_POST['edit']) ){

        $email = $_POST['email'];
        $address= $_POST['address'];
        $intro = $_POST['intro'];

        $data = array(
            'email' => $email,
            'intro' => $intro,
            'address' => $address
        );
        $userInsert = new User();

        $userInsert->updateInfo( $data, $id);
    }

$userObj = new User();
$user = $userObj->fetchById( $id ); 

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
        <label for="address"> Address </label>
        <input type="text" name="address" id="address" value="<?php echo $user->address ?>"/><br/>
    </div>

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
