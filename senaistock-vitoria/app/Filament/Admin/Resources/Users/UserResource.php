<?php

namespace App\Filament\Admin\Resources\Users;

use App\Filament\Admin\Resources\Users\Pages\CreateUser;
use App\Filament\Admin\Resources\Users\Pages\EditUser;
use App\Filament\Admin\Resources\Users\Pages\ListUsers;
use App\Filament\Admin\Resources\Users\Schemas\UserForm;
use App\Filament\Admin\Resources\Users\Tables\UsersTable;
use App\Models\User;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Support\Icons\Heroicon;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUsers;
    protected static ?string $navigationLabel = 'Usuários';
    protected static ?string $recordTitleAttribute = 'name';
    protected static ?int $navigationSort = 1;

    // 🔐 Permissões
    public static function canViewAny(): bool 
    { 
        return auth()->check() && auth()->user()->isCoordenador();
    }

    public static function canCreate(): bool 
    { 
        return auth()->check() && auth()->user()->isCoordenador();
    }

    public static function canEdit($record): bool 
    { 
        return auth()->check() && auth()->user()->isCoordenador();
    }

    public static function canDelete($record): bool 
    { 
        return false; 
    }

    // ✅ FORM
    public static function form(Schema $schema): Schema
    {
        return UserForm::configure($schema);
    }

    // ✅ TABLE
    public static function table(Table $table): Table
    {
        return UsersTable::configure($table);
    }

    // 📄 Páginas
    public static function getPages(): array
    {
        return [
            'index' => ListUsers::route('/'),
            'create' => CreateUser::route('/create'),
            'edit' => EditUser::route('/{record}/edit'),
        ];
    }
}