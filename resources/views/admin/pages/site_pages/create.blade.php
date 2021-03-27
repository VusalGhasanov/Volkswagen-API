@extends('admin.layout')
@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Səhifələr</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/admin/home">Əsas səhifə</a></li>
                <li class="breadcrumb-item active">Səhifələr
            </ol>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card shadow-lg border-0 rounded-lg">
                        <div class="card-body">
                            <form method="get" action="{{route('admin.pages.store')}}">
                                @csrf
                                @if($locale)
                                    @foreach($locale as $l)
                                        <div class="form-group"><label class="small mb-1" for="inputFirstName">Title ({{$l->code}}):</label><input class="form-control py-4" type="text" placeholder="Adı daxil edin" name="title[{{$l->code}}]"/></div>
                                        <div class="form-group"><label class="small mb-1" for="inputFirstName">Description ({{$l->code}}):</label><input class="form-control py-4" type="text" placeholder="Description daxil edin" name="description[{{$l->code}}]"/></div>
                                    @endforeach
                                @endif
                                <div class="form-group mt-4 mb-0"><input class="btn btn-primary btn-block" value="Əlavə et" type="submit"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
