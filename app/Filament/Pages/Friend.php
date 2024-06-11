<?php

namespace App\Filament\Pages;

use App\Models\FriendList;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Pages\Page;
use Filament\Support\Enums\ActionSize;
use Livewire\Attributes\Computed;

class Friend extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static string $view = 'filament.pages.friend';
    protected static ?int $navigationSort = 2;
    public $userId = null;

    #[Computed()]
    public function userAll()
    {
        $requestUserId = [];
        $addedFriend = [];
        $user= User::find(auth()->user()->id);
        foreach($user->friendRequest as $requestUser){
            $requestUserId[] = $requestUser->id;
        }
        foreach($user->friends as $added)
        {
            $addedFriend[] = $added->id;
        }
    
        $merg = array_merge($requestUserId,$addedFriend);

        return \App\Models\User::whereNot('id',$user->id)->whereNotIn('id',$merg)->get();
    }
    #[Computed()]
    public function friendRequest()
    {
        $user=  User::find(auth()->user()->id);
        $friendRequestAll = FriendList::where('your_friend_id',$user->id)->where('status','pending')->get();
        $rqId = [];
        foreach($friendRequestAll as $requestUser){
            $rqId[] = $requestUser->user_id;
        }
        return User::whereIn('id',$rqId)->get();
        
    }

    public function comfirm()
    {
       return Action::make()
       ->name('comfirm')
       ->color('white')
       ->button()
       ->outlined()
       ->label('comfirm')
       ->model(User::class)
       ->action(function($arguments) {
        $zz = FriendList::where('user_id',$arguments['xxId'])->where('your_friend_id',auth()->user()->id)->first();
        $zz->status = 'completed';
        $zz->save();

    });
    }
    public function addFriend()
    {
       return Action::make()
       ->name('addFriend')
       ->color('white')
       ->button()
       ->outlined()
       ->label('Add Friend')
       ->size(ActionSize::Large)
       ->model(User::class)
       ->action(function($arguments) {
        $check= FriendList::where('user_id',auth()->user()->id)->where('your_friend_id',$arguments['addUserId'])->first();
        if(!$check)
        {
            FriendList::create([
                'user_id' => auth()->user()->id,
                'your_friend_id' => $arguments['addUserId'],
               'status' => 'pending',   
            ]);
        }


    });
    }
    
}
