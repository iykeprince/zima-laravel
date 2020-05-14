<?php


use Illuminate\Support\Facades\Auth;

// use App\Models\Subscription;
// use App\Models\FinanceOption;
// use App\Models\DocTitle;
// use App\Models\PaymentOption;
// use App\Models\Country;
// use App\Models\Currency;

if (!function_exists('getUserid')) {
    function getUserid()
    {
        $user = Auth::user()->id;
        if (!empty($user)) {
            return $user->id;
        }
    }
}


?>
