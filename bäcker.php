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


    <title>B&auml;cker</title>
</head>


<?php
include('/Applications/XAMPP/htdocs/EWA-P/actions/db/database_helper.php');
createDb();
?>

<body>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<header>
    <h1>B&auml;cker</h1>
</header>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <th></th>
        <th align="left">bestellt</th>
        <th align="left">im Ofen</th>
        <th align="left">fertig</th>
    </tr>

    <?php
    $connection = getConnection();
    $query_orders = mysqli_query($connection, "SELECT * FROM orders");

    while ($row_customer = mysqli_fetch_array($query_orders)) { ?>
        <tr>
            <td class="listing_cook_customer">
                <?php echo $row_customer['CustomerName']; ?>
                <?php echo $row_customer['CustomerAddress']; ?>
            </td>
        </tr>

        <?php
        $customer_id = $row_customer['ID'];
        $query_order_listings = mysqli_query($connection, "SELECT * FROM listings WHERE FK_order = $customer_id");
        while ($row_listing = mysqli_fetch_array($query_order_listings)) {
            ?>
            <tr>
                <td><?php echo $row_listing['PizzaType'] ?></td>
                <td><input type="radio"
                           onchange="onRadioChanged(<?php echo $row_listing['ID'] ?>,0)"
                           name=<?php echo '"pizza' . $row_listing['ID'] . '"' ?>
                        <?php echo ($row_listing['PizzaState'] == 0) ? 'checked' : '' ?>/>
                </td>
                <td><input type="radio"
                           onchange="onRadioChanged(<?php echo $row_listing['ID'] ?>,1)"
                           name=<?php echo '"pizza' . $row_listing['ID'] . '"' ?>
                        <?php echo ($row_listing['PizzaState'] == 1) ? 'checked' : '' ?>/>
                </td>
                <td><input type="radio"
                           onchange="onRadioChanged(<?php echo $row_listing['ID'] ?>,2)"
                           name=<?php echo '"pizza' . $row_listing['ID'] . '"' ?>
                        <?php echo ($row_listing['PizzaState'] == 2) ? 'checked' : '' ?>/>
                </td>
            </tr>
            <?php
        }
        ?>

        </br>
    <?php } ?>

    <script language="JavaScript" type="text/javascript">
        function onRadioChanged(id, state) {
            console.log("onRadioChanged (id=" + id + ", state=" + state + ")");
            $.post('actions/db/changeState.php', {
                pizza_id: id,
                state: state
            })
        }
    </script>

</table>

<footer>
    <a href="index.php">zurück</a>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

</body>

</html>