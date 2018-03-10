<?php
namespace Tests;

use Orchestra\Database\ConsoleServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use Xetaio\Mentions\Providers\MentionServiceProvider;

abstract class TestCase extends Orchestra
{
    public function setUp()
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
            MentionServiceProvider::class,
            ConsoleServiceProvider::class
        ];
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'testing');

        $app['config']->set('database.connections.testing', [
            'driver' => 'sqlite',
            'database' => __DIR__.'/vendor/temp/database.sqlite',
            'prefix' => '',
        ]);
    }

    protected function setupDatabase()
    {
        $databasePath = __DIR__.'/vendor/temp/database.sqlite';

        if (file_exists($databasePath)) {
            unlink($databasePath);
        }

        if (!file_exists($databasePath)) {
            file_put_contents($databasePath, '');
        }
    }
}
