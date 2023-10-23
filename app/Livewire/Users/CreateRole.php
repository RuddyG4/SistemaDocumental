<?php

namespace App\Livewire\Users;

use App\Models\Users\Role;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateRole extends Component
{
    public $role_name;
    public $description;
    
    public function render()
    {
        return view('livewire.users.create-role');
    }

    public function createRole()
    {
        $validated = $this->validate([
            'role_name' => 'required',
            'description' => 'required',
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
