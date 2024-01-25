<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    // $user = DB::select("select * from users where email = ?",['taimoor@mailinator.com']); --> selecting data from the users table

    // $user = DB::insert("insert into users(id,name,lastname,email,password) values (?,?,?,?,?)",[2,'Adeel','ahmed','adeel@mailinator.com','123123132']); -->inseritng data into a user

    // $user = DB::update("update users set name = 'Ali' where id = 1"); --> updating data into a user

    // $user = DB::delete('delete from users where id = :id',["id"=>2]);--> deleting a user
    // $users = DB::select("select * from users");


    // now we will run all the above crud operation but using the query builder
    // $user = DB::table('users')->where('id',2)->get(); ---> get all users using the where condition

    // $user = DB::table('users')->insert([
    //     "id"=>3,
    //     "name"=>"Asim",
    //     "lastname"=>"Rana",
    //     "email"=>"asim@mailinator.com",
    //     "password"=>"123123123"
    // ]); --> Inserting  a user into table using the query builder

    // $user = DB::table('users')->where('id',1)->delete();--> Deleting  a user from table using the query builder
    // $user = DB::table('users')->where('id',2)->update(['name'=>'Tahir']); --> updating  a user from table using the query builder
    
    // $user = DB::table('users')->get();

    // Performing crud using MODEL and eloquent ORM

    // $user = User::create([
    //     "id" => 4,
    //     "name" => "Lateef",
    //     "lastname" => "Khosa", 
    //     "email" => "lateef@mailinator.com",
    //     "password" => "123123123"
    // ]);

        // $user = User::where('id',2)->first(); 
    // $user = User::find(2); 
        // $user->update([
        //     "email" => "shafeeq@mailinator.com",
        //     "name" => "Jameel AHmed"
        // ]);

        // $user = User::create([
        //     "name" => 'Kashif',
        //     "lastname" => 'zameer',
        //     "email" => 'kashif@mailiniator.com',
        //     "password" => 'taimoor'
        // ]);

        $user = User::find(2);

    dd($user -> name);
    
});


Route::get('/home',function(){
    return view('home');
});