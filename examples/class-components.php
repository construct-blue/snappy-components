<?php

require '../vendor/autoload.php';

$document = new SnappyComponents\Document('en', 'Class Components');
$documentStrategy = new SnappyComponents\Strategy\RenderDocument($document);
$renderer = new SnappyRenderer\Renderer($documentStrategy);

echo $renderer->render(
    [
        (include 'components/header.php')('Class Components'),
        '<article>',
        '<p></p>',
        sprintf('<p>To define a new class component implement the <code>%s</code> interface.</p>', \SnappyRenderer\Renderable::class),
        '</article>',
        (include 'components/code.php')(__FILE__)
    ],
    (object)[]
);
