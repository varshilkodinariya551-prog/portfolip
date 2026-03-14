<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function register(): void
    {
    //
    }

    public function boot(): void
    {
        View::composer(['layouts.app', 'home'], function ($view) {
            try {
                if (Schema::hasTable('settings')) {
                    $settings = Setting::pluck('value', 'key')->toArray();
                }
                else {
                    $settings = [];
                }
            }
            catch (\Exception $e) {
                $settings = [];
            }
            $view->with('settings', $settings);
        });
    }
}
