<?php
    $name=$_POST["Name"];
    $speciality=$_POST["speciality"];
    $username=$_POST["Username"];
    $password=$_POST["password"];
    $conn=mysqli_connect("localhost","root","","hospital_management_system");
    $query="insert into doctor values('$name','$username','$password','$speciality')";
    $c=0;
    $r1='select * from doctor';
    $res=mysqli_query($conn,$r1);
    if(mysqli_num_rows($res))
    {
        while($row=mysqli_fetch_assoc($res))
        {
            if($row['Username']==$username)
            {
                $c+=1;
                break;
            }
        }
    }
    if($c==0)
    {
        $res=mysqli_query($conn,$query);
        echo "<h1 style='font-family:arial;'>doctor sucessfully added!</h1>";
    }
    else
    echo "<h1 style='font-family:arial;'>doctor with this username already exists!</h1>";
?>