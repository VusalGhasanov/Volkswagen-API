    @if(session()->has('success'))
        @php(toast(session('success'),'success'))
    @endif
