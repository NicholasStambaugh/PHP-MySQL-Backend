import React from 'react';
import BackendData from './components/BackendData';
import DatabaseConfig from './components/DatabaseConfig';
import Functions from './components/Functions';
import ControllerClass from './components/ControllerClass';
import DataHandlerClass from './components/DataHandlerClass';

function App() {
  return (
    <div>
      <BackendData />
      <DatabaseConfig />
      <Functions />
      <ControllerClass />
      <DataHandlerClass />
    </div>
  );
}

export default App;
