--- PROJETO: Float ---

## ESTRUTURA DO PROJETO
```text
├── api
│   ├── auth
│   │   ├── docadastro.php
│   │   ├── dologin.php
│   │   └── protect.php
│   ├── config
│   │   └── conexao.php
│   ├── user
│   │   └── atualizacao.php
│   ├── auth.php
│   └── logout.php
├── database
│   └── float.sql
├── public
│   ├── assets
│   │   ├── css
│   │   │   ├── components
│   │   │   ├── global
│   │   │   │   ├── global.css
│   │   │   │   └── variables.css
│   │   │   └── pages
│   │   │       ├── cadastro.css
│   │   │       ├── index.css
│   │   │       ├── login.css
│   │   │       └── noticias.css
│   │   ├── img
│   │   │   ├── favicon
│   │   │   │   └── icone.ico
│   │   │   ├── global
│   │   │   │   ├── background.png
│   │   │   │   └── logo.png
│   │   │   └── pages
│   │   │       ├── cadastro
│   │   │       │   └── cadastro.png
│   │   │       ├── index
│   │   │       │   ├── cards
│   │   │       │   │   ├── card_celeste.png
│   │   │       │   │   ├── card_cuphead.png
│   │   │       │   │   ├── card_dead_cells.png
│   │   │       │   │   ├── card_deltarune.png
│   │   │       │   │   ├── card_hadesII.png
│   │   │       │   │   ├── card_journey.png
│   │   │       │   │   ├── card_shovel_knight.png
│   │   │       │   │   ├── card_silksong.png
│   │   │       │   │   ├── card_stardew_valley.png
│   │   │       │   │   └── card_undertale.png
│   │   │       │   └── slides
│   │   │       │       ├── slide_01.png
│   │   │       │       ├── slide_02.png
│   │   │       │       ├── slide_03.png
│   │   │       │       ├── slide_04.png
│   │   │       │       ├── slide_05.png
│   │   │       │       └── slide_06.png
│   │   │       └── login
│   │   │           └── login.png
│   │   └── js
│   │       ├── components
│   │       ├── global
│   │       │   └── global.js
│   │       ├── pages
│   │       │   ├── cadastro.js
│   │       │   ├── index.js
│   │       │   ├── login.js
│   │       │   └── noticias.js
│   │       └── utils
│   ├── components
│   ├── pages
│   │   ├── cadastro.php
│   │   ├── comunidade.php
│   │   ├── login.php
│   │   ├── noticias.php
│   │   ├── perfil.php
│   │   └── projetos.php
│   └── index.php
└── tools
    ├── conversor_png.py
    └── readme.py
```

==================================================

### [ SEÇÃO: ARQUIVOS .CSS ]

FILE: public\assets\css\global\global.css
---

---

```css
@import url("variables.css");

body {
  background-color: var(--black);
  background-image: radial-gradient(circle at 50% -20%, transparent 70%)
    url(../../img/global/background.png);
  background-attachment: fixed;
  color: var(--nav-text);
  font-family: "Inter", sans-serif;
  margin: 0;
  -webkit-font-smoothing: antialiased;
}

body::before {
  content: " ";
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  background:
    linear-gradient(rgba(18, 16, 16, 0) 50%, rgba(0, 0, 0, 0.1) 50%),
    linear-gradient(
      90deg,
      rgba(255, 0, 0, 0.03),
      rgba(0, 255, 0, 0.01),
      rgba(0, 0, 255, 0.03)
    );
  z-index: 9999;
  background-size:
    100% 4px,
    3px 100%;
  pointer-events: none;
  opacity: 0.3;
}

::-webkit-scrollbar {
  width: 10px;
}

::-webkit-scrollbar-thumb {
  background: var(--color-primary-purple);
  border-radius: 5px;
}

::-webkit-scrollbar-thumb:hover {
  background: #b86bff;
  box-shadow: 0 0 15px var(--color-primary-purple);
}

::-webkit-scrollbar-track {
  background: rgba(0, 0, 0, 0.3);
}

@keyframes fadeInDown {
  from {
    opacity: 0;
    transform: translateY(-30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes glowPulse {
  0%,
  100% {
    box-shadow: 0 0 20px rgba(166, 74, 255, 0.3);
  }
  50% {
    box-shadow: 0 0 40px rgba(166, 74, 255, 0.6);
  }
}

@keyframes slideInLeft {
  from {
    opacity: 0;
    transform: translateX(-50px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

@keyframes slideInRight {
  from {
    opacity: 0;
    transform: translateX(50px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

i.fa-solid,
i.fas,
i.fab,
i.fa-brands,
i.fa-regular {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  line-height: 1;
}

.logo-image-custom {
  filter: drop-shadow(0 2px 8px rgba(166, 74, 255, 0.2));
  height: 50px;
  transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
  width: auto;
}

.logo-image-custom:hover {
  filter: drop-shadow(0 4px 16px rgba(166, 74, 255, 0.4));
}

.logo-static {
  height: 50px;
  pointer-events: none;
  transition: transform 0.3s ease;
}

.chevron-icon {
  transition: transform 0.3s ease;
  font-size: 0.8rem;
}

.header-icon {
  font-size: 24px;
  color: var(--color-primary-purple);
  margin-right: 10px;
}

.material-icon {
  font-size: 35px;
  color: var(--color-primary-purple);
}

.mini-icon-left {
  font-size: 18px;
  margin-right: 12px;
  flex-shrink: 0;
  color: var(--nav-text-muted);
}

.nav-custom-icon {
  font-size: 20px;
  transition: transform 0.3s ease;
}

.mega-menu-inner {
  background: var(--nav-bg);
  backdrop-filter: blur(20px);
  backdrop-filter: blur(20px);
  padding: 15px;
  box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4);
  display: grid;
  gap: 25px;
  min-width: 600px;
  padding: 25px;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
}

.mega-menu-wrapper {
  left: 50%;
  will-change: transform, opacity;
  top: 100%;
  transform: translateX(-50%) translateY(15px) scale(0.98);
  visibility: hidden;
  width: 95%;
  max-width: 1200px;
  background: var(--nav-bg);
  backdrop-filter: blur(20px);
  border: 1px solid var(--glass-border);
  border-radius: 16px;
  padding: 15px;
  box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4);

  z-index: 1000;
  pointer-events: none;
  filter: blur(10px);
  position: absolute;
}

.menu-column {
  min-width: 180px;
}

.nav-action {
  align-items: center;
  display: flex;
}

.nav-content {
  height: 70px;
  padding: 0 2.5rem;
  position: relative;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.nav-item {
  display: flex;
  align-items: center;
  height: 100%;
  position: relative;
}

.nav-item.has-dropdown {
  position: static;
}

.nav-item:hover .chevron-icon {
  transform: rotate(180deg);
}

.nav-item:hover .chevron-icon path {
  stroke: var(--color-black);
}

.nav-item:hover .mega-menu-wrapper {
  display: block;
}

.nav-item:hover .nav-link {
  color: var(--color-black);
}

.nav-item:hover .nav-link::before {
  left: 0;
}

.nav-list-center {
  display: flex;
  gap: 0.5rem;
  justify-content: center;
  height: 100%;
  list-style: none;
  margin: 0;
  padding: 0;
}

.nav-link {
  border-radius: 20px;
  display: flex;
  align-items: center;
  gap: 10px;
  font-size: 0.85rem;
  font-weight: 700;
  letter-spacing: 0.5px;
  overflow: hidden;
  padding: 8px 18px;
  position: relative;
  text-decoration: none;
  text-transform: uppercase;
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  color: var(--nav-text);
}

.nav-link::before {
  content: "";
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: var(--color-primary-purple);
  transition: left 0.25s ease;
  z-index: -1;
}

.nav-link::after {
  content: "";
  position: absolute;
  bottom: -5px;
  left: 0;
  width: 0;
  height: 2px;
  background: var(--color-primary-purple);
  transition: width 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.nav-link:hover {
  color: var(--color-primary-purple);
}

.nav-link:visited {
  color: var(--nav-text);
}

.nav-wrapper {
  animation: fadeInDown 0.6s ease;
  backdrop-filter: blur(15px);
  background-color: var(--nav-bg);
  border: 1px solid rgba(166, 74, 255, 0.15);
  border-radius: 50px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.7);
  left: 0;
  margin: 0 auto;
  max-width: 1280px;
  position: fixed;
  right: 0;
  top: 20px;
  transition: all 0.25s ease;
  width: 92%;
  z-index: 1000;
}

.nav-wrapper:hover {
  border-color: rgba(166, 74, 255, 0.25);
  box-shadow: 0 15px 40px rgba(0, 0, 0, 0.8);
}

.nav-action .btn-destaque,
.btn-destaque {
  align-items: center;
  background-color: var(--color-primary-purple);
  color: var(--color-black);
  display: flex;
  gap: 8px;
  padding: 10px 25px;
  font-size: 0.8rem;
  font-weight: 900;
  letter-spacing: 1px;
  transition: all 0.3s;
  border-radius: 50px;
  text-decoration: none;
}

.btn-destaque:hover {
  box-shadow: 0 0 20px rgba(166, 74, 255, 0.5);
  transform: scale(1.05);
  color: var(--color-black);
}

.area-conteudo {
  display: grid;
  gap: 20px;
  grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
  width: 100%;
}

.item-desc {
  color: var(--nav-text-muted);
  font-size: 0.75rem;
  line-height: 1.4;
  padding-left: 32px;
}

.item-title {
  color: #ffffff;
  display: flex;
  font-size: 0.95rem;
  font-weight: 700;
  margin-bottom: 4px;
  align-items: center;
}

.rich-link-item {
  display: flex;
  flex-direction: column;
  margin-bottom: 4px;
  padding: 12px;
  transition: background 0.2s;
  border-radius: 12px;
  text-decoration: none;
}

.rich-link-item.icon-left {
  align-items: center;
  display: flex;
  gap: 15px;
  flex-direction: row;
}

.rich-link-item.icon-left .item-desc {
  padding-left: 0;
}

.rich-link-item:hover {
  background: rgba(166, 74, 255, 0.1);
}

.rich-link-item:hover .item-title {
  color: var(--color-primary-purple);
}

.mobile-menu-btn {
  background: none;
  border: none;
  color: white;
  cursor: pointer;
  display: none;
  font-size: 1.5rem;
}

@media (max-width: 768px) {
  .mobile-menu-btn {
    display: block;
    position: absolute;
    right: 20px;
    top: 20px;
    z-index: 1100;
  }

  .nav-list-center {
    background-color: var(--nav-bg);
    border-radius: 0 0 20px 20px;
    display: none;
    flex-direction: column;
    left: 0;
    padding: 20px;
    position: absolute;
    top: 100%;
    width: 100%;
  }

  .nav-list-center.active {
    display: flex;
  }
}

.combat-icon-wrapper {
  align-items: center;
  display: flex;
  height: 60px;
  justify-content: center;
  margin: 0 auto 15px;
  width: 60px;
}

.element-icon {
  height: 100%;
  object-fit: contain;
  transition: filter 0.3s ease;
  width: 100%;
}

.combat-card:hover .element-icon {
  filter: brightness(1.2) drop-shadow(0 0 8px var(--color-primary-purple));
}

.section-cta-container {
  align-items: center;
  display: flex;
  justify-content: center;
  padding: 50px 0;
  width: 100%;
}

html,
body {
  height: 100%;
  margin: 0;
}

body {
  display: flex;
  flex-direction: column;
  min-height: 100vh;
}

main {
  flex: 1 0 auto;
}

.logo-image-custom {
  height: 35px;
  width: auto;
  object-fit: contain;
}

.logo-image-custom-footer {
  height: 100px;
  width: auto;
  object-fit: contain;
}

.footer-modern {
  flex-shrink: 0;
  background-color: var(--black);
  background-image: linear-gradient(to top, var(--prussian-blue), transparent);
  border-top: 1px solid var(--glass-border);
  padding: 80px 0 40px;
  margin-top: 100px;
}

.footer-container {
  max-width: 1400px;
  margin: 0 auto;
  padding: 0 4%;
}

.footer-main {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding-bottom: 50px;
  border-bottom: 1px solid var(--glass-border);
  margin-bottom: 50px;
  flex-wrap: wrap;
  gap: 30px;
}

.footer-brand-section {
  display: flex;
  align-items: center;
  gap: 20px;
}

.footer-logo {
  height: 50px;
  filter: drop-shadow(0 0 10px rgba(255, 255, 255, 0.1));
}

.footer-brand-text h3 {
  font-size: 1.2rem;
  font-weight: 500;
  margin: 0;
}

.footer-socials-modern {
  display: flex;
  gap: 15px;
  justify-content: center;
}

.footer-socials-modern a {
  width: 45px;
  height: 45px;
  background: rgba(255, 255, 255, 0.03);
  border: 1px solid var(--glass-border);
  border-radius: 12px;

  display: inline-flex;
  align-items: center;
  justify-content: center;

  color: var(--nav-text-muted);
  text-decoration: none;
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.footer-socials-modern a i {
  font-size: 1.2rem;
  line-height: 1;
}

.footer-socials-modern a:hover {
  background: var(--navy);
  color: white;
  transform: translateY(-5px);
  border-color: var(--navy);
  box-shadow: 0 10px 20px rgba(34, 0, 124, 0.3);
}

.footer-links-section {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
  gap: 40px;
  margin-bottom: 60px;
}

.footer-column h4 {
  color: white;
  font-size: 0.95rem;
  font-weight: 600;
  margin-bottom: 25px;
  text-transform: uppercase;
  letter-spacing: 1px;
}

.footer-column a {
  display: block;
  color: var(--nav-text-muted);
  text-decoration: none;
  font-size: 0.9rem;
  margin-bottom: 12px;
  transition: 0.3s;
}

.footer-column a:hover {
  color: white;
  padding-left: 5px;
}

.footer-bottom-modern {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding-top: 30px;
  border-top: 1px solid rgba(255, 255, 255, 0.03);
}

.footer-left p {
  font-size: 0.8rem;
  color: var(--nav-text-muted);
  margin: 5px 0;
}

@media (max-width: 768px) {
  .footer-main {
    flex-direction: column;
    text-align: center;
  }

  .footer-brand-section {
    flex-direction: column;
  }
}

.reveal-hidden {
  opacity: 0;
  transform: translateY(30px);
  transition: all 0.8s cubic-bezier(0.2, 1, 0.3, 1);
}

.reveal-visible {
  opacity: 1;
  transform: translateY(0);
}

* {
  backface-visibility: hidden;
  -webkit-font-smoothing: antialiased;
}

::-webkit-scrollbar {
  width: 8px;
}
::-webkit-scrollbar-track {
  background: var(--black);
}
::-webkit-scrollbar-thumb {
  background: var(--prussian-blue);
  border-radius: 10px;
}
::-webkit-scrollbar-thumb:hover {
  background: var(--navy);
}

.nav-auth-profile {
  position: relative;
  display: flex;
  align-items: center;
}

.profile-avatar-btn {
  background: none;
  border: 1px solid var(--glass-border);
  padding: 3px;
  border-radius: 50%;
  cursor: pointer;
  transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
  display: flex;
}

.profile-avatar-btn:hover {
  transform: scale(1.1);
  border-color: var(--navy);
}

.nav-user-img {
  width: 38px;
  height: 38px;
  border-radius: 50%;
  object-fit: cover;
  filter: drop-shadow(0 0 5px rgba(166, 74, 255, 0.2));
}

.profile-mega-menu {
  position: absolute;
  top: calc(100% + 15px);
  right: 0;
  width: 240px;
  background: var(--nav-bg);
  backdrop-filter: blur(20px);
  border: 1px solid var(--glass-border);
  border-radius: 16px;
  padding: 15px;
  box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4);

  opacity: 0;
  visibility: hidden;
  transform: translateY(-10px);
  transition: all 0.3s ease;
  z-index: 1000;
}

.profile-mega-menu.active {
  opacity: 1;
  visibility: visible;
  transform: translateY(0);
}

.menu-header {
  padding: 5px 10px 15px;
}

.user-name {
  display: block;
  color: var(--nav-text);
  font-weight: 700;
  font-size: 0.95rem;
}

.user-status {
  font-size: 0.7rem;
  color: #4ade80;
  display: flex;
  align-items: center;
  gap: 5px;
  margin-top: 4px;
}

.menu-divider {
  height: 1px;
  background: var(--glass-border);
  margin: 5px 0 10px;
}

.menu-list {
  list-style: none;
  padding: 0;
  margin: 0;
}

.menu-list li a {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 12px;
  color: var(--nav-text-muted);
  text-decoration: none;
  border-radius: 10px;
  transition: 0.2s;
  font-size: 0.9rem;
}

.menu-list li a:hover {
  background: rgba(255, 255, 255, 0.05);
  color: white;
}

.logout-item:hover {
  color: #ff4e4e !important;
}

.avatar-trigger {
  background: none;
  border: 2px solid var(--glass-border);
  padding: 2px;
  border-radius: 50%;
  cursor: pointer;
  transition: all 0.4s var(--transition-smooth);
}

.avatar-img {
  width: 38px;
  height: 38px;
  border-radius: 50%;
  object-fit: cover;
  display: block;
}

.profile-dropdown-menu {
  position: absolute;
  top: calc(100% + 20px);
  right: 0;
  width: 250px;
  background: var(--nav-bg);
  backdrop-filter: blur(20px);
  border: 1px solid var(--glass-border);
  border-radius: 18px;
  padding: 20px;
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);

  opacity: 0;
  visibility: hidden;
  transform: translateY(15px) scale(0.95);
  transition:
    opacity 0.4s ease,
    transform 0.4s cubic-bezier(0.165, 0.84, 0.44, 1),
    visibility 0.4s;
  z-index: 1000;
}

.profile-dropdown-menu.active {
  opacity: 1;
  visibility: visible;
  transform: translateY(0) scale(1);
}

.dropdown-nav-list {
  list-style: none;
  padding: 0;
  margin-top: 10px;
}

.dropdown-nav-list li a {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 12px;
  color: var(--nav-text-muted);
  text-decoration: none;
  border-radius: 10px;
  transition: 0.3s;
}

.dropdown-nav-list li a:hover {
  background: rgba(255, 255, 255, 0.05);
  color: white;
  transform: translateX(5px);
}
```

