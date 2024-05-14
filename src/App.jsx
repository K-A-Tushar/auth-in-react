import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import Login from "./auth/Login";
import Registration from "./auth/Registration";
import Home from "./components/Home";
import NavBar from "./components/NavBar";
import Blogs from "./components/Blogs";
import NoPage from "./components/NoPage";
import { AuthWrapper } from "./auth/AuthUse";
import './App.css'

function App() {
  return (
      <AuthWrapper>
        <NavBar />
        <Routes>
          <Route path="/" element={<Home />} />
          <Route path="blogs" element={<Blogs />} />
          <Route path="login" element={<Login />} />
          <Route path="register" element={<Registration />} />
          <Route path="*" element={<NoPage />} />
        </Routes>
      </AuthWrapper>
  )
}

export default App;
