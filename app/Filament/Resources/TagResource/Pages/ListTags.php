<?php

namespace App\Filament\Resources\TagResource\Pages;

use App\Filament\Resources\TagResource;
use App\Models\Tag;
use Filament\Resources\Pages\Page;
use Filament\Tables;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\Action;
use Closure;
use Filament\Notifications\Notification;
use Filament\Pages\Actions\Action as Actionn;

class ListTags extends Page implements HasTable

{
    use Tables\Concerns\InteractsWithTable;

    protected static string $resource = TagResource::class;

    protected static string $view = 'filament.resources.tag-resource.pages.list-tags';

    protected function getTableQuery(): Builder
    {

        return Tag::query()->orderBy('updated_at', 'desc');
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

    protected function getTableActions(): array
    {
        return [

            Action::make('Block')
                ->label('Block')
                ->color('danger')
                ->action(function (Tag $record): void {
                    //dd($record);
                    $record->update([
                        "status" => '2',
                    ]);
                    Notification::make()
                        ->title('Block successfully')
                        ->success()
                        ->send();
                    //$record->each->delete();
                })
                ->requiresConfirmation(),
            Action::make('Unlock')
                ->label('Unlok')
                ->color('success')
                ->action(function (Tag $record): void {
                    //dd($record);
                    $record->update([
                        "status" => '1',
                    ]);
                    Notification::make()
                        ->title('Unlock successfully')
                        ->success()
                        ->send();
                    //$record->each->delete();
                })
                ->requiresConfirmation(),
        ];
    }

    protected function getTableRecordUrlUsing(): ?Closure
    {
        return fn (Tag $record): string => route('filament.resources.tags.edit', ['record' => $record]);
    }

    protected function getActions(): array
    {
        return [
            Actionn::make('Create Tag')
                ->url(route('filament.resources.tags.create'))
                ->color('success')
                ->icon('heroicon-o-plus')
                ->button(),
        ];
    }

    protected function getHeaderWidgets(): array

    {
        return [

            TagResource\Widgets\TagOverview::class,
        ];
    }
}
