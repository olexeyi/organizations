@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Список организаций</h1>

    @foreach ($organizations as $org)
        <div class="mb-8 border-t-4 border-gray-800 pt-4">
            <div class="flex justify-between items-center">
                <div>
                    <a href="{{ route('news.index', ['organization_id' => $org->id]) }}" class="font-semibold text-lg hover:underline">
                        {{ $org->name }}
                    </a>
                    <p class="text-sm text-gray-600">{{ $org->phone }} | {{ $org->email }}</p>
                </div>

                <div class="flex gap-2">
                    <a href="{{ route('divisions.create', ['org_id' => $org->id]) }}" class="bg-green-600 text-white px-4 py-1 rounded hover:bg-green-500 cursor-pointer">
                        Добавить подразделение
                    </a>
                    <a href="{{ route('organizations.edit', $org) }}" class="bg-blue-600 text-white px-4 py-1 rounded hover:bg-blue-500 cursor-pointer">
                        Редактировать
                    </a>
                    <form method="POST" action="{{ route('organizations.destroy', $org) }}" onsubmit="return confirm('Удалить эту организацию?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-4 py-1 rounded hover:bg-red-500 cursor-pointer">Удалить</button>
                    </form>
                </div>
            </div>

            <ul class="mt-4">
                @foreach ($org->divisions->where('parent_id', null) as $div)
                    @include('divisions.partials.division_item', ['division' => $div])
                @endforeach
            </ul>
        </div>
    @endforeach

    <div class="mt-8">
        <a href="{{ route('organizations.create') }}" class="inline-block px-4 py-2 bg-green-600 text-white rounded hover:bg-green-500">
            Добавить организацию
        </a>
    </div>
@endsection
