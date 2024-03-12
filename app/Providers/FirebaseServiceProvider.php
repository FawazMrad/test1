<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FirebaseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Path to your service account JSON file
        $serviceAccountFilePath = '/path/to/serviceAccountKey.json';

        // Initialize Firebase Admin SDK
        $serviceAccount = ServiceAccount::fromJsonFile($serviceAccountFilePath);
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();

        // Now you can use the Firebase Admin SDK in your Laravel backend
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
