# php-navigator
Navigator renderable as breadcrumb. This is realy very simple navigation which can be render as breadcrumb. Rendered can by configured or you can write your own renderer.

Example
--------

```php
$navigator = new Navigator();
$navigator->add('Home', 'http://www.example.com');
$navigator->add('Contact', 'http://www.example.com/contact');
$navigator->render();
```
But you can get and configure renderer with:
```php
$navigator->getRenderer()->setContainer(..);
```
Or you can write your own renderer which implement IRenderer interface.
 
 
