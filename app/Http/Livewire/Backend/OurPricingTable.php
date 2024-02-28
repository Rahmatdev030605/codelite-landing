<?php

namespace App\Http\Livewire\Backend;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\OurPricing;

class OurPricingTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Status", "status")
                ->sortable(),
            Column::make("Title", "title")
                ->sortable(),
            Column::make("Heading", "heading")
                ->sortable(),
            Column::make("Sub heading", "sub_heading")
                ->sortable(),
            Column::make("Image", "image")
                ->sortable(),
            Column::make("Button link", "button_link")
                ->sortable(),
            Column::make("Page type id", "page_type_id")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }

    public function query(): Builder
    {
        return OurPricing::query();
    }
}
