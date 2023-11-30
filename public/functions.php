<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FUNCTIONS</title>
</head>
<body>
<h1>Functions</h1>
<h2>Qst 1</h2>
<h3>Conditions</h3>
<h4>Calcul TVA</h4>

<?php

$prix_unitaire_ht = 100;
$taux_tva = 0.20;
$nb_articles=0;

$calcul_tva = function ($prix_unitaire_ht, $taux_tva, $nb_articles){
    $ttc = $prix_unitaire_ht + ($prix_unitaire_ht * $taux_tva);
    return $ttc;
};

echo $calcul_tva($prix_unitaire_ht, $taux_tva, $nb_articles);

?>

<h4>Conversion date</h4>

<?php


$time = 12334;
$h = intval($time / 3600);
$m = intval($time % 3600 / 60);
$s = intval($time % 60);

$affiche_heure = function ($h, $m, $s) {
    echo $h. ":". $m. ":". $s;
};

$affiche_heure($h, $m, $s);


?>

<h4>Remise client</h4>

<?php

$price = 1000;
$rate1 = 5;
$rate2 = 15;

function remise ($price, $rate1, $rate2) : float
{
    if ($price > 500) {
        $price *= (1 - $rate2 / 100);
    } elseif ($price > 100) {
        $price *= (1 - $rate1 / 100);
    }
    return $price;
};

echo remise($price, $rate1, $rate2);

?>

<h4>Message par heure</h4>

<?php

$h = date('G') + 1;
$m = date('i');
echo 'Il est ' . $h . ':' . $m . '<br>';

$message = function ($h, $m) {
    if ($h < 5 or $h >= 23) {
        echo 'Bonne nuit';
    } elseif ($h < 12) {
        echo 'Bonne matinée';
    } elseif (($h + $m / 100) < 13.3) {
        echo 'Bonne appétit';
    } elseif ($h < 18) {
        echo 'Bonne après-midi';
    } else {
        echo 'Bonne soirée';
    }
};

$message($h, $m);

?>
<h3>Boucles</h3>
<h4>Etoiles1</h4>

<?php

$star = 8;

$etoiles1 = function ($star) {
    $length = $star;

    for ($i=0; $i < $length; $i++) {
        echo str_repeat("*", $star);
        $star--;
        echo "<br>";
    }
};

$etoiles1($star); ?>

<h4>Etoiles2</h4>
<?php

$star = 8;


$etoiles2 = function ($star) {
    $length = $star;

    for ($i=0; $i < $length; $i++) {
        $space = $length - 1 - $i;
        echo str_repeat("&nbsp", $space);
        echo str_repeat("*", $length+1-$star);
        $star--;
        echo "<br>";
    }
};

$etoiles2($star);

?>

<h2>Qst 2</h2>
<?php

function priceTTC (float $prix_unitaire_ht, float $taux_tva) : float
{
    $ttc = $prix_unitaire_ht + (1+ $taux_tva/100);
    return $ttc;
}

?>
?>

<h2>Qst 3</h2>
<?php

$dumpetdumper = function (...$arg) {var_dump(...$arg); exit();};

//$dumpetdumper(123);

?>
<h2>Qst 4</h2>
<?php

$tri_croissant = function ($x, $y, $z) {
    $tableau = [$x, $y, $z];
//    if ($x > $y){
//        if ($x > $z){
//            $tab = [$y, $z, $x];
//            if ($y > $z){
//                $tab = [$z, $y, $x];
//            }
//        } else {
//            $tab = [$y, $x, $z];
//        }
//    }
//    else {
//        if ($y > $z){
//            $tab = [$x, $z, $y];
//            if ($x > $z){
//                $tab = [$z, $x, $y];
//            }
//        }
//    }
    $n = count($tableau);
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($tableau[$j] > $tableau[$j + 1]) {
                // Échange des éléments s'ils sont dans le mauvais ordre
                $temp = $tableau[$j];
                $tableau[$j] = $tableau[$j + 1];
                $tableau[$j + 1] = $temp;
            }
        }
    }

//    for ($i=0; $i < count($tab)-1; $i++) {
//        if ($tab[$i] > $tab[$i+1]) {
//            $tmp = $tab[$i];
//            $tab[$i] = $tab[$i+1];
//            $tab[$i+1] = $tmp;
//        }
//    }
    foreach ($tableau as $value) {
        echo $value. "<br>";
    }
};

echo $tri_croissant(7, 15, 1);

?>
<h2>Qst 5</h2>
<?php

function pairs_dans_intervalle ($a, $b)
{
    if ($a > $b) {
        $tmp = $a;
        $a = $b;
        $b = $tmp;
    }
    for ($i = $a+1; $i <= $b-1; $i++) {
        if ($i % 2 == 0) {
            echo $i. "<br>";
        }
    }
};

pairs_dans_intervalle(0,15);