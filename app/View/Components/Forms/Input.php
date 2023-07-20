<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\View\Component;

class Input extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $label,
        public $name,
        public $placeholder,
        public $type,
        public $value,
        public $class,
        public $id,
    )
    {
        foreach( $this->data() as $key => $value ) {
            Log::info($key);
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.atoms.input');
    }
}
