

<?php

include("connectionDB.php");
if(isset($_GET['deleteId'])){

    $id=$_GET['deleteId'];
$sql="DELETE  FROM info where id=$id";
$result=mysqli_query($conn,$sql);
if($result){
   header("location:index.php");
}

}

?>