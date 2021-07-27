import React, { Component } from 'react';
import RegisterForm from './RegisterForm';
import LoginForm from './LoginForm';
import { CheckLogin } from './CheckLogin';
import './login.css';

class LoginAndRegisterPage extends Component{
    constructor(props){
        super(props);
        this.state = {
            user: null,
        }
    }

    render(){
        return(
            <div className="page-section mb-60">
            <div className="container"></div>
            <div className="row">
                <CheckLogin />
                <div className="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                    <LoginForm />
                </div>
                <div className="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                    <RegisterForm />
                </div>
            </div>
            </div>
        )
    }
}

export default LoginAndRegisterPage;