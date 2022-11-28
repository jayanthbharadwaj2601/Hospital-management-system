<?php
    $res=$_POST['submit'];
    $description=$_POST['problem_description'];
    $field=$_POST['field'];
    $g=(explode(" ",$res));
    $patient=$g[2];
    // echo $description,' ',$field,' ',$patient,'<br>';
    $conn=mysqli_connect("localhost","root","","hospital_management_system");
    $query="insert into appointments values('$description','$field','$patient','pending','pending')";
    mysqli_query($conn,$query);
    echo "<h1 style='font-family:arial;'>appointment booked sucessfully!</h1>";
?>