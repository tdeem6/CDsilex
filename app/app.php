<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Cd.php";

    $app = new Silex\Application();

    $app->get("/", function(){
        $first_cd = new CD("Hummingbird", "Local Natives", "img/hummingbird.jpg");
        $second_cd = new CD("One Big Particular Loop", "Polyenso", "img/polyenso.jpg");
        $third_cd = new CD("Nevermind", "Nirvana", "img/nirvana.jpg");
        $fourth_cd = new CD("Clouds Make Sounds", "Clouds Make Sounds", "img/clouds.jpg", 19.99);
        $cds = array($first_cd, $second_cd, $third_cd, $fourth_cd);

        $output = "";
        foreach ($cds as $album) {
            $output = $output . "
            <!DOCTYPE html>
            <html>
            <head>
              <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
            </head>
            <body>
                <div class='row'>
                  <div class='col-md-6'>
                      <img src=" . $album->getCoverArt() . ">
                  </div>
                  <div class='col-md-6'>
                      <p>" . $album->getTitle() . "</p>
                      <p>By: " . $album->getArtist() . "</p>
                      <p>$" . $album->getPrice() . "</p>
                  </div>
                </div>
            </body>
            </html>
            ";
        }

        return $output;
    });

    return $app;

?>
