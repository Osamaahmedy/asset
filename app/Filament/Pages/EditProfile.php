<?php

namespace App\Filament\Pages;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class EditProfile extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
    protected static string $view = 'filament.pages.edit-profile';
    protected static bool $shouldRegisterNavigation = false;

    public ?array $profileData = [];
    public ?array $passwordData = [];

    public static function getLabel(): string
    {
        return __('messages.profile.title');
    }

    public function getTitle(): string
    {
        return __('messages.profile.title');
    }

    public function mount(): void
    {
        $user = auth()->user();
        $this->profileForm->fill([
            'name' => $user->name,
            'email' => $user->email,
        ]);
        $this->passwordForm->fill();
    }

    protected function getForms(): array
    {
        return [
            'profileForm',
            'passwordForm',
        ];
    }

    public function profileForm(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make(__('messages.profile.personal_info'))
                    ->aside()
                    ->description(__('messages.section.basic_info'))
                    ->icon('heroicon-o-user')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label(__('messages.field.name'))
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->label(__('messages.field.email'))
                            ->email()
                            ->required()
                            ->unique('users', 'email', ignorable: auth()->user())
                            ->maxLength(255),
                    ]),
            ])
            ->statePath('profileData');
    }

    public function passwordForm(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make(__('messages.profile.update_password'))
                    ->aside()
                    ->description(__('messages.profile.update_password'))
                    ->icon('heroicon-o-lock-closed')
                    ->schema([
                        Forms\Components\TextInput::make('current_password')
                            ->label(__('messages.profile.current_password'))
                            ->password()
                            ->revealable()
                            ->required()
                            ->currentPassword(),
                        Forms\Components\TextInput::make('password')
                            ->label(__('messages.profile.new_password'))
                            ->password()
                            ->revealable()
                            ->required()
                            ->rule(Password::default())
                            ->same('password_confirmation'),
                        Forms\Components\TextInput::make('password_confirmation')
                            ->label(__('messages.profile.confirm_password'))
                            ->password()
                            ->revealable()
                            ->required(),
                    ]),
            ])
            ->statePath('passwordData');
    }

    public function updateProfile(): void
    {
        $data = $this->profileForm->getState();
        auth()->user()->update($data);

        Notification::make()
            ->title(__('messages.profile.saved'))
            ->success()
            ->send();
    }

    public function updatePassword(): void
    {
        $data = $this->passwordForm->getState();
        auth()->user()->update([
            'password' => Hash::make($data['password']),
        ]);
        $this->passwordForm->fill();

        Notification::make()
            ->title(__('messages.profile.saved'))
            ->success()
            ->send();
    }
}
