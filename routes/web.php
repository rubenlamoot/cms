<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/** invoegen van data in database via db insert */
Route::get('/insert',function(){
   DB::insert('insert into posts(title, content) values 
(?,?)', ['PHP LARAVEL', 'LARAVEL BEST PHP FRAMEWORK']);
});

/** lezen van data in database via db insert */

Route::get('/users', function(){
//   $users = DB::select('select * from users where id = ?',
//       [1]);
    $users = DB::select('select * from users');

        /** dd = datadump -> tonen van alle data in een array */
//    dd($users);

    echo count($users) . '<br>';
    foreach($users as $user){
       /** hier kan je de velden vanuit de class/tabel aanspreken */

       echo $user->name . ' '. $user->email . '<br>';
   }
});

/** data wijzigen */

Route::get('/users/update', function (){
    $users = DB::update('update users set email = "tester@gmail.com"
where id = ?', [1]);

//    return $users;
    return redirect('/users');
});

/** data deleten */
Route::get('/delete', function (){
   $deleteUser =DB::delete('delete from users where id = ?', [1]);
   return $deleteUser;
});
