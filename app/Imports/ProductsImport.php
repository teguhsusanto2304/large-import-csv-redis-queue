<?php

namespace App\Imports;

use App\Models\Product;
use Exception;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Illuminate\Support\Facades\Redis;

class ProductsImport implements WithStartRow, ToModel, WithCustomCsvSettings
{
    use Importable;
    var $file_id;
    public function startRow(): int
    {
        return 1;
    }

    public function getCsvSettings(): array
    {
        return [
            $this->delimiter = ':'
        ];
    }
    public function setFileId($file_id)
    {
        $this->file_id = $file_id;
    }
    public function saveData($row): Product
    {
        $data = Product::updateOrCreate([
            "unique_key" => $row[0],
            "product_title" => $row[1],
            "product_describe" => $row[2],
            "styles" => $row[3],
            "available_sizes" => $row[4],
            "brand_logo_image" => $row[5],
            "thumbnail_image" => $row[6],
            "color_swatch_image" => $row[7],
            "product_image" => $row[8],
            "spec_sheet" => $row[9],
            "price_text" => $row[10],
            "suggested_price" => $row[11],
            "category_name" => $row[12],
            "subcategory_name" => $row[13],
            "color_name" => $row[14],
            "color_square_image" => $row[15],
            "color_product_image" => $row[16],
            "color_product_image_thumbnail" => $row[17],
            "size" => $row[18],
            "qty" => $row[19],
            "piece_weight" => $row[20],
            "piece_price" => $row[21],
            "dozens_price" => $row[22],
            "case_price" => $row[23],
            "price_group" => (is_null($row[24]) ? "-" : $row[24]),
            "case_size" => $row[25],
            "inventory_key" => $row[26],
            "size_index" => $row[27],
            "sanmar_mainframe_color" => $row[28],
            "mill" => $row[29],
            "product_status" => $row[30],
            "companion_styles" => $row[31],
            "msrp" => (empty($row[32]) ? 0 : $row[32]),
            "map_princing" => (empty($row[33]) == true ? 0 : $row[33]),
            "front_model_image_url" => $row[34],
            "back_model_image" => $row[35],
            "front_flat_image" => $row[36],
            "back_flat_image" => $row[37],
            "product_measurements" => $row[38],
            "pms_color" => $row[39],
            "gtin" => (empty($row[40]) ? 0 : $row[40])
        ]);
        return $data;
    }
    public function save($row): Product
    {
        $data = Product::create([
            "unique_key" => $row[0],
            "product_title" => $row[1],
            "product_describe" => $row[2],
            "styles" => $row[3],
            "available_sizes" => $row[4],
            "brand_logo_image" => $row[5],
            "thumbnail_image" => $row[6],
            "color_swatch_image" => $row[7],
            "product_image" => $row[8],
            "spec_sheet" => $row[9],
            "price_text" => $row[10],
            "suggested_price" => $row[11],
            "category_name" => $row[12],
            "subcategory_name" => $row[13],
            "color_name" => $row[14],
            "color_square_image" => $row[15],
            "color_product_image" => $row[16],
            "color_product_image_thumbnail" => $row[17],
            "size" => $row[18],
            "qty" => $row[19],
            "piece_weight" => $row[20],
            "piece_price" => $row[21],
            "dozens_price" => $row[22],
            "case_price" => $row[23],
            "price_group" => (is_null($row[24]) ? "-" : $row[24]),
            "case_size" => $row[25],
            "inventory_key" => $row[26],
            "size_index" => $row[27],
            "sanmar_mainframe_color" => $row[28],
            "mill" => $row[29],
            "product_status" => $row[30],
            "companion_styles" => $row[31],
            "msrp" => (empty($row[32]) ? 0 : $row[32]),
            "map_princing" => (empty($row[33]) == true ? 0 : $row[33]),
            "front_model_image_url" => $row[34],
            "back_model_image" => $row[35],
            "front_flat_image" => $row[36],
            "back_flat_image" => $row[37],
            "product_measurements" => $row[38],
            "pms_color" => $row[39],
            "gtin" => (empty($row[40]) ? 0 : $row[40]),
            "product_file_id" => $this->file_id
        ]);
        return $data;
    }
    public function update($row): bool
    {
        Product::where('unique_key', $row[0])->first();
        $data = new Product([
            "unique_key" => $row[0],
            "product_title" => $row[1],
            "product_describe" => $row[2],
            "styles" => $row[3],
            "available_sizes" => $row[4],
            "brand_logo_image" => $row[5],
            "thumbnail_image" => $row[6],
            "color_swatch_image" => $row[7],
            "product_image" => $row[8],
            "spec_sheet" => $row[9],
            "price_text" => $row[10],
            "suggested_price" => $row[11],
            "category_name" => $row[12],
            "subcategory_name" => $row[13],
            "color_name" => $row[14],
            "color_square_image" => $row[15],
            "color_product_image" => $row[16],
            "color_product_image_thumbnail" => $row[17],
            "size" => $row[18],
            "qty" => $row[19],
            "piece_weight" => $row[20],
            "piece_price" => $row[21],
            "dozens_price" => $row[22],
            "case_price" => $row[23],
            "price_group" => (is_null($row[24]) ? "-" : $row[24]),
            "case_size" => $row[25],
            "inventory_key" => $row[26],
            "size_index" => $row[27],
            "sanmar_mainframe_color" => $row[28],
            "mill" => $row[29],
            "product_status" => $row[30],
            "companion_styles" => $row[31],
            "msrp" => (empty($row[32]) ? 0 : $row[32]),
            "map_princing" => (empty($row[33]) == true ? 0 : $row[33]),
            "front_model_image_url" => $row[34],
            "back_model_image" => $row[35],
            "front_flat_image" => $row[36],
            "back_flat_image" => $row[37],
            "product_measurements" => $row[38],
            "pms_color" => $row[39],
            "gtin" => (empty($row[40]) ? 0 : $row[40]),
            "product_file_id" => $this->file_id
        ]);
        return $data->update();
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        Redis::connection();
        $cacheUniqueKey = Redis::get("unique_key_" . $row[0]);
        if (!isset($cacheUniqueKey)) {
            $data = $this->save($row);
            Redis::set("unique_key_" . $row[0], $data);
            return $data;
        } else {
            $this->update($row);
        }
    }
}