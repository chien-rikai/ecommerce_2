import {all, put, takeEvery,call, takeLatest, fork, cancel} from 'redux-saga/effects';
import { fetchProductApi } from '../../services/ApiImpl';
import { fetchProductAction } from '../actions/ProductWebAction';
import { onBusy, onError, onLoadedSuccess, onSuccess } from '../reducers/CommonReducer';
import { fetchProduct as fetch } from '../reducers/ProductWebReducer';
export function* fetchProduct(){
    try {
        yield put(onBusy(true));
        const products=yield call(fetchProductApi);
        yield put(fetch(products));
        yield put(onLoadedSuccess('Loading successfully!'));
    } catch (error) {
        yield put(onError(error))
    }
    yield put(onBusy(false));
    
}
export const productSaga=[
    takeLatest(fetchProductAction,fetchProduct)
]
