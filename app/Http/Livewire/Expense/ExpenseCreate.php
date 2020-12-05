<?php

namespace App\Http\Livewire\Expense;

use App\Models\Expense;
use Livewire\Component;
use Livewire\WithFileUploads;

class ExpenseCreate extends Component
{
    use WithFileUploads;

    public $description, $amount, $type, $photo;

    protected $rules = [
        'description' => 'required',
        'amount' => 'required',
        'type' => 'required',
        'photo' => 'image|nullable'
    ];

    public function createExpense()
    {
        $this->validate();

        if ($this->photo) {
            $this->photo = $this->photo->store('expenses-photos', 'public');
        }

        auth()->user()->expenses()->create([
            'description' => $this->description,
            'amount' => $this->amount,
            'type' => $this->type,
            'photo' => $this->photo
        ]);

        session()->flash('message', 'Registro criado com sucesso!');

        $this->description = $this->amount = $this->type = null;
    }

    public function render()
    {
        return view('livewire.expense.expense-create');
    }
}
