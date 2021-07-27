import { configureStore } from '@reduxjs/toolkit';
import React from 'react';
import ReactDOM from 'react-dom';
import { rootReducer } from './redux/reducers';
import rootSaga from './redux/saga/ProductWebSaga';
import createSagaMiddleware from '@redux-saga/core';
import { Provider } from 'react-redux';
import './index.css';
import App from './App';

const sagaMiddleware = createSagaMiddleware();

const store=configureStore({
  reducer: rootReducer,
  middleware:(getDefaultMiddleware)=>
    getDefaultMiddleware().concat(sagaMiddleware)
})
sagaMiddleware.run(rootSaga);
ReactDOM.render(
  <Provider store={store}>
    <App />
  </Provider>,
  document.getElementById('root')
);
