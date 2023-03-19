<?php

use SnappyComponents\HTML\Article;
use SnappyComponents\HTML\Button;
use SnappyComponents\HTML\Details;
use SnappyComponents\HTML\Div;
use SnappyComponents\HTML\Heading;
use SnappyComponents\HTML\Summary;
use SnappyComponents\Strategy\RenderDocument;

require '../vendor/autoload.php';

$document = new SnappyComponents\HTMLDocument('en', 'Snappy Components');
$renderer = new SnappyRenderer\Renderer(new RenderDocument($document));

echo $renderer->render([
    include 'components/header.php',
    new Heading(2, 'HTML Components'),
    (include 'components/columns.php')(
        new Div(
            new Heading(3, 'Output'),
            new Article(
                new Details(
                    new Summary('Knock, knock.'),
                    new Details(
                        new Summary('Who’s there?'),
                        new Details(
                            new Summary('Luke.'),
                            new Details(new Summary('Luke who?'), 'Luke through the peep hole and find out.'),
                        ),
                    )
                ),
            ),
            new Button('Press me!'),
        ),
        new Div((include 'components/code.php')(__FILE__))
    ),
],
    (object)[]
);