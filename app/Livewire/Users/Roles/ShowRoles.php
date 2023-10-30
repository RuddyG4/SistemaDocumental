<?php

namespace App\Livewire\Users\Roles;

use App\Models\Users\Role;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class ShowRoles extends Component
{
    public $current_role;
    public $role_name, $permission_name, $description;
    public $roles;

    public function render()
    {
        return view('livewire.users.roles.show-roles');
    }

    public function mount()
    {
        $this->loadRoles();
    }

    #[On('role-created')]
    #[On('role-updated')]
    public function loadRoles()
    {
        $this->roles = Role::where('tenan_id', Auth::user()->customer->id)->get();
    }

    public function cancel()
    {
        //
    }

    public function showRole($roleID)
    {
        $this->current_role = Role::find($roleID);
        $this->role_name = $this->current_role->role_name;
        $this->description = $this->current_role->description;
    }

    public function updateRole()
    {
        $data = $this->validate([
            'role_name' => 'required|max:60',
            'description' => 'required|max:255',
        ]);
        $this->current_role->update($data);

        $this->dispatch('role-updated');
        $this->reset('current_role', 'role_name', 'description');
    }
}
