<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asjurfin Legaltech</title>
    <link rel="icon" type="image/png" href="vistas/img/plantilla/AsurLogo.png">
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

        * {
            /* border: 1px solid red; */
        }

        /* ================== NAVBAR ================== */
        .navbar {
            background: var(--primary);
            padding: 0;
            /* deja que el logo defina la altura */
            align-items: center;
            min-height: 7rem;
        }

        /* Logo */
        .navbar-brand {
            display: flex;
            align-items: center;
            padding: 0;
            /* elimina padding extra */
            height: auto;
            /* se ajusta al logo */
        }

        .navbar-brand img.logo {
            height: auto;
            max-height: 100px;
            width: auto;
        }

        /* Links */
        .nav-item {
            display: flex;
        }

        .navbar-nav .nav-link {
            color: #fff !important;
            font-weight: 600;
            font-size: 1.1rem;
            padding: 0.5rem 1rem;
            margin-left: 0;
            transition: color 0.3s ease;
            text-transform: uppercase;
        }

        .navbar-nav .nav-link:hover {
            color: var(--secondary) !important;
        }

        /* Botón login */
        .btn-login {
            background: var(--secondary);
            color: #fff !important;
            border-radius: 6px;
            font-weight: 600;
            font-size: 1rem;
            margin: 0 1rem;
            line-height: 1.4;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: background 0.3s ease;
            padding: 10px 30px;
        }

        .btn-login {
            padding: 10px 30px;
        }

        .btn-login:hover {
            background: #b28d43;
            color: #fff !important;
        }

        /* ================== HERO ================== */
        .header-logo {
            background: linear-gradient(rgba(10, 29, 55, 0.8), rgba(10, 29, 55, 0.8)),
                url("https://images.unsplash.com/photo-1521791136064-7986c2920216?ixlib=rb-4.0.3&auto=format&fit=crop&w=1950&q=80") no-repeat center/cover;
            color: #fff;
            text-align: center;
            padding: 6rem 2rem;
            height: 45rem;
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

        /* ================== INFO BOX ================== */
        .info-box {
            margin-top: 4rem;
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

        /* ================== SERVICIOS ================== */
        .service-box {
            padding: 4rem 10%;
            background: #fff;
        }

        .service-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            justify-content: center;
            padding: 2rem;
        }

        .service-detail {
            perspective: 1000px;
            min-height: 280px;
            flex: 1 1 250px;
            max-width: 300px;
        }

        .card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            transform-style: preserve-3d;
            transition: transform 0.8s;
            border: 1px solid #ddd;
            border-radius: 8px;
            background: #fff;
        }

        .service-detail:hover .card-inner {
            transform: rotateY(180deg);
        }

        /* Caras del flip */
        .card-front,
        .card-back {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            padding: 1.5rem;
            border-radius: 8px;
            background: #fff;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .card-front h1 {
            font-family: 'Merriweather', serif;
            font-size: 1.3rem;
            color: var(--primary);
            margin-bottom: 1rem;
        }

        .card-back {
            transform: rotateY(180deg);
        }

        /* ================== CONTACTO ================== */
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

        /* ================== FOOTER ================== */
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

        /* ================== ANIMACIONES ================== */
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

        .section-title {
            font-family: 'Merriweather', serif;
            text-align: center;
            margin-bottom: 2rem;
            color: var(--primary);
        }

        /* ================== PLANES ================== */
        .planes-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            padding: 2rem;
        }

        .plan-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 1.5rem;
            text-align: center;
            background: #fff;
        }

        .plan-card.destacado {
            border: 2px solid var(--secondary);
            background: #faf6ef;
        }

        .plan-card h3 {
            margin-bottom: 0.5rem;
        }

        .plan-card .sub {
            font-size: 0.9rem;
            color: #666;
        }

        .plan-card ul {
            text-align: left;
            padding: 0;
            list-style: none;
            margin: 1rem 0;
        }

        .plan-card ul li {
            margin: 0.3rem 0;
        }

        .plan-card .btn {
            display: inline-block;
            margin-top: 1rem;
            padding: 0.5rem 1rem;
            background: var(--secondary);
            color: #fff;
            border-radius: 4px;
            text-decoration: none;
        }

        /* ================== ESPECIALIDADES ================== */
        .especialidades {
            margin-top: 4rem;
        }

        .especialidades-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            justify-content: center;
            padding: 2rem;
        }

        .especialidad-card {
            flex: 1 1 220px;
            max-width: 280px;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 1.5rem;
            text-align: center;
            background: #fff;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            display: flex;
            flex-direction: column;
        }

        .especialidad-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .especialidad-card .icon {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .especialidad-card .btn-sec {
            margin-top: auto;
            width: 140px;
            height: 40px;
            padding: 0.4rem 0.8rem;
            border: 1px solid var(--secondary);
            background: transparent;
            color: var(--secondary);
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.2s ease;
            align-self: center;
        }

        .especialidad-card .btn-sec:hover {
            background: var(--secondary);
            color: #fff;
        }

        /* ================== MEDIA QUERIES ================== */

        /* móviles */
        @media (min-width: 300px) and (max-width:767px) {

            .info-box {
                display: flex;
                flex-direction: column;
            }

            .navbar-brand img.logo {
                max-height: 40px;
            }

            .navbar-nav {
                display: flex;
                gap: 1.5rem;
                flex-direction: column;
                align-items: center;
                text-align: center;
                width: 100%;
                padding: 0;
                margin: 0;
            }

            .navbar-nav .nav-item {
                width: 100%;
                font-size: 1rem;
            }

            .navbar-nav .nav-item:first-child {
                margin-top: 1rem;
                padding-top: 0.5rem;
            }

            .navbar-nav .nav-item:last-child {
                margin-bottom: 1rem;
                padding-bottom: 0.5rem;
            }


            .navbar-nav .nav-link,
            .btn-login {
                width: 100%;
                justify-content: center;
            }
        }

        /* tablets */
        @media (min-width: 768px) and (max-width: 991px) {
            .info-box {
                display: flex;
                flex-direction: row;
            }

            .navbar-nav {
                display: flex;
                gap: 2.5rem;
                flex-direction: column;
                align-items: center;
                text-align: center;
                align-items: center;
            }

            .navbar-nav .nav-link {
                width: 100%;
                justify-content: center;
                font-size: 1.3rem;
            }

            .btn-login {
                font-size: 1.3rem;
                margin: 0;
                height: auto;
                padding: 0.7rem;
            }
        }

        /* escritorio */
        @media (min-width: 992px) {
            .navbar-nav {
                display: flex;
                gap: 2.5rem;
                flex-direction: column;
                align-items: center;
                text-align: center;
                align-items: center;
            }

            .navbar-nav .nav-link {
                width: 100%;
                justify-content: center;
                font-size: 1.4rem;
            }

            .btn-login {
                font-size: 1.4rem;
                padding: 1rem 2rem;
            }
        }
    </style>

</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-md navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="vistas/img/plantilla/AsurLogoBlanco.png"" class=" logo" alt="Logo Jurídico">
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
                        <a class="btn btn-login" href="login">INGRESAR</a>
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


    <section id="especialidades" class="especialidades">
        <h2 class="section-title">Especialidades Jurídicas</h2>
        <div class="especialidades-grid">

            <div class="especialidad-card">
                <div class="icon">⚖️</div>
                <h3>Derecho Civil</h3>
                <p>Familia, bienes, contratos y sucesiones.</p>
                <button class="btn-sec">Ver más</button>
            </div>

            <div class="especialidad-card">
                <div class="icon">📚</div>
                <h3>Magisterio, Asesoría Legal y Financiera</h3>
                <p>Defensa y acompañamiento a docentes en procesos legales y financieros.</p>
                <button class="btn-sec">Ver más</button>
            </div>

            <div class="especialidad-card">
                <div class="icon">👔</div>
                <h3>Derecho Comercial</h3>
                <p>Sociedades, contratos mercantiles y registro de marcas.</p>
                <button class="btn-sec">Ver más</button>
            </div>

            <div class="especialidad-card">
                <div class="icon">💼</div>
                <h3>Derecho Laboral</h3>
                <p>Contratos laborales, despidos, seguridad social y pensiones.</p>
                <button class="btn-sec">Ver más</button>
            </div>

            <div class="especialidad-card">
                <div class="icon">👩‍⚖️</div>
                <h3>Derecho Penal</h3>
                <p>Defensa penal integral en procesos judiciales.</p>
                <button class="btn-sec">Ver más</button>
            </div>

            <div class="especialidad-card">
                <div class="icon">🛡️</div>
                <h3>Legal Armor, Defensa Nacional</h3>
                <p>Asesoría a militares y policías en procesos disciplinarios y penales.</p>
                <button class="btn-sec">Ver más</button>
            </div>

            <div class="especialidad-card">
                <div class="icon">🏛️</div>
                <h3>Derecho Administrativo, Sancionador y Disciplinario</h3>
                <p>Procesos contra el Estado, sanciones administrativas y disciplinarias.</p>
                <button class="btn-sec">Ver más</button>
            </div>

            <div class="especialidad-card">
                <div class="icon">💻</div>
                <h3>Tecnologías de la Información y las Comunicaciones</h3>
                <p>Protección de datos, ciberseguridad y regulación digital.</p>
                <button class="btn-sec">Ver más</button>
            </div>

        </div>
    </section>

    <section class="service-box" id="planes">
        <h2 class="section-title">Nuestros Servicios</h2>
        <div class="service-grid">

            <div class="service-detail">
                <div class="card-inner">
                    <div class="card-front plan-card">
                        <h3>Personas Plus</h3>
                        <p class="sub">Profesores, policías, militares</p>
                        <ul>
                            <li>✔️ Asesoría legal básica</li>
                            <li>✔️ Consultas ilimitadas</li>
                            <li>✔️ Descuentos en litigios</li>
                        </ul>
                    </div>
                    <div class="card-back plan-card">
                        <p>Ideal para quienes buscan acompañamiento legal accesible y confiable.</p>
                        <a href="#contacto" class="btn">Solicitar información</a>
                    </div>
                </div>
            </div>

            <div class="service-detail">
                <div class="card-inner">
                    <div class="card-front plan-card destacado">
                        <h3>Personas Star ⭐</h3>
                        <p class="sub">Cobertura premium</p>
                        <ul>
                            <li>✔️ Incluye todo de Plus</li>
                            <li>✔️ Defensa penal</li>
                            <li>✔️ Gestión de contratos</li>
                        </ul>
                    </div>
                    <div class="card-back plan-card destacado">
                        <p>Plan completo con cobertura integral en todas las áreas legales.</p>
                        <a href="#contacto" class="btn">Solicitar información</a>
                    </div>
                </div>
            </div>

            <div class="service-detail">
                <div class="card-inner">
                    <div class="card-front plan-card">
                        <h3>Extranjería</h3>
                        <p class="sub">Trámites migratorios</p>
                        <ul>
                            <li>✔️ Visas y permisos</li>
                            <li>✔️ Nacionalización</li>
                            <li>✔️ Defensa en procesos migratorios</li>
                        </ul>
                    </div>
                    <div class="card-back plan-card">
                        <p>Acompañamiento completo en trámites migratorios en Colombia y el exterior.</p>
                        <a href="#contacto" class="btn">Solicitar información</a>
                    </div>
                </div>
            </div>

            <div class="service-detail">
                <div class="card-inner">
                    <div class="card-front plan-card">
                        <h3>Empresas Plus</h3>
                        <p class="sub">Pymes y startups</p>
                        <ul>
                            <li>✔️ Contratos mercantiles</li>
                            <li>✔️ Cumplimiento normativo</li>
                            <li>✔️ Registro de marcas</li>
                        </ul>
                    </div>
                    <div class="card-back plan-card">
                        <p>Protección legal esencial para pequeñas y medianas empresas.</p>
                        <a href="#contacto" class="btn">Solicitar información</a>
                    </div>
                </div>
            </div>

            <div class="service-detail">
                <div class="card-inner">
                    <div class="card-front plan-card destacado">
                        <h3>Empresas Star ⭐</h3>
                        <p class="sub">Corporaciones</p>
                        <ul>
                            <li>✔️ Incluye todo de Plus</li>
                            <li>✔️ Defensa integral</li>
                            <li>✔️ Consultoría estratégica</li>
                        </ul>
                    </div>
                    <div class="card-back plan-card destacado">
                        <p>El plan más completo para corporaciones que buscan seguridad jurídica.</p>
                        <a href="#contacto" class="btn">Solicitar información</a>
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