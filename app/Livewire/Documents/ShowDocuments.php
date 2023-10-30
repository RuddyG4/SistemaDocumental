<?php

namespace App\Livewire\Documents;

use App\Models\Documents\File;
use App\Models\Documents\Folder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;

class ShowDocuments extends Component
{
    public $folders, $files;
    public $currentFolderID = null;
    public $currentPath = [];
    public $folder_name, $description, $edit_folder_id;



    public function mount()
    {
        $this->loadView();
    }
    public function render()
    {
        return view('livewire.documents.show-documents');
    }
    /**
     * Load the folders associated with the current user's tenant and parent folder.
     *
     * @return void
     */
    #[On('folder-created')]
    #[On('folder-updated')]
    public function loadFolders()
    {
        $this->folders = Folder::with('user')->where('tenan_id', Auth::user()->tenan_id)->where('parent_id', $this->currentFolderID)->get();
        // dd($this->folders);
    }

    #[On('file-uploaded')]
    public function loadFiles()
    {
        $this->files = File::where('tenan_id', Auth::user()->tenan_id)->where('folder_id', $this->currentFolderID)->get();
    }

    public function openFolder(Folder $folder = null)
    {
        $this->currentFolderID = $folder->id;
        $this->updatePath($folder);
        $this->loadView();
    }

    public function updatePath(Folder $folder)
    {
        if ($folder->id == null) {
            $this->currentPath = [];
            return;
        }

        if (array_key_exists($folder->id, $this->currentPath)) {
            $deleteRemaining = false;
            foreach ($this->currentPath as $key => $path) {
                if ($deleteRemaining) {
                    unset($this->currentPath[$key]);
                } elseif ($key == $folder->id) {
                    $deleteRemaining = true;
                }
            }
            unset($this->currentPath[$folder->id]);
        }
        $this->currentPath[$folder->id] = $folder->folder_name;
    }

    /**
     * Updates the view by loading folders and files.
     *
     * @return void
     */
    public function loadView()
    {
        $this->loadFolders();
        $this->loadFiles();
    }

    public function downloadFolder(Folder $folder)
    {
        //
    }

    public function editFolder(Folder $folder)
    {
        $this->edit_folder_id = $folder->id;
        $this->folder_name = $folder->folder_name;
        $this->description = $folder->description;
    }

    public function updateFolder()
    {
        $data = $this->validate([
            'folder_name' => 'required|max:60',
            'description' => 'required|max:255',
        ]);
        
        $folder = Folder::find($this->edit_folder_id);
        $folder->update($data);

        $this->dispatch('folder-updated');
        $this->reset('edit_folder_id', 'folder_name', 'description');
    }

    public function downloadFile(File $file)
    {
        return Storage::download($file->file_path);
    }

    public function cancel()
    {
        $this->reset('edit_folder_id', 'folder_name', 'description');
    }
}
