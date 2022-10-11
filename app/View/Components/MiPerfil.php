<?php

namespace App\View\Components;

use Auth;
use Request;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Route;

class MiPerfil extends Component
{
    public $user;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( Request $request)
    {
        $this->user = Auth::user();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        if(Route::currentRouteName('bike.myBikes')){
            return view('components.mi-perfil', [
                'user' => $this->user
            ]);
        }

    }
}
