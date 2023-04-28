import React, { useState, useEffect } from 'react';

function DatabaseConfig() {
  const [data, setData] = useState([]);

  useEffect(() => {
    fetch('/database')
      .then(response => response.json())
      .then(data => setData(data));
  }, []);

  return (
    <div>
      <h2>Database Config</h2>
      <ul>
        {data.map(item => (
          <li key={item.id}>{item.name}</li>
        ))}
      </ul>
    </div>
  );
}

export default DatabaseConfig;
