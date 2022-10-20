<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use App\Services\Technicians;
use App\Traits\UploadImage;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Techinician\CreateRequest;
use App\Http\Requests\Techinician\updateRequest;
use Illuminate\Support\Facades\Storage;

class TechnicianController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('admin');
//    }

    use UploadImage;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $technicians = User::technicianFilter($request->tech_data);
        return view('technicians.index', compact('technicians'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('technicians.create_or_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {

        $technician = new User();

        $file = $request->file('avatar');

        if( !is_null($file) ) {

            if( !$this->upload($file, $technician->id) ){
                $request->session()->flash('file_error', $this->error_message);
                return redirect()->route('technicians.create')->withInput();
            }

            $technician->avatar = $this->new_name;

        }else{

            $technician->avatar = 'default';

        }

        $technician->type = 2;
//        $technician->password = Hash::make($request->password);

        $technician->fill($request->all());
        $technician->save();

        $request->session()->flash('message', 'Técnico agregado correctamente');

        return redirect()->route('technicians.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $technician = User::find($id);

        if( is_null($technician) ){
            return redirect()->route('technicians.index');
        }

        return view('technicians.info')->with('technician', $technician);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $technicians = User::find($id);

        if( is_null($technicians) ){
            return redirect()->route('technicians.index', $technicians);
        }

        return view('technicians.create_or_edit')->with('technicians', $technicians);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(updateRequest $request, $id)
    {
        $technician = User::find($id);

        if( is_null($technician) ){
            return redirect()->route('technicians.index');
        }

        $file = $request->file('avatar');

        if( !is_null($file) ) {

            $extension = strtolower($file->getClientOriginalExtension());

            $new_name = uniqid(rand(), true) . '.' . $extension;

            $result = Storage::disk('public')->put('avatars/'.$new_name, File::get($file));

            if( $result ){

                if( Storage::disk('public')->exists('avatars/'.$technician->avatar) ){
                    Storage::disk('public')->delete('avatars/'.$technician->avatar);
                }

                $technician->avatar = $new_name;

            }else{

                $request->session()->flash('file_error', 'Ha ocurrido un error al subir la imagen');
                return redirect()->route('technicians.edit', [$technician] )->withInput();

            }

        }else{
            $technician->avatar = 'default';
        }

        $data = $request->all();
        if( is_null($request->password) ){
            $data = Arr::except($data, 'password');
        }

        $technician->fill($data);
        $technician->save();

        $request->session()->flash('message', 'Técnico ha si actualizado correctamente');

        return redirect()->route('technicians.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request, $id)
    {
        if( $request->ajax() ){

            $technician = User::find($id);

            if( is_null($technician) ){
                return response()->json([
                    'status' => FALSE,
                    'message' => 'Error, no se ha encontrado el cliente',
                ], 404);
            }

            if( Storage::disk('public')->exists('avatars/'.$technician->avatar) ){
                Storage::disk('public')->delete('avatars/'.$technician->avatar);
            }

            $technician->delete();

            return response()->json([
                'status' => TRUE,
                'message' => 'Técnico eliminado correctamente',
            ], 200);

        }

        return response()->json([
            'status' => FALSE,
            'message' => 'Error inesperado, intente de nuevo más tarde',
        ], 500);

    }

}
