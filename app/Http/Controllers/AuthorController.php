<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;


class AuthorController extends Controller
{
    // public function index()
    // {
    //     $items = DB::select('select * from authors');
    //     return view('index', ['items' => $items]);
    // }
    // public function add(){
    //     return view("add");
    // }
    // public function create(Request $request){
    //     $param=[
    //         "name"=>$request->name,
    //         "age"=>$request->age,
    //         "nationality"=>$request->nationality,
    //     ];
    //     DB::insert('insert into authors (name, age, nationality) values (:name, :age, :nationality)', $param);
    //     return redirect("/");
    //     }
    // public function edit(Request $request)
    // {
    //     $param = ['id' => $request->id];
    //     $item = DB::select('select * from authors where id = :id', $param);
    //     return view('edit', ['form' => $item[0]]);
    // }
    // public function update(Request $request)
    // {
    //     $param = [
    //         'id' => $request->id,
    //         'name' => $request->name,
    //         'age' => $request->age,
    //         'nationality' => $request->nationality,
    //     ];
    //     DB::update('update authors set name =:name, age =:age, nationality =:nationality where id =:id', $param);
    //     return redirect('/');
    // }
    // public function delete(Request $request)
    // {
    //     $param = ['id' => $request->id];
    //     $item = DB::select('select * from authors where id = :id', $param);
    //     return view('delete', ['form' => $item[0]]);
    // }
    // public function remove(Request $request)
    // {
    //     $param = ['id' => $request->id];
    //     DB::delete('delete from authors where id =:id', $param);
    //     return redirect('/');
    // }
    // DBクラスの記述

    public function index(){
        $items=Author::Paginate(4);
        return view("index",["items"=>$items]);
    }
    public function find(){
        return view("find",["input"=>""]);
    }
    public function search(Request $request){
        $item=Author::where("name","LIKE","%{$request->input}%")->first();
        $param=[
            "item"=>$item,
            "input"=>$request->input,
        ];
        return view("find",$param);
    }
    public function add(){
        return view("add");
    }
    public function create(Request $request){
        $this->validate($request,Author::$rules);
        $form=$request->all();
        Author::create($form);
        return redirect("/");
    }
    public function edit(Request $request){
        $author=Author::find($request->id);
        return view("edit",["form"=>$author]);
    }
    public function update(Request $request){
        $this->validate($request,Author::$rules);
        $form=$request->all();
        unset($form["_token"]);
        Author::where('id', $request->id)->update($form);
        return redirect("/");
    }
    public function delete(Request $request){
        $author=Author::find($request->id);
        return view("delete",["form"=>$author]);
    }
    public function remove(Request $request){
        Author::find($request->id)->delete();
        return redirect("/");
    }
    
    // 下記リレーションの追記
    public function relate(Request $request){
        $items=Author::all();
        return view("author.index",["items"=>$items]);
    }

}
