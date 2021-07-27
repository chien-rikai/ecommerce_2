import React, { useState } from "react";
import { Redirect } from "react-router-dom";

export function CheckLogin(props){
    if(localStorage.getItem('checkLogin') === 'true'){
        return (
            <div>
                <Redirect to="/home" />
            </div>
        )
    } return '';
}