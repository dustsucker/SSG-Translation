<?php

require __DIR__ . '/kirby/bootstrap.php';

$kirby = kirby();
$staticSiteGenerator = new D4L\StaticSiteGenerator($kirby);
$staticSiteGenerator->setCustomRoutes([
    [
        'path' => 'feed-de.xml',
        'route' => 'de/feed'
    ],
    [
        'path' => 'feed-en.xml',
        'route' => 'en/feed'
    ],
]);
$staticSiteGenerator->setIgnoreUntranslatedPages(true);
$files = $staticSiteGenerator->generate('./build');

// For debugging we want to display which pages were rendered
foreach ($files as $file) {
    echo $file . PHP_EOL;
}