import {all, put, takeEvery,call, takeLatest, fork, cancel} from 'redux-saga/effects';
import { fetchProductApi } from '../../services/ApiImpl';
import { fetchProductAction } from '../actions/ProductWebAction';
import { onBusy, onError, onSuccess } from '../reducers/CommonReducer';
import { fetchProduct as fetch } from '../reducers/ProductWebReducer';
export function* fetchProduct(){
    try {
        yield put(onBusy(true));
        const products=yield call(fetchProductApi);
        yield put(fetch(products));
        yield put(onSuccess('Loading successfully!'));
    } catch (error) {
        yield put(onError(error))
    }
    yield put(onBusy(false));
    
}
export function* fetchProductSaga(){
    yield takeLatest(fetchProductAction,fetchProduct);
}
export default function* rootSaga(){
    yield all([
        fork(fetchProductSaga)
    ])
}