<?php

namespace App\Livewire\Documents;

use App\Models\Documents\Folder;
use App\Models\Users\Log;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class CreateFolder extends Component
{
    public $folder_name = '';
    public $description = '';
    #[Reactive]
    public $currentFolderID;
    
    public function render()
    {
        return view('livewire.documents.create-folder');
    }

    public function createFolder()
    {
        $validated = $this->validate([
            'folder_name' => 'required',
            'description' => 'required',
        ]);

        $validated['user_id'] = auth()->user()->id;
        $validated['parent_id'] = $this->currentFolderID;
        $validated['tenan_id'] = auth()->user()->tenan_id;

        $folder = Folder::create($validated);
        $user = auth()->user();
        Log::logActivity($user, "New folder $folder->folder_name ($folder->id) created by $user->username ($user->id).");
        $this->dispatch('folder-created');
        $this->dispatch('close-modal');
    }

    public function cancelar()
    {
        $this->dispatch('close-modal');
    }
}
