<x-mail::message>

# Hello {{ $data['firstname']. ' '. $data['lastname']  }}

You have succesfull been registered to fléx complance,

your email is <b>{{ $data['email'] }}</b>,<br>
your password is <b>{{ $data['password'] }}</b>.

Please update your password for security reasons.

{{-- <x-mail::button :url="''">
Button Text
</x-mail::button> --}}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
