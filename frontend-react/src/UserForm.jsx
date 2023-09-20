// UserForm.js
import React, { useState } from 'react';
import axios from 'axios';
import { backend_url } from './constants';

const UserForm = ({ addUser, history }) => {
  const [name, setName] = useState('');
  const [email, setEmail] = useState('');

  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      await saveUser({ name, email });
      history.push('/');
    } catch (error) {
      //
    }
  };

  const saveUser = async (user) => {
    try {
      const response = await axios.post(backend_url+ '/user', user);
      return response.user;
    } catch (error) {
      console.error('Error al guardar el usuario:', error);
      throw error;
    }
  };

  return (
    <>
    <div>
      <h2>Crear Usuario</h2>
      <form onSubmit={handleSubmit}>
        <div>
          <label htmlFor="name">Name:</label>
          <input
            type="text"
            id="name"
            value={name}
            onChange={(e) => setName(e.target.value)}
          />
        </div>
        <div>
          <label htmlFor="email">Correo Electrónico:</label>
          <input
            type="email"
            id="email"
            value={email}
            onChange={(e) => setEmail(e.target.value)}
          />
        </div>
        <button type="submit">Save</button>
      </form>
    </div>
    </>
  );
};

export default UserForm;
