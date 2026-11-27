<?php
$stylesheets = ['/css/projects.css', '/css/add-project.css'];
$activeNavigation = 'projects';
?>

<div class="dashboard">
    <?php require __DIR__ . '/components/dashboard-sidebar.html.php'; ?>

    <div class="dashboard__stage">
        <header class="dashboard__topbar">
            <div>
                <p>Przestrzeń robocza</p>
                <strong>Nowy projekt</strong>
            </div>
        </header>

        <main class="dashboard__main">
            <header class="projects-header">
                <p class="projects-header__eyebrow">Nowy rekord</p>
                <h1>Dodaj projekt</h1>
                <p>Uzupełnij dane projektu i przypisz go do właściciela.</p>
            </header>

            <?php if ($errors !== []): ?>
                <div class="form-errors" role="alert">
                    <p>Popraw poniższe pola:</p>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?= htmlspecialchars((string) $error, ENT_QUOTES, 'UTF-8') ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form class="project-form" method="post" action="/project">
                <div class="project-form__field">
                    <label for="user_id">Właściciel</label>
                    <select id="user_id" name="user_id" required>
                        <option value="">Wybierz użytkownika</option>
                        <?php foreach ($users as $user): ?>
                            <option
                                value="<?= htmlspecialchars((string) $user['id'], ENT_QUOTES, 'UTF-8') ?>"
                                <?= (string) $old['user_id'] === (string) $user['id'] ? 'selected' : '' ?>
                            >
                                <?= htmlspecialchars((string) ($user['full_name'] ?: $user['email']), ENT_QUOTES, 'UTF-8') ?>
                                (<?= htmlspecialchars((string) $user['email'], ENT_QUOTES, 'UTF-8') ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="project-form__field">
                    <label for="name">Nazwa projektu</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        maxlength="120"
                        value="<?= htmlspecialchars((string) $old['name'], ENT_QUOTES, 'UTF-8') ?>"
                        required
                    >
                </div>

                <div class="project-form__field">
                    <label for="description">Opis projektu</label>
                    <textarea id="description" name="description" rows="6" required><?= htmlspecialchars((string) $old['description'], ENT_QUOTES, 'UTF-8') ?></textarea>
                </div>

                <div class="project-form__field">
                    <label for="status">Status</label>
                    <select id="status" name="status" required>
                        <?php foreach ($statuses as $statusValue => $statusLabel): ?>
                            <option
                                value="<?= htmlspecialchars((string) $statusValue, ENT_QUOTES, 'UTF-8') ?>"
                                <?= $old['status'] === $statusValue ? 'selected' : '' ?>
                            >
                                <?= htmlspecialchars((string) $statusLabel, ENT_QUOTES, 'UTF-8') ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="project-form__actions">
                    <button type="submit">Dodaj projekt</button>
                    <a class="project-form__cancel" href="/projects">Anuluj</a>
                </div>
            </form>
        </main>
    </div>
</div>
