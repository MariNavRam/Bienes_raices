<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::all();
        return view('files', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //if($request->hasFile('file') && $request->file('file')->isValid()){
            //fuardar los archivos en la carpeta storage.app.documentos
            $ruta=$request->file->store('documentos');

            //Crear el registro en tabla file
            $file= new File();
            $file->ruta=$ruta;
            $file->nombre_original= $request->file->getClientOriginalName();
            $file->mime=$request->file->getMimeType();
            $file->save();

        }
      //  return redirect()->route('file');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('file') && $request->file('file')->isValid()){
            //fuardar los archivos en la carpeta storage.app.documentos
            $ruta=$request->file->store('documentos');

            //Crear el registro en tabla file
            $file= new File();
            $file->ruta=$ruta;
            $file->nombre_original= $request->file->getClientOriginalName();
            $file->mime=$request->file->getMimeType();
            $file->save();

        }
        return redirect()->route('file');
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
    public function download(File $file)
    {
       // return Storage::download($file->ruta, $file->nombre_original, ['Content-Type'=>$file->mime]);
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
