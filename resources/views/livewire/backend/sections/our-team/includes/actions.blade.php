@if ($our)
    <x-utils.edit-button :href="route('admin.edit-our-team', $our->id)" />
    <x-utils.delete-button :serviceId="$our->id" :href="route('admin.delete-our-team', $our->id)" />
@endif
