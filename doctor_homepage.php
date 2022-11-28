<?php
    $username=$_POST['username'];
    $password=$_POST['password'];
    $conn=mysqli_connect("localhost","root","","hospital_management_system");
    $query="select * from doctor";
    $res=mysqli_query($conn,$query);
    $speciality='';
    $c=0;
    if(mysqli_num_rows($res))
    {
        while($row=mysqli_fetch_assoc($res))
        {
            if($row["Username"]==$username && $row["Password"]==$password)
            {
                $c+=1;
                $speciality=$row['Speciality'];
                break;
            }
        }
    }
    if($c>0)
    {
        $query2="select * from appointments";
        echo "<header style='font-size: 30px; color: white; background-color:DarkCyan; text-shadow: 2px 2px 2px black;font-weight:bold; padding: 6px 6px; margin:0; font-family:arial; width:1600px; position:relative; right:10px; bottom: 10px;'> Welcome ",$username,'!</header>';
        $res=mysqli_query($conn,$query2);
        if(mysqli_num_rows($res))
        {
            echo "<table border=3 style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>";
            echo "<tr style='color:white;background-color:blue; font-family:arial;'><th style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>problem_description</th><th style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>patient</th> <th style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'> Phone number </th></tr>";
            while($row=mysqli_fetch_assoc($res))
            {
                if($row['field']==$speciality)
                {
                    echo "<tr bgcolor='silver' style='font-family:arial;'>";
                    echo "<td style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>",$row['problem_description'],'</td>';
                    echo "<td style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>",$row['patient'],'</td>';
                    $r='';
                    $query4='select * from patient';
                    $res2=mysqli_query($conn,$query4);
                    if(mysqli_num_rows($res2))
                    {
                        while($row2=mysqli_fetch_assoc($res2))
                        {
                            if($row2['Username']==$row['patient'])
                            {
                                $r=$row2['phone_no'];
                                break;
                            }
                        }
                    }
                    echo "<td style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>",$r,'</td>';
                    echo "<td style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>",
                    '<form action="write_prescription.php" method="POST">
                    <textarea name="prescription" id="" cols="30" rows="10"></textarea>
                    <input type="submit" name="submit" style="width: 137px;background-color:#0a0a23;color: #fff;border:none; font-family:arial;font-weight:bolder; padding:4px 4px; " value="write prescription /',$row['problem_description'],'/',$row['patient'],'">';
                    echo '</form>';
                    echo '</td>';
                    echo "</tr>";
                }
            }
            echo "</table>";
        }
    }
    else
    echo "invalid credentials!";

?>