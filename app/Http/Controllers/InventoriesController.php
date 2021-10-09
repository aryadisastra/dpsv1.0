<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\MobilAttachment;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;

class InventoriesController extends Controller
{
    public function index()
    {
        if(session('user'))
        {
            $current = 'inventories';
            $prod_data = Mobil::all();
            $data = Menu::where('status',1)->get();
            
            return view('inventories.inventories',
                [
                'prod_data' => $prod_data,
                'current' => $current,   
                'data' => $data,   
                ]);
        }
        else {
            return redirect('/');
        }
        
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(session('user'))
        {
            $current = 'inventories';
            $data = Menu::where('status',1)->get();
            return view('inventories.inventories_create',[
                'current' => $current, 
                'data' => $data, 
            ]);
            
        }else {
            return redirect('/');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(session('user'))
        {
            $rules =[

                'nama_mobil' => 'required',
                'merk_mobil' => 'required',
                'harga' => 'required',
                'stok' => 'required',
            ];

            $messages =  [
                    'nama_mobil.required' => 'Nama Mobil tidak boleh kosong',
                    'stok.required' => 'Stok tidak boleh kosong',
                    'merk_mobil.required' => 'Merk tidak boleh kosong',
                    'harga.required' => 'Harga tidak boleh kosong',
            ];
            $this->validate($request, $rules, $messages);

            try {
                DB::beginTransaction();
                $newData = new Mobil();
                $newData->nama_mobil = $request->nama_mobil;
                $newData->jenis_mobil = $request ->jenis_mobil;
                $newData->merk_mobil = $request ->merk_mobil;
                $newData->nominal = $request ->harga;
                $newData->stok = $request ->stok;
                $newData->status = 1;
                $newData->rec_creator = session('user')['userName'];
                $newData->rec_editor = session('user')['userName'];
                $newData->save();
                
                $files = $request->file('attachments');
                if($request->hasFile('attachments')){
                    foreach ($files as $file) {
                        $filename = $file->getClientOriginalName();
                        $imageExt =  $file->getClientOriginalExtension();
                        $newAttachments = new MobilAttachment();
                        $file_name_convert = $newAttachments->generateNameImages();
                        $images_true = $file_name_convert.'.'.$imageExt;

                        $custom_env = new \App\Http\Controllers\CustomEnvController();
                        $pushCustomEnv = $custom_env->moveMobilImage($file, $images_true);

                        if($pushCustomEnv !== false) {
                            $newAttachments->id_mobil = $newData->id_mobil;
                            $newAttachments->nama_file = $images_true;
                            $newAttachments->rec_creator = session('user')['userName'];
                            $newAttachments->editor = session('user')['userName'];
                            $newAttachments->save();
                        }
                    }
                }

                DB::commit();
                return redirect('/inventories');
            }
            catch (Exception $e) {
                DB::rollBack();
                return redirect('/inventories/create');
            }
        }else {
            return redirect('/');
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
        if(session('user')){
        $current = 'inventories';
        $data = Inventori::where('id_barang',$id)->first();
        return view('inventories.inventories_detail',
            [
                 'data' => $data,
                 'current' => $current,
            ]);

        }else {
            return redirect('/');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(session('user')){
        $current = 'inventories';
        $data = Inventori::where('id_barang',$id)->first();
        return view('inventories.inventories_edit',
            [
                'data' => $data,
                'current' => $current,
            ]);

        }else {
            return redirect('/');
        }
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
        if(session('user')){
        $request->flash();
        $data = Inventori::where('id_barang', $id)->first();
        $cekname = Inventori::where('kode_barang', $data->kode_barang)->first();
        if($request->kode_barang != $data->kode_barang){
            $this->validate($request,
            [
            'kode_barang' => 'required|max:6|unique:inventori,kode_barang',
            'nama_barang' => 'required',
            'harga_barang' => 'required',
            'material' => 'required',
            'stok' => 'required',
            ],
            [
            'kode_barang.required' => 'Kode tidak boleh kosong',
            'nama_barang.required' => 'Kode tidak boleh kosong',
            'stok.required' => 'Stok tidak boleh kosong',
            'kode_barang.max' => 'Kode tidak boleh lebih dari 6 Karakter',
            'kode_barang.unique' => 'Kode Sudah Ada',
            ]);
        }
        else{
            $this->validate($request,
            [
            'kode_barang' => 'required|max:6',
            'nama_barang' => 'required',
            'harga_barang' => 'required',
            'material' => 'required',
            'stok' => 'required',
            ],
            [
            'kode_barang.required' => 'Kode tidak boleh kosong',
            'nama_barang.required' => 'Kode tidak boleh kosong',
            'stok.required' => 'Stok tidak boleh kosong',
            'kode_barang.max' => 'Kode tidak boleh lebih dari 6 Karakter',
            ]);
        }
        if($data){
            try {
                DB::beginTransaction();
                $newProd = Inventori::find($id);
                $newProd->kode_barang = $request->kode_barang;
                $newProd->nama_barang = $request ->nama_barang;
                $newProd->harga_barang = $request ->harga_barang;
                $newProd->kategori_barang = $request ->kategori;
                $newProd->panjang_barang = $request ->panjang;
                $newProd->material_barang = $request ->material;
                $newProd->lebar_barang = $request ->lebar;
                $newProd->tinggi_barang = $request ->tinggi;
                $newProd->stock_barang = $request ->stok;
                $newProd->rec_editor = session('user')['userName'];
                $newProd->updated_at = now();
                $newProd->save();

                DB::commit();
                return redirect('/inventories/'.$id);
            }
            catch (Exception $e) {
                DB::rollBack();
                return redirect('/inventories/edit/'.$id);
            }
        }
        else {
            return redirect('/inventories/edit/'.$id);
        }

        }else {
            return redirect('/');
        }
    }
}
