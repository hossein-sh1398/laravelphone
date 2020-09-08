@component('mail::message')
# Introduction
# Introduction
*Salam*

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
