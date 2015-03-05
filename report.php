<?php

require('config/initRequire.php');
use Panyar\Admin;

$adminObj = new Admin();

$action = ( isset( $_GET['action'] ) ? $_GET['action'] : null);

    $reports = $adminObj->fetchReport( $action );


?>

    <section class='main'>


<?php require("config/adminNav.php"); ?>
    <section class='content'>
        <table class='report'>
    <nav>
    <a href='report.php?action=course'> By Course Number  </a>
    <a href='report.php?action=date'> By Enroll Date </a>
    <a href='report.php?action=expire'> By Expire Date</a>
    </nav>
<tr> <td> Client </td>
        <td> Enroll Date </td>
        <td> Fee Expire Date </td>
        <td> email </td>
        <td> Own Courses </td>
    </tr>
<?php
foreach ( $reports as $report){

    echo '<tr>';
    echo "<td> <a href='editClient.php?id=$report->id'> $report->username </a> </td>";
    echo "<td> $report->joinDate </td>";
    echo "<td> $report->paymentExpireDate </td>";
    echo "<td> $report->email </td> ";
    echo "<td> $report->ownCourse</td> ";
    echo '</tr>';

    }
?>
    </table>
    </section>
    </section>
<?php

require( 'config/footer.php');

?>
