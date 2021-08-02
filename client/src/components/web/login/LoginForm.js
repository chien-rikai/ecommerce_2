import React, { Component } from "react";
import axios from "axios";
import { Redirect } from "react-router-dom";
import { Trans } from 'react-i18next';

class LoginForm extends Component {
  constructor(props){
    super(props);
    this.state = {
      name: '',
      password: '',
      message: '',
      check: true,
      checkLogin: null,
      errors: {},
    }
  }
  
  onSubmit(e){
    e.preventDefault(); 
    axios({
      method: 'POST',
      url: process.env.REACT_APP_BASE_URL+'/web.com/login',
      data: {
        username: this.state.name,
        password: this.state.password,
      }
    }).then(res => {
      this.setState({check: res.data.checkLogin,
        checkLogin: res.data.checkLogin,
        message: res.data.message,
      });
      localStorage.setItem('checkLogin', res.data.checkLogin);
      localStorage.setItem('token', res.data.token);
      window.location.reload();
    }).catch(error => {
        this.setState({
          errors: Object.assign({}, error).response.data.error,
        });
    });   
  }

  onNameChange(e){
    this.setState({
      name: e.target.value,
    })
  }

  onPasswordChange(e){
    this.setState({
      password: e.target.value,
    })
  }

  render() {
    const errors = this.state.errors;
    return (  
      <div>  
        {this.state.checkLogin ?   <Redirect to="/home"/> : ''}
        {!this.state.check && <div class="alert alert-danger">{this.state.message}</div>}
        <form onSubmit={(e) => this.onSubmit(e)}>
        <input type="hidden" id="csrf-token" name="csrf-token" value="{{{ csrf_token() }}}" />
          <div className="login-form">
            <h4 className="login-title"><Trans i18nKey='lang.login' /></h4>
            <div className="row">
              <div className="col-md-12 col-12 mb-20">
                <label><Trans i18nKey='lang.username' /></label>
                <input className="mb-0"
                  onChange={(e) => this.onNameChange(e)}
                  name="username" type="username"
                  placeholder="Enter user name" value={this.state.name}>
                </input>
                <div className="validation" style={{display: 'block'}}>{errors.username}</div>
              </div>
              <div className="col-12 mb-20">
                <label><Trans i18nKey='lang.password' /></label>
                <input className="mb-0"
                  onChange={(e) => this.onPasswordChange(e)}
                  name="password" type="password"
                  placeholder="enter password" value={this.state.password} />
                  <div className="validation" style={{display: 'block'}}>{errors.password}</div>
              </div>
              <div className="col-md-12">
                <button type="submit" className="register-button mt-0"><Trans i18nKey='lang.login' /></button>
              </div>
            </div>
          </div>
        </form>
      </div>
      )   
    }
}

export default LoginForm;

