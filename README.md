# snappy-components

## Components for snappy-renderer

### Getting started

 - Install php version 7.4 or higher
 - Run `php composer.phar install` in the project directory
 - Install an start Docker Desktop from docker.com
 - Navigate to the project directory and run `docker compose up`
 - Access `localhost:36000` in your web browser


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
$documentStrategy = new \SnappyComponents\Strategy\RenderDocument($document);
// Configuring the renderer with the strategy
$renderer = new SnappyRenderer\Renderer($documentStrategy);
echo $renderer->render(
    new SnappyRenderer\Renderable\Functional(include 'greeting.php'),
    (object)['name' => 'world']
)
```
