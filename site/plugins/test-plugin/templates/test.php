<?php
// Hole die aktuelle Sprache
$lang= kirby()->language()->code();

// Hole die Seite
$page = page('test');

// Überprüfe, ob die Seite existiert und lade den Inhalt in der aktuellen Sprache
if ($page) {
	$content = $page->content();
	$contentArray = $content->toArray();

	var_dump($contentArray); // Überprüfe die Inhalte
} else {
	echo "Seite nicht gefunden.";
}

?>


<table>
	<tr>
		<th>Kriby language</th>
		<th>Page title</th>
		<th>Translation Test</th>
		<th>Test Data</th>
		<th>Slug</th>
	</tr>
	<tr>
		<td><?= $kirby->language() ?></td>
		<td><?= $page->title() ?></td>
		<td><?= t("translationTest") ?></td>
		<td><?= $page->data($lang) ?></td>
	</tr>
</table>