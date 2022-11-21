<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
    <?php
include_once("connectionDB.php");
    ?>
    <form action=""method="POST">
hospital_name:<br>
<input type="text"name="hospital_name"><br><br>
hospital_address:<br>
<input type=""name="hospital_address"><br><br>
hospital_email:<br>
<input type="hospital_email"name="hospital_email"><br><br>
hospital_phone_number:<br>
<input type="hospital_phone_number"name="hospital_phone_number"><br><br>
doctor_name:<br>
<input type="doctor_name"name="doctor_name"><br><br>
<select name="department" id="department">
<option value="medicine">medicine</option>
<option value="orthopedics">orthopedics</option>
<option value="eye">eye</option>
<option value="cardiology">cardiology</option>
</select><br><br>
<input type="submit"value="submit"name="submit"><br><br>

    </form>
<?php
if(isset($_REQUEST['submit'])){
$hospital_name=$_REQUEST['hospital_name'];
$hospital_address=$_REQUEST['hospital_address'];
$hospital_email=$_REQUEST['hospital_email'];
$hospital_phone_number=$_REQUEST['hospital_phone_number'];
$doctor_name=$_REQUEST['doctor_name'];
$department=$_REQUEST['department'];

//echo $hospital_name."".$hospital_address."".$hospital_email."".
//$hospital_phone_number."".$doctor_name."".$department;

$sql="INSERT INTO info(hospital_name,hospital_address,hospital_email,
hospital_phone_number,doctor_name,department)
VALUES('$hospital_name','$hospital_address','$hospital_email',
'$hospital_phone_number','$doctor_name','$department')";

$result=mysqli_query($conn,$sql);
if($result){
    echo "data inser";
}else{
    echo "Error:".mysqli_error($conn);
}

}

?>

<table>
        <tr>
            <th>Hospital_Name</th>
            <th>Hospital_Address</th>
            <th>Hospital_Email</th>
            <th>Hospital_Phone_Number</th>
            <th>Doctor_Name</th>
            <th>Department</th>
            <th>Action</th>
        </tr>

<?php
$sql="SELECT * FROM info";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
    echo "<tr>
    <td>{$row['hospital_name']}</td>
    <td>{$row['hospital_address']}</td>
    <td>{$row['hospital_email']}</td>
    <td>{$row['hospital_phone_number']}</td>
    <td>{$row['doctor_name']}</td>
    <td>{$row['department']}</td>
    <td>
    <button>
    <a href ='delete.php?deleteId={$row["id"]}'>Delete</a>
    </button>
    
    
    <button>
    <a href='update.php?updateId={$row['id']}'>Update</a>
    </button>
    </td>
    </tr>";
}


?>

</table>




</body>
</html>