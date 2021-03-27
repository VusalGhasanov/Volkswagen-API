@extends('admin.layout')
@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Yeni Avtomobil</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/admin/home">Əsas səhifə</a></li>
                <li class="breadcrumb-item active">Yeni Avtomobil</li>
            </ol>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card shadow-lg border-0 rounded-lg">
                        <div class="card-body">
                            <form method="post" action="{{route('admin.cars.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="form-group"><label class="small mb-1" for="inputFirstName"><strong>Avtomobil adı :</strong></label><input class="form-control py-4" type="text" placeholder="Adı daxil edin" name="name" /></div>
                                    </div>
                                    <div class="col-md-12" id="model_section"></div>
                                    <div class="col-md-12 offset-10">
                                        <button type="button" class="btn btn-success" onclick="addModel()">Model əlavə edin</button>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label class="small mb-1" for="inputFirstName"><strong>Arxa Fon Rəngi :</strong></label><input class="form-control py-4" type="color" placeholder="Qiyməti daxil edin" name="color"/></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label class="small mb-1" for="inputFirstName"><strong>Font Rəngi :</strong></label><input class="form-control py-4" type="color" placeholder="Qiyməti daxil edin" name="font_color"/></div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Əsas şəkil</span>
                                            </div>
                                            <div class="custom-file">
                                                <label class="custom-file-label" for="inputGroupFile01">şəkil seçin</label>
                                                <input type="file" class="custom-file-input" id="inputGroupFile01" name="image_1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">İkinci şəkil</span>
                                            </div>
                                            <div class="custom-file">
                                                <label class="custom-file-label" for="inputGroupFile02">şəkil seçin</label>
                                                <input type="file" class="custom-file-input" id="inputGroupFile02" name="image_2">
                                            </div>
                                        </div>
                                    </div>
                                    @if($locale)
                                        @foreach($locale as $l)
                                            <div class="col-md-6 mt-4">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Price List ({{$l->code}})</span>
                                                    </div>
                                                    <div class="custom-file">
                                                        <label class="custom-file-label" for="inputGroupFile01">Fayl seçin</label>
                                                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="price_list[{{$l->code}}]">
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="form-group mt-4 mb-0"><input class="btn btn-primary btn-block" value="Əlavə et" type="submit"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        var selectionCounter = 0;
        $('#inputGroupFile01').change(function() {
            var i = $(this).prev('label').clone();
            var file = $('#inputGroupFile01')[0].files[0].name;
            $(this).prev('label').text(file);
        });
        $('#inputGroupFile02').change(function() {
            var i = $(this).prev('label').clone();
            var file = $('#inputGroupFile02')[0].files[0].name;
            $(this).prev('label').text(file);
        });
        function addModel() {
            var html =
                `<div class="row models" id="${selectionCounter}">
                <div class="col-6">
                    <div class="form-group"><label class="small mb-1" for="inputFirstName"><strong>Model adı :</strong></label><input class="form-control py-4" type="text" placeholder="Model adını daxil edin" name="model_name[]"></div>
                </div>
                <div class="col-5">
                    <div class="form-group"><label class="small mb-1" for="inputFirstName"><strong>Model qiyməti :</strong></label><input class="form-control py-4" type="text" placeholder="Model qiymətini daxil edin" name="price[]"></div>
                </div>
                <div class="col-1 mt-2">
                    <button type="button" class="btn btn-danger mt-4" onclick="deleteColumn(this)">Sil</button>
                </div>
                </div>`;
            document.getElementById('model_section').insertAdjacentHTML('beforeend',html);
            selectionCounter += 1;
        }

        function deleteColumn(def){
            let id = def.parentNode.parentNode.id;
            $('#'+id).remove()
        }
    </script>
@endsection
