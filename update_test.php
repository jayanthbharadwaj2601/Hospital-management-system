<?php

    $blood_type=$_POST["blood_type"];
    $quantity=$_POST["quantity"];
    $disease=$_POST["test_against"];
    $conn=mysqli_connect("localhost","root","","hospital_management_system");
    $query="update tests set quantity='$quantity',disease='$disease' where blood_type='$blood_type'";
    mysqli_query($conn,$query);
    echo "<h1 style='font-family:arial;'>test updated sucessfully</h1>";
?>