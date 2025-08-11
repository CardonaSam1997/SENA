<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Business Task Landing</title>
<style>
  :root{
    --yellow:#F7B919;
    --blue:#324E66;
    --white:#FFFFFF;
    --black:#000000;
  }
  *{margin:0;padding:0;box-sizing:border-box;font-family:Arial, sans-serif;}
  body{background:var(--white);color:var(--black);line-height:1.5;}
  header{display:flex;justify-content:space-between;align-items:center;padding:20px 40px;}
  .logo{display:flex;align-items:center;gap:10px;}
  .logo img{height:40px;}
  .btn-login{background:var(--yellow);color:var(--black);padding:8px 16px;border:none;border-radius:20px;font-weight:bold;cursor:pointer;}

  /* Hero */
  .hero{display:grid;grid-template-columns:1fr 1fr;align-items:center;padding:40px;gap:40px;}
  .hero h1{font-size:2rem;margin-bottom:20px;}
  .hero p{color:var(--blue);}
  .hero .img-placeholder{background:var(--blue);color:var(--white);display:flex;align-items:center;justify-content:center;height:300px;border-radius:8px;text-align:center;padding:20px;}

  /* Features */
  .features{display:flex;gap:20px;padding:40px;}
  .feature{flex:1;border:1px solid var(--blue);padding:20px;border-radius:8px;background:var(--white);}
  .feature-icon{width:40px;height:40px;background:var(--yellow);margin-bottom:10px;}
  .feature h4{margin-bottom:10px;color:var(--black);}
  .feature p{color:var(--blue);font-size:0.9rem;}

  /* Services */
  .services{text-align:center;padding:40px;background:var(--white);}
  .services h2{color:var(--black);margin-bottom:10px;}
  .services h2 span{color:var(--yellow);}
  .service-list{display:flex;justify-content:center;gap:20px;margin-top:20px;flex-wrap:wrap;}
  .service{width:200px;padding:20px;background:var(--blue);color:var(--white);border-radius:8px;}

  /* Testimonials */
  .testimonials{padding:40px;background:var(--black);color:var(--white);}
  .testimonial-container{display:flex;gap:20px;justify-content:center;flex-wrap:wrap;}
  .testimonial{border:2px solid var(--yellow);padding:20px;border-radius:8px;width:250px;background:var(--blue);}
  .testimonial img{width:60px;height:60px;border-radius:50%;margin-bottom:10px;}
  .testimonial h4{margin-bottom:10px;color:var(--yellow);}
  .testimonial p{font-size:0.85rem;}
  .testimonial-nav{margin-top:20px;text-align:center;}
  .testimonial-nav button{background:var(--yellow);color:var(--black);border:none;padding:8px 12px;margin:0 5px;cursor:pointer;}

  /* Footer */
  footer{background:var(--blue);color:var(--white);padding:40px;display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:20px;}
  footer h4{margin-bottom:10px;color:var(--yellow);}
  footer p, footer a{font-size:0.85rem;color:var(--white);text-decoration:none;}
  footer .social{display:flex;gap:10px;}
  footer input[type="email"]{padding:8px;width:100%;margin-top:10px;border:none;border-radius:4px;}
  footer button{margin-top:10px;padding:8px 16px;background:var(--yellow);border:none;color:var(--black);cursor:pointer;border-radius:4px;}
  .copyright{text-align:center;background:var(--black);color:var(--white);padding:10px;font-size:0.8rem;}
</style>
</head>
<body>
<header>
  <div class="logo">
    <img src="logo.png" alt="Business Task Logo">
  </div>
  <button class="btn-login">Login</button>
</header>
<section class="hero">
  <div>
    <h1>Lorem Ipsum is simply dummy text of the printing and typesetting</h1>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
  </div>
  <div class="img-placeholder">ESTE CUADRO ES PARA IMAGEN DE DOS PERSONAS</div>
</section>
<section class="features">
  <div class="feature">
    <div class="feature-icon"></div>
    <h4>Lorem Ipsum is simply</h4>
    <p>Dummy text of the printing and typesetting industry...</p>
  </div>
  <div class="feature">
    <div class="feature-icon"></div>
    <h4>Lorem Ipsum is simply</h4>
    <p>Dummy text of the printing and typesetting industry...</p>
  </div>
  <div class="feature">
    <div class="feature-icon"></div>
    <h4>Lorem Ipsum is simply</h4>
    <p>Dummy text of the printing and typesetting industry...</p>
  </div>
</section>
<section class="services">
  <h2>Our <span>Services</span></h2>
  <div class="service-list">
    <div class="service">Retina Ready</div>
    <div class="service">Creative Elements</div>
    <div class="service">Easy-to-Use</div>
    <div class="service">Easy Import</div>
  </div>
</section>
<section class="testimonials">
  <h2>Testimonial</h2>
  <div class="testimonial-container">
    <div class="testimonial">
      <img src="person1.jpg" alt="HumouThero">
      <h4>HumouThero</h4>
      <p>If suffered alteration in some form, by injected humour...</p>
    </div>
    <div class="testimonial">
      <img src="person2.jpg" alt="HumouThero">
      <h4>HumouThero</h4>
      <p>If suffered alteration in some form, by injected humour...</p>
    </div>
  </div>
  <div class="testimonial-nav">
    <button>&lt;</button>
    <button>&gt;</button>
  </div>
</section>
<footer>
  <div>
    <div class="social">
      <span>●</span>
      <span>●</span>
      <span>●</span>
    </div>
    <p>There are many variations of passages...</p>
  </div>
  <div>
    <h4>LET US HELP YOU</h4>
    <a href="#">Home</a><br>
    <a href="#">About</a><br>
    <a href="#">Service</a><br>
    <a href="#">Contact Us</a>
  </div>
  <div>
    <h4>INFORMATION</h4>
    <a href="#">Terms</a><br>
    <a href="#">Privacy Policy</a>
  </div>
  <div>
    <h4>OUR DESIGN</h4>
    <p>There are many variations of passages...</p>
    <input type="email" placeholder="Enter your email">
    <button>Subscribe</button>
  </div>
</footer>
<div class="copyright">© 2019 All Rights Reserved. Design by Free Html Templates</div>
</body>
</html>


<!--
de aqui sacamos los iconos
https://fontawesome.com/search?q=filter&o=r

modelo BD
Modelos conceptual y lógico para el proyecto desarrollo de software  
Evidencia: GA4-220501095-AA1-EV02 

REQUERIMIENTOS:
Informe de entregables para el proyecto de desarrollo de software 
Evidencia GA4-220501095-AA2-EV02 

GUIA 5
-->