<template>
    <div class="hero_area">
      <!-- Header section starts -->
      <header class="header_section">
        <div class="container-fluid">
          <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
            <a class="navbar-brand" href="#index.html">
              <img src="../assets/1-removebg-preview.png">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
  
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
                <!-- Add your navbar items here -->
              </div>
            </div>
          </nav>
        </div>
      </header>
      <!-- End header section -->
  
      <!-- Slider section -->
      <section class="slider_section position-relative">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="slider_item-box">
                <div class="slider_item-container">
                  <div class="container-row">
                    <div class="row align-items-center">
                      <div class="col-md-6">
                        <div class="slider_img-box text-center">
                          <img src="https://i.pinimg.com/originals/11/eb/c1/11ebc17d29ee2f78d16142a0b3f59ea8.png" alt="Watch" style="max-width: 100%;" />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <!-- Contenu de l'item slider -->
                        <div class="slider_item-detail">
                          <h1 class="mb-4">Libérez vos pensées, <br></br>partagez vos idées</h1>
                          <p class="mb-4">
                            
                          </p>
                          <div class="d-flex justify-content-center">
                            <a href="/Login" class="slider-btn1 mr-3">Se connecter</a>
                            <a href="Register" class="slider-btn2">S'incrire</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Add more carousel items here if needed -->
          </div>
        </div>
      </section>
      <!-- End slider section -->
    </div>
  </template>
  
  <style>
  
    /* Styles CSS pour ajuster l'affichage */
    .hero_area {
      height: 100vh;
      background-color: #b5caee;
      overflow: hidden;
    }
  
    .header_section .container-fluid {
      padding: 0 25px;
    }
    .header_section .container-fluid img{
        width: 7%;
        
    }
  
    .navbar-brand {
      text-transform: uppercase;
      font-weight: bold;
      font-size: 35px;
      color: #fafcfd;
    }
  
    .slider_img-box {
      margin: 0 auto;
      text-align: center;
    }
  
    .slider_item-detail {
      text-align: center;
      position: relative;
      bottom: 450px;
      left: 350px;
      overflow: hidden;
    }
    .slider_item-detail a{
        color: #000000;
    }
    .slider_img-box{
        width: 35%;
        margin-left: 100px;
        border: 12px solid #000000;
        border-radius: 2rem;
    }
  
    .slider_item-detail h1 {
      font-size: 3rem;
      text-transform: uppercase;
      margin-bottom: 1rem;
    }
  
    .slider_item-detail p {
      margin-bottom: 1.5rem;
      font-size: 1.2rem;
    }
  
    .slider-btn1,
    .slider-btn2 {
      display: inline-block;
      padding: 10px 35px;
      color: #ffffff;
      border: 1px solid;
    }
  
    .slider-btn1 {
      background-color: #ffff;
      border-color:#252525;
    }
  
    .slider-btn1:hover {
      background-color: transparent;
      color: #252525;
    }
  
    .slider-btn2 {
      background-color: #f54424;
      border-color: #252525;
    }
  
    .slider-btn2:hover {
      background-color: transparent;
      color: #252525;
    }
  
    /* Media queries */
    @media (max-width: 992px) {
      .slider_img-box {
        max-width: 90%;
      }
    }
  
    @media (max-width: 576px) {
      .slider_item-detail h1 {
        font-size: 2rem;
      }
  
      .slider_item-detail p {
        font-size: 1rem;
      }
    }
  </style>
  