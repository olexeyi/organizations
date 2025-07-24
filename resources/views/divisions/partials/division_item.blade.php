<li class="border-t border-gray-300 py-2">
    <div class="flex justify-between items-center">
        <span class="font-medium">
            {{ $division->name }}
            @if ($division->head)
                — <em class="font-light">Глава: {{ $division->head }}</em>
            @endif
        </span>
        <div class="flex gap-2">
            <a href="{{ route('divisions.create', ['org_id' => $division->organization_id, 'parent_id' => $division->id]) }}"
               class="bg-green-600 text-white px-4 py-1 rounded hover:bg-green-500 cursor-pointer">
                Добавить подразделение
            </a>
            <a href="{{ route('divisions.edit', $division) }}"
               class="bg-blue-600 text-white px-4 py-1 rounded hover:bg-blue-500 cursor-pointer">
                Редактировать
            </a>
            <form method="POST" action="{{ route('divisions.destroy', $division) }}"
                  onsubmit="return confirm('Удалить это подразделение?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-4 py-1 rounded hover:bg-red-500 cursor-pointer">
                    Удалить
                </button>
            </form>
        </div>
    </div>

    @if ($division->children->count())
        <ul class="ml-6 mt-2 border-l-2 border-gray-300 pl-4">
            @foreach ($division->children as $child)
                @include('divisions.partials.division_item', ['division' => $child])
            @endforeach
        </ul>
    @endif
</li>
