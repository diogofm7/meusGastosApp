@if (session()->has('message'))
    <h3 class="w-64 bg-green-300 rounded mb-4 text-center">{{ session('message') }}</h3>
@endif
