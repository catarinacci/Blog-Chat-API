<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\Page;
use App\Models\User;
use Closure;

class ViewUser extends Page
{
    protected static string $resource = UserResource::class;

    protected static string $view = 'filament.resources.user-resource.pages.view-user';

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

    

    // protected function getTableRecordUrlUsing(): ?Closure
    // {
    //     return fn (User $record): string => route('filament.resources.users.view', ['record' => $record]);
    // }
}
