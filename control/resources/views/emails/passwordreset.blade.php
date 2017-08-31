@component('mail::message')
    ![alt text]({{URL::to('/images/Logo1.png')}} "Logo Title Text 1")
    # Hello {{$user->first_name}}

Click on the below link to rest your password

@component('mail::button', ['url' => $url])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
