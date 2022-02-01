<?php
$servername="localhost";
$username="root";
$password="admin";

try {
    // initiate connection
    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // create database
    $sql = "CREATE DATABASE IF NOT EXISTS products";
    $conn->exec($sql);
    $sql = "use products";
    $conn->exec($sql);

    // products table
    $sql = "CREATE TABLE IF NOT EXISTS products (
                sku varchar(255) PRIMARY KEY,
                name varchar(255) NOT NULL,
                price float NOT NULL)";
    $conn->exec($sql);

    // products metadata table
    $sql = "CREATE TABLE IF NOT EXISTS products_meta (
                sku varchar(255) PRIMARY KEY,
                meta_name varchar(255) NOT NULL,
                meta_value varchar(255) NOT NULL,
                FOREIGN KEY (sku) REFERENCES products(sku))";
    $conn->exec($sql);

    // success message
    echo "migration successful";
}
// error message
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}
