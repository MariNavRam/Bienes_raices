<?php

namespace App\Http\Controllers;

use App\Mail\contactonot;
use Illuminate\Http\Request;
use App\Models\Casas;
use App\Models\Category;
use App\Models\Clasification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Manager;
use Illuminate\Html\FormFacade;
use Illuminate\Html\HtmlFacade;

class CasaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function _construct(){
         $this->middleware('auth');
     }
    public function index(Request $request)


    {
        $request->user()->authorizeRoles('admin');
        $casas = Casas::all();
        $casas = Casas::with('clasificacion','categorias')->paginate(20);
        return view('casas.index', compact('casas'));
    }
    public function dashboard(Request $request)


    {
        $casas = Casas::with('clasificacion','categorias')->paginate(20);
        return view('anuncios', compact('casas'));
    }
    public function anuncio($id)
    {
        $casa = Casas::where('id',$id)->first();
        $categories = Category::all();
        $clasifications= Clasification::all();

        return view('anuncio', compact('casa','categories', 'clasifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $clasifications= Clasification::all();

        return view('casas.crear', compact('categories', 'clasifications'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'nombre'=> 'required',
            'imagen' => 'required|image|mimes:jpeg,png,svg|max:1024',
            'descripcion'=>'required',
            'categories'=>'required',
           'id_clasificacion'=>'required',
            'precio'=>'required|max:10',

        ]);
        //$casa = $request->all();
        $casa=new Casas();
         if($imagen = $request->file('imagen')) {
             $rutaGuardarImg = '../public/assents/img/';
             $imagenCasa = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
             $imagen->move($rutaGuardarImg, $imagenCasa);
             $casa['imagen'] = "$imagenCasa";
         }
        //dd($request);
        $casa->nombre=$request->nombre;
        $casa->descripcion=$request->descripcion;
        $casa->precio=$request->precio;
        $casa->id_clasificacion=$request->id_clasificacion;
        $casa->save();



         //$casa = Casas::where('nombre', $request->nombre);
        $casa->categorias()->attach($request->categories);
        // $casa->clasificaciones()->attach($request->clasifications);
        $request->session()->flash('alert-success', 'Creada con exito!!');

         return redirect()->route('casas.index');
         //$request->session()->flash('alert-success', 'Creada con exito!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Casas $casa)
    {
        $categories = Category::all();
        $clasifications= Clasification::all();

        return view('casas.editar', compact('casa','categories', 'clasifications'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Casas $casa)
    {
        //dd($request);
        $request->validate([
            'nombre'=> 'required',
            //'imagen' => 'required|image|mimes:jpeg,png,svg|max:1024',
            'descripcion'=>'required',
            'categories'=>'required',
           'id_clasificacion'=>'required',
            'precio'=>'required|max:10',

        ]);
        //$casa = $request->all();
         if($imagen = $request->file('imagen')) {
             $rutaGuardarImg = '../public/assents/img/';
             $imagenCasa = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
             $imagen->move($rutaGuardarImg, $imagenCasa);
             $casa['imagen'] = "$imagenCasa";
         }
        //dd($request);
        $casa->nombre=$request->nombre;
        $casa->descripcion=$request->descripcion;
        $casa->precio=$request->precio;
        $casa->id_clasificacion=$request->id_clasificacion;
        $casa->save();
         //$casa = Casas::where('nombre', $request->nombre);
        $casa->categorias()->detach();
        $casa->categorias()->attach($request->categories);
        // $casa->clasificaciones()->attach($request->clasifications);
         return redirect()->route('casas.index');
        // $request->validate([
        //     'nombre' => 'required', 'descripcion' => 'required', 'categoria'=>'required',
        //     'clasificacion'=>'required','precio'=>'required'
        // ]);
        //  $cas = $request->all();
        //  if($imagen = $request->file('imagen')){
        //     $rutaGuardarImg = '../assents/img/';
        //     $imagenCasa = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
        //     $imagen->move($rutaGuardarImg, $imagenCasa);
        //     $cas['imagen'] = "$imagenCasa";
        //  }else{
        //     unset($cas['imagen']);
        //  }
        //  $casa->update($cas);
        //  return redirect()->route('casas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Casas $casa)
    {
        $casa->delete();
        return redirect()->route('casas.index');
    }

    public function notificar()
    {
        Mail::to(\Auth::user()->email)->send(new contactonot ());
        return redirect()->back;
    }
}
