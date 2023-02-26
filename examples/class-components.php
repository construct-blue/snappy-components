<?php

require '../vendor/autoload.php';

$document = new SnappyComponents\Document('en', 'Class Components');
$document->setHead([
    '<style>',
    include 'components/styles.php',
    '</style>'
]);
$documentStrategy = new SnappyComponents\DocumentStrategy($document);
$renderer = new SnappyRenderer\Renderer($documentStrategy);

echo $renderer->render(
    new SnappyRenderer\Renderable\Functional(fn() => [
        '<h1>Class Components</h1>',
        include 'components/navigation.php',
        '<article>',
        '<p></p>',
        sprintf('<p>To define a new class component implement the <code>%s</code> interface.</p>', \SnappyRenderer\Renderable::class),
        '</article>',
        (include 'components/code.php')(__FILE__)
    ]),
    (object)[]
);
