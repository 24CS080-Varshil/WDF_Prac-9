<?php
include 'dbconnect.php';
if($_SERVER["REQUEST_METHOD"]   == "POST"){
    $customer_name=trim(htmlspecialchars($_POST['c_name']));
    $mobile=trim(htmlspecialchars($_POST['c_mob']));
    $email=trim(htmlspecialchars($_POST['c_email']));
    $address_c=trim(htmlspecialchars($_POST['address']));
    $oreder_date=trim(htmlspecialchars($_POST['o_date']));
    $product=trim(htmlspecialchars($_POST['product']));
    $quantity=trim(htmlspecialchars($_POST['quan']));
    
    $sql="INSERT INTO complaints(Customer_name, Contact_number, Email, Address_v, Order_date, Product, Quantity) VALUES ('$customer_name', '$mobile', '$email', '$address_c', '$oreder_date', '$product', '$quantity')";

    if($conn->query($sql)===TRUE){
        header("location:dbtoFile.php");
        exit();
    }
    else{
        echo "Error : " . $conn->error . "<hr>";
        $conn->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Complaint Form</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <div class="container">
        <h1 class="title">Customer Complaint Form</h1>
        <p class="subtitle">We value your feedback and will address your concerns promptly</p>
        
        <form method="post">
            <div class="form-group">
                <label for="c_name">Full Name</label>
                <input type="text" name="c_name" id="c_name" placeholder="Enter your full name" required>
            </div>
            
            <div class="form-group">
                <label for="c_mob">Mobile Number</label>
                <input type="number" name="c_mob" id="c_mob" placeholder="Enter your mobile number" required>
            </div>
            
            <div class="form-group">
                <label for="c_email">Email Address</label>
                <input type="email" name="c_email" id="c_email" placeholder="Enter your email address" required>
            </div>
            
            <div class="form-group">
                <label for="address">Address</label>
                <textarea name="address" id="address" placeholder="Enter your complete address" required></textarea>
            </div>
            
            <div class="form-group">
                <label for="o_date">Order Date</label>
                <input type="date" name="o_date" id="o_date" required>
            </div>
            
            <div class="form-group">
                <label for="product">Product Name</label>
                <input type="text" name="product" id="product" placeholder="Enter the product name" required>
            </div>
            
            <div class="form-group">
                <label for="quan">Quantity</label>
                <input type="number" name="quan" id="quan" placeholder="Enter quantity" min="1" required>
            </div>
            
            <button type="submit" class="submit-btn">Submit Complaint</button>
        </form>
        
        <div class="back-link">
            <a href="index.html">← Back to Home</a>
        </div>
    </div>
</body>

</html>
