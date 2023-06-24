<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "user";

$data = mysqli_connect($host, $user, $password, $db);

if ($data === false) {
    die("Connection failed");
}
//sum of customer 1 quantity row wise
$sum1 = "SELECT SUM(quantity) AS value_sum FROM customer1"; 
$result1 = mysqli_query($data,$sum1); 
$row1 = mysqli_fetch_assoc($result1); 
$sum1 = $row1['value_sum'];

//sum of customer 2 quantity row wise
$sum2 = "SELECT SUM(quantity) AS value_sum FROM customer2"; 
$result2 = mysqli_query($data,$sum2); 
$row2 = mysqli_fetch_assoc($result2); 
$sum2 = $row2['value_sum'];

//sum of customer 1 weight row wise
$sum3 = "SELECT SUM(weight) AS value_sum FROM customer1"; 
$result3 = mysqli_query($data,$sum3); 
$row3 = mysqli_fetch_assoc($result3); 
$sum3 = $row3['value_sum'];

//sum of customer 2 weight row wise
$sum4 = "SELECT SUM(weight) AS value_sum FROM customer2"; 
$result4 = mysqli_query($data,$sum4); 
$row4 = mysqli_fetch_assoc($result4); 
$sum4 = $row4['value_sum'];


//sum of customer 1 count row wise
$sum7 = "SELECT SUM(count) AS value_sum FROM customer1"; 
$result7 = mysqli_query($data,$sum7); 
$row7 = mysqli_fetch_assoc($result7); 
$sum7 = $row7['value_sum'];

//sum of customer 2 count row wise
$sum8 = "SELECT SUM(count) AS value_sum FROM customer2"; 
$result8 = mysqli_query($data,$sum8); 
$row8 = mysqli_fetch_assoc($result8); 
$sum8 = $row8['value_sum'];

//total quantity,weight,count of customer 1 & 2 and storing in admin table
$sum9 = $sum1+$sum2;
$sum10 = $sum3+$sum4;
$sum11 = $sum7+$sum8;



//instering the value in admin table
$query = "INSERT INTO admin (customer1_quantity, customer2_quantity, customer1_weight, customer2_weight, customer1_count, customer2_count,quantity_sum,weight_sum,count_sum) VALUES ('$sum1', '$sum2', '$sum3', '$sum4', '$sum7', '$sum8','$sum9','$sum10','$sum11')";

$data = mysqli_query($data, $query);




session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
        
table{
    border:1px solid black;
    border-collapse: collapse;
    
    table-layout: fixed;
    width: 100%;
}



th{
    border:1px solid black;
    padding: 5px 0px 5px 0px;
    background-color: rgb(132, 135, 231);
}
td{
    border:1px solid black;
   padding: 5px 0px 5px 0px;
    
    text-align: center;
    vertical-align: middle;
    background-color: lightgray;
}

.yellow{
    background-color: yellow;
}
.lightblue{
    background-color: aqua;
}
    .logout-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #4CAF50;
        }
    </style>
</head>
<body>
    
<table>
  
    <tr>
        <th class="lightblue">Item/Customer</th>
        <th>Customer1</th>
        <th>Customer2</th>
        <th>Total</th>

    </tr>
    <tr>
        <th class="yellow">Quantity</th>
        <td><p><?php echo  $sum1; ?></p></td>
        <td><p><?php echo  $sum2; ?></p></td>
        <td><p><?php echo  $sum9; ?></p></td>
    </tr>
    <tr>
        <th class="yellow">Weight</th>
        <td class="lightblue"><p><?php echo  $sum3; ?></p></td>
        <td class="lightblue"><p><?php echo  $sum4; ?></p></td>
        <td class="lightblue"><p><?php echo  $sum10; ?></p></td>
    </tr>
    <tr>
        <th class="yellow">Box Count</th>
        <td><p><?php echo  $sum7; ?></p></td>
        <td><p><?php echo  $sum8; ?></p></td>
        <td><p><?php echo  $sum11; ?></p></td>
    </tr>
</table>

<a href="logout.php" class="logout-link">Logout</a>

</body>
</html>