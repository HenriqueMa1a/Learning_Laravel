<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get(); // ou ::all
        return view('users.index', compact('users'));
    }
    public function show($id)
    {

        // $user = User::where('id', '=', $id)->first(); //poderia passar sem o valor de comparação
        if(!$user = User::find($id))
            return redirect()-> route('users.index');              //back();  volta de onde veio

        return view('users.show', compact('user'));
    }
    public function create()
    {

        return view('users.create');
    }
    public function store(StoreUpdateUserFormRequest $request)
    {
        $data =$request->all();
        $data['password'] = bcrypt($request->password);

        $user = User::create($data);

        // return redirect()->route('users.show', $user->id;
        return redirect()->route('users.index');

        // $user = new User(); não recomendavel
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = $request->password;
        // $user->save();

    }
    public function edit($id)
    {
        if(!$user = User::find($id))
        return redirect()-> route('users.index');

        return view('users.edit', compact('user'));
    }
    public function update(StoreUpdateUserFormRequest $request, $id)
    {
        if(!$user = User::find($id))
        return redirect()-> route('users.index');

        $data = $request->only('name', 'email');
        if($request->password)
            $data['password'] = bcrypt($request->password);

        $user->update($data); // retorna true or false

        return redirect()->route('users.index');
    }
    public function destroy($id)
    {

        // $user = User::where('id', '=', $id)->first(); //poderia passar sem o valor de comparação
        if(!$user = User::find($id))
            return redirect()-> route('users.index');              //back();  volta de onde veio

        $user->delete();
            return redirect()->route('users.index');
    }
}
