@extends('layouts.frontend.index')
@section('content')
<style>
  .continue-application {
  --color: #fff;
  --background: #404660;
  --background-hover: #3A4059;
  --background-left: #2B3044;
  --folder: #F3E9CB;
  --folder-inner: #BEB393;
  --paper: #FFFFFF;
  --paper-lines: #BBC1E1;
  --paper-behind: #E1E6F9;
  --pencil-cap: #fff;
  --pencil-top: #275EFE;
  --pencil-middle: #fff;
  --pencil-bottom: #5C86FF;
  --shadow: rgba(13, 15, 25, .2);
  border: none;
  outline: none;
  cursor: pointer;
  position: relative;
  border-radius: 5px;
  font-size: 14px;
  font-weight: 500;
  line-height: 19px;
  -webkit-appearance: none;
  -webkit-tap-highlight-color: transparent;
  padding: 17px 29px 17px 69px;
  transition: background 0.3s;
  color: var(--color);
  background: var(--bg, var(--background));
}

.continue-application > div {
  top: 0;
  left: 0;
  bottom: 0;
  width: 53px;
  position: absolute;
  overflow: hidden;
  border-radius: 5px 0 0 5px;
  background: var(--background-left);
}

.continue-application > div .folder {
  width: 23px;
  height: 27px;
  position: absolute;
  left: 15px;
  top: 13px;
}

.continue-application > div .folder .top {
  left: 0;
  top: 0;
  z-index: 2;
  position: absolute;
  transform: translateX(var(--fx, 0));
  transition: transform 0.4s ease var(--fd, 0.3s);
}

.continue-application > div .folder .top svg {
  width: 24px;
  height: 27px;
  display: block;
  fill: var(--folder);
  transform-origin: 0 50%;
  transition: transform 0.3s ease var(--fds, 0.45s);
  transform: perspective(120px) rotateY(var(--fr, 0deg));
}

.continue-application > div .folder:before, .continue-application > div .folder:after,
.continue-application > div .folder .paper {
  content: "";
  position: absolute;
  left: var(--l, 0);
  top: var(--t, 0);
  width: var(--w, 100%);
  height: var(--h, 100%);
  border-radius: 1px;
  background: var(--b, var(--folder-inner));
}

.continue-application > div .folder:before {
  box-shadow: 0 1.5px 3px var(--shadow), 0 2.5px 5px var(--shadow), 0 3.5px 7px var(--shadow);
  transform: translateX(var(--fx, 0));
  transition: transform 0.4s ease var(--fd, 0.3s);
}

.continue-application > div .folder:after,
.continue-application > div .folder .paper {
  --l: 1px;
  --t: 1px;
  --w: 21px;
  --h: 25px;
  --b: var(--paper-behind);
}

.continue-application > div .folder:after {
  transform: translate(var(--pbx, 0), var(--pby, 0));
  transition: transform 0.4s ease var(--pbd, 0s);
}

.continue-application > div .folder .paper {
  z-index: 1;
  --b: var(--paper);
}

.continue-application > div .folder .paper:before, .continue-application > div .folder .paper:after {
  content: "";
  width: var(--wp, 14px);
  height: 2px;
  border-radius: 1px;
  transform: scaleY(0.5);
  left: 3px;
  top: var(--tp, 3px);
  position: absolute;
  background: var(--paper-lines);
  box-shadow: 0 12px 0 0 var(--paper-lines), 0 24px 0 0 var(--paper-lines);
}

.continue-application > div .folder .paper:after {
  --tp: 6px;
  --wp: 10px;
}

.continue-application > div .pencil {
  height: 2px;
  width: 3px;
  border-radius: 1px 1px 0 0;
  top: 8px;
  left: 105%;
  position: absolute;
  z-index: 3;
  transform-origin: 50% 19px;
  background: var(--pencil-cap);
  transform: translateX(var(--pex, 0)) rotate(35deg);
  transition: transform 0.4s ease var(--pbd, 0s);
}

