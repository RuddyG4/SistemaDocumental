<?php

namespace App\Livewire\Documents;

use App\Models\Documents\File;
use App\Models\Documents\VersionHistory;
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
        $file = File::create([
            'file_name' => $this->file->getClientOriginalName(),
            'file_path' => $path,
            'file_ext' => $this->file->getClientOriginalExtension(),
            'file_size' => $this->file->getSize(),
            'folder_id' => $this->currentFolderID,
            'tenan_id' => auth()->user()->customer->id,
            'user_id' => auth()->user()->id,
            'estado_file_id' => 1
        ]);
        VersionHistory::create([
            'version_date' => now(),
            'path' => $path,
            'user_id' => auth()->user()->id,
            'name_user' => auth()->user()->username,
            'file_id' => $file->id,
            'tenan_id' => auth()->user()->tenan_id,
            'version' => 1
        ]);
        $this->dispatch('file-uploaded');
        $this->dispatch('close-upload-file-modal');
    }
    public function cancel()
    {
    }
}
