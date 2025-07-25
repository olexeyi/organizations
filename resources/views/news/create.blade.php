@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Добавить новость для {{ isset($organization) ? $organization->name : $division->name }}</h1>

    <form method="POST" action="{{ route('news.store') }}">
        @csrf

        @if(request('organization_id'))
            <input type="hidden" name="organization_id" value="{{ request('organization_id') }}">
        @endif

        @if(request('division_id'))
            <input type="hidden" name="division_id" value="{{ request('division_id') }}">
        @endif

        <div class="mb-4">
            <label class="block font-semibold">Название</label>
            <input type="text" name="title" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Содержание</label>
            <textarea name="content" class="w-full border rounded px-3 py-2" rows="6" required></textarea>
        </div>

        <button type="submit"
                class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-500">
            Сохранить
        </button>
    </form>
@endsection
