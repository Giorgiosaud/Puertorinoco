<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Variable;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class VariablesAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $variables = Variable::all();
        $variablesTableStyle = [];
        foreach ($variables as $variable) {
            $array = [
                'Id'        => $variable->id,
                'Nombre'=>$variable->nombre,
                'Valor'    => $variable->valor,
            ];
            $variablesTableStyle[]=$array;
        }
        return view('variables.admin.all', compact('variablesTableStyle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('variables.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Variable::create($request->all());
        return redirect()->route('PanelAdministrativo.variables.index');
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
        $variable = Variable::findOrFail($id);

        return view('variables.admin.edit', compact('variable'));

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
        $variable = Variable::find($id);
        $variable->fill($request->all());
        $variable->save();
        return redirect()->route('PanelAdministrativo.variables.index');   
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
