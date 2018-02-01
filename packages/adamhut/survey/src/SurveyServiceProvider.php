<?php

namespace Survey;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class SurveyServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // dd(__DIR__ . '/resources/views');
        Schema::defaultStringLength(191);
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/resources/views','survey');
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->registerPublishTables();
    }


    private function registerPublishTables()
    {
        $basePath= dirname(__DIR__);
        
        $arrPublishable=[
            'migrations' => [
                "{$basePath}/publishable/database/migrations"=> database_path('migrations'),
            ],
            'config' => [
                "{$basePath}/publishable/config/survey.php" => config_path('survey.php'),
            ]
        ];

        foreach ($arrPublishable as $group => $path) {
             $this->publishes($path,$group);
        }
    }
    
}