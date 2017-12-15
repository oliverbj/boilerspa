<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Payment;

class PaymentPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Payment $payment)
    {
        return $user->business_id == $payment->business_id;
    }

    public function update(User $user, Payment $payment)
    {
        return $user->business_id == $payment->business_id;
    }

    public function delete(User $user, Payment $payment)
    {
        return $user->business_id == $payment->business_id;
    }
}
