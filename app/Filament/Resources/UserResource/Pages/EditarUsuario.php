<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Forms\Components\Image;
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
use Awcodes\Curator\Components\Forms\CuratorPicker;
use FilamentCurator\Forms\Components\MediaPicker;
use Filament\Pages\Contracts\HasFormActions;
use Illuminate\Support\Facades\Redirect;
use Filament\Notifications\Notification; 

//use awcodes/filament-curator/src/Forms/Components/MediaPicker


class EditarUsuario extends Page implements Forms\Contracts\HasForms 
{
    use Forms\Concerns\InteractsWithForms;

    protected static string $resource = UserResource::class;

    protected static string $view = 'filament.resources.user-resource.pages.editar-usuario';

    public User $user;
    
    public $record; 
    public $name ;
    public $surname;
    public $nickname;
    public $email;
    public $password;
    public $password_confirmation;
    public $profile_photo_path;
    public array $data=[];

    public function mount($record): void
    {
        $user = User::where('id', $this->record)->first();
    
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
        
        return [
           
            Card::make()
                ->schema([
                Wizard::make([
                    
                    Wizard\Step::make('Personal Information')
                        ->schema([
                            TextInput::make('name')->required()->maxValue(20),
                            TextInput::make('surname')->maxLength(20),
                            TextInput::make('nickname')->maxLength(20),
                            TextInput::make('email')->required()->email(),
                                ]),
                    Wizard\Step::make('Passwor Reset')
                        ->schema([
                            TextInput::make('password')->password()->maxLength(8),
                            TextInput::make('password_confirmation')->maxLength(8),
                        ]),
                    Wizard\Step::make('change Image')
                        ->schema([
                            
                            Image::make('profile_photo_path')->items([
                                'path' => $user->profile_photo_path
                            ]),

                            FileUpload::make('profile_photo_path')->disk('s3')->image(),
                           
                        ]),
                     
                    
                    ]),
                ])  
        ];
        
    }

    protected function getActions(): array
    {
        return [
            Action::make('Back')->url(function(){
                return route('filament.resources.users.index', ['user'=> $this->getRedirectUrl()]);
            })
        ];
    }

    protected function getRedirectUrl(): ?string
    {
        return static::getResource()::getUrl('index');
    }

  
    protected function getFormActions(): array
    {
        return [

                Action::make('Save Change')
                ->submit('save')           
            
        ];
    }

    public function save(): void
    {
        $user = User::where('id', $this->record)->first();     

        $data = $this->form->getState();

        //$this->dispatchBrowserEvent('refresh-page');
        //dd($data);

        $path = $data['profile_photo_path'];

        if($data['password'] && $data['password_confirmation']){
            //dd($data['profile_photo_path']);
            if($data['password'] == $data['password_confirmation']){
                dd('iguales');
            }else{
                // Tables\Actions\ViewAction::make('comments')
                //     ->modalContent(fn ($record) => view('test', compact('record')));
                    Notification::make()
                    ->title('Password error')
                    ->danger()
                    ->body('Password field does not match')
                    ->persistent()
     
                    ->send();
                    
            
                //dd('desiguales');
            }
            //dd($data['password']);
          
        }else{
            dd(false);
        }

        try {

            $user->update([
                "name" => $data['name'],
            ]);
            Notification::make() 
            ->title('Saved successfully')
            ->success()
            ->send(); 
        } catch (Halt $exception) {
            
        }

     
    }
  
}
