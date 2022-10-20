<?php

namespace App\Http\Controllers;

use App\Http\Requests\Maintenance\CreateRequest;
use App\Http\Requests\Maintenance\updateRequest;
use App\Models\Maintenance;
use Illuminate\Http\Request;

class MaintenancesController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin')->except('index');
    }

    public function index(Request $request){
        //$maintenances = Maintenance::paginate(10);
        $maintenances = Maintenance::maintenancesFilter($request->maintenance_name);
        return view('maintenances.index')->with('maintenances', $maintenances);
    }

    public function create()
    {
        return view('maintenances.create_or_edit');
    }

    public function store(CreateRequest $request)
    {

        Maintenance::create($request->all());

        $request->session()->flash('message', 'Tipo de Mantenimiento ha sido agregado correctamente');

        return redirect()->route('maintenances.index');

    }

    public function edit($id)
    {
        $maintenances = Maintenance::find($id);

        if( is_null($maintenances) ){
            return redirect()->route('maintenances.index');
        }

        return view('maintenances.create_or_edit')->with('maintenances', $maintenances);
    }

    public function update(updateRequest $request, $id)
    {
        $maintenance = Maintenance::find($id);

        if( is_null($maintenance) ){
            return redirect()->route('maintenances.index');
        }

        $maintenance->update($request->all());

        $request->session()->flash('message', 'Tipo de mantenimiento ha sido actualizado correctamente');

        return redirect()->route('maintenances.index');
    }

    public function destroy(Request $request, $id)
    {

        if( $request->ajax() ){

            $maintenance = Maintenance::find($id);

            if( is_null($maintenance) )
            {
                return response()->json([
                    'status' => false,
                    'message' => 'Ha ocurrido un error, intente de nuevo más tarde'
                ]);
            }

            $maintenance->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tipo de Mantenimiento eliminado correctamente'
            ], 200);

        }

    }

}
