<?php

use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductsImport;
use App\Http\Controllers\ProductController;

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

    return view('product/index', [
        'products' => App\Models\ProductFile::all()
    ]);
});
Route::get('/progress-bar', function () {

    ini_set('max_execution_time', 0);

    if (empty(session('i'))) {
        session(['i' => 0]);
    }
    $total = session('total');
    $factor = $total / 100;
    for ($i = 0; $i <= 100; $i++) {
        session(['i' => $i]);
        $percent = intval($i * $factor / $total * 100) . "%";
        usleep(1000 * $factor);

        echo '<script>
    parent.document.getElementById("progressbar").innerHTML="<div style=\"width:' . $percent . ';background:linear-gradient(to bottom, rgba(125,126,125,1) 0%,rgba(14,14,14,1) 100%); ;height:35px;\">&nbsp;</div>";
    parent.document.getElementById("information").innerHTML="<div style=\"text-align:center; font-weight:bold\">' . $percent . ' is processed.</div>";</script>';

        ob_flush();
        flush();
    }
    echo '<script>parent.document.getElementById("information").innerHTML="<div style=\"text-align:center; font-weight:bold\">Process completed</div>"</script>';

    session_destroy();
});
Route::post('import', function () {
    Excel::import(new ProductsImport, request()->file('file'));
    return redirect()->back()->with('success', 'Data Imported Successfully');
});
Route::post('products-import', [ProductController::class, 'import'])->name('products.import.store');