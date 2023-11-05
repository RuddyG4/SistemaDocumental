<?php

namespace App\Livewire\Users\Roles;

use App\Models\Users\Permission;
use App\Models\Users\Role;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class ShowRoles extends Component
{
    public $current_role;
    public $role_name, $permission_name, $description;
    public $roles, $permissions, $role_permissions;

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

    public function loadPermissions(Role $role)
    {
        $this->current_role = $role;
        $this->permissions = Permission::all();
        foreach ($this->permissions as $p) {
            $this->role_permissions[$p->id] = false;
        }

        foreach ($role->permissions as $p) {
            $this->role_permissions[$p->id] = true;
        }
    }

    public function createPermission()
    {
        $data = $this->validate([
            'permission_name' => 'required|max:60',
            'description' => 'required|max:255',
        ]);

        $data['tenan_id'] = Auth::user()->customer->id;
        $data['name'] = $data['permission_name'];
        unset($data['permission_name']);
        Permission::create($data);

        $this->dispatch('permission-created');
        $this->reset('permission_name', 'description');
    }

    public function updatePermissions()
    {
        $updatedPermissions = array_keys($this->role_permissions, true);
        $this->current_role->permissions()->sync($updatedPermissions);

        $this->dispatch('role-permissions-updated');
    }
}
