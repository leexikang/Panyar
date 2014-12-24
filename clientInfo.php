<?php
require("config/header.php");
require('vendor/autoload.php');

use Panyar\User;

?>
    <section class="main" >
<?php require("config/adminNav.php"); ?>

    <section class="content">
	<br/><br/><br/>
    <table>
        <tr>
            <td class='number'>No.  </td>
            <td colspan="2" class='Tdname'> Client Name </td>
    </tr>
    <tr>
<?php
$userObj = new User();
$users = $userObj->fetchAll();
$num = 0;

foreach ( $users as $user) {
    $num ++;

?>
    <td class='number'> <?php echo $num ?> </td>
    <td class='Tdname'> <?php echo $user->username ?> </td>
    <td class='view'> <a href="editClient.php?id=<?php echo $user->id ?>" > View </a> </td>
</tr>
<?php
}
?>

    </table>

		</section>
		</section>

<?php


require("config/footer.php");

?>
