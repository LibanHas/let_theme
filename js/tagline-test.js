const splitTargets = document.querySelectorAll('.tagline-split');

splitTargets.forEach(target => {
    const text = target.textContent.trim();
    target.textContent = '';
    
    [...text].forEach((char, i) => {
        const span = document.createElement('span');
        span.classList.add('split-char');
        
        if (char === ' ') {
            span.classList.add('is-space');
            span.innerHTML = '&nbsp;';
        } else {
            span.textContent = char;
        }
        
        target.appendChild(span);
    });
    
    // PUT THE INTERSECTION OBSERVER HERE (instead of calling missing function):
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                console.log('Tagline entered viewport');
                animateChars(entry.target); // Call your animateChars function
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.2 });
    
    observer.observe(target);
});

function animateChars(target) {
    const chars = target.querySelectorAll('.split-char:not(.is-space)');
    
    chars.forEach((char, i) => {
        setTimeout(() => {
            char.classList.add('animate');
        }, i * 100);
    });
}