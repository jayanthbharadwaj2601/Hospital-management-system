<?php

    $drug_name=$_POST['drug_name'];
    $price=$_POST['price'];
    $image_url=$_POST['image_url'];
    $conn=mysqli_connect("localhost","root","","hospital_management_system");
    $query="update medicine set Medicine_Name='$drug_name',price='$price',image_url='$image_url' where Medicine_Name='$drug_name'";
    mysqli_query($conn,$query);
    echo "<h1 style='font-family:arial;'>Medicine updated Sucessfully!</h1>";
?>