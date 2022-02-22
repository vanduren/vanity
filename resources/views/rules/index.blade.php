<head>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<div class="container mx-auto">
    <div class="grid grid-cols-3 gap-4">
        @foreach ($rules as $rule)
            <div>{{ $rule->name }}</div>
            <div>{{ $rule->description }}</div>
            <div>{{ $rule->category->name }}</div>
        @endforeach
    </div>
</div>
