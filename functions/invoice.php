<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    require "connect.php";

    // Retrieve form input data
    $name_ = $_POST['search'];
    $date = $_POST['date'];
    $products = $_POST['products'];
    $prices = $_POST['prices'];
    $quantities = $_POST['quantities'];
    $result = $_POST['result'];
    $cost = $_POST['cost'];
    $paid = $_POST['paid'];
    $residual = $_POST['residual'];
    $debt = $_POST['debt'];

    // Check if the client name exists in the 'clients' table
    $check_client = $connect->query("SELECT * FROM clients WHERE name = '$name_'");
    if ($check_client->num_rows === 0) {
        // Client name does not exist, set an error message
        $error_message = "اسم العميل غير موجود في جدول العملاء.";
        header("location:../bill.php?page=invoice&notfound=" . urlencode($error_message));
    } else {
        // Fetch client information
        $client = $check_client->fetch_assoc();
        $client_name = $client['name'];

        // Create an array to keep track of selected products
        $selectedProducts = [];

        // Initialize an array to keep track of updated quantities
        $updatedQuantities = [];

        // Create an array to store product names
        $productNames = [];
        // Create an array to store product quantities
        $productQuantities = [];

        // Create a variable to store the total pieces
        $totalPieces = 0;

        // Variable to track product availability
        $productAvailability = true;

        // Loop through each product
        foreach ($products as $index => $product) {
            $quantity = $quantities[$index];

            // Check if the product is already selected
            if (in_array($product, $selectedProducts)) {
                // Product is already selected, show an error message
                $error_message = "لقد قمت بتحديد نفس المنتج مرتين أو أكثر في نفس الفاتورة.";
                header("location:../bill.php?page=invoice&notfound=" . urlencode($error_message));
                exit; // Stop further processing
            } else {
                // Add the product to the selected products array
                $selectedProducts[] = $product;
            }

            // Fetch the current quantity from expenses table
            $select_product_info = $connect->query("SELECT * FROM expenses WHERE clause_name = '$product'");
            $product_info = $select_product_info->fetch_assoc();
            $currentQuantity = $product_info['quantity'];

            // Calculate the updated quantity
            $updatedQuantity = $currentQuantity - $quantity;

            // Check if the product quantity is not available
            if ($updatedQuantity < 0) {
                $error_message = "الكمية المطلوبة غير متاحة حالياً.";
                header("location:../bill.php?page=invoice&notfound=" . urlencode($error_message));
                exit; // Stop further processing
            } else {
                // Add the product name with quantity and price between brackets to the array
                $productWithDetails = "$product (سعره: <b>". $prices[$index]."</b> x كميته: <b>$quantity</b>)";
                $productNames[] = $productWithDetails;
                // Add the product quantity to the array
                $productQuantities[] = $quantity;
                // Update the total pieces
                $totalPieces += $quantity;
                // Store the updated quantity
                $updatedQuantities[] = $updatedQuantity;
            }
        }

        // Combine product names into a single string
        $combinedProductNames = implode('/ ', $productNames);

        // Combine product quantities into a single string
        $combinedProductQuantities = implode('/ ', $productQuantities);

        // Calculate the total cost
        $totalCost = array_sum($prices);

        // Check product availability before updating the database
        if ($productAvailability) {
            // Insert product data into the 'invoice' table
            $insert_invoice = $connect->query("INSERT INTO invoice 
                (client_name, date, product, price, pieces, total, cost, paid, residual, debt)
                VALUES
                ('$name_', '$date', '$combinedProductNames', '$totalCost', '$totalPieces', '$result', '$cost', '$paid', '$residual', '$debt')");

            // Redirect to another page if the invoice is inserted successfully
            if ($insert_invoice) {
                header("location:../bill.php");
            }
        }

        // Update product quantities in the expenses table
        foreach ($products as $index => $product) {
            $updatedQuantity = $updatedQuantities[$index];
            $update_product = $connect->query("UPDATE expenses SET quantity = '$updatedQuantity' WHERE clause_name = '$product'");
        }

        // Calculate and update various totals
        $select_total = $connect->query("SELECT SUM(total) AS total_sum FROM invoice WHERE client_name = '$name_'");
        $total_row = $select_total->fetch_assoc();
        $total_sum = $total_row['total_sum'];

        $select_pieces = $connect->query("SELECT SUM(pieces) AS pieces_sum FROM invoice WHERE client_name = '$name_'");
        $pieces_row = $select_pieces->fetch_assoc();
        $pieces_sum = $pieces_row['pieces_sum'];

        $select_residual = $connect->query("SELECT SUM(residual) AS residual_sum FROM invoice WHERE client_name = '$name_'");
        $residual_row = $select_residual->fetch_assoc();
        $residual_sum = $residual_row['residual_sum'];

        $select_paid = $connect->query("SELECT SUM(paid) AS paid_sum FROM invoice WHERE client_name = '$name_'");
        $paid_row = $select_paid->fetch_assoc();
        $paid_sum = $paid_row['paid_sum'];

        // Check if client statement exists
        $select_client_statement = $connect->query("SELECT * FROM client_statement WHERE name = '$name_'");
        $client_statement_rows = $select_client_statement->num_rows;

        if ($client_statement_rows == 0) {
            // Insert new client statement
            $insert_client_statement = $connect->query("INSERT INTO client_statement 
                (name, client_total, client_pieces, client_paid, client_residual)
                VALUES
                ('$name_', '$total_sum', '$pieces_sum', '$paid_sum', '$residual_sum')");
        } else {
            // Update existing client statement
            $update_client_statement = $connect->query("UPDATE client_statement 
                SET client_total = '$total_sum', client_pieces = '$pieces_sum', client_paid = '$paid_sum', client_residual = '$residual_sum'  
                WHERE name = '$name_'");
        }
    }
}
?>
