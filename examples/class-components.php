<?php

require '../vendor/autoload.php';

$document = new SnappyComponents\HTMLDocument('en', 'Snappy Components');
$renderer = new SnappyRenderer\Renderer(new SnappyComponents\Strategy\RenderDocument($document));

echo $renderer->render(
    [
        include 'components/header.php',
        '<h2>Class Components</h2>',
        (include 'components/columns.php')([
            '<div>',
            sprintf('<p>To define a new class component implement the <code>%s</code> interface.</p>', \SnappyRenderer\Renderable::class),
            '</div>',
            '<div>',
            [
                (include 'components/code.php')(__FILE__),
            ],
            '</div>',
        ]),
    ],
    (object)[]
);
