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
                <strong>Szczegóły projektu</strong>
            </div>
        </header>

        <main class="dashboard__main">
            <a class="project-details__back" href="/projects">← Wróć do projektów</a>

            <article class="project-details">
                <header class="project-details__header">
                    <div>
                        <p class="projects-header__eyebrow">
                            Projekt #<?= htmlspecialchars((string) $project['id'], ENT_QUOTES, 'UTF-8') ?>
                        </p>
                        <h1><?= htmlspecialchars((string) $project['name'], ENT_QUOTES, 'UTF-8') ?></h1>
                    </div>
                    <span class="project-card__status project-card__status--<?= htmlspecialchars((string) $project['status'], ENT_QUOTES, 'UTF-8') ?>">
                        <?= htmlspecialchars((string) $project['status'], ENT_QUOTES, 'UTF-8') ?>
                    </span>
                </header>

                <p class="project-details__description">
                    <?= htmlspecialchars((string) $project['description'], ENT_QUOTES, 'UTF-8') ?>
                </p>

                <dl class="project-details__meta">
                    <div>
                        <dt>Właściciel</dt>
                        <dd><?= htmlspecialchars((string) ($project['owner_name'] ?? $project['owner_email']), ENT_QUOTES, 'UTF-8') ?></dd>
                    </div>
                    <div>
                        <dt>E-mail</dt>
                        <dd><?= htmlspecialchars((string) $project['owner_email'], ENT_QUOTES, 'UTF-8') ?></dd>
                    </div>
                </dl>
            </article>
        </main>
    </div>
</div>
