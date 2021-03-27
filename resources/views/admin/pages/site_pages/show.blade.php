@extends('admin.layout')
@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">{{$page->name}}</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/admin/home">Əsas səhifə</a></li>
                <li class="breadcrumb-item active">{{$page->name}}
            </ol>
            <div class="row justify-content-center">
                <div class="col-lg-6 col-sm-12">
                    <div class="card shadow-lg border-0 rounded-lg">
                        <div class="card-body">
                    @if($page)
                    @if($page->components)
                        <div class="table-responsive">
                            <form class="" action="{{route('admin.sort.components.update')}}" method="post">
                                @csrf
                                <table class="table table-striped text-center">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Komponent adı</th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody class="p_sortable">
                                    @foreach($page->components as $i=>$com)
                                        @php($count = $i+1)
                                        <tr>
                                            <th scope="row">{{$i+1}}</th>
                                            <td>
                                                {{$com->name}}
                                                <input class="inputPos ui-state-default sortable-number" name="subOrder[{{$com->id}}][{{$com->pivot->index}}]" type="hidden" value="{{$count}}">
                                            </td>
                                            <td>
                                                <a href="{{route('admin.components.show',[$page->id, $com->id, $com->pivot->index])}}" title="Güncəllə"><i class="far fa-edit text-warning mx-2"></i></a>
                                                <a href="{{route('admin.components.destroy',[$page->id, $com->id, $com->pivot->index])}}" title="Sil"><i class="far fa-trash-alt text-danger mx-2"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <input type="hidden" name="page_id" value="{{$page->id}}">
                                <div class="form-group mt-4 mb-0 text-center"><input class="btn btn-primary" value="Yadda saxla" type="submit"></div>
                            </form>
                        </div>
                    @endif
                @endif
                        </div>
                    </div>
                </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="card shadow-lg border-0 rounded-lg">
                            <div class="card-body">
                                <form method="get" action="{{route('admin.components.create')}}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect2">Yeni komponent əlavə edin :</label>
                                        <select class="form-control" name="component_id" id="exampleFormControlSelect2">
                                            @if($components)
                                                @foreach($components as $comp)
                                                    <option value="{{$comp->id}}">{{$comp->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <input type="hidden" name="menu_id" value="{{$page->menu_id}}">
                                    <input type="hidden" name="page_name" value="{{$page->name}}">
                                    <input type="hidden" name="page_id" value="{{$page->id}}">
                                    <div class="form-group mt-4 mb-0"><input class="btn btn-primary btn-block" value="Əlavə et" type="submit"></div>
                                </form>
                            </div>
                        </div>
                        <div class="card shadow-lg border-0 rounded-lg mt-3">
                            <div class="card-body">
                                <div class="btn-group w-100 my-2">
                                    <a href="{{route('admin.pages.edit',$page->id)}}" class="btn btn-warning">Səhifə məlumatlarını redaktə et</a>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </main>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ==" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $( function() {
            $(".p_sortable").sortable({
                update: function(event, ui) {
                    var $lis = $(this).children('tr');
                    $lis.each(function() {
                        var $li = $(this);
                        var newVal = $(this).index() + 1;
                        $(this).find('.sortable-number').val(newVal);
                    });
                }
            });
        });
    </script>

