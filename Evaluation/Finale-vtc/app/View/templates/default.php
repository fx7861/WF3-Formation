<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <title>VTC</title>
    <style>
        header a {color: white}
        .fa-times{color: darkred}
        .fa-pencil-alt{color: cornflowerblue}
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <ul class="nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="?p=conducteur">Conducteur</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?p=vehicule">Véhicule</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?p=association">Association</a>
                </li>
            </ul>
        </nav>
    </header>

    <main class="container my-5">
        <?=  $content; ?>
    </main>


</body>
</html>