<section id="login">
    <h2>Log in</h2>

    <?php if (!empty($error)): ?>
        <p class="form-errors"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p>
    <?php endif; ?>

    <form method="post">
        <input type="text" name="username" placeholder="Gebruikersnaam" required>
        <input type="password" name="password" placeholder="Wachtwoord" required>
        <button type="submit">Log in</button>
    </form>
</section>