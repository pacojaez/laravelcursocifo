<?php

namespace App\View\Composers;

use App\Models\Bike;
use Illuminate\View\View;

class WelcomeComposer
{
    /**
     * The user repository implementation.
     *
     * @var \App\Models\Bike
     */
    protected $bikes;

    /**
     * Create a new profile composer.
     *
     * @param  \App\Models\Bikey  $bikes
     * @return void
     */
    public function __construct(Bike $bikes)
    {
        $this->bikes = $bikes;
    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $bikes = Bike::all();
        $bike = $bikes->random();
        $view->with('total', Bike::count())->with('bike', $bike);
    }
}
