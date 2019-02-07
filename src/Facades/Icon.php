<?php

namespace Ajtarragona\WebComponents\Facades; 

use Illuminate\Support\Facades\Facade;

class Icon extends Facade
{
    /**
     * {@inheritdoc}
     */
   
    
    protected static function getFacadeAccessor()
    {
        return 'icon';
    }
}
