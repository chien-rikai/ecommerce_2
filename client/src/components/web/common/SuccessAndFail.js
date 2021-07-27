import React, { Component } from "react";
import { Trans } from "react-i18next";

class SuccessAndFail extends Component{
    constructor(props){
        super(props);
    }
    render(){
        return (
            <div >{this.props.message ? 
                <div class="alert alert-success"><Trans i18nKey='lang.success' /></div> 
                : <div class="alert alert-danger"><Trans i18nKey='lang.failed' /></div>}
            </div>
        )
    }
}

export default SuccessAndFail;