<?php

namespace App\Http\Livewire\Admin;

use App\Models\Visitor;
use Livewire\Component;
use Livewire\WithPagination;

class VisitorsIndex extends Component
{
    use WithPagination;

    public $search;
    public $search2;
    public $search3;
    public $search4;
    public $sort='id';
    public $direction='asc';
    public $confirmingUserDeletion=True;
    public $ofrenda="1";
    public function updatingSearch(){
        $this->resetPage();
    }

    public function updatingSearch2(){
        $this->resetPage();
    }


    public function render()
    {
        $visitors = Visitor::select('visitors')
            ->join('lessons', 'visitors.lesson_id', '=', 'lessons.id')
            ->select('visitors.*', 'lessons.leccion')
            ->where('visitors.nombre','like', '%' . $this->search . '%')
            ->Where('visitors.provincia','like', '%' . $this->search2 . '%')
            ->where('visitors.ciudad','like', '%' . $this->search3 . '%')
            ->Where('visitors.barrio','like', '%' . $this->search4 . '%')
            ->orderBy($this->sort, $this ->direction)
            ->paginate(25);

        return view('livewire.admin.visitors-index',compact('visitors'));
    }

    public function order($sort){
        if ($this->sort==$sort) {
            if ($this->direction=="asc")
                $this->direction="desc";
            else
                $this->direction="asc";
        } else {
            $this->sort=$sort;
            $this->direction="asc";
        }
    }
}
