<?php

namespace A2881dante\Cryptobirges;

use Illuminate\Support\ServiceProvider;
use App;
use Blade;


class CryptobirgeServiceProvider extends ServiceProvider{

    public function boot(){}


    public function register()
    {

        App::singleton('cryptobirge', function(){
            return new \A2881dante\Cryptobirges\Cryptobirge();
        });

    }

}