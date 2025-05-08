@extends('layouts.app') <!-- Используем ваш основной шаблон -->

@section('content')
<div class="py-12 text-center">
    <h1 class="text-4xl font-bold text-red-600">403</h1>
    <p class="mt-4 text-lg">У вас нет доступа к этой странице</p>
    <a href="{{ url('/dashboard') }}" class="mt-6 inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
        Вернуться в Dashboard
    </a>
</div>
@endsection