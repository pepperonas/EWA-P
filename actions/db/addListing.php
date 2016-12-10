<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 10.12.2016
 * Time: 12:41 AM
 */

include('/Applications/XAMPP/htdocs/EWA-P/actions/db/database_helper.php');

$last_order = $_POST['last_order'];
$type = $_POST['type'];
$state = $_POST['state'];
$price = $_POST['price'];
addListing($last_order, $type, $state, $price);
