<?php 

require "connect.php";

$xxsearch = $_POST['xxsearch'];

$select = $connect->query("SELECT * FROM clients WHERE name LIKE '%$xxsearch%'");
$counttt = $select->num_rows;

if ($counttt > 0) {
    while ($row = $select->fetch_assoc()) { 
        echo "<div style='color:blue;'>".$row['name']."</div>";
    }
} else {
    echo "لا يوجد نتائج";
}
?>



