import React, { useEffect, useContext } from 'react';
import { BrowserRouter as Router, useNavigate } from 'react-router-dom';
import { AuthProvider, AuthContext } from './AuthContext';

const ProviderWrapper = ({ children }) => {
  const navigate = useNavigate();
  const { authData, login, logout } = useContext(AuthContext);

  const authProviderValue = {
    authData,
    login,
    logout,
    navigate,
  };

  useEffect(() => {
    const authDataStr = localStorage.getItem('authData');
    if (authDataStr) {
      const authData = JSON.parse(authDataStr);
      if (!authData.user) {
        localStorage.removeItem('authData');
      }
    }
  }, []);

  return <AuthProvider value={authProviderValue}>
    {children}
  </AuthProvider>;
};

const AuthWrapper = ({ children }) => {
  return (
    <Router>
      <ProviderWrapper>{children}</ProviderWrapper>
    </Router>
  );
};

const AuthUse = () => {
  const { login, logout, authData, navigate } = useContext(AuthContext);
  return { login, logout, authData, navigate };
};

export { AuthWrapper, AuthUse };
