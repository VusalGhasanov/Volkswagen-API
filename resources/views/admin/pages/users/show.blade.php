@extends('admin.layout')
@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">İstifadəçilər</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/admin/home">Əsas səhifə</a></li>
                <li class="breadcrumb-item active">İstifadəçi məlumatlarını dəyişdir</li>
            </ol>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card shadow-lg border-0 rounded-lg">
                        <div class="card-body">
                            <form method="post" action="{{route('admin.users.update', $user->id)}}">
                                @method('PUT')
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group"><label class="small mb-1" for="inputFirstName">Ad :</label><input class="form-control py-4" id="inputFirstName" type="text" placeholder="Adı daxil edin" name="name" value="{{$user->name}}" /></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label class="small mb-1" for="inputLastName">Email :</label><input class="form-control py-4" id="inputLastName" type="text" placeholder="Email daxil edin" name="email" value="{{$user->email}}" /></div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="form-group"><label class="small mb-1" for="inputPassword">Şifrə :</label><input class="form-control py-4" id="inputPassword" type="password" placeholder="Şifrə daxil edin" name="password" /></div>
                                    </div>
                                </div>
                                <div class="form-group mt-4 mb-0"><input class="btn btn-primary btn-block" type="submit" value="Əlavə et"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
