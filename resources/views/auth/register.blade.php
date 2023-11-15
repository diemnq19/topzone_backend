<form method="POST" action="{{ route('register') }}">
    @csrf

    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>

    <label for="address">Address:</label>
    <input type="text" name="address" id="address" required>

    <label for="phone">Phone:</label>
    <input type="text" name="phone" id="phone" required>

    <button type="submit">Register</button>
</form>
