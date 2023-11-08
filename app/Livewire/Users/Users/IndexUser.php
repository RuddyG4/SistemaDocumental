<?php

namespace App\Livewire\Users\Users;

use App\Models\User;
use App\Models\Users\Role;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class IndexUser extends Component
{
    use WithPagination;
    
    public $username, $email, $role_id, $user, $roles;
    
    public function render()
    {
        return view('livewire.users.users.index-user');
    }

    public function mount()
    {
        $this->roles = $this->getRoles();
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
    }

    public function updateUser()
    {
        $data =$this->validate([
            'username' => 'required',
            'email' => 'required|email',
            'role_id' => 'required',
        ]);

        $this->user->update($data);

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
