<header class="page-hero">
    <div class="overlay">
        <h1>Contact</h1>
        <p>Stuur ons een bericht of neem direct contact op.</p>
    </div>
</header>

<main class="content-page">
    <section class="content-block">
        <?php if (!empty($errors)): ?>
            <ul class="form-errors">
                <?php foreach ($errors as $error): ?>
                    <li><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <?php if (!empty($success)): ?>
            <p class="form-success"><?= htmlspecialchars($success, ENT_QUOTES, 'UTF-8') ?></p>
        <?php endif; ?>

        <form method="post">
            <input type="text" name="name" placeholder="Naam" required value="<?= htmlspecialchars($form['name'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
            <input type="email" name="email" placeholder="E-mailadres" required value="<?= htmlspecialchars($form['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
            <textarea name="message" rows="6" placeholder="Bericht" required><?= htmlspecialchars($form['message'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
            <button type="submit">Verstuur</button>
        </form>
    </section>
</main>