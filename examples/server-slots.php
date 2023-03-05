<?php

require '../vendor/autoload.php';

$document = new SnappyComponents\Document('en', 'Snappy Components');
$renderer = new SnappyRenderer\Renderer(new SnappyComponents\Strategy\RenderDocument($document));

echo $renderer->render(
    [
        include 'components/header.php',
        '<h2>Server-Side Slots</h2>',
        (include 'components/columns.php')([
            '<div>',
            '<p>Slots can be used to inject content to other components. For example to add elements to the <code>&lt;head&gt;</code> from an element in the <code>&lt;body&gt;</code> .',
            '<h3>Example</h3>',
            '<p>Defining a slot target:</p>',
            [
                '<pre>',
                include 'slots/slot-definition.php',
                '</pre>',
            ],
            '<p>Capture content to the slot:</p>',
            [
                '<pre>',
                include 'slots/slot-usage-with-capture.php',
                '</pre>',
            ],
            '<p>It is also possible to append the capture to a slot by passing <code>true</code> as the third parameter when creating the capture.</p>',
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
