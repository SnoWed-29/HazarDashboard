@if ($message = Session::get('success'))
    <div class="fixed top-4 right-4 max-w-xs w-full bg-green-500 text-white p-4 rounded-lg shadow-lg opacity-90 transition-opacity duration-500">
        <div class="text-sm font-semibold">
            {{ $message }}
        </div>
        <button onclick="this.parentElement.style.display='none'" class="absolute top-0 right-0 m-2 text-white hover:text-gray-300">
            &times;
        </button>
    </div>
@elseif ($errors->any())
    <div class="fixed top-4 right-4 max-w-xs w-full bg-red-500 text-white p-4 rounded-lg shadow-lg opacity-90 transition-opacity duration-500">
        <div class="text-sm font-semibold">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
        <button onclick="this.parentElement.style.display='none'" class="absolute top-0 right-0 m-2 text-white hover:text-gray-300">
            &times;
        </button>
    </div>
@endif
