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
    youtube_url TEXT,
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
$pdo->exec("INSERT INTO songs (artist_id, title, release_year, plays, image_url, album, lyrics, story_summary, youtube_url) VALUES
(1, 'Firestone', 2014, 600000000, 'https://i.pinimg.com/564x/29/4a/17/294a1775e4415aef4e7dddd3f3e5462a.jpg', 'Cloud Nine', 'Lyrics...', 'Canción que lanzó a Kygo al estrellato.', 'https://www.youtube.com/watch?v=9Sc-ir2UwGU'),
(1, 'Stole the Show', 2015, 700000000, 'https://i.pinimg.com/474x/df/58/4a/df584a5120d588e76d72fc15c8ca86a3.jpg', 'Cloud Nine', 'Lyrics...', 'Sobre el fin elegante de una relación.', 'https://www.youtube.com/watch?v=BgfcToAjfdc'),
(1, 'It Ain’t Me', 2017, 900000000, 'https://i.discogs.com/p0MwvpHeqf2sBZV5PSw-GZa5QU_PGwAsMywvS940EWY/rs:fit/g:sm/q:40/h:300/w:300/czM6Ly9kaXNjb2dz/LWRhdGFiYXNlLWlt/YWdlcy9SLTEyMjU1/MTYzLTE1OTU4MjU0/MzEtNzEwNi5qcGVn.jpeg', 'Single', 'Lyrics...', 'Ruptura y autovaloración.', 'https://www.youtube.com/watch?v=u3VTKvdAuIY'),
(1, 'Remind Me to Forget', 2018, 450000000, 'https://i.ytimg.com/vi/FRjOSmc01-M/hqdefault.jpg', 'Kids in Love', 'Lyrics...', 'Sanando después del dolor.', 'https://www.youtube.com/watch?v=FRjOSmc01-M'),
(1, 'Happy Now', 2018, 300000000, 'https://i0.wp.com/weownthenitenyc.com/wp-content/uploads/2018/12/We-Own-The-Nite-NYC_Kygo_Kygo-Happy-Now-ft.-Sandro-Cavazza_Happy-Now_Norway.jpg?resize=895%2C530&ssl=1', 'Golden Hour', 'Lyrics...', 'Explora la separación y aceptación.', 'https://www.youtube.com/watch?v=zaIsVnmwdqg'),
(1, 'Lose Somebody', 2020, 350000000, 'https://i1.sndcdn.com/artworks-kU0j7yvxVpMvrDRy-F1MRQQ-t500x500.jpg', 'Golden Hour', 'Lyrics...', 'Reflexión sobre la pérdida.', 'https://www.youtube.com/watch?v=uruccxh9bkQ');
");


/* Insertar canciones para Twenty One Pilots */

$pdo->exec("INSERT INTO songs (artist_id, title, release_year, plays, image_url, album, lyrics, story_summary, youtube_url) VALUES
(3, 'Stressed Out', 2015, 950000000, 'https://www.sopitas.com/wp-content/uploads/2021/10/twenty-one-pilots-stressed-out-historia-detras-cancion.jpeg?resize=1024,430', 'Blurryface', 'Lyrics...', 'Nostalgia por la infancia.', 'https://www.youtube.com/watch?v=pXRviuL6vMY'),
(3, 'Ride', 2015, 850000000, 'https://media.fstatic.com/Jrfu6trRwhaKEXO9cHW-GaTQBbc=/640x480/smart/filters:format(webp)/media/movies/photos/2016/05/ride_t206948.jpg', 'Blurryface', 'Lyrics...', 'Duda existencial sobre el destino.', 'https://www.youtube.com/watch?v=Pw-0pbY9JeU'),
(3, 'Heathens', 2016, 900000000, 'https://upload.wikimedia.org/wikipedia/en/thumb/e/e0/Twentyonepilotsheathens.jpg/250px-Twentyonepilotsheathens.jpg', 'Suicide Squad OST', 'Lyrics...', 'Alienación y confianza.', 'https://www.youtube.com/watch?v=UprcpdwuwCg'),
(3, 'Tear in My Heart', 2015, 400000000, 'https://m.media-amazon.com/images/M/MV5BOThjYzk2NDQtMjZiYy00MjgzLWI0ZmYtZjIyZDQ0ODIwN2VlXkEyXkFqcGc@._V1_.jpg', 'Blurryface', 'Lyrics...', 'Una canción de amor sarcástica.', 'https://www.youtube.com/watch?v=nky4me4NP70'),
(3, 'Jumpsuit', 2018, 300000000, 'https://www.billboard.com/wp-content/uploads/media/Twenty-One-Pilots-press-photo-2018-cr-Brad-Heaton-billboard-1548.jpg', 'Trench', 'Lyrics...', 'Sobre protección y ansiedad.', 'https://www.youtube.com/watch?v=UOUBW8bkjQ4'),
(3, 'Chlorine', 2018, 450000000, 'https://www.rollingstone.com/wp-content/uploads/2019/01/21-pilots-video.jpg', 'Trench', 'Lyrics...', 'Purificación a través del dolor.', 'https://www.youtube.com/watch?v=eJnQBXmZ7Ek');
");


/* Insertar canciones para Bleachers */

$pdo->exec("INSERT INTO songs (artist_id, title, release_year, plays, image_url, album, lyrics, story_summary, youtube_url) VALUES
(5, 'I Wanna Get Better', 2014, 400000000, 'https://m.media-amazon.com/images/M/MV5BNTYyOTJhZGUtZWYxMS00NTRjLTk1N2EtZGM3ZmE4YzdiMTljXkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg', 'Strange Desire', 'Lyrics...', 'Una llamada al cambio y la superación personal.', 'https://www.youtube.com/watch?v=o5osPtE7kXI'),
(5, 'Rollercoaster', 2014, 350000000, 'https://www.elblogdeyes.com/wp-content/uploads/2014/11/Bleachers-Rollercoaster.jpg', 'Strange Desire', 'Lyrics...', 'Una historia de amor corta pero intensa.', 'https://www.youtube.com/watch?v=ldk2pLyVZ4c'),
(5, 'Don’t Take the Money', 2017, 500000000, 'https://i.ytimg.com/vi/j42ubxMSQak/maxresdefault.jpg', 'Gone Now', 'Lyrics...', 'Sobre las inseguridades dentro de una relación.', 'https://www.youtube.com/watch?v=B06qqB7bp-w'),
(5, 'Shadow', 2017, 300000000, 'https://static.wikia.nocookie.net/jack-antonoff/images/d/df/Shadow_w_Jack_and_Arrow.jpg/revision/latest/scale-to-width-down/250?cb=20220924071651', 'Gone Now', 'Lyrics...', 'Explora los altibajos de la vida y la lucha interna.', 'https://www.youtube.com/watch?v=9Mct0OU_Py8'),
(5, 'Chateau', 2017, 400000000, 'https://i.scdn.co/image/ab67616d0000b273d92afcf66072c83e4b28c6bb', 'Gone Now', 'Lyrics...', 'Refleja la búsqueda de un lugar emocional seguro.', 'https://www.youtube.com/watch?v=YE68EpoHT3k'),
(5, 'Hate That You Know Me', 2019, 250000000, 'https://i.ytimg.com/vi/dsEX4rDD3zM/sddefault.jpg', 'Take the Money and Run', 'Lyrics...', 'Conflictos personales en relaciones complicadas.', 'https://www.youtube.com/watch?v=aA_nHHxKll0');
");


/*Insertar canciones para Doja Cat */
$pdo->exec("INSERT INTO songs (artist_id, title, release_year, plays, image_url, album, lyrics, story_summary, youtube_url) VALUES
(6, 'Say So', 2020, 1200000000, 'https://static.wikia.nocookie.net/dojacat/images/3/39/Say_So_%28cover_art%29.jpg/revision/latest/scale-to-width-down/1200?cb=20240725204601', 'Hot Pink', 'Lyrics...', 'Un tema pegajoso y sensual sobre el cortejo.', 'https://www.youtube.com/watch?v=pok8H_KF1FA'),
(6, 'Woman', 2021, 900000000, 'https://i.ytimg.com/vi/2V_uAAAH-_Q/sddefault.jpg', 'Planet Her', 'Lyrics...', 'Empoderamiento femenino con un estilo tropical.', 'https://www.youtube.com/watch?v=yxW5yuzVi8w'),
(6, 'Kiss Me More', 2021, 1500000000, 'https://media.pitchfork.com/photos/606fd4275aedaea021481c58/1:1/w_3096,h_3096,c_limit/doja-cat-sza.jpg', 'Planet Her', 'Lyrics...', 'Explora el deseo y la atracción romántica.', 'https://www.youtube.com/watch?v=0EVVKs6DQLo'),
(6, 'Moo!', 2018, 400000000, 'https://i.ytimg.com/vi/AD_TWloJ310/maxresdefault.jpg', 'Moo!', 'Lyrics...', 'Una canción divertida y excéntrica sobre su personalidad.', 'https://www.youtube.com/watch?v=5kqfKz0zKxA'),
(6, 'Juicy', 2019, 700000000, 'https://stupiddope.com/wp-content/uploads/2019/08/Doja-Cat-Juicy-Remix-Tyga-1200x900.jpg', 'Hot Pink', 'Lyrics...', 'Una mezcla de empoderamiento y sensualidad.', 'https://www.youtube.com/watch?v=7LnBvuzjpr4'),
(6, 'Like That', 2020, 600000000, 'https://i.ytimg.com/vi/XEJLuJyxLDE/maxresdefault.jpg', 'Hot Pink', 'Lyrics...', 'Un tema pegajoso que mezcla rap y pop.', 'https://www.youtube.com/watch?v=LDZX4ooRsWs');");


/*Insertar canciones para The Chainsmokers */
$pdo->exec("INSERT INTO songs (artist_id, title, release_year, plays, image_url, album, lyrics, story_summary, youtube_url) VALUES
(7, 'Closer', 2016, 2000000000, 'https://i1.sndcdn.com/artworks-000179073287-3ur3or-t500x500.jpg', 'Collage', 'Lyrics...', 'Historia de una relación atrapada entre el pasado y el presente.', 'https://www.youtube.com/watch?v=PT2_F-1esPk'),
(7, 'Paris', 2017, 900000000, 'https://upload.wikimedia.org/wikipedia/en/e/e8/Paris_%28Official_Single_Cover%29_by_The_Chainsmokers.png', 'Memories...Do Not Open', 'Lyrics...', 'Una reflexión sobre la juventud y los recuerdos.', 'https://www.youtube.com/watch?v=RhU9MZ98jxo'),
(7, 'Something Just Like This', 2017, 1800000000, 'https://upload.wikimedia.org/wikipedia/en/5/57/Something_Just_Like_This.png', 'Memories...Do Not Open', 'Lyrics...', 'La búsqueda de un amor auténtico.', 'https://www.youtube.com/watch?v=FM7MFYoylVs'),
(7, 'Don’t Let Me Down', 2016, 1400000000, 'https://i1.sndcdn.com/artworks-9Fn34Td0doc5xaUF-i33pZg-t500x500.jpg', 'Collage', 'Lyrics...', 'Temor a perder la relación en un momento crítico.', 'https://www.youtube.com/watch?v=Io0fBr1XBUA'),
(7, 'Roses', 2015, 950000000, 'https://i1.sndcdn.com/artworks-cJey8vEOF1nK-0-t500x500.jpg', 'Collage', 'Lyrics...', 'Explora el amor espontáneo y la alegría compartida.', 'https://www.youtube.com/watch?v=FyASdjZE0R0'),
(7, 'Call You Mine', 2019, 700000000, 'https://cdn-images.dzcdn.net/images/cover/65f945c76595ef7a145964267ecb3afe/0x1900-000000-80-0-0.jpg', 'World War Joy', 'Lyrics...', 'El deseo de mantener una relación fuerte y unida.', 'https://www.youtube.com/watch?v=0zGcUoRlhmw');");


/*Insertar canciones para Dean Lewis */
$pdo->exec("INSERT INTO songs (artist_id, title, release_year, plays, image_url, album, lyrics, story_summary, youtube_url) VALUES
(9, 'Be Alright', 2018, 900000000, 'https://upload.wikimedia.org/wikipedia/en/1/11/Be_Alright_by_Dean_Lewis.jpg', 'A Place We Knew', 'Lyrics...', 'Sobre la esperanza y la sanación después de la ruptura.', 'https://youtu.be/I0czvJ_jikg?feature=shared'),
(9, 'Waves', 2016, 500000000, 'https://upload.wikimedia.org/wikipedia/en/1/16/Waves_%28acoustic%29_by_Dean_Lewis.jpg', 'Same Kind of Different', 'Lyrics...', 'Reflexión sobre la naturaleza volátil de la vida.', 'https://youtu.be/dKlgCk3IGBg?feature=shared'),
(9, 'Stay Awake', 2019, 300000000, 'https://upload.wikimedia.org/wikipedia/en/7/77/Stay_Awake_by_Dean_Lewis.jpg', 'Single', 'Lyrics...', 'Cansancio emocional y la lucha interna de quedarse despierto.', 'https://youtu.be/PzSQJwpljg0?feature=shared'),
(9, 'Half a Man', 2019, 200000000, 'https://assets.pikiran-rakyat.com/crop/0x0:0x0/750x500/photo/2021/02/26/1523578227.jpg', 'A Place We Knew', 'Lyrics...', 'La sensación de no ser completo tras una pérdida.', 'https://youtu.be/Kua2dDhqzZw?feature=shared'),
(9, 'The Hate I Need', 2019, 150000000, 'https://i.ytimg.com/vi/vLO9r6Vd6ec/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLCuh-9PqvU4VWSwrPV1lPl5eQ8Kaw', 'Same Kind of Different', 'Lyrics...', 'Explora los conflictos internos y la necesidad de liberarse.', 'https://youtu.be/5hI7f2WCbz0?feature=shared'),
(9, 'You', 2020, 100000000, 'https://cdn-images.dzcdn.net/images/cover/fbe671014dbc03c7cdf70e6a51301128/0x1900-000000-80-0-0.jpg', 'Single', 'Lyrics...', 'Reflexión sobre el amor incondicional y la vulnerabilidad.', 'https://youtu.be/GurljGjfrVs?feature=shared');");

/* Insertar canciones para Muse */
$pdo->exec("INSERT INTO songs (artist_id, title, release_year, plays, image_url, album, lyrics, story_summary, youtube_url) VALUES
(10, 'Uprising', 2009, 1000000000, 'https://upload.wikimedia.org/wikipedia/en/thumb/2/26/MuseUprisingCDsingle.jpg/250px-MuseUprisingCDsingle.jpg', 'The Resistance', 'Lyrics...', 'Una protesta contra el control social y la manipulación.', 'https://www.youtube.com/watch?v=w8KQmps-Sog'),
(10, 'Starlight', 2006, 800000000, 'https://m.media-amazon.com/images/M/MV5BMDUwMzExMTItYjU0Yi00YzY3LTk5ZWItOTkxZGJmMjNiYTQ0XkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg', 'Black Holes and Revelations', 'Lyrics...', 'Una oda a la soledad y el amor inalcanzable.', 'https://www.youtube.com/watch?v=Pgum6OT_VH8'),
(10, 'Madness', 2012, 950000000, 'https://upload.wikimedia.org/wikipedia/en/9/9b/Muse_-_Madness.jpg', 'The 2nd Law', 'Lyrics...', 'Refleja el caos emocional dentro de una relación tóxica.', 'https://www.youtube.com/watch?v=Ek0SgwWmF9w'),
(10, 'Time Is on My Side', 2010, 500000000, 'https://upload.wikimedia.org/wikipedia/en/4/4c/Muse_tirocd.jpg', 'The Resistance', 'Lyrics...', 'Habla sobre la paciencia y la perspectiva en el tiempo.', 'https://www.youtube.com/watch?v=1fL8s5ZzQ3I'),
(10, 'Supermassive Black Hole', 2006, 600000000, 'https://i.scdn.co/image/ab67616d0000b27328933b808bfb4cbbd0385400', 'Black Holes and Revelations', 'Lyrics...', 'Una explosión de energía sobre la lucha interna.', 'https://www.youtube.com/watch?v=G_sBOsh-vyI'),
(10, 'Pressure', 2018, 400000000, 'https://www.musewiki.org/images/thumb/PressureCover.jpg/300px-PressureCover.jpg', 'Simulation Theory', 'Lyrics...', 'Explora la ansiedad y la presión que enfrentan las personas en la vida moderna.', 'https://www.youtube.com/watch?v=G-sBOsh-vyI');");


/* Insertar canciones para Chloe */
$pdo->exec("INSERT INTO songs (artist_id, title, release_year, plays, image_url, album, lyrics, story_summary, youtube_url) VALUES
(8, 'Have Mercy', 2021, 600000000, 'https://thatgrapejuice.net/wp-content/uploads/2022/04/chloe-bailey-2022-11-tgj.jpeg', 'Have Mercy', 'Lyrics...', 'Una declaración de empoderamiento y confianza en sí misma.', 'https://www.youtube.com/watch?v=Gsnrzr0Bm80'),
(8, 'Surprise Me', 2021, 450000000, 'https://i.ytimg.com/vi/ZbVobGLuk_U/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLDZq0JsAVRI5b8KMl-a7sEJNTSQkQ', 'Single', 'Lyrics...', 'Una canción que explora las emociones de una relación que toma giros inesperados.', 'https://youtu.be/bMlJKBXU1v4?feature=shared'),
(8, 'Happy Without Me', 2021, 300000000, 'https://static.wikia.nocookie.net/chloexhalle/images/4/4b/The_Kids_Are_Alright_-_Album_Cover.jpg/revision/latest?cb=20201119191207', 'Single', 'Lyrics...', 'Refleja la independencia y el empoderamiento tras una ruptura.', 'https://youtu.be/MFxqp_wOUx8?feature=shared'),
(8, 'Fighting Temptation', 2022, 200000000, 'https://static.wikia.nocookie.net/chloexhalle/images/6/62/2021-8-24_Edwig_Henson_%28Instagram%29_003.jpg/revision/latest?cb=20210826015811', 'Single', 'Lyrics...', 'Una canción sobre la lucha interna entre lo correcto y lo incorrecto.', 'https://youtu.be/V3vZfEhWSdw?feature=shared'),
(8, 'Mercy', 2021, 400000000, 'https://pyxis.nymag.com/v1/imgs/060/57e/03cb32bdba91b312abc7df39f30fca745c-chloe.2x.rsocial.w600.png', 'Have Mercy', 'Lyrics...', 'Explora la vulnerabilidad en una relación tormentosa.', 'https://www.youtube.com/watch?v=Gsnrzr0Bm80'),
(8, 'I Can’t Let Go', 2021, 350000000, 'https://i.ytimg.com/vi/IVqKqVFs_jA/maxresdefault.jpg?sqp=-oaymwEmCIAKENAF8quKqQMa8AEB-AH-CYAC0AWKAgwIABABGHIgSShFMA8=&rs=AOn4CLB8DR8Yr59-PvRPHyvq7XkO7Tlk4Q', 'Single', 'Lyrics...', 'Un tema que habla de la dificultad de dejar ir a alguien que amas.', 'https://youtu.be/IVqKqVFs_jA?feature=shared');");


/* Insertar canciones para Tems */
$pdo->exec("INSERT INTO songs (artist_id, title, release_year, plays, image_url, album, lyrics, story_summary, youtube_url) VALUES
(4, 'Essence', 2020, 1500000000, 'https://i.scdn.co/image/ab67616d0000b273a415eca4f2d614ad1f5f3598', 'Made in Lagos', 'Lyrics...', 'Una canción sobre el amor y la atracción profunda con un ritmo afrobeats relajado.', 'https://youtu.be/FeMeopQqB6s?feature=shared'),
(4, 'Free Mind', 2021, 800000000, 'https://thenativemag.com/wp-content/uploads/2020/09/Screenshot-2020-09-29-at-16.03.56.png', 'If Orange Was a Place', 'Lyrics...', 'Sobre la introspección, la salud mental y la búsqueda de paz.', 'https://youtu.be/mlaTJrQdmiY?feature=shared'),
(4, 'Higher', 2021, 500000000, 'https://i1.sndcdn.com/artworks-0NIc4id66GQMCZzE-QJ3zJw-t500x500.jpg', 'If Orange Was a Place', 'Lyrics...', 'Una canción sobre superar los desafíos y seguir adelante con determinación.', 'https://youtu.be/jOp8SFadvkk?feature=shared'),
(4, 'Try Me', 2019, 600000000, 'https://i.ytimg.com/vi/JzLPN9Xovxs/sddefault.jpg', 'Tems EP', 'Lyrics...', 'Refleja la actitud de no dejarse manipular o derrotar en una relación.', 'https://youtu.be/hVEp-P2-rqY?feature=shared'),
(4, 'Damages', 2020, 700000000, 'https://i.ytimg.com/vi/8kLrrQJzaBk/maxresdefault.jpg', 'If Orange Was a Place', 'Lyrics...', 'Una reflexión sobre las cicatrices emocionales de una relación fallida.', 'https://youtu.be/EOrFWBjiRik?feature=shared'),
(4, 'The Key', 2021, 450000000, 'https://i.ytimg.com/vi/SmxjaA8aRxE/maxresdefault.jpg', 'If Orange Was a Place', 'Lyrics...', 'Habla de la búsqueda del amor verdadero y la conexión genuina.', 'https://youtu.be/g6YJXT7wWfc?feature=shared');");


/* Insertar canciones para Myles Smith */
$pdo->exec("INSERT INTO songs (artist_id, title, release_year, plays, image_url, album, lyrics, story_summary, youtube_url) VALUES
(2, 'Rain', 2020, 300000000, 'https://cdn-p.smehost.net/sites/5cfaf3980b294dd89a79248f35560b2f/wp-content/uploads/2024/05/mylessmith-stargazing-packshot.jpg', 'Rain EP', 'Lyrics...', 'Una balada emocional sobre superar la tristeza y la tormenta emocional.', 'https://youtu.be/ki3gN751CLc?feature=shared'),
(2, 'Lost In You', 2021, 250000000, 'https://www.nme.com/wp-content/uploads/2025/04/myles-smith@2000x1270.jpg', 'Single', 'Lyrics...', 'Sobre el amor profundo y la devoción a alguien que te hace perder el control.', 'https://youtu.be/fZUp0zaQNcA?feature=shared'),
(2, 'The One', 2021, 400000000, 'https://www.nme.com/wp-content/uploads/2025/04/myles-smith@2000x1270.jpg', 'Single', 'Lyrics...', 'Refleja la búsqueda del amor verdadero y cómo ese amor te cambia para siempre.', 'https://youtu.be/9VbDkDALT7w?feature=shared'),
(2, 'Hold Me Tight', 2022, 220000000, 'https://www.nme.com/wp-content/uploads/2025/04/myles-smith@2000x1270.jpg', 'Hold Me Tight', 'Lyrics...', 'Una canción sobre la necesidad de amor y compañía en tiempos difíciles.', 'https://youtu.be/tKml80alH3Y?feature=shared'),
(2, 'With You', 2022, 180000000, 'https://www.1057thepoint.com/wp-content/uploads/2024/08/M_mylessmith_082324.jpg', 'With You EP', 'Lyrics...', 'Una balada sobre la importancia de estar con alguien que te apoya en todo momento.', 'https://youtu.be/fZUp0zaQNcA?feature=shared'),
(2, 'Back To You', 2023, 250000000, 'https://pmstudio.com/pmstudio/images/Myles-Smith2.jpg', 'Single', 'Lyrics...', 'Habla sobre la necesidad de regresar a alguien especial a pesar de las dificultades que se han vivido.', 'https://youtu.be/9VbDkDALT7w?feature=shared');");




?>