<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Carbon\Carbon;

Carbon::setLocale('nl_NL');

/**
 * Return Carbon now
 *
 * @param string $tz
 * @return Carbon
 */
function now($tz = 'Europe/Amsterdam')
{
    return Carbon::now($tz);
}

/**
 * Get next friday the 13th or null
 *
 * @return Carbon|false|null
 */
function getNextFridayThe13th($year)
{
    for ($i = 1; $i < 12; $i++) {
        $date = Carbon::create($year, $i, 13);

        if ($date->dayOfWeek === 5 && !$date->isPast()) {
            return $date;
        }
    }

    return getNextFridayThe13th($year + 1);
}

$isIt = false;
$now = now();
$nextFridayThe13th = getNextFridayThe13th(now()->year);

if ($now->isFriday() && $now->day === 13) {
    $isIt = true;
}

?>
<!--

    ishetvrijdagde13e.nl - Door Rick Klaasboer (rickklaasboer.nl)
    GitHub: https://github.com/rickklaasboer/ishetvrijdagde13e.nl

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

<div class="flex-container scheme">
    <div class="flex-item">
        <h1>Is het vrijdag de 13e?</h1>
    </div>
    <div class="flex-item text-center">
        <p class="is-it"><?= $isIt ? "Ja" : "Nee" ?></p>

        <?php if ($nextFridayThe13th): ?>
            <p class="next-friday">De volgende vrijdag de 13e is op <?= $nextFridayThe13th->format('d-m-Y') ?></p>
        <?php endif; ?>
    </div>
</div>

<a href="https://github.com/rickklaasboer/ishetvrijdagde13e.nl" class="bootstrap-icon">
    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-github"
         viewBox="0 0 16 16">
        <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
    </svg>
</a>

</body>
</html>