.continue-application > div .pencil:before, .continue-application > div .pencil:after {
  content: "";
  position: absolute;
  display: block;
  background: var(--b, linear-gradient(var(--pencil-top) 55%, var(--pencil-middle) 55.1%, var(--pencil-middle) 60%, var(--pencil-bottom) 60.1%));
  width: var(--w, 5px);
  height: var(--h, 20px);
  border-radius: var(--br, 2px 2px 0 0);
  top: var(--t, 2px);
  left: var(--l, -1px);
}

.continue-application > div .pencil:before {
  -webkit-clip-path: polygon(0 5%, 5px 5%, 5px 17px, 50% 20px, 0 17px);
  clip-path: polygon(0 5%, 5px 5%, 5px 17px, 50% 20px, 0 17px);
}

.continue-application > div .pencil:after {
  --b: none;
  --w: 3px;
  --h: 6px;
  --br: 0 2px 1px 0;
  --t: 3px;
  --l: 3px;
  border-top: 1px solid var(--pencil-top);
  border-right: 1px solid var(--pencil-top);
}

.continue-application:before, .continue-application:after {
  content: "";
  position: absolute;
  width: 10px;
  height: 2px;
  border-radius: 1px;
  background: var(--color);
  transform-origin: 9px 1px;
  transform: translateX(var(--cx, 0)) scale(0.5) rotate(var(--r, -45deg));
  top: 26px;
  right: 16px;
  transition: transform 0.3s;
}

.continue-application:after {
  --r: 45deg;
}

.continue-application:hover {
  --cx: 2px;
  --bg: var(--background-hover);
  --fx: -40px;
  --fr: -60deg;
  --fd: .15s;
  --fds: 0s;
  --pbx: 3px;
  --pby: -3px;
  --pbd: .15s;
  --pex: -24px;
}

</style>

</div>
</header><!-- End Header -->


<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Make Ur Dream Come True </h1>
          <h2>"Ambillah risiko yang lebih besar dari apa yang dipikirkan orang lain aman. Berilah perhatian lebih dari apa yang orang lain pikir bijak. Bermimpilah lebih dari apa yang orang lain pikir masuk akal” <br>- Claude T. Bissell</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
          <button class="continue-application">
            <div>
              <div class="pencil"></div>
              <div class="folder">
                <div class="top">
                  <svg viewBox="0 0 24 27">
                    <path
                      d="M1,0 L23,0 C23.5522847,-1.01453063e-16 24,0.44771525 24,1 L24,8.17157288 C24,8.70200585 23.7892863,9.21071368 23.4142136,9.58578644 L20.5857864,12.4142136 C20.2107137,12.7892863 20,13.2979941 20,13.8284271 L20,26 C20,26.5522847 19.5522847,27 19,27 L1,27 C0.44771525,27 6.76353751e-17,26.5522847 0,26 L0,1 C-6.76353751e-17,0.44771525 0.44771525,1.01453063e-16 1,0 Z">
                    </path>
                  </svg>
                </div>
                <div class="paper"></div>
              </div>
            </div>
            <a href="{{route ('my.courses')}}" style="text-decoration:none; color:white;">Continue To Course</a>
          </button>
          </div>
        </div>

        <div class="col-lg-6 order-1 order-lg-2 hero-img ml-6" data-aos="zoom-in" data-aos-delay="200">
          <img src="/img/uni-learn.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>
  </div>

</section><!-- End Hero -->

