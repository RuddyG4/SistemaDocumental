<?php

namespace App\Livewire\Documents;

use App\Models\Documents\File;
use Livewire\Attributes\Reactive;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadFile extends Component
{
    use WithFileUploads;

    public $file;
    #[Reactive]
    public $currentFolderID;

    public function render()
    {
        return view('livewire.documents.upload-file');
    }

    public function uploadFile()
    {
        $path = $this->file->store('documents');
        File::create([
            'file_name' => $this->file->getClientOriginalName(),
            'file_path' => $path,
            'folder_id' => $this->currentFolderID,
            'tenan_id' => auth()->user()->customer->id
        ]);

        $this->dispatch('file-uploaded');
        $this->dispatch('close-upload-file-modal');
    }

    public function cancel()
    {

    }
}
