<?php
namespace App\Http\ViewComposers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;
class CartComposer
{
    protected $cart;
    /**
     * Bind data to the view.
     * @param  View  $view
     * @return void
     */
    public function __construct()
    {
        // Dependencies are automatically resolved by the service container...
        $this->cart = null;
    }
    public function compose(View $view)
    { 
        $user = Auth::user();
        if(!blank($user)){
            $this->cart = Session::get('cart_'.$user->id);
        }
        $view->with('cart',$this->cart);
    }
}
?>
