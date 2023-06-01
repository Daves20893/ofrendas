<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brother;
use App\Models\Category;
use App\Models\Offering;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class BrothersSelect extends Component
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
        /* if ($this->selector==0) {
            $bro->cedula = " ";
            $bro->nombre = " ";
        } else {
            $bro=Brother::find($this->selector);
        } */
        //$b_s=Brother::select('name')-> orderBy('name') -> get();
        $b_s =Brother::orderBy('name')->pluck('name', 'id');
        //$val_slug =Offering::orderBy('slug')->pluck('slug');
        $val_slug =Offering::orderBy('slug')->pluck('slug');
        //dd($b_s);
        $bro=Brother::find($this->selector);
        $ofrenda =Offering::find($this->ofrenda_id);
        $brothers=Brother::select('id','name', 'identificador')-> orderBy('name') -> get();
        $slug_compuesto = $this->slug_nombre."-".$this->slug_fecha;     
        $cat =Category::orderBy('categoria')->pluck('categoria', 'id');   
        return view('livewire.admin.brothers-select',compact('brothers','bro','slug_compuesto','b_s', 'val_slug', 'ofrenda', 'cat'));
    }
}
