/**
 * Float — perfil.js
 * Responsabilidades:
 *   - Troca de abas (tabs)
 *   - Abertura/fechamento de modais (acessível)
 *   - Edição de nome e bio via fetch → api/user/atualizacao.php
 *   - Upload e crop de avatar/banner via Cropper.js → api/user/upload_imagem.php
 *   - Seguir / Deixar de seguir → api/user/seguir.php
 *   - Reportar conta ou jogo → api/user/reportar.php
 *   - Sistema de toast não-intrusivo
 */

'use strict';

const { ehDono, alvoId, sessaoId } = window.PERFIL ?? {};


/**
 * Exibe um toast na tela.
 * @param {string} msg
 * @param {'success'|'error'|'info'} tipo
 */
function showToast(msg, tipo = 'info') {
    const container = document.getElementById('toastContainer');
    if (!container) return;

    const iconMap = {
        success: 'fa-circle-check',
        error: 'fa-circle-xmark',
        info: 'fa-circle-info',
    };

    const toast = document.createElement('div');
    toast.className = `toast toast-${tipo}`;
    toast.setAttribute('role', 'status');
    toast.innerHTML = `
        <i class="fa-solid ${iconMap[tipo] ?? iconMap.info}" aria-hidden="true"></i>
        <span>${msg}</span>
    `;

    container.appendChild(toast);

    setTimeout(() => {
        toast.classList.add('toast-hide');
        toast.addEventListener('transitionend', () => toast.remove(), { once: true });
    }, 3500);
}

/**
 * Envia uma requisição POST com FormData.
 * @param {string} url
 * @param {FormData} formData
 * @returns {Promise<{ok:boolean, mensagem:string}>}
 */
async function postForm(url, formData) {
    try {
        const res = await fetch(url, { method: 'POST', body: formData });
        const data = await res.json();
        return data;
    } catch {
        return { ok: false, mensagem: 'Erro de conexão.' };
    }
}


/**
 * Abre um modal pelo ID, configurando foco e aria.
 * @param {string} id — ID do elemento .modal-overlay
 */
function openModal(id) {
    const modal = document.getElementById(id);
    if (!modal) return;

    modal.removeAttribute('hidden');
    const focusable = modal.querySelector('input, textarea, select, button:not(.modal-close)');
    if (focusable) focusable.focus();
    document.body.style.overflow = 'hidden';

    modal.addEventListener('click', (e) => {
        if (e.target === modal) closeModal(id);
    }, { once: true });
}

/**
 * Fecha um modal pelo ID.
 * @param {string} id
 */
function closeModal(id) {
    const modal = document.getElementById(id);
    if (!modal) return;
    modal.setAttribute('hidden', '');
    document.body.style.overflow = '';
}

/** Inicializa todos os botões de fechar modais. */
function initModalCloseButtons() {
    document.querySelectorAll('.modal-close').forEach((btn) => {
        btn.addEventListener('click', () => {
            const modal = btn.closest('.modal-overlay');
            if (modal) closeModal(modal.id);
        });
    });

    document.addEventListener('keydown', (e) => {
        if (e.key !== 'Escape') return;
        const aberto = document.querySelector('.modal-overlay:not([hidden])');
        if (aberto) closeModal(aberto.id);
    });
}


function initTabs() {
    const btns = document.querySelectorAll('.tab-btn');
    const panels = document.querySelectorAll('.perfil-panel');

    btns.forEach((btn) => {
        btn.addEventListener('click', () => {
            const alvo = btn.dataset.tab;

            btns.forEach((b) => {
                b.classList.remove('active');
                b.setAttribute('aria-selected', 'false');
            });
            btn.classList.add('active');
            btn.setAttribute('aria-selected', 'true');

            panels.forEach((p) => {
                const show = p.id === `panel-${alvo}`;
                p.toggleAttribute('hidden', !show);
                if (show) p.classList.add('active');
                else p.classList.remove('active');
            });
        });
    });
}


function initSeguir() {
    const btn = document.getElementById('btnSeguir');
    if (!btn) return;

    btn.addEventListener('click', async () => {
        btn.disabled = true;

        const fd = new FormData();
        fd.append('alvo_id', alvoId);

        const data = await postForm('../../api/user/seguir.php', fd);

        if (data.ok) {
            const seguindo = data.acao === 'seguindo';
            btn.classList.toggle('seguindo', seguindo);
            btn.setAttribute('aria-pressed', seguindo ? 'true' : 'false');

            const icon = btn.querySelector('i');
            const span = btn.querySelector('span');

            if (icon) icon.className = `fa-solid ${seguindo ? 'fa-user-check' : 'fa-user-plus'}`;
            if (span) span.textContent = seguindo ? 'Seguindo' : 'Seguir';

            const contadores = document.querySelectorAll('.perfil-counters strong');
            if (contadores[0] && data.total_seguidores !== undefined) {
                contadores[0].textContent = Number(data.total_seguidores).toLocaleString('pt-BR');
            }

            showToast(data.mensagem, 'success');
        } else {
            showToast(data.mensagem ?? 'Erro ao processar.', 'error');
        }

        btn.disabled = false;
    });
}


