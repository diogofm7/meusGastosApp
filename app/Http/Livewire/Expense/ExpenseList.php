<?php

namespace App\Http\Livewire\Expense;

use App\Models\Expense;
use Livewire\Component;

class ExpenseList extends Component
{

    public function remove($expense)
    {
        $expense = auth()->user()->expenses()->find($expense);
        $expense->delete();

        session()->flash('message', 'Registro removido com sucesso!');
    }

    public function render()
    {
        $expenses = auth()->user()->expenses()->orderBy('created_at', 'DESC')->paginate(10);

        return view('livewire.expense.expense-list', [
            'expenses' => $expenses
        ]);
    }
}
