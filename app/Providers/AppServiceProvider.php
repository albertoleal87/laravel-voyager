<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        $this->LogQuerys();

    }

    public function LogQuerys()
    {

        \DB::listen(function($query){

            $query_sql = $query->sql;
            $bindings = $query->bindings;
            $time = $query->time;

            // Format binding data for sql insertion
            foreach($bindings as $i => $binding){
                if($binding instanceof \DateTime){
                    $bindings[$i] = $binding->format('\'Y-m-d H:i:s\'');
                }elseif(is_string($binding)){
                    $bindings[$i] = "'$binding'";
                }
            }

            // Insert bindings into query
            $query_sql = str_replace(array('%', '?'), array('%%', '%s'), $query_sql);
            $query_sql = vsprintf($query_sql, $bindings);
            // print the query
            \Log::info("[QUERY]: {$query_sql} [{$time}ms] ");    
        });

    }
}
