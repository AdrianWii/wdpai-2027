<?php $stylesheets = ['/css/login.css']; ?>

<main>
    <form id="login" method="post" action="/login">
        <h1>Logowanie</h1>

        <label for="email"><span aria-hidden="true">@</span> Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password"><span aria-hidden="true">◆</span> Hasło:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Zaloguj się</button>
    </form>
</main>
