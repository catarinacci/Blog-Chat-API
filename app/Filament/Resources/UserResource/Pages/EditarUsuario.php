<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Resources\Pages\Page;
use Filament\Forms;
use Illuminate\Contracts\View\View;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Wizard;
use Filament\Pages\Actions\Action;
use Filament\Support\Exceptions\Halt;


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
            //'password' => $user->password,
            'password_confirmation' => $user->password_confirmation,
            'profile_photo_path' => $user->profile_photo_path,
            
        ]);
    }

    protected function getFormSchema(): array 
    {
        return [
            // Card::make()
            //     ->schema([
            //         TextInput::make('name'),
            //         TextInput::make('surname'),
            //         TextInput::make('nickname'),
            //         TextInput::make('email'),
            //         TextInput::make('password'),
            //         TextInput::make('password_confirmation'),
            //         //ImageColumn::make('profile_photo_path')->disk('s3'),
            //         FileUpload::make('profile_photo_path')->disk('s3'),
                    
            //     ])
                Wizard::make([
                    Wizard\Step::make('Personal Information')
                        ->schema([
                            TextInput::make('name'),
                            TextInput::make('surname'),
                            TextInput::make('nickname'),
                            TextInput::make('email'),
                                ]),
                    Wizard\Step::make('Passwor Reset')
                        ->schema([
                            TextInput::make('password'),
                            TextInput::make('password_confirmation'),
                        ]),
                    Wizard\Step::make('change Image')
                        ->schema([
                            FileUpload::make('profile_photo_path')->disk('s3'),
                        ]),
                ])
                
        ];
        
    }
  
    protected function getFormActions(): array
    {
        return [
                Action::make('Save Change')
                ->submit('save'),
                
        ];
    }

    public function save(): void
    {
        try {
            $data = $this->form->getState();
            dd($data);
            //auth()->user()->company->update($data);
        } catch (Halt $exception) {
            return;
        }
    }
  
}
