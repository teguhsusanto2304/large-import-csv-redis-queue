<?php

namespace App\Http\Controllers;

use App\Jobs\ProductCSVData;
use App\Models\ProductFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function import(Request $request)
    {
        ini_set('max_execution_time', 0);
        if ($request->has('csv')) {
            $file = $request->file('csv');
            $fileName = $file->getClientOriginalName();
            $product_file = ProductFile::create([
                'file_name' => $fileName,
                'import_status' => 'pending'
            ]);
            $csv = file($request->csv);
            session(['total' => count($csv)]);
            $chunks = array_chunk($csv, 1000);
            $header = [];
            $batch = Bus::batch([])->dispatch();

            foreach ($chunks as $key => $chunk) {
                $data = array_map('str_getcsv', $chunk);
                if ($key == 0) {
                    $header = $data[0];
                    unset($data[0]);
                }
                $batch->add(new ProductCSVData($data, $header, $product_file->id));
            }
            $prd_file = ProductFile::find($product_file->id);
            $prd_file->import_status = "completed";
            $prd_file->update();

            return redirect('/')->with('success', 'CSV Import added on queue. will update you once done.');

        }
    }
}