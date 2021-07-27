import { configureStore } from '@reduxjs/toolkit';
import React from 'react';
import ReactDOM from 'react-dom';
import { rootReducer } from './redux/reducers';
import rootSaga from './redux/saga/ProductWebSaga';
import createSagaMiddleware from '@redux-saga/core';
import { Provider } from 'react-redux';
import './index.css';
import App from './App';
import {I18nextProvider} from 'react-i18next';
import i18n from  './translations/i18n';


const sagaMiddleware = createSagaMiddleware();

const store=configureStore({
  reducer: rootReducer,
  middleware:(getDefaultMiddleware)=>
    getDefaultMiddleware().concat(sagaMiddleware)
})
sagaMiddleware.run(rootSaga);
ReactDOM.render(
  <I18nextProvider i18n={i18n}>
    <Provider store={store}>
      <App />
    </Provider>
  </I18nextProvider>,
  document.getElementById('root')
);
