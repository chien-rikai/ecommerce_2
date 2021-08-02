import { useDispatch, useSelector } from 'react-redux';
import { Component, useEffect, useState } from 'react';
import { fetchProductAction } from '../../../redux/actions/ProductWebAction';
import { HomeContainer } from "../../../containers/Home";
import ApiClient from '../../../services/Api';

export class HomePage extends Component{
    
    render(){
        return (
            <>
             <HomeContainer/>

            </>
        );
    }
}