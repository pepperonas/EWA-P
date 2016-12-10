<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">

    <!-- If IE use the latest rendering engine -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Fahrer</title>
</head>


<?php
include('/Applications/XAMPP/htdocs/EWA-P/actions/db/database_helper.php');
createDb();
?>

<body>

<header>
    <h1>Fahrer</h1>
</header>


<?php
$connection = getConnection();
$query_orders = mysqli_query($connection, "SELECT * FROM orders");

while ($row_customer = mysqli_fetch_array($query_orders)) { ?>
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <th>Kunde</th>
            <td><?php echo $row_customer['CustomerName']; ?></td>
            <td> <?php echo $row_customer['CustomerAddress']; ?></td>
        </tr>
        <?php
        $customer_id = $row_customer['ID'];
        $query_order_listings = mysqli_query($connection, "SELECT * FROM listings WHERE FK_order = $customer_id");

        $m = 0;
        $s = 0;
        $h = 0;
        $total = 0;
        while ($row_listing = mysqli_fetch_array($query_order_listings)) {
            switch ($row_listing['PizzaType']) {
                case 'Margherita':
                    $m++;
                    $total += 4.00;
                    break;
                case 'Salami':
                    $s++;
                    $total += 5.50;
                    break;
                case 'Hawaii':
                    $h++;
                    $total += 5.00;
                    break;
            }
        }
        ?>
        <tr>
            <th>Ware</th>
            <td>Margherita: <?php echo $m ?>x</td>
            <td>Salami: <?php echo $s ?>x</td>
            <td>Hawaii: <?php echo $h ?>x</td>
        </tr>
        <tr>
            <th>Preis</th>
            <td> <?php echo $total ?>€</td>
        </tr>

        </br>
    </table>
<?php } ?>


<footer>
    <a href="index.php">zurück</a>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

</body>

</html>