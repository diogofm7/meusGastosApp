<?php

namespace App\Http\Livewire\Expense;

use App\Models\Expense;
use Livewire\Component;

class ExpenseList extends Component
{
    public function render()
    {
        $expenses = Expense::paginate(1);

        return view('livewire.expense.expense-list', [
            'expenses' => $expenses
        ]);
    }
}
