@if ($our)
    <x-utils.edit-button :href="route('admin.edit-our-service', $our->id)" />
    <x-utils.delete-button :serviceId="$our->id" :href="route('admin.delete-our-service', $our->id)" />
@endif
