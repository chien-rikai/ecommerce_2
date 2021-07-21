import { useDispatch } from "react-redux"
import { changeQuantityAction, removeProductAction } from "../../../redux/actions/CartAction";
import { calcNewPrice } from "../../../utils/CartHelper";

export const CartElement=({item})=>{
    const dispatch = useDispatch();
    function onIncrement(){
        dispatch(changeQuantityAction({...item,quantity:1}));
    }
    function onDecrement(){
        if(item.quantity==1)
            return;
        dispatch(changeQuantityAction({...item,quantity:-1}));
    }
    function remove(){
        dispatch(removeProductAction(item.id));
    }
    return(
        <tr className="product">
            <td className="li-product-remove"><a className="remove" onClick={remove}><i className="fa fa-times"></i></a></td>
            <td className="li-product-thumbnail"><a href="">
                <img className="thumbnail-img" src={process.env.REACT_APP_RESOURCE_URL+'/images/'+item.url_img} alt="Li's Product Image"/></a></td>
            <td className="li-product-name"><a href="#">{item.name}</a></td>
            <td className="li-product-price"><span id="base_price_{{$key}}">{calcNewPrice(item)}</span></td>
            <td className="quantity">
                <div className="cart-plus-minus">
                    <input id="quantity" className="cart-plus-minus-box" value={item.quantity} type="text"/>
                    <div className="dec qtybutton" onClick={onDecrement}><i className="fa fa-angle-down"></i></div>
                    <div className="inc qtybutton" onClick={onIncrement}><i className="fa fa-angle-up"></i></div>
                </div>
            </td>
            <td className="product-subtotal"><span>{calcNewPrice(item)*item.quantity}</span></td>
        </tr>
    )
}