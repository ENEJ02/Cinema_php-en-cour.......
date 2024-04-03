<?php

require_once "../inc/functions.inc.php";

if( !isset($_SESSION['user'])){
    header("location:".RACINE_SITE."authentification.php");
}else{
    if($_SESSION['user']['role'] == 'ROLE_USER'){
        header("location:".RACINE_SITE."index.php");
    }
}



// ************************************************




$title = "Films";

?>

<main>

    <div class="d-flex flex-column m-auto mt-5">

        <h2 class="text-center fw-bolder mb-5 text-danger">Liste des films</h2>
        <a href="gestionFilms.php" class="btn btn-primary p-3 fs-3 align-self-end "> Ajouter un film</a>
        <table class="table table-dark table-bordered mt-5 ">
            <thead>
                <tr>
                    <!-- th*7 -->
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Affiche</th>
                    <th>Réalisateur</th>
                    <th>Acteurs</th>
                    <th>Âge limite</th>
                    <th>Genre</th>
                    <th>Durée</th>
                    <th>Prix</th>
                    <th>Stock</th>
                    <th>Synopsis</th>
                    <th>Date de sortie</th>
                    <th>Supprimer</th>
                    <th> Modifier</th>
                </tr>
            </thead>
            <tbody>
            <?php

$films = allFilms();

foreach($films as $film){


?>
                <tr>

                    <!-- Je récupére les valeus de mon tabelau $film dans des td -->
                    <td><?=$film['id_film']?></td>
                    <td><?=ucfirst($film['title'])?></td>


                    <!-- <td> <img src="<?php //echo RACINE_SITE.$film['image']?>" alt="image du film" class="img-fluid"> </td> -->
                    <!-- puis dans la bdd mettre le lien depuis assets -->

                    <td> <img src=" <?= RACINE_SITE."assets/img/".$film['image']?> " alt="image du film" class="img-fluid"> </td>
                    <td> <?=ucfirst($film['director'])?></td>
                    <td><?=ucfirst($film['actors'])?></td>
                    <td><?=ucfirst($film['ageLimit'])?></td>
                    <td><?=isset($film['genre'])?ucfirst($film['genre']): "Ajouter une catégorie"?></td>
                    <td><?=ucfirst($film['duration'])?></td>
                    <td><?=ucfirst($film['price'])?>$</td>
                    <td><?=ucfirst($film['stock'])?></td>
                    <td><?=substr(ucfirst($film['synopsis']),0,100)."..."?></td>
                    <td><?=ucfirst($film['date'])?></td>
                    <td class="text-center"><a href="gestionFilms.php?action=delete&id_film=<?= $film['id_film']?>"><i class="bi bi-trash3-fill text-danger"></i></a></td>

                    <td class="text-center"><a href="gestionFilms.php?action=update&id_film=<?= $film['id_film']?>"><i class="bi bi-pen-fill"></i></a></td>

                </tr>
<?php
}
?>

            </tbody>


        </table>


    </div>

</main>

<?php
require_once "../inc/footer.inc.php";
?>


