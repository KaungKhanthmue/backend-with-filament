<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Friend extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static string $view = 'filament.pages.friend';
    protected static ?int $navigationSort = 2;
}
