<?php
    $username=$_POST['username'];
    $password=$_POST['password'];
    $conn=mysqli_connect("localhost","root","","hospital_management_system");
    $query="select * from lab_technician";
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
        $query3="select * from tests";
        $res=mysqli_query($conn,$query3);
        if(mysqli_num_rows($res))
        {
            echo "<table border=3 align='center' style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>";
            echo "<tr style='color:white;background-color:blue; font-family:arial;'><th style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>blood type</th><th style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>quantity</th><th style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>disease</th></tr>";
            while($row=mysqli_fetch_assoc($res))
            {
                echo "<tr bgcolor='silver' style='font-family:arial;'>";
                echo "<td style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>",$row['blood_type'],"</td>";
                echo "<td style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>",$row['quantity'],"</td>";
                echo "<td style='box-shadow: 2px 2px 2px black; border-radius:7px; font-weight:bolder;'>",$row['disease'],"</td>";
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
            }
        .container
        {
            display: flex;
            flex-direction: column;
            gap: 5px;
            position: relative;
            top: 30px;
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
            body
            {
                font-family: Arial, Helvetica, sans-serif;
                font-weight: bolder;
            }
            .input_box{
                    font-size:18px;
                    padding:10px 10px 10px 5px;
                    display:block;
                    width:300px;
                    border:none;
                    border-bottom:1px solid #757575;
                }
                h1
                {
                    color: white;
                    background-color: black;
                    width: 100%;
                    border-radius: 10px;
                    box-shadow: 2px 2px 2px black;
                }
    </style>
        </head>
        <body>
            <div class="container" align="center">
            <h1 align="center">Add Test</h1>
            <form action="add_test.php" method="POST">
                <input type="text" name="blood_type" placeholder="Enter blood type" class="input_box" required>
                <input type="text" name="quantity" placeholder="enter quantity in ml" class="input_box" required>
                <input type="text" name="test_against" placeholder="disease to be tested against"  class="input_box" required>
                <br><input type="submit" name="submit" class="button_1" value="add_test">
            </form>
            <h1 align="Center">Update Test</h1>
            <form action="update_test.php" method="POST">
                <input type="text" name="blood_type" placeholder="Enter blood type" class="input_box" required>
                <input type="text" name="quantity" placeholder="enter quantity in ml" class="input_box" required>
                <input type="text" name="test_against" placeholder="disease to be tested against" class="input_box" required>
                <br><input type="submit" name="submit" class="button_1" value="Update_test">
            </form>
            </div>
        </body>
        </html>';
    }
    else
    echo "invalid credentials!";

?>