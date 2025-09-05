<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asjurfin Legaltech</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #0A1D37;
            --secondary: #C8A951;
            --light: #f5f5f5;
            --dark: #222;
            --text: #333;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            color: var(--text);
            background: #fff;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        /* NAVBAR */
        .navbar {
            background: var(--primary);
            padding: 1rem 2rem;
            margin: 0 auto;
        }

        .navbar-brand img.logo {
            max-height: 50px;
        }

        .navbar-nav .nav-link {
            color: #fff !important;
            font-weight: 600;
            font-size: 1.1rem;
            margin-left: 1rem;
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: var(--secondary) !important;
        }

        /* BOTÓN LOGIN NAVBAR */
        .btn-login {
            background: var(--secondary);
            color: #fff !important;
            padding: 0.35rem 0.9rem;
            border-radius: 4px;
            font-weight: 600;
            font-size: 0.9rem;
            margin-left: 0.75rem;
            line-height: 1.2;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: background 0.3s ease;
        }

        .btn-login:hover {
            background: #b28d43;
            color: #fff !important;
        }

        /* Ajustes en escritorio */
        @media (min-width: 992px) {
            .btn-login {
                font-size: 1rem;
                padding: 0.4rem 1rem;
            }
        }

        /* Ajustes en tablets (768px–991px) */
        @media (min-width: 768px) and (max-width: 991px) {
            .navbar-nav {
                align-items: center;
                /* alinea verticalmente todos los items */
            }

            .btn-login {
                font-size: 0.95rem;
                padding: 0.35rem 0.9rem;
                margin-top: 0;
                margin-bottom: 0;
                display: inline-flex;
                align-items: center;
                height: auto;
                /* igual altura que los links */
            }
        }

        /* HERO */
        .header-logo {
            background: linear-gradient(rgba(10, 29, 55, 0.8), rgba(10, 29, 55, 0.8)), url("https://images.unsplash.com/photo-1521791136064-7986c2920216?ixlib=rb-4.0.3&auto=format&fit=crop&w=1950&q=80") no-repeat center/cover;
            color: #fff;
            text-align: center;
            padding: 6rem 2rem;
            height: 35rem;
            display: grid;
            align-content: center;
            justify-content: center;
            justify-items: center;
        }

        .header-logo h1 {
            font-family: 'Merriweather', serif;
            font-size: 3rem;
            margin-bottom: 1rem;
            animation: fadeInDown 1.2s ease;
        }

        .header-logo p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto;
            animation: fadeInUp 1.5s ease;
        }

        .btn-primary-custom {
            background: var(--secondary);
            border: none;
            padding: 0.8rem 2rem;
            margin-top: 2rem;
            font-weight: 600;
            border-radius: 6px;
            transition: background 0.3s;
        }

        .btn-primary-custom:hover {
            background: #b28d43;
        }

        /* INFO BOX */
        .info-box {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            padding: 4rem 10%;
            background: var(--light);
        }

        .info-box .icon {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .info-title {
            margin-left: 1rem;
            font-size: 2rem;
            color: var(--primary);
            font-family: 'Merriweather', serif;
        }

        .info-text {
            background: #fff;
            padding: 1.5rem;
            font-size: 1.3rem;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        /* SERVICIOS */
        .service-box {
            padding: 4rem 10%;
            background: #fff;
        }

        .service-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .service-detail {
            perspective: 1000px;
            min-height: 280px;
            /* define altura mínima */
        }

        .card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            transform-style: preserve-3d;
            transition: transform 0.8s;
        }

        .service-detail:hover .card-inner {
            transform: rotateY(180deg);
        }

        .card-front,
        .card-back {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* que ambas caras ocupen todo */
            backface-visibility: hidden;
            padding: 2rem;
            border-radius: 12px;
            background: var(--light);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .card-front header h1 {
            font-family: 'Merriweather', serif;
            font-size: 1.5rem;
            color: var(--primary);
        }

        .card-back {
            transform: rotateY(180deg);
        }


        /* CONTACTO */
        .contact-section {
            background: var(--primary);
            color: #fff;
            padding: 4rem 10%;
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 0.8rem;
            margin-bottom: 1rem;
            border-radius: 6px;
            border: none;
        }

        .contact-form button {
            background: var(--secondary);
            color: #fff;
            padding: 0.8rem 2rem;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            transition: background 0.3s;
        }

        .contact-form button:hover {
            background: #b28d43;
        }

        /* FOOTER */
        .footer {
            background: var(--dark);
            color: #ccc;
            text-align: center;
            padding: 2rem;
        }

        .footer a {
            color: var(--secondary);
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        /* ANIMACIONES */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>

</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-md navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="https://dummyimage.com/150x50/0A1D37/fff.png&text=Logo" class="logo" alt="Logo Jurídico">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#servicios">Servicios</a></li>
                    <li class="nav-item"><a class="nav-link" href="#beneficios">Beneficios</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contacto">Contacto</a></li>
                    <li class="nav-item">
                        <a class="btn btn-login" href="login">Ingresar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- HERO -->
    <header class="header-logo">
        <h1>Confianza y Experiencia Jurídica</h1>
        <p>Brindamos asesoría legal de excelencia para empresas y particulares, con un enfoque innovador y humano.</p>
        <a href="#contacto" class="btn btn-primary-custom">Contáctanos</a>
    </header>

    <!-- INFO -->
    <section class="info-box fade-in" id="beneficios">
        <div>
            <div class="icon"><i class="fas fa-balance-scale fa-2x" style="color: var(--secondary);"></i>
                <h3 class="info-title">Autoridad Legal</h3>
            </div>
            <p class="info-text">En Legaltech, nos comprometemos a ofrecer asesoría y apoyo en procesos jurídicos y financieros
                tanto en Colombia como en el exterior. Nuestra misión es proporcionar soluciones efectivas a problemas no resueltos
                mediante una combinación de derecho y tecnología avanzada. Buscamos revolucionar el ambito legal
                con herramientas innovadoras, haciéndolo más accesible y eficiente.</p>
        </div>
        <div>
            <div class="icon"><i class="fas fa-handshake fa-2x" style="color: var(--secondary);"></i>
                <h3 class="info-title">Confianza</h3>
            </div>
            <p class="info-text">En legaltech, apuntamos a ser líderes en la integración de derecho y tecnología, redefiniendo la práctica y gestión de los servicios legales
                en el mundo digital. En <strong><i>ASJURFIN</i></strong>, creemos que nuestro sistema legaltech es la clave para un futuro legal más accesible,
                eficiente y conectado, facilitando el acceso a la justicia para personas y empresas. <br></p>
        </div>
    </section>

    <!-- SERVICIOS -->
    <section class="service-box" id="servicios">
        <h2 class="text-center mb-5" style="font-family:'Merriweather', serif; color:var(--primary);">Nuestros Servicios</h2>
        <div class="service-grid">
            <div class="service-detail">
                <div class="card-inner">
                    <div class="card-front">
                        <header>
                            <h1>Derecho Corporativo</h1>
                        </header>
                        <p>Asesoría integral a empresas en contratos, sociedades y cumplimiento legal.</p>
                    </div>
                    <div class="card-back">
                        <p>Ofrecemos soluciones personalizadas para startups y grandes corporaciones.</p>
                    </div>
                </div>
            </div>
            <div class="service-detail">
                <div class="card-inner">
                    <div class="card-front">
                        <header>
                            <h1>Litigios</h1>
                        </header>
                        <p>Defensa legal sólida en procesos civiles, mercantiles y laborales.</p>
                    </div>
                    <div class="card-back">
                        <p>Nuestro equipo cuenta con experiencia probada en tribunales de todo el país.</p>
                    </div>
                </div>
            </div>
            <div class="service-detail">
                <div class="card-inner">
                    <div class="card-front">
                        <header>
                            <h1>Propiedad Intelectual</h1>
                        </header>
                        <p>Protección de marcas, patentes y derechos de autor.</p>
                    </div>
                    <div class="card-back">
                        <p>Te ayudamos a resguardar la innovación que impulsa tu negocio.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTACTO -->
    <section class="contact-section" id="contacto">
        <h2 class="text-center mb-4" style="font-family:'Merriweather', serif;">Contáctanos</h2>
        <form class="contact-form">
            <input type="text" placeholder="Nombre completo" required>
            <input type="email" placeholder="Correo electrónico" required>
            <textarea rows="5" placeholder="Escribe tu mensaje aquí..." required></textarea>
            <button type="submit">Enviar Mensaje</button>
        </form>
    </section>

    <!-- FOOTER -->
    <footer class="footer">
        <p>&copy; 2025 AsjurfinLegaltech. Todos los derechos reservados. | <a href="#">Aviso Legal</a></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Animación Fade-in en scroll
        const faders = document.querySelectorAll('.fade-in');
        const appearOptions = {
            threshold: 0.3
        };
        const appearOnScroll = new IntersectionObserver(function(entries, observer) {
            entries.forEach(entry => {
                if (!entry.isIntersecting) {
                    return;
                }
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            });
        }, appearOptions);
        faders.forEach(fader => {
            appearOnScroll.observe(fader);
        });
    </script>
</body>

</html>