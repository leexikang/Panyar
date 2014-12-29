<?php

require('config/initRequire.php');
use Panyar\Admin;

$adminObj = new Admin();
$reports = $adminObj->fetchReport();



?>
    <section class='main'>

<?php require("config/adminNav.php"); ?>
    <section class='content'>
    <table class='report'>
    <tr> <td> Client </td>
        <td> Enroll Date </td>
        <td> Fee Expire Date </td> 
        <td> email </td>
        <td> Own Courses </td>
    </tr>
<?php
foreach ( $reports as $report){

    echo '<tr>';
    echo "<td> $report->username </td>";
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
