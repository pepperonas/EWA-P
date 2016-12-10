<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 10.12.2016
 * Time: 12:41 AM
 */

include('/Applications/XAMPP/htdocs/EWA-P/actions/db/database_helper.php');

$id = $_POST['pizza_id'];
$state = $_POST['state'];
changeState($id, $state);

