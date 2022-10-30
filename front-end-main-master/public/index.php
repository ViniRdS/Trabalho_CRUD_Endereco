<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="cavalo1.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="./css/index.css">
    <title>Início</title>
</head>

<body>
<nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <img src="./WhatsApp Image 2022-10-29 at 5.44.18 PM.jpeg" alt="some text" width=40 height=35>
            <a class="navbar-brand" href="./index.php">⠀Horse Store</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./index.php">
                            <i class="fa-solid fa-house"> </i> Início
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listaclientes.php">
                            <i class="fa-solid fa-user"> </i> Clientes
                        </a>
                    </li>

                </ul>
            </div>
            <div>

            </div>
        </div>
    </nav>
    <section>
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="./cavalocorpo.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block text-h5">
                    <h5>Ternos de altíssima qualidade para seu cavalo</h5>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="./WhatsApp Image 2022-10-29 at 5.27.13 PM.jpeg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block text-h5">
                    <h5>Ternos para o dia a dia</h5>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./WhatsApp Image 2022-10-29 at 5.29.13 PM.jpeg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block" id="horse-pink">
                    <h5>Ternos para ocasiões especiais</h5>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <footer>
    <h5>Desenvolvido por Suit Horse</h5>
    </footer>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>