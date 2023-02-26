# snappy-components

## Components for snappy-renderer

### Example usage

```php
<?php
// A functional component greeting.php
return fn($model) => yield <<<HTML
    <h1>The Example Greeting</h1>
    <p>Hello $model->name</p>
HTML;
```

```php
// Template for the HTML-Document
$document = new SnappyComponents\Document('en', 'Example');
// Strategy to wrap any rendered renderable with an HTML-Document
$documentStrategy = new SnappyComponents\DocumentStrategy($document);
// Configuring the renderer with the strategy
$renderer = new SnappyRenderer\Renderer($documentStrategy);
echo $renderer->render(new SnappyRenderer\Renderable\Functional(
    fn() => include 'greeting.php'),
    (object)['name' => 'world']
)
```
