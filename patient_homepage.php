<?php
    $username=$_POST['username'];
    $password=$_POST['password'];
    $conn=mysqli_connect("localhost","root","","hospital_management_system");
    $query="select * from patient";
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
        $appointments1="select * from appointments";
        $res=mysqli_query($conn,$appointments1);
        if(mysqli_num_rows($res));
        {
            echo '<h1 style="color: white;background-color: black;width: 100%;border-radius: 10px; padding: 4px 4px;box-shadow: 2px 2px 2px black;font-family:arial;font-weight:bolder;">Appointments Status</h1>';
            echo '<table align="center" border=3 style="box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;">';
            echo "<tr style='color:white;background-color:blue; font-family:arial;'><th style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>problem description</th><th style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>doctor</th><th style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>prescription</th></tr>";
            while($row=mysqli_fetch_assoc($res))
            {
                if($row['patient']==$username)
                {
                    echo "<tr bgcolor='silver' style='font-family:arial;'>";
                    echo "<td style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>",$row['problem_description'],"</td>";
                    echo "<td style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>",$row['doctor'],"</td>";
                    echo "<td style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>",$row['prescription'],"</td>";
                    echo "</tr>";
                }
            }
            echo "</table>";
        }
        echo "<br>";
        $appointments2="select * from orders";
        $res=mysqli_query($conn,$appointments2);
        if(mysqli_num_rows($res));
        {
            echo '<h1 style="color: white;background-color: black;width: 100%;border-radius: 10px; padding: 4px 4px;box-shadow: 2px 2px 2px black;font-family:arial;font-weight:bolder;">Orders Status</h1>';
            echo '<table align="center" border=3>';
            echo "<tr style='color:white;background-color:blue; font-family:arial;'><th style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>medicine name</th><th style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>price</th><th style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>quantity</th><th style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>Total Price</th><th style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>Status</th></tr>";
            while($row=mysqli_fetch_assoc($res))
            {
                if($row['patient_name']==$username)
                {
                    echo "<tr bgcolor='silver' style='font-family:arial;'>";
                    echo "<td style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>",$row['medicine_name'],"</td>";
                    echo "<td style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>",$row['price'],"</td>";
                    echo "<td style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>",$row['quantity'],"</td>";
                    echo "<td style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>",$row['total_price'],"</td>";
                    echo "<td style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>",$row['status'],"</td>";
                    echo "</tr>";
                }
            }
            echo "</table>";
        }
        $query1="select * from medicine";
        $res=mysqli_query($conn,$query1);
        if(mysqli_num_rows($res))
        {
            echo '<h1 style="color: white;background-color: black;width: 100%;border-radius: 10px; padding: 4px 4px;box-shadow: 2px 2px 2px black;font-family:arial;font-weight:bolder;">Available Medicines</h1>';
            while($row=mysqli_fetch_assoc($res))
            {
                echo "<div align='center' style='font-family:arial; font-weight:bold; background-color:silver;color:white; text-shadow: 2px 2px 2px black;box-shadow:2px 2px 2px black;'>";
                echo '<form action="place_order.php" method="POST">';
                $d=$row['Image_url'];
                echo "<hr>";
                echo '<img src="',$d,'"  width="300px " alt="Error Processing Image"><br>';
                echo $row['Medicine_Name'],"<br>";
                echo 'price:',$row['Price'],"<br><br>";
                echo '<input type="number" name="quantity" style="font-size:18px;padding:10px 10px 10px 5px;display:block;width:300px;border:none;border-bottom:1px solid #757575;" class="input_box" placeholder="Enter Quantity"><br>';
                echo '<input type="submit" style="width: 93px;background-color:#0a0a23;color: #fff;border:none; font-family:arial;font-weight:bolder; padding:4px 4px; " name="submit" value="place_order ',$row['Medicine_Name'],' ',$row['Price'],' ',$username,'"><br>';
                echo '</form>';
                echo "</div>";
            }
        }
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
            <hr>
            <h1 style="color: white;background-color: black;width: 100%;border-radius: 10px; padding: 4px 4px;box-shadow: 2px 2px 2px black;font-family:arial;font-weight:bolder;">Appointment Booking</h1>
            <form action="book_appointment.php" method="POST">
                <textarea name="problem_description"  style="font-size:18px;padding:10px 10px 10px 5px;display:block;width:300px;border:none;border-bottom:1px solid #757575;" class="input_box" cols="30" rows="10" required placeholder="Describe your problem"></textarea>
                <br><input type="text" name="field" style="font-size:18px;padding:10px 10px 10px 5px;display:block;width:300px;border:none;border-bottom:1px solid #757575;"class="input_box" placeholder="related specialization" required>
                <br><input type="submit" style="width: 125px;background-color:#0a0a23;color: #fff;border:none; font-family:arial;font-weight:bolder; padding:4px 4px; " name="submit" value="book appointment ',$username,'">
            </form>
        </body>
        </html>';
    }
    else
    echo "invalid credentials!";

?>