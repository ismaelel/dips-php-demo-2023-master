C LE HOME ICI
<br>
<div class="container" >
<?php

echo "<h1>" . $users['name'] . "</h1><h2>Notes</h2>";

try {
    $db = new PDO($dsn, 'root', '');

    //$result = $db->exec("INSERT INTO users (email, password, name) VALUE ('$mail','$pwd', '$name')");
    $req = $db->prepare("SELECT * FROM notes WHERE idUser = :userId ORDER BY id DESC");

    $req->bindParam(':userId',$users['id']);

    $req->execute();
    $notes = $req->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo $e->getMessage() . '<br>';
    exit();
}

//////////////////////////////// PAGINATION /////////////////////////////////////

// On détermine sur quelle page on se trouve
if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = (int) strip_tags($_GET['page']);
}else{
    $currentPage = 1;
}

$nb_notes = (int) count($notes); echo $nb_notes;
$par_page = 5;

$pages = ceil($nb_notes / $par_page);

$premier = ($currentPage * $par_page) - $par_page;

$sql = 'SELECT * FROM notes WHERE idUser = :userId order by id DESC LIMIT :premier, :parpage';

// On prépare la requête
$query = $db->prepare($sql);

$query->bindValue(':premier', $premier, PDO::PARAM_INT);
$query->bindValue(':parpage', $par_page, PDO::PARAM_INT);
$query->bindParam(':userId',$users['id']);
// On exécute
$query->execute();

// On récupère les valeurs dans un tableau associatif
$notess = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<form  class="mb-3" enctype="multipart/form-data" action="notesController.php" method="POST">
    <!-- Champ de saisie pour le nom -->
    <label class="form-label" for="titre">Titre :</label>
    <input class="form-control" type="text" name="titre" id="titre" required>
    <br><br>



    <!-- Zone de texte pour le message -->
    <label class="form-label" for="texte">Message :</label>
    <textarea class="form-control" name="texte" id="texte" rows="4" required></textarea>
    <br><br>

    <!-- Bouton de soumission -->
    <input type="submit" value="Envoyer">
</form>
<?php


//var_dump($notes);

foreach ($notess as $note) {?>
    <div class="card text-center m-3">
        <div class="card-header">
            <?php echo $note['titre'];?>
        </div>
        <div class="card-body">
            <p class="card-text"><?php echo $note['texte']; ?> </p>
        </div>
    </div>
<?php }
?>
    <nav>
        <ul class="pagination">
            <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
            <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                <a href="./?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
            </li>
            <?php for($page = 1; $page <= $pages; $page++): ?>
                <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                    <a href="./?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                </li>
            <?php endfor ?>
            <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
            <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                <a href="./?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
            </li>
        </ul>
    </nav>
</div>




<?php


