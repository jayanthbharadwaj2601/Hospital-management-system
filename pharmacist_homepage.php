<?php
    $username=$_POST['username'];
    $password=$_POST['password'];
    $conn=mysqli_connect("localhost","root","","hospital_management_system");
    $query="select * from pharmacist";
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
        $table="select * from orders";
        $r3=mysqli_query($conn,$table);
        if(mysqli_num_rows($r3))
        {
            echo '<h1 style="color: white;background-color: black;width: 100%;border-radius: 10px; padding: 4px 4px;box-shadow: 2px 2px 2px black;font-family:arial;font-weight:bolder;">Orders</h1>';
            echo "<table border=3 align='center' style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>";
            echo "<tr style='color:white;background-color:blue; font-family:arial;'><th style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>medicine_name</th><th style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>price</th><th style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>quantity</th><th style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>total_price</th><th style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>patient_name</th></tr>";
            while($row=mysqli_fetch_assoc($r3))
            {
                echo "<tr bgcolor='silver' style='font-family:arial;'>";
                echo "<td style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>",$row['medicine_name'],"</td>";
                echo "<td style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>",$row['price'],"</td>";
                echo "<td style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>",$row['quantity'],"</td>";
                echo "<td style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>",$row['total_price'],"</td>";
                echo "<td style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>",$row['patient_name'],"</td>";
                echo "<td style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>";
                echo '<form action="update_status.php" method="POST">
                <input type="submit" name="submit" style="width: 60px;background-color:#0a0a23;color: #fff;border:none; font-family:arial;font-weight:bolder; padding:4px 4px; " value="accept ',$row['medicine_name'],' ',$row['price'],' ',$row['quantity'],' ',$row['patient_name'],'">
                </form>';
                echo "</td>";
                echo "</tr>";

            }
            echo "</table>";
        }
        $table1="select patient_name,sum(total_price) as s2 from orders where status='accepted' group by patient_name";
        $r4=mysqli_query($conn,$table1);
        if(mysqli_num_rows($r4))
        {
            echo '<h1 style="color: white;background-color: black;width: 100%;border-radius: 10px; padding: 4px 4px;box-shadow: 2px 2px 2px black;font-family:arial;font-weight:bolder;">Billing</h1>';
            echo "<table border=3 align='center'>";
            echo "<tr style='color:white;background-color:blue; font-family:arial;'><th style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>patient name</th><th style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>total bill</th><</tr>";
            while($row=mysqli_fetch_assoc($r4))
            {
                echo "<tr bgcolor='silver' style='font-family:arial;'>";
                echo "<td style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>",$row['patient_name'],"</td>";
                echo "<td style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>",$row['s2'],"</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <style>
            body
            {
                font-family:arial;
                font-weight:bolder;
            }
            .container
            {
                display: flex;
                flex-direction: column;
                gap: 5px;
            }
            .input_box{
                font-size:18px;
                padding:10px 10px 10px 5px;
                display:block;
                width:300px;
                border:none;
                border-bottom:1px solid #757575;
            }
            .button_1 {
                font-size:20px;
                color: white;
                background: black;
                font-weight:bold;
                border-bottom: solid 4px #FFA000;
                border-radius: 15px 15px 0 0;
                transition: .4s;
                width:150px;
                padding:4px 4px;
            }
            .button_1:hover {
                background-color:#002ead;
                transition: 0.7s;
            }
            </style>
        </head>
        <body>
            <div class="container" align="center">
            <form action="add_medicine.php" method="POST">
            <h1 style="color: white;background-color: black;width: 100%;border-radius: 10px; padding: 4px 4px;box-shadow: 2px 2px 2px black;font-family:arial;font-weight:bolder;">Add Medicine</h1>
                <input type="text" name="drug_name" placeholder="medicine_name" required class="input_box">
                <input type="number" name="price" placeholder="price" required class="input_box">
                <input type="text" name="image_url" placeholder="image url" required class="input_box"><br>
                <input type="submit" name="submit" value="add" class="button_1">
            </form>
            <form action="update_medicine.php" method="POST">
            <h1 style="color: white;background-color: black;width: 100%;border-radius: 10px; padding: 4px 4px;box-shadow: 2px 2px 2px black;font-family:arial;font-weight:bolder;">Update Medicine</h1>
                <input type="text" name="drug_name" placeholder="medicine_name" required class="input_box">
                <input type="number" name="price" placeholder="price" required class="input_box">
                <input type="text" name="image_url" placeholder="image url" required class="input_box"><br>
                <input type="submit" name="submit" value="update" class="button_1">
            </form>
            </div>
        </body>
        </html>';
    }
    else
    echo "invalid credentials!";

?>