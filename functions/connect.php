<?php
$SERVER = "localhost";
$USER = "root";
$PASSWORD = "";
$DBNAME = "segad";

// اتصال بقاعدة البيانات
$connect = new mysqli($SERVER, $USER, $PASSWORD, $DBNAME);

// التحقق من الاتصال
if ($connect->connect_error) {
    die("فشل الاتصال: " . $connect->connect_error);
}

// المسار الذي سيتم حفظ ملف النسخ الاحتياطي عليه (نفس الملف دائمًا)
$backup_file = 'D:\قاعده البيانات\segad.sql';

// افتح ملف النسخ الاحتياطي للكتابة
$file = fopen($backup_file, 'w');

if (!$file) {
    die("حدث خطأ أثناء فتح ملف النسخ الاحتياطي للكتابة");
}

// البيانات التي ستتم إضافتها إلى ملف النسخ الاحتياطي
$data = "-- phpMyAdmin SQL Dump\n";
$data .= "-- version 5.2.0\n";
$data .= "-- https://www.phpmyadmin.net/\n";
$data .= "--\n";
$data .= "-- Host: 127.0.0.1\n";
$data .= "-- Generation Time: " . date('M d, Y') . " at " . date('h:i A') . "\n";
$data .= "-- Server version: " . $connect->server_info . "\n";
$data .= "-- PHP Version: " . phpversion() . "\n";
$data .= "\n";
$data .= "SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";\n";
$data .= "START TRANSACTION;\n";
$data .= "SET time_zone = \"+00:00\";\n\n";

$tables = array();
$result = $connect->query("SHOW TABLES");
while ($row = $result->fetch_row()) {
    $tables[] = $row[0];
}

foreach ($tables as $table) {
    $data .= "--\n-- Table structure for table `$table`\n--\n\n";
    $table_structure_query = "SHOW CREATE TABLE $table";
    $structure_result = $connect->query($table_structure_query);
    $structure_row = $structure_result->fetch_assoc();
    $data .= $structure_row['Create Table'] . ";\n\n";
    
    $data .= "--\n-- Dumping data for table `$table`\n--\n\n";
    $data_query = "SELECT * FROM $table";
    $result = $connect->query($data_query);
    while ($row = $result->fetch_assoc()) {
        $data .= "INSERT INTO `$table` (";
        $data .= implode(', ', array_keys($row)) . ") VALUES (";
        $values = "";
        foreach ($row as $key => $value) {
            $values .= "'" . $connect->real_escape_string($value) . "', ";
        }
        $data .= rtrim($values, ', ') . ");\n";
    }
    $data .= "\n";
}

fwrite($file, $data);
fclose($file);

?>
