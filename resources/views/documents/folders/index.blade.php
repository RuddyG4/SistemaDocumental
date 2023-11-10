<x-app :$permissions>
    <x-slot:title>
        Documents
    </x-slot:title>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <livewire:documents.show-documents :$permissions />
            </div>
        </div>
    </div>

</x-app>