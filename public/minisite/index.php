<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
</head>
<body>
<?php require __DIR__.'/menu.php';

//$name = "ISMO";
//$_SESSION['name'] = $name;
//$pwd = "ISMO";
//$_SESSION['pwd'] = $pwd;
//
//$_SESSION['auth']=true;
//session_start();
//var_dump($_SESSION);
ini_set('session.use_strict_mode', 1); // a mettre partout avant le session start, ca sert a ce que la session ne garde pas les cookies persos
if (isset($_SESSION['mail'])) {
    require __DIR__.'/../functions.php';
 }
else{
    echo "T'as qu'à te connecter<h1>Mouhahahaha</h1>";
}





 ?>
<?php require __DIR__.'/footer.php';?>
</body>
</html>