<?php

return array(
    'name'        => 'UrlShortener',
    'apiVersion'  => 'v1',
    'description' => 'Google URL Shortener',
    'operations'  => array(
        'EncodeUrl' => array(
            'httpMethod' => 'POST',
            'uri'        => 'url',
            'parameters' => array(
                'longUrl' => array(
                    'location' => 'json',
                    'type'     => 'string',
                    'required' => true
                ),
            )
        ),
        'DecodeUrl' => array(
            'httpMethod' => 'GET',
            'uri'        => 'url',
            'parameters' => array(
                'shortUrl' => array(
                    'location' => 'query',
                    'type'     => 'string',
                    'required' => true
                ),
            )
        ),
    )
);