<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Expense;
use Livewire\Component;

class ExpensesEdit extends Component
{
    public $expense;

    public function mount(Expense $expense){
        $this->expense = $expense;
    }

    public function render()
    {
        $cat =Category::orderBy('categoria')->pluck('categoria', 'id');     
        return view('livewire.admin.expenses-edit',compact('cat'));
    }
}
