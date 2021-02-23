<?php

namespace App\Http\Livewire\Payment;

use App\Models\User;
use App\Services\PagSeguro\Credentials;
use App\Services\PagSeguro\Subscription\SubscriptionService;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class CreditCard extends Component
{
    public $sessionId;

    protected $listeners = [
        'paymentData' => 'proccessSubscription'
    ];

    public function mount()
    {
        $url = Credentials::getCredentials('/sessions');

        $response = Http::post($url);
        $response = simplexml_load_string($response->body());

        $this->sessionId = (string) $response->id;
    }

    public function proccessSubscription($data)
    {
        $data['plan_reference'] = '6DF524F1C3C3885554DC0F8B55855C9A';
        $makeSubscription = (new SubscriptionService($data))->makeSubscription();

        $user = User::find(1);
        $user->plan()->create([
            'plan_id' => 4,
            'status' => $makeSubscription['status'],
            'date_subscription' => (\DateTime::createFromFormat(DATE_ATOM, $makeSubscription['date']))->format('Y-m-d H:i:s'),
            'reference_transaction' => $makeSubscription['code']
        ]);

        session()->flash('message', 'Plano Aderido com Sucesso!');
    }

    public function render()
    {
        return view('livewire.payment.credit-card')
            ->layout('layouts.front');
    }
}
