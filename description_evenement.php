<?php
include("config/config.php");
$bdd = new PDO('mysql:host=' . $host . ';port=' . $port . ';dbname=' . $dbname, $user, $password);


// recupération des données
$requete = 'SELECT * FROM evenement WHERE id_evenement = ' . $_GET['id_evenement'];

$resultats = $bdd->query($requete);
$tabEvenement = $resultats->fetch(PDO::FETCH_ASSOC);
$resultats->closeCursor();

$requete = 'SELECT * FROM evenement WHERE id_type = ' . $tabEvenement['id_type'];

$resultats = $bdd->query($requete);
$tabType = $resultats->fetchAll(PDO::FETCH_ASSOC);
$resultats->closeCursor();


?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>
    <?php include('include/menu.php'); ?>

    <main>





        <div class="text-center mt-5 mb-5">
            <h1 class="mb-5 "><?php echo $tabEvenement['titre']; ?></h1>
            <div class=" col-8 offset-2">

                <p class="p-orange text-start mt-3"><?php echo $tabEvenement['date_evenement']; ?></p>
                <img class="w-100 img-evenement shadow-lg" src="images/evenement/<?php echo $tabEvenement['image'] ?>" alt="image événement">
            </div>
            <p class="grand-text p-justify"><?php echo $tabEvenement['description']; ?></p>
            <div class="my-5">

                <a class="CTA" href="participer_evenement.php">Participer a l'événement</a>

            </div>
        </div>


        <!--
        <div class="col-6 offset-3 text-center">
            <h2 class="mb-5">Autres événements</h2>
            <ul class="list-group list-group-light list-group-horizontal-md mb-5 text-start">
                <?php
                foreach ($tabType as $evenement) {
                ?>
                    <li class="list-group-item w-100 "><a class="text-decoration-none text-black" href="description_evenement.php?id_evenement=<?php echo $evenement['id_evenement'] ?>">
                            <h5 class="fw-bold"><?php echo $evenement["titre"]; ?></h5>
                            <p class="text-muted mb-2 fw-bold"><?php echo $evenement["date_evenement"]; ?></p>
                            <img src="images/evenement/<?php echo $evenement["image"]; ?>" alt="image événement" class="w-100">
                            <p class="mb-0 truncate"><?php echo $evenement["description"]; ?></p>
                        </a>
                    </li>
                <?php
                };
                ?>
            </ul>
            <a class="CTA" href="evenement.php" role="button" data-mdb-ripple-init data-ripple-color="dark">View all</a>
        </div>

            -->



        <div class="row mx-5 text-center justify-content-center my-5">

        <h2 class="mb-4">Autres événements</h2>

            <?php
            foreach ($tabType as $evenement) {
            ?>
                <div class="col-sm-6">
                    <div class="card border-0 shadow mb-3 text-start">
                        <div class="card-body">
                            <h5 class="fw-bold"><?php echo $evenement["titre"]; ?></h5>
                            <p class="p-orange mb-2 fw-bold"><?php echo $evenement["date_evenement"]; ?></p>
                            <img src="images/evenement/<?php echo $evenement["image"]; ?>" alt="image événement" class="w-100">
                            <p class="truncate"><?php echo $evenement["description"]; ?></p>
                            <div class="text-center mt-4 mb-2">
                            <a class="CTA" href="description_evenement.php?id_evenement=<?php echo $evenement['id_evenement'] ?>">Voir l'article</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            };
            ?>

        </div>
    </main>




    <?php include('include/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="JS/contact.js"></script>
</body>

</html>