<?php

require '../vendor/autoload.php';

// Template for the HTML-Document
$document = new SnappyComponents\Document('en', 'The Basics');
$document->setHead([
    '<style>',
    include 'components/styles.php',
    '</style>'
]);
// Strategy to wrap any rendered renderable with an HTML-Document
$documentStrategy = new SnappyComponents\DocumentStrategy($document);

// Configuring the renderer with the strategy
$renderer = new SnappyRenderer\Renderer($documentStrategy);

echo $renderer->render(
    new SnappyRenderer\Renderable\Functional(fn() => [
        '<h1>The Basics</h1>',
        include 'components/navigation.php',
        '<p></p>',
        (include 'components/code.php')(__FILE__),
    ]),
    (object)[]
);