function initReportar() {
    const btnReport = document.getElementById('btnReport');
    if (btnReport) {
        btnReport.addEventListener('click', () => {
            document.getElementById('reportTipo').value = btnReport.dataset.tipo;
            document.getElementById('reportAlvoId').value = btnReport.dataset.alvo;
            openModal('modalReport');
        });
    }

    document.addEventListener('click', (e) => {
        const btn = e.target.closest('.jogo-report-btn');
        if (!btn) return;
        document.getElementById('reportTipo').value = btn.dataset.tipo;
        document.getElementById('reportAlvoId').value = btn.dataset.alvo;
        openModal('modalReport');
    });

    const btnEnviar = document.getElementById('btnEnviarReport');
    if (!btnEnviar) return;

    btnEnviar.addEventListener('click', async () => {
        const motivo = document.getElementById('selectMotivo').value.trim();
        const detalhe = document.getElementById('detalheReport').value.trim();
        const tipo = document.getElementById('reportTipo').value;
        const alvoRep = document.getElementById('reportAlvoId').value;

        if (!motivo) {
            showToast('Selecione um motivo antes de enviar.', 'error');
            return;
        }

        btnEnviar.disabled = true;

        const fd = new FormData();
        fd.append('tipo', tipo);
        fd.append('alvo_id', alvoRep);
        fd.append('motivo', detalhe ? `${motivo} — ${detalhe}` : motivo);

        const data = await postForm('../../api/user/reportar.php', fd);

        showToast(data.mensagem ?? (data.ok ? 'Denúncia enviada.' : 'Erro.'), data.ok ? 'success' : 'error');
        closeModal('modalReport');

        document.getElementById('selectMotivo').value = '';
        document.getElementById('detalheReport').value = '';
        btnEnviar.disabled = false;
    });
}


function initAjuda() {
    const btn = document.getElementById('btnHelp');
    if (!btn) return;
    btn.addEventListener('click', () => openModal('modalHelp'));
}


function initEdicaoTexto() {
    if (!ehDono) return;

    const btnEditNome = document.getElementById('btnEditNome');
    const btnSalvNome = document.getElementById('btnSalvarNome');
    const inputNome = document.getElementById('inputNome');
    const spanNome = document.getElementById('perfilNome');

    if (btnEditNome) {
        btnEditNome.addEventListener('click', () => {
            inputNome.value = spanNome.textContent.trim();
            openModal('modalNome');
        });
    }

    if (btnSalvNome) {
        btnSalvNome.addEventListener('click', async () => {
            const novoNome = inputNome.value.trim();

            if (novoNome.length < 3 || novoNome.length > 50) {
                showToast('O nome deve ter entre 3 e 50 caracteres.', 'error');
                return;
            }

            btnSalvNome.disabled = true;

            const fd = new FormData();
            fd.append('campo', 'nome');
            fd.append('valor', novoNome);

            const data = await postForm('../../api/user/atualizacao.php', fd);

            if (data.ok) {
                spanNome.textContent = novoNome;
                const navNome = document.querySelector('.user-name');
                if (navNome) navNome.textContent = novoNome;
                closeModal('modalNome');
                showToast('Nome atualizado!', 'success');
            } else {
                showToast(data.mensagem ?? 'Erro ao salvar.', 'error');
            }

            btnSalvNome.disabled = false;
        });
    }

    const btnEditBio = document.getElementById('btnEditBio');
    const btnSalvBio = document.getElementById('btnSalvarBio');
    const inputBio = document.getElementById('inputBio');
    const spanBio = document.getElementById('perfilBio');
    const bioCount = document.getElementById('bioCharCount');

    if (btnEditBio) {
        btnEditBio.addEventListener('click', () => {
            const texto = spanBio.querySelector('em') ? '' : spanBio.textContent.trim();
            inputBio.value = texto;
            if (bioCount) bioCount.textContent = texto.length;
            openModal('modalBio');
        });
    }

    if (inputBio && bioCount) {
        inputBio.addEventListener('input', () => {
            bioCount.textContent = inputBio.value.length;
        });
    }

    if (btnSalvBio) {
        btnSalvBio.addEventListener('click', async () => {
            const novaBio = inputBio.value.trim();

            if (novaBio.length > 300) {
                showToast('Máximo de 300 caracteres.', 'error');
                return;
            }

            btnSalvBio.disabled = true;

            const fd = new FormData();
            fd.append('campo', 'bio');
            fd.append('valor', novaBio);

            const data = await postForm('../../api/user/atualizacao.php', fd);

            if (data.ok) {
                spanBio.innerHTML = novaBio
                    ? escapeHtml(novaBio)
                    : '<em class="bio-placeholder">Adicione uma bio...</em>';
                closeModal('modalBio');
                showToast('Bio atualizada!', 'success');
            } else {
                showToast(data.mensagem ?? 'Erro ao salvar.', 'error');
            }

            btnSalvBio.disabled = false;
        });
    }
}

