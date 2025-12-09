document.addEventListener('DOMContentLoaded', function() {
    // GSAP Animations
    gsap.registerPlugin(ScrollTrigger);

    // Hero headline animation
    gsap.from(".hero-headline span", {
        y: 100,
        opacity: 0,
        stagger: 0.2,
        duration: 1,
        ease: "power3.out"
    });

    // Hero subtitle animation
    gsap.from(".hero-sub", {
        y: 50,
        opacity: 0,
        duration: 1,
        delay: 0.5,
        ease: "power3.out"
    });

    // Hero buttons animation
    gsap.from(".hero a", {
        y: 30,
        opacity: 0,
        stagger: 0.1,
        duration: 0.8,
        delay: 1,
        ease: "power3.out"
    });

    // Parallax effect for hero image
    gsap.to(".hero-image", {
        y: 50,
        scrollTrigger: {
            trigger: ".hero-image",
            scrub: true
        }
    });

    // Reveal animations for sections
    gsap.utils.toArray('.reveal').forEach((elem, i) => {
        gsap.from(elem, {
            opacity: 0,
            y: 50,
            duration: 1,
            scrollTrigger: {
                trigger: elem,
                start: "top 85%"
            }
        });
    });
});