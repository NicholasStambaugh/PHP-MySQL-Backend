import React from 'react';
import ReactDOM from 'react-dom';
import App from './App';
import BackendData from './components/BackendData';
import DatabaseConfig from './components/DatabaseConfig';
import Functions from './components/Functions';
import ControllerClass from './components/ControllerClass';
import DataHandlerClass from './components/DataHandlerClass';

ReactDOM.render(
  <React.StrictMode>
    <App />
    <BackendData />
    <DatabaseConfig />
    <Functions />
    <ControllerClass />
    <DataHandlerClass />
  </React.StrictMode>,
  document.getElementById('root')
);
