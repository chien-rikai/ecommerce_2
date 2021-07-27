import React, { Component } from "react";
import axios from "axios";
import SuccessAndFail from "../common/SuccessAndFail";
import { Trans } from "react-i18next";


class RegisterForm extends Component {
  constructor(props){
    super(props);
    this.state = {
      name: '',
      email: '',
      password: '',
      confirmPassword: '',
      message: '',
      status: false,
      errors: {}
    }
  }

  onNameChange(e){
    this.setState({
      name: e.target.value,
    })
  }
  onEmailChange(e){
    this.setState({
      email: e.target.value,
    })
  }

  onPasswordChange(e){
    this.setState({
      password: e.target.value,
    })
  }

  onConfirmPasswordChange(e){
    this.setState({
      confirmPassword: e.target.value,
    })
  }

  onSubmit(e){
    e.preventDefault(); 
    axios({
      method: 'POST',
      url: process.env.REACT_APP_BASE_URL+'/web.com/register',
      data: {
        username: this.state.name,
        email: this.state.email,
        password: this.state.password,
        confirm_password: this.state.confirmPassword,
      }
    }).then(response =>   
      this.setState({
        message: response.data.message,
        status: response.data.status,
        username: '',
        email: '',
        password: '',
        confirmPassword: '',
      })).catch(error => this.setState({
        errors: Object.assign({}, error).response.data.error,
      }));
  }

  render() {
    const errors = this.state.errors;
    return (
      <div>
        <form onSubmit={(e) => this.onSubmit(e)}>
          {this.state.status ? <SuccessAndFail message={this.state.message}></SuccessAndFail>: ''}
          <div className="login-form">
          <h4 className="login-title"><Trans i18nKey='lang.register' /></h4>
          <div className="row">
            <div className="col-md-12 col-12 mb-20">
              <label><Trans i18nKey='lang.username' /></label>
              <input className="mb-0" 
                onChange={(e) => this.onNameChange(e)}
                name="username"
                type="username" 
                placeholder="Enter user name" 
                value={this.state.name}>
              </input>
              <div className="validation" style={{display: 'block'}}>{errors.username}</div>
            </div><div className="col-md-12 mb-20">
              <label><Trans i18nKey='lang.email' /></label>
              <input className="mb-0" 
                onChange={(e) => this.onEmailChange(e)}
                name="email"
                type="email"
                placeholder="Enter email" 
                value={this.state.email}/>
                <div className="validation" style={{display: 'block'}}>{errors.email}</div>
            </div>
            <div className="col-md-6 mb-20">
              <label><Trans i18nKey='lang.password' /></label>
              <input className="mb-0"
                onChange={(e) => this.onPasswordChange(e)}
                name="password"
                type="password" 
                placeholder="enter password"
                value={this.state.password} />
                <div className="validation" style={{display: 'block'}}>{errors.password}</div>
            </div>
            <div className="col-md-6 mb-20">
              <label><Trans i18nKey='lang.confirm-password' /></label>
              <input className="mb-0"
                onChange={(e) => this.onConfirmPasswordChange(e)}
                name="confirm-password"
                type="password" 
                placeholder="enter confirm password" value={this.state.confirmPassword}/>
                <div className="validation" style={{display: 'block'}}>{errors.confirm_password}</div>
            </div>
            <div className="col-md-12">
              <button type="submit" className="register-button mt-0"><Trans i18nKey='lang.register' /></button>
            </div>
          </div>
         </div>
        </form>
      </div>
      )   
    }
}

export default RegisterForm;

