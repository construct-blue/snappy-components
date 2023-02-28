<?php

use SnappyComponents\Article;
use SnappyComponents\Button;
use SnappyComponents\Details;
use SnappyComponents\Strategy\RenderDocument;

require '../vendor/autoload.php';

$document = new SnappyComponents\Document('en', 'Snappy Components');
$renderer = new SnappyRenderer\Renderer(new RenderDocument($document));

echo $renderer->render([
    include 'components/header.php',
    '<h2>HTML Components</h2>',
    (include 'components/columns.php')([
        '<div>',
        '<h3>Output</h3>',

        new Article(
            new Details('Knock, knock.', [
                new Details('Who’s there?', [
                    new Details('Luke.', [
                        new Details('Luke who?', 'Luke through the peep hole and find out.'),
                    ]),
                ])
            ]),
        ),
        '<p></p>',

        new Button('Press me!'),
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