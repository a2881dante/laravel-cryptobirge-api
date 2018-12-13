<?php

namespace A2881dante\Cryptobirges;

use Illuminate\Support\ServiceProvider;
use App;
use Blade;

/**
 * Created by PhpStorm.
 * User: a2881dante
 * Date: 12/13/18
 * Time: 8:10 AM
 */

class CryptobirgeServiceProvider extends ServiceProvider{

    public function boot(){}


    public function register()
    {

        App::singleton('cryptobirge', function(){
            return new \A2881dante\Cryptobirges\Cryptobirge();
        });

    }

}