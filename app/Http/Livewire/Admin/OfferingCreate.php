<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brother;
use App\Models\Offering;

use Livewire\Component;

class OfferingCreate extends Component
{
    public $brother;
    public $slug_compuesto;
    public $slug_nombre;
    public $slug_fecha;
    public $open=true;
    public $selector="1";
    public $ofrenda_id="1";

    public function render()
    {
        $b_s =Brother::orderBy('name')->pluck('name', 'id');
        //$val_slug =Offering::orderBy('slug')->pluck('slug');
        $val_slug =Offering::orderBy('slug')->pluck('slug');
        //dd($b_s);
        $bro=Brother::find($this->selector);
        $ofrenda =Offering::find($this->ofrenda_id);
        $brothers=Brother::select('id','name', 'identificador')-> orderBy('name') -> get();
        $slug_compuesto = $this->slug_nombre."-".$this->slug_fecha;     
        return view('livewire.admin.offering-create',compact('brothers','bro','slug_compuesto','b_s', 'val_slug', 'ofrenda'));
    }
}
