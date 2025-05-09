<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$pdo= new PDO ('sqlite:'. __DIR__.'/../Slim/data/database.sqlite');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// Instantiate App
$app = AppFactory::create();



// Add routes
$app->get('/', function (Request $request, Response $response) use ($pdo){
    $stm=$pdo->query("SELECT * from artists");
    $artistas=$stm->fetchAll(PDO::FETCH_ASSOC);

    $htmlContent.=`
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\indexCss.css">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="scripts/index.js" defer></script>

</head>

<body>
    <header id="header">
        <nav>
            <h2>El universo musical</h2>
            <div id="enlancesNav">
                <a href="busqueda.html"><i class="fas fa-search"></i></a>
                <a href="index.html">Home</a>
                <a href="log_in.html">Log in</a>
                <a href="sobreNosotros.html">About us</a>
                <a href="soporte.html">Soporte</a>
                <a href="perfil_usuario.html"><i class="fas fa-user"></i></a>
            </div>
        </nav>
    </header>

    <section id="artitas">
        <h2>Artistas más escuchados</h2>
        <div id="lista-artistas">
        </div>
        <button id="verMasArtistas" class="arrow-button">
            <i class="fas fa-chevron-down"></i> <!-- Ícono de flecha -->
        </button>
    </section>

    <section id="canciones">
        <h2>Canciones populares</h2>
        <div id="lista-canciones">
        </div>
        <button id="verMasCanciones" class="arrow-button">
            <i class="fas fa-chevron-down"></i> <!-- Ícono de flecha -->
        </button>
    </section>

    <section id="albumes">
        <h2>Álbumes recomendados</h2>
        <div id="lista-albumes">
        <button id="verMasAlbumes" class="arrow-button">
            <i class="fas fa-chevron-down"></i> <!-- Ícono de flecha -->
        </button>
    </section>
    <footer id="footer">
        <div>
            <p>© 2025 El universo musical</p>
            <div class="social-icons">
                <a href="#" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="#" target="_blank" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" target="_blank" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
                <a href="#" target="_blank" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </footer>
</body>

</html>
    
    
    
    `;

    $response->getBody()->write($htmlContent);
    return $response->withHeader('Content-type', 'text/html');
   
});

$app->get('/hello/{name}', function (Request $request, Response $response, $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");
    return $response;
});

$app->run();

?>