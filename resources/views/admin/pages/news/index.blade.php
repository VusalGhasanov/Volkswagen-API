@extends('admin.layout')
@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Xəbərlər</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/admin/home">Əsas səhifə</a></li>
                <li class="breadcrumb-item active">Xəbərlər
            </ol>
            <div class="card mb-4">
                <div class="card-header text-right"><a class="btn btn-success" href="{{route('admin.news.create')}}">Əlavə et</a></div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped text-center">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Xəbər başlığı</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($news)
                                @foreach($news as $i=>$n)
                                    <tr>
                                        <th scope="row">{{$i+1}}</th>
                                        <td>{{($n->translations('az')) ? $n->translations('az')->title : null}}</td>
                                        <td>
                                            <a href="{{route('admin.news.show',$n->id)}}" title="Güncəllə"><i class="far fa-edit text-warning mx-2"></i></a>
                                            <a onclick="confirmDelete('{{route("admin.news.destroy",$n->id)}}')" href="javascript:void(0) title="Sil"><i class="far fa-trash-alt text-danger mx-2"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    {{$news->links()}}
                </div>
            </div>
        </div>
    </main>
    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
    <script>
        // Sweet Alert Deletion
        function confirmDelete(url){
            Swal.fire({
                title: "<h1 style='color: #0a0a0a'>Əmin Siniz?</h1>",
                icon: "warning",
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: 'Bəli',
                cancelButtonText: 'Ləğv Et'
            })
                .then((result) => {
                    if (result.value) {
                        window.location = url;
                    }
                })
        }
    </script>
@endsection
