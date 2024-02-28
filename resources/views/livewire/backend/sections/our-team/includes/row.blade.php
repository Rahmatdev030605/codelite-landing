<x-livewire-tables::bs4.table.cell>
    @include('livewire.backend.sections.our-team.includes.status', ['our' => $row])
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->title }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->heading }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->description }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @if ($row->image)
    <img src="{{ asset('storage/' .  $row->image) }}" alt="Image" width="100px" height="50px">
    @else
        No Image
    @endif
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->button_link }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->page_type_id }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->created_at }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->updated_at }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell class="action">
    @include('livewire.backend.sections.our-team.includes.actions', ['our' => $row])
</x-livewire-tables::bs4.table.cell>
