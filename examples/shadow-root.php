<?php

use SnappyComponents\Element\Article;
use SnappyComponents\Element\Paragraph;
use SnappyComponents\Element\Slot;
use SnappyComponents\Element\Span;
use SnappyComponents\Element\Style;
use SnappyComponents\ShadowRoot;

require '../vendor/autoload.php';

$document = new SnappyComponents\Document('en', 'Snappy Components');
$renderer = new SnappyRenderer\Renderer(new SnappyComponents\Strategy\RenderDocument($document));

echo $renderer->render(
    [
        include 'components/header.php',
        '<h2>Shadow Root</h2>',
        (include 'components/columns.php')([
            '<div>',

            new Paragraph('Shadow roots allow the encapsulation of styles to only affect the components elements.'),
            new ShadowRoot('div', [
                new Style(
                    <<<CSS
p {
color: green;
}
article {
color: red;
}
CSS
                ),
                new Paragraph(new Slot('paragraph')),
                new Article(new Slot('article')),
            ], [
                (new Span('Paragraphs are green'))->setSlot('paragraph'),
                (new Span('Articles are green'))->setSlot('article'),
            ]),
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
