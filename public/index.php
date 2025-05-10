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

    $htmlContent ="
    <!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='/css/style.css'>
    <script src='/scripts/header.js' defer></script>
    <script src='/scripts/footer.js' defer></script>
    <title>Home</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css'>
    <script src='scripts/index.js' defer></script>

</head>

<body>
    <header id='header'>
    </header>

    <section id='artistas'>
        <h2>Artistas más escuchados</h2>
        <div id='lista-artistas'>";
        foreach($artistas as $artista){
        $encodedName = urlencode($artista['stage_name']);//codifico el nombre por si tiene espacios
            $htmlContent.="
            <div>
            <h3>{$artista['stage_name']}</h3>
            <a href='/detalle_artistas/{$encodedName}'><img src='{$artista['image_url']}'></a>
            </div>";
        }
        $htmlContent.='</div>
    </section>
    <footer id="footer">
    </footer>
</body>

</html>';

    $response->getBody()->write("$htmlContent");
    return $response->withHeader('Content-type', 'text/html');
   
});


//artista página de detalle
$app->get('/detalle_artistas/{name}', function($request, Response $response,$args) use($pdo){
    // Recuperar el nombre del artista de la URL y reemplazar los signos de '+' por espacios
    $stage_name = str_replace('+', ' ', htmlspecialchars($args['name']));
    $stm=$pdo->prepare("SELECT * from artists where stage_name=:stage_name");
    $stm->bindValue(":stage_name",$stage_name,PDO::PARAM_STR);//SQLITE3_TEXT
    $stm->execute();
    $artistas=$stm->fetchAll(PDO::FETCH_ASSOC);
    $artista=$artistas[0] ?? null;//espero un solo artista

    
    if (!$artista) {
        $response->getBody()->write("Artista no encontrado");
        return $response->withStatus(404);
    }

    $artist_id=$artista['id'];
    $stm_canc=$pdo->prepare("SELECT * from songs where artist_id=:artist_id");
    $stm_canc->bindValue(":artist_id",$artist_id,PDO::PARAM_INT);
    $stm_canc->execute();
    $canciones=$stm_canc->fetchAll(PDO::FETCH_ASSOC);

    $encodedName = urlencode($artista['stage_name']);
    $htmlContent="<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='/css/artista.css'>
    <script src='/scripts/header.js' defer></script>
    <script src='/scripts/footer.js' defer></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css'>
    <script src='scriptArtista.js' defer></script>

    <title>Artista</title>
</head>

<body>
    <header id='header'>
    </header>
    <div id='container'>
   <a href='/'><i class='fa-solid fa-arrow-left'></i></a> 
    <h2 id='art_nom'>{$artista['stage_name']}</h2>
    <img src='{$artista['image_url']}' id='img'>
    <p><strong>Real name: </strong>{$artista['real_name']}</p>
    <p><strong>Debut year: </strong>{$artista['debut_year']}</p>
    <p><strong>Top songs: </strong>{$artista['top_songs']}</p>
    <h3>Biografía: </h3>
    <p>{$artista['bio']}</p>
    <section id='canciones_po'>
        <h2>Canciones más populares</h2>
        <ul id='lista-canciones'>";
        foreach($canciones as $cancion){
            $htmlContent.="<li>
                <a href='/detalle_cancion/{$cancion['id']}/{$encodedName}'><p>{$cancion['title']}</p></a>
            </li>";
        }
    $htmlContent.=" </ul>
    </section>  
    </div>
    <footer id='footer'>
    </footer>
</body>
</html>";

$response ->getBody()->write($htmlContent);
return $response->withHeader('Content-Type','text/html');
});

//Canción página de detalle
$app->get('/detalle_cancion/{id}/{name}', function ($request, Response $response,$args) use($pdo){
    $id=$args['id'];
    $stage_name = str_replace('+', ' ', htmlspecialchars($args['name']));
    $stm=$pdo->prepare("SELECT * from songs where id=:id");
    $stm->bindValue(":id",$id,PDO::PARAM_INT);
    $stm->execute();
    $canciones=$stm->fetchALL(PDO::FETCH_ASSOC);
    $cancion=$canciones[0];

     if (!$cancion) {
        $response->getBody()->write("Canción no encontrada");
        return $response->withStatus(404);
    }

    $htmlContent="<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='/css/cancion.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css'>
    <script src='/scripts/header.js' defer></script>
    <script src='/scripts/footer.js' defer></script>
    <title>Canción</title>
</head>
<body>
    <header id='header'>
    </header>
    <div id='container'>
        <a href='/detalle_artistas/{$stage_name}'><i class='fa-solid fa-arrow-left'></i></a> 
        <div id='titulo'>
        <h2 id='can_nom'>{$cancion['title']}</h2>
        <a href='{$cancion['youtube_url']}'><i class='fas fa-music'></i></a>
        </div>
        <img src='{$cancion['image_url']}' id='img_cancion' alt='foto de la cancion {$cancion['title']} '>
        <section id='info_can'>
        <h3><a href='/detalle_artistas/{$stage_name}'>Artista: {$stage_name}</a></h3>
        <p><strong>Released: </strong>{$cancion['release_year']}</p>
        <p><strong>Album: </strong>{$cancion['album']}</p>
        <p><strong>Reproduciones: </strong>{$cancion['plays']}</p>
        <p><strong>Historia: </strong>{$cancion['story_summary']} </p>
        <h3>Letra: </h3>
        <p>{$cancion['lyrics']}</p>
        </section>
    </div>
    <footer id='footer'>
    </footer>
</body>

</html>";

$response ->getBody()->write($htmlContent);
return $response->withHeader('Content-Type','text/html');

});

$app->run();

?>