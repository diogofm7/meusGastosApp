<?php

namespace App\Http\Livewire\Payment;

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
        $email = config('pagseguro.email');
        $token = config('pagseguro.token');
        $url = 'https://ws.sandbox.pagseguro.uol.com.br/sessions/?email='.$email.'&token='.$token;

        $response = Http::post($url);
        $response = simplexml_load_string($response->body());

        $this->sessionId = (string) $response->id;
    }

    public function proccessSubscription($data)
    {
        $data['plan_reference'] = '42E1F22C707028033422FF9639F5F96B';
        $makeSubscription = (new SubscriptionService($data))->makeSubscription();

        dd($makeSubscription);
    }

    public function render()
    {
        return view('livewire.payment.credit-card')
            ->layout('layouts.front');
    }
}
