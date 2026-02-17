(() => {
  const revealItems = document.querySelectorAll('.reveal');
  if ('IntersectionObserver' in window && revealItems.length) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          const idx = [...revealItems].indexOf(entry.target);
          entry.target.style.transitionDelay = `${Math.min(idx * 60, 320)}ms`;
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.15 });

    revealItems.forEach((item) => observer.observe(item));
  }

  const parallaxTarget = document.querySelector('[data-parallax]');
  let latestY = 0;
  let ticking = false;

  const updateParallax = () => {
    if (parallaxTarget) {
      parallaxTarget.style.transform = `translateY(${latestY * -0.04}px)`;
    }
    ticking = false;
  };

  window.addEventListener('scroll', () => {
    latestY = window.scrollY;
    if (!ticking) {
      window.requestAnimationFrame(updateParallax);
      ticking = true;
    }
  }, { passive: true });

  let hue = 260;
  const animateGradient = () => {
    hue = (hue + 0.25) % 360;
    document.documentElement.style.setProperty('--ln-primary', `hsl(${hue}, 80%, 56%)`);
    window.requestAnimationFrame(animateGradient);
  };

  window.requestAnimationFrame(animateGradient);
})();
