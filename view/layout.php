<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php?action=home">Home</a></li>
                <li><a href="index.php?action=listFilms">Film</a></li>
                <li><a href="index.php?action=listGenres">Genre</a></li>
                <li><a href="index.php?action=listRealisateurs">Realisateurs</a></li>
                <li><a href="index.php?action=listActeurs">Acteurs</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <?=$contenu ?>
    </main>
    <footer></footer>
</body>
</html>