# Laravel wrapper for the PHP HTML DOM Parser package.

Thin wrapper for https://github.com/paquettg/php-html-parser and provides the public function

```php
$proxy = "120.195.203.43:80";
$proxy = explode(':', $proxy);
loadFromUrlByProxy($url, $options = [], CurlInterface $curl = null, $proxy = null)
```

## Installation

Requires

- PHP 5.4+
- Laravel 5.1+

Install via Composer by adding the following line to the require block of your composer.json file

```php
"growthexponent/laravel-html-dom-parser": "1.0.4"
```

Then run ```php composer update ```

Add this line to the providers array in your ```php app/config/app.php ``` file:

```php
'GrowthExponent\LaravelHtmlDomParser\LaravelHtmlDomParserServiceProvider',
```

## Sample Usage

```php

<?php

use GrowthExponent\LaravelHtmlDomParser\LaravelHtmlDomParser;

class ...Controller extends Controller
{
    /**
     * ....
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $parser = new LaravelHtmlDomParser();
        $proxy = "120.195.203.43:80";
        $proxy = explode(':', $proxy);
        $html = $parser->loadFromUrlByProxy('http://www.growthexponent.com', [], null, $proxy);
        dd($html);
    }
}

```