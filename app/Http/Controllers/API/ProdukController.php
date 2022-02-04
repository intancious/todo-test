<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use CreateProduksTable;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //uji api
        // $data = Produk::all();
        $data = Produk::getProduk()->paginate(5);
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama_produk' => 'required',
            'id_kategori' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|file|mimes:png,jpg',
        ]);
        try {
            $fileName = time() . $request->file('gambar')->getClientOriginalName();
            $path = $request->file('gambar')->storeAs('uploads/produks', $fileName);
            $validasi['gambar'] = $path;
            $response = Produk::create($validasi);
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            'nama_produk' => 'required',
            'id_kategori' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'gambar' => '',
        ]);
        try {
            if ($request->file('gambar')) {
                $fileName = time() . $request->file('gambar')->getClientOriginalName();
                $path = $request->file('gambar')->storeAs('uploads/produks', $fileName);
                $validasi['gambar'] = $path;
            }
            // ! sebelum update cari/temukan dulu data yang akan diedit by id
            $response = Produk::find($id);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
