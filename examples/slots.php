<?php

require '../vendor/autoload.php';

$document = new SnappyComponents\Document('en', 'Functional Components');
$documentStrategy = new SnappyComponents\Strategy\RenderDocument($document);
$renderer = new SnappyRenderer\Renderer($documentStrategy);

echo $renderer->render(
    [
        (include 'components/header.php')('Slots'),
        '<article>',
        '<p>Slots can be used to inject content to other components. For example to add elements to the <code>&lt;head&gt;</code> from an element in the <code>&lt;body&gt;</code> .',
        '<h2>Example</h2>',
        '<p>Defining a slot target:</p>',
        '<pre>',
        highlight_string(
            <<<PHP
<?php

return function() {
    yield '<head>';
    yield new Slot('head');
    yield '</head>';
};
PHP
            , true
        ),

        '</pre>',
        '<p>Capture content to the slot:</p>',
        '<pre>',
        highlight_string(
            <<<PHP
<?php

return function() {
    '<h1>Hello world</h1>',
    new SnappyComponents\Capture('head', '<script>console.log("Hello world")</script>'),
    new SnappyComponents\Capture('head', '<script>console.log("Appended")</script>', /** append: */ true),
};
PHP
            , true
        ),
        '</pre>',
        '<p>It is also possible to append the capture to a slot by passing <code>true</code> as the third parameter when creating the capture.</p>',
        '</article>',
        (include 'components/code.php')(__FILE__)
    ],
    (object)[]
);
