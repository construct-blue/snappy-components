<?php

require '../vendor/autoload.php';

$document = new SnappyComponents\HTMLDocument('en', 'Snappy Components');
$renderer = new SnappyRenderer\Renderer(new SnappyComponents\Strategy\RenderDocument($document));

echo $renderer->render(
    [
        include 'components/header.php',
        '<h2>Functional Components</h2>',
        (include 'components/columns.php')([
            '<div>',
            '<p>Functional components are the easiest way to create a reusable HTML-Snippet for your page. Once created you can include them in any other component.',
            '<p>To define a new functional component create a plain PHP-File returning a closure that generates HTML-Elements.</p>',
            '<h3>Example</h3>',
            '<p>Defining a functional component:</p>',
            [
                '<pre>',
                include 'functional/functional-definition.php',
                '</pre>',
            ],
            '<p>Using the functional component:</p>',
            [
                '<pre>',
                include 'functional/functional-usage.php',
                '</pre>',
            ],
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
