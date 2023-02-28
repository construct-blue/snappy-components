<?php

use SnappyComponents\Article;
use SnappyComponents\Button;
use SnappyComponents\Details;
use SnappyComponents\Div;
use SnappyComponents\Heading;
use SnappyComponents\Strategy\RenderDocument;

require '../vendor/autoload.php';

$document = new SnappyComponents\Document('en', 'Snappy Components');
$renderer = new SnappyRenderer\Renderer(new RenderDocument($document));

echo $renderer->render([
    include 'components/header.php',
    new Heading(2, 'HTML Components'),
    (include 'components/columns.php')([
        new Div([
            new Heading(3, 'Output'),
            new Article(
                new Details('Knock, knock.', [
                    new Details('Who’s there?', [
                        new Details('Luke.', [
                            new Details('Luke who?', 'Luke through the peep hole and find out.'),
                        ]),
                    ])
                ]),
            ),
            new Button('Press me!'),
        ]),

        new Div((include 'components/code.php')(__FILE__))
    ]),
],
    (object)[]
);