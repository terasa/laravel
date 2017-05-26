<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Storage;

class AddProductController extends Controller {

    public function __construct() {
        $this->middleware('auth:admin');
    }

    public function showAddProduct() {
        return view('forms.add-product');
    }

    public function addProduct(Request $request) {
        // Validate the form data
        $this->validate($request, [
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        DB::table('products')->insert(
                ['name' => $request->input('name'), 'start_date' => $request->input('start_date'), 'end_date' => $request->input('end_date')]
        );

        /*$file = $request->file('primary_image');
        $filename = $request['name'] .*/
        /*
        $path = $request->primary_image->storeAs('images', 'halloooooooooooo.jpg');
        */
        /*Storage::put(
                '/hallo', file_get_contents($request->file('primary_image')->getRealPath())
        );*/

        return redirect()->back()->withInput($request->input());
    }

}
