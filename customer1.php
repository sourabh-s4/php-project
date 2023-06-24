<?php
session_start();
$host = "localhost";
$user = "root";
$password = "";
$db = "user";

$data = mysqli_connect($host, $user, $password, $db);

if ($data === false) {
    die("Connection failed");
}

if (isset($_POST['submit'])) {
    $orderdate = $_POST['orderdate'];
    $company = $_POST['company'];
    $owner = $_POST['owner'];
    $item = $_POST['item'];
    $quantity = $_POST['quantity'];
    $weight = $_POST['weight'];
    $shipment = $_POST['shipment'];
    $trackingid = $_POST['trackingid'];
    $size = $_POST['size'];
    $count = $_POST['count'];
    $specs = $_POST['specs'];
    $checklist = $_POST['checklist'];

    $query = "INSERT INTO customer1 (orderdate, company, owner, item, quantity, weight, shipment, trackingid, size, count, specs, checklist) VALUES ('$orderdate', '$company', '$owner', '$item', '$quantity', '$weight', '$shipment', '$trackingid', '$size', '$count', '$specs', '$checklist')";

    $data = mysqli_query($data, $query);

    if ($data) {
        echo "Data inserted successfully.";
    } else {
        echo "Failed to insert data.";
    }
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Styled Form</title>
    <style>
        .my-form {
            width: 300px;
            margin: 20px auto;
        }
        
        .my-form div {
            margin-bottom: 10px;
        }
        
        .my-form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        
        .my-form input[type="text"],
        .my-form input[type="number"],
        .my-form input[type="date"],
        .my-form input[type="submit"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        
        .my-form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
        
        .my-form input[type="submit"]:hover {
            background-color: #45a049;
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
    <form action="#" method="POST" class="my-form">
        <div>
            <label for="orderdate">Order Date</label>
            <input type="date" id="orderdate" name="orderdate" required>
        </div>
        <div>
            <label for="company">Company</label>
            <input type="text" id="company" name="company" pattern="[A-Za-z0-9]+" required>
        </div>
        <div>
            <label for="owner">Owner</label>
            <input type="text" id="owner" name="owner" pattern="[A-Za-z0-9]+" required>
        </div>
        <div>
            <label for="item">Item</label>
            <input type="text" id="item" name="item" required>
        </div>
        <div>
            <label for="quantity">Quantity</label>
            <input type="number" id="quantity" name="quantity" required>
        </div>
        <div>
            <label for="weight">Weight</label>
            <input type="number" id="weight" step="any" name="weight" required>
        </div>
        <div>
            <label for="shipment">Request for Shipment</label>
            <input type="text" id="shipment" name="shipment" required>
        </div>
        <div>
            <label for="trackingid">Tracking ID</label>
            <input type="text" id="trackingid" name="trackingid" required>
        </div>
        <div>
            <label for="size">Shipment Size</label>
            <input type="text" id="size" name="size" required>
        </div>
        <div>
            <label for="count">Box Count</label>
            <input type="number" id="count" name="count" required>
        </div>
        <div>
            <label for="specs">Specification</label>
            <input type="text" id="specs" name="specs" required>
        </div>
        <div>
            <label for="checklist">Checklist Quantity</label>
            <input type="text" id="checklist" name="checklist" required>
        </div>
        <div>
            <input type="submit" value="SUBMIT" name="submit">
        </div>
    </form>
    <a href="logout.php" class="logout-link">Logout</a>
</body>
</html>