## FILE: public\assets\css\global\variables.css

```css
:root {
  --black: #02010aff;
  --prussian-blue: #04052eff;
  --deep-twilight: #140152ff;
  --navy: #22007cff;

  --color-primary-purple: var(--navy);
  --color-dark-grey: var(--prussian-blue);

  --zzz-yellow: #ffed4e;
  --Fogo: #ff4e4e;

  --nav-text: #f8f9fa;
  --nav-text-muted: rgba(248, 249, 250, 0.5);

  --nav-bg: rgba(2, 1, 10, 0.85);

  --glass-surface: rgba(255, 255, 255, 0.03);

  --glass-border: rgba(255, 255, 255, 0.08);

  --glass-reflection: rgba(255, 255, 255, 0.12);

  --glow-purple: rgba(166, 74, 255, 0.3);
  --glow-yellow: rgba(217, 244, 56, 0.4);
}
```

## FILE: public\assets\css\pages\cadastro.css

```css
@import url("login.css");

.back-home {
  left: 40px;
  right: auto;
}

@media (max-width: 1200px) {
  .auth-form-box {
    max-width: 340px;
  }
}

@media (max-width: 1000px) {
  .auth-container {
    flex-direction: column;
  }

  .auth-form-side {
    padding: 20px;
  }

  .auth-form-box {
    max-width: 100%;
    padding: 0 10px;
  }

  .back-home {
    top: 20px;
    left: 20px;
  }
}

.auth-form-side {
  opacity: 1;
  transform: none;
}

@keyframes contentLeft {
  from {
    opacity: 0;
    transform: translateX(-30px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}
```

## FILE: public\assets\css\pages\index.css

