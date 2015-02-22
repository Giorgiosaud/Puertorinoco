<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\VariablesRequest;
use App\Variable;

class VariablesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $variables = Variable::all();
        $valores_de_tabla = [];
        foreach ($variables as $v)
        {
            array_push($valores_de_tabla, ['Nombre de Variable' => '<a href="variables/' . $v->id . '/edit">' . $v->nombre
                . '</a>',
                                           'Valor'              => $v->valor]);
        }

        return view('variables.all', compact('variables', 'valores_de_tabla'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('variables.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(VariablesRequest $request)
    {
        if ($request->file('imagen'))
        {
            $archivo = $request->file('imagen');
            $destinationPath = 'uploads';
            $extension = $archivo->getClientOriginalExtension();
            $name = $request->input('Nombre') . '.' . $extension;
            $archivo->move($destinationPath, $name);
            $valor = $destinationPath . '/' . $name;
            $nombre = $request->input('Nombre');
        } else
        {
            $valor = $request->input('Valor');
            $nombre = $request->input('Nombre');
        }
        Variable::create(array('nombre' => $nombre, 'valor' => $valor));

        return redirect('variables');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
