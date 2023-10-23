<?php

namespace App\Livewire\Users\Users;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class IndexUser extends Component
{
    public function render()
    {
        return view('livewire.users.users.index-user');
    }

    #[On('user-created')]
    public function loadUsers()
    {
        return User::with('role')->paginate(10);
    }
}
