<?php

namespace App\Http\Livewire\Admin;

use App\Models\Expense;
use Livewire\WithPagination;
use Livewire\Component;

class ExpensesIndex extends Component
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
        $expenses = Expense::select('expenses')
            ->join('categories', 'expenses.category_id', '=', 'categories.id')
            ->select('expenses.*', 'categories.categoria')
            ->where('categories.categoria','like', '%' . $this->search . '%')
            ->Where('expenses.descripcion','like', '%' . $this->search2 . '%')
            ->orderBy($this->sort, $this ->direction)
            ->paginate(25);

        $gastos = Expense::select('expenses')
            ->join('categories', 'expenses.category_id', '=', 'categories.id')
            ->select('expenses.*', 'categories.categoria')
            ->get();

        return view('livewire.admin.expenses-index',compact('expenses', 'gastos'));
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
