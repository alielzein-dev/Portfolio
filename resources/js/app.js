const calm = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
const root = document.documentElement;

// Cursor light, ring parallax, and the light inside project pictures
const portrait = document.getElementById('portrait');
window.addEventListener('pointermove', (e) => {
    root.style.setProperty('--cx', `${e.clientX}px`);
    root.style.setProperty('--cy', `${e.clientY}px`);

    if (portrait && !calm) {
        portrait.style.setProperty('--px', (e.clientX / window.innerWidth - 0.5) * 2);
        portrait.style.setProperty('--py', (e.clientY / window.innerHeight - 0.5) * 2);
    }

    const shot = e.target.closest?.('.shot');
    if (shot) {
        const r = shot.getBoundingClientRect();
        shot.style.setProperty('--mx', `${e.clientX - r.left}px`);
        shot.style.setProperty('--my', `${e.clientY - r.top}px`);
    }
}, { passive: true });

// Scroll progress line, and a solid nav once you leave the top
const bar = document.getElementById('progress');
const nav = document.getElementById('nav');
function onScroll() {
    const max = root.scrollHeight - window.innerHeight;
    bar.style.transform = `scaleX(${max > 0 ? window.scrollY / max : 0})`;
    nav.classList.toggle('solid', window.scrollY > 40);
}
window.addEventListener('scroll', onScroll, { passive: true });
onScroll();

// Stats count up from zero
function countUp(el) {
    if (calm) return;
    const target = Number(el.dataset.count);
    let start = null;
    function step(t) {
        start ??= t;
        const p = Math.min((t - start) / 1200, 1);
        el.textContent = `${Math.round(target * (1 - Math.pow(1 - p, 3)))}+`;
        if (p < 1) requestAnimationFrame(step);
    }
    requestAnimationFrame(step);
}

// Sections fade in as they scroll into view
const seen = new IntersectionObserver((entries) => {
    for (const en of entries) {
        if (!en.isIntersecting) continue;
        en.target.classList.add('in');
        en.target.querySelectorAll('[data-count]').forEach(countUp);
        seen.unobserve(en.target);
    }
}, { threshold: 0.1 });
document.querySelectorAll('[data-reveal]').forEach((el) => seen.observe(el));

// Project galleries: clicking a thumbnail swaps the big screenshot
document.querySelectorAll('[data-gallery]').forEach((gallery) => {
    const main = gallery.querySelector('[data-main]');
    const thumbs = gallery.querySelectorAll('.thumb');
    thumbs.forEach((thumb) => thumb.addEventListener('click', () => {
        if (thumb.getAttribute('aria-pressed') === 'true') return;
        thumbs.forEach((t) => t.setAttribute('aria-pressed', String(t === thumb)));
        const next = new Image();
        next.src = thumb.dataset.src;
        main.classList.add('swap');
        Promise.all([next.decode().catch(() => {}), new Promise((r) => setTimeout(r, calm ? 0 : 180))]).then(() => {
            main.src = thumb.dataset.src;
            main.alt = thumb.dataset.alt;
            main.classList.remove('swap');
        });
    }));
});

// Underline the current section in the nav
const links = document.querySelectorAll('.nav-links a');
const spy = new IntersectionObserver((entries) => {
    for (const en of entries) {
        if (!en.isIntersecting) continue;
        links.forEach((a) => a.classList.toggle('active', a.getAttribute('href') === `#${en.target.id}`));
    }
}, { rootMargin: '-45% 0px -50% 0px' });
document.querySelectorAll('#hero, #services, #about, #work, #contact').forEach((s) => spy.observe(s));
