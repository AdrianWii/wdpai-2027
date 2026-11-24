<?php
$stylesheets = ['/css/projects.css', '/css/about.css'];
$activeNavigation = 'about';
?>

<div class="dashboard">
    <?php require __DIR__ . '/components/dashboard-sidebar.html.php'; ?>

    <div class="dashboard__stage">
        <header class="dashboard__topbar">
            <div>
                <p>Informacje</p>
                <strong>O aplikacji</strong>
            </div>
        </header>

        <main class="dashboard__main about">
            <h1 class="about__title">O aplikacji</h1>

            <p class="about__description">
                To edukacyjna aplikacja webowa napisana w czystym PHP 8.3.
            </p>

            <section class="about__contacts">
                <h2 class="about__heading">Kontakt</h2>

                <ul class="about__contact-list">
                    <?php foreach ($contacts as $contact): ?>
                        <li class="about__contact-card">
                            <p>
                                <?= htmlspecialchars((string) $contact['firstName'], ENT_QUOTES, 'UTF-8') ?>
                                <?= htmlspecialchars((string) $contact['lastName'], ENT_QUOTES, 'UTF-8') ?>
                            </p>
                            <a
                                class="about__link"
                                href="mailto:<?= htmlspecialchars((string) $contact['email'], ENT_QUOTES, 'UTF-8') ?>"
                            >
                                <?= htmlspecialchars((string) $contact['email'], ENT_QUOTES, 'UTF-8') ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </section>
        </main>
    </div>
</div>
