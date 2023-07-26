<?php

namespace App\Rules;

use App\Models\UserPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class CheckOldPassword implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $password = UserPassword::select('password')
            ->where('user_id', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->take(12)
            ->get();

        foreach ($password as $data) {
            if (Hash::check($value, $data->password)) { return false; }
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must not resemble to the previous passwords.';
    }
}
