import React, { Component } from 'react';
import { Trans } from 'react-i18next';
import { store } from '../../../App';
import { getOrderHistory } from '../common/GetOrderHistory';
import OrderHistoryItem from './OrderHistoryItem';

class OrderHistoryList extends Component {
  constructor(props) {
    super(props);
    this.state = {
      orders: null,
      isLoading: false,
      stt: 1,
    }
  }

  componentWillMount(){
    getOrderHistory(this.props.id);
    store.subscribe(() => {
      this.setState({
        orders: store.getState().orders[0].data.orders,
        isLoading: true,
      });
    });
  }

  render() {
    var orders = [];
    if(this.state.isLoading){
      this.state.orders.forEach(order => {
        orders.push(
          <OrderHistoryItem 
          key={order.id}
          stt={this.state.stt++}
          order={order}
          />
        );
      });
    } 
    return (
      <div>
        {this.state.isLoading ?
          <div>
             <h4 className="login-title"><Trans i18nKey='lang.order' /></h4>
            {orders.length ? orders : <Trans i18nKey='lang.no-result  ' />}
          </div>
          : <Trans i18nKey='lang.loading' />}
      </div>
    )

  }
}

export default OrderHistoryList;