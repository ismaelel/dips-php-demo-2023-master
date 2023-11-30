<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Nous contacter</title>
</head>
<body>
<?php require __DIR__.'/menu.php'?>
<main>
    <form action="" method="POST">
        <input type="text" name="lastname">
        <input type="text" name="firstname">
        <input type="text" name="email">
        <textarea name="message" cols="30" rows="10"></textarea>
        <input type="submit" value="Envoyer">
    </form>
</main>
<?php require __DIR__.'/footer.php'?>
</body>
</html>