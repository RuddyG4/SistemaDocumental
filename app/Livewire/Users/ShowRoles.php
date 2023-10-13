<?php

namespace App\Livewire\Users;

use App\Models\Users\Role;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class ShowRoles extends Component
{
    public $roles;

    public function render()
    {
        return view('livewire.users.show-roles');
    }

    public function mount()
    {
        $this->loadRoles();
    }

    #[On('role-created')]
    public function loadRoles()
    {
        $this->roles = Role::where('tenan_id', Auth::user()->customer->id)->get();
    }

    public function cancel()
    {
        //
    }
}
