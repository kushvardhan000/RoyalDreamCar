(function () {
    'use strict';

    const FILTER_URL = document.getElementById('filter-form')?.action || window.location.pathname;
    const GRID_ANCHOR = document.getElementById('car-grid-wrapper');
    const FILTER_CONTAINER = document.getElementById('filter-container');
    const GRID_CONTAINER = document.getElementById('car-grid-anchor');
    let pendingRequestId = 0;
    let currentQuery = new URLSearchParams(window.location.search);

    const SKELETON_HTML = `
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4" id="car-grid">
            ${Array(6).fill(0).map(() => `
                <div class="skeleton-card">
                    <div class="skeleton-img"></div>
                    <div class="p-4 space-y-3">
                        <div class="skeleton-line h-5 w-3/4"></div>
                        <div class="skeleton-line h-4 w-1/2"></div>
                        <div class="skeleton-line h-6 w-1/3"></div>
                        <div class="flex justify-between">
                            <div class="skeleton-line h-3 w-10"></div>
                            <div class="skeleton-line h-3 w-16"></div>
                            <div class="skeleton-line h-3 w-12"></div>
                        </div>
                    </div>
                </div>
            `).join('')}
        </div>`;

    function showSkeleton() {
        if (GRID_ANCHOR) {
            GRID_ANCHOR.innerHTML = SKELETON_HTML;
        }
    }

    function syncQueryParams(query) {
        const url = new URL(FILTER_URL, window.location.origin);
        url.search = query.toString();

        if (window.location.search !== url.search) {
            window.history.pushState({ query: query.toString() }, '', url);
        }
        currentQuery = query;
    }

    function buildFormData() {
        const form = document.getElementById('filter-form');
        if (!form) return null;

        const formData = new FormData(form);
        const query = new URLSearchParams();

        formData.forEach((value, key) => {
            if (value !== '' && value !== null && value !== undefined) {
                query.set(key, value);
            }
        });

        return query;
    }

    async function fetchCars(query) {
        const requestId = ++pendingRequestId;

        if (GRID_CONTAINER) {
            GRID_CONTAINER.style.opacity = '0.4';
        }

        showSkeleton();

        try {
            const response = await fetch(`${FILTER_URL}?${query.toString()}`, {
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                },
            });

            if (!response.ok) {
                throw new Error('Network response was not ok');
            }

            const contentType = response.headers.get('content-type');
            if (!contentType || !contentType.includes('application/json')) {
                throw new Error('Invalid content type: expected JSON');
            }

            const data = await response.json();

            if (requestId < pendingRequestId) return;

            if (GRID_ANCHOR && data.html && typeof data.html === 'string') {
                GRID_ANCHOR.innerHTML = data.html;
            } else if (GRID_ANCHOR) {
                GRID_ANCHOR.innerHTML = '<div class="col-span-full text-center py-20 text-red-400">Invalid response from server. Please refresh.</div>';
            }

            if (GRID_CONTAINER) {
                GRID_CONTAINER.style.opacity = '1';
            }

            if (FILTER_CONTAINER && data.filter_html) {
                FILTER_CONTAINER.innerHTML = data.filter_html;
                bindFilterEvents();
            }

            syncQueryParams(query);

            bindGridEvents();

            const filterAnchor = document.getElementById('filter-anchor');
            if (filterAnchor && data.changed) {
                filterAnchor.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        } catch (error) {
            if (requestId >= pendingRequestId && GRID_ANCHOR) {
                GRID_ANCHOR.innerHTML = '<div class="col-span-full text-center py-20 text-red-400">Failed to load inventory. Please try again.</div>';
            }
            if (GRID_CONTAINER) {
                GRID_CONTAINER.style.opacity = '1';
            }
            console.error('Filter error:', error);
        }
    }

    function resetFilters() {
        const query = new URLSearchParams();
        const url = new URL(FILTER_URL, window.location.origin);
        url.search = '';

        window.history.pushState({ query: '' }, '', url);
        currentQuery = query;

        const form = document.getElementById('filter-form');
        if (form) {
            const inputs = form.querySelectorAll('input[name="search"], select');
            inputs.forEach(input => {
                if (input.type === 'text') {
                    input.value = '';
                } else if (input.tagName === 'SELECT') {
                    input.selectedIndex = 0;
                }
            });
        }

        fetchCars(query);
    }

    function bindFilterEvents() {
        const form = document.getElementById('filter-form');
        if (!form) return;

        if (form._boundSubmitHandler) {
            form.removeEventListener('submit', form._boundSubmitHandler);
        }
        form._boundSubmitHandler = handleFilterSubmit;
        form.addEventListener('submit', handleFilterSubmit);

        const searchInput = form.querySelector('input[name="search"]');
        if (searchInput && !searchInput.dataset.debounceAttached) {
            searchInput.dataset.debounceAttached = 'true';
            let debounceTimer;

            const debouncedSearch = () => {
                clearTimeout(debounceTimer);
                debounceTimer = setTimeout(() => {
                    const query = buildFormData();
                    if (query) fetchCars(query);
                }, 300);
            };

            searchInput.addEventListener('input', debouncedSearch);
        }

        const selects = form.querySelectorAll('select');
        selects.forEach((select) => {
            if (!select.dataset.changeAttached) {
                select.dataset.changeAttached = 'true';
                const handleChange = () => {
                    const query = buildFormData();
                    if (query) fetchCars(query);
                };
                select.addEventListener('change', handleChange);
            }
        });

        const resetBtn = form.querySelector('button[type="button"]');
        if (resetBtn) {
            const newResetBtn = resetBtn.cloneNode(true);
            resetBtn.parentNode.replaceChild(newResetBtn, resetBtn);
            newResetBtn.addEventListener('click', (e) => {
                e.preventDefault();
                resetFilters();
            });
        }
    }

    function bindGridEvents() {
        const pagination = document.getElementById('pagination-links');
        if (!pagination) return;

        const links = pagination.querySelectorAll('a');
        links.forEach((link) => {
            const newLink = link.cloneNode(true);
            link.parentNode.replaceChild(newLink, link);

            newLink.addEventListener('click', (e) => {
                e.preventDefault();
                const url = new URL(newLink.href);
                const query = new URLSearchParams(url.search);
                fetchCars(query);
            });
        });
    }

    function handleFilterSubmit(e) {
        e.preventDefault();
        const query = buildFormData();
        if (query) fetchCars(query);
    }

    function init() {
        const query = buildFormData();
        if (query) currentQuery = query;

        bindFilterEvents();
        bindGridEvents();

        window.addEventListener('popstate', (event) => {
            const query = event.state?.query
                ? new URLSearchParams(event.state.query)
                : new URLSearchParams(window.location.search);

            fetchCars(query);
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

    window.resetFilters = resetFilters;
})();