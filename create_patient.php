<?php
    $name=$_POST["Name"];
    $username=$_POST["Username"];
    $phone_number=$_POST["phone_no"];
    $password=$_POST["password"];
    $conn=mysqli_connect("localhost","root","","hospital_management_system");
    $query="insert into patient values('$name','$username','$password','$phone_number')";
    $c=0;
    $r1='select * from patient';
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
        echo "<h1 style='font-family:arial;'>patient sucessfully added!</h1>";
    }
    else
    echo "<h1 style='font-family:arial;'>patient with this username already exists!</h1>";
?>