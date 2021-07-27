import axios from 'axios';
import React, { Component } from 'react';
import { Link } from 'react-router-dom';
import { store } from '../App';
import { getusers } from './web/common/GetUser';

export default class Home extends Component {
  constructor(props) {
    super(props);
    this.state = {
      user: null,
    }
  }
  componentWillMount() {
    getusers();
    store.subscribe(() => {
      this.setState({
        user: store.getState().user ? store.getState().user : null,
      });
    });
  }

  logout(e) {
    axios({
      method: 'GET',
      url: process.env.REACT_APP_BASE_URL+'/web.com/logout/' + this.state.user[0].data.id,
    }).then(res => {
      localStorage.setItem('checkLogin', false);
      localStorage.setItem('token', '');
      this.setState({
        user: null,
      });
    }).catch(error => {
      console.log(error);
    });
  }

  render() {
    if (this.state.user != null) {
      return (
        <div>
          <p>{this.state.user[0].data.username}</p>
          <a onClick={(e) => this.logout(e)}>Logout</a>
        </div>
      )
    } else {
      return (
        <div>home
          <Link to="/login">Login</Link>
        </div>

      )
    }
  }
}