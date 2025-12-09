document.addEventListener('DOMContentLoaded', function() {
    // Initialize GSAP animations for the landing page
    if (typeof gsap !== 'undefined') {
        // Hero headline animation
        gsap.from('.hero-headline', {
            duration: 1.5,
            y: 100,
            opacity: 0,
            ease: 'power4.out'
        });

        // Hero subtitle animation
        gsap.from('.hero-sub', {
            duration: 1.5,
            y: 50,
            opacity: 0,
            ease: 'power4.out',
            delay: 0.3
        });

        // Hero buttons animation
        gsap.from('.hero-buttons', {
            duration: 1.5,
            y: 50,
            opacity: 0,
            ease: 'power4.out',
            delay: 0.6
        });

        // Product card animations
        gsap.utils.toArray('.product-card').forEach((card, i) => {
            gsap.from(card, {
                scrollTrigger: {
                    trigger: card,
                    start: 'top bottom-=100',
                },
                duration: 1,
                y: 100,
                opacity: 0,
                ease: 'power3.out',
                delay: i * 0.1
            });
        });
    }
});