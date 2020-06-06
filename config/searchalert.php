<?php

return [
    'pools' => [
        'jobs' => [
            // Model that will be mentioned
            'model' => Job::class,

            // Filter class that alters the query
            'query' => [
                'keyword' => 'search',
            ],

            // The column that will be used to search the model
            'column' => 'query',

            // Notification class to use when trying to send jobs
            'notification' => UserMentioned::class,

            // Automatically notify upon mentions
            'auto_notify' => true,
            
            // durations available in this pool
            'duration' => [
                'daily' => 24,
                'weekly' => 24 * 7,
            ],
        ],
    ],

];
