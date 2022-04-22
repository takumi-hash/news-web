<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    /**
     * news item
     * 
     * @var mixed[]
     * /
    public $news_item;

    /**
     * 
     * Create a new component instance.
     * @param mixed
     * @return void
     */
    public function __construct($news_item)
    {
        $this->news_item = $news_item;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card');
    }
}
