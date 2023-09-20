import React from 'react';
import { BrowserRouter, Routes, Route } from "react-router-dom";
import UserForm from './UserForm';
import UsersList from './UsersList';

const RoutesApp = () => {
  return (
    <BrowserRouter>
      <Routes>
      <Route  path="/" element={<UsersList />}/>
      <Route  path="/user/create" element={<UserForm />}/>
      </Routes>
    </BrowserRouter>
  );
};

export default RoutesApp;