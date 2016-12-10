<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">

    <!-- If IE use the latest rendering engine -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <script src="js/jquery-3.1.1.js"></script>

    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Bestellung</title>
</head>

<?php
include('/Applications/XAMPP/htdocs/EWA-P/actions/db/database_helper.php');
createDb();
?>

<body onload="calculateTotal(), getSource()">


<header>
    <h1>Neue Bestellung</h1>
</header>

<table width="30%" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td><img src='images/margherita.png' alt=''
                 onclick="addPizza('Margherita')"/></td>
        <td>Margherita</td>
        <td>4€</td>
    </tr>
    <tr>
        <td><img src='images/salami.png' alt=''
                 onclick="addPizza('Salami')"/></td>
        <td>Salami</td>
        <td>5,50€</td>
    </tr>
    <tr>
        <td><img src='images/hawaii.png' alt=''
                 onclick="addPizza('Hawaii')"/></td>
        <td>Hawaii</td>
        <td>5€</td>
    </tr>

</table>

<br>


<p>Warenkorb</p>
<select id="cart" class="select-card" name="pizza_selection" size="5">
    <option>Margherita</option>
    <option>Hawaii</option>
</select>
<br>
<br>
<button class="btn btn-danger btn-lg" role="button" type="reset"
        value="clear_selection" onclick="clearCardSelection()">Auswahl löschen
</button>
<button class="btn btn-danger btn-lg" role="button" type="reset"
        value="clear_all" onclick="clearCartAll()">Alle löschen
</button>

<script language="JavaScript" type="text/javascript">

    var xmlhttp = new XMLHttpRequest();

    function getSource() {

        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("address_info").innerHTML =
                    xmlhttp.responseText;
            } else {
                document.getElementById("address_info").innerHTML =
                    'Warte auf Antwort vom Server';
            }
        };

        var address = document.getElementById("input_address_street").value;
        console.log("address=" + address);

        xmlhttp.open("GET",
            "http://localhost/EWA-P/actions/bestellung.php?address=" +
            address,
            true);
        xmlhttp.send(null);
    }

    function clearCartAll() {
        console.log("clearCartAll()");
        document.getElementById("cart").options.length = 0;
        document.getElementById("price_info").innerHTML = 'Gesamt: 0€';
    }

    function clearCardSelection() {
        var cart = document.getElementById("cart");
        /*can be shortened*/
        var deletedName = cart.options[cart.selectedIndex].value;
        var deletedIndex = cart.options[cart.selectedIndex].index;
        console.log("clearCardSelection('" + deletedName + "')");
        cart.removeChild(cart[deletedIndex]);
        calculateTotal();
    }

    function addPizza(type) {
        console.log("addPizza('" + type + "')");
        var cart = document.getElementById("cart");
        cart.options[cart.options.length] = new Option(type);
        calculateTotal();
    }

    function calculateTotal() {
        console.log("calculateTotal()");
        var total = 0;
        for (var i = 0; i < cart.length; i++) {
            var itemInCart = cart.options[i].value;
            switch (itemInCart) {
                case 'Margherita':
                    total += 4.00;
                    break;
                case 'Salami':
                    total += 5.50;
                    break;
                case 'Hawaii':
                    total += 5.00;
                    break;
            }

        }
        document.getElementById("price_info").innerHTML =
            'Gesamt: ' + total.toFixed(2).toString() + '€';
    }

    function pushInDb() {
        console.log("pushInDb()");

        // customer
        var firstname = document.getElementById("input_customer_name").value;
        var lastname = document.getElementById("input_customer_lastname").value;
        var zip = document.getElementById("input_address_zip").value;
        var town = document.getElementById("input_address_town").value;
        var street = document.getElementById("input_address_street").value;
        var house_number = document.getElementById("input_address_house_number").value;

        // pizza
        var last_order = 0;
        var type = "-unset-";
        var price = -1;

        function callback(data) {
            console.log('last_order=' + data);
            last_order = data;

            // loop through cart and store pizzas in db
            for (var i = 0; i < (document.getElementById("cart").length); i++) {
                console.log(document.getElementById("cart")[i].value);
                type = document.getElementById("cart")[i].value;
                switch (type) {
                    case 'Margherita':
                        price = 4.00;
                        break;
                    case 'Salami':
                        price = 5.50;
                        break;
                    case 'Hawaii':
                        price = 5.00;
                        break;
                }
                $.post('actions/db/addListing.php', {
                    last_order: last_order,
                    type: type,
                    state: 0,
                    price: price
                });
            }
        }

        $.post('actions/db/addOrder.php', {
            firstname: firstname,
            lastname: lastname,
            zip: zip,
            town: town,
            street: street,
            house_number: house_number
        }, function (data) {
            callback(data);
        });
    }

</script>


<br>
<br>

<form id="order_id" action="bestellung.php"
      method="post">

    <div class="price-total">
        <p id="price_info"></p>
    </div>
    <div class="address-info">
        <p id="address_info"></p>
    </div>

    Vorname:<br>
    <input id="input_customer_name" type="text" name="firstname" value="Mike"
           autofocus>
    <br>
    Nachname:<br>
    <input id="input_customer_lastname" class="input-order" type="text"
           name="lastname" value="Rophone">
    <br>
    Straße/Hausnummer:<br>
    <input id="input_address_street" oninput="getSource()" type="text"
           name="street" value="">
    <input id="input_address_house_number" class="input-order" type="text"
           name="house_number" value="">
    <br>
    PLZ/Stadt:<br>
    <input id="input_address_zip" type="text" name="zip" value="">
    <input id="input_address_town" class="input-order" type="text" name="town"
           value="">
    <br><br>
    <!--  NOTE: type="input" not working, but type="button" working  -->
    <button class="btn btn-danger btn-lg" role="button" type="button"
            onclick="pushInDb()"
            value="Bestellen">Bestellen
    </button>
    <!--            onclick="document.forms['order_id'].submit();"-->
    <button class="btn btn-danger btn-lg" role="button" type="reset"
            value="Reset" onclick="getSource()">Zurücksetzen
    </button>

</form>


<footer>
    <a href="index.php">zurück</a>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

</body>

</html>