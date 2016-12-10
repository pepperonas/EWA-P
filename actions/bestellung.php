<?php
header ("Content-Type:text/xml");
echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';

echo '<response>';
    $address = $_GET['address'];
    if($address!=''){
        echo 'Alles klar.';
    } else echo 'Bitte Adresse eingeben.';
echo '</response>';

if (!file_exists('/Applications/XAMPP/htdocs/EWA-P/out')) {
    mkdir('/Applications/XAMPP/htdocs/EWA-P/out', 0777, true);
}
$postparams=print_r($_POST,true);
file_put_contents("/Applications/XAMPP/htdocs/EWA-P/out/post".time().".txt",$postparams);

?>