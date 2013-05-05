# Google API client for PHP

This library provides PHP client for Google API using Guzzle.

## URL Shortener

```php
<?php

use Google\UrlShortener\UrlShortenerClient;

$client   = UrlShortenerClient::factory();
$shortUrl = $client->encode('http://www.google.com/');
$longUrl  = $client->decode('http://goo.gl/fbsS');
```