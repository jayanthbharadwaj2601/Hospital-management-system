<?php
    $details=$_POST['submit'];
    $g=explode(" ",$details);
    $conn=mysqli_connect("localhost","root","","hospital_management_system");
    $query="update orders set status='accepted' where medicine_name='$g[1]' and price='$g[2]' and quantity='$g[3]' and patient_name='$g[4]'";
    mysqli_query($conn,$query);
    echo "<h1 style='font-family:arial;'>order accepted!</h1>";
?>