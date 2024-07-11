<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;
use Illuminate\Contracts\View\View;

class CreatePost extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];
    public $modelBox = null;

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('description')
                    ->required(),
                Forms\Components\FileUpload::make('images')
                    ->disk('public')
                    ->multiple(true)
                    ->directory('post/'.auth()->user()->id.'/')
                    ->visibility('public'),
            ])
            ->statePath('data')
            ->model(Post::class);
    }

    public function create()
    {
        $data = $this->form->getState();
        $data = array_merge($data, ['user_id' => auth()->user()->id]);

        $record = Post::create($data);
        
        if (!empty($data['images'])) {
            foreach ($data['images'] as $image) {
                $record->image()->create([
                    'path' => $image,
                    'type' => 'image',
                    'name' => 'hello',
                ]);
            }
        }

        $this->form->model($record)->saveRelationships();
        $this->redirect('/admin/home');
    }

    public function render(): View
    {
        return view('livewire.post.create-post');
    }
}