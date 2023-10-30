<?php

namespace App\Http\Controllers\Documents;

use App\Http\Controllers\Controller;
use App\Models\Documents\File;
use App\Models\Documents\VersionHistory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
class FolderController extends Controller
{
    use WithFileUploads;

    public $file;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('documents.folders.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $file = File::find($id);
        $rutaDocumento = $file->file_path;
        if (Storage::exists($rutaDocumento)) {
            $existe = true;
        } else {
            $existe = false;
        }
        $extension = pathinfo($file->file_name, PATHINFO_EXTENSION);
        $pila_archivos = new Collection();
        $lista_archivos = new Collection();
        $pila_archivos->push($file);
        $lista_archivos->push($file);

        //! tener cuidado con el ciclo infinito
        while (count($pila_archivos)!=0) {
            $aux = $pila_archivos->pop();
            $version_anterior = $aux->version_history->version_anterior;
            if (isset($version_anterior)) {
                $file_aux = File::find($version_anterior->file_id);
                $pila_archivos->push($file_aux);
                $lista_archivos->push($file_aux);
            }
        }
        return view('livewire.documents.files.show-file', compact('id', 'rutaDocumento','file','extension','lista_archivos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    /**
     * ? Recibe el nuevo documento y lo registra, ademas edita el documento anterior para que no sea el actual
     */
    public function actualizarVerionDelDocumento(Request $request){
        $this->file = $request->archivo;

        if ($request->hasFile('archivo')) {
            $path = $this->file->store('documents');
            $id_file_antiguo = $request->id_file_antiguo;
            $file_antiguo = File::find($id_file_antiguo);
            $file_nuevo = new File();
            $file_nuevo->file_name = $this->file->getClientOriginalName();
            $file_nuevo->file_path = $path;
            $file_nuevo->folder_id = $file_antiguo->folder_id;
            $file_nuevo->tenan_id = auth()->user()->tenan_id;
            $file_nuevo->save();
            $file_antiguo->folder_id = -1;
            $file_antiguo->save();

            VersionHistory::create([
                'version_date' => now(),
                'path' => $path,
                'user_id' => auth()->user()->id,
                'name_user' => auth()->user()->username,
                'file_id' => $file_nuevo->id,
                'tenan_id' => auth()->user()->tenan_id,
                'version_anterior_id' => $file_antiguo->version_history->id,
                'version' => $file_antiguo->version_history->version + 1,
            ]);
        }
        return redirect()->route('view.document', $file_nuevo->id);
    }
    public function preVisualizacion(string $id){
        $file = File::find($id);
        $rutaDocumento = $file->file_path;
        $file = Storage::disk('public')->get($rutaDocumento);
        return response($file, 200, ['Content-Type' => 'application/pdf']);
    }
    public function showHistoryVersion($id){
        $file = File::find($id);
        $pila_archivos = new Collection();
        $lista_archivos = new Collection();
        $pila_archivos->push($file);
        $lista_archivos->push($file);

        //! tener cuidado con el ciclo infinito
        while (count($pila_archivos)!=0) {
            $aux = $pila_archivos->pop();
            $version_anterior = $aux->version_history->version_anterior;
            if (isset($version_anterior)) {
                $file_aux = File::find($version_anterior->file_id);
                $pila_archivos->push($file_aux);
                $lista_archivos->push($file_aux);
            }
        }
        return view('livewire.documents.files.show-file-history-versions', compact('id','lista_archivos'));
    }
    public function deleteDocument($id){
        $file = File::find($id);
        $file->delete();
        return redirect()->route('documents.index');
    }
    public function indexSearchDocument(){
        $resultados = [];
        return view('livewire.documents.files.search-file',compact('resultados'));
    }
    public function searchDocumentBy(Request $request){
        $request->validate([
            'tipo_busqueda' => ['required'],
            'texto_a_buscar' => ['required'],
        ]);
        $search = $request->texto_a_buscar;

        if ($request->tipo_busqueda == 0) {
            $resultados = File::where('file_name','like','%'.$search.'%')
                                ->where('folder_id','!=',-1)
                                ->get();
        }else{
            $resultados = [];
        }
        return view('livewire.documents.files.search-file',compact('resultados'));
    }
}
