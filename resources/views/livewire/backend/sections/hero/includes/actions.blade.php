
    @if ($hero)
    <x-utils.edit-button :href="route('admin.edit-hero', $hero->id)" />
    <x-utils.delete-button :href="route('admin.delete-hero', $hero->id)" />
    @endif

