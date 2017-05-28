<?php
namespace Xetaio\Mentions\Providers;

use Illuminate\Support\ServiceProvider;

class MentionServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Configs
        $this->publishes([
            __DIR__.'/../../config/mentions.php' => config_path('mentions.php')
        ], 'config');

        // Migrations
        $this->publishes([
            __DIR__.'/../../database/migrations/2017_05_27_103915_create_mentions_table.php' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_mentions_table.php')
        ], 'migrations');

        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations/2017_05_27_103915_create_mentions_table.php');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/mentions.php', 'mentions');
    }
}
