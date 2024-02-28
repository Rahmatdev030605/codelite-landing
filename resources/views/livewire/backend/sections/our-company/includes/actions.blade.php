@if ($our)
    <x-utils.edit-button :href="route('admin.edit-our-company', $our->id)" />
    <x-utils.delete-button :serviceId="$our->id" :href="route('admin.delete-our-company', $our->id)" />
@endif
