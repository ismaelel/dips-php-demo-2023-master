<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TABLEAUX</title>
</head>
<body>
    <h1>Tableaux</h1>
    <h2>Qst 3</h2>
    <?php

    $chiffres = 0;
    $carac_spec = 0;
    $maj_ou_min = 0;

    $mdp = "Is23*/,";

    $tab_carac_spec = ["*", "^", "%", "#", "-", "+", "?", "!", ",", ";", ":", "=", "@"]; // str_split("*^%#-+?!");
    $tab__min = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"]; // range("a", "z");
    $tab_chiffres = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];
    $tab_maj = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];

    for ($i=0; $i < strlen($mdp); $i++) { 
        $carac = $mdp[$i];
        if (in_array($carac, $tab_carac_spec)) {
            $carac_spec++;
        }
        /* if (in_array($carac, '/^[a-z]+$/')) {
            $maj_ou_min++;
        } */
        if (in_array($carac, $tab_maj)) {
            $maj_ou_min++;
        }
        if (in_array($carac, $tab_chiffres)) {
            $chiffres++;
        }
    }
   /*  $s="HAHA";
    if  (preg_match('/^[a-z]+$/', $s) == true)   echo 1; 
		 else
		if  (preg_match('/^[A-Z]+$/', $s) == true)   echo 2; */

    echo "carac_spec : ". $carac_spec. "<br>";
    echo "maj_ou_min : ". $maj_ou_min. "<br>";
    echo "chiffres : ". $chiffres. "<br>";
    echo "longueur mdp : ". strlen($mdp). "<br>";
    if ($carac_spec >= 2 && $maj_ou_min >= 1 && $chiffres >= 2 && strlen($mdp) >= 8) {
        echo "le mdp est valide";
    }
    else {
        echo "le mdp n'est pas valide";
    }
    echo "<br>";


    ?>
    <h2>Qst 4</h2>

    <?php
    
    $mail = "ism?o*6.7nhf@hot!.5m.ail.f7*r";

    $parties = explode('@', $mail);
    $premiere_partie = $parties[0];
    $deuxieme_partie = explode('.', $parties[1])[0];
    $troisieme_partie = explode('.', $parties[1])[1];
        
    echo "premiere_partie : ". $premiere_partie. "<br>";
    echo "deuxieme_partie : ". $deuxieme_partie. "<br>";
    echo "troisieme_partie : ". $troisieme_partie. "<br>";

    $test = explode('.', $parties[1]);
    var_dump($test);
    $fin = end($test);
    echo "<br>";
    var_dump($fin);
    echo "<br>";
    unset($test[sizeof($test)-1]); // ou bien on inverse le tableau et on supprime le premier élément
    $hotamil = implode('.', $test);
    var_dump($hotamil);

    /* if (is_string($premiere_partie) && is_string($deuxieme_partie) && is_string($troisieme_partie) ){
        if ()
    } */
    $une_lettre_part1 = false;
    $une_lettre_part2 = false;

    for ($i=0; $i < strlen($premiere_partie); $i++){
        if (in_array($premiere_partie[$i], $tab_carac_spec)) {
            echo "Pas le droit a ces caractères : ". $premiere_partie[$i]. " Mon gaté<br>";
        }
        if (in_array($premiere_partie[$i], $tab__min) || in_array($premiere_partie[$i], $tab_maj)) {
            $une_lettre_part1 = true;
        }
    }

    for ($i=0; $i < strlen($deuxieme_partie); $i++){
        if (in_array($deuxieme_partie[$i], $tab_carac_spec)) {
            echo "OOOH Pas le droit a ces caractères : ". $deuxieme_partie[$i]. " Mon gaté<br>";
        }
        if (in_array($deuxieme_partie[$i], $tab__min) || in_array($deuxieme_partie[$i], $tab_maj)) {
            $une_lettre_part2 = true;
        }
    }
    if (!$une_lettre_part1) echo "Pas de lettre dans la premiere partie<br>";
    if (!$une_lettre_part2) echo "Pas de lettre dans la deuxieme partie<br>";

    for ($j=0; $j < strlen($troisieme_partie); $j++) {
        if (in_array($troisieme_partie[$j], $tab_carac_spec)) {
            echo "Pas le droit a ces caractères : ". $troisieme_partie[$j]. " Mon gaté<br>";
        }
        if (in_array($troisieme_partie[$j], $tab_chiffres)) {
            echo "PAS DE CHIFFRE : ". $troisieme_partie[$j]. " Mon gaté";
        }
    }

    ?>

</body>
</html>