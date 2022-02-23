<head>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

{{-- form voor edit en voor show --}}
@if($status === 'show' or $status === 'edit')
<div class="w-full max-w-xs">
    <form
        class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
        action="{{ $status==='edit' ? '/rules/'.$rule->id : '/rules' }}"
        method="{{ $status==='edit' ? 'post' : 'get' }}">
        @csrf
        @if($status === 'edit')
            @method('put')
        @endif
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="rule-name">
          regel
        </label>
        <input
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            name="rule-name"
            type="text"
            value="{{ $rule->name }}"
            {{ $status==='show' ? 'readonly' : '' }}>
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="rule-description">
          omschrijving
        </label>
        <input
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            name="rule-description"
            type="text"
            value="{{ $rule->description }}"
            {{ $status==='show' ? 'readonly' : '' }}>
      </div>
      <div class="relative">
        <select
            class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            name="category_id">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
      </div>
      <div class="flex items-center justify-between">
        <input
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
            type="submit"
            value="{{ $status==='edit' ? 'werk bij' : 'lijst' }}">
        </div>
    </form>
    <form action="{{ route('rules.edit', $rule) }}">
        <input
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
            type="submit"
            value="edit">
    </form>
</div>
@endif

{{-- create form --}}
@if($status === 'create')
<div class="w-full max-w-xs">
    <form
        class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
        action="{{ route('rules.store') }}"
        method="post">
        @csrf
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="rule-name">
          regel
        </label>
        <input
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            name="rule-name"
            type="text"
            value="">
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="rule-description">
          omschrijving
        </label>
        <input
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            name="rule-description"
            type="text"
            value="">
      </div>
      {{-- the category select --}}
      <div class="relative">
        <select
            class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            name="category_id">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
      </div>

      <div class="flex items-center justify-between">
        <input
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
            type="submit"
            value="Maak nieuwe regel">
        </div>
    </form>
</div>
@endif

<hr>
<form action="{{ route('rules.create') }}" method="get">
    <input
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
        type="submit"
        value="toon form voor nieuwe regel">
</form>
<hr>
<div class="container mx-auto">
    <div class="grid grid-cols-3 gap-4">
        @foreach ($rules as $rule)
            <div><a href='{{ route('rules.show', $rule) }}'>{{ $rule->name }}</a></div>
            <div>{{ $rule->description }}</div>
            <div>{{ $rule->category->name }}</div>
        @endforeach
    </div>
</div>

