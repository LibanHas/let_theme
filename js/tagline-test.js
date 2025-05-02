console.log('✅ Tagline test script running');

document.addEventListener('DOMContentLoaded', () => {
    const splitTargets = document.querySelectorAll('.tagline-split');
  
    splitTargets.forEach(target => {
      const text = target.textContent.trim();
      target.textContent = '';
  
      let offset = 0;
  
      [...text].forEach((char, i) => {
        const span = document.createElement('span');
        span.className = 'split-char';
        span.textContent = char;
        span.style.left = `${offset}px`; // will adjust below
        target.appendChild(span);
  
        // Measure and update offset based on character width
        const tempSpan = document.createElement('span');
        tempSpan.style.visibility = 'hidden';
        tempSpan.style.position = 'absolute';
        tempSpan.textContent = char;
        target.appendChild(tempSpan);
        offset += tempSpan.offsetWidth;
        tempSpan.remove();
      });
    });
  
    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.querySelectorAll('.split-char').forEach((char, i) => {
            char.style.transitionDelay = `${i * 0.05}s`;
            char.style.opacity = 1;
            char.style.transform = 'translateY(0)';
          });
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.3 });
  
    splitTargets.forEach(el => observer.observe(el));
  });
  