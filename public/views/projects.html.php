<?php
$stylesheets = ['/css/projects.css'];
$activeNavigation = 'projects';
?>

<div class="dashboard">
    <?php require __DIR__ . '/components/dashboard-sidebar.html.php'; ?>

    <div class="dashboard__stage">
        <header class="dashboard__topbar">
            <div>
                <p>Przestrzeń robocza</p>
                <strong>Wszystkie projekty</strong>
            </div>
        </header>

        <main class="dashboard__main">
            <header class="projects-header">
                <p class="projects-header__eyebrow">Dane z PostgreSQL</p>
                <h1>Projekty</h1>
                <p>Każdy projekt jest połączony z właścicielem przez klucz obcy <code>projects.user_id</code>.</p>
            </header>

            <?php if ($projects === []): ?>
                <p class="projects-empty">Brak projektów do wyświetlenia.</p>
            <?php else: ?>
                <div class="projects-grid">
                    <?php foreach ($projects as $project): ?>
                        <article class="project-card">
                            <div class="project-card__meta">
                                <span class="project-card__status project-card__status--<?= htmlspecialchars((string) $project['status'], ENT_QUOTES, 'UTF-8') ?>">
                                    <?= htmlspecialchars((string) $project['status'], ENT_QUOTES, 'UTF-8') ?>
                                </span>
                                <span>#<?= htmlspecialchars((string) $project['id'], ENT_QUOTES, 'UTF-8') ?></span>
                            </div>
                            <h2>
                                <a href="/projects/<?= htmlspecialchars((string) $project['id'], ENT_QUOTES, 'UTF-8') ?>">
                                    <?= htmlspecialchars((string) $project['name'], ENT_QUOTES, 'UTF-8') ?>
                                </a>
                            </h2>
                            <p><?= htmlspecialchars((string) $project['description'], ENT_QUOTES, 'UTF-8') ?></p>
                            <footer>
                                Właściciel:
                                <strong><?= htmlspecialchars((string) ($project['owner_name'] ?? $project['owner_email']), ENT_QUOTES, 'UTF-8') ?></strong>
                            </footer>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </main>
    </div>
</div>
