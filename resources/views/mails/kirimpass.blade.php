@component("mail::message")
    <h4>Hi</h4>
    <p>
        Username Login Anda : <strong>{{$email}}</strong>
    </p>
    <p>
        Password Anda : <strong>{{$pass}}</strong>
    </p>
    <p>
        Salam Hangat, 
        <strong>
           Admin STMIK Profesional
        </strong>
    </p>
    @component('mail::button', ['url' => url('/home'), 'color' => 'success'])
    Ke Aplikasi
    @endcomponent
@endcomponent