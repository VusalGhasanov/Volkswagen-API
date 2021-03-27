@extends('admin.layout')
@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Kredit</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/admin/home">Əsas səhifə</a></li>
                <li class="breadcrumb-item active">Kredit</li>
            </ol>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card shadow-lg border-0 rounded-lg">
                        <div class="card-body">
                            <form method="post" action="{{route('admin.credits.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect2">Avtomobil seçin :</label>
                                            <select class="form-control" name="car_id" id="exampleFormControlSelect2">
                                                @if($cars)
                                                    @foreach($cars as $car)
                                                        <option value="{{$car->id}}">{{$car->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <div class="form-group"><label class="small mb-1" for="inputFirstName"><strong>Minimal ilkin odəniş faizi:</strong></label><input class="form-control py-4" type="text" placeholder="Minimal ilkin odəniş faizini daxil edin" name="initial_payment"></div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <div class="form-group"><label class="small mb-1" for="inputFirstName"><strong>Bank xərcləri:</strong></label><input class="form-control py-4" type="text" placeholder="Bank xərclərini daxil edin" name="commission"></div>
                                    </div>
                                </div>
                                @if($time)
                                    @foreach($time as $t)
                                        <div class="row">
                                            <div class="col-md-4 mt-4">
                                                <div class="form-group"><label class="small mb-1" for="inputFirstName"><strong>Kredit müddət:</strong></label><input class="form-control py-4" type="text" placeholder="Kredit müddətini daxil edin" name="month[{{$t}}]" value="{{$t}}" readonly></div>
                                            </div>
                                            <div class="col-md-4 mt-4">
                                                <div class="form-group"><label class="small mb-1" for="inputFirstName"><strong>İllik faiz:</strong></label><input class="form-control py-4" type="text" placeholder="İllik faizi daxil edin" name="yearly_percent[{{$t}}]"></div>
                                            </div>
                                            <div class="col-md-4 mt-4">
                                                <div class="form-group"><label class="small mb-1" for="inputFirstName"><strong>Sığorta faizi:</strong></label><input class="form-control py-4" type="text" placeholder="Sığorta faizini daxil edin" name="insurance_percent[{{$t}}]"></div>
                                            </div>
                                        </div>
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
