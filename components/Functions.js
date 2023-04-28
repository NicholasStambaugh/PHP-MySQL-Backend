import React, { useState, useEffect } from 'react';

function Functions() {
  const [data, setData] = useState([]);

  useEffect(() => {
    fetch('/functions')
      .then(response => response.json())
      .then(data => setData(data));
  }, []);

  return (
    <div>
      <h2>Functions</h2>
      <ul>
        {data.map(item => (
          <li key={item.id}>{item.name}</li>
        ))}
      </ul>
    </div>
  );
}

export default Functions;
