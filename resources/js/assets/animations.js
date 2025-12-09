import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

// Register GSAP plugins
gsap.registerPlugin(ScrollTrigger);

// Initialize AOS
import AOS from 'aos';
import 'aos/dist/aos.css';

document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS
    AOS.init({
        duration: 1000,
        once: true
    });

    // Hero timeline
    const heroTimeline = gsap.timeline();
    
    heroTimeline
        .from(".hero-headline span", {
            y: 100,
            opacity: 0,
            stagger: 0.2,
            duration: 1,
            ease: "power3.out"
        })
        .from(".hero-sub", {
            y: 50,
            opacity: 0,
            duration: 1,
            ease: "power3.out"
        }, "-=0.5")
        .from(".hero a", {
            y: 30,
            opacity: 0,
            stagger: 0.1,
            duration: 0.8,
            ease: "power3.out"
        }, "-=0.3");

    // Scroll-triggered animations
    ScrollTrigger.batch(".reveal", {
        onEnter: batch => gsap.to(batch, {
            y: 0,
            opacity: 1,
            stagger: 0.15,
            overwrite: true,
            duration: 0.8,
            ease: "power2.out"
        }),
        start: "top 85%"
    });

    // Parallax effect for hero image
    gsap.to(".hero-image", {
        y: 50,
        scrollTrigger: {
            trigger: ".hero-image",
            scrub: true
        }
    });

    // Product card hover effects
    const productCards = document.querySelectorAll('.product-card');
    productCards.forEach(card => {
        const image = card.querySelector('img');
        const overlay = card.querySelector('.absolute');
        
        card.addEventListener('mouseenter', () => {
            gsap.to(image, {
                scale: 1.1,
                duration: 0.5,
                ease: "power2.out"
            });
            
            gsap.to(overlay, {
                opacity: 1,
                duration: 0.3,
                ease: "power2.out"
            });
        });
        
        card.addEventListener('mouseleave', () => {
            gsap.to(image, {
                scale: 1,
                duration: 0.5,
                ease: "power2.out"
            });
            
            gsap.to(overlay, {
                opacity: 0,
                duration: 0.3,
                ease: "power2.out"
            });
        });
    });
});