import React, { Component } from 'react';
import ProfileForm from './ProfileForm';
import { UpdateUserType } from '../../../enums/UpdateUserType';
import DefaultAvatar from '../../../style/images/default-avatar.jpg';
import './profile.css'
import { store } from '../../..'; 
import { getusers } from '../common/GetUser';
import { Trans } from 'react-i18next';
import ChangePassword from './ChangePasswordForm';
import { CheckLogin } from '../common/CheckLogin';
import OrderHistoryList from './OrderHistoryList';


class ProfilePage extends Component {
  constructor(props){
    super(props);
    this.state = {
      user: null,
      isLoading: false,
    }
    
  }

  componentWillMount(){
    getusers();
    store.subscribe(() => {
      this.setState({
        user: store.getState().user[0],
        isLoading: true,
      });
    });
  }

  render() {
    const user = Object.assign({},this.state.user);
    console.log(user.data == null);
    console.log(this.state.isLoading);
    return (
      <div className="container">
        <CheckLogin />
        <div className="row">
          <div className="col-md-3">
            <div className="osahan-account-page-left shadow-sm bg-white h-100">
              <div className="border-bottom p-4">
                <div className="osahan-user text-center">
                  <div className="osahan-user-media">
                    <img className="mb-3 rounded-pill shadow-sm mt-1" src={DefaultAvatar} alt="gurdeep singh osahan" />
                    {this.state.isLoading && user.data != null ?<div className="osahan-user-media-body"> 
                      <h6 className="mb-2">{user.data.username}</h6>
                      <p className="mb-1">{user.data.phone}</p>
                      <p>{user.data.email}</p>
                    </div> : '' }
                  </div>
                </div>
              </div>
              <ul className="nav nav-tabs flex-column border-0 pt-4 pl-4 pb-4" id="myTab" role="tablist">
                <li className="nav-item">
                  <a className="nav-link" id="orders-tab" href="/order-history" aria-selected="true">
                    <i className="fa fa-cart-arrow-down"></i><Trans i18nKey='lang.order'/>
                  </a>
                </li>
                <li className="nav-item">
                  <a className="nav-link" id="orders-tab" href="/profile" aria-selected="true">
                    <i className="fa fa-credit-card-alt"></i><Trans i18nKey='lang.account'/>
                  </a>
                </li>
                <li className="nav-item">
                  <a className="nav-link" id="orders-tab" href="/change-password" aria-selected="true">
                    <i className="fa fa-unlock-alt"></i><Trans i18nKey='lang.change-password'/>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div className="col-md-9">
            <div className="osahan-account-page-right shadow-sm bg-white p-4 h-100">
              <div className="tab-content" id="myTabContent">
                <div className="tab-pane active show" id="orders" aria-labelledby="orders-tab">
                  <div className="row">
                  </div>
                  {this.state.isLoading && user.data != null ? <div>
                  {this.props.isRole === UpdateUserType.PROFILE ? <ProfileForm user={user.data}/> : '' }
                  {this.props.isRole === UpdateUserType.CHANGE_PASSWORD ? <ChangePassword id={user.data.id}/> : '' }
                  {this.props.isRole === UpdateUserType.ORDER_HISTORY ? <OrderHistoryList id={user.data.id}/> : '' }
                  </div> : <Trans i18nKey='lang.loading' />}      
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    )
  }
}

export default ProfilePage;