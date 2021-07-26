import { createAction } from "@reduxjs/toolkit";

export const isBusyAction = createAction('common/onBusy');
export const successAction = createAction('common/onSuccess');
export const errorAction = createAction('common/onError');
