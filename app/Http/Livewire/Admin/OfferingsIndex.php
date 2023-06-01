<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brother;
use App\Models\Offering;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use phpDocumentor\Reflection\PseudoTypes\True_;

class OfferingsIndex extends Component
{
    use WithPagination;

    public $search;
    public $search2;
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
        $offerings = Offering::select('offerings')
            ->join('brothers', 'offerings.brother_id', '=', 'brothers.id')
            ->select('offerings.*', 'brothers.name', 'brothers.identificador')
            ->where('brothers.name','like', '%' . $this->search2 . '%')
            ->Where('offerings.fecha','like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this ->direction)
            ->paginate(25);

        $ofrendas = Offering::select('offerings')
            ->join('brothers', 'offerings.brother_id', '=', 'brothers.id')
            ->select('offerings.*', 'brothers.name', 'brothers.identificador')
            ->get();

        return view('livewire.admin.offerings-index',compact('offerings', 'ofrendas'));
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
