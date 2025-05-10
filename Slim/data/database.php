<?php

$pdo=new PDO('sqlite:' . __DIR__ . '/database.sqlite');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$pdo->exec("PRAGMA foreign_keys = ON;");

$pdo->exec("CREATE TABLE artists (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    stage_name TEXT NOT NULL,
    real_name TEXT,
    bio TEXT,
    debut_year INTEGER,
    top_songs TEXT,
    image_url TEXT,
    total_plays INTEGER
);");

$pdo->exec("CREATE TABLE songs (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    artist_id INTEGER NOT NULL,
    title TEXT NOT NULL,
    release_year INTEGER,
    plays INTEGER,
    image_url TEXT,
    album TEXT,
    lyrics TEXT,
    story_summary TEXT,
    FOREIGN KEY (artist_id) REFERENCES artists(id)
);");




/*Insertar artistas*/

$pdo->exec("INSERT INTO artists (stage_name, real_name, bio, debut_year, top_songs, image_url, total_plays) VALUES
('Kygo', 'Kyrre Gørvell-Dahll', 'DJ y productor noruego pionero del tropical house.', 2013, 'Firestone, Stole the Show, It Ain’t Me', 'https://scenenow.com/Content/Admin/Uploads/Articles/ArticlesMainPhoto/60010/b5b16028-05f5-49df-8873-29b25596b223.jpg', 2500000000),
('Myles Smith', 'Myles Smith', 'Cantante y compositor británico, conocido por su estilo de pop melódico y letras emotivas.', 2019, 'Rain, Lost In You, The One', 'https://pmstudio.com/pmstudio/images/Myles-Smith2.jpg', 500000000),
('Twenty One Pilots', 'Tyler Joseph y Josh Dun', 'Dúo estadounidense conocido por su estilo alternativo y letras introspectivas.', 2009, 'Stressed Out, Ride, Heathens', 'https://ichef.bbci.co.uk/ace/standard/1024/cpsprodpb/142B7/production/_92351628_twentyonepilots-mainpub-jabarijacobs.jpg', 3500000000),
('Tems', 'Temilade Openiyi', 'Cantante y compositora nigeriana con un estilo único que mezcla R&B, soul y afrobeats.', 2018, 'Essence, Free Mind, Higher', 'https://npr.brightspotcdn.com/dims3/default/strip/false/crop/3000x2489+0+0/resize/1100/quality/50/format/jpeg/?url=http%3A%2F%2Fnpr-brightspot.s3.amazonaws.com%2Fa3%2Fa7%2F81b890fc4f7b8ce7aafc80d8ec3f%2Ftems.jpg', 750000000),
('Bleachers', 'Jack Antonoff', 'Proyecto musical de indie pop liderado por Jack Antonoff.', 2014, 'I Wanna Get Better, Rollercoaster, Don’t Take the Money', 'https://www.euphoriazine.com/wp-content/uploads/2024/08/Bleachers-2024-lead.webp', 800000000),
('Doja Cat', 'Amala Ratna Zandile Dlamini', 'Rapera y cantante estadounidense con un estilo provocador y versátil.', 2014, 'Say So, Woman, Kiss Me More', 'https://i0.wp.com/becodaspalavras.com/wp-content/uploads/2022/01/Capa-Beco-das-Palavras-7.jpg?resize=1210%2C642&ssl=1', 4000000000),
('The Chainsmokers', 'Andrew Taggart y Alex Pall', 'Dúo estadounidense de música electrónica y pop.', 2012, 'Closer, Paris, Something Just Like This', 'https://ichef.bbci.co.uk/ace/standard/976/cpsprodpb/3D0A/production/_95762651_getty_chainsmokers.jpg', 4500000000),
('Chloe', 'Chlöe Bailey', 'Cantante y actriz estadounidense, conocida por su carrera en solitario y por formar parte del dúo Chloe x Halle.', 2021, 'Have Mercy, Surprise Me, Happy Without Me', 'https://people.com/thmb/BjsDQv_OxaMg28o491vmG675wFQ=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc():focal(745x300:747x302)/Halle-Bailey-061924-tout-d2d7f08f11d3470cb597a70550aaba1c.jpg', 500000000),
('Dean Lewis', 'Dean Loaney', 'Cantautor australiano conocido por sus baladas emotivas.', 2016, 'Be Alright, Waves, Stay Awake', 'https://d12xfkzf9kx8ij.cloudfront.net/a0K5J000000ZJmVUAW_700x700.jpg', 1200000000),
('Muse', 'Matthew Bellamy, Chris Wolstenholme, Dominic Howard', 'Banda británica de rock alternativo y espacial.', 1994, 'Uprising, Starlight, Madness', 'https://estaticos-cdn.prensaiberica.es/clip/ca0338f8-26a3-47a7-b788-bafa1901b7b4_alta-libre-aspect-ratio_default_0.jpg', 3000000000);");

/* Insertar canciones para Kygo*/
$pdo->exec("INSERT INTO songs (artist_id, title, release_year, plays, image_url, album, lyrics, story_summary) VALUES
(1, 'Firestone', 2014, 600000000, 'https://example.com/firestone.jpg', 'Cloud Nine', 'Lyrics...', 'Canción que lanzó a Kygo al estrellato.'),
(1, 'Stole the Show', 2015, 700000000, 'https://example.com/stole.jpg', 'Cloud Nine', 'Lyrics...', 'Sobre el fin elegante de una relación.'),
(1, 'It Ain’t Me', 2017, 900000000, 'https://example.com/itaintme.jpg', 'Single', 'Lyrics...', 'Ruptura y autovaloración.'),
(1, 'Remind Me to Forget', 2018, 450000000, 'https://example.com/remind.jpg', 'Kids in Love', 'Lyrics...', 'Sanando después del dolor.'),
(1, 'Happy Now', 2018, 300000000, 'https://example.com/happynow.jpg', 'Golden Hour', 'Lyrics...', 'Explora la separación y aceptación.'),
(1, 'Lose Somebody', 2020, 350000000, 'https://example.com/lose.jpg', 'Golden Hour', 'Lyrics...', 'Reflexión sobre la pérdida.');");

/* Insertar canciones para Twenty One Pilots */

$pdo->exec("INSERT INTO songs (artist_id, title, release_year, plays, image_url, album, lyrics, story_summary) VALUES
(2, 'Stressed Out', 2015, 950000000, 'https://example.com/stressed.jpg', 'Blurryface', 'Lyrics...', 'Nostalgia por la infancia.'),
(2, 'Ride', 2015, 850000000, 'https://example.com/ride.jpg', 'Blurryface', 'Lyrics...', 'Duda existencial sobre el destino.'),
(2, 'Heathens', 2016, 900000000, 'https://example.com/heathens.jpg', 'Suicide Squad OST', 'Lyrics...', 'Alienación y confianza.'),
(2, 'Tear in My Heart', 2015, 400000000, 'https://example.com/tear.jpg', 'Blurryface', 'Lyrics...', 'Una canción de amor sarcástica.'),
(2, 'Jumpsuit', 2018, 300000000, 'https://example.com/jumpsuit.jpg', 'Trench', 'Lyrics...', 'Sobre protección y ansiedad.'),
(2, 'Chlorine', 2018, 450000000, 'https://example.com/chlorine.jpg', 'Trench', 'Lyrics...', 'Purificación a través del dolor.');");

/* Insertar canciones para Bleachers */

$pdo->exec("INSERT INTO songs (artist_id, title, release_year, plays, image_url, album, lyrics, story_summary) VALUES
(3, 'I Wanna Get Better', 2014, 400000000, 'https://example.com/getbetter.jpg', 'Strange Desire', 'Lyrics...', 'Una llamada al cambio y la superación personal.'),
(3, 'Rollercoaster', 2014, 350000000, 'https://example.com/rollercoaster.jpg', 'Strange Desire', 'Lyrics...', 'Una historia de amor corta pero intensa.'),
(3, 'Don’t Take the Money', 2017, 500000000, 'https://example.com/donttake.jpg', 'Gone Now', 'Lyrics...', 'Sobre las inseguridades dentro de una relación.'),
(3, 'Shadow', 2017, 300000000, 'https://example.com/shadow.jpg', 'Gone Now', 'Lyrics...', 'Explora los altibajos de la vida y la lucha interna.'),
(3, 'Chateau', 2017, 400000000, 'https://example.com/chateau.jpg', 'Gone Now', 'Lyrics...', 'Refleja la búsqueda de un lugar emocional seguro.'),
(3, 'Hate That You Know Me', 2019, 250000000, 'https://example.com/hate.jpg', 'Take the Money and Run', 'Lyrics...', 'Conflictos personales en relaciones complicadas.');");

/*Insertar canciones para Doja Cat */

$pdo->exec("INSERT INTO songs (artist_id, title, release_year, plays, image_url, album, lyrics, story_summary) VALUES
(4, 'Say So', 2020, 1200000000, 'https://example.com/sayso.jpg', 'Hot Pink', 'Lyrics...', 'Un tema pegajoso y sensual sobre el cortejo.'),
(4, 'Woman', 2021, 900000000, 'https://example.com/woman.jpg', 'Planet Her', 'Lyrics...', 'Empoderamiento femenino con un estilo tropical.'),
(4, 'Kiss Me More', 2021, 1500000000, 'https://example.com/kissme.jpg', 'Planet Her', 'Lyrics...', 'Explora el deseo y la atracción romántica.'),
(4, 'Moo!', 2018, 400000000, 'https://example.com/moo.jpg', 'Moo!', 'Lyrics...', 'Una canción divertida y excéntrica sobre su personalidad.'),
(4, 'Juicy', 2019, 700000000, 'https://example.com/juicy.jpg', 'Hot Pink', 'Lyrics...', 'Una mezcla de empoderamiento y sensualidad.'),
(4, 'Like That', 2020, 600000000, 'https://example.com/likethat.jpg', 'Hot Pink', 'Lyrics...', 'Un tema pegajoso que mezcla rap y pop.');");

/*Insertar canciones para The Chainsmokers */

$pdo->exec("INSERT INTO songs (artist_id, title, release_year, plays, image_url, album, lyrics, story_summary) VALUES
(5, 'Closer', 2016, 2000000000, 'https://example.com/closer.jpg', 'Collage', 'Lyrics...', 'Historia de una relación atrapada entre el pasado y el presente.'),
(5, 'Paris', 2017, 900000000, 'https://example.com/paris.jpg', 'Memories...Do Not Open', 'Lyrics...', 'Una reflexión sobre la juventud y los recuerdos.'),
(5, 'Something Just Like This', 2017, 1800000000, 'https://example.com/something.jpg', 'Memories...Do Not Open', 'Lyrics...', 'La búsqueda de un amor auténtico.'),
(5, 'Don’t Let Me Down', 2016, 1400000000, 'https://example.com/dontlet.jpg', 'Collage', 'Lyrics...', 'Temor a perder la relación en un momento crítico.'),
(5, 'Roses', 2015, 950000000, 'https://example.com/roses.jpg', 'Collage', 'Lyrics...', 'Explora el amor espontáneo y la alegría compartida.'),
(5, 'Call You Mine', 2019, 700000000, 'https://example.com/callyoumine.jpg', 'World War Joy', 'Lyrics...', 'El deseo de mantener una relación fuerte y unida.');");

/*Insertar canciones para Dean Lewis */

$pdo->exec("INSERT INTO songs (artist_id, title, release_year, plays, image_url, album, lyrics, story_summary) VALUES
(6, 'Be Alright', 2018, 900000000, 'https://example.com/bealright.jpg', 'A Place We Knew', 'Lyrics...', 'Sobre la esperanza y la sanación después de la ruptura.'),
(6, 'Waves', 2016, 500000000, 'https://example.com/waves.jpg', 'Same Kind of Different', 'Lyrics...', 'Reflexión sobre la naturaleza volátil de la vida.'),
(6, 'Stay Awake', 2019, 300000000, 'https://example.com/stayawake.jpg', 'Single', 'Lyrics...', 'Cansancio emocional y la lucha interna de quedarse despierto.'),
(6, 'Half a Man', 2019, 200000000, 'https://example.com/halfman.jpg', 'A Place We Knew', 'Lyrics...', 'La sensación de no ser completo tras una pérdida.'),
(6, 'The Hate I Need', 2019, 150000000, 'https://example.com/hate.jpg', 'Same Kind of Different', 'Lyrics...', 'Explora los conflictos internos y la necesidad de liberarse.'),
(6, 'You', 2020, 100000000, 'https://example.com/you.jpg', 'Single', 'Lyrics...', 'Reflexión sobre el amor incondicional y la vulnerabilidad.');");

/* Insertar canciones para Muse*/

$pdo->exec("INSERT INTO songs (artist_id, title, release_year, plays, image_url, album, lyrics, story_summary) VALUES
(7, 'Uprising', 2009, 1000000000, 'https://example.com/uprising.jpg', 'The Resistance', 'Lyrics...', 'Una protesta contra el control social y la manipulación.'),
(7, 'Starlight', 2006, 800000000, 'https://example.com/starlight.jpg', 'Black Holes and Revelations', 'Lyrics...', 'Una oda a la soledad y el amor inalcanzable.'),
(7, 'Madness', 2012, 950000000, 'https://example.com/madness.jpg', 'The 2nd Law', 'Lyrics...', 'Refleja el caos emocional dentro de una relación tóxica.'),
(7, 'Time Is on My Side', 2010, 500000000, 'https://example.com/timeis.jpg', 'The Resistance', 'Lyrics...', 'Habla sobre la paciencia y la perspectiva en el tiempo.'),
(7, 'Supermassive Black Hole', 2006, 600000000, 'https://example.com/supermassive.jpg', 'Black Holes and Revelations', 'Lyrics...', 'Una explosión de energía sobre la lucha interna.'),
(7, 'Pressure', 2018, 400000000, 'https://example.com/pressure.jpg', 'Simulation Theory', 'Lyrics...', 'Explora la ansiedad y la presión que enfrentan las personas en la vida moderna.');");

/* Insertar canciones para Chloe*/
$pdo->exec("INSERT INTO songs (artist_id, title, release_year, plays, image_url, album, lyrics, story_summary) VALUES
(8, 'Have Mercy', 2021, 600000000, 'https://example.com/havemercy.jpg', 'Have Mercy', 'Lyrics...', 'Una declaración de empoderamiento y confianza en sí misma.'),
(8, 'Surprise Me', 2021, 450000000, 'https://example.com/surprise.jpg', 'Single', 'Lyrics...', 'Una canción que explora las emociones de una relación que toma giros inesperados.'),
(8, 'Happy Without Me', 2021, 300000000, 'https://example.com/happywithoutme.jpg', 'Single', 'Lyrics...', 'Refleja la independencia y el empoderamiento tras una ruptura.'),
(8, 'Fighting Temptation', 2022, 200000000, 'https://example.com/fighting.jpg', 'Single', 'Lyrics...', 'Una canción sobre la lucha interna entre lo correcto y lo incorrecto.'),
(8, 'Mercy', 2021, 400000000, 'https://example.com/mercy.jpg', 'Have Mercy', 'Lyrics...', 'Explora la vulnerabilidad en una relación tormentosa.'),
(8, 'I Can’t Let Go', 2021, 350000000, 'https://example.com/icant.jpg', 'Single', 'Lyrics...', 'Un tema que habla de la dificultad de dejar ir a alguien que amas.');");

/* Insertar canciones para Tems*/
$pdo->exec("INSERT INTO songs (artist_id, title, release_year, plays, image_url, album, lyrics, story_summary) VALUES
(9, 'Essence', 2020, 1500000000, 'https://example.com/essence.jpg', 'Made in Lagos', 'Lyrics...', 'Una canción sobre el amor y la atracción profunda con un ritmo afrobeats relajado.'),
(9, 'Free Mind', 2021, 800000000, 'https://example.com/freemind.jpg', 'If Orange Was a Place', 'Lyrics...', 'Sobre la introspección, la salud mental y la búsqueda de paz.'),
(9, 'Higher', 2021, 500000000, 'https://example.com/higher.jpg', 'If Orange Was a Place', 'Lyrics...', 'Una canción sobre superar los desafíos y seguir adelante con determinación.'),
(9, 'Try Me', 2019, 600000000, 'https://example.com/tryme.jpg', 'Tems EP', 'Lyrics...', 'Refleja la actitud de no dejarse manipular o derrotar en una relación.'),
(9, 'Damages', 2020, 700000000, 'https://example.com/damages.jpg', 'If Orange Was a Place', 'Lyrics...', 'Una reflexión sobre las cicatrices emocionales de una relación fallida.'),
(9, 'The Key', 2021, 450000000, 'https://example.com/thekey.jpg', 'If Orange Was a Place', 'Lyrics...', 'Habla de la búsqueda del amor verdadero y la conexión genuina.');");

/*Insertar canciones para Myles Smith*/
$pdo->exec("INSERT INTO songs (artist_id, title, release_year, plays, image_url, album, lyrics, story_summary) VALUES
(10, 'Rain', 2020, 300000000, 'https://example.com/rain.jpg', 'Rain EP', 'Lyrics...', 'Una balada emocional sobre superar la tristeza y la tormenta emocional.'),
(10, 'Lost In You', 2021, 250000000, 'https://example.com/lostinyou.jpg', 'Single', 'Lyrics...', 'Sobre el amor profundo y la devoción a alguien que te hace perder el control.'),
(10, 'The One', 2021, 400000000, 'https://example.com/theone.jpg', 'Single', 'Lyrics...', 'Refleja la búsqueda del amor verdadero y cómo ese amor te cambia para siempre.'),
(10, 'Hold Me Tight', 2022, 220000000, 'https://example.com/holdmetight.jpg', 'Hold Me Tight', 'Lyrics...', 'Una canción sobre la necesidad de amor y compañía en tiempos difíciles.'),
(10, 'With You', 2022, 180000000, 'https://example.com/withyou.jpg', 'With You EP', 'Lyrics...', 'Una balada sobre la importancia de estar con alguien que te apoya en todo momento.'),
(10, 'Back To You', 2023, 250000000, 'https://example.com/backtoyou.jpg', 'Single', 'Lyrics...', 'Habla sobre la necesidad de regresar a alguien especial a pesar de las dificultades que se han vivido.');");



?>