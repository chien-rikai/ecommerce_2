import axios from 'axios';
import {store} from '../../../App';
import { orders } from '../../../redux/actions/OrderHistoryAction';

export function getOrderHistory(id) {
  if(localStorage.getItem('token') !== ''){
    axios({
      method: 'GET',
      url: process.env.REACT_APP_BASE_URL+'/web.com/user/get-orders/'+id,
      headers: {
        'Authorization': 'Bearer '+localStorage.getItem('token'),
      }
    }).then(res => {  
      store.dispatch(orders(res.data));
    }).catch(error => console.log(Object.assign({}, error)));
  }
}