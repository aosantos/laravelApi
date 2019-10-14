<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pastel;
use App\Http\Requests\StoreUpdatePastelFormRequest;
use Illuminate\Support\Facades\Storage;
class PastelController extends Controller
{
    private $pastel, $totalPage = 10;
    private $path = 'pastel';

    public function __construct(Pastel $pastel)
    {
        $this->pastel = $pastel;
    }
    public function index(Request $request)
    {
        $pastel = $this->pastel->getResults($request->all(), $this->totalPage);
        return response()->json($pastel);
    }


    public function store(StoreUpdatePastelFormRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $name        = $request->nome;
            $extension   = $request->foto->extension();

            $nameFile     = "{$name}.{$extension}";
            $data['foto'] = $nameFile;

            $upload = $request->foto->storeAs($this->path, $nameFile);

            if (!$upload) {
                return response()->json(['error' => 'Fail_Upload'], 500);
            }
        }

        $pastel = $this->pastel->create($data);

        return response()->json($pastel, 201);
    }


    public function show($id)
    {
        if (!$pastel = $this->pastel->find($id)) :
            return response()->json(['error' => 'Not Found'], 404);
        endif;
        $pastel = $this->pastel->find($id);
        return response()->json($pastel);
    }

    public function update(StoreUpdatePastelFormRequest $request, $id)
    {
        if (!$pastel = $this->pastel->find($id)) {
            return response()->json(['error' => 'Not Found'], 404);
        }

        $data = $request->all();

        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            if ($pastel->foto) {
                if (Storage::exists("{$this->path}/{$pastel->foto}")) {
                    Storage::delete("{$this->path}/{$pastel->foto}");
                }
            }

            $name = $request->nome;
            $extension = $request->foto->extension();

            $nameFile = "{$name}.{$extension}";
            $data['foto'] = $nameFile;

            $upload = $request->foto->storeAs($this->path, $nameFile);

            if (!$upload) {
                return response()->json(['error' => 'Fail_Upload'], 500);
            }
        }

        $pastel->update($data);

        return response()->json($pastel);
    }

    public function destroy($id)
    {
        if (!$pastel = $this->pastel->find($id)) {
            return response()->json(['error' => 'Not Found'], 404);
        }

        if ($pastel->image) {
            if (Storage::exists("{$this->path}/{$pastel->image}"))
                Storage::delete("{$this->path}/{$pastel->image}");
        }

        $pastel->delete();

        return response()->json(['success' => true], 204);
    }
}

