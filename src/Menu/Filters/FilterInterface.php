<?php

namespace I9code\LaravelMetronic3\Menu\Filters;

use I9code\LaravelMetronic3\Menu\Builder;

interface FilterInterface
{
    public function transform($item, Builder $builder);
}
