<?php
$host="localhost";
$user="root";
$password="";
$db="user";

session_start();

$data = mysqli_connect($host,$user,$password,$db);

if($data===false){
    die("connection failed");
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=$_POST["username"];
    $password=$_POST["password"];

    $sql="SELECT * FROM login WHERE username='$username' AND password='$password'";
    $result=mysqli_query($data,$sql);
    $row=mysqli_fetch_array($result);

    if($row["usertype"]=="customer1"){
        
        header("location:customer1.php");
    }
    elseif($row["usertype"]=="customer2"){
       
        header("location:customer2.php");
    }
    elseif($row["usertype"]=="admin"){
        
        header("location:adminhome.php");
    }
    else{
        echo "username or password is incorrect";
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: #f1f1f1;
        }

        #cover {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
            display: block;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: block;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div id="cover">
        <form action="#" method="POST">
            <div>
                <label for="username">ID</label>
                <input type="text" id="username" name="username" class="response" required>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="response" required>
            </div>
            <div>
                <input type="submit" value="SIGN IN">
            </div>
        </form>
    </div>
</body>
</html>
