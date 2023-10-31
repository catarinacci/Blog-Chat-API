<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Forms\Components\ImageProfile;
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
use Livewire\TemporaryUploadedFile;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

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
    public $path_image = '';

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
                            ]),

                            FileUpload::make('profile_photo_path')->disk('s3')->image(),
                           
            
 

                            // ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                            //     //dd($file);
                            //     return (string) $file->getClientOriginalName()->prepend('custom-prefix-');
                            // })->image(),
                           
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

        $path_image = $data['profile_photo_path'];
        $path_json = json_encode($data);
       //$path = strval($path_image);

        if($data['password'] && $data['password_confirmation']){
            //dd($data['profile_photo_path']);
            if($data['password'] == $data['password_confirmation']){
                //dd('iguales');//Passwords iguales
                //dd($path_image);
                if($path_image){
                    //dd($path_image);
                    //Igreso una imagen,  Guardar nueva imagen
                    //$documentPath = $path_image->file('profile_photo_path')->store('noteapi', 's3');
                    //$request->file('image_note_path')
                    //dd($documentPath);
                    // $path = Storage::disk('s3')->url($documentPath);
                     //dd($path_image);
                    //https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/nGcgiwJMcTLrWt42ko64EXAs0G5MuC-metaw61uZGljZS5qcGc%3D-.jpg
                    $image_object =  Image::where('imageable_id', $user->id)
                                            ->where('imageable_type', 'App\Models\User')->first();
                    $paths3 = 'https://note-api-catarinacci.s3.sa-east-1.amazonaws.com/'.$path_image;
                    $image_object->update([
                        'url' => $paths3
                    ]);
                    $user->update([
                        'name' => $data['name'],
                        'surname' => $data['surname'],
                        'nickname' => $data['nickname'],
                        'password' => Hash::make($data['password']),
                        'profile_photo_path' => $paths3 
                    ]);
                }else{
                    dd('no ingreso imagen');
                }

                $image_object =  Image::where('imageable_id', $user->id)
                                            ->where('imageable_type', 'App\Models\User')->first();
                dd($image_object);
            }else{

                // Tables\Actions\ViewAction::make('comments')
                //     ->modalContent(fn ($record) => view('test', compact('record')));
                    Notification::make()
                    ->title('Password error')
                    ->danger()
                    ->body('Password field does not match')
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
