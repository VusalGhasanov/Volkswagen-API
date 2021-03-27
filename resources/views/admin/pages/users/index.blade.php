@extends('admin.layout')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">İstifadəçilər</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/admin/home">Əsas səhifə</a></li>
            <li class="breadcrumb-item active">İstifadəçilər
        </ol>
        <div class="card mb-4">
            <div class="card-header text-right"><a class="btn btn-success" href="{{route('admin.users.create')}}">Əlavə et</a></div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped text-center">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Ad</th>
                            <th scope="col">Email</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($users)
                            @foreach($users as $i=>$user)
                                <tr>
                                    <th scope="row">{{$i+1}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <a href="{{route('admin.users.show',$user->id)}}" title="Güncəllə"><i class="fas fa-user-edit text-warning mx-2"></i></a>
                                        <a onclick="confirmDelete('{{route('admin.users.destroy', $user->id)}}')" href="javascript:void(0)" title="Sil"><i class="fas fa-user-slash text-danger mx-2"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                {{$users->links()}}
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
