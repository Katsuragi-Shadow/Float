/* =====================================================
   noticias.js — Float
   Filtro por categoria na página de notícias.
   ===================================================== */

document.addEventListener('DOMContentLoaded', () => {
    initNoticiaFilters();
});

function initNoticiaFilters() {
    const filterBtns = document.querySelectorAll('.noticias-filter-btn');
    const cards      = document.querySelectorAll('#noticiasGrid .noticias-card');
    const emptyState = document.getElementById('noticiasEmpty');

    if (!filterBtns.length || !cards.length) return;

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            // Atualiza botão ativo
            filterBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const filter = btn.dataset.filter;
            let visibleCount = 0;

            cards.forEach(card => {
                const category = card.dataset.category?.toLowerCase() ?? '';
                const isVisible = filter === 'all' || category === filter;

                card.classList.toggle('noticias-hidden', !isVisible);
                if (isVisible) visibleCount++;
            });

            // Mostra estado vazio quando nenhuma notícia bater com o filtro
            if (emptyState) {
                emptyState.style.display = visibleCount === 0 ? 'block' : 'none';
            }
        });
    });
}
