<?php

namespace Spatie\LivewireComments\View\Components;

use Illuminate\Support\HtmlString;
use Illuminate\View\Component;

class Styles extends Component
{
    public function render()
    {
        return view('comments::components.styles', [
            'stylesheet' => new HtmlString(
                file_get_contents(__DIR__ . '/../../../resources/css/comments.css')
            ),
        ]);
    }
}
