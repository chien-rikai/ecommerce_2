import axios from 'axios';
import React, { Component } from 'react';
import { Trans, withTranslation } from 'react-i18next';
import { UserGender } from '../../../enums/UserGender';

class ProfileForm extends Component {
  constructor(props) {
    super(props);
    this.state = {
      first_name: Object.assign({},this.props.user).first_name ,
      last_name:  Object.assign({},this.props.user).last_name,
      email:  Object.assign({},this.props.user).email,
      phone:  Object.assign({},this.props.user).phone,
      address:  Object.assign({},this.props.user).address,
      birthday:  Object.assign({},this.props.user).birthday,
      gender:  Object.assign({},this.props.user).gender,
      error_first_name: '',
      error_last_name: '',
      error_email: '',
      error_phone: '',
      error_birthday: '',
      error_gender: '',
      isLoading: false,
    }
  }

  componentDidMount(){
    this.setState({isLoading: true,})
  }

  onSubmit(e) {
    e.preventDefault();
    axios({
      method: 'PATCH',
      url: process.env.REACT_APP_BASE_URL + '/web.com/user/' + Object.assign({}, this.props.user).id,
      data: {
        first_name: this.state.first_name,
        last_name: this.state.last_name,
        email: this.state.email,
        phone: this.state.phone,
        address: this.state.address,
        birthday: this.state.birthday,
        gender: this.state.gender
      },
      headers: {
        'Authorization': 'Bearer ' + localStorage.getItem('token'),
      }
    }).then(res => {
      alert(res.data.message);
    }).catch(error => {
      this.setState({
        error_first_name: error.response.data.error.first_name,
        error_last_name: error.response.data.error.last_name,
        error_email: error.response.data.error.email,
        error_phone: error.response.data.error.phone,
        error_birthday: error.response.data.error.birthday,
        error_gender: error.response.data.error.gender,
      });
    });
  }

  render() {
    console.log(1) ;
    const { t } = this.props;
    return (
      <form onSubmit={(e) => this.onSubmit(e)}>
        {this.props.user ?    <div className="login-form">
          <h4 className="login-title"><Trans i18nKey='lang.profile' /></h4>
          <div className="row">
            <div className="col-md-6 mb-20">
              <label><Trans i18nKey='lang.first-name' /></label>
              <input className="mb-0" name="first_name" type="text"
                onChange={(e) => this.setState({ first_name: e.target.value })}
                placeholder={t('lang.enter-first-name')} value={this.state.first_name} />
              <div className="validation" style={{ display: 'block' }}>{this.state.error_first_name}</div>
            </div>
            <div className="col-md-6 mb-20">
              <label><Trans i18nKey='lang.last-name' /></label>
              <input className="mb-0" name="last_name" type="text"
                onChange={(e) => this.setState({ last_name: e.target.value })}
                placeholder={t('lang.enter-last-name')} value={this.state.last_name} />
              <div className="validation" style={{ display: 'block' }}>{this.state.error_last_name}</div>
            </div>
            <div className="col-md-12 mb-20">
              <label><Trans i18nKey='lang.email' /></label>
              <input className="mb-0" name="email" type="email"
                onChange={(e) => this.setState({ email: e.target.value })}
                placeholder={t('lang.enter-email')} value={this.state.email} />
            </div>
            <div className="validation" style={{ display: 'block' }}>{this.state.error_email}</div>
            <div className="col-md-12 mb-20">
              <label><Trans i18nKey='lang.phone' /></label>
              <input className="mb-0" name="phone" type="text"
                onChange={(e) => this.setState({ phone: e.target.value })}
                placeholder={t('lang.enter-number-phone')} value={this.state.phone} />
            </div>
            <div className="validation" style={{ display: 'block' }}>{this.state.error_phone}</div>
            <div className="col-md-12 mb-20">
              <label><Trans i18nKey='lang.address' /></label>
              <input className="mb-0" name="address" type="text"
                onChange={(e) => this.setState({ address: e.target.value })}
                placeholder={t('lang.enter-address')} value={this.state.address} />
            </div>
            <div className="col-md-6 mb-20">
              <label><Trans i18nKey='lang.birthday' /></label>
              <input className="mb-0" name="birthday" type="date"
                onChange={(e) => this.setState({ birthday: e.target.value })}
                value={this.state.birthday} />
              <div className="validation" style={{ display: 'block' }}>{this.state.error_birthday}</div>
            </div>
            <div className="col-md-6 mb-20">
            </div>
            <div className="col-md-3">
              <label><Trans i18nKey='lang.gender' /></label>
            </div>
            <div>
              <div className="col-md-1"></div>
              {this.state.gender === UserGender.MALE ?
                <input className="mb-1" name="gender"
                  value={this.state.gender} type="radio" checked />
                : <input className="mb-1" name="gender"
                  onChange={() => this.setState({ gender: UserGender.MALE })}
                  value={this.state.gender} type="radio" />
              }<Trans i18nKey='lang.male' />
            </div>
            <div className="col-md-1">
              {this.state.gender === UserGender.FEMALE ?
                <input className="mb-1" name="gender"
                  value={this.state.gender} type="radio" checked />
                : <input className="mb-1" name="gender"
                  onChange={() => this.setState({ gender: UserGender.FEMALE })}
                  value={this.state.gender} type="radio" />
              }<Trans i18nKey='lang.female' />
            </div>
            <div className="validation" style={{ display: 'block' }}>{this.state.error_gender}</div>
          </div>
          <div className="col-12">
            <button type="submit" className="register-button mt-0"><Trans i18nKey='lang.edit' /></button>
          </div>
        </div> : 'Loading'}
    
      </form>
    )
  }
}

export default withTranslation()(ProfileForm);