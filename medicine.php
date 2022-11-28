<?php

    $drug_name=$_POST['drug_name'];
    $price=$_POST['price'];
    $image_url=$_POST['image_url'];
    $conn=mysqli_connect("localhost","root","","hospital_management_system");
    $query="insert into medicine values ('$drug_name','$price','$image_url')";
    $echo "<h1 style='font-family:arial;'>Medicine Added Sucessfully!</h1>";
?>