<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Menu;

class MenuController extends Controller
{
    public function create(){
        return view('createmenu');
    }

    public function store(Request $request){
    $this->validate($request, [
        'name' => 'required',
        'price' => 'required|numeric'
    ]);
    $menu = new Menu();
    $menu->name = $request->get('name');
    $menu->price = $request->get('price');
    $menu->status = $request->get('status');
    $menu->save();
    return response()->json(['success'=>'Data is successfully added']);

    }

    public function index(){
        $menus = Menu::all();
        return view('menu', compact('menus'));
    }

    public function edit($id){
        $menu = Menu::find($id);
        return view('editmenu', compact('menu','id'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required|numeric'
        ]);
        $menu = Menu::find($id);
        $menu->name = $request->get('name');
        $menu->price = $request->get('price');
        $menu->status = $request->get('status');
        $menu->save();
        return response()->json(['success'=>'Data is successfully updated']);
    }

    public function destroy($id){
        $menu = Menu::find($id);
        $menu->delete();
        return redirect('menu')->with('success','Menu has been  deleted');
    }
    //
}