```css
.epic-hero-section {
  padding: 120px 4% 40px;
  max-width: 1600px;
  margin: 0 auto;
}
.epic-hero-container {
  display: grid;
  grid-template-columns: 1fr 280px;
  gap: 20px;
  height: 520px;
  width: 100%;
}
.hero-main-display {
  position: relative;
  height: 100%;
  border-radius: 20px;
  overflow: hidden;
  background: var(--prussian-blue);
  box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
  border: 1px solid var(--glass-border);
}
.hero-main-img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition:
    opacity 0.3s cubic-bezier(0.4, 0, 0.2, 1),
    transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
  filter: brightness(0.75);
}
.hero-overlay-content {
  position: absolute;
  bottom: 0;
  left: 0;
  padding: 50px;
  max-width: 500px;
  z-index: 5;
  transition:
    opacity 0.4s cubic-bezier(0.4, 0, 0.2, 1),
    transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}
.hero-gradient-overlay {
  position: absolute;
  inset: 0;
  pointer-events: none;
  background: linear-gradient(
    to right,
    rgba(2, 1, 10, 0.6) 0%,
    transparent 60%
  );
}
.hero-status {
  display: inline-block;
  color: var(--nav-text);
  font-size: 0.75rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 1.2px;
  margin-bottom: 15px;
}
.hero-game-name {
  font-family: "Rajdhani", "Inter", sans-serif;
  font-size: 2.8rem;
  font-weight: 900;
  color: var(--nav-text);
  line-height: 1.1;
  margin: 0;
}
.hero-description {
  font-size: 1rem;
  color: var(--nav-text);
  margin: 15px 0 30px;
  line-height: 1.5;
  opacity: 0.85;
}
.hero-actions {
  display: flex;
  gap: 12px;
  align-items: center;
}
.btn-buy {
  background: var(--nav-text);
  color: var(--black);
  border: none;
  padding: 16px 35px;
  border-radius: 8px;
  font-weight: 800;
  text-transform: uppercase;
  font-size: 0.85rem;
  cursor: pointer;
  transition:
    transform 0.2s cubic-bezier(0.4, 0, 0.2, 1),
    filter 0.2s ease;
}
.btn-buy:hover {
  transform: translateY(-2px);
  filter: brightness(0.9);
}
.btn-wishlist {
  background: var(--glass-reflection);
  backdrop-filter: blur(8px);
  color: var(--nav-text);
  border: 1px solid var(--glass-border);
  padding: 16px 20px;
  border-radius: 8px;
  cursor: pointer;
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  display: flex;
  align-items: center;
  justify-content: center;
}
.btn-wishlist:hover {
  background: rgba(255, 255, 255, 0.18);
  border-color: rgba(255, 255, 255, 0.3);
}

.hero-side-list {
  display: flex;
  flex-direction: column;
  gap: 8px;
}
.side-item {
  display: flex;
  align-items: center;
  gap: 15px;
  padding: 14px;
  border-radius: 15px;
  cursor: pointer;
  position: relative;
  overflow: hidden;
  transition: background 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}
.side-item.active::before {
  content: "";
  position: absolute;
  bottom: 0;
  left: 0;
  height: 4px;
  background: var(--navy);
  box-shadow: 0 0 10px var(--glow-purple);
  animation: progress-bar 7s linear forwards;
  z-index: 5;
}
@keyframes progress-bar {
  from {
    width: 0%;
  }
  to {
    width: 100%;
  }
}
.side-item:hover {
  background: var(--glass-surface);
}
.side-item.active {
  background: var(--glass-reflection);
}
.side-item img {
  width: 48px;
  height: 60px;
  border-radius: 8px;
  object-fit: cover;
  z-index: 2;
}
.side-item-info {
  display: flex;
  flex-direction: column;
  z-index: 2;
}
.side-item-name {
  color: var(--nav-text);
  font-size: 0.85rem;
  font-weight: 700;
}
.side-item-tag {
  color: var(--nav-text-muted);
  font-size: 0.7rem;
  text-transform: uppercase;
  font-weight: 600;
}

.hero-dots {
  position: absolute;
  top: 30px;
  right: 30px;
  display: flex;
  gap: 8px;
  z-index: 10;
}
.hero-dot {
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.3);
  transition: 0.3s;
}
.hero-dot.active {
  background: var(--nav-text);
  box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
  transform: scale(1.2);
}
.hero-progress-bar {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 4px;
  background: rgba(255, 255, 255, 0.05);
  z-index: 4;
  display: none;
}

.store-section {
  padding: 60px 4%;
  max-width: 1600px;
  margin: 0 auto;
}
.store-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 32px;
}
.store-title {
  font-family: "Rajdhani", "Inter", sans-serif;
  font-size: 1.6rem;
  font-weight: 900;
  color: var(--nav-text);
  margin: 0;
  letter-spacing: 0.5px;
}
.store-nav {
  display: flex;
  gap: 10px;
}
.nav-arrow {
  width: 42px;
  height: 42px;
  border-radius: 50%;
  border: 1px solid var(--glass-border);
  background: var(--glass-surface);
  color: var(--nav-text);
  cursor: pointer;
  font-size: 0.9rem;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.25s ease;
}
.nav-arrow:hover {
  background: var(--navy);
  border-color: var(--navy);
  box-shadow: 0 0 14px var(--glow-purple);
}

.coverflow-track-wrapper {
  overflow: hidden;
  padding: 40px 0 50px;
  position: relative;
}
.coverflow-track-wrapper::before,
.coverflow-track-wrapper::after {
  content: "";
  position: absolute;
  top: 0;
  bottom: 0;
  width: 120px;
  z-index: 5;
  pointer-events: none;
}
.coverflow-track-wrapper::before {
  left: 0;
  background: linear-gradient(to right, var(--black), transparent);
}
.coverflow-track-wrapper::after {
  right: 0;
  background: linear-gradient(to left, var(--black), transparent);
}

.coverflow-track {
  display: flex;
  gap: 24px;
  transition: transform 0.55s cubic-bezier(0.25, 1, 0.35, 1);
  will-change: transform;
  padding: 0 calc(50% - 120px);
}

.cf-card {
  flex: 0 0 220px;
  cursor: pointer;
  transition:
    transform 0.55s cubic-bezier(0.25, 1, 0.35, 1),
    opacity 0.55s cubic-bezier(0.25, 1, 0.35, 1);
  transform: scale(0.82) rotateY(8deg);
  opacity: 0.5;
  transform-style: preserve-3d;
}
.cf-card.cf-active {
  transform: scale(1) rotateY(0deg);
  opacity: 1;
}
.cf-card.cf-near {
  transform: scale(0.9) rotateY(4deg);
  opacity: 0.75;
}
.cf-card.cf-near-left {
  transform: scale(0.9) rotateY(-4deg);
  opacity: 0.75;
}
.cf-card.cf-far-left {
  transform: scale(0.82) rotateY(-8deg);
  opacity: 0.5;
}

.cf-card-cover {
  aspect-ratio: 3/4;
  border-radius: 16px;
  overflow: hidden;
  position: relative;
  background: var(--prussian-blue);
  border: 1px solid var(--glass-border);
  margin-bottom: 14px;
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
  transition:
    border-color 0.3s ease,
    box-shadow 0.3s ease;
}
.cf-card.cf-active .cf-card-cover {
  border-color: rgba(166, 74, 255, 0.5);
  box-shadow:
    0 30px 60px rgba(0, 0, 0, 0.6),
    0 0 0 1px rgba(166, 74, 255, 0.3),
    0 0 40px rgba(166, 74, 255, 0.15);
}
.cf-card-cover img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
  display: block;
}
.cf-card:hover .cf-card-cover img {
  transform: scale(1.06);
}

.cf-card-overlay {
  position: absolute;
  inset: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  background: rgba(2, 1, 10, 0.5);
  opacity: 0;
  transition: opacity 0.3s ease;
  font-size: 2rem;
  color: var(--nav-text);
}
.cf-card:hover .cf-card-overlay {
  opacity: 1;
}

.cf-card-info {
  padding: 0 4px;
  opacity: 0;
  transform: translateY(6px);
  transition:
    opacity 0.4s ease,
    transform 0.4s ease;
}
.cf-card.cf-active .cf-card-info {
  opacity: 1;
  transform: translateY(0);
}

.cf-game-type {
  display: inline-block;
  font-size: 0.65rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 1px;
  color: var(--nav-text-muted);
  margin-bottom: 4px;
}
.cf-game-title {
  font-family: "Rajdhani", "Inter", sans-serif;
  font-size: 1rem;
  font-weight: 800;
  color: var(--nav-text);
  margin: 0 0 4px;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
.cf-game-price {
  font-size: 0.85rem;
  font-weight: 700;
  color: var(--zzz-yellow);
  margin: 0;
}

.promo-spotlight-section {
  padding: 20px 4% 80px;
  max-width: 1600px;
  margin: 0 auto;
}
.promo-spotlight-inner {
  position: relative;
  border-radius: 28px;
  overflow: hidden;
  border: 1px solid var(--glass-border);
  min-height: 420px;
  display: flex;
  align-items: stretch;
}
.promo-spotlight-bg {
  position: absolute;
  inset: 0;
  z-index: 0;
}
.promo-bg-img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  filter: blur(18px) brightness(0.3) saturate(0.6);
  transform: scale(1.08);
}
.promo-bg-overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(
    135deg,
    rgba(2, 1, 10, 0.92) 0%,
    rgba(34, 0, 124, 0.55) 60%,
    rgba(2, 1, 10, 0.85) 100%
  );
}
.promo-spotlight-content {
  position: relative;
  z-index: 2;
  display: grid;
  grid-template-columns: 1fr 320px;
  gap: 60px;
  align-items: center;
  width: 100%;
  padding: 60px;
}
.promo-text-side {
  display: flex;
  flex-direction: column;
  gap: 20px;
}
.promo-badge {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: rgba(217, 244, 56, 0.12);
  border: 1px solid rgba(217, 244, 56, 0.3);
  color: var(--zzz-yellow);
  font-size: 0.72rem;
  font-weight: 800;
  text-transform: uppercase;
  letter-spacing: 1.5px;
  padding: 6px 16px;
  border-radius: 50px;
  width: fit-content;
}
.promo-title {
  font-family: "Rajdhani", "Inter", sans-serif;
  font-size: 3.5rem;
  font-weight: 900;
  color: var(--nav-text);
  margin: 0;
  line-height: 1;
  letter-spacing: -1px;
}
.promo-desc {
  font-size: 1rem;
  color: rgba(248, 249, 250, 0.7);
  line-height: 1.65;
  margin: 0;
  max-width: 520px;
}
.promo-meta {
  display: flex;
  gap: 10px;
  flex-wrap: wrap;
}
.promo-tag {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  background: var(--glass-surface);
  border: 1px solid var(--glass-border);
  color: var(--nav-text-muted);
  font-size: 0.75rem;
  font-weight: 600;
  padding: 6px 14px;
  border-radius: 50px;
}
.promo-actions {
  display: flex;
  gap: 14px;
  align-items: center;
  flex-wrap: wrap;
}
.btn-promo-primary {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  background: var(--nav-text);
  color: var(--black);
  border: none;
  padding: 16px 36px;
  border-radius: 50px;
  font-weight: 900;
  font-size: 0.9rem;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  cursor: pointer;
  transition:
    transform 0.25s ease,
    filter 0.25s ease,
    box-shadow 0.25s ease;
}
.btn-promo-primary:hover {
  transform: translateY(-3px);
  box-shadow: 0 14px 35px rgba(255, 255, 255, 0.2);
  filter: brightness(0.92);
}
.btn-promo-secondary {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  background: transparent;
  color: var(--nav-text);
  border: 1px solid var(--glass-border);
  padding: 15px 30px;
  border-radius: 50px;
  font-weight: 700;
  font-size: 0.9rem;
  cursor: pointer;
  transition: all 0.25s ease;
  backdrop-filter: blur(8px);
}
.btn-promo-secondary:hover {
  background: var(--glass-reflection);
  border-color: rgba(255, 255, 255, 0.3);
}
.promo-cover-side {
  display: flex;
  justify-content: center;
  align-items: center;
}
.promo-cover-frame {
  position: relative;
  width: 100%;
  max-width: 280px;
}
.promo-cover-img {
  width: 100%;
  aspect-ratio: 3/4;
  object-fit: cover;
  border-radius: 20px;
  border: 1px solid rgba(166, 74, 255, 0.3);
  box-shadow:
    0 30px 70px rgba(0, 0, 0, 0.7),
    0 0 60px rgba(166, 74, 255, 0.2);
  display: block;
}
.promo-cover-glow {
  position: absolute;
  inset: -20px;
  background: radial-gradient(
    ellipse at center,
    rgba(166, 74, 255, 0.2),
    transparent 70%
  );
  pointer-events: none;
  animation: promo-glow-pulse 3s ease-in-out infinite;
}
@keyframes promo-glow-pulse {
  0%,
  100% {
    opacity: 0.6;
  }
  50% {
    opacity: 1;
  }
}

.news-section {
  padding: 20px 4% 80px;
  max-width: 1600px;
  margin: 0 auto;
}
.news-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 32px;
}
.news-see-all {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  font-size: 0.8rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.8px;
  color: var(--nav-text-muted);
  text-decoration: none;
  border: 1px solid var(--glass-border);
  padding: 8px 18px;
  border-radius: 50px;
  transition: all 0.25s ease;
}
.news-see-all:hover {
  color: var(--nav-text);
  border-color: rgba(166, 74, 255, 0.4);
  background: rgba(166, 74, 255, 0.08);
}

.news-grid {
  display: grid;
  grid-template-columns: 1.6fr 1fr 1fr;
  gap: 24px;
  align-items: start;
}

.news-card {
  background: var(--glass-surface);
  border: 1px solid var(--glass-border);
  border-radius: 20px;
  overflow: hidden;
  transition:
    transform 0.3s ease,
    border-color 0.3s ease,
    box-shadow 0.3s ease;
  display: flex;
  flex-direction: column;
}
.news-card:hover {
  transform: translateY(-6px);
  border-color: rgba(166, 74, 255, 0.3);
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
}

.news-card-cover {
  position: relative;
  overflow: hidden;
}
.news-card--featured .news-card-cover {
  height: 220px;
}
.news-card:not(.news-card--featured) .news-card-cover {
  height: 160px;
}

.news-card-cover img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
  display: block;
}
.news-card:hover .news-card-cover img {
  transform: scale(1.06);
}

.news-category {
  position: absolute;
  top: 14px;
  left: 14px;
  background: rgba(34, 0, 124, 0.85);
  backdrop-filter: blur(8px);
  border: 1px solid rgba(166, 74, 255, 0.4);
  color: var(--nav-text);
  font-size: 0.65rem;
  font-weight: 800;
  text-transform: uppercase;
  letter-spacing: 1px;
  padding: 4px 12px;
  border-radius: 50px;
}
.news-card-body {
  padding: 22px;
  display: flex;
  flex-direction: column;
  gap: 10px;
  flex: 1;
}
.news-date {
  display: flex;
  align-items: center;
  gap: 6px;
  font-size: 0.72rem;
  color: var(--nav-text-muted);
  font-weight: 600;
}
.news-title {
  font-family: "Rajdhani", "Inter", sans-serif;
  font-size: 1rem;
  font-weight: 800;
  color: var(--nav-text);
  margin: 0;
  line-height: 1.35;
}
.news-card--featured .news-title {
  font-size: 1.15rem;
}
.news-excerpt {
  font-size: 0.83rem;
  color: var(--nav-text-muted);
  line-height: 1.55;
  margin: 0;
}
.news-read-more {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  font-size: 0.78rem;
  font-weight: 700;
  color: rgba(166, 74, 255, 0.85);
  text-decoration: none;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  margin-top: auto;
  transition:
    gap 0.2s ease,
    color 0.2s ease;
}
.news-read-more:hover {
  gap: 10px;
  color: #b86bff;
}

@media (max-width: 1024px) {
  .epic-hero-container {
    grid-template-columns: 1fr 220px;
  }
  .promo-spotlight-content {
    grid-template-columns: 1fr 260px;
    gap: 40px;
  }
  .news-grid {
    grid-template-columns: 1fr 1fr;
  }
  .news-card--featured {
    grid-column: 1/-1;
  }
  .news-card--featured .news-card-cover {
    height: 260px;
  }
}
@media (max-width: 768px) {
  .epic-hero-section {
    padding-top: 100px;
  }
  .epic-hero-container {
    grid-template-columns: 1fr;
    height: auto;
  }
  .hero-side-list {
    display: none;
  }
  .hero-main-display {
    height: 450px;
  }
  .hero-overlay-content {
    padding: 30px;
    max-width: 100%;
    backdrop-filter: blur(10px);
  }
  .hero-game-name {
    font-size: 2rem;
  }
  .hero-dots {
    top: auto;
    bottom: 20px;
    right: 50%;
    transform: translateX(50%);
  }
  .coverflow-track {
    padding: 0 calc(50% - 100px);
    gap: 16px;
  }
  .cf-card {
    flex: 0 0 180px;
  }
  .promo-spotlight-content {
    grid-template-columns: 1fr;
    padding: 40px 30px;
    gap: 30px;
  }
  .promo-cover-side {
    display: none;
  }
  .promo-title {
    font-size: 2.5rem;
  }
  .news-grid {
    grid-template-columns: 1fr;
  }
}
@media (max-width: 480px) {
  .hero-main-display {
    height: 400px;
  }
  .hero-actions {
    flex-direction: column;
    align-items: stretch;
  }
  .btn-wishlist {
    margin-left: 0;
  }
  .promo-title {
    font-size: 2rem;
  }
  .promo-actions {
    flex-direction: column;
  }
  .btn-promo-primary,
  .btn-promo-secondary {
    width: 100%;
    justify-content: center;
  }
}
```

