<?= $page->title() ?>
<?= $page->text()->kt() ?>

<?php 
    $children = $page->children();
    foreach ($children as $child) {
        echo ("<a href='".$child->uri()."'>".$child->title()."</a>\n");
    }