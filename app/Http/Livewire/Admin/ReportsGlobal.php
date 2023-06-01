<?php

namespace App\Http\Livewire\Admin;
use App\Models\Brother;
use App\Models\Offering;
use Livewire\Component;
use Livewire\WithPagination;

class ReportsGlobal extends Component
{
    use WithPagination;
    
    public $search;
    public $search2;
    public $search3;
    public $sort='id';
    public $direction='asc';
    public $confirmingUserDeletion=True;
    public $ofrenda="1";
    public $selector="1";
    public function updatingSearch(){
        $this->resetPage();
    }

    public function updatingSearch2(){
        $this->resetPage();
    }


    public function render()
    {
        $offerings = Offering::select('offerings')
            ->join('brothers', 'offerings.brother_id', '=', 'brothers.id')
            ->select('offerings.*', 'brothers.name', 'brothers.identificador')
            ->WhereBetween('offerings.fecha', [$this->search, $this->search2])
            ->orderBy('offerings.fecha', 'asc')
            ->paginate(25);

        return view('livewire.admin.reports-global', compact('offerings'));
    }
}
