<?php

namespace App\Livewire\NewFell;

use App\Models\NewFell;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;
use Illuminate\Contracts\View\View;

class CreateNewFell extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

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
                Forms\Components\FileUpload::make('image')
                ->disk('public')
                ->directory('newfell/'.auth()->user()->id.'/')
                ->visibility('public'),
            
            ])
            ->statePath('data')
            ->model(NewFell::class);
    }

    public function create(): void
    {
        $data = $this->form->getState();
        $data= array_merge($data,['user_id' => auth()->user()->id]);
        $record = NewFell::create($data);
        if($data['image'] != null){
            $record->image()->create([
                'path' => $data['image'],
                'type' => 'new-fell',
                'name' => 'hello',
            ]);
        }
        $this->form->model($record)->saveRelationships();
        $this->redirect('/admin/home');
    }

    public function render(): View
    {
        return view('livewire.new-fell.create-new-fell');
    }
}