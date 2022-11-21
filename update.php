<?php
include("connectionDB.php");

if(isset($_GET['updateId'])){
    $id=$_GET['updateId'];
    $sql="SELECT * FROM info Where id=$id";

    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
}
?>

 <form action="update.php?updateId=<?php echo $id ?>"method="POST">
hospital_name:<br>
<input type="text"name="hospital_name"value="<?php echo $row['hospital_name']?>"><br><br>
hospital_address:<br>
<input type=""name="hospital_address"value="<?php echo $row['hospital_address']?>"><br><br>
hospital_email:<br>
<input type="hospital_email"name="hospital_email"value="<?php echo $row['hospital_email']?>"><br><br>
hospital_phone_number:<br>
<input type="hospital_phone_number"name="hospital_phone_number"value="<?php echo $row['hospital_phone_number']?>"><br><br>
doctor_name:<br>
<input type="doctor_name"name="doctor_name"value="<?php echo $row['doctor_name']?>"><br><br>
<select name="department" id="department"value="<?php echo $row['department']?>">
<option value="medicine">medicine</option>
<option value="orthopedics">orthopedics</option>
<option value="eye">eye</option>
<option value="cardiology">cardiology</option>
</select><br><br>
<input type="submit"value="update"name="update"name="update"><br><br>
</form>

<?php
if(isset($_REQUEST['update'])){
$hospital_name=$_REQUEST['hospital_name'];
$hospital_address=$_REQUEST['hospital_address'];
$hospital_email=$_REQUEST['hospital_email'];
$hospital_phone_number=$_REQUEST['hospital_phone_number'];
$doctor_name=$_REQUEST['doctor_name'];
$department=$_REQUEST['department'];

$sql="UPDATE info SET hospital_name='$hospital_name',hospital_address='$hospital_address',
hospital_email='$hospital_email',hospital_phone_number='$hospital_phone_number',
doctor_name='$doctor_name',department='$department' WHERE id=$id";

$result = mysqli_query($conn, $sql);
if($result){
    echo "data insert";
    header("location: index.php");
}
else{
    echo "Error: ". mysqli_error($conn);
}

}

?>