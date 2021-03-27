@extends('admin.layout')
@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Forum müraciəti</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{route('admin.forums')}}">Forum müraciətləri</a></li>
                <li class="breadcrumb-item active">Forum müraciəti
            </ol>
                    <table class="table table-bordered table-primary">
                        <tbody class="text-center">
                        <tr>
                            <th scope="row">Ad Soyad</th>
                            <td>{{$forum->name}} {{$forum->surname}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Əlaqə nömrəsi</th>
                            <td>{{$forum->phone}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Email</th>
                            <td>{{$forum->email}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Avtomobil</th>
                            <td>{{$car ? $car : null}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Müraciət tarixi</th>
                            <td>{{\Carbon\Carbon::parse($forum->created_at)->format('d.m.Y')}}</td>
                        </tr>
                        </tbody>
                    </table>
            <table class="table table-bordered table-primary">
                <tbody>
                <tr class="text-center"> <th>Mesaj</th></tr>
                <tr><td>{{$forum->message}}</td></tr>
                </tbody>
            </table>
        </div>
    </main>
@endsection
