<?php

require '../vendor/autoload.php';

// Template for the HTML-Document
$document = new SnappyComponents\HTMLDocument('en', 'Snappy Components');
// Strategy to wrap any rendered renderable with an HTML-Document
$documentStrategy = new SnappyComponents\Strategy\RenderDocument($document);
// Configuring the renderer with the strategy
$renderer = new SnappyRenderer\Renderer($documentStrategy);

echo $renderer->render(
    [
        include 'components/header.php',
        '<h2>The Basics</h2>',
        (include 'components/columns.php')([
            '<div>',
            [
                (include 'components/code.php')(__FILE__),
            ],
            '</div>',
        ]),
    ],
    (object)[]
);