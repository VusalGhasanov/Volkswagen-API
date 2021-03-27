@extends('admin.layout')
@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Sayt məlumatları</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/admin/home">Əsas səhifə</a></li>
                <li class="breadcrumb-item active">Sayt məlumatları</li>
            </ol>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card shadow-lg border-0 rounded-lg">
                        <div class="card-body">
                            <form method="post" action="{{route('admin.configs.update')}}">
                                @csrf
                                @method('PUT')
                                <div class="form-row">
                                    <div class="col-md-4">
                                        <div class="form-group"><label class="small mb-1" for="inputFirstName"><strong>Telefon nömrəsi (1) :</strong></label><input class="form-control py-4" type="text" placeholder="Nömrə daxil edin" name="number_1" value="{{$configs->number_1}}" /></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group"><label class="small mb-1" for="inputFirstName"><strong>Telefon nömrəsi (2) :</strong></label><input class="form-control py-4" type="text" placeholder="Nömrə daxil edin" name="number_2" value="{{$configs->number_2}}" /></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group"><label class="small mb-1" for="inputFirstName"><strong>Telefon nömrəsi (3) :</strong></label><input class="form-control py-4" type="text" placeholder="Nömrə daxil edin" name="number_3" value="{{$configs->number_3}}" /></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label class="small mb-1" for="inputFirstName"><strong>Email (1) :</strong></label><input class="form-control py-4" type="text" placeholder="Email daxil edin" name="email_1" value="{{$configs->email_1}}" /></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label class="small mb-1" for="inputFirstName"><strong>Email (2) :</strong></label><input class="form-control py-4" type="text" placeholder="Email daxil edin" name="email_2" value="{{$configs->email_2}}" /></div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group"><label class="small mb-1" for="inputFirstName"><strong>Ünvan :</strong></label><input class="form-control py-4" type="text" placeholder="Ünvan daxil edin" name="address" value="{{$configs->address}}" /></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label class="small mb-1" for="inputFirstName"><strong>Facebook :</strong></label><input class="form-control py-4" type="text" placeholder="URL daxil edin" name="facebook" value="{{$configs->facebook}}" /></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label class="small mb-1" for="inputFirstName"><strong>İnstagram :</strong></label><input class="form-control py-4" type="text" placeholder="URL daxil edin" name="instagram" value="{{$configs->instagram}}" /></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label class="small mb-1" for="inputFirstName"><strong>Youtube :</strong></label><input class="form-control py-4" type="text" placeholder="URL daxil edin" name="youtube" value="{{$configs->youtube}}" /></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label class="small mb-1" for="inputFirstName"><strong>Twitter :</strong></label><input class="form-control py-4" type="text" placeholder="URL daxil edin" name="twitter" value="{{$configs->twitter}}" /></div>
                                    </div>
                                </div>
                                <div class="form-group mt-4 mb-0"><input class="btn btn-primary btn-block" value="Əlavə et" type="submit"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
