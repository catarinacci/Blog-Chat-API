<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Forms\Components\ImageProfile;
use App\Forms\Components\ProfileCard;
use App\Forms\Components\StatusUser;
use App\Forms\Components\UserActions;
use App\Models\Comment;
use App\Models\Note;
use App\Models\Reactionm;
use Filament\Resources\Pages\Page;
use App\Models\User;
use Filament\Pages\Actions\Action;
use Filament\Forms\Components\Card;

class ViewUser extends Page
{
    protected static string $resource = UserResource::class;

    protected static string $view = 'filament.resources.user-resource.pages.view-user';

    protected static ?string $title = 'User Profile';

    public User $user;

    public $record;
    public array $data = [];
    public $path_image = '';

    public function mount($record): void
    {
        $user = User::where('id', $this->record)->first();

        //dd($notes);
        $this->form->fill([
            'name' => $user->name,
            'surname' => $user->surname,
            'nickname' => $user->nickname,
            'email' => $user->email,
            //'password' => $user->password,
            //'password_confirmation' => $user->password_confirmation,
            'profile_photo_path' => $user->profile_photo_path,

        ]);
    }
    protected function getFormSchema(): array
    {

        $user = User::where('id', $this->record)->first();
        $notes = Note::where('user_id', $user->id)->count();
        $comments = Comment::where('user_id', $user->id)->count();
        $reaction = Reactionm::where('user_id', $user->id)->count();
        return [


            Card::make()
                ->schema([

                    StatusUser::make('')->items([
                        'status' => $user->status,
                        'email_verified_at' => $user->email_verified_at,
                    ]),

                ]),

            Card::make()
                ->schema([
                    UserActions::make('')->items(['posts' => $notes, 'comments' => $comments, 'reactions' => $reaction,  'user_id' => $user->id]),

                ]),

                Card::make()
                ->schema([
                    ProfileCard::make('')->items([
                        'name' => $user->name,
                        'surname' => $user->surname,
                        'nickname' => $user->nickname,
                        'email' => $user->email,
                        'profile_photo_path' => $user->profile_photo_path,
                    ]),

                ]),


        ];
    }

    protected function getActions(): array
    {
        return [

            Action::make('Back')->url(function () {
                return route('filament.resources.users.index');
            }),
            Action::make('edit')
            ->url(route('filament.resources.users.edit', ['record' => $this->record]))
            ->color('success')
            ->button()
        ];
    }

    // protected function getFormActions(): array
    // {

    //     return [

    //         Action::make('edit')
    //             ->url(route('filament.resources.users.edit', ['record' => $this->record]))
    //             ->color('success')
    //             ->button()
    //     ];
    // }
}
