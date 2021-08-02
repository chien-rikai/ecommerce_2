import React, { Component } from "react";
import axios from "axios";
import '../login/login.css'
import { Trans } from "react-i18next";


class ChangePassword extends Component {
  constructor(props){
    super(props);
    this.state = {
      oldPassword: '',
      newPassword: '',
      confirmPassword: '',
      error_old_password: '',
      error_new_password: '',
      error_confirm_password: '',
    }
  }

  onSubmit(e){
    e.preventDefault(); 
    axios({
      method: 'POST',
      url: process.env.REACT_APP_BASE_URL+'/web.com/user/change-password/'+this.props.id,
      data: {
        old_password: this.state.oldPassword,
        password: this.state.newPassword,
        confirm_password: this.state.confirmPassword,
      },
      headers: {
        'Authorization': 'Bearer ' + localStorage.getItem('token'),
      }
    }).then(res => alert(res.data.message)
      ).catch(error => this.setState({
        error_old_password: error.response.data.error.old_password,
        error_new_password: error.response.data.error.password,
        error_confirm_password: error.response.data.error.confirm_password,
      }));
  }

  render() {
    return (
      <div>
        <form onSubmit={(e) => this.onSubmit(e)}>
          <div className="login-form">
            <h4 className="login-title"><Trans i18nKey='lang.change-password'/></h4>
            <div className="col-md-6 mb-20">
                <label><Trans i18nKey='lang.old-password'/><span className="required">*</span></label>
                <input className="mb-0" name="old_password" 
                type="password"  value={this.state.oldPassword}
                 onChange={(e) => this.setState({oldPassword: e.target.value })}/>
                <div className="validation" style={{display: 'block'}}>{this.state.error_old_password}</div>
              </div>
              <div className="col-md-6 mb-20">
                <label><Trans i18nKey='lang.new-password'/><span className="required">*</span></label>
                <input className="mb-0" name="password" 
                type="password"  value={this.state.newPassword}
                onChange={(e) => this.setState({newPassword: e.target.value})}/>
                <div className="validation" style={{display: 'block'}}>{this.state.error_new_password}</div>
              </div>
              <div className="col-md-6 mb-20">
                <label><Trans i18nKey='lang.confirm-password'/><span className="required">*</span></label>
                <input className="mb-0" name="confirm_password" 
                type="password"  value={this.state.confirmPassword}
                onChange={(e) => this.setState({confirmPassword: e.target.value})}/>
                <div className="validation" style={{display: 'block'}}>{this.state.error_confirm_password}</div>
              </div>
              <div className="col-12">
                <button className="register-button mt-0"><Trans i18nKey='lang.change'/></button>
              </div>
            </div>
        </form>
      </div>
      )   
    }
}

export default ChangePassword;

