import axios from "axios";
import { useState } from "react";
import { Redirect } from "react-router-dom";
import ApiClient from "../../../services/Api";

export const CheckoutForm =({user,cart})=>{
    const [data,setData]= useState({
        name : user.data.first_name,
        email : user.data.email,
        address: user.data.address,
        phone: user.data.phone,
        error_name:'',
        error_address:'',
        error_email: '',
        error_phone: '',
    })
    const [success,setSuccess] = useState(false);
    function order(e){
        e.preventDefault();
        if(cart.products.length==0) return;
        let params ={
            user_id: user.data.id,
            name : data.name,
            email: data.email,
            address: data.address,
            phone: data.phone,
            cart: cart.products
        }
        axios({
            method: 'POST',
            url: process.env.REACT_APP_BASE_URL + '/web.com/payment/',
            data: params,
            headers: {
              'Authorization': 'Bearer ' + localStorage.getItem('token'),
            }
          }).then((response)=>{
            console.log(response);
            setSuccess(true);
            window.alert('Order successfully!');
            localStorage.setItem('cart',[]);
            window.location.replace('/');
        }).catch((error)=>{
            console.log(error);
            setData({
                ...data,
                error_email: error.response.data.error.email,
                error_phone: error.response.data.error.phone,
                error_address: error.response.data.error.address,
                error_name: error.response.data.error.name,
            })
        });
    }
    if(cart=='') return(<Redirect to='/home'/>);
    return(
    <form action="" method="POST" id="checkout-form" onSubmit={order}>
    <input type="hidden" name="user_id" value={user.id}/>
    <div class="checkbox-form">
        <h3>Bill detail</h3>
        <div class="row">
            <div class="col-md-9">
                <div class="checkout-form-list">
                    <label>Tên khách hàng<span class="required">*</span></label>
                    <input placeholder="" type="text" name="name" value={data.name} 
                    onChange={(e)=>setData({...data,name:e.target.value})}/>
                    <div className="validation" style={{ display: 'block' }}>{data.error_name}</div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="checkout-form-list">
                    <label>Địa chỉ nhận hàng<span class="required">*</span></label>
                    <input placeholder="Street address" name="address" type="text" value={data.address}
                    onChange={(e)=>setData({...data,address:e.target.value})}
                    />
                    <div className="validation" style={{ display: 'block' }}>{data.error_address}</div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="checkout-form-list">
                    <label>Email <span class="required">*</span></label>
                    <input placeholder="" name="email" type="email" value={data.email}
                    onChange={(e)=>setData({...data,email:e.target.value})}
                    />
                    <div className="validation" style={{ display: 'block' }}>{data.error_email}</div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="checkout-form-list">
                    <label>SĐT<span class="required">*</span></label>
                    <input type="text" name="phone" value={data.phone}
                    onChange={(e)=>setData({...data,phone:e.target.value})}
                    />
                    <div className="validation" style={{ display: 'block' }}>{data.error_phone}</div>
                </div>
            </div>
        </div>
    </div>
</form>
    );
}