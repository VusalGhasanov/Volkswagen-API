@extends('admin.layout')
@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Create Component</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/admin/home">Əsas səhifə</a></li>
                <li class="breadcrumb-item active">Create Component</li>
            </ol>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card shadow-lg border-0 rounded-lg">
                        <div class="card-body">
                            <form method="post" action="{{route('admin.components.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    @if($components)
                                        @foreach($components as $c)
                                            @if($c->field =='title' || $c->field =='description' || $c->field =='title2' || $c->field =='description2' || $c->field =='title3' || $c->field =='description3' || $c->field =='title4' || $c->field =='description4' || $c->field =='title5' || $c->field =='description5')
                                                    @foreach($locales as $i=>$l)
                                                    @if($c->element == 'textarea')
                                                        <div class="col-md-6">
                                                            <div class="form-group"><label class="small mb-1" for="inputFirstName">{{ucfirst($c->field)}} {{$l->code}}:</label><{{$c->element}} class="form-control py-1 ckeditor" id="{{$c->id}}" placeholder="Adı daxil edin" name="{{$c->id}}[{{$l->code}}]" /></{{$c->element}}></div>
                                                        </div>
                                                    @else
                                                    <div class="col-md-6">
                                                        <div class="form-group"><label class="small mb-1" for="inputFirstName">{{ucfirst($c->field)}} {{$l->code}}:</label><{{$c->element}} class="form-control py-4" type="{{$c->type}}" placeholder="Adı daxil edin" name="{{$c->id}}[{{$l->code}}]" /></div>
                                                    </div>
                                                    @endif
                                                @endforeach
                                                @continue
                                            @endif
                                            <div class="col-md-12">
                                                <div class="form-group"><label class="small mb-1" for="inputFirstName">{{ucfirst($c->field)}}:</label><{{$c->element}} class="form-control py-4" type="{{$c->type}}" placeholder="Adı daxil edin" name="{{$c->id}}" /></div>
                                            </div>
                                        @endforeach
                                    @endif
                                    </div>
                                @if(isset($page_id))
                                    <input type="hidden" name="page_id" value="{{$page_id}}">
                                @endif
                                <input type="hidden" name="page_name" value="{{$page_name}}">
                                <input type="hidden" name="component_id" value="{{$component_id}}">
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
        $('#file-upload').change(function() {
            var i = $(this).prev('label').clone();
            var file = $('#file-upload')[0].files[0].name;
            $(this).prev('label').text(file);
        });
    </script>
@endsection

