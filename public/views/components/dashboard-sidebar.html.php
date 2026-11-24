<aside class="dashboard__sidebar">
    <a class="dashboard__brand" href="/" aria-label="Project Dashboard — strona główna">
        <span class="dashboard__brand-mark" aria-hidden="true">P</span>
        <span>
            <strong>Project</strong>
            <small>Dashboard</small>
        </span>
    </a>

    <nav class="dashboard__sidebar-nav" aria-label="Menu panelu">
        <p class="dashboard__menu-label">Nawigacja</p>
        <ul class="dashboard__menu">
            <li>
                <a
                    class="<?= ($activeNavigation ?? '') === 'projects' ? 'is-active' : '' ?>"
                    href="/projects"
                    <?= ($activeNavigation ?? '') === 'projects' ? 'aria-current="page"' : '' ?>
                >
                    <span class="dashboard__menu-icon" aria-hidden="true">▦</span>
                    <span>Projekty</span>
                </a>
            </li>
            <li>
                <a
                    class="<?= ($activeNavigation ?? '') === 'about' ? 'is-active' : '' ?>"
                    href="/about"
                    <?= ($activeNavigation ?? '') === 'about' ? 'aria-current="page"' : '' ?>
                >
                    <span class="dashboard__menu-icon" aria-hidden="true">i</span>
                    <span>O aplikacji</span>
                </a>
            </li>
        </ul>

        <a class="dashboard__logout" href="/logout">
            <span class="dashboard__menu-icon" aria-hidden="true">↪</span>
            <span>Wyloguj</span>
        </a>
    </nav>
</aside>
