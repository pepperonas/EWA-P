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
    <link rel="stylesheet" type="text/css" media="(max-width: 500px)"
          href="style_mobile.css"/>

    <title>Grätz / Pfeffer</title>
</head>
<body>
<header>
    <h1>Willkommen bei Pizza Alfredo!</h1>
</header>

<div>
    <nav>
        <ul>
            <a href="bestellung.php" class="btn btn-danger btn-lg"
               role="button">Neue
                Bestellung</a>
            <a href="fahrer.php" class="btn btn-danger btn-lg"
               role="button">Fahrer</a>
            <a href="bäcker.php" class="btn btn-danger btn-lg"
               role="button">Bäcker</a>
            <a href="kunde.php" class="btn btn-danger btn-lg"
               role="button">Kunde</a>


            <form action="actions/erstelle_datei.php" method="get">
                <input type="submit" value="Erstelle Datei!">
            </form>
        </ul>
    </nav>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

</body>

</html>