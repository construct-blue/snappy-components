<?php

require '../vendor/autoload.php';

$document = new SnappyComponents\Document('en', 'Functional Components');
$documentStrategy = new SnappyComponents\Strategy\RenderDocument($document);
$renderer = new SnappyRenderer\Renderer($documentStrategy);

echo $renderer->render(
    [
        (include 'components/header.php')('Functional Components'),
        '<article>',
        '<p>Functional components are the easiest way to create a reusable HTML-Snippet for your page. Once created you can include them in any other component.',
        '<p>To define a new functional component create a plain PHP-File returning a closure that generates HTML-Elements.</p>',
        '<h2>Example</h2>',
        '<p>Defining a functional component:</p>',
        '<pre>',
        highlight_string(
            <<<PHP
<?php

return fn() => yield <<<HTML
<p>The quick brown fox jumps over the lazy dog.</p>
HTML;
PHP
            , true
        ),

        '</pre>',
        '<p>Using the functional component:</p>',
        '<pre>',
        highlight_string(
            <<<PHP
<?php

return fn() => [
    '<h1>Hello world</h1>',
    yield include 'my-component.php'
];
PHP
            , true
        ),
        '</pre>',
        '</article>',
        (include 'components/code.php')(__FILE__)
    ],
    (object)[]
);
