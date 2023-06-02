<?php

declare(strict_types=1);

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Rating extends Component
{
    public int $fulls = 0;
    public int $empties = 0;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public float $rating
    ) {
        $this->countStarTypes();
    }

    public function countStarTypes()
    {
        $this->fulls = (int) round($this->rating);
        $this->empties = 5 - $this->fulls;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.rating');
    }
}
