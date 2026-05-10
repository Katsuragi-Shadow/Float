<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '../../api/config/conexao.php';

$sessaoId  = $_SESSION['id'] ?? null;
$alvoId    = isset($_GET['id']) ? (int) $_GET['id'] : $sessaoId;

if (!$alvoId) {
    header('Location: login.php');
    exit;
}

$ehDono = ($sessaoId === $alvoId);

$stmtUsuario = $pdo->prepare('
    SELECT id, nome, bio, avatar_path, banner_path, criado_em
    FROM   usuario
    WHERE  id = ?
    LIMIT  1
');
$stmtUsuario->execute([$alvoId]);
$usuario = $stmtUsuario->fetch();

if (!$usuario) {
    http_response_code(404);
    echo '<p>Usuário não encontrado.</p>';
    exit;
}

$stmtSeg = $pdo->prepare('
    SELECT
        (SELECT COUNT(*) FROM seguidor WHERE seguido_id   = ?) AS seguidores,
        (SELECT COUNT(*) FROM seguidor WHERE seguidor_id  = ?) AS seguindo
');
$stmtSeg->execute([$alvoId, $alvoId]);
$contagens = $stmtSeg->fetch();

$jaSegue = false;
if ($sessaoId && !$ehDono) {
    $stmtCheck = $pdo->prepare('
        SELECT 1 FROM seguidor WHERE seguidor_id = ? AND seguido_id = ? LIMIT 1
    ');
    $stmtCheck->execute([$sessaoId, $alvoId]);
    $jaSegue = (bool) $stmtCheck->fetch();
}

$stmtJogos = $pdo->prepare('
    SELECT   j.id, j.titulo, j.descricao, j.thumbnail, j.genero,
             j.criado_em, j.atualizado_em,
             COALESCE(AVG(a.nota), 0)  AS media_nota,
             COUNT(a.id)               AS total_aval
    FROM     jogo j
    LEFT JOIN avaliacao a ON a.jogo_id = j.id
    WHERE    j.usuario_id   = ?
      AND    j.visibilidade = \'publico\'
    GROUP BY j.id
    ORDER BY j.criado_em DESC
');
$stmtJogos->execute([$alvoId]);
$jogos = $stmtJogos->fetchAll();

// --- Estatísticas (somente se houver jogos) ----------------------------------
$stats = [
    'total_jogos'       => count($jogos),
    'total_avaliacoes'  => 0,
    'media_geral'       => 0,
    'mais_avaliado'     => null,
    'menos_avaliado'    => null,
    'jogo_mais_antigo'  => null,
    'total_atualizacoes'=> 0,
];

if (!empty($jogos)) {
    $notasSoma  = 0;
    $notasTotal = 0;
    $melhorNota = -1;
    $piorNota   = PHP_INT_MAX;

    foreach ($jogos as $j) {
        $stats['total_avaliacoes'] += $j['total_aval'];
        $notasSoma  += $j['media_nota'] * $j['total_aval'];
        $notasTotal += $j['total_aval'];

        if ($j['total_aval'] > 0 && $j['media_nota'] > $melhorNota) {
            $melhorNota = $j['media_nota'];
            $stats['mais_avaliado'] = $j;
        }
        if ($j['total_aval'] > 0 && $j['media_nota'] < $piorNota) {
            $piorNota = $j['media_nota'];
            $stats['menos_avaliado'] = $j;
        }
    }

    $stats['media_geral']     = $notasTotal > 0 ? round($notasSoma / $notasTotal, 1) : 0;
    $stats['jogo_mais_antigo']= end($jogos)['criado_em'] ?? null;
}

// --- Tempo de conta ativo ----------------------------------------------------
$dataCriacao  = new DateTime($usuario['criado_em']);
$hoje         = new DateTime();
$diffConta    = $dataCriacao->diff($hoje);
if ($diffConta->y > 0) {
    $tempoContaStr = $diffConta->y . ' ano' . ($diffConta->y > 1 ? 's' : '');
} elseif ($diffConta->m > 0) {
    $tempoContaStr = $diffConta->m . ' mês' . ($diffConta->m > 1 ? 'es' : '');
} else {
    $tempoContaStr = $diffConta->d . ' dia' . ($diffConta->d > 1 ? 's' : '');
}

// --- Caminhos de assets -------------------------------------------------------
$avatarDefault = '../assets/img/user/avatar.png';
$bannerDefault = '';   // Sem banner = fundo em gradiente
$avatarSrc     = $usuario['avatar_path']
                    ? '../assets/img/user/avatars/' . htmlspecialchars($usuario['avatar_path'])
                    : $avatarDefault;
$bannerSrc     = $usuario['banner_path']
                    ? '../assets/img/user/banners/' . htmlspecialchars($usuario['banner_path'])
                    : '';

$nomeSanitizado = htmlspecialchars($usuario['nome']);
$bioSanitizada  = htmlspecialchars($usuario['bio'] ?? '');
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Perfil de <?= $nomeSanitizado ?> na Float.">
    <title>Float | <?= $nomeSanitizado ?></title>

    <link rel="stylesheet" href="../assets/css/global/global.css" />
    <link rel="stylesheet" href="../assets/css/pages/perfil.css" />
    <link rel="icon" href="../assets/img/favicon/icone.ico" type="image/x-icon" />

    <!-- Fontes & Ícones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@700&family=Inter:wght@400;600;700;900&display=swap" rel="stylesheet" />

    <!-- Cropper.js (apenas para o dono do perfil) -->
    <?php if ($ehDono): ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.css" />
    <?php endif; ?>
</head>

<body>

<!-- ═══════════════════════════════════════════
     NAVBAR  (reutiliza a mesma estrutura global)
════════════════════════════════════════════════ -->

<nav class="nav-wrapper">
        <div class="nav-content">
            <a href="./index.php" class="brand-logo" aria-label="Página Inicial">
            <img src="./assets/img/global/logo.png" alt="Float Logo" class="logo-image-custom">
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
                                        <span class="item-title"><i class="fa-solid fa-ghost mini-icon-left"></i> Terror & Suspense</span>
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
                                <a href="#" class="rich-link-item">
                                    <span class="item-title"><i class="fa-solid fa-clock-rotate-left mini-icon-left"></i> Histórico</span>
                                    <span class="item-desc">Veja quais foram as últimas aventuras que você explorou.</span>
                                </a>
                            </div>
                            <div class="menu-column">
                                <h3><i class="fa-solid fa-trophy header-icon"></i> Conquistas</h3>
                                <a href="#" class="rich-link-item">
                                    <span class="item-title"><i class="fa-solid fa-medal mini-icon-left"></i> Badges de Membro</span>
                                    <span class="item-desc">Ganhe insígnias apoiando desenvolvedores.</span>
                                </a>
                                <a href="#" class="rich-link-item">
                                    <span class="item-title"><i class="fa-solid fa-comment-dots mini-icon-left"></i> Top Crítico</span>
                                    <span class="item-desc">Suas avaliações ajudam a plataforma crescer.</span>
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
                <?php if(!isset($_SESSION['id'])): ?>
                    <a href="./pages/login.php" class="btn-destaque">FAZER LOGIN</a>
                <?php else: ?>
                    <div class="nav-auth-profile">
                        <button class="profile-avatar-btn" id="profileTrigger">
                            <img src="assets/img/user/avatar.png" alt="Avatar" class="nav-user-img">
                        </button>
                        <div class="profile-mega-menu" id="profileDropdown">
                            <div class="menu-header">
                                 <span class="user-name">
                                  <?php echo isset($_SESSION['nome']) ? htmlspecialchars($_SESSION['nome']) : 'Usuário'; ?>
                                </span>
                                  <span class="user-status"><i class="fas fa-circle"></i> Online</span>
                            </div>
                            <div class="menu-divider"></div>
                            <ul class="menu-list">
                                <li><a href="pages/perfil.php"><i class="fas fa-user-circle"></i> <span>Meu Perfil</span></a></li>
                                <li><a href="../api/logout.php" class="logout-item">
                                    <i class="fas fa-sign-out-alt"></i> 
                                    <span>Sair</span></a>
                                </li>
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
    
<!-- ═══════════════════════════════════════════
     CONTEÚDO PRINCIPAL
════════════════════════════════════════════════ -->
<main class="perfil-main" id="main-content">

    <!-- ── HERO: Banner + Avatar ─────────────────────────────────── -->
    <section class="perfil-hero" aria-label="Cabeçalho do perfil">

        <!-- Banner -->
        <div class="perfil-banner"
             id="perfilBanner"
             role="img"
             aria-label="Banner de <?= $nomeSanitizado ?>"
             <?php if ($bannerSrc): ?>
             style="background-image: url('<?= $bannerSrc ?>')"
             <?php endif; ?>>

            <?php if ($ehDono): ?>
            <button class="banner-edit-btn"
                    id="btnEditBanner"
                    aria-label="Alterar banner"
                    title="Alterar banner">
                <i class="fa-solid fa-camera" aria-hidden="true"></i>
                <span>Alterar banner</span>
            </button>
            <input type="file" id="inputBanner" accept="image/*" class="input-hidden" aria-hidden="true">
            <?php endif; ?>
        </div>

        <!-- Avatar + Info inline -->
        <div class="perfil-hero-info">
            <div class="perfil-avatar-wrapper">
                <img src="<?= $avatarSrc ?>"
                     alt="Avatar de <?= $nomeSanitizado ?>"
                     class="perfil-avatar"
                     id="perfilAvatarImg">
                <?php if ($ehDono): ?>
                <button class="avatar-edit-btn"
                        id="btnEditAvatar"
                        aria-label="Alterar foto de perfil"
                        title="Alterar foto de perfil">
                    <i class="fa-solid fa-camera" aria-hidden="true"></i>
                </button>
                <input type="file" id="inputAvatar" accept="image/*" class="input-hidden" aria-hidden="true">
                <?php endif; ?>
            </div>

            <div class="perfil-meta">
                <!-- Nome editável -->
                <div class="perfil-nome-wrapper">
                    <h1 class="perfil-nome" id="perfilNome"><?= $nomeSanitizado ?></h1>
                    <?php if ($ehDono): ?>
                    <button class="btn-icon-edit"
                            id="btnEditNome"
                            aria-label="Editar nome"
                            title="Editar nome">
                        <i class="fa-solid fa-pen-to-square" aria-hidden="true"></i>
                    </button>
                    <?php endif; ?>
                </div>

                <!-- Bio editável -->
                <div class="perfil-bio-wrapper">
                    <p class="perfil-bio" id="perfilBio">
                        <?= $bioSanitizada ?: ($ehDono ? '<em class="bio-placeholder">Adicione uma bio...</em>' : '') ?>
                    </p>
                    <?php if ($ehDono): ?>
                    <button class="btn-icon-edit"
                            id="btnEditBio"
                            aria-label="Editar bio"
                            title="Editar bio">
                        <i class="fa-solid fa-pen-to-square" aria-hidden="true"></i>
                    </button>
                    <?php endif; ?>
                </div>

                <!-- Contadores -->
                <div class="perfil-counters" aria-label="Estatísticas sociais">
                    <span>
                        <strong><?= number_format($contagens['seguidores']) ?></strong>
                        <span class="counter-label">Seguidores</span>
                    </span>
                    <span class="counter-sep" aria-hidden="true">·</span>
                    <span>
                        <strong><?= number_format($contagens['seguindo']) ?></strong>
                        <span class="counter-label">Seguindo</span>
                    </span>
                    <span class="counter-sep" aria-hidden="true">·</span>
                    <span>
                        <strong><?= $stats['total_jogos'] ?></strong>
                        <span class="counter-label">Jogos</span>
                    </span>
                </div>

                <!-- Data de entrada -->
                <p class="perfil-joined">
                    <i class="fa-regular fa-calendar-check" aria-hidden="true"></i>
                    Membro desde <?= date('M Y', strtotime($usuario['criado_em'])) ?>
                </p>
            </div>

            <!-- Ações: Seguir / Reportar / Ajuda -->
            <div class="perfil-actions" role="group" aria-label="Ações do perfil">
                <?php if (!$ehDono && $sessaoId): ?>
                <button class="btn-seguir <?= $jaSegue ? 'seguindo' : '' ?>"
                        id="btnSeguir"
                        data-alvo="<?= $alvoId ?>"
                        aria-pressed="<?= $jaSegue ? 'true' : 'false' ?>">
                    <i class="fa-solid <?= $jaSegue ? 'fa-user-check' : 'fa-user-plus' ?>" aria-hidden="true"></i>
                    <span><?= $jaSegue ? 'Seguindo' : 'Seguir' ?></span>
                </button>
                <?php endif; ?>

                <?php if (!$ehDono && $sessaoId): ?>
                <button class="btn-report"
                        id="btnReport"
                        data-tipo="conta"
                        data-alvo="<?= $alvoId ?>"
                        aria-label="Reportar esta conta"
                        title="Reportar">
                    <i class="fa-solid fa-flag" aria-hidden="true"></i>
                </button>
                <?php endif; ?>

                <button class="btn-help"
                        id="btnHelp"
                        aria-label="Ajuda sobre perfis"
                        title="Ajuda">
                    <i class="fa-solid fa-circle-question" aria-hidden="true"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- ── TABS ────────────────────────────────────────────────────── -->
    <div class="perfil-tabs-container">
        <div class="perfil-tabs" role="tablist" aria-label="Seções do perfil">
            <button class="tab-btn active"
                    role="tab"
                    aria-selected="true"
                    aria-controls="panel-jogos"
                    id="tab-jogos"
                    data-tab="jogos">
                <i class="fa-solid fa-gamepad" aria-hidden="true"></i>
                Jogos
            </button>
            <button class="tab-btn"
                    role="tab"
                    aria-selected="false"
                    aria-controls="panel-stats"
                    id="tab-stats"
                    data-tab="stats">
                <i class="fa-solid fa-chart-bar" aria-hidden="true"></i>
                Estatísticas
            </button>
        </div>
    </div>

    <!-- ── PAINEL: Jogos ───────────────────────────────────────────── -->
    <section class="perfil-panel active"
             id="panel-jogos"
             role="tabpanel"
             aria-labelledby="tab-jogos">

        <?php if (empty($jogos)): ?>
        <div class="estado-vazio">
            <i class="fa-solid fa-ghost fa-3x" aria-hidden="true"></i>
            <p>
                <?= $ehDono
                    ? 'Você ainda não publicou nenhum jogo. Que tal começar?'
                    : 'Este usuário ainda não publicou jogos.' ?>
            </p>
            <?php if ($ehDono): ?>
            <a href="projetos.php?acao=novo" class="btn-destaque">
                <i class="fa-solid fa-plus" aria-hidden="true"></i>
                Publicar jogo
            </a>
            <?php endif; ?>
        </div>
        <?php else: ?>
        <div class="jogos-grid">
            <?php foreach ($jogos as $jogo):
                $thumbSrc = $jogo['thumbnail']
                    ? '../assets/img/user/thumbs/' . htmlspecialchars($jogo['thumbnail'])
                    : '../assets/img/pages/index/cards/card_undertale.png';
                $estrelas = round($jogo['media_nota']);
            ?>
            <article class="jogo-card" data-id="<?= $jogo['id'] ?>">
                <div class="jogo-card-thumb">
                    <img src="<?= $thumbSrc ?>"
                         alt="Capa de <?= htmlspecialchars($jogo['titulo']) ?>"
                         loading="lazy">
                    <?php if ($jogo['genero']): ?>
                    <span class="jogo-badge-genero"><?= htmlspecialchars($jogo['genero']) ?></span>
                    <?php endif; ?>
                    <?php if (!$ehDono && $sessaoId): ?>
                    <button class="jogo-report-btn"
                            data-tipo="jogo"
                            data-alvo="<?= $jogo['id'] ?>"
                            aria-label="Reportar jogo"
                            title="Reportar jogo">
                        <i class="fa-solid fa-flag" aria-hidden="true"></i>
                    </button>
                    <?php endif; ?>
                </div>
                <div class="jogo-card-info">
                    <h3 class="jogo-titulo"><?= htmlspecialchars($jogo['titulo']) ?></h3>
                    <?php if ($jogo['descricao']): ?>
                    <p class="jogo-desc"><?= htmlspecialchars(mb_substr($jogo['descricao'], 0, 100)) ?>...</p>
                    <?php endif; ?>
                    <div class="jogo-footer">
                        <div class="jogo-estrelas" aria-label="Avaliação: <?= $estrelas ?> de 5 estrelas">
                            <?php for ($s = 1; $s <= 5; $s++): ?>
                            <i class="fa-<?= $s <= $estrelas ? 'solid' : 'regular' ?> fa-star"
                               aria-hidden="true"></i>
                            <?php endfor; ?>
                            <span class="jogo-total-aval">(<?= $jogo['total_aval'] ?>)</span>
                        </div>
                        <time class="jogo-data"
                              datetime="<?= $jogo['criado_em'] ?>">
                            <?= date('d/m/Y', strtotime($jogo['criado_em'])) ?>
                        </time>
                    </div>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </section>

    <!-- ── PAINEL: Estatísticas ────────────────────────────────────── -->
    <section class="perfil-panel"
             id="panel-stats"
             role="tabpanel"
             aria-labelledby="tab-stats"
             hidden>

        <?php if ($stats['total_jogos'] === 0): ?>
        <div class="estado-vazio">
            <i class="fa-solid fa-chart-bar fa-3x" aria-hidden="true"></i>
            <p>Sem jogos publicados ainda. As estatísticas aparecem aqui quando o perfil tiver projetos.</p>
        </div>
        <?php else: ?>
        <div class="stats-grid">

            <div class="stat-card">
                <i class="fa-solid fa-trophy stat-icon icon-gold" aria-hidden="true"></i>
                <div class="stat-body">
                    <span class="stat-label">Mais bem avaliado</span>
                    <strong class="stat-value">
                        <?= $stats['mais_avaliado']
                            ? htmlspecialchars($stats['mais_avaliado']['titulo'])
                            : '—' ?>
                    </strong>
                    <?php if ($stats['mais_avaliado']): ?>
                    <span class="stat-sub">
                        ★ <?= number_format($stats['mais_avaliado']['media_nota'], 1) ?>
                        (<?= $stats['mais_avaliado']['total_aval'] ?> avaliações)
                    </span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="stat-card">
                <i class="fa-solid fa-arrow-trend-down stat-icon icon-red" aria-hidden="true"></i>
                <div class="stat-body">
                    <span class="stat-label">Menos avaliado</span>
                    <strong class="stat-value">
                        <?= $stats['menos_avaliado']
                            ? htmlspecialchars($stats['menos_avaliado']['titulo'])
                            : '—' ?>
                    </strong>
                    <?php if ($stats['menos_avaliado'] && $stats['total_jogos'] > 1): ?>
                    <span class="stat-sub">
                        ★ <?= number_format($stats['menos_avaliado']['media_nota'], 1) ?>
                        (<?= $stats['menos_avaliado']['total_aval'] ?> avaliações)
                    </span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="stat-card">
                <i class="fa-solid fa-clock stat-icon icon-blue" aria-hidden="true"></i>
                <div class="stat-body">
                    <span class="stat-label">Tempo de conta ativa</span>
                    <strong class="stat-value"><?= $tempoContaStr ?></strong>
                    <span class="stat-sub">Desde <?= date('d/m/Y', strtotime($usuario['criado_em'])) ?></span>
                </div>
            </div>

            <div class="stat-card">
                <i class="fa-solid fa-gamepad stat-icon icon-purple" aria-hidden="true"></i>
                <div class="stat-body">
                    <span class="stat-label">Total de jogos publicados</span>
                    <strong class="stat-value"><?= $stats['total_jogos'] ?></strong>
                    <span class="stat-sub"><?= $stats['total_avaliacoes'] ?> avaliações recebidas</span>
                </div>
            </div>

            <div class="stat-card">
                <i class="fa-solid fa-star stat-icon icon-yellow" aria-hidden="true"></i>
                <div class="stat-body">
                    <span class="stat-label">Média geral</span>
                    <strong class="stat-value"><?= number_format($stats['media_geral'], 1) ?> / 5</strong>
                    <span class="stat-sub">Entre todos os jogos com avaliação</span>
                </div>
            </div>

            <?php if ($stats['jogo_mais_antigo']): ?>
            <div class="stat-card">
                <i class="fa-solid fa-calendar-days stat-icon icon-green" aria-hidden="true"></i>
                <div class="stat-body">
                    <span class="stat-label">Primeiro projeto postado</span>
                    <strong class="stat-value">
                        <?= date('d/m/Y', strtotime($stats['jogo_mais_antigo'])) ?>
                    </strong>
                    <span class="stat-sub">Há <?= $tempoContaStr ?></span>
                </div>
            </div>
            <?php endif; ?>

        </div>
        <?php endif; ?>
    </section>

</main>

<!-- ═══════════════════════════════════════════
     MODAL: Editar nome
════════════════════════════════════════════════ -->
<?php if ($ehDono): ?>
<div class="modal-overlay" id="modalNome" role="dialog" aria-modal="true" aria-labelledby="modalNomeTitulo" hidden>
    <div class="modal-box">
        <header class="modal-header">
            <h2 id="modalNomeTitulo">
                <i class="fa-solid fa-user-pen" aria-hidden="true"></i>
                Editar nome
            </h2>
            <button class="modal-close" aria-label="Fechar">
                <i class="fa-solid fa-xmark" aria-hidden="true"></i>
            </button>
        </header>
        <div class="modal-body">
            <label for="inputNome" class="modal-label">Nome de usuário</label>
            <input type="text"
                   id="inputNome"
                   class="modal-input"
                   maxlength="50"
                   value="<?= $nomeSanitizado ?>"
                   autocomplete="off">
            <p class="modal-hint">Entre 3 e 50 caracteres.</p>
        </div>
        <footer class="modal-footer">
            <button class="btn-modal-cancel modal-close">Cancelar</button>
            <button class="btn-modal-save" id="btnSalvarNome">
                <i class="fa-solid fa-floppy-disk" aria-hidden="true"></i>
                Salvar
            </button>
        </footer>
    </div>
</div>

<!-- MODAL: Editar bio -->
<div class="modal-overlay" id="modalBio" role="dialog" aria-modal="true" aria-labelledby="modalBioTitulo" hidden>
    <div class="modal-box">
        <header class="modal-header">
            <h2 id="modalBioTitulo">
                <i class="fa-solid fa-pen-clip" aria-hidden="true"></i>
                Editar bio
            </h2>
            <button class="modal-close" aria-label="Fechar">
                <i class="fa-solid fa-xmark" aria-hidden="true"></i>
            </button>
        </header>
        <div class="modal-body">
            <label for="inputBio" class="modal-label">Bio</label>
            <textarea id="inputBio"
                      class="modal-input modal-textarea"
                      maxlength="300"
                      rows="4"
                      placeholder="Conte um pouco sobre você..."><?= $bioSanitizada ?></textarea>
            <p class="modal-hint">
                <span id="bioCharCount"><?= mb_strlen($usuario['bio'] ?? '') ?></span>/300 caracteres
            </p>
        </div>
       
         <footer class="footer-modern">
        <div class="footer-container">
            <div class="footer-main">
                <div class="footer-brand-section">
                <img src="./assets/img/global/logo.png" alt="Float Logo" class="logo-image-custom-footer">
                    <div class="footer-brand-text">
                        <h3 style="color: #fff;">Plataforma Float</h3>
                        <p style="color: #666; font-size: 0.8rem;">A casa do desenvolvimento independente. Versão Alpha 0.02</p>
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
                    <p>© 2026 Float. Feito com <i class="fa-solid fa-heart" style="color: var(--Fogo);"></i> para a comunidade indie.</p>
                    <p>Conectando ideias, <span style="color: var(--zzz-yellow);">elevando o jogo.</span></p>
                </div>
            </div>
        </div>
    </footer>

    </div>
</div>

<!-- MODAL: Cropper de imagem -->
<div class="modal-overlay" id="modalCropper" role="dialog" aria-modal="true" aria-labelledby="modalCropperTitulo" hidden>
    <div class="modal-box modal-box--lg">
        <header class="modal-header">
            <h2 id="modalCropperTitulo">
                <i class="fa-solid fa-crop-simple" aria-hidden="true"></i>
                Ajustar imagem
            </h2>
            <button class="modal-close" aria-label="Fechar">
                <i class="fa-solid fa-xmark" aria-hidden="true"></i>
            </button>
        </header>
        <div class="modal-body cropper-body">
            <img id="cropperImg" src="" alt="Imagem para cortar" class="cropper-preview-img">
        </div>
        <footer class="modal-footer">
            <button class="btn-modal-cancel modal-close">Cancelar</button>
            <button class="btn-modal-save" id="btnConfirmarCrop">
                <i class="fa-solid fa-check" aria-hidden="true"></i>
                Confirmar
            </button>
        </footer>
    </div>
</div>
<?php endif; ?>

<!-- MODAL: Reportar -->
<?php if (!$ehDono && $sessaoId): ?>
<div class="modal-overlay" id="modalReport" role="dialog" aria-modal="true" aria-labelledby="modalReportTitulo" hidden>
    <div class="modal-box">
        <header class="modal-header">
            <h2 id="modalReportTitulo">
                <i class="fa-solid fa-flag" aria-hidden="true"></i>
                Reportar
            </h2>
            <button class="modal-close" aria-label="Fechar">
                <i class="fa-solid fa-xmark" aria-hidden="true"></i>
            </button>
        </header>
        <div class="modal-body">
            <input type="hidden" id="reportTipo" value="">
            <input type="hidden" id="reportAlvoId" value="">
            <label for="selectMotivo" class="modal-label">Motivo</label>
            <select id="selectMotivo" class="modal-input modal-select">
                <option value="">Selecione um motivo...</option>
                <option value="Conteúdo inapropriado">Conteúdo inapropriado</option>
                <option value="Spam ou flood">Spam ou flood</option>
                <option value="Violação de direitos autorais">Violação de direitos autorais</option>
                <option value="Comportamento abusivo">Comportamento abusivo</option>
                <option value="Perfil falso">Perfil falso</option>
                <option value="Outro">Outro</option>
            </select>
            <label for="detalheReport" class="modal-label" style="margin-top:12px">Detalhes (opcional)</label>
            <textarea id="detalheReport"
                      class="modal-input modal-textarea"
                      maxlength="255"
                      rows="3"
                      placeholder="Descreva brevemente..."></textarea>
        </div>
        <footer class="modal-footer">
            <button class="btn-modal-cancel modal-close">Cancelar</button>
            <button class="btn-modal-save btn-danger" id="btnEnviarReport">
                <i class="fa-solid fa-flag" aria-hidden="true"></i>
                Reportar
            </button>
        </footer>
    </div>
</div>
<?php endif; ?>

<!-- MODAL: Ajuda -->
<div class="modal-overlay" id="modalHelp" role="dialog" aria-modal="true" aria-labelledby="modalHelpTitulo" hidden>
    <div class="modal-box">
        <header class="modal-header">
            <h2 id="modalHelpTitulo">
                <i class="fa-solid fa-circle-question" aria-hidden="true"></i>
                Sobre os Perfis Float
            </h2>
            <button class="modal-close" aria-label="Fechar">
                <i class="fa-solid fa-xmark" aria-hidden="true"></i>
            </button>
        </header>
        <div class="modal-body help-body">
            <ul class="help-list">
                <li>
                    <i class="fa-solid fa-image" aria-hidden="true"></i>
                    <span><strong>Banner e avatar</strong> podem ser imagens estáticas ou GIFs. Clique no ícone de câmera para alterar.</span>
                </li>
                <li>
                    <i class="fa-solid fa-pen" aria-hidden="true"></i>
                    <span><strong>Nome e bio</strong> são editáveis pelo ícone de lápis ao lado de cada campo.</span>
                </li>
                <li>
                    <i class="fa-solid fa-user-plus" aria-hidden="true"></i>
                    <span><strong>Seguir</strong> usuários permite acompanhar novos jogos publicados por eles.</span>
                </li>
                <li>
                    <i class="fa-solid fa-chart-bar" aria-hidden="true"></i>
                    <span><strong>Estatísticas</strong> são geradas automaticamente conforme os jogos publicados recebem avaliações.</span>
                </li>
                <li>
                    <i class="fa-solid fa-flag" aria-hidden="true"></i>
                    <span><strong>Reportar</strong> uma conta ou jogo envia uma denúncia para a moderação da Float.</span>
                </li>
            </ul>
        </div>
        <footer class="modal-footer">
            <button class="btn-modal-save modal-close">Entendido</button>
        </footer>
    </div>
</div>

<!-- ═══════════════════════════════════════════
     TOAST CONTAINER
════════════════════════════════════════════════ -->
<div class="toast-container" id="toastContainer" aria-live="polite" aria-atomic="true"></div>

<!-- ═══════════════════════════════════════════
     FOOTER
════════════════════════════════════════════════ -->
<footer class="footer-modern" role="contentinfo">
    <div class="footer-container">
        <div class="footer-bottom-modern">
            <div class="footer-left">
                <p>© <?= date('Y') ?> Float. Plataforma de jogos indie.</p>
            </div>
            <div class="footer-socials-modern">
                <a href="#" aria-label="GitHub da Float">
                    <i class="fab fa-github" aria-hidden="true"></i>
                </a>
                <a href="#" aria-label="Discord da Float">
                    <i class="fab fa-discord" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>
</footer>

<!-- Scripts -->
<script src="../assets/js/global/global.js"></script>
<?php if ($ehDono): ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.js"></script>
<?php endif; ?>
<script src="../assets/js/pages/perfil.js"></script>
<!-- Dados do PHP expostos de forma segura para o JS -->
<script>
    window.PERFIL = {
        ehDono:  <?= $ehDono  ? 'true' : 'false' ?>,
        alvoId:  <?= $alvoId ?>,
        sessaoId:<?= $sessaoId ?? 'null' ?>
    };
</script>

</body>
</html>