<?php

namespace App\Http\Livewire\Expense;

use App\Models\Expense;
use Livewire\Component;

class ExpenseList extends Component
{

    public function remove(Expense $expense)
    {
        $expense->delete();

        session()->flash('message', 'Registro removido com sucesso!');
    }

    public function render()
    {
        $expenses = Expense::paginate(10);

        return view('livewire.expense.expense-list', [
            'expenses' => $expenses
        ]);
    }
}
