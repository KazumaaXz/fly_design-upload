<style>
    body {
        font-family: 'Inter', sans-serif;
        background-color: #f8f9fa;
        /* Light gray background */
        color: #343a40;
        /* Dark gray text */
    }

    /* Custom styles for rounded corners and shadows, adapted for Bootstrap */
    .card-custom {
        border-radius: 1rem;
        /* More rounded corners */
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1),
                    0 4px 6px -2px rgba(0, 0, 0, 0.05);
        /* Softer shadow */
    }

    /* Custom button for CTA to retain unique hover effect */
    .btn-cta-custom {
        padding: 0.75rem 2rem;
        border-radius: 0.75rem;
        /* Rounded button */
        transition: transform 0.3s ease;
        /* Only for transform effect */
    }

    .btn-cta-custom:hover {
        transform: scale(1.05);
    }

    .hero-image {
        border-radius: 1rem;
        object-fit: cover;
        /* Ensure image covers the area */
    }

    #heroCarousel img {
        max-height: 400px;
        object-fit: cover;
    }

    @media (max-width: 768px) {
        #heroCarousel img {
            max-height: 250px; /* lebih pendek di layar kecil */
        }
    }

    /* Styling for Font Awesome icons */
    .icon-feature {
        font-size: 3.5rem;
        /* Larger icon size */
        margin-bottom: 1rem;
    }

    /* Custom gradient backgrounds for sections */
    .bg-hero-gradient {
        background: linear-gradient(to right, #0d6efd, #6610f2);
        /* Bootstrap primary and indigo-like */
        padding: 60px 0; /* kasih padding biar nggak terlalu tinggi */
    }

    .bg-cta-gradient {
        background: linear-gradient(to right, #0a58ca, #560dc9);
        /* Slightly darker primary and indigo-like */
    }
</style>
