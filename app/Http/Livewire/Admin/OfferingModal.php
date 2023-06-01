<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class OfferingModal extends Component
{
    public $confirmingUserDeletion = false;
    public $mensaje="Hola";

    public function render()
    {
        return view('livewire.admin.offering-modal');
    }
}