## FILE: public\assets\css\pages\login.css

```css
html,
body {
  margin: 0;
  padding: 0;
  width: 100%;
  min-height: 100vh;
  overflow-x: hidden;
  overflow-y: auto;
  background-color: var(--black);
  font-family: "Inter", sans-serif;
}

main {
  padding-top: 0px !important;
}

a {
  text-decoration: none !important;
  color: inherit;
  transition: 0.3s;
}

.auth-full-wrapper {
  min-height: 100vh;
  height: auto;
  width: 100%;
  display: flex;
  animation: pageEntrance 0.6s ease-out forwards;
}

.auth-container {
  width: 100%;
  min-height: 100vh;
  display: flex;
  flex-wrap: wrap;
  background: var(--prussian-blue);
}

.auth-visual-side {
  flex: 1.2;
  position: relative;
  min-height: 300px;
}

.auth-visual-side img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  animation: imageReveal 1.2s ease forwards;
}

.visual-overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(
    to top,
    var(--prussian-blue) 15%,
    transparent 85%
  );
  display: flex;
  align-items: flex-end;
  padding: 40px;
}

.visual-content h2 {
  font-size: 2rem;
  color: #fff;
  line-height: 1.2;
  margin: 0;
  font-weight: 700;
  opacity: 0;
  transform: translateY(20px);
  animation: fadeUp 0.6s ease forwards;
  animation-delay: 0.3s;
}

.visual-content h2 span {
  color: var(--navy);
}

.auth-form-side {
  flex: 1;
  background: var(--prussian-blue);
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 30px;
}

.auth-form-box {
  width: 100%;
  max-width: 400px;
  margin: 0 auto;
  opacity: 0;
  transform: translateY(20px);
  animation: fadeUp 0.6s ease forwards;
  animation-delay: 0.2s;
}

.auth-logo-central {
  display: block;
  margin: 0 auto 20px;
  max-width: 120px;
}

.auth-header {
  text-align: center;
  margin-bottom: 20px;
}

.auth-header h1 {
  font-size: 1.5rem;
  color: #fff;
  margin-bottom: 5px;
}

.auth-header p {
  color: var(--nav-text-muted);
  font-size: 0.85rem;
}

.input-group {
  margin-bottom: 16px;
}

.input-group label {
  display: block;
  font-size: 0.75rem;
  color: #eee;
  margin-bottom: 6px;
  font-weight: 600;
  text-transform: uppercase;
}

.input-field {
  position: relative;
  display: flex;
  align-items: center;
}

.input-field i {
  position: absolute;
  left: 12px;
  color: var(--nav-text-muted);
}

.input-field input {
  width: 100%;
  padding: 12px 12px 12px 40px;
  background: rgba(255, 255, 255, 0.05);
  border: 1px solid var(--glass-border);
  border-radius: 8px;
  color: #fff;
  outline: none;
  transition: 0.3s;
}

.input-field input:focus {
  border-color: var(--navy);
  background: rgba(255, 255, 255, 0.08);
}

.forgot-link {
  display: block;
  font-size: 0.75rem;
  color: var(--nav-text-muted);
  margin-top: 5px;
}

.forgot-link:hover {
  color: var(--navy);
}

.btn-auth-primary {
  width: 100%;
  padding: 14px;
  background: var(--navy);
  color: #fff;
  border: none;
  border-radius: 8px;
  font-weight: 700;
  cursor: pointer;
  margin-top: 15px;
  transition: 0.3s;
}

.btn-auth-primary:hover {
  opacity: 0.9;
}

.auth-divider {
  text-align: center;
  margin: 20px 0;
  position: relative;
  color: var(--nav-text-muted);
  font-size: 0.75rem;
}

.auth-divider::before {
  content: "";
  position: absolute;
  top: 50%;
  left: 0;
  width: 100%;
  height: 1px;
  background: var(--glass-border);
}

.auth-divider span {
  background: var(--prussian-blue);
  padding: 0 10px;
  position: relative;
}

.social-auth {
  display: flex;
  justify-content: center;
  gap: 10px;
}

.social-auth a {
  width: 42px;
  height: 42px;
  border: 1px solid var(--glass-border);
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: rgba(255, 255, 255, 0.02);
  color: #fff;
  transition: 0.3s;
}

.social-auth a:hover {
  border-color: var(--navy);
  color: var(--navy);
}

.auth-switch {
  text-align: center;
  margin-top: 20px;
  color: var(--nav-text-muted);
  font-size: 0.85rem;
}

.auth-switch a {
  color: #fff;
  font-weight: 700;
}

.auth-switch a:hover {
  color: var(--navy);
}

.back-home {
  position: absolute;
  top: 20px;
  left: 20px;
  color: var(--nav-text-muted);
  font-size: 0.8rem;
}

@keyframes pageEntrance {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

@keyframes fadeUp {
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes imageReveal {
  from {
    transform: scale(1.1);
    filter: brightness(0);
  }
  to {
    transform: scale(1);
    filter: brightness(0.6);
  }
}

@media (max-width: 900px) {
  .auth-container {
    flex-direction: column;
  }
  .auth-visual-side {
    height: 200px;
  }
  .visual-overlay {
    padding: 20px;
  }
  .auth-form-side {
    padding: 20px;
  }
}
```

## FILE: public\assets\css\pages\noticias.css

```css
.noticias-main {
  padding-top: 110px;
}

.noticias-page-header {
  padding: 60px 4% 50px;
  max-width: 1600px;
  margin: 0 auto;
  border-bottom: 1px solid var(--glass-border);
  margin-bottom: 60px;
}

.noticias-page-header-inner {
  display: flex;
  flex-direction: column;
  gap: 28px;
}

.back-home {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  color: var(--nav-text-muted);
  text-decoration: none;
  font-size: 0.85rem;
  font-weight: 600;
  transition:
    color 0.2s ease,
    gap 0.2s ease;
  width: fit-content;
}

.back-home:hover {
  color: var(--nav-text);
  gap: 14px;
}

.noticias-page-eyebrow {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  font-size: 0.72rem;
  font-weight: 800;
  text-transform: uppercase;
  letter-spacing: 2px;
  color: rgba(166, 74, 255, 0.85);
}

.noticias-page-title {
  font-family: "Rajdhani", "Inter", sans-serif;
  font-size: 3rem;
  font-weight: 900;
  color: var(--nav-text);
  margin: 0;
  line-height: 1.05;
  letter-spacing: -1px;
}

.noticias-page-subtitle {
  font-size: 1rem;
  color: var(--nav-text-muted);
  margin: 0;
  line-height: 1.5;
}

.noticias-filters {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
}

.noticias-filter-btn {
  background: var(--glass-surface);
  border: 1px solid var(--glass-border);
  color: var(--nav-text-muted);
  padding: 8px 20px;
  border-radius: 50px;
  font-size: 0.8rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  cursor: pointer;
  transition: all 0.25s ease;
}

.noticias-filter-btn:hover {
  border-color: rgba(166, 74, 255, 0.4);
  color: var(--nav-text);
  background: rgba(166, 74, 255, 0.08);
}

.noticias-filter-btn.active {
  background: var(--navy);
  border-color: var(--navy);
  color: var(--nav-text);
  box-shadow: 0 0 16px var(--glow-purple);
}

.noticias-grid-section {
  padding: 0 4% 100px;
  max-width: 1600px;
  margin: 0 auto;
}

.noticias-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 28px;
}

.noticias-card--hero {
  grid-column: 1 / -1;
  display: grid;
  grid-template-columns: 1.4fr 1fr;
  border-radius: 24px;
}

.noticias-card--hero .noticias-card-cover {
  height: 100%;
  max-height: 400px;
}

.noticias-card {
  background: var(--glass-surface);
  border: 1px solid var(--glass-border);
  border-radius: 20px;
  overflow: hidden;
  display: flex;
  flex-direction: column;
  transition:
    transform 0.3s ease,
    border-color 0.3s ease,
    box-shadow 0.3s ease;
}

.noticias-card:hover {
  transform: translateY(-6px);
  border-color: rgba(166, 74, 255, 0.35);
  box-shadow: 0 20px 50px rgba(0, 0, 0, 0.4);
}

.noticias-card.noticias-hidden {
  display: none;
}

.noticias-card-cover {
  position: relative;
  overflow: hidden;
  height: 200px;
}

.noticias-card-cover img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
}

.noticias-card:hover .noticias-card-cover img {
  transform: scale(1.06);
}

.noticias-badge {
  position: absolute;
  top: 16px;
  left: 16px;
  background: rgba(34, 0, 124, 0.85);
  backdrop-filter: blur(8px);
  border: 1px solid rgba(166, 74, 255, 0.4);
  color: var(--nav-text);
  font-size: 0.65rem;
  font-weight: 800;
  text-transform: uppercase;
  letter-spacing: 1px;
  padding: 5px 13px;
  border-radius: 50px;
}

.noticias-card-body {
  padding: 26px;
  display: flex;
  flex-direction: column;
  gap: 12px;
  flex: 1;
}

.noticias-date {
  display: flex;
  align-items: center;
  gap: 6px;
  font-size: 0.72rem;
  color: var(--nav-text-muted);
  font-weight: 600;
}

.noticias-title {
  font-family: "Rajdhani", "Inter", sans-serif;
  font-size: 1.05rem;
  font-weight: 800;
  color: var(--nav-text);
  margin: 0;
  line-height: 1.3;
}

.noticias-card--hero .noticias-title {
  font-size: 1.5rem;
}

.noticias-excerpt {
  font-size: 0.85rem;
  color: var(--nav-text-muted);
  line-height: 1.6;
  margin: 0;
}

.noticias-read-more {
  display: inline-flex;
  align-items: center;
  gap: 7px;
  font-size: 0.78rem;
  font-weight: 700;
  color: rgba(166, 74, 255, 0.85);
  text-decoration: none;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  margin-top: auto;
  transition:
    gap 0.2s ease,
    color 0.2s ease;
}

.noticias-read-more:hover {
  gap: 12px;
  color: #b86bff;
}

.noticias-empty {
  text-align: center;
  padding: 80px 20px;
  color: var(--nav-text-muted);
}

.noticias-empty i {
  font-size: 3rem;
  margin-bottom: 20px;
  display: block;
  opacity: 0.4;
}

.noticias-empty p {
  font-size: 1rem;
  margin: 0;
}

@media (max-width: 1024px) {
  .noticias-grid {
    grid-template-columns: 1fr 1fr;
  }
  .noticias-card--hero {
    grid-template-columns: 1fr;
  }
  .noticias-card--hero .noticias-card-cover {
    height: 280px;
  }
  .noticias-page-title {
    font-size: 2.2rem;
  }
}

@media (max-width: 768px) {
  .noticias-grid {
    grid-template-columns: 1fr;
  }
  .noticias-card--hero {
    grid-column: auto;
  }
  .noticias-page-title {
    font-size: 1.8rem;
  }
}
```

