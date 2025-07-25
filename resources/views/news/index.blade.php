@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">
            Новости {{ $entity->name }}
        </h1>
        <div class="flex gap-3">
            <a href="{{ route('news.create', request()->all()) }}"
               class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-500">
                Добавить новость
            </a>
            <a href="{{ route('organizations.index') }}"
               class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-500">
                Назад
            </a>
        </div>
    </div>

    @forelse ($news as $item)
        <div class="mb-6 border-b pb-4">
            <h2 class="text-xl font-semibold">{{ $item->title }}</h2>
            <p class="mt-2 text-gray-700">{{ $item->content }}</p>
        </div>
    @empty
        <p class="text-gray-500">Новостей пока нет.</p>
    @endforelse
@endsection
