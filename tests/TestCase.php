<?php
namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Orchestra\Testbench\TestCase as Orchestra;
use Xetaio\Mentions\Providers\MentionServiceProvider;

class TestCase extends Orchestra
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->setupDatabase();

        $this->artisan('migrate', ['--database' => 'testing']);
        $this->loadMigrationsFrom(__DIR__ . '/vendor/migrations');

        config([
            'mentions.pools.users' => [
                'model' => \Tests\vendor\Models\User::class,
                'column' => 'username',
                'route' => '/users/profile/@',
                'notification' => \Tests\vendor\Notifications\MentionNotification::class,
            ]
        ]);
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            MentionServiceProvider::class
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function defineEnvironment($app)
    {
        $app['config']->set('database.default', 'testing');

        $app['config']->set('database.connections.testing', [
            'driver' => 'sqlite',
            'database' => __DIR__ . '/vendor/temp/database.sqlite',
            'prefix' => '',
        ]);
    }

    protected function setupDatabase()
    {
        $databasePath = __DIR__ . '/vendor/temp/database.sqlite';
        file_put_contents($databasePath, '');
    }
}
