<?php

namespace Src\Traits;

trait TraitUrlParser{
    
    #divide a rul em um array
    public function parseUrl(){
        return explode("/", rtrim($_GET['url']), FILTER_SANITIZE_URL);
    }
}