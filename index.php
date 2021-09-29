<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="style.css">
      <title>Fetching JSON data</title>
  </head>
  <body>
    <div class="support-grid"></div>

    <div class="band">
      <h1>Fetching JSON data</h1>
      <?php
        // Load the contents of the JSON file into a variable.
        $json = file_get_contents('my_data.json');

        // Decode the data into a PHP array.
        $jsonData = json_decode($json, true);

        $films = $jsonData['films'];

        $i=0;
        // For each object in the JSON file create a 'card' and display it's content.
        foreach($films as $film) {
            $title = $film['title'];
            $genre = $film['genre'];
            $star = $film['star'];
            $url = $film['url'];
            $i++;

            echo "
            <div class='item-$i'>
              <a href='https://www.google.com/search?q=$title' class='card'>
                <div class='thumb' style='background-image: url($url);'></div>
                  <article>
                    <h1>$title</h1>
                    <span>$genre film <br> starring $star</span>
                  </article>
              </a>
            </div>";
        }
        ?>
    </div>
    <div class="pageText">
      <p>Each card is created and filled with content from a JSON file.</p>
      <p>Clicking on a card will result in a Google search of the film's title.</p>
    </div>
  </body>
</html>
