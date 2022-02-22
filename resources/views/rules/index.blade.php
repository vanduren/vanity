<head>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<div class="container mx-auto">
    <div class="grid grid-cols-3 gap-4">
        @foreach ($rules as $rule)
            <div><a href='{{ route('rules.show', $rule) }}'>{{ $rule->name }}</a></div>
            <div>{{ $rule->description }}</div>
            <div>{{ $rule->category->name }}</div>
        @endforeach
    </div>
</div>

@if($status === 'show')
<hr>
<form class="w-full max-w-sm">
    <div class="md:flex md:items-center mb-6">
      <div class="">
        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="name">
          Regel
        </label>
      </div>
      <div class="">
        <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                id="name"
                type="text"
                value="{{ $rule->name }}">
      </div>
    </div>
    <div class="md:flex md:items-center mb-6">
      <div class="">
        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="description">
          Omschrijving
        </label>
        <div class="">
            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                    id="description"
                    type="text"
                    value="{{ $rule->description }}">
        </div>
      </div>
    </div>
    <div class="md:flex md:items-center mb-6">
      <div class="">
        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="category">
          Categorie
        </label>
        <div class="">
            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                    id="category"
                    type="text"
                    value="{{ $rule->category->name }}"
                    {{ $status==='show' ?? 'readonly'}}>
        </div>
      </div>
    </div>
    <div class="md:flex md:items-center">
      <div class=""></div>
      <div class="">
        <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
          Terug
        </button>
      </div>
    </div>
  </form>
  @endif
