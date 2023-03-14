<?php


namespace App\Http\Facades;


use Illuminate\Support\Facades\Facade;

class PermissionFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'permission';
    }
}
