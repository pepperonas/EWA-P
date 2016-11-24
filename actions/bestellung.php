<?php
header ("Content-Type:text/xml");
echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';

echo '<response>';
    $address = $_GET['address'];
    if($address!=''){
        echo 'Alles klar.';
    } else echo 'Bitte Adresse eingeben.';
echo '</response>';
?>