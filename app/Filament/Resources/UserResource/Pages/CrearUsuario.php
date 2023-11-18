<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\Page;
use App\Models\User;
use DateTime;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Pages\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Hash;
use App\Models\Image;

class CrearUsuario extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static string $resource = UserResource::class;

    protected static string $view = 'filament.resources.user-resource.pages.crear-usuario';

    public User $user;
    public Image $image;    
    public $record;
    public $data = [];
    public function mount(): void
    {
        $this->form->fill();
    }
    protected function getFormSchema(): array 
    {
        
        $user = User::where('id', $this->record)->first();
        
        return [
           
            Card::make()
                ->schema([
                                           
                            TextInput::make('name')->required()->maxValue(20),
                            TextInput::make('surname')->maxLength(20),
                            TextInput::make('nickname')->maxLength(20),
                            TextInput::make('email')->required()->email(),                   
                            TextInput::make('password')->maxLength(8)->required(),
                            TextInput::make('password_confirmation')->maxLength(8)->required(),
                            FileUpload::make('profile_photo_path')->disk('s3')
                            ->image()->enableOpen()->imageResizeMode('cover'),
                        ]),                                    
            ];          
    }

    protected function getActions(): array
    {
        return [
            Action::make('Back')->url(function(){
                return route('filament.resources.users.index');
            })
        ];
    }

    protected function getFormActions(): array
    {
        return [
            
                Action::make('Save')
                ->submit('save')
        ];
    }

    public function save():array
    {
        $data = $this->form->getState();

        $email_exist = User::where('email', $data['email'])->first();

        $date = new DateTime();

        if(!$email_exist){
            if($data['password'] == $data['password_confirmation']){
                //dd('iguales');
               
                $paths3 = 'https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/'.$data['profile_photo_path'];
                
                $newuser = new User();

                $newuser->name = $data['name'];
                $newuser->surname = $data['surname'];
                $newuser->nickname = $data['nickname'];
                $newuser->email = $data['email'];
                
                $newuser->email_verified_at = $date;
                $newuser->password = bcrypt($data['password']);
                $newuser->profile_photo_path = 'https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/noteapi/blank-profile-picture.png';
                if($data['profile_photo_path']){
                    $newuser->profile_photo_path = $paths3;
                }
                $newuser->save();

                $newuser->image()->create(['url' => $paths3]);

                Notification::make() 
                ->title('Created successfully')
                ->success()
                ->send();
                                
                return [Redirect()->route('filament.resources.users.index')];
            }else{
                Notification::make()
                ->title('Password error')
                ->danger()
                ->body('Password field does not match')
                ->send();
                return[];
            }
        }else{
            //dd('si');
            Notification::make()
            ->title('Email error')
            ->danger()
            ->body('The email is already in use')
            ->send();
            return[];
        }

    }
}
