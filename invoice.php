<?php
require("vendor/autoload.php");
require("config/header.php");
require('config/helperFunction.php');

use Panyar\User;
$id = 1;
$userObj = new User();
$user = $userObj->fetchById( $id );

?>
<section class='main'>

<section class="contentWrapper">

    <div class='comfirmPayment'>

    <h1> Welcome to Panyar Education Consultant </h1>
    <p> Thanks for you choosing Panyar as your platform. </p><br/>
    <div class='info'>
     <table>
</li> 
<?php 
createAnswer( 'Username', $user->username);
createAnswer( 'Email', $user->email );
createAnswer( 'fee', '$300' );
createAnswer( 'duration', '1 year');

?>
</table>
    </div>
<a href='/'> Comfirm </a> 
    </div>
</section>
</section>


<?php
        require("config/footer.php");
?>



