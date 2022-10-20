<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\updatePassword;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Profile\updatePersonalData;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    public function index()
    {
        return view('profile.index');
    }

    public function editPersonalData()
    {
        return view('profile.edit_personal_data');
    }

    public function editPassword()
    {
        return view('profile.edit_password');
    }

    public function updatePersonalData(updatePersonalData $request)
    {
        $file = $request->file('avatar');

        if( !is_null($file) ) {

            $extension = strtolower($file->getClientOriginalExtension());

            $new_name = uniqid(rand(), true) . '.' . $extension;

            $result = Storage::disk('public')->put('avatars/'.$new_name, File::get($file));

            if( $result ){

                if( Storage::disk('public')->exists('avatars/'.auth()->user()->avatar) ){
                    Storage::disk('public')->delete('avatars/'.auth()->user()->avatar);
                }

                auth()->user()->avatar = $new_name;

            }else{

                $request->session()->flash('file_error', 'Ha ocurrido un error al subir la imagen');
                return redirect()->route('profile.edit_personal_data');

            }

        }else{
            auth()->user()->avatar = 'default';
        }

        auth()->user()->fill($request->all());
        auth()->user()->save();

        $request->session()->flash('message', 'Datos actualizados correctamente');

        return redirect()->route('profile.index');
    }

    public function updatePassword(updatePassword $request)
    {
        auth()->user()->password = Hash::make($request->password);
        auth()->user()->save();

        $request->session()->flash('message', 'Contraseña actualizada correctamente');

        return redirect()->route('profile.index');
    }

}
