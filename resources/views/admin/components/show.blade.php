@extends('admin.layout')
@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Update Component</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/admin/home">Əsas səhifə</a></li>
                <li class="breadcrumb-item active">Update Component</li>
            </ol>

            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card shadow-lg border-0 rounded-lg">
                        <div class="card-body">
                            <form method="post" action="{{route('admin.components.update',$component_id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-row">
                                    @if($components)
                                        @foreach($components as $c)
                                            @if($c->field =='title' || $c->field =='description' || $c->field =='title2' || $c->field =='description2' || $c->field =='title3' || $c->field =='description3' || $c->field =='title4' || $c->field =='description4' || $c->field =='title5' || $c->field =='description5')
                                            @foreach($locales as $l)
                                                @if($c->element == 'textarea')
                                                    <div class="col-md-6">
                                                        <div class="form-group"><label class="small mb-1" for="inputFirstName">{{ucfirst($c->field)}} {{$l->code}}:</label><{{$c->element}} class="form-control py-1 ckeditor" id="{{$c->id}}" placeholder="Adı daxil edin" name="{{isset($c->values[0]) ? $c->values[0]->id : null}}[{{$l->code}}]" >{{(isset($c->values[0]) && $c->values[0]->translations($l->code)) ? $c->values[0]->translations($l->code)->value : null}}</{{$c->element}}></div>
                                                    </div>
                                                @else
                                                    <div class="col-md-6">
                                                        <div class="form-group"><label class="small mb-1" for="inputFirstName">{{ucfirst($c->field)}} {{$l->code}}:</label><{{$c->element}} class="form-control py-4" type="{{$c->type}}" placeholder="Adı daxil edin" name="{{isset($c->values[0]) ? $c->values[0]->id : null}}[{{$l->code}}]" value="{{(isset($c->values[0]) && $c->values[0]->translations($l->code)) ? $c->values[0]->translations($l->code)->value : null}}" /></div>
                                                    </div>
                                                @endif
                                                @endforeach
                                            @else
                                                <div class="col-md-12">
                                                   <div class="form-group"><label class="small mb-1" for="inputFirstName">{{ucfirst($c->field)}}:</label><{{$c->element}} class="form-control py-4" type="{{$c->type}}" placeholder="Adı daxil edin" name="{{isset($c->values[0]) ? $c->values[0]->id : null}}" value="{{(isset($c->values[0])) ? $c->values[0]->value : null}}" /></div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                                @if(isset($page_id))
                                    <input type="hidden" name="page_id" value="{{$page_id}}">
                                @endif
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
