<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('perfil.index');
    }

    public function store(Request $request)
    {
        $request->request->add(['username' => Str::slug($request->username)]);

        $this->validate($request, [
            'username' => ['required', 'unique:users,username,' . auth()->user()->id, 'min:3', 'max:20', 'not_in:twitter,editar-perfil,post,posts'],
            'email' => ['required', 'email', 'unique:users,email,' . auth()->user()->id, 'max:60']
        ]);

        $usuario = User::find(auth()->user()->id);
        $usuario->username = $request->username;

        if ($request->imagen) {
            $imagen = $request->file('imagen');
            $nombreImagen = Str::uuid() . "." . $imagen->extension();
    
            $imagenServidor = Image::make($imagen);
            $imagenServidor->fit(1000,1000);
    
            $imagenPath = public_path('perfiles') . '/' . $nombreImagen;
            $imagenServidor->save($imagenPath);

            $usuario->imagen = $nombreImagen ?? '';
        }

        if ($request->password || $request->oldpassword || $request->password_confirmation) {
            $this->validate($request,[
                'oldpassword' => ['required', function($attribute, $value, $fail) {
                    if (!Hash::check($value, auth()->user()->password)) {
                        $fail(_("Old password didn't match"));
                    }
                }],
                'password' => ['required','confirmed','min:3'],
            ]);

            $usuario->password = Hash::make($request->password);

        }


        $usuario->save();

        return redirect()->route('posts.index', $usuario->username);

    }
}
