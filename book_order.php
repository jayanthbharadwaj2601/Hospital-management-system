<?php
    $res=$_POST['submit'];
    $g=explode("/",$res);
    // echo $res,"<br>";
    $problem_description=$g[1];
    $field=$g[2];
    $patient=$g[3];
    // echo $g[1],$g[3],"<br>";
    // echo $problem_description," ",$field," ",$patient,'<br>';
    $conn=mysqli_connect("localhost","root","","hospital_management_system");
    $query="select * from doctor";
    $res=mysqli_query($conn,$query);
    if(mysqli_num_rows($res))
    {
        while($row=mysqli_fetch_assoc($res))
        {
            if($row['Speciality']==$field)
            {
                $h=$row['Dr.Name'];
                // echo $h;
                $query1="update appointments set doctor='$h' where problem_description='$problem_description' and field='$field' and patient='$patient'";
                mysqli_query($conn,$query1);
                echo "<h1 style='font-family:arial;'>booking accepted sucessfully</h1>";
                break;
            }
        }
    }
?>