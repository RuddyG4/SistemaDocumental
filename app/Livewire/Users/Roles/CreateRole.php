<?php

namespace App\Livewire\Users\Roles;

use App\Models\Users\Role;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateRole extends Component
{
    public $role_name;
    public $description;
    
    public function render()
    {
        return view('livewire.users.roles.create-role');
    }

    public function createRole()
    {
        $validated = $this->validate([
            'role_name' => 'required|max:60',
            'description' => 'required|max:255',
        ]);

        $validated['tenan_id'] = Auth::user()->customer->id;

        Role::create($validated);
        $this->dispatch('role-created');
        $this->dispatch('close-create-role-modal');
    }

    public function cancel()
    {
        //
    }
}
