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
use Closure;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Pages\Actions\Action as Actionn;

class ViewUser extends Page
{
    protected static string $resource = UserResource::class;

    protected static string $view = 'filament.resources.user-resource.pages.view-user';

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
                    ProfileCard::make('')->items([
                        'name' => $user->name,
                        'surname' => $user->surname,
                        'nickname' => $user->nickname,
                        'email' => $user->email,
                        'profile_photo_path' => $user->profile_photo_path,
                    ]),

                ]),


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

                    Wizard::make([

                        Wizard\Step::make('Personal Information')
                            ->schema([
                                TextInput::make('name')->required()->maxValue(20),
                                TextInput::make('surname')->maxLength(20),
                                TextInput::make('nickname')->maxLength(20),
                                TextInput::make('email')->disabled(),
                            ]),

                        Wizard\Step::make('Passwor Reset')
                            ->schema([
                                TextInput::make('password')->maxLength(8),
                                TextInput::make('password_confirmation')->maxLength(8),
                            ]),

                        Wizard\Step::make('change Image')
                            ->schema([

                                ImageProfile::make('profile_photo_path')->items([
                                    'path' => $user->profile_photo_path
                                ])->reactive(),

                                FileUpload::make('profile_photo_path')->disk('s3')
                                    ->image()->enableOpen()->imageResizeMode('cover'),
                            ]),
                    ]),
                ])
        ];
    }




    protected function getActions(): array
    {
        return [

            Action::make('Back')->url(function () {
                return route('filament.resources.users.index');
            }),
            Action::make('Back')->url(function () {
                return route('filament.resources.users.index');
            }),
        ];
    }

    protected function getFormActions(): array
    {

        return [

            Action::make('edit')
                ->url(route('filament.resources.users.edit', ['record' => $this->record]))
                ->color('success')
                ->button()
        ];
    }
    // protected function edit(): ?Closure
    // {
    //     return fn (User $record): string => route('filament.resources.users.edit', ['record' => $record]);
    // }


    // public function save():array
    // {
    //   return [
    //     Actionn::make('Back')
    //     ->url(route('filament.resources.users.edit',['record' => $this->record]))
    //     ->color('secondary')
    //     ->button(),
    // ];

    //     ];

    //}

    // protected function edit(): ?Closure
    // {
    //     return fn (User $record): string => route('filament.resources.users.edit', ['record' => $record]);
    // // }
}