### [ SEÇÃO: ARQUIVOS .SQL ]

## FILE: database\float.sql

```sql
-- Float Platform - Banco de Dados
-- Wampserver / PHPMyAdmin

CREATE DATABASE IF NOT EXISTS float
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE float;

CREATE TABLE IF NOT EXISTS usuario (
    id          INT UNSIGNED    NOT NULL AUTO_INCREMENT,
    nome        VARCHAR(50)     NOT NULL,
    email       VARCHAR(150)    NOT NULL UNIQUE,
    senha       VARCHAR(255)    NOT NULL,
    criado_em   DATETIME        NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

### [ SEÇÃO: ARQUIVOS .JS ]

## FILE: public\assets\js\global\global.js

```js
document.addEventListener("DOMContentLoaded", () => {
  initMobileMenu();
  initMegaDropdowns();
  initDynamicNavbar();
  initScrollReveal();
  initSmoothScroll();
  initScrollToTopButton();
});

function initMobileMenu() {
  const menuToggle = document.getElementById("menu-toggle");
  const navMenu = document.getElementById("nav-menu");

  if (menuToggle && navMenu) {
    menuToggle.addEventListener("click", (e) => {
      e.stopPropagation();
      navMenu.classList.toggle("active");
      menuToggle.classList.toggle("open");
      document.body.classList.toggle("menu-open");

      if (navigator.vibrate) {
        navigator.vibrate(10);
      }
    });

    navMenu.querySelectorAll("a").forEach((link) => {
      link.addEventListener("click", () => {
        navMenu.classList.remove("active");
        menuToggle.classList.remove("open");
        document.body.classList.remove("menu-open");
      });
    });

    document.addEventListener("click", (e) => {
      if (!navMenu.contains(e.target) && !menuToggle.contains(e.target)) {
        navMenu.classList.remove("active");
        menuToggle.classList.remove("open");
        document.body.classList.remove("menu-open");
      }
    });

    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape" && navMenu.classList.contains("active")) {
        navMenu.classList.remove("active");
        menuToggle.classList.remove("open");
        document.body.classList.remove("menu-open");
      }
    });
  }
}

function initMegaDropdowns() {
  const navItems = document.querySelectorAll(".nav-item.has-dropdown");

  navItems.forEach((item) => {
    const dropdown = item.querySelector(".mega-menu-wrapper");
    let hideTimeout;

    if (!dropdown) return;

    dropdown.style.display = "";
    dropdown.style.opacity = "";
    dropdown.style.pointerEvents = "";
    dropdown.style.transform = "";

    item.addEventListener("mouseenter", () => {
      clearTimeout(hideTimeout);

      if (window.innerWidth > 768) {
        dropdown.classList.add("is-active");

        requestAnimationFrame(() => {
          dropdown.style.visibility = "visible";
          dropdown.style.pointerEvents = "all";
          dropdown.style.opacity = "1";
          dropdown.style.transform = "translateX(-50%) translateY(0) scale(1)";
          dropdown.style.filter = "blur(0px)";
          dropdown.style.transition = "all 0.5s cubic-bezier(0.16, 1, 0.3, 1)";
        });
      }
    });

    item.addEventListener("mouseleave", () => {
      if (window.innerWidth > 768) {
        hideTimeout = setTimeout(() => {
          dropdown.style.opacity = "0";
          dropdown.style.transform =
            "translateX(-50%) translateY(15px) scale(0.98)";
          dropdown.style.filter = "blur(10px)";
          dropdown.style.pointerEvents = "none";

          setTimeout(() => {
            if (!dropdown.classList.contains("is-active")) {
              dropdown.style.visibility = "hidden";
            }
          }, 500);

          dropdown.classList.remove("is-active");
        }, 150);
      }
    });

    const link = item.querySelector(".nav-link");
    link.addEventListener("click", (e) => {
      if (window.innerWidth <= 768) {
        e.preventDefault();
        const isOpening = !dropdown.classList.contains("mobile-open");

        document
          .querySelectorAll(".mega-menu-wrapper")
          .forEach((m) => m.classList.remove("mobile-open"));

        if (isOpening) {
          dropdown.classList.add("mobile-open");
          dropdown.style.display = "block";
        } else {
          dropdown.classList.remove("mobile-open");
          dropdown.style.display = "none";
        }
      }
    });
  });
}

function initScrollReveal() {
  const observerOptions = {
    threshold: 0.1,
    rootMargin: "0px 0px -50px 0px",
  };

  const revealOnScroll = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("reveal-visible");
      }
    });
  }, observerOptions);

  const elementsToAnimate = document.querySelectorAll(
    ".epic-card, .store-section, .footer-modern",
  );
  elementsToAnimate.forEach((el) => {
    el.classList.add("reveal-hidden");
    revealOnScroll.observe(el);
  });
}

function initSmoothScroll() {
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute("href"));
      if (target) {
        target.scrollIntoView({
          behavior: "smooth",
        });
      }
    });
  });
}

function initScrollToTopButton() {
  const btn = document.createElement("button");
  btn.id = "scroll-to-top";
  btn.innerHTML = '<i class="fas fa-arrow-up"></i>';
  btn.style.cssText = `
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, var(--Fogo), #ffed4e);
        color: var(--zzz-black);
        border: none;
        border-radius: 50%;
        cursor: pointer;
        font-size: 1.3rem;
        display: none;
        z-index: 999;
        box-shadow: 0 10px 30px rgba(217, 244, 56, 0.4);
        transition: all 0.3s ease;
        font-weight: 800;
        align-items: center;
        justify-content: center;
    `;

  document.body.appendChild(btn);

  window.addEventListener("scroll", () => {
    btn.style.display = window.pageYOffset > 300 ? "flex" : "none";
  });

  btn.addEventListener("click", () => {
    window.scrollTo({ top: 0, behavior: "smooth" });
  });

  btn.addEventListener("mouseenter", () => {
    btn.style.transform = "scale(1.15) translateY(-5px)";
    btn.style.boxShadow = "0 20px 50px rgba(217, 244, 56, 0.6)";
  });

  btn.addEventListener("mouseleave", () => {
    btn.style.transform = "scale(1)";
    btn.style.boxShadow = "0 10px 30px rgba(217, 244, 56, 0.4)";
  });
}

function initDynamicNavbar() {
  const navbar = document.querySelector(".nav-wrapper");
  window.addEventListener("scroll", () => {
    if (window.scrollY > 100) {
      navbar.style.boxShadow =
        "0 20px 60px rgba(0, 0, 0, 0.9), 0 0 40px rgba(217, 244, 56, 0.2)";
      navbar.style.backgroundColor = "rgba(10, 10, 15, 0.97)";
    } else {
      navbar.style.boxShadow =
        "0 10px 40px rgba(0, 0, 0, 0.8), inset 0 1px 20px rgba(217, 244, 56, 0.1)";
      navbar.style.backgroundColor = "var(--nav-bg)";
    }
  });

  const observerOptions = {
    threshold: 0.1,
  };

  const revealOnScroll = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("reveal-visible");
      }
    });
  }, observerOptions);

  document.addEventListener("DOMContentLoaded", () => {
    const elementsToAnimate = document.querySelectorAll(
      ".epic-card, .store-section, .footer-modern",
    );

    elementsToAnimate.forEach((el) => {
      el.classList.add("reveal-hidden");
      revealOnScroll.observe(el);
    });

    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
      anchor.addEventListener("click", function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute("href")).scrollIntoView({
          behavior: "smooth",
        });
      });
    });
  });
}

document.addEventListener("DOMContentLoaded", () => {
  const trigger = document.getElementById("profileTrigger");
  const dropdown = document.getElementById("profileDropdown");

  if (trigger && dropdown) {
    // Toggle ao clicar no avatar
    trigger.addEventListener("click", (e) => {
      e.stopPropagation(); // Evita que o clique feche o menu imediatamente
      dropdown.classList.toggle("active");
    });

    // Fecha o dropdown ao clicar em qualquer outro lugar da página
    document.addEventListener("click", (e) => {
      if (!dropdown.contains(e.target) && e.target !== trigger) {
        dropdown.classList.remove("active");
      }
    });

    // Fecha com a tecla Esc para melhor acessibilidade
    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape") dropdown.classList.remove("active");
    });
  }
});
```

## FILE: public\assets\js\pages\cadastro.js

```js
document.addEventListener("DOMContentLoaded", () => {
  iniciarToggleSenha();
  exibirToastCadastro();
});

function exibirToastCadastro() {
  const params = new URLSearchParams(window.location.search);
  const erro = params.get("erro");

  if (!erro) return;

  Toastify({
    text: decodeURIComponent(erro),
    duration: 3500,
    gravity: "top",
    position: "right",
    stopOnFocus: true,
    style: {
      background: "#ff4747",
    },
  }).showToast();

  window.history.replaceState({}, "", window.location.pathname);
}

function iniciarToggleSenha() {
  document.querySelectorAll(".btn-toggle-password").forEach((btn) => {
    btn.addEventListener("click", () => {
      const targetId = btn.dataset.target;
      const input = document.getElementById(targetId);
      const icon = btn.querySelector("i");

      if (!input) return;

      const mostrandoSenha = input.type === "text";

      input.type = mostrandoSenha ? "password" : "text";

      icon.className = mostrandoSenha
        ? "fa-regular fa-eye"
        : "fa-regular fa-eye-slash";
    });
  });
}
```

## FILE: public\assets\js\pages\index.js

```js
document.addEventListener("DOMContentLoaded", () => {
  iniciarHeroSlider();
  initCoverFlow();
});

const HERO_DATA = [
  {
    img: "./assets/img/pages/index/slides/slide_01.png",
    title: "Deltarune",
    desc: "Mergulhe em um novo capítulo do multiverso de Toby Fox. Uma narrativa emocionante e subversiva que redefine os limites do RPG indie com carisma e mistério.",
    status: "Última Atualização",
  },
  {
    img: "./assets/img/pages/index/slides/slide_02.png",
    title: "Celeste",
    desc: "Uma obra-prima de plataforma sobre autodescoberta. Supere montanhas físicas e metafóricas em uma jornada sensível, precisa e visualmente deslumbrante.",
    status: "Aclamado pela Crítica",
  },
  {
    img: "./assets/img/pages/index/slides/slide_03.png",
    title: "Hades II",
    desc: "A batalha além do Submundo continua. Domine feitiçarias ancestrais e enfrente o Titã do Tempo nesta sequência eletrizante do roguelite mais premiado da Supergiant.",
    status: "Early Access",
  },
  {
    img: "./assets/img/pages/index/slides/slide_04.png",
    title: "Journey",
    desc: "Uma odisseia visual e sonora pelas areias de um mundo ancestral. Descubra a beleza do silêncio e a conexão humana em uma das experiências mais artísticas dos games.",
    status: "Early Access",
  },
  {
    img: "./assets/img/pages/index/slides/slide_05.png",
    title: "Stardew Valley",
    desc: "Cultive muito mais que uma fazenda. Construa laços, explore segredos e encontre o seu refúgio ideal neste simulador de vida que transborda charme e profundidade.",
    status: "Disponível",
  },
];

