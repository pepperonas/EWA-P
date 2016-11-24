<?php
if (!file_exists('/Applications/XAMPP/htdocs/EWA-P/out')) {
    mkdir('/Applications/XAMPP/htdocs/EWA-P/out', 0777, true);
}
$postparams=print_r($_POST,true);
file_put_contents("/Applications/XAMPP/htdocs/EWA-P/out/post".time().".txt",$postparams);
?>