<?php
$stylesheets = ['/css/projects.css', '/css/home.css'];
?>

<div class="dashboard">
    <?php require __DIR__ . '/components/dashboard-sidebar.html.php'; ?>

    <div class="dashboard__stage">
        <header class="dashboard__topbar">
            <div>
                <p>Przestrzeń robocza</p>
                <strong>Użytkownicy</strong>
            </div>
        </header>

        <main class="dashboard__main">
            <header class="projects-header">
                <p class="projects-header__eyebrow">Dane z PostgreSQL</p>
                <h1>Użytkownicy</h1>
                <p>Lista użytkowników powiązanych z projektami w bazie danych.</p>
            </header>

            <?php if ($users === []): ?>
                <p class="projects-empty">Brak użytkowników do wyświetlenia.</p>
            <?php else: ?>
                <div class="users-grid">
                    <?php foreach ($users as $user): ?>
                        <article class="user-card">
                            <span class="user-card__avatar" aria-hidden="true">U</span>
                            <div class="user-card__details">
                                <h2><?= htmlspecialchars((string) $user['full_name'], ENT_QUOTES, 'UTF-8') ?></h2>
                                <p><?= htmlspecialchars((string) $user['email'], ENT_QUOTES, 'UTF-8') ?></p>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </main>
    </div>
</div>
