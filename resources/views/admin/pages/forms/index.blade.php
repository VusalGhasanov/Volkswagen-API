@extends('admin.layout')
@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Forum müraciətləri</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/admin/home">Əsas səhifə</a></li>
                <li class="breadcrumb-item active">Forum müraciətləri
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#unread" role="tab" aria-controls="home" aria-selected="true">
                                Oxunmayanlar
                                @if(count($unread) > 0)
                                    <kbd class="bg-primary ml-1">{{count($unread)}}</kbd>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#read" role="tab" aria-controls="profile" aria-selected="false">Oxunanlar</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="unread" role="tabpanel" aria-labelledby="home-tab">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Ad Soyad</th>
                                    <th scope="col">Əlaqə nömrəsi</th>
                                    <th scope="col">Email ünvanı</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if($unread)
                                        @foreach($unread as $i=>$u)
                                            <tr>
                                                <th scope="row">{{$i+1}}</th>
                                                <td>{{$u->name}} {{$u->surname}}</td>
                                                <td>{{$u->phone}}</td>
                                                <td>{{$u->email}}</td>
                                                <td>
                                                    <a href="{{route('admin.forums.show',$u->id)}}" title="Bax" class="p-1 bg-success text-white"><i class="far fa-eye"></i></a>
                                                    <a href="{{route('admin.forums.destroy',$u->id)}}" title="Sil" class="p-1 bg-danger text-white"><i class="far fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{$unread->links()}}
                            </div>
                        </div>
                        <div class="tab-pane fade" id="read" role="tabpanel" aria-labelledby="profile-tab">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Ad Soyad</th>
                                    <th scope="col">Əlaqə nömrəsi</th>
                                    <th scope="col">Email ünvanı</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($read)
                                    @foreach($read as $i=>$r)
                                        <tr>
                                            <th scope="row">{{$i+1}}</th>
                                            <td>{{$r->name}} {{$r->surname}}</td>
                                            <td>{{$r->phone}}</td>
                                            <td>{{$r->email}}</td>
                                            <td>
                                                <a href="{{route('admin.forums.show',$r->id)}}" title="Bax" class="p-1 bg-success text-white"><i class="far fa-eye"></i></a>
                                                <a href="{{route('admin.forums.destroy',$r->id)}}" title="Sil" class="p-1 bg-danger text-white"><i class="far fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{$read->links()}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection
