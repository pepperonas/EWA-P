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

    <title>Kunde x</title>
</head>
<body>
<header>
    <h1>Kunde</h1>
</header>
<table align="center" width="80%" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <th class="table-driver" align="center"></th>
        <th class="table-driver" align="center">bestellt</th>
        <th class="table-driver" align="center">im Ofen</th>
        <th class="table-driver" align="center">fertig</th>
        <th class="table-driver" align="center">unterwegs</th>
    </tr>
    <tr align="center">
        <td>Margherita</td>
        <td align="center"><input type="radio" disabled="disabled" name="pizza1"
                                  value="1"/>
        </td>
        <td align="center"><input type="radio" disabled="disabled" name="pizza1"
                                  value="2"/>
        </td>
        <td align="center"><input type="radio" disabled="disabled" name="pizza1"
                                  value="3"
                                  checked/></td>
        <td align="center"><input type="radio" disabled="disabled" name="pizza1"
                                  value="4"/>
        </td>
    </tr>
    <tr align="center">
        <td>Salami</td>
        <td><input type="radio" disabled="disabled" name="pizza2" value="1"/>
        </td>
        <td><input type="radio" disabled="disabled" name="pizza2" value="2"
                   checked/></td>
        <td><input type="radio" disabled="disabled" name="pizza2" value="3"/>
        </td>
        <td><input type="radio" disabled="disabled" name="pizza2" value="4"/>
        </td>
    </tr>
    <tr align="center">
        <td>Tonno</td>
        <td><input type="radio" disabled="disabled" name="pizza3" value="1"/>
        </td>
        <td><input type="radio" disabled="disabled" name="pizza3" value="2"/>
        </td>
        <td><input type="radio" disabled="disabled" name="pizza3" value="3"
                   checked/></td>
        <td><input type="radio" disabled="disabled" name="pizza3" value="4"/>
        </td>
    </tr>
    <tr align="center">
        <td>Hawaii</td>
        <td><input type="radio" disabled="disabled" name="pizza4" value="1"/>
        </td>
        <td><input type="radio" disabled="disabled" name="pizza4" value="2"
                   checked/></td>
        <td><input type="radio" disabled="disabled" name="pizza4" value="3"/>
        </td>
        <td><input type="radio" disabled="disabled" name="pizza4" value="4"/>
        </td>
    </tr>
</table>

<br>

<nav>
    <ul>
        <a href="bestellung.php" class="btn btn-danger btn-lg" role="button">Neue
            Bestellung</a>
    </ul>
</nav>

<footer>
    <a href="index.php">zurück</a>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

</body>

</html>