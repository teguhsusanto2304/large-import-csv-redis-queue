<?php

namespace App\Jobs;

use App\Imports\ProductsImport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Bus\Batchable;
use App\Models\Product;

class ProductCSVData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, Batchable;

    public $header;
    public $data;

    /**
     * Create a new job instance.
     */
    public function __construct($data, $header, $file_id)
    {
        $this->data = $data;
        $this->header = $header;
        foreach ($this->data as $product) {
            $prd = new ProductsImport;
            $prd->setFileId($file_id);
            $prd->model($product);
        }

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach ($this->data as $product) {
            $productInput = array_combine($this->header, $product);
            Product::create($productInput);
        }
    }
}