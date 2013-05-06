<?php

/*
 * This file is part of Google API client.
 *
 * (c) Matthieu Moquet <matthieu@moquet.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Google\Translate;

use Google\Common\Authentication\ApiKeyListener;
use Guzzle\Common\Collection;
use Guzzle\Service\Client;
use Guzzle\Service\Description\ServiceDescription;

/**
 * @author Matthieu Moquet <matthieu@moquet.net>
 */
class TranslateClient extends Client
{
    /**
     * Build the client from given configuration.
     *
     * @param array $data configuration
     *
     * @return Client An instance of the client
     */
    public static function factory($data = array())
    {
        $default = array(
            'base_url' => '{scheme}://www.googleapis.com/language/translate/{version}',
            'scheme'   => 'https',
            'version'  => 'v2',
        );

        $config = Collection::fromConfig($data, $default, $required);
        $client = new self($config->get('base_url'), $config);

        $description = ServiceDescription::factory(__DIR__.'/Resources/service.php');
        $client->setDescription($description);

        if (isset($data['api_key'])) {
            $client->addSubscriber(new ApiKeyListener($data['api_key']));
        }

        return $client;
    }

    /**
     * Tranlsate a query string.
     *
     * @param strin $query  The query to translate
     * @param string $source The source language
     * @param string $target The target language
     *
     * @return string The translated text
     */
    public function translate($query, $source, $target)
    {
        $command = $this->getCommand('Translate', array(
            'q'      => $query,
            'source' => $source,
            'target' => $target,
        ));

        $response = $this->execute($command);

        $translations = $response['data']['translations'];
        $translatedText = $translations[0]['translatedText'];

        return $translatedText;
    }
}