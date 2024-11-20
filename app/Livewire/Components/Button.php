<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Button extends Component
{
    public $text;      // Der Text des Buttons
    public $logo;      // Das SVG-Logo
    public $bgColor;   // Die Hintergrundfarbe des Buttons

    public function mount($text, $logo, $bgColor = 'amber-200')
    {
        $this->text = $text;    // Setze den Text
        $this->logo = $logo;    // Setze das Logo
        $this->bgColor = $bgColor; // Setze die Hintergrundfarbe
    }

    public function render()
    {
        return view('livewire.button');  // Rendere die Blade-Datei des Buttons
    }
}