<main id="main">

  <!-- ======= About Us Section ======= -->
  <section id="about" class="about">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>About Us</h2>
      </div>

      <div class="row content">
        <div class="col-lg-6">
          <p>
            Uni-Learn Sendiri mempunyai Kepanjangan yaitu <b>Universe Learning</b>. <b>Uni-Learn</b> merupakan aplikasi bagi para peserta baik itu mahasiswa/i maupun para murid yang berbasis web.
            Berguna untuk memudahkan mahasiswa dalam mengumpulkan tugas-tugas serta melihat dan mempelajari materi yang diberikan oleh para pengajar.
          </p>
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0">
          <p>
            Learning Management System (LMS) adalah sebuah platform digital yang dirancang khusus untuk mendukung proses
            pembelajaran, penyediaan konten pembelajaran, serta pelacakan dan penilaian kinerja peserta didik dalam suatu
            institusi atau organisasi (Watson & Watson, 2007).
          </p>
          <a href="https://suteki.co.id/pengertian-dan-manfaat-learning-management-system-lms/#:~:text=Learning%20Management%20System%20(LMS)%20adalah,Watson%20%26%20Watson%2C%202007)." class="btn-learn-more">Learn More</a>
        </div>
      </div>

    </div>
  </section><!-- End About Us Section -->

  <!-- ======= Why Us Section ======= -->
  <section id="why-us" class="why-us section-bg">
    <div class="container-fluid" data-aos="fade-up">

      <div class="row">

        <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

          <div class="content">
            <h3>Berikut beberapa keunggulan dari <strong>Universe Learning</strong></h3>
            <p>
              Dalam LMS Uni-Learn sendiri mempunyai beberapa kelebihan, yaitu antara lain :
            </p>
          </div>

          <div class="accordion-list">
            <ul>
              <li>
                <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1"><span>01</span> Kemudahan <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                  <p>
                    Mudak diakses oleh semua orang serta tampilan dan fitur yang mempermudah para peserta dan instructur
                  </p>
                </div>
              </li>

              <li>
                <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed"><span>02</span> Tersedia kelas programming serta tambahan <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                  <p>
                    Untuk kelas programer sendiri mempelajari tentang proses untuk membuat program di komputer. Program yang dibuat bisa berupa software, website, aplikasi android, dsb.
                    lalu untuk kelas tambahan sendiri dapat membantu para peserta untuk membangun karakter serta sifat mereka dalam
                    dunia kerja serta lingkungannya.
                  </p>
                </div>
              </li>

              <li>
                <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>03</span> Mempunyai instructur terpercaya <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                  <p>
                    Di Uni-learn sendiri kita mempunyai instructur yang handal di bidangnya, dan mempunyai cara mengajar yang menyenagkan untuk
                    paraa peserta nantinya.
                  </p>
                </div>
              </li>

            </ul>
          </div>

        </div>

        <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("/img/why-us.png");' data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
      </div>

    </div>
  </section><!-- End Why Us Section -->

  <!-- ======= Skills Section ======= -->
  <section id="skills" class="skills">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <div class="col-lg-6 d-flex align-items-center" data-aos="fade-right" data-aos-delay="100">
          <img src="/img/skills.png" class="img-fluid" alt="">
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left" data-aos-delay="100">
          <h3>Kelas Unggulan di Universe Learning</h3>
          <p class="fst-italic">
            Uni-Learn sendiri mempunyai beberapa kelas yang diminati oleh para peserta, berikut kelas-kelas yang mempunyai banyak peminat
            di Universe Learning.
          </p>

          <div class="skills-content">

            <div class="progress">
              <span class="skill">B. Inggris<i class="val">95%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="progress">
              <span class="skill">Pemrograman Web Dasar <i class="val">90%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="progress">
              <span class="skill">Full Stack Developer <i class="val">75%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="progress">
              <span class="skill">B. Jepang <i class="val">55%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

          </div>

        </div>
      </div>

    </div>
  </section><!-- End Skills Section -->



  <!-- ======= Cta Section ======= -->
  <section id="cta" class="cta">
    <div class="container" data-aos="zoom-in">

      <div class="row">
        <div class="col-lg-9 text-center text-lg-start">
          <h3>Ayo Bergabung dalam Dunia Programming</h3>
          <p> Nikmati perjalanan belajar pemrograman yang penuh tantangan, di mana setiap kode yang kita tulis membuka pintu baru menuju pengetahuan yang mendalam. Bersama-sama, kita bangun keterampilan yang memungkinkan kita untuk menciptakan teknologi masa depan.</p>
        </div>
      </div>

    </div>
  </section><!-- End Cta Section -->

  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Kelas Populer</h2>
        <p>Pada proyek ini, kami membuat sebuah Learning Management System (LMS) yang dirancang khusus untuk memfasilitasi proses pembelajaran online. LMS ini menyediakan platform yang intuitif dan responsif untuk memungkinkan pengguna, baik guru maupun siswa, mengakses, mengelola, dan berpartisipasi dalam pembelajaran jarak jauh.</p>
      </div>

      <ul id="portfolio-flters" class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
        <li data-filter="*" class="filter-active">All</li>
        <li data-filter=".filter-app">Kelas Umum</li>
        <li data-filter=".filter-web">Kelas Programmer</li>
        <li data-filter=".filter-card">Kelas Tambahan</li>
      </ul>

      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-img"><img src="/img/portfolio/course-1.png" class="img-fluid" alt=""></div>
          <div class="portfolio-info">
            <h4>B.Inggris</h4>
            <p>Kelas Umum</p>
            <a href="/img/portfolio/course-1.png" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="B.Inggris"></a>
            <a href="" class="details-link" title="More Details"></a>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
          <div class="portfolio-img"><img src="/img/portfolio/course-2.png" class="img-fluid" alt=""></div>
          <div class="portfolio-info">
            <h4>Ful Stack Developer</h4>
            <p>Kelas Programmer</p>
            <a href="/img/portfolio/course-2.png" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Ful Stack Developer"></a>
            <a href="" class="details-link" title="More Details"></a>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-img"><img src="/img/portfolio/course-3.jpg" class="img-fluid" alt=""></div>
          <div class="portfolio-info">
            <h4>B.Jepang</h4>
            <p>Kelas Umum</p>
            <a href="/img/portfolio/course-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="B.Jepang"></a>
            <a href="" class="details-link" title="More Details"></a>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
          <div class="portfolio-img"><img src="/img/portfolio/course-4.jpg" class="img-fluid" alt=""></div>
          <div class="portfolio-info">
            <h4>Pemrograman Web Dasar</h4>
            <p>Kelas Programmer</p>
            <a href="/img/portfolio/course-4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 2"></i></a>
            <a href="" class="details-link" title="More Details"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-card">
          <div class="portfolio-img"><img src="/img/portfolio/course-5.jpg" class="img-fluid" alt=""></div>
          <div class="portfolio-info">
            <h4>Critical Thinking</h4>
            <p>Kelas Tambahan</p>
            <a href="/img/portfolio/course-5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 2"></i></a>
            <a href="" class="details-link" title="More Details"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-card">
          <div class="portfolio-img"><img src="/img/portfolio/course-6.png" class="img-fluid" alt=""></div>
          <div class="portfolio-info">
            <h4>Communication</h4>
            <p>Kelas Tambahan</p>
            <a href="/img/portfolio/course-6.png" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 3"></i></a>
            <a href="" class="details-link" title="More Details"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
          <div class="portfolio-img"><img src="/img/portfolio/course-7.jpg" class="img-fluid" alt=""></div>
          <div class="portfolio-info">
            <h4>Laravel</h4>
            <p>Kelas Programmer</p>
            <a href="/img/portfolio/course-7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 1"></i></a>
            <a href="" class="details-link" title="More Details"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
          <div class="portfolio-img"><img src="/img/portfolio/course-8.jpg" class="img-fluid" alt=""></div>
          <div class="portfolio-info">
            <h4>HTML dan CSS</h4>
            <p>Kelas Programmer</p>
            <a href="/img/portfolio/course-8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 3"></i></a>
            <a href="" class="details-link" title="More Details"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-card">
          <div class="portfolio-img"><img src="/img/portfolio/course-9.jpeg" class="img-fluid" alt=""></div>
          <div class="portfolio-info">
            <h4>Collaboration</h4>
            <p>Kelas Tambahan</p>
            <a href="/img/portfolio/course-9.jpeg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"></i></a>
            <a href="" class="details-link" title="More Details"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-img"><img src="/img/portfolio/course-10.jpeg" class="img-fluid" alt=""></div>
          <div class="portfolio-info">
            <h4>Pendidikan Pancasila</h4>
            <p>Kelas Umum</p>
            <a href="/img/portfolio/course-10.jpeg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"></i></a>
            <a href="" class="details-link" title="More Details"></i></a>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Portfolio Section -->

  <!-- ======= Team Section ======= -->
  <section id="team" class="team section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Team</h2>
        <p>Berikut Team pembuatan dari Universe Learning</p>
      </div>

      <div class="row">

        <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
          <div class="member d-flex align-items-start">
            <div class="pic"><img src="/img/team/Anggit.png" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Muhammad Anggit Pamungkas</h4>
              <span>Team Leader Projek</span>
              <p>kamu mah terlalu gangster untuk aku yang gemeter, kumaha barudak <b>SIKATTT</b></p>
              <div class="social">
                <a href="https://twitter.com/Anggit_13"><i class="ri-twitter-fill"></i></a>
                <a href="https://www.facebook.com/profile.php?id=61554833111451"><i class="ri-facebook-fill"></i></a>
                <a href="https://www.instagram.com/manggit5/"><i class="ri-instagram-fill"></i></a>
                <a href="https://www.linkedin.com/in/muhammad-anggit-b83772262/"> <i class="ri-linkedin-box-fill"></i> </a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6 mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="200">
          <div class="member d-flex align-items-start">
            <div class="pic"><img src="/img/team/Adi.png" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Adi Kusuma</h4>
              <span>Wakil Projek</span>
              <p>menggapai mimpi itu mudah asal anda tertidur</p>
              <div class="social">
                <a href=""><i class="ri-twitter-fill"></i></a>
                <a href=""><i class="ri-facebook-fill"></i></a>
                <a href=""><i class="ri-instagram-fill"></i></a>
                <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6 mt-4" data-aos="zoom-in" data-aos-delay="300">
          <div class="member d-flex align-items-start">
            <div class="pic"><img src="/img/team/Fadilah.png" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Fadhilah Bimantoro</h4>
              <span>Team Member Projects</span>
              <p>Manusia Tidak Perlu Kata-kata Mutiara</p>
              <div class="social">
                <a href=""><i class="ri-twitter-fill"></i></a>
                <a href=""><i class="ri-facebook-fill"></i></a>
                <a href="https://www.instagram.com/fbimant11/"><i class="ri-instagram-fill"></i></a>
                <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6 mt-4" data-aos="zoom-in" data-aos-delay="400">
          <div class="member d-flex align-items-start">
            <div class="pic"><img src="/img/team/Anam.png" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Nurul Anam</h4>
              <span>Team Member Projects</span>
              <p>Diam dan Buktikan</p>
              <div class="social">
                <a href=""><i class="ri-twitter-fill"></i></a>
                <a href=""><i class="ri-facebook-fill"></i></a>
                <a href="https://www.instagram.com/nhurulanam/"><i class="ri-instagram-fill"></i></a>
                <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
              </div>
            </div>
          </div>
        </div>


        <div class="col-lg-6 mt-4 container" data-aos="zoom-in" data-aos-delay="500">
          <div class="member d-flex align-items-start">
            <div class="pic"><img src="/img/team/Seiya.png" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>Seiya Inzu Saputra</h4>
              <span>Team Member Projects</span>
              <p>Bangun dan Semangat</p>
              <div class="social">
                <a href=""><i class="ri-twitter-fill"></i></a>
                <a href=""><i class="ri-facebook-fill"></i></a>
                <a href=""><i class="ri-instagram-fill"></i></a>
                <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
              </div>
            </div>
          </div>
        </div>


      </div>

    </div>
  </section><!-- End Team Section -->

  

  <!-- ======= Bagian Pertanyaan yang Sering Diajukan ======= -->
  <section id="faq" class="faq section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Pertanyaan yang Sering Diajukan</h2>
        <p>Temukan jawaban untuk pertanyaan umum tentang kelas-kelas kami.</p>
      </div>

      <div class="faq-list">
        <ul>

          <!-- FAQ untuk Kelas Pemrograman -->
          <li data-aos="fade-up" data-aos-delay="100">
            <i class="bx bx-help-circle icon-help"></i>
            <a data-bs-toggle="collapse" data-bs-target="#faq-pemrograman" class="collapse">Bahasa pemrograman apa yang diajarkan di kelas pemrograman? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
            <div id="faq-pemrograman" class="collapse" data-bs-parent=".faq-list">
              <p>Kami menawarkan kelas yang mencakup berbagai bahasa pemrograman, termasuk namun tidak terbatas pada Java, Python, JavaScript, dan C++. Bahasa-bahasa tertentu yang diajarkan dapat bervariasi berdasarkan kursus dan tingkat.</p>
            </div>
          </li>

          <!-- FAQ untuk Kelas Umum -->
          <li data-aos="fade-up" data-aos-delay="200">
            <i class="bx bx-help-circle icon-help"></i>
            <a data-bs-toggle="collapse" data-bs-target="#faq-umum" class="collapsed">Mata pelajaran apa yang diajarkan di kelas umum? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
            <div id="faq-umum" class="collapse" data-bs-parent=".faq-list">
              <p>Kelas umum mencakup berbagai mata pelajaran, termasuk matematika, sains, bahasa, dan studi sosial. Tujuannya adalah menyediakan pendidikan yang menyeluruh bagi siswa.</p>
            </div>
          </li>

          <!-- FAQ untuk Kelas Tambahan -->
          <li data-aos="fade-up" data-aos-delay="300">
            <i class="bx bx-help-circle icon-help"></i>
            <a data-bs-toggle="collapse" data-bs-target="#faq-tambahan" class="collapsed">Apa tujuan dari kelas tambahan, dan bagaimana perbedaannya dengan kelas reguler? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
            <div id="faq-tambahan" class="collapse" data-bs-parent=".faq-list">
              <p>Kelas tambahan dirancang untuk memberikan dukungan ekstra atau konten lanjutan berdasarkan kebutuhan siswa. Ini mungkin mencakup topik yang tidak termasuk dalam kelas reguler atau memberikan latihan dan pengayaan tambahan.</p>
            </div>
          </li>

          <!-- FAQ untuk Kelas Jadwal -->
          <li data-aos="fade-up" data-aos-delay="400">
            <i class="bx bx-help-circle icon-help"></i>
            <a data-bs-toggle="collapse" data-bs-target="#faq-jadwal" class="collapsed">Bagaimana cara melihat jadwal kelas saya? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
            <div id="faq-jadwal" class="collapse" data-bs-parent=".faq-list">
              <p>Anda dapat melihat jadwal kelas Anda dengan masuk ke platform online kami atau mengunjungi halaman jadwal di situs web sekolah. Informasi terkait jadwal, ruangan, dan pengajar akan tersedia di sana.</p>
            </div>
          </li>

          <!-- FAQ untuk Materi Tambahan -->
          <li data-aos="fade-up" data-aos-delay="500">
            <i class="bx bx-help-circle icon-help"></i>
            <a data-bs-toggle="collapse" data-bs-target="#faq-materi" class="collapsed">Apakah ada materi tambahan yang dapat diakses secara online? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
            <div id="faq-materi" class="collapse" data-bs-parent=".faq-list">
              <p>Iya, materi tambahan dapat diakses secara online melalui platform pembelajaran kami. Kami menyediakan sumber daya tambahan, tugas, dan materi pendukung untuk membantu siswa memahami dan mendalami materi yang diajarkan di kelas.</p>
            </div>
          </li>


        </ul>
      </div>

    </div>
  </section>
  <!-- Akhir Bagian Pertanyaan yang Sering Diajukan -->


</main><!-- End #main -->


<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="/vendor/aos/aos.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/vendor/glightbox/js/glightbox.min.js"></script>
<script src="/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="/vendor/swiper/swiper-bundle.min.js"></script>
<script src="/vendor/waypoints/noframework.waypoints.js"></script>
<script src="/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="/js/main.js"></script>
<script>
  // Used to toggle the menu on small screens when clicking on the menu button
  function myFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
      x.className += " w3-show";
    } else {
      x.className = x.className.replace(" w3-show", "");
    }
  }

</script>

</body>

</html>
@endsection
