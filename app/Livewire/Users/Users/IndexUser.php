<?php

namespace App\Livewire\Users\Users;

use App\Models\User;
use App\Models\Users\Log;
use App\Models\Users\Role;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class IndexUser extends Component
{
    use WithPagination;

    public $username, $email, $role_id, $user, $roles, $permissions;

    public function render()
    {
        return view('livewire.users.users.index-user')
            ->layout('layouts.app', ['permissions' => $this->permissions]);
    }

    public function mount()
    {
        $this->roles = $this->getRoles();
        $this->permissions = auth()->user()->getPermissions();
        $user = auth()->user();
        Log::logActivity($user, "User $user->username ($user->id) accessed users view.");
    }

    #[On('user-created')]
    public function loadUsers()
    {
        return User::where('tenan_id', auth()->user()->tenan_id)->with('role')->paginate(10);
    }

    public function showUser(User $user)
    {
        $this->user = $user;
        $this->username = $user->username;
        $this->email = $user->email;
        $this->role_id = $user->role_id;
        $user = auth()->user();
        Log::logActivity($user, "User $user->username ($user->id) accessed to the view of user " . $this->user->username . ' (' . $this->user->id . ')');
    }

    public function updateUser()
    {
        $data = $this->validate([
            'username' => 'required',
            'email' => 'required|email',
            'role_id' => 'required',
        ]);

        $this->user->update($data);

        $user = auth()->user();
        Log::logActivity($user, "User $user->username ($user->id) updated the user " . $this->user->username . ' (' . $this->user->id . ')');
        $this->dispatch('user-updated');
    }

    public function cancel()
    {
        //
    }

    public function getRoles()
    {
        return Role::where('tenan_id', auth()->user()->tenan_id)->get();
    }
}
