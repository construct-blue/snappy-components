<?php

require '../vendor/autoload.php';

// Template for the HTML-Document
$document = new SnappyComponents\Document('en', 'The Basics');
// Strategy to wrap any rendered renderable with an HTML-Document
$documentStrategy = new SnappyComponents\Strategy\RenderDocument($document);
// Configuring the renderer with the strategy
$renderer = new SnappyRenderer\Renderer($documentStrategy);

echo $renderer->render(
    [
        (include 'components/header.php')('The Basics'),
        '<p></p>',
        (include 'components/code.php')(__FILE__),
    ],
    (object)[]
);