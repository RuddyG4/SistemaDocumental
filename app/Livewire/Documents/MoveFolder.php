<?php

namespace App\Livewire\Documents;

use App\Models\Documents\File;
use Livewire\Component;
use App\Models\Documents\Folder;
use Illuminate\Support\Facades\Auth;

class MoveFolder extends Component
{
    public $folders;
    public $currentPath = [];
    public $currentFolderID = null;
    public $fileID;

    public function render()
    {

        return view('livewire.documents.move-folder');
    }

    public function cancelar()
    {
        $this->dispatch('close-modal');
    }
    /**
     * Load the folders associated with the current user's tenant and parent folder.
     *
     * @return void
     */
    public function loadFolders()
    {
        $this->folders = Folder::where('tenan_id', Auth::user()->tenan_id)->where('parent_id', $this->currentFolderID)->get();
        // dd($this->folders);
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
    }
    public function saveHere()
    {
        File::find($this->fileID)->update([
            'folder_id' => $this->currentFolderID
        ]);
        return redirect()->route('documents.index');
    }
}
