<?php

require_once __DIR__ . '/menu.php';

?>

<form action="test_login_bd.php" method="POST" enctype="multipart/form-data">
    <label for="mail">Mail : </label>
    <input type="text" name="mail" value="ismael67" id="mail">
    <label for="pwd">Password : </label>
    <input type="text" name="pwd" value="ismael" id="pwd">

    <input type="submit" value="Envoyer">
</form>

<?php

if (!empty($_SESSION['error_msg'])) {
    echo 'AAA<div style="color: red;">' . $_SESSION['error_msg'] . '</div>';
}

require __DIR__.'/footer.php';?>
