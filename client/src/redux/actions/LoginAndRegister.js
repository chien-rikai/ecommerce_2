import {LoginAndRegisterTypes} from "../../constants/LoginAndRegister";

export function login(data, check){
    return {
        type: LoginAndRegisterTypes.LOGIN_SUBMIT,
        data: data,
    }
}