/** Escapa HTML para evitar XSS ao inserir texto do usuário no DOM. */
function escapeHtml(str) {
    const div = document.createElement('div');
    div.textContent = str;
    return div.innerHTML;
}


let cropperInstance = null;
let cropTipo = null;

function initUploads() {
    if (!ehDono) return;

    const btnAvatar = document.getElementById('btnEditAvatar');
    const inputAvatar = document.getElementById('inputAvatar');
    if (btnAvatar && inputAvatar) {
        btnAvatar.addEventListener('click', () => {
            cropTipo = 'avatar';
            inputAvatar.click();
        });
        inputAvatar.addEventListener('change', (e) => handleImageSelect(e.target.files[0]));
    }

    const btnBanner = document.getElementById('btnEditBanner');
    const inputBanner = document.getElementById('inputBanner');
    if (btnBanner && inputBanner) {
        btnBanner.addEventListener('click', () => {
            cropTipo = 'banner';
            inputBanner.click();
        });
        inputBanner.addEventListener('change', (e) => handleImageSelect(e.target.files[0]));
    }

    const btnConfirmar = document.getElementById('btnConfirmarCrop');
    if (btnConfirmar) {
        btnConfirmar.addEventListener('click', confirmarCrop);
    }
}

/**
 * Lê o arquivo e abre o modal de crop.
 * @param {File|undefined} file
 */
function handleImageSelect(file) {
    if (!file) return;

    if (!file.type.startsWith('image/')) {
        showToast('Selecione uma imagem válida (PNG, JPG ou GIF).', 'error');
        return;
    }

    if (file.type === 'image/gif') {
        enviarImagem(file);
        return;
    }

    const reader = new FileReader();
    reader.onload = (e) => {
        const img = document.getElementById('cropperImg');
        if (!img) return;

        img.src = e.target.result;

        if (cropperInstance) {
            cropperInstance.destroy();
            cropperInstance = null;
        }

        openModal('modalCropper');

        requestAnimationFrame(() => {
            cropperInstance = new Cropper(img, {
                aspectRatio: cropTipo === 'avatar' ? 1 : 3,
                viewMode: 1,
                dragMode: 'move',
                autoCropArea: 0.8,
                responsive: true,
                restore: false,
                guides: false,
                center: true,
                highlight: false,
                cropBoxMovable: true,
                cropBoxResizable: true,
                toggleDragModeOnDblclick: false,
            });
        });
    };

    reader.readAsDataURL(file);
}

/** Recorta e envia a imagem para o servidor. */
async function confirmarCrop() {
    if (!cropperInstance) return;

    const btn = document.getElementById('btnConfirmarCrop');
    btn.disabled = true;

    const canvas = cropperInstance.getCroppedCanvas({
        width: cropTipo === 'avatar' ? 256 : 1200,
        height: cropTipo === 'avatar' ? 256 : 400,
        imageSmoothingQuality: 'high',
    });

    canvas.toBlob(async (blob) => {
        const file = new File([blob], `${cropTipo}.jpg`, { type: 'image/jpeg' });
        closeModal('modalCropper');
        await enviarImagem(file);
        btn.disabled = false;
    }, 'image/jpeg', 0.88);
}

/**
 * Envia o arquivo para a API e atualiza o DOM.
 * @param {File} file
 */
async function enviarImagem(file) {
    const fd = new FormData();
    fd.append('tipo', cropTipo);
    fd.append('imagem', file);

    const data = await postForm('../../api/user/upload_imagem.php', fd);

    if (data.ok) {
        if (cropTipo === 'avatar') {
            const imgs = document.querySelectorAll('#perfilAvatarImg, .nav-user-img');
            imgs.forEach((img) => { img.src = data.url + '?t=' + Date.now(); });
        } else {
            const banner = document.getElementById('perfilBanner');
            if (banner) banner.style.backgroundImage = `url('${data.url}?t=${Date.now()}')`;
        }
        showToast('Imagem atualizada!', 'success');

        ['inputAvatar', 'inputBanner'].forEach((id) => {
            const el = document.getElementById(id);
            if (el) el.value = '';
        });

        if (cropperInstance) {
            cropperInstance.destroy();
            cropperInstance = null;
        }
    } else {
        showToast(data.mensagem ?? 'Erro ao enviar imagem.', 'error');
    }
}


document.addEventListener('DOMContentLoaded', () => {
    initModalCloseButtons();
    initTabs();
    initSeguir();
    initReportar();
    initAjuda();
    initEdicaoTexto();
    initUploads();
});