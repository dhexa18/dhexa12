<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengaduan = pengaduan::all();
        return view('pengaduan.index')->with('pengaduan',$pengaduan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengaduan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $request->validate([
                'user_id' => ['required'],
                'tgl_pengaduan' => ['required'],
                'isi_laporan' => ['required', 'string'],
                'foto.*' =>'mimes:jpg,png,jpeg,gif,svg|max:2048',
   
   
            ]);


           $pengaduan = new Pengaduan();    
           $pengaduan->user_id= Auth::user()->id;
           $pengaduan->tgl_pengaduan= $request->tgl_pengaduan;
           $pengaduan->isi_laporan = $request->isi_laporan;
           $pengaduan->save();
           if($request->hasfile('foto'))
           { 
               foreach($request->file('foto') as $filefoto){
                   $fileasli = $filefoto->getClientOriginalName();
                   $uploadfoto =$filefoto->move(public_path().'/Foto_pengaduan/',$fileasli);
                   $foto= new Foto_pengaduan();
                   $foto->pengaduan_id = $pengaduan->id;
                   $foto->foto= $fileasli;
                   $foto->save();
               }
           }
           return redirect('pengaduan')->with('status','pengaduan Berhasil ditambahkan');
   

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengaduan = Pengaduan::find($id);
        $pengaduan->delete();

        return redirect()->back()->with('success','Pengaduan Berhasil Dihapus')
    }
}
