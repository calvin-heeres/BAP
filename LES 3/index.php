<?php 
require 'functions.php';
$connection = dbConnect ( ) ;

$result = $connection->query('SELECT * FROM `producten`')

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producten</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Mukta:wght@300;500&display=swap">

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1> Mixen!</h1>

        <section class="drank-lijst">

        <?php foreach($result as $row ):?>
            <article class="drank-lijst__naam">
                <h2><?php echo $row['titel']; ?></h2>
                <figure class="drank-lijst__foto" style="background-image: url(images/<?php echo $row['foto']; ?>)"></figure>
            <header>
                <h3><?php echo $row['liter']; ?></h3>
                <em>€<?php echo $row['prijs']; ?></em>
            </header>
            <p><?php echo $row['beschrijving']; ?></p>
            <a href="details.php?id=<?php echo $row['id']; ?>">Meer info</a>
        </article>
        <?php endforeach; ?>

        </section>
    </div>
</body>

</html>