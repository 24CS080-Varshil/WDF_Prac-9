<?php
include 'dbconnect.php';
    $my_file=fopen("D:\\Study\\WDF\\prac_9.csv","w") or die("Unable to open file");
        $sql = "SELECT * FROM complaints";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Write CSV header
            $header = "Customer_id,Customer_name,Contact_number,Email,Address_v,Order_date,Product,Quantity\n";
            fwrite($my_file, $header);
            
            while($row = $result->fetch_assoc()) {
                $txt = $row["Customer_id"]. "," . $row["Customer_name"]. "," . $row["Contact_number"]. "," . $row["Email"]. "," . $row["Address_v"]. "," .$row["Order_date"]. "," .$row["Product"]. "," .$row["Quantity"]. "\n";
                fwrite($my_file,$txt);
            }
            fclose($my_file);
            header("location: form.php");
        } else {
            fclose($my_file);
            echo "No records found to export.";
        }
        $conn->close();
?>