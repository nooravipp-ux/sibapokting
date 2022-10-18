<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

class ContentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public $visitors;
    public $totalVisitor;
    public $yesterday;
    public $today;

    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->visitors = DB::select("SELECT (SELECT COUNT(*) FROM visitor) AS total_visitor, 
        //                         (SELECT COUNT(*) FROM visitor WHERE tanggal = (SELECT DATE_SUB(CURDATE(), INTERVAL 1 DAY) FROM visitor)) AS yesterday,
        //                         (SELECT COUNT(*) FROM visitor WHERE tanggal = CURDATE()) AS today;");       
        
        $this->totalVisitor = DB::select("SELECT COUNT(*) as total_visitor FROM visitor");
        $this->yesterday = DB::select("SELECT COUNT(*) as yesterday FROM visitor WHERE tanggal = (SELECT DATE_SUB(CURDATE(), INTERVAL 1 DAY))");
        $this->today = DB::select("SELECT COUNT(*) as today FROM visitor WHERE tanggal = CURDATE()");

        view()->composer('layouts.front-footer', function($view) {
            $view->with([
                'totalVisitor' => $this->totalVisitor,
                'yesterday' => $this->yesterday,
                'today' => $this->today
            ]);
        });
    }
}
