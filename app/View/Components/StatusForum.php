<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatusForum extends Component
{

    public function __construct(
        protected string $status
    )
    {}

    public function render(): View|Closure|string
    {
        $color = 'primary';
        $color = $this->status === 'C' ? 'success' : $color;
        $color = $this->status === 'P' ? 'warning' : $color;
        $textStatus = getStatusForum($this->status);

        return view('components.status-forum')
                ->with('textStatus', $textStatus)
                ->with('color', $color);
    }
}
