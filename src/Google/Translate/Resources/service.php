<?php

return array(
    'name'        => 'Translate',
    'apiVersion'  => 'v2',
    'description' => 'Google Translation service',
    'operations'  => array(
        'Translate' => array(
            'httpMethod' => 'GET',
            'uri'        => '',
            'parameters' => array(
                'q' => array(
                    'location' => 'query',
                    'type'     => 'string',
                    'required' => true
                ),
                'source' => array(
                    'location' => 'query',
                    'type'     => 'string',
                    'required' => true
                ),
                'target' => array(
                    'location' => 'query',
                    'type'     => 'string',
                    'required' => true
                ),
            )
        ),
    )
);