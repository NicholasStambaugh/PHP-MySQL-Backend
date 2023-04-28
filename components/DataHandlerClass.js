import React, { useState, useEffect } from 'react';

function DataHandlerClass() {
  const [data, setData] = useState([]);

  useEffect(() => {
    fetch('/class/datahandler.class.php')
      .then(response => response.json())
      .then(data => setData(data));
  }, []);

  return (
    <div>
      <h2>Data Handler Class</h2>
      <ul>
        {data.map(item => (
          <li key={item.id}>{item.name}</li>
        ))}
      </ul>
    </div>
  );
}

export default DataHandlerClass;