let slideAtual = 0;
let slideInterval;

function iniciarHeroSlider() {
  const sideItems = document.querySelectorAll(".side-item");
  const mainImg = document.querySelector(".hero-main-img");
  const heroContent = document.querySelector(".hero-overlay-content");
  const heroDots = document.querySelectorAll(".hero-dot");

  if (!mainImg || !heroContent || sideItems.length === 0) return;

  comecarAutoPlay(sideItems, mainImg, heroContent, heroDots);

  sideItems.forEach((item, index) => {
    item.addEventListener("click", () => {
      resetarAutoPlay();
      trocarSlide(index, sideItems, mainImg, heroContent, heroDots);
      comecarAutoPlay(sideItems, mainImg, heroContent, heroDots);
    });
  });
}

function comecarAutoPlay(sideItems, mainImg, heroContent, heroDots) {
  slideInterval = setInterval(() => {
    slideAtual = (slideAtual + 1) % HERO_DATA.length;
    trocarSlide(slideAtual, sideItems, mainImg, heroContent, heroDots);
  }, 7000);
}

function resetarAutoPlay() {
  clearInterval(slideInterval);
}

function trocarSlide(index, sideItems, mainImg, heroContent, heroDots) {
  slideAtual = index;
  const dado = HERO_DATA[index];

  sideItems.forEach((i) => i.classList.remove("active"));
  if (sideItems[index]) sideItems[index].classList.add("active");

  if (heroDots) {
    heroDots.forEach((d) => d.classList.remove("active"));
    if (heroDots[index]) heroDots[index].classList.add("active");
  }

  mainImg.style.opacity = "0";
  heroContent.style.transform = "translateX(-20px)";
  heroContent.style.opacity = "0";

  setTimeout(() => {
    mainImg.src = dado.img;
    heroContent.querySelector(".hero-status").textContent = dado.status;
    heroContent.querySelector(".hero-game-name").textContent = dado.title;
    heroContent.querySelector(".hero-description").textContent = dado.desc;

    mainImg.style.opacity = "1";
    heroContent.style.transform = "translateX(0)";
    heroContent.style.opacity = "1";
  }, 300);
}

function initCoverFlow() {
  const track = document.getElementById("coverflowTrack");
  const btnPrev = document.getElementById("coverflow-prev");
  const btnNext = document.getElementById("coverflow-next");

  if (!track || !btnPrev || !btnNext) return;

  const cards = Array.from(track.querySelectorAll(".cf-card"));
  let current = Math.floor(cards.length / 2);

  function applyStates() {
    cards.forEach((card, i) => {
      card.classList.remove(
        "cf-active",
        "cf-near",
        "cf-near-left",
        "cf-far-left",
      );

      const diff = i - current;

      if (diff === 0) card.classList.add("cf-active");
      else if (diff === 1) card.classList.add("cf-near");
      else if (diff === -1) card.classList.add("cf-near-left");
      else if (diff < -1) card.classList.add("cf-far-left");
    });

    centerActiveCard();
  }

  function centerActiveCard() {
    const activeCard = cards[current];
    if (!activeCard) return;

    const wrapperWidth = track.parentElement.offsetWidth;
    const cardWidth = activeCard.offsetWidth;
    const offset = activeCard.offsetLeft - wrapperWidth / 2 + cardWidth / 2;

    track.style.transform = `translateX(-${offset}px)`;
  }

  function goTo(index) {
    current = Math.max(0, Math.min(index, cards.length - 1));
    applyStates();
  }

  cards.forEach((card, i) => {
    card.addEventListener("click", () => goTo(i));
  });

  btnPrev.addEventListener("click", () => goTo(current - 1));
  btnNext.addEventListener("click", () => goTo(current + 1));

  let touchStartX = 0;
  track.addEventListener(
    "touchstart",
    (e) => {
      touchStartX = e.touches[0].clientX;
    },
    { passive: true },
  );
  track.addEventListener(
    "touchend",
    (e) => {
      const delta = touchStartX - e.changedTouches[0].clientX;
      if (Math.abs(delta) > 40) goTo(current + (delta > 0 ? 1 : -1));
    },
    { passive: true },
  );

  window.addEventListener("resize", () => centerActiveCard(), {
    passive: true,
  });

  applyStates();
}
```

## FILE: public\assets\js\pages\login.js

```js
document.addEventListener("DOMContentLoaded", () => {
  iniciarToggleSenha();
  exibirToast();
});

function exibirToast() {
  const params = new URLSearchParams(window.location.search);

  const erro = params.get("erro");
  const cadastro = params.get("cadastro");
  const login = params.get("login");

  if (cadastro === "sucesso") {
    Toastify({
      text: "Conta criada com sucesso!",
      duration: 3000,
      gravity: "top",
      position: "right",
      stopOnFocus: true,
      style: {
        background: "#22c55e",
      },
    }).showToast();
  }

  if (erro) {
    Toastify({
      text: decodeURIComponent(erro),
      duration: 3500,
      gravity: "top",
      position: "right",
      stopOnFocus: true,
      style: {
        background: "#ff4747",
      },
    }).showToast();
  }

  if (login === "sucesso") {
    Toastify({
      text: "Login realizado com sucesso!",
      duration: 3000,
      gravity: "top",
      position: "right",
      stopOnFocus: true,
      style: {
        background: "#22c55e",
      },
    }).showToast();
  }

  window.history.replaceState({}, "", window.location.pathname);
}

function iniciarToggleSenha() {
  document.querySelectorAll(".btn-toggle-password").forEach((btn) => {
    btn.addEventListener("click", () => {
      const targetId = btn.dataset.target;
      const input = document.getElementById(targetId);
      const icon = btn.querySelector("i");

      if (!input) return;

      const mostrandoSenha = input.type === "text";

      input.type = mostrandoSenha ? "password" : "text";

      icon.className = mostrandoSenha
        ? "fa-regular fa-eye"
        : "fa-regular fa-eye-slash";
    });
  });
}
```

## FILE: public\assets\js\pages\noticias.js

```js
/* =====================================================
   noticias.js — Float
   Filtro por categoria na página de notícias.
   ===================================================== */

document.addEventListener("DOMContentLoaded", () => {
  initNoticiaFilters();
});

function initNoticiaFilters() {
  const filterBtns = document.querySelectorAll(".noticias-filter-btn");
  const cards = document.querySelectorAll("#noticiasGrid .noticias-card");
  const emptyState = document.getElementById("noticiasEmpty");

  if (!filterBtns.length || !cards.length) return;

  filterBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
      // Atualiza botão ativo
      filterBtns.forEach((b) => b.classList.remove("active"));
      btn.classList.add("active");

      const filter = btn.dataset.filter;
      let visibleCount = 0;

      cards.forEach((card) => {
        const category = card.dataset.category?.toLowerCase() ?? "";
        const isVisible = filter === "all" || category === filter;

        card.classList.toggle("noticias-hidden", !isVisible);
        if (isVisible) visibleCount++;
      });

      // Mostra estado vazio quando nenhuma notícia bater com o filtro
      if (emptyState) {
        emptyState.style.display = visibleCount === 0 ? "block" : "none";
      }
    });
  });
}
```

### [ SEÇÃO: ARQUIVOS .PY ]

## FILE: tools\conversor_png.py

```py
import os

def transformar_para_png():
    diretorio_atual = os.path.dirname(os.path.abspath(__file__))
    raiz_projeto = os.path.dirname(diretorio_atual)

    extensoes_alvo = ['.jpg', '.jpeg', '.bmp', '.webp', '.tiff', '.avif']

    print(f"🚀 Iniciando busca na raiz do projeto: {raiz_projeto}")

    for raiz, pastas, arquivos in os.walk(raiz_projeto):
        if 'tools' in pastas:
            pastas.remove('tools')

        for nome_arquivo in arquivos:
            nome_base, extensao = os.path.splitext(nome_arquivo)
            extensao = extensao.lower()

            if extensao in extensoes_alvo and extensao != '.ico':
                caminho_antigo = os.path.join(raiz, nome_arquivo)
                caminho_novo = os.path.join(raiz, nome_base + '.png')

                try:
                    os.rename(caminho_antigo, caminho_novo)
                    print(f"✅ Renomeado em {os.path.basename(raiz)}: {nome_arquivo} -> {nome_base}.png")
                except Exception as e:
                    print(f"❌ Erro ao renomear {nome_arquivo}: {e}")

if __name__ == "__main__":
    transformar_para_png()
    print("\n✨ Processo concluído com sucesso!")
```

## FILE: tools\readme.py

````py
import pathlib

class ProjectArchivist:

    def __init__(self, target_extensions: list):
        current_script_dir = pathlib.Path(__file__).parent.resolve()

        self.root_dir = current_script_dir.parent

        self.extensions = {f".{ext.lstrip('.')}".lower() for ext in target_extensions}
        self.tree_lines = []

    def build_tree(self, directory: pathlib.Path, prefix: str = ""):
        ignored = {'.git', '__pycache__', 'node_modules', '.venv', 'dist'}

        entries = [e for e in directory.iterdir() if e.name not in ignored]
        entries.sort(key=lambda x: (not x.is_dir(), x.name.lower()))

        for i, entry in enumerate(entries):
            is_last = i == len(entries) - 1
            connector = "└── " if is_last else "├── "
            self.tree_lines.append(f"{prefix}{connector}{entry.name}")

            if entry.is_dir():
                new_prefix = prefix + ("    " if is_last else "│   ")
                self.build_tree(entry, new_prefix)

    def collect_source_code(self):
        catalog = {ext: [] for ext in self.extensions}

        for file in self.root_dir.rglob('*'):
            if file.is_file() and file.suffix.lower() in self.extensions:
                try:
                    catalog[file.suffix.lower()].append({
                        'rel_path': file.relative_to(self.root_dir),
                        'content': file.read_text(encoding='utf-8', errors='replace')
                    })
                except Exception as e:
                    print(f"Erro ao ler {file.name}: {e}")
        return catalog

    def export(self, output_name: str):
        source_data = self.collect_source_code()
        self.build_tree(self.root_dir)

        with open(output_name, 'w', encoding='utf-8') as f:
            f.write(f"--- PROJETO: {self.root_dir.name} ---\n\n")

            f.write("## ESTRUTURA DO PROJETO\n")
            f.write("```text\n")
            f.write("\n".join(self.tree_lines))
            f.write("\n```\n\n" + "="*50 + "\n\n")

            for ext, files in source_data.items():
                if not files: continue

                f.write(f"### [ SEÇÃO: ARQUIVOS {ext.upper()} ]\n\n")
                for file in files:
                    f.write(f"FILE: {file['rel_path']}\n")
                    f.write(f"{'-' * 40}\n")
                    lang = ext.lstrip('.')
                    f.write(f"```{lang}\n{file['content']}\n```\n\n")
                f.write("\n")

if __name__ == "__main__":
    REQUIRED_EXTS = ['html', 'css', 'js', 'java', 'sql', 'php', 'py']

    archivist = ProjectArchivist(REQUIRED_EXTS)
    archivist.export("Projeto_Full_Context.md")

    print(f"Processamento concluído na raiz: {archivist.root_dir}")
````

### [ SEÇÃO: ARQUIVOS .PHP ]

## FILE: api\auth.php

```php

```

## FILE: api\logout.php

```php
<?php
if(!isset($_SESSION)) {
    session_start();
}

session_destroy();

header("Location: ../public/index.php");
exit;
?>
```

## FILE: public\index.php

