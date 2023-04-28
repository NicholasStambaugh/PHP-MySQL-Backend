import React, { useState, useEffect } from 'react';

function BackendData() {
  const [data, setData] = useState([]);

  useEffect(() => {
    fetch('/config')
      .then(response => response.json())
      .then(data => setData(data));
  }, []);

  return (
    <div>
      <h2>Backend Data</h2>
      <ul>
        {data.map(item => (
          <li key={item.id}>{item.name}</li>
        ))}
      </ul>
    </div>
  );
}

export default BackendData;
