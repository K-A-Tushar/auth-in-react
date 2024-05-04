const UserRegistration = () => (
  <div>
    <form>
      <div>
        <label htmlFor="username">Username</label>
        <input id="username" placeholder="Enter username" />
      </div>
      <div>
        <label htmlFor="email">Email</label>
        <input id="email" placeholder="Enter email" />
      </div>
      <div>
        <label htmlFor="password">Password</label>
        <input id="password" placeholder="Enter password" />
      </div>
      <div>
        <button type="submit">Register</button>
      </div>
    </form>
  </div>
);

export default UserRegistration;

