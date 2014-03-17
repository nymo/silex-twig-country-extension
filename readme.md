## Twig filter country extension for Silex
This is an extension for Twig for use in Silex if you use forms with a country choice list from Symfony 2.
The Symfony 2 form saves each country from the choice list with a two letter country code. In order to display
the full country name in your twig template you can use this country filter. It takes the two letter country code
and displays the country as a full name in your current locale.

### Requirements
This extension was created for Silex and Twig Template Engine

### Installation

#### Via composer:
```javascript
require: "nymo/silex-twig-country-extension": "~1.0"
```

### Usage

####load twig template engine
First you have to register the twig template engine in your silex application
```php
$app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => 'your view path',
        'twig.options' => array(
            "cache" => 'your cache path'
        )
    ));
```
Read more about the configuration at the official [docs] (http://silex.sensiolabs.org/doc/providers/twig.html)

#### add new extension to twig
As a next step you can retreive the twig service from your app container and register the country extension.
```php
$twig = $app['twig'];
$twig->addExtension(new \nymo\Twig\Extension\CountryExtension($app));
```

#### in your template
I assume that you have already saved data in your db or anywhere else and want now to display this data in your
html side. For example you have the country letter code **de**. When using the filter from below you will receive
**Germany** or **Deutschland**(depends on your current locale).

```
<h1>You're living in {{ foo.country|country }}</h1>
```


