@extends('admin.layout')
@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Menu Sıralaması</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/admin/home">Əsas səhifə</a></li>
                <li class="breadcrumb-item active">Menu Sıralaması
            </ol>
            <!-- Content Row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form class="" action="{{route('admin.sort.cars.update')}}" method="post">
                                @csrf
                                <ul class="c_sortable">
                                    @if($cars)
                                        @foreach($cars as $key => $car)
                                            @php
                                                $c_count = $key+1;
                                            @endphp
                                            <li class="mb-2">
                                                <a href="#">{{$car->name}}
                                                    <input class="inputPos ui-state-default c_sortable-number" name="mainOrder[{{$car->id}}]" type="hidden" value="{{$c_count}}">
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                                <button type="submit" class="btn btn-success">Yadda saxla</button>
                            </form>
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
                var $lis = $(this).children('li');
                $lis.each(function() {
                    var $li = $(this);
                    var newVal = $(this).index() + 1;
                    var cl_val = $(this).closest('ul').closest('li').find('.c_sortable-number').val();
                    $(this).children('.sortable-number').val(cl_val+newVal);
                });
            }
        });
        $(".c_sortable").sortable({
            update: function(event, ui) {
                var $lis = $(this).children('li');
                $lis.each(function() {
                    var $li = $(this);
                    var newVal = $(this).index() + 1;
                    $(this).find('.c_sortable-number').val(newVal);
                });
            }
        });
    });
</script>

