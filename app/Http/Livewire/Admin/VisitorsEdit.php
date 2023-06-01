<?php

namespace App\Http\Livewire\Admin;

use App\Models\Lesson;
use App\Models\Visitor;
use Livewire\Component;

class VisitorsEdit extends Component
{

    public function mount(Visitor $visitor){
        $this->visitor = $visitor;
    }
    
    public function render()
    {
        $lessons =Lesson::orderBy('leccion')->pluck('leccion', 'id');
        return view('livewire.admin.visitors-edit', compact('lessons'));
    }
}
