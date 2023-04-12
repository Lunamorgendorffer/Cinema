<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/style.css">
    <title><?=$title?></title>
</head>
<body class= "wallpaper">
    <header class="p-3 text-bg-dark">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a class="nav-link px-2 text-white" href="index.php?action=home">HOME</a></li>
                    <li><a  class="nav-link px-2 text-white"href="index.php?action=listFilms">FILMS</a></li>
                    <li><a  class="nav-link px-2 text-white" href="index.php?action=listGenres">GENRES</a></li>
                    <li><a  class="nav-link px-2 text-white" href="index.php?action=listRealisateurs">REALISATEURS</a></li>
                    <li><a  class="nav-link px-2 text-white" href="index.php?action=listActeurs">ACTEURS</a></li>
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
                </form>

                <div class="text-end">
                <button type="button" class="btn btn-outline-light me-2">MON COMPTE</button>
                <button type="button" class="btn btn-warning">S'INSCRIRE</button>
                </div>
            </div>
        </div>
    </header>
    <main >
        <?=$contenu ?>
    </main>
    <footer></footer>
</body>
</html>