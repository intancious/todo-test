<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        //uji api
        // $data = Produk::all();
        $data = Todo::getTodo()->paginate(5);
        return response()->json($data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama_todo' => 'required',
            'status' => 'required',
        ]);
        try {
            $response = Todo::create($validasi);
            return response()->json([
                'success' => true,
                'message' => 'success',
                'data' => $response
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Err',
                'errors' => array(
                    'file' => [$e->getMessage()]
                )
            ]);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = Todo::find($id);
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            'nama_todo' => 'required',
            'status' => 'required',
        ]);
        try {
            // ! sebelum update cari/temukan dulu data yang akan diedit by id
            $response = Todo::find($id);
            $response->update($validasi);
            return response()->json([
                'success' => true,
                'message' => 'success',
                'data' => $response
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Err',
                'errors' => array(
                    'file' => [$e->getMessage()]
                )
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $todo = Todo::find($id);
            $todo->delete();
            return response()->json([
                'success' => true,
                'message' => 'Success'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Err',
                'errors' => $e->getMessage()
            ]);
        }
    }
}
