<?php

namespace App\Http\Livewire\Admin;

use App\Models\Lesson;

use Livewire\Component;

class VisitorsCreate extends Component
{
    public function render()
    {
        $lessons =Lesson::orderBy('leccion')->pluck('leccion', 'id');
        return view('livewire.admin.visitors-create',compact('lessons'));
    }
}
