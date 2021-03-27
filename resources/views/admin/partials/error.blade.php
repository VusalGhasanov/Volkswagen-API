 @if ($errors->any())
        @foreach ($errors->all() as $error)
            @php(toast($error,'error'))
        @endforeach
    @endif

