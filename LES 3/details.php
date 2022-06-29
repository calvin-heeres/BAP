<?php 
require 'functions.php';
$connection = dbConnect ( ) ;

// checken of id wel is meegestuurd in de url

if( !isset ($_GET['id']) ){
    echo "De ID is niet gezet";
    exit;
}

// checken of het wel een getal (integer) is
$id = $_GET['id'];
$check_int = filter_var($id, FILTER_VALIDATE_INT);
if($check_int == false){
    echo "dit is geen getal (integer)";
    exit;
}

$statement = $connection->prepare('SELECT * FROM `producten` WHERE id=?' . $id);
$params = [$id];
$statement->execute($params);
$drank = $statement->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producten</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Mukta:wght@300;500&display=swap">

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container drank-details">
        <h1>Mixen!</h1>
        <section>
            <article class="drank-info">
                <header>
                    <h2><?php echo $row['titel']; ?></h2>
                    <h3><?php echo $row['liter']; ?></h3>
                </header>
                <figure style="background-image: url(images/<?php echo $row['foto']; ?>)">
                    <em>€<?php echo $row['prijs']; ?></em>
                </figure>
                <p>
                <?php echo $row['beschrijving']; ?>
                </p>
                <hr>
                <a href="index.php">Terug naar het overzicht</a>
            </article>
            <aside class="drank-sidebar">
                <h3>Andere dranken</h3>
                <ul>
                <li>Cantina</li>
                    <li>Mucho</li>
                    <li>Riporta</li>
                    <li>StoneLake</li>
                    <li>Whale</li>
                    <li>Wijn</li>
                </ul>
            </aside>
        </section>
        
    </div>
</body>

</html>