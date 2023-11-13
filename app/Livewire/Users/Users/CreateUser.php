<?php

namespace App\Livewire\Users\Users;

use App\Models\User;
use App\Models\Users\Log;
use App\Models\Users\Role;
use Livewire\Component;

class CreateUser extends Component
{
    public $username, $email, $role_id;

    public function render()
    {
        return view('livewire.users.users.create-user');
    }

    public function cancel()
    {
        $this->reset(['username', 'email', 'role_id']);
    }

    public function createUser()
    {
        $data = $this->validate([
            'username' => 'required|string|max:60',
            'email' => 'required|email',
            'role_id' => 'required|integer',
        ]);

        $data['password'] = bcrypt('password');
        $data['tenan_id'] = auth()->user()->tenan_id;

        $newUser = User::create($data);

        $user = auth()->user();
        Log::logActivity($user, "User $user->username ($user->id) created $newUser->username ($newUser->id) successfully.");
        $this->dispatch('user-created');
    }

    public function getRoles()
    {
        return Role::where('tenan_id', auth()->user()->tenan_id)->get();
    }
}
