<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="vistas/img/plantilla/AsurLogo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página en Mantenimiento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        /* colores

 Hex: `#99d6f2` (Azul claro)
 Hex: `#6699cc` (Azul medio)
 Hex: `#000066` (Azul oscuro)
 Hex: `#9999cc` (Azul lavanda claro)
 Hex: `#b3d9e6` (Azul grisáceo claro)
 Hex: `#99b3cc` (Gris azulado)
 Hex: `#b3c2d1` (Gris claro)
 Hex: `#333333` (Gris oscuro)
 Hex: `#000000` (Negro)
        */

        /* ESTILOS GENERALES */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Source Sans Pro', sans-serif;
        }

        body {            
            color: #000000;
            background-color: #f5f7f6;
            margin: 0 auto;
            position: relative;
        }

        div {
            display: block;
        }

        /* NAVBAR */
        .navbar {
            background-color: #EBEBEB;
            margin-bottom: 0;
            box-shadow: #ADADAD 0px 1px 5px 2px;
        }

        .header-logo {
            display: grid;
            align-items: center;
            height: 524px;
            background-color: #000000;
            background-image: url('vistas/img/plantilla/Fondo.jpeg');
            background-size: cover;
            /* Para que la imagen cubra todo el contenedor */
            background-position: center;
            /* Para centrar la imagen */
            background-repeat: no-repeat;
            /* Para que no se repita */
            box-shadow: 0 8px 15px #b3c2d1;
            /* sombra abajo */
        }

        .navbar-brand {
            display: flex;
            padding: 0;
            margin: auto;
            align-items: center;
        }

        .logo {
            max-width: 150px;
            height: auto;
        }

        .nav-item {
            margin-right: 15px;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .nav-link {
            padding: 10px 15px;
            color: #141f29;
            font-weight: 500;
            border-radius: 8px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .nav-link:hover,
        .nav-link:focus {
            background-color: #141f29;
            color: #f0f5fa;
            text-decoration: none;
        }

        .dropdown-menu {
            background-color: #EBEBEB;
            border: none;
        }

        .dropdown-menu a {
            background-color: #EBEBEB;
            border: none;
        }

        /* CONTENIDO */
        .content {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 2rem;
            border-radius: 6px;
            border: 1px solid #b3c2d1;
        }

        .who-we-are {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            margin: 30px;
            /* padding-top: 30px; */
            width: 670px;
            column-gap: 20px;
            height: fit-content;
            align-items: center;
        }

        .basic-information {
            height: 251px;
            /* width: 900px; */
            grid-column: span 2;
            background-color: #d6d6d6;
            padding: 12px;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
        }

        .basic-information h2 {
            display: block;
            text-transform: capitalize;
            margin-bottom: 12px;
            margin-top: 5px;
            font-size: 24px;
            font-weight: bold;
        }

        .basic-information p {
            font-size: 16px;
            line-height: 2rem;
            word-spacing: 2px;
        }

        .img-information {
            grid-column: 1;
            border-radius: 10px;
            display: flex;
            justify-content: center; /* Centra horizontalmente */
            align-items: center;  
        }

        .img-information img {
            width: 100%;
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }



        /* INFO BOX */
        .info-box {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            width: 1000px;
            margin: 48px auto;
            column-gap: 80px;
            background-color: #293d52;
            border-radius: 20px;
            align-items: stretch;
        }

        .info-box div {
            margin: 12px;
        }

        .icon {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .info-icons {
            stroke: #b3cce6;
            width: 44px;
            height: 44px;
        }

        .info-title {
            display: flex;
            justify-content: center;
            margin: 14px auto;
            font-size: 30px;
            line-height: 1.1;
            letter-spacing: -1px;
            font-weight: bold;
            text-transform: capitalize;
            color: #f5f7fa;
        }

        .info-text {
            font-size: 14px;
            line-height: 1.7;
            color: #f0f5fa;
        }

        /* ESPECIALIDADES */
        /* ESPECIALIDADES */
.especiality-box {
    align-items: center;
    background: #E3E3E3;
    display: flex;
    flex-direction: column;
    height: 100vh;
    justify-content: center;
}

/* Gradiente blanco para los extremos */
.slider::before,
.slider::after {
    content: "";
    height: 100px;
    position: absolute;
    width: 200px;
    z-index: 2;
    background: linear-gradient(to right, rgba(255,255,255,1) 0%, rgba(255,255,255,0) 100%);
}

.slider::after {
    right: 0;
    top: 0;
    transform: rotateZ(180deg);
}

.slider::before {
    left: 0;
    top: 0;
}

/* Animación */
@keyframes scroll {
    0% { transform: translateX(0); }
    100% { transform: translateX(calc(-250px * 7)); }
}

/* Slider base */
.slider {
    background: white;
    box-shadow: 0 10px 20px -5px rgba(0, 0, 0, 0.125);
    height: 100px;
    margin: auto;
    overflow: hidden;
    position: relative;
    width: 960px;
}

/* Contenedor de slides animado */
.slide-track {
    display: flex;
    width: calc(250px * 14);
    animation: scroll 40s linear infinite;
}

/* Slide individual */
.slide {
    height: 100px;
    width: 250px;
}

        /* ------------ */

        /* SERVICIOS */
        .service-title {
            font-size: 30px;
            text-align: center;
            font-weight: bold;
            margin-bottom: 32px;
        }

        .service-box {
            width: 1200px;
            margin: 0 auto 128px auto;
            border: none;
        }

        .service-box h2 {
            font-size: 42px;
            font-weight: bold;
            line-height: 1.7;
            color: #141f29;
            text-align: center;
            margin-bottom: 32px;
        }

        .service-box h3 {
            font-size: 26px;
            font-weight: bold;
            line-height: 1.7;
            color: #141f29;
            text-align: center;
        }

        .service-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            column-gap: 20px;
            border-radius: 10px;
            margin-top: 40px;
            margin-bottom: 64px;
        }

        .enterprice {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            column-gap: 20px;
            border-radius: 10px;
            margin: 40px 140px 60px;
        }

        .service-detail {
            border-radius: 10px;
            height: 550px;
        }

        .service-detail header h1 {
            text-align: center;
            font-size: 26px;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .service-detail h3 {
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 16px;
        }

        .service-description {
            font-size: 14px;
            line-height: 1.7;
            margin-bottom: 24px;
        }

        .service-description p {
            margin-bottom: 12px;
            color: #000000;
        }

        .materias-cubiertas {
            display: grid;
            grid-template-columns: 1fr 1fr;
            list-style: none;
            font-size: 12px;
            margin-bottom: 20px;
        }

        .materias-cubiertas li {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 12px;
        }

        .beneficios {
            margin-bottom: 18px;
        }

        .benefic-icons {
            height: 25px;
            width: 25px;
            flex-shrink: 0;
        }

        .beneficios h3 {
            margin-bottom: 18px;
        }

        .beneficios ul {
            list-style: none;
            font-size: 12px;
            line-height: 1.7;
        }

        .beneficios li {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* FOOTER */
        .footer {
            display: block;
            font-size: 12px;
            text-align: center;
            padding: 1rem 0;
            background-color: #EBEBEB;
            bottom: 0;
            width: 100%;
            box-shadow: #ADADAD 0px -1px 5px 2px;
        }

        /* CARD */

        .card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            transition: transform 0.6s;
            transform-style: preserve-3d;
            background-color: #8aa1b8;
            border: 1px solid #8aa1b8;
            border-radius: 10px;
        }

        .card-icons {
            stroke: #141f29;
            height: 100px;
            width: 100px;
        }

        .service-detail:hover .card-inner {
            transform: rotateY(180deg);
        }

        .card-front,
        .card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            align-items: center;
            justify-content: center;
            border-radius: 0.5rem;
        }

        .card-front {
            /* background: white;
            border: 1px solid #e5e7eb; */
            padding: 20px;
        }

        .card-front header {
            display: flex;
            align-items: center;
            flex-direction: column;
            margin-bottom: 16px;
        }

        .card-back {
            background: #c2d6eb;
            border: 1px solid #c2d6eb;
            transform: rotateY(180deg);
            padding: 20px;
        }

        /* ----- */
        /* CONTACT US */
        .contact-section {
            width: 1200px;
            margin: 0 auto 128px auto;
            border: 1px solid #ADADAD;
            padding: 20px;
            border-radius: 10px;
        }

.contact-container {
  display: grid;
  grid-template-columns: 1fr 1fr;
  max-width: 1100px;
  margin: 0 auto;
  gap: 40px;
}

.contact-form {
  background-color: #293d52;
  padding: 30px;
  border-radius: 10px;
}

.contact-form h2 {
  margin-bottom: 20px;
}

.contact-form form {
  display: flex;
  flex-direction: column;
  gap: 15px;
}

.contact-form input,
.contact-form textarea {
  padding: 14px;
  border: none;
  border-radius: 5px;
  background-color: #d6e1eb;
  color: black;
  font-size: 12px;
}

.contact-form button {
    text-transform: uppercase;
  padding: 18px;
  background-color: #ffffff;
  color: black;
  border: none;
  border-radius: 25px;
  cursor: pointer;
  font-weight: bold;
  transition: background 0.5s;
  font-size: 14px;
}

.contact-form button:hover {
  background-color: #cccccc;
}

.contact-info {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.contact-icons {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 20px;
}

.info-item {
  background-color: #d6e1eb;
  padding: 15px;
  border-radius: 10px;
  display: flex;
  align-items: center;
  gap: 10px;
  justify-content: space-evenly;
}

.info-item span{
    font-size: 14px;
    font-weight: bold;
}

.info-item p{
    display: block;
    font-size: 12px;
}


.map-container {
  margin-top: 20px;
  border-radius: 10px;
  overflow: hidden;
}

/* MAPA */

.map-container {
  position: relative;
  padding-bottom: 56.25%;
  height: 0;
  overflow: hidden;
}

.map-container iframe {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border: 0;
}

/* ----------------- */
 
        /* ------------ */
        /* BOTON */
        .fab-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 100;
        }

        .fab-toggle {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            transition: transform 0.3s;
        }

        .fab-menu {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: absolute;
            bottom: 70px;
            right: 0;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease-in-out;
        }

        .fab-item {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .fab-container.active .fab-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(-10px);
        }

        .fab-container.active .fab-toggle {
            transform: rotate(45deg);
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand">
                <img src="vistas/img/plantilla/Logo.jpeg" alt="logo" class="logo">
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">INICIO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#quienes-somos">QUIENES SOMOS</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            SERVICIOS
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#especialidades">Especialidades</a></li>
                            <li><a class="dropdown-item" href="#planes">Planes</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact-section">CONTACTO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login">INGRESAR</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="header-logo">
        <section class="who-we-are" id="quienes-somos">
        
        

        <div class="basic-information">

            <p>Estamos enfocados en ofrecer a los usuarios asesoría legal
                y financiera, así como representacion en aspectos fundamentales del día a día
                tales como: relaciones interpersonales (<strong><i>derecho civil</i></strong>), relaciones laborales (<strong><i>derecho laboral</i></strong>),
                relaciones familiades (<strong><i>derecho de familia</i></strong>), relaciones con el estado (<strong><i>derecho administrativo</i></strong>)
                y cumplimiento de la normativa (<strong><i>derecho penal</i></strong>) entre otros.
            </p>
            <p>
                Con Legaltech de <strong><i>ASJURFIN LTDA</i></strong>, transformamos la práctica legal con la combinacion perfecta de derecho finanzas y tecnología.
                Nuestra mision es ofrecer soluciones legales innovadoras a costos accesibles que faciliten la gestion legal en un entorno digital en constante evolución.
            </p>
        </div>
    </section>
    </header>

    <!-- <section class="who-we-are container-fluid" id="quienes-somos">
        <div class="img-information">
        <img src="vistas/img/plantilla/Logo.jpeg" alt="Logo de Asur">
        </div>

        <div class="basic-information">
            <h2>quienes somos</h2>

            <p>Estamos enfocados en ofrecer a los usuarios asesoría legal
                y financiera, así como representacion en aspectos fundamentales del día a día
                tales como: relaciones interpersonales (<strong><i>derecho civil</i></strong>), relaciones laborales (<strong><i>derecho laboral</i></strong>),
                relaciones familiades (<strong><i>derecho de familia</i></strong>), relaciones con el estado (<strong><i>derecho administrativo</i></strong>)
                y cumplimiento de la normativa (<strong><i>derecho penal</i></strong>) entre otros.
            </p>
            <p>
                Con Legaltech de <strong><i>ASJURFIN LTDA</i></strong>, transformamos la práctica legal con la combinacion perfecta de derecho finanzas y tecnología.
                Nuestra mision es ofrecer soluciones legales innovadoras a costos accesibles que faciliten la gestion legal en un entorno digital en constante evolución.
            </p>
        </div>
    </section> -->

    <section class="info-box">
        <div>
            <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="info-icons">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v17.25m0 0c-1.472 0-2.882.265-4.185.75M12 20.25c1.472 0 2.882.265 4.185.75M18.75 4.97A48.416 48.416 0 0 0 12 4.5c-2.291 0-4.545.16-6.75.47m13.5 0c1.01.143 2.01.317 3 .52m-3-.52 2.62 10.726c.122.499-.106 1.028-.589 1.202a5.988 5.988 0 0 1-2.031.352 5.988 5.988 0 0 1-2.031-.352c-.483-.174-.711-.703-.59-1.202L18.75 4.971Zm-16.5.52c.99-.203 1.99-.377 3-.52m0 0 2.62 10.726c.122.499-.106 1.028-.589 1.202a5.989 5.989 0 0 1-2.031.352 5.989 5.989 0 0 1-2.031-.352c-.483-.174-.711-.703-.59-1.202L5.25 4.971Z" />
                </svg>
                <h1 class="info-title">misión</h1>

            </div>
            <p class="info-text">
                En Legaltech, nos comprometemos a ofrecer asesoría y apoyo en procesos jurídicos y financieros
                tanto en Colombia como en el exterior. Nuestra misión es proporcionar soluciones efectivas a problemas no resueltos
                mediante una combinación de derecho y tecnología avanzada. Buscamos revolucionar el ambito legal
                con herramientas innovadoras, haciéndolo más accesible y eficiente.
            </p>
        </div>
        <div>
            <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="info-icons">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z" />
                </svg>

                <h2 class="info-title">visión</h2>
            </div>
            
            <p class="info-text">
                Ser líderes en la integración de derecho y tecnología, redefiniendo la práctica y gestión de los servicios legales
                en el mundo digital. En <strong><i>ASJURFIN</i></strong>, creemos que nuestro sistema legaltech es la clave para un futuro legal más accesible,
                eficiente y conectado, facilitando el acceso a la justicia para personas y empresas
            </p>
        </div>
    </section>

    <section class="especiality-box">
    <h2 class="info-title">Nuestras Especialidades</h2>

    <div class="slider">
        <div class="slide-track">
            <div class="slide"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/1.png" height="100" width="250" alt="" /></div>
            <div class="slide"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/2.png" height="100" width="250" alt="" /></div>
            <div class="slide"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/3.png" height="100" width="250" alt="" /></div>
            <div class="slide"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/4.png" height="100" width="250" alt="" /></div>
            <div class="slide"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/5.png" height="100" width="250" alt="" /></div>
            <div class="slide"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/6.png" height="100" width="250" alt="" /></div>
            <div class="slide"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/7.png" height="100" width="250" alt="" /></div>

            <!-- Repetidos para loop continuo -->
            <div class="slide"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/1.png" height="100" width="250" alt="" /></div>
            <div class="slide"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/2.png" height="100" width="250" alt="" /></div>
            <div class="slide"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/3.png" height="100" width="250" alt="" /></div>
            <div class="slide"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/4.png" height="100" width="250" alt="" /></div>
            <div class="slide"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/5.png" height="100" width="250" alt="" /></div>
            <div class="slide"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/6.png" height="100" width="250" alt="" /></div>
            <div class="slide"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/7.png" height="100" width="250" alt="" /></div>
        </div>
    </div>
</section>


    <section class="service-box" class="container-fluid" id="planes">
        <div>
            <h2>Nuestros Servicios</h2>
            <h3>Personas</h3>
            <div class="service-grid">
                <div class="service-detail">
                    <div class="card-inner">
                        <div class="card-front">
                            <header>
                                <h1>Persona Plus</h1>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="card-icons">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                            </header>

                            <div class="service-description">
                                <p>
                                    Usuarios que su profesión, trabajo o medio
                                    de desarrollo involucran una alta responsabilidad
                                    y/o presión jurídica o financiera.
                                </p>
                                <p>
                                    Empleados del sector publico como profesores,
                                    policías, o militares entre otros que por distintos
                                    motivos se sienten vulnerados antes las entidades
                                    o terceros y no han tenido una mano amiga en
                                    esencia por costo, desconocimiento o desconfianza.
                                </p>
                                <p>
                                    Adquiera cubrimiento parcial de nuestros servicios
                                    dos materias del derecho por usuario.
                                </p>
                            </div>
                        </div>
                        <div class="card-back">
                            <div class="beneficios">
                                <h3>Beneficios del Servicio</h3>

                                <ul>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="benefic-icons">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                                        </svg>
                                        <span>1 año de cubrimiento especial</span>
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="benefic-icons">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                                        </svg>
                                        <span>seminarios anuales de capacitación jurídica
                                            y financiera</span>
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="benefic-icons">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                                        </svg>
                                        <span>Derecho de cubrimiento a beneficiarios
                                            (1 personas núcleo familiar)</span>
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="benefic-icons">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 0 0-2.15-1.588H6.911a2.25 2.25 0 0 0-2.15 1.588L2.35 13.177a2.25 2.25 0 0 0-.1.661Z" />
                                        </svg>
                                        <span>Atención constante y asesoría continua mediante
                                            nuestros canales de atención contact center</span>
                                    </li>
                                </ul>
                            </div>
                            <h3>materias de derecho</h3>
                            <ul class="materias-cubiertas">
                                <li>Comercial/Administrativo</li>
                                <li>Comercial/Civil</li>
                                <li>Penal/Familia</li>
                                <li>Administrativo/Penal</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="service-detail">
                    <div class="card-inner">
                        <div class="card-front">
                            <header>
                                <h1>Persona Star</h1>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="card-icons">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                </svg>

                            </header>

                            <body>
                                <div class="service-description">
                                    <p>
                                        Usuarios que su profesión, trabajo o medio
                                        de desarrollo involucran una alta responsabilidad
                                        y/o presión jurídica o financiera.
                                    </p>
                                    <p>
                                        Empleados del sector publico como profesores,
                                        policías, o militares entre otros que por distintos
                                        motivos se sienten vulnerados antes las entidades
                                        o terceros y no han tenido una mano amiga en
                                        esencia por costo, desconocimiento o desconfianza.
                                    </p>
                                    <p>
                                        Adquiera cubrimiento total de nuestros servicios
                                        en todas las materias del derecho por usuario y
                                        beneficiarios
                                    </p>
                                </div>
                            </body>
                        </div>
                        <div class="card-back">
                            <div class="beneficios">
                                <h3>Beneficios del Servicio</h3>
                                <ul>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="benefic-icons">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                                        </svg>
                                        <span>1 año de cubrimiento especial</span>
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="benefic-icons">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                                        </svg>
                                        <span>seminarios anuales de capacitación jurídica
                                            y financiera</span>
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="benefic-icons">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                                        </svg>
                                        <span>Derecho de cubrimiento a beneficiarios
                                            (1 personas núcleo familiar)</span>
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="benefic-icons">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 0 0-2.15-1.588H6.911a2.25 2.25 0 0 0-2.15 1.588L2.35 13.177a2.25 2.25 0 0 0-.1.661Z" />
                                        </svg>
                                        <span>Atención constante y asesoría continua mediante
                                            nuestros canales de atención contact center</span>
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="benefic-icons">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        <span>Descuentos en membresías con aliados
                                            estratégicos</span>
                                    </li>
                                </ul>
                            </div>
                            <h3>materias de derecho</h3>
                            <ul class="materias-cubiertas">
                                <li><span>Administrativo</span></li>
                                <li><span>Comercial</span></li>
                                <li><span>Civil</span></li>
                                <li><span>Penal</span></li>
                                <li><span>Familiar</span></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="service-detail">
                    <div class="card-inner">
                        <div class="card-front">
                            <header>
                                <h1>Extrangeria</h1>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="card-icons">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418" />
                                </svg>
                            </header>


                            <body>
                                <div class="service-description">
                                    <p>
                                        En este servicio el usuario podrá acceder a
                                        consultas, asesorías y acompañamiento
                                        ilimitado en los 7 campos indicados dentro de
                                        nuestra membresía para colombianos en el
                                        exterior, el costo de la membresía es único,
                                        personal e intransferible.
                                    </p>
                                </div>
                            </body>
                        </div>
                        <div class="card-back">
                            <div class="beneficios">
                                <h3>Beneficios del Servicio</h3>
                                <ul>
                                    <li><span>Asesoría en trámites de asilo en el extranjero.</span></li>
                                    <li><span>Asesoría en trámites de arraigo.
                                            (social, familiar y para la formación)</span></li>
                                    <li><span>Asesoría de trámites educativos y
                                            convalidación de títulos.</span></li>
                                    <li><span>Procesos y demandas desde el exterior.</span></li>
                                    <li><span>Línea de atención gratuita internacional.</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h3>Empresas</h3>
            <div class="enterprice">
                <div class="service-detail">
                    <div class="card-inner">
                        <div class="card-front">
                            <header>
                                <h1>Empresas Plus</h1>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="card-icons">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                            </header>

                            <div class="service-description">
                                <p>
                                Nuestro servicio plus comprende la defensa, asesoria
                                y acompañamiento de todas las medianas empresas
                                cuya contratación se encuentra entre los 2 a 50
                                colaboradores y más de 1 años de experiencia en los
                                sectores laborales, donde podrá ser acompañado sobre
                                todos los movimientos y aspectos legales que su
                                compañía enfrente en este arduo camino empresarial.
                                </p>
                                <p>
                                Contará con cubrimiento especial a su marca en los 6
                                aspectos más relevantes del sector empresarial, en
                                este servicio nuestro equipo lo acompañarà de manera
                                presencial 1 vez cada 3 meses y entregaremos informes
                                de gestión actualizados mediante nuestra plataforma
                                sobre sus procesos en curso, estos los podrá revisar
                                y controlar desde nuestra plataforma, además contará
                                con 1 especialista dedicado a su marca para las diversas
                                consultas.
                                </p>
                            </div>
                        </div>
                        <div class="card-back">
                            <h3>materias de derecho</h3>
                            <ul class="materias-cubiertas">
                                <li>Comercial</li>
                                <li>Administrativo</li>
                                <li>Laboral</li>
                                <li>Civil</li>
                                <li>Penal</li>
                                <li>Inversiones</li>
                                <li>Ciberseguridad</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="service-detail">
                    <div class="card-inner">
                        <diev class="card-front">
                            <header>
                                <h1>Empresas Star</h1>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="card-icons">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                </svg>

                            </header>

                            <body>
                                <div class="service-description">
                                    <p>
                                    Nuestro servicio star comprende la defensa, asesoría y
                                    acompañamiento de todas las medianas empresas cuya
                                    contratación supera los 51 colaboradores y más de 5 años
                                    de experiencia en los sectores laborales, donde podrá ser
                                    acompañado sobre todos los movimientos y aspectos
                                    legales que su compañía enfrente en este arduo camino
                                    empresarial.
                                    </p>
                                    <p>
                                    Contará con cubrimiento especial a su marca
                                    en los 6 aspectos más relevantes del sector empresarial,
                                    en este servicio nuestro equipo lo acompañará de manera
                                    presencial en fechas acordadas y entregaremos informes
                                    de gestión actualizados mediante nuestra plataforma
                                    sobre sus procesos en curso, estos los podrá revisar y
                                    controlar desde nuestra plataforma, además contará con
                                    cada uno de los especialistas calificados.
                                    </p>
                                </div>
                            </body>
                        </diev>
                        <div class="card-back">
                            <h3>materias de derecho</h3>
                            <ul class="materias-cubiertas">
                                <li>Comercial</li>
                                <li>Administrativo</li>
                                <li>Laboral</li>
                                <li>Civil</li>
                                <li>Penal</li>
                                <li>Inversiones</li>
                                <li>Ciberseguridad</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-section" id="contact-section">
  <div class="contact-container">

    <!-- Formulario de contacto -->
    <div class="contact-form">
      <h2>Get In Touch</h2>
      <form>
        <input type="text" placeholder="Tu nombre..." required>
        <input type="email" placeholder="tu-correo@yourmail.com" required>
        <input type="text" placeholder="Sector al que pertenece: (Profesor, Policia, Militar, etc...)" required>
        <input type="text" placeholder="Telefono de contacto..." required>
        <textarea placeholder="Informacion adicional..." rows="5" required></textarea>
        <button type="submit">Registrate Ahora</button>
      </form>
    </div>

    <!-- Información de contacto -->
    <div class="contact-info">
      <div class="contact-icons">
        <div class="info-item">
        <svg 
        class="info-icons"
         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
            <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/>
        </svg>
            <p> <span>WhatsApp</span> <br> +57 305 713 1652</p>
          
        </div>
        <div class="info-item">
        <svg 
        class="info-icons"
        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path d="M64 112c-8.8 0-16 7.2-16 16l0 22.1L220.5 291.7c20.7 17 50.4 17 71.1 0L464 150.1l0-22.1c0-8.8-7.2-16-16-16L64 112zM48 212.2L48 384c0 8.8 7.2 16 16 16l384 0c8.8 0 16-7.2 16-16l0-171.8L322 328.8c-38.4 31.5-93.7 31.5-132 0L48 212.2zM0 128C0 92.7 28.7 64 64 64l384 0c35.3 0 64 28.7 64 64l0 256c0 35.3-28.7 64-64 64L64 448c-35.3 0-64-28.7-64-64L0 128z"/></svg>
          <p> <span>Correo</span> <br> registro@asjurfinlegaltech.com</p>
        </div>
        <div class="info-item">
        <svg 
        class="info-icons"
        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
        <path d="M160 368c26.5 0 48 21.5 48 48l0 16 72.5-54.4c8.3-6.2 18.4-9.6 28.8-9.6L448 368c8.8 0 16-7.2 16-16l0-288c0-8.8-7.2-16-16-16L64 48c-8.8 0-16 7.2-16 16l0 288c0 8.8 7.2 16 16 16l96 0zm48 124l-.2 .2-5.1 3.8-17.1 12.8c-4.8 3.6-11.3 4.2-16.8 1.5s-8.8-8.2-8.8-14.3l0-21.3 0-6.4 0-.3 0-4 0-48-48 0-48 0c-35.3 0-64-28.7-64-64L0 64C0 28.7 28.7 0 64 0L448 0c35.3 0 64 28.7 64 64l0 288c0 35.3-28.7 64-64 64l-138.7 0L208 492z"/></svg>
        <p> <span>Consultorias:</span> <br> +57 313 468 8377 </p>
        <p> <span>Asesorias:</span> <br> +57 305 854 7961</p>
        </div>
        <div class="info-item">
        <svg 
        class="info-icons"
        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
            <path d="M565.6 36.2C572.1 40.7 576 48.1 576 56l0 336c0 10-6.2 18.9-15.5 22.4l-168 64c-5.2 2-10.9 2.1-16.1 .3L192.5 417.5l-160 61c-7.4 2.8-15.7 1.8-22.2-2.7S0 463.9 0 456L0 120c0-10 6.1-18.9 15.5-22.4l168-64c5.2-2 10.9-2.1 16.1-.3L383.5 94.5l160-61c7.4-2.8 15.7-1.8 22.2 2.7zM48 136.5l0 284.6 120-45.7 0-284.6L48 136.5zM360 422.7l0-285.4-144-48 0 285.4 144 48zm48-1.5l120-45.7 0-284.6L408 136.5l0 284.6z"/></svg>
          <p> <span>Direccion</span> <br> Calle 63A # 11-40. Edificio Corcega.</p>
        </div>
      </div>

      <div class="map-container">
      <iframe src="https://www.google.com/maps/embed?pb=!4v1744694439775!6m8!1m7!1sVTMRex5bXeY82loSyI0T-g!2m2!1d4.64997111974961!2d-74.06323339146205!3f32.50216185627732!4f5.475447690753157!5f0.7820865974627469" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>

  </div>
</section>


    <!-- Botón flotante y sub-botones -->
    <div class="fab-container">
        <button class="btn btn-primary fab-toggle">
            <i class="bi bi-plus"></i>
        </button>
        <div class="fab-menu">
            <a href="https://wa.me/3057131652" target="_blank" class="fab-item btn btn-success">
                <i class="bi bi-whatsapp"></i>
            </a>
            <a href="https://www.facebook.com" target="_blank" class="fab-item btn btn-primary">
                <i class="bi bi-facebook"></i>
            </a>
            <a href="https://twitter.com" target="_blank" class="fab-item btn btn-info">
                <i class="bi bi-twitter"></i>
            </a>
            <a href="#" class="fab-item btn btn-danger" onclick="window.scrollTo({ top: 0, behavior: 'smooth' })">
                <i class="bi bi-house"></i> <!-- Botón de Home -->
            </a>
        </div>
    </div>

    <div class="modal fade" id="imageModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img src="vistas/img/plantilla/QR.jpeg" alt="Imagen de Servicio" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <p>Si necesitas asesoría, contáctanos al correo <a href="mailto:registro@asjurfinlegaltech.com">registro@asjurfinlegaltech.com</a></p>
        <p>O comunícate a nuestro WhatsApp <a href="https://wa.me/3057131652">3057131652</a></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.querySelector('.fab-toggle').addEventListener('click', function() {
            document.querySelector('.fab-container').classList.toggle('active');
        });
    </script>
    <script>
        document.querySelectorAll('.box-collapsible h2').forEach(header => {
            header.addEventListener('click', function() {
                const box = this.parentElement;
                const content = box.querySelector('.content-quienes-somos');
                if (box.classList.contains('expanded')) {
                    box.classList.remove('expanded');
                    content.style.maxHeight = null; // Ocultamos el contenido
                    content.style.visibility = 'hidden'; // Lo hacemos invisible
                } else {
                    box.classList.add('expanded');
                    content.style.maxHeight = content.scrollHeight + "px"; // Desplegamos el contenido
                    content.style.visibility = 'visible'; // Lo hacemos visible
                }
            });
        });
    </script>

</body>

</html>