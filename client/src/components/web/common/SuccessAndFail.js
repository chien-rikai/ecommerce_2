import React, { Component } from "react";

class SuccessAndFail extends Component{
    constructor(props){
        super(props);
    }
    render(){
        return (
            <div >{this.props.message ? 
                <div class="alert alert-success">Thanh cong</div> 
                : <div class="alert alert-danger">Khong thanh cong</div>}
            </div>
        )
    }
}

export default SuccessAndFail;