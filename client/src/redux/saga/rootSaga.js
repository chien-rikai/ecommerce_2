import { productSaga } from "./ProductWebSaga"
import { all } from "@redux-saga/core/effects"
import { cartSaga } from "./CartSaga"
export default function* rootSaga(){
    yield all([
        ...productSaga,
        ...cartSaga
    ])
}