<?php

/*
 * This file is part of Google API client.
 *
 * (c) Matthieu Moquet <matthieu@moquet.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Google\Common\Authentication;

use Guzzle\Common\Event;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * @author Matthieu Moquet <matthieu@moquet.net>
 */
class ApiKeyListener implements EventSubscriberInterface
{
    protected $apiKey;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            'request.before_send' => array('onRequestBeforeSend', -255)
        );
    }

    /**
     * Add API key on URL
     *
     * @param Event $event Event emitted
     */
    public function onRequestBeforeSend(Event $event)
    {
        $request = $event['request'];
        $request->getQuery()->add('key', $this->apiKey);
    }
}