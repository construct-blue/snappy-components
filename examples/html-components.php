<?php

use SnappyComponents\Article;
use SnappyComponents\Button;
use SnappyComponents\Details;
use SnappyComponents\Strategy\RenderDocument;

require '../vendor/autoload.php';

$document = new SnappyComponents\Document('en', 'HTML Components');
$renderer = new SnappyRenderer\Renderer(new RenderDocument($document));

echo $renderer->render(
    new SnappyRenderer\Renderable\Functional(fn() => [
        (include 'components/header.php')('HTML Components'),
        (include 'components/columns.php')([
            '<div>',
            '<h2>Output</h2>',

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
            (include 'components/code.php')(__FILE__),

            '</div>',
        ]),
    ]),
    (object)[]
);