@extends('admin.layout')
@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Menu</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/admin/home">Əsas səhifə</a></li>
                <li class="breadcrumb-item active">Yeni Menu</li>
            </ol>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card shadow-lg border-0 rounded-lg">
                        <div class="card-body">
                            <form method="post" action="{{route('admin.menus.store')}}">
                                @csrf
                                <div class="form-row">
                                    @if($locales)
                                        @foreach($locales as $locale)
                                            <div class="col-md-12">
                                                <div class="form-group"><label class="small mb-1" for="inputFirstName">Ad {{$locale->code}} :</label><input class="form-control py-4" type="text" placeholder="Adı daxil edin" name="name[{{$locale->code}}]" /></div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">Səhifə seçin :</label>
                                    <select class="form-control" name="page_id" id="exampleFormControlSelect2">
                                        @if($pages)
                                            <option value="0">Səhifə seçin</option>
                                        @foreach($pages as $p)
                                                <option value="{{$p->id}}">{{$p->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group"><label class="small mb-1" for="inputFirstName">Link :</label><input class="form-control py-4" id="inputFirstName" type="text" placeholder="Link daxil edin" name="link"/></div>
                                <div class="form-group mt-4 mb-0"><input class="btn btn-primary btn-block" value="Əlavə et" type="submit"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
       var input = document.querySelector('input[name="name[az]"]');
       input.addEventListener('keyup', () => {
           document.querySelector('input[name="name[en]"]').value = input.value;
           document.querySelector('input[name="name[ru]"]').value = input.value;
       })
    </script>
@endsection
