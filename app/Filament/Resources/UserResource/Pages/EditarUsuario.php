<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Resources\Pages\Page;
use Filament\Forms;
use Illuminate\Contracts\View\View;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;


class EditarUsuario extends Page implements Forms\Contracts\HasForms 
{
    use Forms\Concerns\InteractsWithForms;

    protected static string $resource = UserResource::class;

    protected static string $view = 'filament.resources.user-resource.pages.editar-usuario';

    public User $user;

    //public $user = User::where();
    
    public $record; 
    public $name ;
    public $surname;
    public $nickname;
    public $email;
    public $password;
    public $password_confirmation;
    public $profile_photo_path;

    //dd($record);

    public function mount($record): void
    {
        //dd($this->record);
        $user = User::where('id', $this->record)->first();
        //dd($user->profile_photo_path);
        $this->form->fill([
            'name' => $user->name,
            'surname' => $user->surname,
            'nickname' => $user->nickname,
            'email' => $user->email,
            'password' => $user->password,
            'password_confirmation' => $user->password_confirmation,
            'profile_photo_path' => $user->profile_photo_path,
            
        ]);
    }

    protected function getFormSchema(): array 
    {
        return [
            TextInput::make('name'),
            TextInput::make('surname'),
            TextInput::make('nickname'),
            TextInput::make('email'),
            TextInput::make('password'),
            TextInput::make('password_confirmation'),
            FileUpload::make('profile_photo_path')
        ];
    }

    public function submit(): void
    {
        // ...
    }
}
