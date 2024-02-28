@if ($our)
    <x-utils.edit-button :href="route('admin.edit-our-model', $our->id)" />
    <x-utils.delete-button :serviceId="$our->id" :href="route('admin.delete-our-model', $our->id)" />
@endif
