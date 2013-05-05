<?php

namespace Google\UrlShortener;

use Guzzle\Common\Collection;
use Guzzle\Service\Client;
use Guzzle\Service\Description\ServiceDescription;

/**
 * @author Matthieu Moquet <matthieu@moquet.net>
 */
class UrlShortenerClient extends Client
{
    /**
     * Build the client from given configuration.
     *
     * @param array  $data configuration
     *
     * @return Client An instance of the client
     */
    public static function factory($data = array())
    {
        $default = array(
            'base_url' => '{scheme}://www.googleapis.com/urlshortener/{version}',
            'scheme'   => 'https',
            'version'  => 'v1',
        );

        $config = Collection::fromConfig($data, $default, $required);
        $client = new self($config->get('base_url'), $config);

        $description = ServiceDescription::factory(__DIR__.'/Resources/service.php');
        $client->setDescription($description);

        return $client;
    }

    /**
     * Shorten an URL.
     *
     * @param string $url The URL to shorten
     *
     * @return string The short URL
     */
    public function encode($url)
    {
        $command = $this->getCommand('EncodeUrl', array('longUrl' => $url));
        $response = $this->execute($command);

        return $response['id'];
    }

    /**
     * Decode an URL.
     *
     * @param string $url The URL to decode
     *
     * @return string The decoded URL
     */
    public function decode($url)
    {
        $command = $this->getCommand('DecodeUrl', array('shortUrl' => $url));
        $response = $this->execute($command);

        return $response['longUrl'];
    }
}