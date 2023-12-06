<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Products;
use App\Models\ProductImages;

/**
 * Upload products in every 2 hours
 * @author: Jainil Raj
 */
class UploadProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upload-products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Upload products in every 2 hours';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $newProductCount = 0;
        $this->info("Cron Executed Started on :". date("Y-m-d H:i:s"));
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, 'https://dummyjson.com/products');
        $newProducts = curl_exec($ch);
        curl_close($ch);
        $newProducts = json_decode($newProducts, 1);

        foreach ($newProducts as $newProduct) {
            $product = [
                'name' => $newProduct['title'],
                'description' => $newProduct['description'],
                'price' => $newProduct['price'],
                'discount_percentage' => $newProduct['discountPercentage'],
                'rating' => $newProduct['rating'],
                'stock' => $newProduct['stock'],
                'brand' => $newProduct['brand'],
                'category' => $newProduct['category'],
                'thumbnail' => $newProduct['thumbnail'],
            ];

            /**
            * Check duplicate product
            */
            $product = Products::where('name', $newProduct['title'])->first();
            
            
            if (!$product) {
                // save products
                $product = Products::create($product);
                $newProductCount++;
            } else {
                // update products
                Products::where('id', $product->id)->update($newProduct);
            }
            
            // save images
            if (isset($newProduct['images'])) {
                //delete current ones
                $product = ProductImages::where('product_id', $product->id)->delete();
                
                //add/update new images
                foreach ($newProduct['images'] as $image) {
                    ProductImages::create([
                        'product_id' => $product->id,
                        'image'      => $image
                    ]);
                }
            }
        }
        
        $this->info("New Products Added Count :". $newProductCount);
        $this->info("Cron Executed Ends On :". date("Y-m-d H:i:s"));
    }
}
