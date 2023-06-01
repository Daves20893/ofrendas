<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Expense;
use Livewire\Component;

class ExpensesCreate extends Component
{

    public function render()
    {
        $cat =Category::orderBy('categoria')->pluck('categoria', 'id');     
        return view('livewire.admin.expenses-create',compact('cat'));
    }
}
