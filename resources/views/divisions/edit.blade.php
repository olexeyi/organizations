@extends('layouts.app')

@section('content')
    <h2 class="text-xl font-bold mb-4">Редактировать подразделение</h2>

    <p class="mb-2">Организация: <strong>{{ $division->organization->name }}</strong></p>

    <form action="{{ route('divisions.update', $division) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block font-medium">Название:</label>
            <input type="text" name="name" value="{{ $division->name }}" class="mt-1 w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label for="head" class="block font-medium">Глава:</label>
            <input type="text" name="head" value="{{ $division->head }}" class="mt-1 w-full border rounded px-3 py-2">
        </div>

        <div>
            <label for="parent_id" class="block font-medium">Родительское подразделение:</label>
            <select name="parent_id" class="w-full border rounded p-2">
                <option value="">— нет —</option>
                @foreach($parentDivisions as $div)
                    <option value="{{ $div->id }}" {{ $division->parent_id == $div->id ? 'selected' : '' }}>
                        {{ $div->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-500 cursor-pointer">Обновить</button>
    </form>
@endsection
