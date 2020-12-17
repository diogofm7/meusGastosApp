<?php

namespace App\Http\Livewire\Plan;

use App\Models\Plan;
use App\Services\PagSeguro\Plan\PlanCreateService;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class PlanCreate extends Component
{
    public array $plan = [];

    protected $rules = [
        'plan.name' => 'required',
        'plan.description' => 'required',
        'plan.price' => 'required',
        'plan.slug' => 'required'
    ];

    public function createPlan()
    {
        $this->validate();
        $plan = $this->plan;

        $plan['reference'] = (new PlanCreateService())->makeRequest($plan);

        Plan::create($plan);

        $this->plan = [];

        session()->flash('message', 'Plano Criado com sucesso');
    }

    public function render()
    {
        return view('livewire.plan.plan-create');
    }
}
