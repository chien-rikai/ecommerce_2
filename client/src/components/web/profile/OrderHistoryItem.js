import React, { Component } from 'react';
import { Trans } from 'react-i18next';

class OrderHistoryItem extends Component{
    constructor(props){
        super(props);
    }
    

    render(){
        return(
            <div className="bg-white card  order-list shadow-sm">
            <div className="p-4">
              <div className="media">
                <div className="media-body">
                  <a href="#">
                    <span className="float-right badge badge-primary">{this.props.order.status}</span>
                  </a>
                  <h6 className="mb-2">
                    <a href="#"></a>
                    <a href="#" className="text-black"><Trans i18nKey='lang.order'/> #{this.props.stt}</a>
                  </h6>
                  <p className="text-gray mb-1"><i className="fa fa-map-marker"></i>
                    {this.props.order.address}
                  </p>
                  <p className="text-gray mb-3"><i className="fa fa-calendar"></i>{this.props.order.created_at}</p>
                  <p className="text-dark"><i className="fa fa-spinner">{this.props.order.summary}</i>
                  </p>
                  <p className="mb-0 text-black text-primary pt-2"><span className="text-black font-weight-bold"> 
                  <Trans i18nKey='lang.total-paid'/>:</span>{this.props.order.total_cost}
                  </p>
                </div>
              </div>
            </div>
          </div>
        )
    }
}

export default OrderHistoryItem;