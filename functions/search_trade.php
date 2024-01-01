<?php 

require "connect.php";

$tradesearch = $_POST['tradesearch'];

$select = $connect->query("SELECT * FROM trader WHERE trader_name LIKE '%$tradesearch%'");
$counttt = $select->num_rows;

if ($counttt > 0) {
    while ($row = $select->fetch_assoc()) { 
        echo "<div style='color:blue;'>".$row['trader_name']."</div>";
    }
} else {
    echo "لا يوجد نتائج";
}
?>



