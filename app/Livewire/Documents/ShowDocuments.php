<?php

namespace App\Livewire\Documents;

use App\Models\Documents\File;
use App\Models\Documents\Folder;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class ShowDocuments extends Component
{
    public $folders;
    public $files;
    public $currentFolderID = null;
    public $currentPath = [];

    public function render()
    {
        return view('livewire.documents.show-documents');
    }
    
    public function mount()
    {
        $this->updateView();
    }

    #[On('folder-created')]
    public function loadFolders()
    {
        $this->folders = Folder::where('tenan_id', Auth::user()->customer->id)->where('parent_id', $this->currentFolderID)->get();
    }
    
    #[On('file-uploaded')]
    public function loadFiles()
    {
        $this->files = File::where('tenan_id', Auth::user()->customer->id)->where('folder_id', $this->currentFolderID)->get();
    }

    public function openFolder(Folder $folder = null)
    {
        $this->currentFolderID = $folder->id;
        $this->updatePath($folder);
        $this->updateView();
    }

    public function updatePath(Folder $folder)
    {
        if ($folder->id == null) {
            $this->currentPath = [];
            return;
        }
        
        if (array_key_exists($folder->id, $this->currentPath)) {
            foreach($this->currentPath as $key => $path) {
                $deleteRemaining = false;
                if ($deleteRemaining) {
                    unset($this->currentPath[$key]);
                }
                if ($key == $folder->id) {
                    $deleteRemaining = true;
                }
            }
            unset($this->currentPath[$folder->id]);
        }
        $this->currentPath[$folder->id] = $folder->folder_name;
    }

    public function updateView()
    {
        $this->loadFolders();
        $this->loadFiles();
    }
}
