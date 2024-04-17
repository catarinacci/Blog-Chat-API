<?php

namespace App\Filament\Resources\TagResource\Pages;

use App\Filament\Resources\TagResource;
use App\Models\Tag;
use Filament\Resources\Pages\Page;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Contracts\HasTable;
use Filament\Pages\Actions\Action as Actionn;

class ShowTagsLoked extends Page implements HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected static string $resource = TagResource::class;

    protected static string $view = 'filament.resources.tag-resource.pages.show-tags-loked';

    protected function getTableQuery(): Builder
    {

        return Tag::query()->where('status', '2')->orderBy('updated_at', 'desc');
    }

    protected function getTableColumns(): array
    {

        return [
            Tables\Columns\TextColumn::make('id')->color('primary')->words(1)->searchable(),
            Tables\Columns\TextColumn::make('name')->searchable()->wrap(),
            Tables\Columns\TextColumn::make('status')->sortable()->searchable()
                ->getStateUsing(function (Tag $record) {
                    if ($record->status === "1") {
                        $status = "Active";
                    } else {
                        $status = "Loked";
                    }
                    return $status;
                }),
            Tables\Columns\TextColumn::make('updated_at')->sortable()->date(),
        ];
    }

    protected function getActions(): array
    {
        return [
            Actionn::make('Back')
                ->url(route('filament.resources.tags.index')),
        ];
    }
}
