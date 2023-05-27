<?php

namespace App\Http\Livewire;

use Filament\Forms\Components\Card;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Support\Str;
use Livewire\Component;
use Sgcomptech\FilamentTicketing\Models\Ticket;

class ContactForm extends Component implements HasForms
{
    use InteractsWithForms;

    public function render()
    {
        return view('livewire.contact-form');
    }


    public $title;
    public $content;

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('name')
                ->label(__('Name'))
                ->required()
                ->maxLength(255)
                ->columnSpan(2)
                ->disabledOn('edit')
                ->hidden(auth()->check()),
            TextInput::make('email')
                ->label(__('Email'))
                ->required()
                ->maxLength(255)
                ->columnSpan(2)
                ->disabledOn('edit')
                ->hidden(auth()->check()),
            TextInput::make('title')
                ->label(__('Subject'))
                ->required()
                ->maxLength(255)
                ->columnSpan(2)
                ->disabledOn('edit'),
            Textarea::make('content')
                ->label(__('Message'))
                ->required()
                ->columnSpan(2)
                ->disabledOn('edit'),
        ];
    }

    public function submit()
    {
        Ticket::create([
            'user_id' => auth()->id() || 0,
            'identifier' => strtoupper(Str::random(8)),
            'status' => 1,
            'title' => $this->form->getState()['title'],
            'content' => $this->form->getState()['content'],
        ]);
        session()->flash('message', 'Contact form submitted.');
        redirect()->to('/contact');

    }

    protected function getFormModel(): string
    {
        return Ticket::class;
    }

}