@extends('admin.layout')
@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Lisinq</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/admin/home">Əsas səhifə</a></li>
                <li class="breadcrumb-item active">Lisinq</li>
            </ol>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card shadow-lg border-0 rounded-lg">
                        <div class="card-body">
                            <form method="post" action="{{route('admin.lising.update',$car->id)}}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="form-group"><label class="small mb-1" for="inputFirstName"><strong>Avtomobil:</strong></label><input class="form-control py-4" type="text" placeholder="Avtomobilin dəyərini daxil edin" name="car_id" disabled value="{{$car->name}}"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <div class="form-group"><label class="small mb-1" for="inputFirstName"><strong>Minimal ilkin odəniş faizi:</strong></label><input class="form-control py-4" type="text" placeholder="Minimal ilkin odəniş faizini daxil edin" name="initial_payment" value="{{$car->lisings[0] ? $car->lisings[0]->initial_payment : null}}"></div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <div class="form-group"><label class="small mb-1" for="inputFirstName"><strong>Bank xərcləri:</strong></label><input class="form-control py-4" type="text" placeholder="Bank xərclərini daxil edin" name="commission" value="{{$car->lisings[0] ? $car->lisings[0]->commission : null}}"></div>
                                    </div>
                                </div>
                                @if($time)
                                    @foreach($time as $t)
                                        <div class="row">
                                            <div class="col-md-3 mt-4">
                                                <div class="form-group"><label class="small mb-1" for="inputFirstName"><strong>Kredit müddət:</strong></label><input class="form-control py-4" type="text" placeholder="Kredit müddətini daxil edin" name="month[{{$t}}]" value="{{$t}}" readonly></div>
                                            </div>
                                            <div class="col-md-3 mt-4">
                                                <div class="form-group"><label class="small mb-1" for="inputFirstName"><strong>İllik faiz:</strong></label><input class="form-control py-4" type="text" placeholder="İllik faizi daxil edin" name="yearly_percent[{{$t}}]" value="{{$car->credits ? $car->lisings($t)->yearly_percent : null}}"></div>
                                            </div>
                                            <div class="col-md-3 mt-4">
                                                <div class="form-group"><label class="small mb-1" for="inputFirstName"><strong>Sığorta faizi:</strong></label><input class="form-control py-4" type="text" placeholder="Sığorta faizini daxil edin" name="insurance_percent[{{$t}}]" value="{{$car->credits ? $car->lisings($t)->insurance_percent : null}}"></div>
                                            </div>
                                            <div class="col-md-3 mt-4">
                                                <div class="form-group"><label class="small mb-1" for="inputFirstName"><strong>GPS məbləği:</strong></label><input class="form-control py-4" type="text" placeholder="GPS məbləğini daxil edin" name="gps[{{$t}}]" value="{{$car->credits ? $car->lisings($t)->gps : null}}"></div>
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
