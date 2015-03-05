<?php

require('config/initRequire.php');
use Panyar\Admin;

$adminObj = new Admin();





?>

    <section class='main'>

<?php require("config/adminNav.php"); ?>
    <section class='content'>
        <form method='GET' action="<?php echo $_SERVER['PHP_SELF']; ?>" >
    <br/><br/>
    <label for='search'> Search By Client </label><br/><br/>
    <input type='text' name='value'/><br/><br/>
    <input type='submit' name='search' value='search'/>
    </form>
<?php

 if( isset($_GET['search'] ) ){
     $value = $_GET['value'];
     if( !empty($value) ){

     $adminObj = new Admin();
     $reports = $adminObj->searchByUser( $value );
    if( $reports != null){
?>

    <table class='report'>
    <tr> <td> Client </td>
        <td> Enroll Date </td>
        <td> Fee Expire Date </td>
        <td> email </td>
        <td> Own Courses </td>
    </tr>
<?php

foreach( $reports as $report ){
    echo '<tr>';
    echo "<td> <a href='editClient.php?id=$report->id'> $report->username </a> </td>";
    echo "<td> $report->joinDate </td>";
    echo "<td> $report->paymentExpireDate </td>";
    echo "<td> $report->email </td> ";
    echo "<td> $report->ownCourse</td> ";
    echo '</tr>';


}
echo '</table>';
    }else{
        echo '<br/>';
        echo "<span class='notFound'> Clients Not Found <span>";
    }
     }
 }
?>
    </section>

   </section>
<?php

require( 'config/footer.php');

?>
