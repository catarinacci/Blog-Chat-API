<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;;
use App\Forms\Components\ImageProfile;
use App\Models\User;
use Filament\Resources\Pages\Page;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Card;
use App\Forms\Components\UserActions;
use Filament\Forms\Components\Wizard;
use Filament\Pages\Actions\Action;
use Filament\Notifications\Notification; 
use App\Models\Image;
use App\Models\Note;
use App\Models\Reactionm;
use App\Models\Comment;
use Illuminate\Support\Facades\Hash;



class EditarUsuario extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static string $resource = UserResource::class;

    protected static string $view = 'filament.resources.user-resource.pages.editar-usuario';

    protected static ?string $title = 'Edit User';

    public User $user;
    
    public $record; 
    public array $data=[];
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
      
            Action::make('Back')
            ->url(function(){
                return route('filament.resources.users.index');
            }),
            Action::make('Back')
            ->url(route('filament.resources.users.view',['record' => $this->record]))
            ->color('secondary')
            ->button()
        ];
    }
  
    protected function getFormActions(): array
    {

        return [
            
                Action::make('Save Change')
                ->submit('save')
        ];
    }

    public function save():array
    {
        $user = User::where('id', $this->record)->first();     

        $data = $this->form->getState();

        $path_image = $data['profile_photo_path'];

        if($user->status == 1){            

            if($data['password'] && $data['password_confirmation']){
               
                if($data['password'] == $data['password_confirmation']){
                    //dd('iguales');//Passwords iguales
                    
                    if($path_image){
    
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
    
                        Notification::make() 
                        ->title('Udated successfully')
                        ->success()
                        ->send();
                                      
                        return [Redirect()->route('filament.resources.users.index')];
            
                    }else{

                        //dd('ingreso pass y no ingreso imagen');
                        $user->update([
                            'name' => $data['name'],
                            'surname' => $data['surname'],
                            'nickname' => $data['nickname'],
                            'password' => Hash::make($data['password']),
                            //'profile_photo_path' => $paths3 
                        ]);
    
                        Notification::make() 
                        ->title('Udated successfully')
                        ->success()
                        ->send();
                                      
                        return [Redirect()->route('filament.resources.users.index')];
                    }
    
                   
                }else{

                        Notification::make()
                        ->title('Password error')
                        ->danger()
                        ->body('Password field does not match')
                        ->send();
                        return[];
                }
              
            }else{

                if($path_image){
                    //no ingreso password, pero si imagen
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
                        //'password' => Hash::make($data['password']),
                        'profile_photo_path' => $paths3 
                    ]);

                    Notification::make() 
                    ->title('Udated successfully')
                    ->success()
                    ->send();
                                  
                    return [Redirect()->route('filament.resources.users.index')];
        
                }else{
                    $user->update([
                        'name' => $data['name'],
                        'surname' => $data['surname'],
                        'nickname' => $data['nickname'],
                        //'password' => Hash::make($data['password']),
                        //'profile_photo_path' => $paths3 
                    ]);
    
                    Notification::make() 
                    ->title('Udated successfully')
                    ->success()
                    ->send();
                                  
                    return [Redirect()->route('filament.resources.users.index')];
                }
               
            }

        }else{
            Notification::make()
                        ->title('User LOKED')
                        ->danger()
                        ->body('Data cannot be updated')
                        ->send();
                        return[];
        }
    
       
     
    }

    protected function getHeaderWidgets(): array 
    {
        $a = 'aaa';
        return [
          
            //UserResource\Widgets\Reactions::make(['a' => '1'])
            ///UserResource\Widgets\Reaction->items(['q'=>'a'])
            //UserResource\Widgets\PostsCount::class
            //ImageProfile::class
        ];
    }

  
}
