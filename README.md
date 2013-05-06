# Google API client for PHP

This library provides a PHP client for Google API using [Guzzle](http://guzzlephp.org/).

## URL Shortener

```php
<?php

use Google\UrlShortener\UrlShortenerClient;

$client   = UrlShortenerClient::factory(array(
    'api_key' => 'your_api_key' // optional
));

$shortUrl = $client->encode('http://www.google.com/'); // http://goo.gl/fbsS
$longUrl  = $client->decode('http://goo.gl/fbsS'); // http://www.google.com/
```