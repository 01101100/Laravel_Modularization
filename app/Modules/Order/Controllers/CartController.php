<?php

namespace App\Modules\Order\Controllers;

use Illuminate\Http\Request;
use App\Modules\Order\Models\Cart;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Modules\Product\Models\Product;

class CartController extends Controller
{

    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    /**
     * Construct Cart
     */
    private function cartConstruct(){
        $oldCart = Session('cart')? Session::get('cart'):null;
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    /**
     * Add product to Cart
     * @param Product
     */
    private function add($product){
        $cart = ['qty'=>0,'price' => 0, 'product' => $product];
        if($this->items){
            if(array_key_exists($product->prod_id, $this->items)){
                $cart = $this->items[$product->prod_id];
            }
        }
        $cart['qty']++;
        $cart['price'] += $product->price;
        $this->items[$product->prod_id] = $cart;
        $this->totalQty++;
        $this->totalPrice += $product->price;
    }

    /**
	 * Add product to Cart
	 * @param product ID
	 * @return Cart page
	 */
	public function addToCart($prod_id){
		$product = Product::find($prod_id);
        $this->cartConstruct();
        $this->add($product);
        Session::put('cart',$this);
        return redirect()->route('cart');
	}

    /**
     * delete product from Cart
     * @param product ID
     */
    private function removeItem($id){
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }

    /**
     * delete products from cart
     * @param  product ID
     * @return Cart page
     */
	public function deleteFromCart($prod_id){
        $this->cartConstruct();
        $this->removeItem($prod_id);
        if(count($this->items)>0)
        {
            Session::put('cart',$this);
        }
        else
        {
            Session::forget('cart',$this);
        }
        return redirect()->back();
	}
}