```php
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
    <meta name="description" content="Float - O maior repositório de jogos indie. Explore, jogue e publique seus projetos.">
    <title>Float | Página Inicial</title>

    <link rel="stylesheet" href="./assets/css/global/global.css" />

    <link rel="stylesheet" href="./assets/css/pages/index.css">

    <link rel="icon" href="./assets/img/favicon/icone.ico" type="image/x-icon" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@700&family=Inter:wght@400;600;700;900&display=swap" rel="stylesheet" />
</head>

<body>

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
                                <span class="user-name">Usuário Float</span>
                                <span class="user-status"><i class="fas fa-circle"></i> Online</span>
                            </div>
                            <div class="menu-divider"></div>
                            <ul class="menu-list">
                                <li><a href="pages/perfil.php"><i class="fas fa-user-circle"></i> <span>Meu Perfil</span></a></li>
                                <li><a href="/api/logout.php" class="logout-item"><i class="fas fa-sign-out-alt"></i> <span>Sair</span></a></li>
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

    <main>
        <section class="epic-hero-section">
            <div class="epic-hero-container">

                <div class="hero-main-display">
                    <img src="./assets/img/pages/index/slides/slide_01.png"
                         alt="Deltarune"
                         class="hero-main-img">

                    <div class="hero-gradient-overlay"></div>

                    <div class="hero-overlay-content">
                        <span class="hero-status">Disponível Agora</span>
                        <h2 class="hero-game-name">Deltarune</h2>
                        <p class="hero-description">O universo de Undertale expande. Explore uma aventura emocional criada por Toby Fox que redefine o RPG indie.</p>
                        <div class="hero-actions">
                            <button class="btn-buy">Jogue Agora</button>
                            <button class="btn-wishlist" title="Lista de Desejos">
                                <i class="fa-regular fa-bookmark"></i>
                            </button>
                        </div>
                    </div>

                    <div class="hero-dots">
                        <span class="hero-dot active"></span>
                        <span class="hero-dot"></span>
                        <span class="hero-dot"></span>
                    </div>

                    <div class="hero-progress-bar">
                        <div class="hero-progress-bar-fill"></div>
                    </div>
                </div>

                <aside class="hero-side-list">
                    <div class="side-item active">
                        <img src="./assets/img/pages/index/slides/slide_01.png" alt="Deltarune">
                        <div class="side-item-info">
                            <span class="side-item-name">Deltarune</span>
                            <span class="side-item-tag"></span>
                        </div>
                    </div>
                    <div class="side-item">
                        <img src="./assets/img/pages/index/slides/slide_02.png" alt="Celeste">
                        <div class="side-item-info">
                            <span class="side-item-name">Celeste</span>
                            <span class="side-item-tag"></span>
                        </div>
                    </div>
                    <div class="side-item">
                        <img src="./assets/img/pages/index/slides/slide_03.png" alt="Hades II">
                        <div class="side-item-info">
                            <span class="side-item-name">Hades II</span>
                            <span class="side-item-tag"></span>
                        </div>
                    </div>
                    <div class="side-item">
                        <img src="./assets/img/pages/index/slides/slide_04.png" alt="Journey">
                        <div class="side-item-info">
                            <span class="side-item-name">Journey</span>
                            <span class="side-item-tag"></span>
                        </div>
                    </div>
                    <div class="side-item">
                        <img src="./assets/img/pages/index/slides/slide_05.png" alt="Stardew Valley">
                        <div class="side-item-info">
                            <span class="side-item-name">Stardew Valley</span>
                            <span class="side-item-tag"></span>
                        </div>
                    </div>
                </aside>

            </div>
        </section>

        <section class="store-section">
            <div class="store-header">
                <h2 class="store-title">Descubra algo novo  <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></h2>
                <div class="store-nav">
                    <button class="nav-arrow" id="coverflow-prev" aria-label="Anterior"><i class="fa-solid fa-chevron-left"></i></button>
                    <button class="nav-arrow" id="coverflow-next" aria-label="Próximo"><i class="fa-solid fa-chevron-right"></i></button>
                </div>
            </div>

            <div class="coverflow-track-wrapper">
                <div class="coverflow-track" id="coverflowTrack">

                    <div class="cf-card" data-title="Hollow Knight: Silksong" data-type="Jogo Base" data-price="Grátis">
                        <div class="cf-card-cover">
                            <img src="./assets/img/pages/index/cards/card_silksong.png" alt="Hollow Knight: Silksong" loading="lazy">
                            <div class="cf-card-overlay"><i class="fa-solid fa-play"></i></div>
                        </div>
                        <div class="cf-card-info">
                            <span class="cf-game-type">Jogo Base</span>
                            <h3 class="cf-game-title">Hollow Knight: Silksong</h3>
                            <p class="cf-game-price">Grátis</p>
                        </div>
                    </div>

                    <div class="cf-card" data-title="Celeste" data-type="Indie" data-price="R$ 36,99">
                        <div class="cf-card-cover">
                            <img src="./assets/img/pages/index/cards/card_celeste.png" alt="Celeste" loading="lazy">
                            <div class="cf-card-overlay"><i class="fa-solid fa-play"></i></div>
                        </div>
                        <div class="cf-card-info">
                            <span class="cf-game-type">Indie</span>
                            <h3 class="cf-game-title">Celeste</h3>
                            <p class="cf-game-price">R$ 36,99</p>
                        </div>
                    </div>

                    <div class="cf-card" data-title="Deltarune" data-type="RPG" data-price="Grátis">
                        <div class="cf-card-cover">
                            <img src="./assets/img/pages/index/cards/card_deltarune.png" alt="Deltarune" loading="lazy">
                            <div class="cf-card-overlay"><i class="fa-solid fa-play"></i></div>
                        </div>
                        <div class="cf-card-info">
                            <span class="cf-game-type">RPG</span>
                            <h3 class="cf-game-title">Deltarune</h3>
                            <p class="cf-game-price">Grátis</p>
                        </div>
                    </div>

                    <div class="cf-card" data-title="Hades II" data-type="Roguelite" data-price="R$ 59,99">
                        <div class="cf-card-cover">
                            <img src="./assets/img/pages/index/cards/card_hadesII.png" alt="Hades II" loading="lazy">
                            <div class="cf-card-overlay"><i class="fa-solid fa-play"></i></div>
                        </div>
                        <div class="cf-card-info">
                            <span class="cf-game-type">Roguelite</span>
                            <h3 class="cf-game-title">Hades II</h3>
                            <p class="cf-game-price">R$ 59,99</p>
                        </div>
                    </div>

                    <div class="cf-card" data-title="Journey" data-type="Aventura" data-price="R$ 29,99">
                        <div class="cf-card-cover">
                            <img src="./assets/img/pages/index/cards/card_journey.png" alt="Journey" loading="lazy">
                            <div class="cf-card-overlay"><i class="fa-solid fa-play"></i></div>
                        </div>
                        <div class="cf-card-info">
                            <span class="cf-game-type">Aventura</span>
                            <h3 class="cf-game-title">Journey</h3>
                            <p class="cf-game-price">R$ 29,99</p>
                        </div>
                    </div>

                    <div class="cf-card" data-title="Undertale" data-type="RPG" data-price="R$ 19,99">
                        <div class="cf-card-cover">
                            <img src="./assets/img/pages/index/cards/card_undertale.png" alt="Undertale" loading="lazy">
                            <div class="cf-card-overlay"><i class="fa-solid fa-play"></i></div>
                        </div>
                        <div class="cf-card-info">
                            <span class="cf-game-type">RPG</span>
                            <h3 class="cf-game-title">Undertale</h3>
                            <p class="cf-game-price">R$ 19,99</p>
                        </div>
                    </div>

                    <div class="cf-card" data-title="Shovel Knight" data-type="Plataforma" data-price="R$ 39,99">
                        <div class="cf-card-cover">
                            <img src="./assets/img/pages/index/cards/card_shovel_knight.png" alt="Shovel Knight" loading="lazy">
                            <div class="cf-card-overlay"><i class="fa-solid fa-play"></i></div>
                        </div>
                        <div class="cf-card-info">
                            <span class="cf-game-type">Plataforma</span>
                            <h3 class="cf-game-title">Shovel Knight</h3>
                            <p class="cf-game-price">R$ 39,99</p>
                        </div>
                    </div>

                    <div class="cf-card" data-title="Stardew Valley" data-type="Simulação" data-price="R$ 27,99">
                        <div class="cf-card-cover">
                            <img src="./assets/img/pages/index/cards/card_stardew_valley.png" alt="Stardew Valley" loading="lazy">
                            <div class="cf-card-overlay"><i class="fa-solid fa-play"></i></div>
                        </div>
                        <div class="cf-card-info">
                            <span class="cf-game-type">Simulação</span>
                            <h3 class="cf-game-title">Stardew Valley</h3>
                            <p class="cf-game-price">R$ 27,99</p>
                        </div>
                    </div>

                    <div class="cf-card" data-title="Dead Cells" data-type="Roguelike" data-price="R$ 49,99">
                        <div class="cf-card-cover">
                            <img src="./assets/img/pages/index/cards/card_dead_cells.png" alt="Dead Cells" loading="lazy">
                            <div class="cf-card-overlay"><i class="fa-solid fa-play"></i></div>
                        </div>
                        <div class="cf-card-info">
                            <span class="cf-game-type">Roguelike</span>
                            <h3 class="cf-game-title">Dead Cells</h3>
                            <p class="cf-game-price">R$ 49,99</p>
                        </div>
                    </div>

                    <div class="cf-card" data-title="Cuphead" data-type="Run &amp; Gun" data-price="R$ 44,99">
                        <div class="cf-card-cover">
                            <img src="./assets/img/pages/index/cards/card_cuphead.png" alt="Cuphead" loading="lazy">
                            <div class="cf-card-overlay"><i class="fa-solid fa-play"></i></div>
                        </div>
                        <div class="cf-card-info">
                            <span class="cf-game-type">Run &amp; Gun</span>
                            <h3 class="cf-game-title">Cuphead</h3>
                            <p class="cf-game-price">R$ 44,99</p>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="promo-spotlight-section">
            <div class="promo-spotlight-inner">
                <div class="promo-spotlight-bg">
                    <img src="./assets/img/pages/index/slides/slide_03.png" alt="" aria-hidden="true" class="promo-bg-img">
                    <div class="promo-bg-overlay"></div>
                </div>
                <div class="promo-spotlight-content">
                    <div class="promo-text-side">
                        <span class="promo-badge"><i class="fa-solid fa-star"></i> Em Destaque</span>
                        <h2 class="promo-title">Hades II</h2>
                        <p class="promo-desc">A sequência do premiado roguelite da Supergiant Games chega em Early Access. Mais profundo, mais sombrio e mais viciante do que jamais foi.</p>
                        <div class="promo-meta">
                            <span class="promo-tag"><i class="fa-solid fa-layer-group"></i> Roguelite</span>
                            <span class="promo-tag"><i class="fa-solid fa-bolt"></i> Early Access</span>
                            <span class="promo-tag"><i class="fa-solid fa-users"></i> Single Player</span>
                        </div>
                        <div class="promo-actions">
                            <button class="btn-promo-primary"><i class="fa-solid fa-play"></i> Jogar Agora</button>
                            <button class="btn-promo-secondary"><i class="fa-regular fa-bookmark"></i> Lista de Desejos</button>
                        </div>
                    </div>
                    <div class="promo-cover-side">
                        <div class="promo-cover-frame">
                            <img src="./assets/img/pages/index/cards/card_hadesII.png" alt="Hades II" class="promo-cover-img">
                            <div class="promo-cover-glow"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="news-section">
            <div class="news-header">
                <h2 class="store-title">Últimas Notícias <i class="fa-solid fa-newspaper"></i></h2>
                <a href="./pages/noticias.php" class="back-home news-see-all">
                    Ver todas as notícias  <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                </a>
            </div>

            <div class="news-grid">

                <article class="news-card news-card--featured">
                    <div class="news-card-cover">
                        <img src="./assets/img/pages/index/slides/slide_02.png" alt="Celeste recebe atualização surpresa" loading="lazy">
                        <span class="news-category">Atualização</span>
                    </div>
                    <div class="news-card-body">
                        <time class="news-date"><i class="fa-regular fa-clock"></i> 8 maio 2026</time>
                        <h3 class="news-title">Celeste recebe patch surpresa com novo modo de dificuldade após 3 anos</h3>
                        <p class="news-excerpt">Maddy Thorson lançou o inédito Crystal Heart Mode. O patch gratuito revisita fases icônicas com mecânicas e desafios novos.</p>
                        <a href="./pages/noticias.php" class="news-read-more">Ler mais <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </article>

                <article class="news-card">
                    <div class="news-card-cover">
                        <img src="./assets/img/pages/index/slides/slide_06.png" alt="Game Jam Float 2026" loading="lazy">
                        <span class="news-category">Comunidade</span>
                    </div>
                    <div class="news-card-body">
                        <time class="news-date"><i class="fa-regular fa-clock"></i> 5 maio 2026</time>
                        <h3 class="news-title">Float anuncia sua primeira Game Jam com prêmio de visibilidade na plataforma</h3>
                        <div class="news-excerpt">Talentos independentes terão 72 horas para criar jogos sob um tema secreto. O grande vencedor ganhará destaque global, mentoria exclusiva e total suporte de nossa comunidade.</div>
                        <a href="./pages/noticias.php" class="news-read-more">Ler mais <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </article>

                <article class="news-card">
                    <div class="news-card-cover">
                        <img src="./assets/img/pages/index/slides/slide_01.png" alt="Deltarune capítulo 3" loading="lazy">
                        <span class="news-category">Lançamento</span>
                    </div>
                    <div class="news-card-body">
                        <time class="news-date"><i class="fa-regular fa-clock"></i> 1 maio 2026</time>
                        <h3 class="news-title">Toby Fox confirma data para os capítulos 3 e 4 de Deltarune</h3>
                        <p class="news-excerpt">Os novos capítulos já estão disponíveis para os fãs. A expansão traz mistérios profundos, trilha sonora épica e o humor único de Undertale em uma jornada que redefine todo o gênero de RPG.</p>
                        <a href="./pages/noticias.php" class="news-read-more">Ler mais <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </article>

            </div>
        </section>

    </main>

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

    <script src="./assets/js/global/global.js"></script>
    <script src="./assets/js/pages/index.js"></script>

</body>

</html>

```

