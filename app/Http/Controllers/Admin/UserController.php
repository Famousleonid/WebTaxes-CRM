<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();

        return view('admin.user.index', compact('users'));

    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
        ]);

        if (isset($request->is_admin))
            $request->is_admin = 1;
        else {
            $request->is_admin = 0;
        }

        User::create($request->all());


        return redirect()->route('user.index')->with('success', 'Пользователь добавлен');
    }


    public function edit($id)
    {
        $user = User::find($id);

        $avatar = $user->getMedia('avatar')->first(); // ->getUrl('thumb');

        if (!$avatar) {
            $avatar = 0;
        }

        return view('admin.user.edit', compact('user', 'avatar'));

    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
//            'phone' => 'numeric|regex:/(01)[0-9]{9}/'      // |size:11
            'chat' => "unique:users,chat, $id"
        ]);

        ($request->has('is_admin')) ? $request->request->add(['is_admin' => 1]) : $request->request->add(['is_admin' => 0]);
        ($request->has('role')) ? $request->request->add(['role' => 1]) : $request->request->add(['role' => 0]);
        ($request->has('chat')) ? $request->request->add(['chat' => 1]) : $request->request->add(['chat' => 0]);

        $user = User::find($id);

        if ($request->chat) {
            if ($user->is_admin ) {
                $user->update($request->all());
                return redirect()->route('user.index')->with('success', 'Changes saved');
            }else{
                return redirect()->route('user.index')->with('error', 'Chat CAN only be conducted by Admin ');
            }
            }else{

                $user->update($request->all());
                return redirect()->route('user.index')->with('success', 'Changes saved');
            }
    }

    public function destroy($id)
    {

        User::destroy($id);

        return redirect()->route('user.index')->with('success', 'User deleted');
    }
}
