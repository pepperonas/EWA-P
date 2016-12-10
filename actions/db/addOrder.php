<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 10.12.2016
 * Time: 12:41 AM
 */

include('/Applications/XAMPP/htdocs/EWA-P/actions/db/database_helper.php');

$cfn = $_POST['firstname'];
$cln = $_POST['lastname'];
$azip = $_POST['zip'];
$atown = $_POST['town'];
$astr = $_POST['street'];
$ahn = $_POST['house_number'];
echo addOrder($cfn . ' ' . $cln, $azip . ' ' . $atown . ', ' . $astr . ' '
    . $ahn);

