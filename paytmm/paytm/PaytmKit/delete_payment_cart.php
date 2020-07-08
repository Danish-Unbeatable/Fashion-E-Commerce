<?php
include('../../../db/db.php');
?>
<?php
session_start();
                


$sql="DELETE FROM cart WHERE email='{$_SESSION['name']}'";
if(mysqli_query($conn,$sql))
{
	header('location:../../../add_cart.php');

}
else
{
	echo "sorry cant delete";
}
?>