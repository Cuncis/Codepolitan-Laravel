<?php

namespace App\View\Components\Movie;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class Card extends Component
{
    public $index;
    public $title;
    public $releasedate;
    public $image;
    /**
     * Create a new component instance.
     */
    public function __construct($index, $title, $releasedate, $image)
    {
        $this->index = $index;
        $this->title = $title;
        $this->releasedate = $releasedate;
        $this->image = $image;

        if ($this->isValid()) {
            $this->title = Str::upper($this->title);
            $this->releasedate = Carbon::parse($releasedate)->format('M d, Y');
        }
    }

    private function isValid(): bool
    {
        return !empty($this->title) && !empty($this->releasedate);
    }

    public function getImage(): string
    {
        if ($this->image) {
            return $this->image;
        }
        return 'https://placehold.co/300x450?text=No+Image';
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if (!$this->isValid()) {
            return '';
        }
        return view('components.movie.card');
    }
}
