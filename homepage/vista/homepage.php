<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestor de Inventario de Papa</title>
  
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Bootstrap Iconos -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="assets/css/homepage.css">
</head>
<body>
  
  <!-- Barra de navegación fija -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow">
    <div class="container">
      <a class="navbar-brand fw-bold d-flex align-items-center" href="#">
        <img src="../Logo/Logo.png" alt="Logo" class="me-2"> Inventario de Papa
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="#">Inicio</a></li>
          <li class="nav-item"><a class="nav-link" href="#info">Sobre Nosotros</a></li>
          <li class="nav-item"><a class="nav-link" href="#contacto">Contactenos</a></li>
          <li class="nav-item"><a class="btn btn-outline-light" href="index.php?modulo=login">Iniciar Sesión</a></li>
        </ul>
      </div>
    </div>
  </nav>
  
  <!-- Espaciador para la barra de navegación fija -->
  <div class="mt-5"></div>
  
  <!-- Carrusel -->
  <div id="carouselExample" class="carousel slide carousel-fade custom-carousel" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
  
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="assets/img/carrusel1.jpg" class="d-block w-100" alt="Papa en almacén">
        <div class="carousel-caption d-none d-md-block">
          <h5>Gestión Inteligente</h5>
          <p>Optimiza tu inventario con tecnología de punta.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="assets/img/carrusel2.webp" class="d-block w-100" alt="Proceso de selección">
        <div class="carousel-caption d-none d-md-block">
          <h5>Calidad Garantizada</h5>
          <p>Seleccionamos las mejores papas para ti.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="assets/img/carrusel3.jpg" class="d-block w-100" alt="Distribución de papa">
        <div class="carousel-caption d-none d-md-block">
          <h5>Distribución Eficiente</h5>
          <p>Entregas puntuales y confiables en todo el país.</p>
        </div>
      </div>
    </div>
  
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>
  
  <!-- Sección Sobre Nosotros -->
  <section id="info" class="py-5">
    <div class="container">
      <div class="row align-items-center">
        <!-- Columna de texto -->
        <div class="col-md-6 text-center text-md-start">
          <h2 class="fw-bold text-success">Sobre Nosotros</h2>
          <p class="lead">
            En <strong>Ryzomays</strong>, nos especializamos en la gestión
            eficiente de inventarios y la venta de papas de la
            más alta calidad. Con años de experiencia en el
            sector, nos comprometemos a garantizar un
            suministro constante y confiable, apoyando tanto a
            pequeños negocios como a grandes distribuidores.
          </p>
          <br>
          <p>
            Nuestro enfoque combina prácticas tradicionales
            con tecnología moderna, optimizando cada etapa
            del proceso: desde la cosecha hasta la entrega
            final.
          </p>
        </div>
        
        <!-- Columna de imagen -->
        <div class="col-md-6 text-center">
          <img src="assets/img/sobrenosotros.jpg" class="img-fluid rounded shadow-lg" alt="Nuestra empresa">
        </div>
      </div>
    </div>
  </section>
  

  <!-- Sección Contacto --> 
  <section id="contacto">
    <h2>Contáctenos</h2>
    <p>Email: <a href="mailto:contacto@inventariopapa.com">contacto@inventariopapa.com</a></p>
    <p>Teléfono: <a href="tel:123456789">123-456-789</a></p>
    <p>Horario: Lunes a Viernes 9 AM - 6 PM | Sábado 10 AM - 2 PM</p>
  
    <div class="contact-icons">
      <a href="#"><i class="bi bi-facebook"></i></a>
      <a href="#"><i class="bi bi-twitter"></i></a>
      <a href="#"><i class="bi bi-instagram"></i></a>
    </div>
  
    <div class="contact-container">
      <form class="contact-form">
        <input type="text" placeholder="Tu Nombre" required>
        <input type="email" placeholder="Tu Correo" required>
        <textarea placeholder="Escribe tu mensaje" required></textarea>
        <button type="submit">Enviar</button>
      </form>
  
      <div class="contact-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.8354345093744!2d144.9537363155045!3d-37.81627974202157!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d5df1f7f68b%3A0x5045675218ce6e0!2sMelbourne%20VIC%2C%20Australia!5e0!3m2!1sen!2s!4v1603842470541!5m2!1sen!2s"
                width="100%" height="100%" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="py-5 text-white bg-dark">
    <div class="container py-4">
      <div class="row g-4">
        <div class="col-md-6 col-lg-4">
          <div class="d-flex align-items-center mb-3">
            <div class="rounded d-flex align-items-center justify-content-center me-3 bg-success" style="width: 40px; height: 40px;">
              <i class="bi bi-box-seam text-white"></i>
            </div>
            <span class="fs-4 fw-bold">Inventario de Papa</span>
          </div>
          <p class="text-white opacity-75">
            Gestionamos eficientemente el inventario y distribución de papa con la mejor calidad.
          </p>
        </div>
        
        <div class="col-md-6 col-lg-4">
          <h3 class="fs-5 fw-semibold mb-3 text-white">Contacto</h3>
          <ul class="list-unstyled text-white opacity-75">
            <li class="mb-2"><a href="mailto:contacto@inventariopapa.com" class="text-decoration-none text-white">contacto@inventariopapa.com</a></li>
            <li class="mb-2">Tel: 123-456-789</li>
            <li class="mb-2">Calle Principal, Ciudad, País</li>
          </ul>
        </div>
        
        <div class="col-md-6 col-lg-4">
          <h3 class="fs-5 fw-semibold mb-3 text-white">Enlaces Legales</h3>
          <ul class="list-unstyled">
            <li class="mb-2"><a href="#" class="text-decoration-none text-white">Términos y Condiciones</a></li>
            <li class="mb-2"><a href="#" class="text-decoration-none text-white">Política de Privacidad</a></li>
          </ul>
        </div>
      </div>
      
      <div class="border-top mt-4 pt-4 text-center text-white opacity-75">
        <p class="mb-0">© 2025 Inventario de Papa. Todos los derechos reservados.</p>
      </div>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
