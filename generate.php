<?php

declare(strict_types=1);

require __DIR__ . "/kirby/bootstrap.php";

$kirby = kirby();

// Add the shop plugin Routes
$pluginRoutes = [];


$shopMainPage = $kirby->page("test");

$pluginRoutes = getChildrenInformation($shopMainPage);

function getChildrenInformation($parent): array
{
	$information = [];
	$information[] = [
		"path"         => $parent->url("de"),
		"route"        => $parent->url("de"),
		"languageCode" => "de",
	];
	$information[] = [
		"path"         => $parent->url("en"),
		"route"        => $parent->url("en"),
		"languageCode" => "en",
	];
	$children = $parent->children();
	//go recursive thought the pages
	foreach ($children as $child) {
		$information = array_merge(
			$information,
			getChildrenInformation($child),
		);
	}
	return $information;
}

$staticSiteGenerator = new D4L\StaticSiteGenerator($kirby);
$staticSiteGenerator->setCustomRoutes($pluginRoutes);
$staticSiteGenerator->setIgnoreUntranslatedPages(true);
$files = $staticSiteGenerator->generate("./build");

// For debugging we want to display which pages were rendered
foreach ($files as $file) {
	echo $file . PHP_EOL;
}