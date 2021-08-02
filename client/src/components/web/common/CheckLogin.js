import React, { useState } from "react";
import { Redirect } from "react-router-dom";

export function CheckLogin(){
    if(localStorage.getItem('checkLogin') === 'false'){
        return (
            <div>
                <Redirect to="/login" />
            </div>
        )
    } return '';
}