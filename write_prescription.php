<?php
    $res=$_POST['submit'];
    $g=explode("/",$res);
    $problem_description=$g[1];
    $patient=$g[2];
    $prescription=$_POST['prescription'];
    // echo $prescription;
    $conn=mysqli_connect("localhost","root","","hospital_management_system");
    $query="update appointments set prescription='$prescription' where problem_description='$problem_description' and patient='$patient'";
    mysqli_query($conn,$query);
    echo "<h1 style='font-family:arial;'>prescription given sucessfully</h1>";
?>