## FILE: public\pages\cadastro.php

```php
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Float - Crie sua conta e publique seus jogos indie gratuitamente.">
    <title>Float | Cadastro</title>

    <link rel="stylesheet" href="../assets/css/global/global.css">

    <link rel="stylesheet" href="../assets/css/pages/cadastro.css">

    <link rel="icon" href="/public/assets/img/favicon/icone.ico" type="image/x-icon" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>

<body class="login-page">

    <main class="auth-full-wrapper">
        <div class="auth-container register-mode">

            <div class="auth-form-side">
                <a href="login.php" class="back-home">
                    <i class="fa-solid fa-arrow-left" aria-hidden="true"></i> Voltar ao Login
                </a>

                <div class="auth-form-box">

                    <header class="auth-header">
                        <img src="../assets/img/global/logo.png" class="auth-logo-central" alt="Float Logo">
                        <h1>Crie sua conta</h1>
                        <p>Junte-se à nossa comunidade indie.</p>
                    </header>

                    <form action="../../api/auth/docadastro.php" method="POST" class="auth-form" novalidate>
                        <div class="input-group">
                            <label for="nome">Nome de Usuário</label>
                            <div class="input-field">
                                <i class="fa-solid fa-user" aria-hidden="true"></i>
                                <input type="text" id="nome" name="nome" placeholder="Como quer ser chamado?"
                                    minlength="3" maxlength="50" required autocomplete="username">
                            </div>
                        </div>

                        <div class="input-group">
                            <label for="email">E-mail</label>
                            <div class="input-field">
                                <i class="fa-regular fa-envelope" aria-hidden="true"></i>
                                <input type="email" id="email" name="email" placeholder="seu@email.com" required
                                    autocomplete="email">
                            </div>
                        </div>

                        <div class="input-group">
                            <label for="password">Senha</label>
                            <div class="input-field input-password-wrapper">
                                <i class="fa-solid fa-lock" aria-hidden="true"></i>
                                <input type="password" id="password" name="password" placeholder="Mínimo 8 caracteres"
                                    minlength="8" required autocomplete="new-password">
                                <button type="button" class="btn-toggle-password" aria-label="Mostrar/ocultar senha"
                                    data-target="password">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <button type="submit" class="btn-auth-primary">Criar Conta no Float</button>

                        <div class="auth-divider"><span>ou registre-se com</span></div>

                        <div class="social-auth">
                            <a href="#" aria-label="Registrar com Google"><i class="fa-brands fa-google"
                                    aria-hidden="true"></i></a>
                            <a href="#" aria-label="Registrar com Apple"><i class="fa-brands fa-apple"
                                    aria-hidden="true"></i></a>
                            <a href="#" aria-label="Registrar com Discord"><i class="fa-brands fa-discord"
                                    aria-hidden="true"></i></a>
                        </div>

                        <p class="auth-switch">
                            Já tem uma conta? <a href="login.php">Fazer Login</a>
                        </p>
                    </form>
                </div>
            </div>

            <div class="auth-visual-side">
                <img src="../assets/img/pages/cadastro/cadastro.png" alt="Float Visuals">
                <div class="visual-overlay">
                    <div class="visual-content">
                        <i class="fas fa-rocket auth-logo-icon" aria-hidden="true"></i>
                        <h2>Comece a sua <br><span>Jornada Indie</span></h2>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="../assets/js/pages/cadastro.js"></script>

</body>

</html>
```

## FILE: public\pages\comunidade.php

```php

```

## FILE: public\pages\login.php

```php
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Float - Acesse sua conta e explore jogos indies.">
    <title>Float | Login</title>

    <link rel="stylesheet" href="../assets/css/global/global.css">

    <link rel="stylesheet" href="../assets/css/pages/login.css">

    <link rel="icon" href="/public/assets/img/favicon/icone.ico" type="image/x-icon" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>

<body class="login-page">

    <main class="auth-full-wrapper">
        <div class="auth-container">

            <div class="auth-visual-side">
                <img src="../assets/img/pages/login/login.png" alt="Float Visuals">
                <div class="visual-overlay">
                    <div class="visual-content">
                        <i class="fas fa-gamepad auth-logo-icon" aria-hidden="true"></i>
                        <h2>Conecte-se ao <br><span>Universo Indie</span></h2>
                    </div>
                </div>
            </div>

            <div class="auth-form-side">
                <a href="../index.php" class="back-home">
                    <i class="fa-solid fa-arrow-left" aria-hidden="true"></i> Voltar à Página Inicial
                </a>

                <div class="auth-form-box">
                    <header class="auth-header">
                        <img src="../assets/img/global/logo.png" alt="Float Logo" class="auth-logo-central">
                        <h1>Bem-vindo de volta</h1>
                        <p>Entre com suas credenciais para acessar sua biblioteca.</p>
                    </header>

                    <form action="../../api/auth/dologin.php" method="POST" class="auth-form" novalidate>
                        <div class="input-group">
                            <label for="email">E-mail</label>
                            <div class="input-field">
                                <i class="fa-regular fa-envelope" aria-hidden="true"></i>
                                <input type="email" id="email" name="email" placeholder="nome@email.com" required
                                    autocomplete="email">
                            </div>
                        </div>

                        <div class="input-group">
                            <label for="password">Senha</label>
                            <div class="input-field input-password-wrapper">
                                <i class="fa-solid fa-lock" aria-hidden="true"></i>
                                <input type="password" id="password" name="password" placeholder="Sua senha" required
                                    autocomplete="current-password">
                                <button type="button" class="btn-toggle-password" aria-label="Mostrar/ocultar senha"
                                    data-target="password">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                            </div>
                            <a href="#" class="forgot-link">Esqueceu a senha?</a>
                        </div>

                        <button type="submit" class="btn-auth-primary">Entrar no Float</button>

                        <div class="auth-divider"><span>ou</span></div>

                        <p class="auth-switch">
                            Não tem uma conta? <a href="cadastro.php">Crie uma agora</a>
                        </p>
                    </form>

                    <footer class="auth-footer">
                        <div class="social-auth">
                            <a href="#" aria-label="Entrar com Google"><i class="fa-brands fa-google"
                                    aria-hidden="true"></i></a>
                            <a href="#" aria-label="Entrar com Apple"><i class="fa-brands fa-apple"
                                    aria-hidden="true"></i></a>
                            <a href="#" aria-label="Entrar com Discord"><i class="fa-brands fa-discord"
                                    aria-hidden="true"></i></a>
                        </div>
                    </footer>
                </div>
            </div>

        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="../assets/js/pages/login.js"></script>

</body>

</html>
```

## FILE: public\pages\noticias.php

```php
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

```

## FILE: public\pages\perfil.php

```php

```

## FILE: public\pages\projetos.php

```php

```

## FILE: api\auth\docadastro.php

```php
<?php

require_once __DIR__ . '/../config/conexao.php';

session_start();

// Só aceita POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit;
}

$nome  = trim($_POST['nome']  ?? '');
$email = trim($_POST['email'] ?? '');
$senha = $_POST['password']   ?? '';

// Validações básicas
$erros = [];

if (mb_strlen($nome) < 3 || mb_strlen($nome) > 50) {
    $erros[] = 'O nome de usuário deve ter entre 3 e 50 caracteres.';
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $erros[] = 'E-mail inválido.';
}

if (mb_strlen($senha) < 8) {
    $erros[] = 'A senha deve ter no mínimo 8 caracteres.';
}

if (!empty($erros)) {
    $query = http_build_query(['erro' => implode(' | ', $erros)]);
    header('Location: ../../public/pages/cadastro.php?' . $query);
    exit;
}

// Verifica se o e-mail já existe
$stmt = $pdo->prepare('SELECT id FROM usuario WHERE email = ? LIMIT 1');
$stmt->execute([$email]);

if ($stmt->fetch()) {
    $query = http_build_query(['erro' => 'Este e-mail já está cadastrado.']);
    header('Location: ../../public/pages/cadastro.php?' . $query);
    exit;
}

// Insere o novo usuário com senha hash
$hash = password_hash($senha, PASSWORD_BCRYPT);
$stmt = $pdo->prepare('INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)');
$stmt->execute([$nome, $email, $hash]);

$_SESSION['usuario_id'] = (int) $pdo->lastInsertId();
$_SESSION['usuario_nome'] = $nome;

header('Location: ../../public/pages/login.php?cadastro=sucesso');
exit;

```

## FILE: api\auth\dologin.php

```php
<?php

require_once __DIR__ . '/../config/conexao.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit;
}

$email = trim($_POST['email']  ?? '');
$senha = $_POST['password']    ?? '';

$erros = [];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $erros[] = 'E-mail inválido.';
}

if (empty($senha)) {
    $erros[] = 'Informe a senha.';
}

if (!empty($erros)) {
    $query = http_build_query(['erro' => implode(' | ', $erros)]);
    header('Location: ../../public/pages/login.php?' . $query);
    exit;
}


$stmt = $pdo->prepare('SELECT id, nome, senha FROM usuario WHERE email = ? LIMIT 1');
$stmt->execute([$email]);
$usuario = $stmt->fetch();

if (!$usuario || !password_verify($senha, $usuario['senha'])) {
    $query = http_build_query(['erro' => 'E-mail ou senha incorretos.']);
    header('Location: ../../public/pages/login.php?' . $query);
    exit;
}


session_regenerate_id(true);

$_SESSION['id']   = (int) $usuario['id'];
$_SESSION['nome'] = $usuario['nome'];

header('Location: ../../public/index.php?login=sucesso');
exit;

```

## FILE: api\auth\protect.php

```php
<?php

/**
 * Inclua este arquivo no topo de qualquer página que exija login.
 * Exemplo: require_once __DIR__ . '/../../api/auth/protect.php';
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION['usuario_id'])) {
    header('Location: ../../public/pages/login.php');
    exit;
}

```

## FILE: api\config\conexao.php

```php
<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'float');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
} catch (PDOException $e) {
    http_response_code(500);
    die(json_encode(['erro' => 'Falha na conexão com o banco de dados.']));
}

```

## FILE: api\user\atualizacao.php

```php

```
