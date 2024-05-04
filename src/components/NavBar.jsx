// src/components/NavBar.jsx
import React, { useContext, useCallback } from "react";
import { Outlet, Link } from "react-router-dom";
import { AuthContext } from "../auth/AuthContext";

const NavBar = () => {
  const { authData, logout } = useContext(AuthContext);
  const handleLogout = useCallback(() => {
    logout();
  }, [logout]);

  return (
    <>
      <nav>
        <ul>
          <li>
            <Link to="/">Home</Link>
          </li>
          <li>
            <Link to="/blogs">Blogs</Link>
          </li>
          {authData?.user ? (
            <>
              <li>
                <Link to="/" onClick={handleLogout}>
                  Logout
                </Link>
              </li>
              <li>User: {authData.user.username}</li>
              <li>Email: {authData.user.email}</li>
              <li>Role: {authData.user.role}</li>
            </>
          ) : (
            <>
              <li>
                <Link to="/login">Login</Link>
              </li>
              <li>
                <Link to="/register">Register</Link>
              </li>
            </>
          )}
        </ul>
      </nav>
      <Outlet />
    </>
  );
};

export default NavBar;

