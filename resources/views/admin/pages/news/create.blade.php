@extends('admin.layout')
@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Yeni Xəbər</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/admin/home">Əsas səhifə</a></li>
                <li class="breadcrumb-item active">Yeni Xəbər</li>
            </ol>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card shadow-lg border-0 rounded-lg">
                        <div class="card-body">
                            <form method="post" action="{{route('admin.news.store')}}" enctype="multipart/form-data">
                                @csrf
                            <div class="form-row">
                                    @if($locale)
                                        @foreach($locale as $l)
                                            <div class="col-md-12">
                                                <div class="form-group"><label class="small mb-1" for="inputFirstName"><strong>Xəbər başlığı ({{$l->code}}) :</strong></label><input class="form-control py-4" type="text" placeholder="xəbər başlığını daxil edin" name="title[{{$l->code}}]" /></div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group"><label class="small mb-1" for="inputFirstName"><strong>Xəbər mətni ({{$l->code}}):</strong></label><textarea class="form-control ckeditor" placeholder="Xəbər mətnini daxil edin" name="description[{{$l->code}}]"></textarea></div>
                                            </div>
                                        @endforeach
                                    @endif
                                    <div class="col-md-12 mt-4">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Əsas şəkil</span>
                                            </div>
                                            <div class="custom-file">
                                                <label class="custom-file-label" for="inputGroupFile01">şəkil seçin</label>
                                                <input type="file" class="custom-file-input" id="inputGroupFile01" name="images[]" multiple>
                                            </div>
                                        </div>
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
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
        $('#inputGroupFile01').change(function() {
            var i = $(this).prev('label').clone();
            var file = $('#inputGroupFile01')[0].files[0].name;
            $(this).prev('label').text(file);
        });
        var input_title = document.querySelector('input[name="title[az]"]');
        input_title.addEventListener('keyup', () => {
            document.querySelector('input[name="title[en]"]').value = input_title.value;
            document.querySelector('input[name="title[ru]"]').value = input_title.value;
        })
        var input_description = document.querySelector('textarea[name="description[az]"]');
        input_description.addEventListener('keyup', () => {
            document.querySelector('textarea[name="description[en]"]').value = input_description.value;
            document.querySelector('textarea[name="description[ru]"]').value = input_description.value;
        })
    </script>
@endsection
