<?php

namespace App\Filament\Pages;

use App\Models\FriendList;
use App\Models\User;
use Filament\Pages\Page;
use Livewire\Attributes\Computed;

class Profile extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static string $view = 'filament.pages.profile';
    protected static ?int $navigationSort = 5;


    #[Computed()]
    public function authUserDetail()
    {
        $user = User::findOrFail(auth()->user()->id);
        return $user;
    }
    #[Computed()]
    public function friendAll()
    {
        $user_id = [];
        $your_friends = [];
        $friends =   FriendList::where('user_id',auth()->user()->id)->orWhere('your_friend_id',auth()->user()->id)->get();
        foreach($friends as $friend){
            $user_id[] = $friend->user_id;
            $your_friends[] = $friend->your_friend_id;
        }
        return  User::whereIn('id',$user_id)->orWhere('id',$your_friends)->get();
    }
}