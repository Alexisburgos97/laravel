<?php

namespace App\Http\Controllers;

use App\Http\Requests\Techinician\CreateRequest;
use App\Models\User;
use App\Services\Technicians;
use App\Traits\UploadImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TechnicianController extends Controller
{

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
        $technician->password = Hash::make($request->password);

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
        //
    }
}
