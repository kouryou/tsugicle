<?php
switch ( env('CAKEPHP_ENV') ) {
    case 'development':
        return [
            'twitter' => [
                'consumer_key' => 'KDTgCkBp7Je3693Rz1ABzFzOJ',
                'consumer_secret' => 'OUVBPpEV3hat9bgkZC1GpEz1yI2Prrh4apcKiYNnZ8Dm84xJfa'
            ]
        ];
        break;

    case 'staging':
        return [
            'twitter' => [
                'consumer_key' => 'KDTgCkBp7Je3693Rz1ABzFzOJ',
                'consumer_secret' => 'OUVBPpEV3hat9bgkZC1GpEz1yI2Prrh4apcKiYNnZ8Dm84xJfa'
            ]
        ];
        break;

    case 'production':
        return [
            'twitter' => [
                'consumer_key' => 'F67G2huYukjjNYngTt3Y9WwNO',
                'consumer_secret' => 'zLTOfApHf97JpE3GOuAxwj133SsY5E3q0CL5DpiWAijZU1NOoZ'
            ]
        ];
        break;
}
