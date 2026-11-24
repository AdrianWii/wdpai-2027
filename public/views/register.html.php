<?php $stylesheets = ['/css/login.css']; ?>

<main>
    <form id="register" method="post" action="/register">
        <h1>Rejestracja</h1>

        <label for="email"><span aria-hidden="true">@</span> Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password"><span aria-hidden="true">◆</span> Hasło:</label>
        <input type="password" id="password" name="password" required>

        <label for="confirm_password"><span aria-hidden="true">◆</span> Potwierdź hasło:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>

        <button type="submit">Zarejestruj się</button>
    </form>
</main>
