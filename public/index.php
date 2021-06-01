<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Carbon\Carbon;

$isIt = false;
$now = Carbon::now('Europe/Amsterdam');

if ($now->isFriday() && $now->day === 13) {
    $isIt = true;
}

?>
<!--

ishetvrijdagde13e.nl - Door Rick Klaasboer (rickklaasboer.nl)

-->

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta property="og:title" content="Is het vrijdag de 13e?"/>
    <meta property="og:site_name" content="Is het vrijdag de 13e?"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="http://ishetvrijdagde13e.nl/"/>
    <meta property="og:description"
          content="<?= $isIt ? "Het is vandaag vrijdag de 13e." : "Het is vandaag geen vrijdag de 13e." ?>"
    />

    <link rel="stylesheet" href="/css/style.css">
    <title>Is het vrijdag de 13e?</title>
</head>
<body>

<div class="flex-container">
    <div class="flex-item">
        <h5>Is het vrijdag de 13e?</h5>
    </div>
    <div class="flex-item">
        <p><?= $isIt ? "Ja" : "Nee" ?></p>
    </div>
</div>

</body>
</html>
