import { OrderHistoryTypes } from "../../constants/OrderHistory";

export function orders(data){
    return {
        type: OrderHistoryTypes.ORDER_HISTORY,
        orders: data ,
    }
}