<?php

namespace I9code\LaravelMetronic3\Events;


use I9code\LaravelMetronic3\Menu\Builder;

class BuildingMenu
{
    public $menu;

    public function __construct(Builder $menu)
    {
        $this->menu = $menu;
    }
}
