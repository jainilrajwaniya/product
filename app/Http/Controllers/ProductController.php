<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Http\Helpers\ResponseTrait;

/**
 * Product controller class for maintaining Products
 * @author : Jainil Rajwaniya
 */
class ProductController extends Controller {

    use ResponseTrait;
    
    /**
     * Get products list
     * @return json
     */
    public function getList()
    {
        try {        
            return $this->success(Products::paginate(), 'PRODUCT_LIST');
        } catch (Exception $ex) {
            return $this->error($ex->getMessage());
        }
    }
    
    /**
     * Get product detail
     * @param int $id
     * @return json
     */
    public function detail($id)
    {
        try {
            return $this->success(Products::where('id', $id)->first(), 'PRODUCT_DETAIL');
        } catch (Exception $ex) {
            return $this->error($ex->getMessage());
        }
    }
}
