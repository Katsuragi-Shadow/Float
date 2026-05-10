<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Float - Últimas notícias do mundo dos jogos indie e da plataforma.">
    <title>Float | Notícias</title>

    <link rel="stylesheet" href="../assets/css/global/global.css" />
    <link rel="stylesheet" href="../assets/css/pages/noticias.css" />
    <link rel="icon" href="../assets/img/favicon/icone.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@700&family=Inter:wght@400;600;700;900&display=swap" rel="stylesheet" />
</head>

<body>

    <nav class="nav-wrapper">
        <div class="nav-content">
            <a href="../index.php" class="brand-logo" aria-label="Página Inicial">
                <img src="../assets/img/global/logo.png" alt="Float Logo" class="logo-image-custom">
            </a>

            <ul class="nav-list-center" id="nav-menu">
                <li class="nav-item has-dropdown">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-compass nav-custom-icon"></i>
                        Descubra
                        <i class="fas fa-chevron-down chevron-icon"></i>
                    </a>
                    <div class="mega-menu-wrapper">
                        <div class="mega-menu-inner layout-com-midia">
                            <div class="area-conteudo">
                                <div class="menu-column">
                                    <h3><i class="fa-solid fa-fire header-icon"></i> Tendências do Float</h3>
                                    <a href="#" class="rich-link-item">
                                        <span class="item-title"><i class="fa-solid fa-bolt mini-icon-left"></i> Mais Jogados</span>
                                        <span class="item-desc">Os títulos indie que estão dominando a comunidade nesta semana.</span>
                                    </a>
                                    <a href="#" class="rich-link-item">
                                        <span class="item-title"><i class="fa-solid fa-calendar-days mini-icon-left"></i> Recém Postados</span>
                                        <span class="item-desc">Descubra novos talentos e seja o primeiro a comentar nos projetos.</span>
                                    </a>
                                </div>
                                <div class="menu-column">
                                    <h3><i class="fa-solid fa-layer-group header-icon"></i> Categorias</h3>
                                    <a href="#" class="rich-link-item">
                                        <span class="item-title"><i class="fa-solid fa-ghost mini-icon-left"></i> Terror &amp; Suspense</span>
                                        <span class="item-desc">Experiências imersivas criadas por desenvolvedores solo.</span>
                                    </a>
                                    <a href="#" class="rich-link-item">
                                        <span class="item-title"><i class="fa-solid fa-puzzle-piece mini-icon-left"></i> Quebra-cabeça</span>
                                        <span class="item-desc">Jogos casuais para treinar sua mente entre uma partida e outra.</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="nav-item has-dropdown">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-book-bookmark nav-custom-icon"></i>
                        Biblioteca
                        <i class="fas fa-chevron-down chevron-icon"></i>
                    </a>
                    <div class="mega-menu-wrapper">
                        <div class="mega-menu-inner layout-dividido">
                            <div class="menu-column column-relative">
                                <h3><i class="fa-solid fa-box-open header-icon"></i> Meu Acervo</h3>
                                <a href="#" class="rich-link-item">
                                    <span class="item-title"><i class="fa-solid fa-gamepad mini-icon-left"></i> Meus Jogos</span>
                                    <span class="item-desc">Acesse sua lista completa de títulos salvos e baixados.</span>
                                </a>
                                <a href="#" class="rich-link-item">
                                    <span class="item-title"><i class="fa-solid fa-heart mini-icon-left"></i> Lista de Desejos</span>
                                    <span class="item-desc">Acompanhe o progresso dos jogos que você mais amou.</span>
                                </a>
                            </div>
                            <div class="menu-column">
                                <h3><i class="fa-solid fa-trophy header-icon"></i> Conquistas</h3>
                                <a href="#" class="rich-link-item">
                                    <span class="item-title"><i class="fa-solid fa-medal mini-icon-left"></i> Badges de Membro</span>
                                    <span class="item-desc">Ganhe insígnias apoiando desenvolvedores.</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="nav-item has-dropdown">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-users-viewfinder nav-custom-icon"></i>
                        Comunidade
                        <i class="fas fa-chevron-down chevron-icon"></i>
                    </a>
                    <div class="mega-menu-wrapper">
                        <div class="mega-menu-inner layout-update-column">
                            <div class="menu-column">
                                <h3><i class="fa-solid fa-bullhorn header-icon"></i> Social</h3>
                                <a href="#" class="rich-link-item">
                                    <span class="item-title"><i class="fa-solid fa-comments mini-icon-left"></i> Fóruns de Discussão</span>
                                    <span class="item-desc">Troque ideias e feedbacks com outros jogadores.</span>
                                </a>
                                <a href="#" class="rich-link-item">
                                    <span class="item-title"><i class="fa-solid fa-handshake-angle mini-icon-left"></i> Game Jams</span>
                                    <span class="item-desc">Participe de competições de criação de jogos.</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="nav-item has-dropdown">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-code-merge nav-custom-icon"></i>
                        Projetos
                        <i class="fas fa-chevron-down chevron-icon"></i>
                    </a>
                    <div class="mega-menu-wrapper">
                        <div class="mega-menu-inner layout-update-column">
                            <div class="menu-column">
                                <h3><i class="fa-solid fa-laptop-code header-icon"></i> Dashboard Dev</h3>
                                <a href="#" class="rich-link-item">
                                    <span class="item-title"><i class="fa-solid fa-upload mini-icon-left"></i> Publicar Jogo</span>
                                    <span class="item-desc">Envie seu projeto e comece a construir sua audiência.</span>
                                </a>
                                <a href="#" class="rich-link-item">
                                    <span class="item-title"><i class="fa-solid fa-chart-line mini-icon-left"></i> Estatísticas</span>
                                    <span class="item-desc">Veja quantos downloads e visitas seu jogo recebeu.</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>

            <div class="nav-actions">
                <?php if (!isset($_SESSION['id'])): ?>
                    <a href="../pages/login.php" class="btn-destaque">FAZER LOGIN</a>
                <?php else: ?>
                    <div class="nav-auth-profile">
                        <button class="profile-avatar-btn" id="profileTrigger">
                            <img src="../assets/img/user/avatar.png" alt="Avatar" class="nav-user-img">
                        </button>
                        <div class="profile-mega-menu" id="profileDropdown">
                            <div class="menu-header">
                                <span class="user-name">Usuário Float</span>
                                <span class="user-status"><i class="fas fa-circle"></i> Online</span>
                            </div>
                            <div class="menu-divider"></div>
                            <ul class="menu-list">
                                <li><a href="perfil.php"><i class="fas fa-user-circle"></i> <span>Meu Perfil</span></a></li>
                                <li><a href="../api/logout.php" class="logout-item"><i class="fas fa-sign-out-alt"></i> <span>Sair</span></a></li>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <button id="menu-toggle" aria-label="Abrir menu" class="mobile-menu-btn">
            <i class="fas fa-bars"></i>
        </button>
    </nav>

    <main class="noticias-main">

        <!-- Cabeçalho da página -->
        <header class="noticias-page-header">
            <div class="noticias-page-header-inner">
                <a href="../index.php" class="back-home">
                    <i class="fa-solid fa-arrow-left" aria-hidden="true"></i> Voltar à Página Inicial
                </a>
                <div class="noticias-page-title-block">
                    <span class="noticias-page-eyebrow"><i class="fa-solid fa-newspaper"></i> Float News</span>
                    <h1 class="noticias-page-title">Notícias &amp; Atualizações</h1>
                    <p class="noticias-page-subtitle">As últimas novidades do universo indie e da plataforma Float.</p>
                </div>

                <!-- Filtros por categoria -->
                <div class="noticias-filters" role="group" aria-label="Filtrar notícias por categoria">
                    <button class="noticias-filter-btn active" data-filter="all">Todas</button>
                    <button class="noticias-filter-btn" data-filter="atualização">Atualização</button>
                    <button class="noticias-filter-btn" data-filter="lançamento">Lançamento</button>
                    <button class="noticias-filter-btn" data-filter="comunidade">Comunidade</button>
                    <button class="noticias-filter-btn" data-filter="plataforma">Plataforma</button>
                </div>
            </div>
        </header>

        <!-- Grid de notícias -->
        <section class="noticias-grid-section">
            <div class="noticias-grid" id="noticiasGrid">

                <article class="noticias-card noticias-card--hero" data-category="atualização">
                    <div class="noticias-card-cover">
                        <img src="../assets/img/pages/index/slide_04.png" alt="Celeste recebe atualização surpresa" loading="lazy">
                        <span class="noticias-badge">Atualização</span>
                    </div>
                    <div class="noticias-card-body">
                        <time class="noticias-date"><i class="fa-regular fa-clock"></i> 8 maio 2026</time>
                        <h2 class="noticias-title">Celeste recebe patch surpresa com novo modo de dificuldade após 3 anos</h2>
                        <p class="noticias-excerpt">Maddy Thorson anunciou uma atualização gratuita que adiciona o "Crystal Heart Mode", revisitando as fases mais icônicas com mecânicas inéditas e uma trilha sonora expandida por Lena Raine.</p>
                        <a href="#" class="noticias-read-more">Ler matéria completa <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </article>

                <article class="noticias-card" data-category="comunidade">
                    <div class="noticias-card-cover">
                        <img src="../assets/img/pages/index/slide_02.png" alt="Game Jam Float 2026" loading="lazy">
                        <span class="noticias-badge">Comunidade</span>
                    </div>
                    <div class="noticias-card-body">
                        <time class="noticias-date"><i class="fa-regular fa-clock"></i> 5 maio 2026</time>
                        <h2 class="noticias-title">Float anuncia sua primeira Game Jam com prêmio de destaque na plataforma</h2>
                        <p class="noticias-excerpt">Desenvolvedores independentes terão 72 horas para criar um jogo dentro do tema revelado ao vivo. Inscrições abertas.</p>
                        <a href="#" class="noticias-read-more">Ler matéria completa <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </article>

                <article class="noticias-card" data-category="lançamento">
                    <div class="noticias-card-cover">
                        <img src="../assets/img/pages/index/slide_01.png" alt="Deltarune capítulo 3" loading="lazy">
                        <span class="noticias-badge">Lançamento</span>
                    </div>
                    <div class="noticias-card-body">
                        <time class="noticias-date"><i class="fa-regular fa-clock"></i> 1 maio 2026</time>
                        <h2 class="noticias-title">Toby Fox confirma data para os capítulos 3 e 4 de Deltarune</h2>
                        <p class="noticias-excerpt">Em post no blog oficial, o criador de Undertale detalhou o estado do desenvolvimento e surpreendeu fãs com uma revelação inesperada.</p>
                        <a href="#" class="noticias-read-more">Ler matéria completa <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </article>

                <article class="noticias-card" data-category="plataforma">
                    <div class="noticias-card-cover">
                        <img src="../assets/img/pages/index/slide_03.png" alt="Float versão 0.3" loading="lazy">
                        <span class="noticias-badge">Plataforma</span>
                    </div>
                    <div class="noticias-card-body">
                        <time class="noticias-date"><i class="fa-regular fa-clock"></i> 28 abr 2026</time>
                        <h2 class="noticias-title">Float 0.3 chega com sistema de avaliações, conquistas e perfil expandido</h2>
                        <p class="noticias-excerpt">A nova versão da plataforma traz um sistema completo de avaliações por estrelas, badges de conquista e a nova página de perfil público dos desenvolvedores.</p>
                        <a href="#" class="noticias-read-more">Ler matéria completa <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </article>

                <article class="noticias-card" data-category="atualização">
                    <div class="noticias-card-cover">
                        <img src="../assets/img/pages/index/slide_02.png" alt="Hades II atualização" loading="lazy">
                        <span class="noticias-badge">Atualização</span>
                    </div>
                    <div class="noticias-card-body">
                        <time class="noticias-date"><i class="fa-regular fa-clock"></i> 20 abr 2026</time>
                        <h2 class="noticias-title">Hades II recebe grande atualização de Early Access com novo bioma e chefão</h2>
                        <p class="noticias-excerpt">A Supergiant lançou a segunda grande atualização de conteúdo, expandindo a progressão com uma área inédita nas profundezas do submundo.</p>
                        <a href="#" class="noticias-read-more">Ler matéria completa <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </article>

                <article class="noticias-card" data-category="lançamento">
                    <div class="noticias-card-cover">
                        <img src="../assets/img/pages/index/card_01.png" alt="Hollow Knight Silksong" loading="lazy">
                        <span class="noticias-badge">Lançamento</span>
                    </div>
                    <div class="noticias-card-body">
                        <time class="noticias-date"><i class="fa-regular fa-clock"></i> 15 abr 2026</time>
                        <h2 class="noticias-title">Hollow Knight: Silksong finalmente tem janela de lançamento revelada</h2>
                        <p class="noticias-excerpt">A Team Cherry confirmou uma janela de lançamento durante um evento surpresa, encerrando anos de espera da comunidade.</p>
                        <a href="#" class="noticias-read-more">Ler matéria completa <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </article>

            </div>

            <!-- Estado vazio (filtros sem resultado) -->
            <div class="noticias-empty" id="noticiasEmpty" style="display:none;" aria-live="polite">
                <i class="fa-solid fa-newspaper"></i>
                <p>Nenhuma notícia encontrada para esse filtro.</p>
            </div>
        </section>

    </main>

    <footer class="footer-modern">
        <div class="footer-container">
            <div class="footer-main">
                <div class="footer-brand-section">
                    <img src="../assets/img/global/logo.png" alt="Float Logo" class="logo-image-custom-footer">
                    <div class="footer-brand-text">
                        <h3 style="color:#fff;">Plataforma Float</h3>
                        <p style="color:#666;font-size:.8rem;">A casa do desenvolvimento independente. Versão Alpha 0.02</p>
                    </div>
                </div>
                <div class="footer-socials-modern">
                    <a href="#" target="_blank" rel="noopener noreferrer" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" target="_blank" rel="noopener noreferrer" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                    <a href="#" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" target="_blank" rel="noopener noreferrer" aria-label="Discord"><i class="fab fa-discord"></i></a>
                </div>
            </div>
            <div class="footer-links-section">
                <div class="footer-column">
                    <h4>Plataforma</h4>
                    <a href="#">Sobre a Float</a>
                    <a href="#">Blog Oficial</a>
                    <a href="#">Carreiras</a>
                </div>
                <div class="footer-column">
                    <h4>Navegação</h4>
                    <a href="#">Explorar Jogos</a>
                    <a href="#">Categorias</a>
                    <a href="#">Desenvolvedores</a>
                </div>
                <div class="footer-column">
                    <h4>Suporte</h4>
                    <a href="#">Central de Ajuda</a>
                    <a href="#">Diretrizes</a>
                    <a href="#">Contato</a>
                </div>
                <div class="footer-column">
                    <h4>Legal</h4>
                    <a href="#">Termos de Uso</a>
                    <a href="#">Privacidade</a>
                </div>
            </div>
            <div class="footer-bottom-modern">
                <div class="footer-left">
                    <p>© 2026 Float. Feito com <i class="fa-solid fa-heart" style="color:var(--Fogo);"></i> para a comunidade indie.</p>
                    <p>Conectando ideias, <span style="color:var(--zzz-yellow);">elevando o jogo.</span></p>
                </div>
            </div>
        </div>
    </footer>

    <script src="../assets/js/global/global.js"></script>
    <script src="../assets/js/pages/noticias.js"></script>

</body>
</html>
