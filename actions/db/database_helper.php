<?php

function getConnection()
{
    $host = 'localhost';
    $user = "root";
    $password = "";
    $database = "pizza_db";

    $connection = new mysqli($host, $user, $password) or die(".........");

    if ($connection->query("Create database if not exists " . $database)) {
    }

    $connection->select_db($database);
    return $connection;
}

function createDb()
{
    // ORDERS
    $query = "CREATE TABLE orders (
    ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    CustomerName VARCHAR(50),
    CustomerAddress VARCHAR(500)
)";
    $connection = getConnection();
    $connection->query($query);

    // LISTINGS
    $query = "CREATE TABLE listings (
    ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FK_order INT,
    PizzaType VARCHAR(20),
    PizzaState INT,
    Price INT
)";
    $connection = getConnection();
    $connection->query($query);

    $connection->close();
}

function addOrder($name, $address)
{
    $connection = getConnection();

    $query = "INSERT INTO orders 
        (`ID`, `CustomerName`,`CustomerAddress`) VALUES 
        ( 0,    '$name',         '$address')";

    mysqli_query($connection, $query);

    $query = mysqli_query($connection, "SELECT * FROM orders");
    $rows = mysqli_num_rows($query);
    $connection->close();
    return $rows;
}

function addListing($customer_id, $type, $state, $price)
{
    $connection = getConnection();

    $query = "INSERT INTO listings
        (`ID`, `FK_order`,`PizzaType`,`PizzaState`,`Price`) VALUES 
        ( 0,   $customer_id, '$type', $state, $price)";

    mysqli_query($connection, $query);
    $connection->close();
}

function changeState($pizza_id, $state)
{
    $connection = getConnection();

    $query = "UPDATE listings SET PizzaState = $state WHERE ID = '" . $pizza_id . "'";

    mysqli_query($connection, $query);
    $connection->close();
}

