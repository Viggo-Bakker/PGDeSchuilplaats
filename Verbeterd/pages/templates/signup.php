<section id="login">
    <h2>Nieuwe gebruiker</h2>

    <?php if (!empty($error)): ?>
        <p class="form-errors"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p>
    <?php endif; ?>

    <?php if (!empty($success)): ?>
        <p class="form-success"><?= htmlspecialchars($success, ENT_QUOTES, 'UTF-8') ?></p>
    <?php endif; ?>

    <form method="post">
        <input type="text" name="username" placeholder="Gebruikersnaam" required>
        <input type="password" name="password" placeholder="Wachtwoord" required>
        <button type="submit">Opslaan</button>
    </form>
</section>