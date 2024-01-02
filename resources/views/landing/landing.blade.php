<!DOCTYPE html>
<html>

<head>
  <title>Landing Page</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/styleLanding.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <div class="navbar">
    <img src="assets/image/Logo_Panjang.png" class="img-fluid" width="15%">
    <ul>
      <li><a href="/sesi">Login</a></li>
      <li><a href="/register/register">Sign Up</a></li>
    </ul>
  </div>



  <div id="carouselExampleDark" class="carousel carousel-dark slide" class="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="10000">
        <img src="assets/image/Carousel1.png" class="d-block w-100" >
        <div class="carousel-caption d-none d-md-block">
          <h5 id="carousel_text">First slide label</h5>
          <p id="carousel_text">Some representative placeholder content for the first slide.</p>
        </div>
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="assets/image/Carousel2.png" class="d-block w-100" >
        <div class="carousel-caption d-none d-md-block">
          <h5 id="carousel_text">Second slide label</h5>
          <p id="carousel_text">Some representative placeholder content for the second slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="assets/image/Carousel3.png" class="d-block w-100" >
        <div class="carousel-caption d-none d-md-block">
          <h5 id="carousel_text">Third slide label</h5>
          <p id="carousel_text">Some representative placeholder content for the third slide.</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div>
    <h2 class="text-center">Welcome to Our Website</h2>
    <p class="text-center">
      Kami dengan bangga mempersembahkan layanan terbaru kami 
      <br>yang akan merubah cara Anda mengelola jadwal kehidupan kuliah. 
      <br>Sahabat Mahasiswa hadir sebagai teman setia untuk mendukung kesuksesan akademis dan keseimbangan hidup Anda di dunia perkuliahan.
    </p>
  </div>

  <div class="container-fluid" id="text-fitur">
    <h2 class="text-center">We are introducing</h2>
  </div>

  <div class="container-fluid">
    <div class="row row-cols-1 row-cols-md-3 g-4" id="card">
      <div class="col">
        <div class="card h-100 bg-transparent">
          <img src="assets/image/card1.png" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100 bg-transparent">
          <img src="assets/image/card2.jpg" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>

        </div>
      </div>
      <div class="col">
        <div class="card h-100 bg-transparent">
          <img src="assets/image/card3.jpg" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="content2-container">
      <div class="content2">
        <p style="font-size: medium;" class="text-center">
          Kami hadir untuk membantu Anda membuat perjalanan kuliah Anda lebih teratur dan terstruktur.
          <br>Kami memahami bahwa kehidupan mahasiswa seringkali penuh dengan tuntutan, tugas, dan jadwal yang padat.
          <br>Itulah mengapa kami berkomitmen untuk menjadi mitra terbaik Anda dalam mengatur jadwal dan mencapai
          kesuksesan akademik.
        </p>
        <br>
        <h2 style="font-size:large;" class="text-center">Jadi, siap untuk membuat jadwal kuliah Anda lebih ringan dan menyenangkan? 
          <br>Ayo bergabung dengan Sahabat Mahasiswa sekarang!

          <br>
          <a href="/register/register"><button type="button" class="btn btn-primary">SIGN UP</button></a>
        </h2>

      </div>
    </div>

    <div class="container-fluid">
    <div class="content2-container">
        <div class="content2">
            <h3>Feedback from Users</h3>

            <div class="row justify-content-start">
                @foreach($feedbacks as $key => $feedback)
                    @if($key < 3)
                        <div class="col-md-4 mb-4 @if($feedbacks->currentPage() > 1 && $key == 0) offset-md-0 @endif">
                            <div class="card bg-dark text-white">
                                <div class="card-body">
                                    <p class="card-text">{{ $feedback->content }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <div class="d-flex justify-content-between">
                @if($feedbacks->currentPage() > 1)
                    <a href="{{ $feedbacks->previousPageUrl() }}" class="btn btn-primary">Previous</a>
                @endif

                @if($feedbacks->hasMorePages())
                    <a href="{{ $feedbacks->nextPageUrl() }}" class="btn btn-primary">Next</a>
                @endif
            </div>
        </div>
    </div>
</div>






    


    <div class="footer-content">

      <div class="col-md-6 ">
        <img class="footer-logo" src="assets/image/Logo_Panjang.png" class="img-fluid" width="100%">
        <p>We are a passionate team dedicated to providing the best services to support your jurney in college.</p>

        <ul class="social-icons img-fluid text-center">

          <li>
            <img src="assets/image/facebook.png">
            <a href="https://www.facebook.com/telkomuniversity" target="_blank">
              SahabatMahasiswa.id
            </a>
          </li>

          <li>
            <img src="assets/image/instagram.png">
            <a href="https://www.instagram.com/telkomuniversity/S" target="_blank">
              SahabatMahasiswa.id
            </a>
          </li>

          <li>
            <img src="assets/image/Maps.png">
            <a href="https://www.google.com/maps/d/u/0/viewer?mid=1Q_nXRMr-xu41sCLD1OKjX72KSmA&ll=-6.972809433104286%2C107.63522875140588&z=17"
              target="_blank">
              Alamat Telkom University
            </a>
          </li>

        </ul>
      </div>


      <div class="col-md-6">
        <h2>Get in Touch</h2>
        <ul>
          <li><i class="Maps"></i> Telkom University landmark tower Jl. Telekomunikasi Terusan Buah Batu Indonesia
            40257, Bandung, Indonesia</li>
          <li><i class="phone"></i> (123) 456-7890</li>
          <li><i class="E-mail"></i> SahabatMahasiswa@gmail.com</li>
          <li><i class="Website"></i> www.SahabatMahasiswa.com</li>
        </ul>

      </div>
    </div>

    <div class="footer-bar d-flex">
      <div class="col-md-6 text-center">
        <p>&copy; 2023 Sahabat Mahasiswa. All rights reserved.</p>
      </div>
      <div class="col-md-6 text-center">
        <p>Design and Developed by: Sirama-rama Dev</p>
      </div>
    </div>
    
</body>

</html>