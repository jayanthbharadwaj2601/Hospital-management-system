<?php
    $username=$_POST['username'];
    $password=$_POST['password'];
    if($username=="Admin@123" && $password=="HelloAdmin")
    {
        echo "<header style='font-size: 30px; color: white; background-color:DarkCyan; text-shadow: 2px 2px 2px black;font-weight:bold; padding: 6px 6px; margin:0; font-family:arial; width:1600px; position:relative; right:10px; bottom: 10px;'> Welcome Admin!</header>";
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <style>
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
			width:220px;
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
    </style>
        </head>
        <body>
            <div class="container" align="center">
            <form action="create_doctor.html" method="POST">
                <input type="submit" name="submit" value="create_doctor" class="button_1">
            </form>
            <form action="create_patient.html" method="POST">
                <input type="submit" name="submit" value="create_patient" class="button_1">
            </form>
            <form action="create_receptionist.html" method="POST">
                <input type="submit" name="submit" value="create_receptionist" class="button_1">
            </form>
            <form action="create_pharmacist.html" method="POST">
                <input type="submit" name="submit" value="create_pharmacist" class="button_1">
            </form>
            <form action="create_labtechnician.html" method="POST">
                <input type="submit" name="submit" value="create_labtechnician" class="button_1">
            </form>
            </div>
        </body>
        </html>';
    }
    else
    {
        echo "incorrect credentials";
    }
?>