<?php

namespace App\Filament\Pages;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Carbon\Carbon;
use Filament\Actions\CreateAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Pages\Page;
use Livewire\Attributes\Computed;
use Filament\Forms;

class Home extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static string $view = 'filament.pages.home';
    protected static ?int $navigationSort = 1;

    public $modelBox = 0;
    public $newFeel = 0;


    #[Computed]

    public function getPosts()
    {
       $post =  \App\Models\Post::with('user','image')->get();
       return PostResource::collection($post);
    }
    #[Computed]
    public function newFeels()
    {
        $last24Hours = Carbon::now()->subHours(24); 

        return \App\Models\NewFell::with('user')->where('created_at', '>=', $last24Hours)->get();
    }
    public function modelBoxOnOff()
    {
        
        if($this->modelBox == 0)
        {
            $this->modelBox = 1;
            
        }
        else{
            $this->modelBox = 0;
        }
    }   

    public function newFellOnOff()
    {
        
        if($this->newFeel == 0)
        {
            $this->newFeel = 1;
            
        }
        else{
            $this->newFeel = 0;
        }
    }
    public function off()
    {
        $this->modelBox =0;
        $this->newFeel = 0;
    }  
}