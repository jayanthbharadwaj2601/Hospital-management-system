<?php
    $details=$_POST['submit'];
    $g=explode(" ",$details);
    $quantity=$_POST['quantity'];
    $conn=mysqli_connect("localhost","root","","hospital_management_system");
    $o=(int)$g[2];
    // for($i=1;$i<sizeof($g);$i++)
    // {
    //     echo $g[$i]," ";
    // }
    // echo $quantity;
    $query="insert into orders values ('$g[1]','$g[2]','$quantity','$g[2]'*'$quantity','$g[3]','pending')";
    mysqli_query($conn,$query);
    echo "<h1 style='font-family:arial;'>order placed sucessfully!</h1>";
?>