<?php
require("config/header.php");
require('vendor/autoload.php');
require('config/helperFunction.php');

use Panyar\User;

if( isset ( $_GET['id'] ) ){

    $id = $_GET['id'];

    $userObj = new User();
    $user = $userObj->fetchById( $id );
}

?>
    <section class="main" >

    <section class="content">
    
    <div class='info'>
    <table>
<?php 
createAnswer( 'id', $user->id );
createAnswer( 'UserName', $user->username );
createAnswer( 'email', $user->email );
createAnswer( 'Introduction', $user->intro );

?>
    </table>
    <br/>
    <a href='clientInfo.php' class='first' > Back </a>
    <a href="deleteClient.php?id=<?php echo $user->id ?>" > Delete </a>
    </div>

        </section>

        </section>

<?php


require("config/footer.php");


?>

