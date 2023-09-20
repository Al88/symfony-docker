import { useEffect, useState } from 'react'
import './App.css'
import Axios from "axios";
import { backend_url } from './constants';

function UsersList() {
  const [users, setUsers] = useState([]);

  useEffect(() => {
      Axios({
        url: backend_url,

      })
      .then((response) => {
          setUsers(response.data.users);

      })
      .catch((error) => {
        console.log(error);
      });
  }, [setUsers]);

  return (
    <>
      <h3>List alci</h3>
      <div className="card">
        {users?.map((user, index) => (
          <p key={index} >{user.name}</p>
        ))}
    </div>
    </>
  )
}

export default UsersList
