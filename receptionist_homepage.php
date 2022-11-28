<?php
    $username=$_POST['username'];
    $password=$_POST['password'];
    $conn=mysqli_connect("localhost","root","","hospital_management_system");
    $query="select * from receptionist";
    $res=mysqli_query($conn,$query);
    $c=0;
    if(mysqli_num_rows($res))
    {
        while($row=mysqli_fetch_assoc($res))
        {
            if($row["Username"]==$username && $row["Password"]==$password)
            {
                $c+=1;
                break;
            }
        }
    }
    if($c>0)
    {
        echo "<header style='font-size: 30px; color: white; background-color:DarkCyan; text-shadow: 2px 2px 2px black;font-weight:bold; padding: 6px 6px; margin:0; font-family:arial; width:1600px; position:relative; right:10px; bottom: 10px;'> Welcome ",$username,'!</header>';
        $query="select * from appointments;";
        $res=mysqli_query($conn,$query);
        if(mysqli_num_rows($res))
        {   echo "<table border=4 align='center' style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>";
            echo "<tr style='color:white;background-color:blue; font-family:arial;'>";
            echo "<th style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>problem_description</th>";
            echo "<th style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>field</th>";
            echo "<th style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>patient</th>";
            while($row=mysqli_fetch_assoc($res))
            {
                if($row['doctor']=='pending')
                {
                    echo '<form action="book_order.php" method="POST">';
                    echo "<tr bgcolor='silver' style='font-family:arial;'>";
                    echo "<td style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>",$row['problem_description'],"</td>";
                    echo "<td style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>",$row['field'],"</td>";
                    echo "<td style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>",$row['patient'],"</td>";
                    echo '<td><input type="submit" name="submit" style="width: 59px;background-color:#0a0a23;color: #fff;border:none; font-family:arial;font-weight:bolder; padding:4px 4px; " value="accept  ','/',$row['problem_description'],'/',$row['field'],'/',$row['patient'],'"></td>';
                    echo '</form>';
                    echo "</tr>";
                }
            }
            echo "</table>";
        }
    }
    else
    echo "invalid credentials!";

?>