@extends('layouts.app')
@section('content')
    <h1>Список пользователей</h1>
    <ul>
        @foreach($users as $user)
            <li>{{ $user->name }} ({{ $user->email }})</li>
        @endforeach    
    </ul>
@endsection

<!-- <x-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold mb-4">Список пользователей</h1>
                    <ul class="space-y-2">
                        @foreach($users as $user)
                            <li class="flex items-center">
                                <span class="font-medium">{{ $user->name }}</span>
                                <span class="text-gray-500 ml-2">({{ $user->email }})</span>
                                @if($user->is_admin)
                                    <span class="bg-yellow-100 text-yellow-800 text-xs font-medium ml-2 px-2.5 py-0.5 rounded">Admin</span>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-layout> -->

<!-- <x-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold mb-4">Список пользователей</h1>
                    <ul class="space-y-2">
                        @foreach($users as $user)
                            <li class="flex items-center">
                                <span class="font-medium">{{ $user->name }}</span>
                                <span class="text-gray-500 ml-2">({{ $user->email }})</span>
                                @if($user->is_admin)
                                    <span class="bg-yellow-100 text-yellow-800 text-xs font-medium ml-2 px-2.5 py-0.5 rounded">Admin</span>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-layout> -->