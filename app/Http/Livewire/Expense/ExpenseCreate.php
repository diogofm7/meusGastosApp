<?php

namespace App\Http\Livewire\Expense;

use App\Models\Expense;
use Livewire\Component;

class ExpenseCreate extends Component
{
    public $description, $amount, $type;

    protected $rules = [
        'description' => 'required',
        'amount' => 'required',
        'type' => 'required'
    ];

    public function createExpense()
    {
        $this->validate();

        auth()->user()->expenses()->create([
            'description' => $this->description,
            'amount' => $this->amount,
            'type' => $this->type
        ]);

        session()->flash('message', 'Registro criado com sucesso!');

        $this->description = $this->amount = $this->type = null;
    }

    public function render()
    {
        return view('livewire.expense.expense-create');
    }
}
