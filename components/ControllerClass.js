import React, { useState, useEffect } from 'react';

function ControllerClass() {
  const [data, setData] = useState([]);

  useEffect(() => {
    fetch('/class/controller.class.php')
      .then(response => response.json())
      .then(data => setData(data));
  }, []);

  return (
    <div>
      <h2>Controller Class</h2>
      <ul>
        {data.map(item => (
          <li key={item.id}>{item.name}</li>
        ))}
      </ul>
    </div>
  );
}

export default ControllerClass;
