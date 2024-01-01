<?php 

require "connect.php";

$xsearch = $_POST['xsearch'];

$select = $connect->query("SELECT * FROM expenses WHERE clause_name LIKE '%$xsearch%'");
$counttt = $select->num_rows;

if ($counttt > 0) {
    while ($row = $select->fetch_assoc()) { 
        echo "<div style='color:blue;'>".$row['clause_name']."</div>";
    }
} else {
    echo "لا يوجد نتائج";
}
?>



