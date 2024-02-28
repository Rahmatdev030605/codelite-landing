<?php

namespace App\Http\Livewire\Backend;

use App\Models\PageTypes;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\OurModel;
use Rappasoft\LaravelLivewireTables\Views\Filter;

class OurModelTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make(__('Status'))
                ->sortable(),
            Column::make(__('Title'))
                ->sortable(),
            Column::make(__('Heading'))
                ->sortable(),
            Column::make(__('Sub Heading'))
                ->sortable(),
            Column::make(__('Button Link')),
            Column::make(__('Page')),
            Column::make(__('Created')),
            Column::make(__('Updated')),
            Column::make(__('Actions')),
        ];
    }

    public function query(): Builder
    {
        $query = OurModel::query();

        $query->when($this->getFilter('status'), function ($query, $status) {
            return $query->where('status', $status);
        });

        $query->when($this->getFilter('page_type_id'), function ($query, $pageType) {
            return $query->where('page_type_id', $pageType);
        });

        $query->when($this->getFilter('sort'), function ($query, $order) {
            if ($order === 'newest') {
                return $query->orderBy('updated_at', 'desc');
            } elseif ($order === 'oldest') {
                return $query->orderBy('updated_at', 'asc');
            } elseif ($order === 'a-z') {
                return $query->orderBy('title', 'asc')
                    ->orderBy('heading', 'asc');
            } elseif ($order === 'z-a') {
                return $query->orderBy('title', 'desc');
            }
        });


        if ($this->getFilter('search')) {
            $term = $this->getFilter('search');
            $query->where(function (Builder $query) use ($term) {
                $query->where('title', 'like', '%' . $term . '%')
                    ->orWhere('heading', 'like', '%' . $term . '%');
            });
        }
        return $query;
    }

    public function filters(): array
    {
        $pageTypes = PageTypes::pluck('name', 'id')->toArray();
        asort($pageTypes);
        $sortedPageTypes = $pageTypes;
        arsort($sortedPageTypes);

        return [
            'status' => Filter::make('Status')
                ->select([
                    '' => 'All',
                    '1' => 'Active',
                    '0' => 'Inactive',
                ]),

            'page_type_id' => Filter::make('Page Type')
                ->select(array_merge(['' => 'All'], $pageTypes)),

            'sort' => Filter::make('Sort By')
                ->select([
                    '' => 'All',
                    'a-z' => 'A-Z',
                    'z-a' => 'Z-A',
                    'newest' => 'Newest',
                    'oldest' => 'Oldest',
                ]),
        ];
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function rowView(): string
    {
        return 'livewire.backend.sections.our-model.includes.row';
    }
}
