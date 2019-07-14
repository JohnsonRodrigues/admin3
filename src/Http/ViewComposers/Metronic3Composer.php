<?php

namespace I9code\LaravelMetronic3\Http\ViewComposers;

use I9code\LaravelMetronic3\Metronic3;
use Illuminate\View\View;


class Metronic3Composer
{
    /**
     * @var Metronic3
     */
    private $metronic3;

    public function __construct(Metronic3 $metronic3)
    {
        $this->metronic3 = $metronic3;
    }

    public function compose(View $view)
    {
        $view->with('metronic3', $this->metronic3);
    }
}
