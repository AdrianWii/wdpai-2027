
<?php $stylesheets = ['/css/projects.css']; ?>

<main class="project-details">
    <a class="project-details__back" href="/projects">← Wróć do listy</a>
    <p class="projects-header__eyebrow">Projekt #<?= htmlspecialchars((string) $project['id'], ENT_QUOTES, 'UTF-8') ?></p>
    <h1><?= htmlspecialchars((string) $project['name'], ENT_QUOTES, 'UTF-8') ?></h1>
    <p><?= htmlspecialchars((string) $project['description'], ENT_QUOTES, 'UTF-8') ?></p>
    <dl>
        <div>
            <dt>Status</dt>
            <dd><?= htmlspecialchars((string) $project['status'], ENT_QUOTES, 'UTF-8') ?></dd>
        </div>
        <div>
            <dt>Właściciel</dt>
            <dd><?= htmlspecialchars((string) ($project['owner_name'] ?? $project['owner_email']), ENT_QUOTES, 'UTF-8') ?></dd>
        </div>
        <div>
            <dt>E-mail</dt>
            <dd><?= htmlspecialchars((string) $project['owner_email'], ENT_QUOTES, 'UTF-8') ?></dd>
        </div>
    </dl>
</main>
