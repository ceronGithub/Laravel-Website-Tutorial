<?php
namespace App\Traits;

use App\Models\Product;

trait ProductTable {

    public function newProduct($cId, $pName, $pPrice, $pImage) 
    {
        //dd($pImage);
        $createNewProduct = new Product();
        $createNewProduct->company_id = $cId;
        $createNewProduct->product_name = $pName;
        $createNewProduct->product_price = $pPrice;
        $createNewProduct->product_image = $pImage;
        return $createNewProduct->save();
    }

    public function productImage($image, $pName, $pLoopName)
    {
        //get file type
        $extension = $image->extension();
        //whole file w/ file type
        $imageName = $pName.$pLoopName.'.' . $extension;
        //save image to local folder. project/app/public
        $image->move(public_path('storage/uploads/products/'), $imageName);
        return '"storage/uploads/products/'.$imageName.'"';
    }
}