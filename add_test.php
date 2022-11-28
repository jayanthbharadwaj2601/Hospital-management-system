<?php

    $blood_type=$_POST["blood_type"];
    $quantity=$_POST["quantity"];
    $disease=$_POST["test_against"];
    $conn=mysqli_connect("localhost","root","","hospital_management_system");
    $query="insert into tests values('$blood_type','$quantity','$disease')";
    mysqli_query($conn,$query);
    echo "<h1 style='font-family:arial;'>test added sucessfully</h1>";
?>