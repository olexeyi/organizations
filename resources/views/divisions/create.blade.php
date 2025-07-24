@extends('layouts.app')

@section('content')
    <h2 class="text-xl font-bold mb-4">Добавить подразделение</h2>

    <p class="mb-2">Организация: <strong>{{ $organization->name }}</strong></p>

    <form action="{{ route('divisions.store') }}" method="POST" class="space-y-4">
        @csrf
        <input type="hidden" name="organization_id" value="{{ $organization->id }}">

        <div>
            <label for="name" class="block font-medium">Название:</label>
            <input type="text" name="name" class="mt-1 w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label for="head" class="block font-medium">Глава:</label>
            <input type="text" name="head" class="mt-1 w-full border rounded px-3 py-2">
        </div>

        <div>
            <label for="parent_id" class="block font-medium">Родительское подразделение:</label>
            <select name="parent_id" class="mt-1 w-full border rounded px-3 py-2">
                <option value="">— нет —</option>
                @foreach($parentDivisions as $div)
                    <option value="{{ $div->id }}">{{ $div->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-1 rounded hover:bg-green-500 cursor-pointer">Сохранить</button>
    </form>
@endsection
