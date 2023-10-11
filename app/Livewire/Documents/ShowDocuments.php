<?php

namespace App\Livewire\Documents;

use App\Models\Documents\Folder;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class ShowDocuments extends Component
{
    public $folders;
    public function render()
    {
        return view('livewire.documents.show-documents');
    }
    
    public function mount()
    {
        $this->loadFolders();
    }

    #[On('folder-created')]
    public function loadFolders()
    {
        $this->folders = Folder::where('tenan_id', Auth::user()->customer->id)->where('parent_id', null)->get();
    }
}
