import axios from 'axios';
import {store} from '../../../App';
import { login}from '../../../redux/actions/LoginAndRegister'

export function getusers() {
  if(localStorage.getItem('token') !== ''){
    axios({
      method: 'GET',
      url: process.env.REACT_APP_BASE_URL+'/web.com/user',
      headers: {
        'Authorization': 'Bearer '+localStorage.getItem('token'),
      }
    }).then(res => {  
      store.dispatch(login(res.data));
    }).catch(error => console.log(Object.assign({}, error)));
  }
}