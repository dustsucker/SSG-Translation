<?php

use Kirby\Cms\Page;

Kirby::plugin("symcon/shop", [
	"templates" => [
		"test" => __DIR__ . "/templates/test.php"
	],
	"pages"     => [
		"test" => new Page(
			[
				"slug"         => "test",
				"template"     => "test",
				"translations" => [
					"de" => [
						"code"    => "de",
						"content" => [
							"title" => "test DE",
							"data" => "Test Data DE"
						],
					],
					"en" => [
						"code"    => "en",
						"content" => [
							"title" => "test EN",
							"data" => "Test Data EN"
						],
					],
				],
				"draft"        => false,
			]
		)
	],
	"translations" => [
		"en" => [
			"translationTest" => "Translation Test"
		],
		"de" => [
			"translationTest" => "Übersetzungs Test"
		],
	],
]);