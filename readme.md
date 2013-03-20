## Twig filter country extension for Silex
```
This extension provides a filter for your twig template to receive a full country name for a given country key.
The translation of the country name is based on your current locale which is configured in Silex.
The Country key is based on the Symfony 2 country form type.
```

### Requirements
```
Obviously Silex and Twig
```

### Installation

#### Via composer:
```
require: "nymo/silex-twig-country-extension": "dev-master"
```

### Usage

####load twig template engine
```
$app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => 'your path',
        'twig.options' => array(
            "cache" => 'your path'
        )
    ));
```

#### add new extension to twig
```
$twig = $app['twig'];
$twig->addExtension(new \nymo\Twig\Extension\CountryExtension($app));
```

#### in your template
```
<h1>This is {{ foo.country|country }}</h1>
```


