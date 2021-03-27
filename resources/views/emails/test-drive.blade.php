@component('mail::message')
# Test Drive üçün müraciət

<div>
    <p>Ad Soyad :  <strong> {{$data->name}} {{$data->surname}}</strong></p>
    <p>Əlaqə nömrəsi :  <strong> {{$data->phone}}</strong></p>
    <p>Email :  <strong> {{$data->email}}</strong></p>
    <p>Avtomobil :  <strong> {{$data->car}}</strong></p>
    <p>Mesaj :  <strong> {{$data->message}}</strong></p>
</div>

@endcomponent
