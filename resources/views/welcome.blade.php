<!DOCTYPE html>
<html lang="en">

<head>
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
  
  <title>Cuitandosen.com</title>
  
  <!-- Bootstrap core CSS -->
  <link href="{{asset('template/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  
  <!--
    
    TemplateMo 570 Chain App Dev
    
    https://templatemo.com/tm-570-chain-app-dev
    
  -->
  
  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('template/assets/css/templatemo-chain-app-dev.css')}}">
  <link rel="stylesheet" href="{{asset('template/assets/css/animated.css')}}">
  <link rel="stylesheet" href="{{asset('template/assets/css/owl.css')}}">
  
  <link rel="stylesheet" href="{{asset('OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css')}}">
  
</head>

<body>
  
  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->
  
  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.html" class="logo">
              <img src="{{asset('img/cuitan.png')}}" style="height: 100px" alt="">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
              <li class="scroll-to-section"><a href="#tentang">About</a></li>
              <li class="scroll-to-section"><a href="#services">Keunggulan</a></li>
              <li class="scroll-to-section"><a href="#clients">Testimoni</a></li>
              <li class="scroll-to-section"><a href="#pricing">Paket</a></li>
              <li><div class="gradient-button"><a id="modal_trigger" href="{{route('login')}}"><i class="fa fa-sign-in-alt"></i> Masuk</a></div></li> 
            </ul>        
            <a class='menu-trigger'>
              <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->
  
  <div id="modal" class="popupContainer" style="display:none;">
    <div class="popupHeader">
      <span class="header_title">Login</span>
      <span class="modal_close"><i class="fa fa-times"></i></span>
    </div>
    
    <section class="popupBody">
      <!-- Social Login -->
      <div class="social_login">
        <div class="">
          <a href="#" class="social_box fb">
            <span class="icon"><i class="fab fa-facebook"></i></span>
            <span class="icon_title">Connect with Facebook</span>
            
          </a>
          
          <a href="#" class="social_box google">
            <span class="icon"><i class="fab fa-google-plus"></i></span>
            <span class="icon_title">Connect with Google</span>
          </a>
        </div>
        
        <div class="centeredText">
          <span>Or use your Email address</span>
        </div>
        
        <div class="action_btns">
          <div class="one_half"><a href="#" id="login_form" class="btn">Login</a></div>
          <div class="one_half last"><a href="#" id="register_form" class="btn">Sign up</a></div>
        </div>
      </div>
      
      <!-- Username & Password Login form -->
      <div class="user_login">
        <form>
          <label>Email / Username</label>
          <input type="text" />
          <br />
          
          <label>Password</label>
          <input type="password" />
          <br />
          
          <div class="checkbox">
            <input id="remember" type="checkbox" />
            <label for="remember">Remember me on this computer</label>
          </div>
          
          <div class="action_btns">
            <div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>
            <div class="one_half last"><a href="#" class="btn btn_red">Login</a></div>
          </div>
        </form>
        
        <a href="#" class="forgot_password">Forgot password?</a>
      </div>
      
      <!-- Register Form -->
      <div class="user_register">
        <form>
          <label>Full Name</label>
          <input type="text" />
          <br />
          
          <label>Email Address</label>
          <input type="email" />
          <br />
          
          <label>Password</label>
          <input type="password" />
          <br />
          
          <div class="checkbox">
            <input id="send_updates" type="checkbox" />
            <label for="send_updates">Send me occasional email updates</label>
          </div>
          
          <div class="action_btns">
            <div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>
            <div class="one_half last"><a href="#" class="btn btn_red">Register</a></div>
          </div>
        </form>
      </div>
    </section>
  </div>
  
  <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <div class="row">
                  <div class="col-lg-12">
                    <h2>Temukan Suksesmu di cuitandosen.com</h2>
                    <p>Layanan Bimbel Terbaik untuk Seleksi CPNS dan PPPK Dosen, PPPKGURU dan Umum</p>
                  </div>
                  <div class="col-lg-12">
                    <div class="btn btn-lg red-button first-button scroll-to-section">
                      <a class="text-white" href="{{route('login')}}">Login </a>
                    </div>
                    <div class="btn btn-lg red-button scroll-to-section">
                      <a class="text-white" href="{{route('register')}}">Daftar </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-imagei wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="{{asset('img/header6.png')}}" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="tentang section" id="tentang">
    <div class="container">
      <div class="row">
        <div class="section-heading">
        </div>
        <div class="col-lg-4">
          <img src="{{asset('template/assets/images/slider-dec.png')}}" class="img-fluid bound-height" alt="">
        </div>
        <div class="col-lg-8 ">
          <div class="section-heading pe-5">
            <h4 class="tentang-title" style="display: inline-block;">Tentang</h4>
            <img src="{{ asset('img/cuitan.png') }}" style="display: inline-block; height: 150px !important; width: auto;" alt="">
            
            <p class="pe-5 lead">Cuitandosen berkomitmen untuk membantu calon ASN dalam mewujudkan mimpi mereka. Kami memahami masalah dan kendala belajar yang dialami pejuang ASN selama ini.
              
              Dengan materi pembelajaran kami yang komprehensif dan selalu <em>up-to-date</em> serta harga terjangkau, kami harap akan semakin banyak calon ASN yang dapat mengejar cita-citanya</p>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    
    <div id="services" class="services section">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 offset-lg-2">
            <div class="section-heading  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
              <h4>Keunggulan Belajar Bersama <em>Cuitandosen</em></h4>
              <img src="{{asset('template/assets/images/heading-line-dec.png')}}" alt="">
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <div class="service-item first-service">
              <div class="icon"></div>
              <h4>Kemudahan Akses Belajar</h4>
              <p>Dapatkan akses kemudahan belajar dengan Cuitandosen dari gadget manapun.</p>
              <div class="text-button">
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="service-item second-service">
              <div class="icon"></div>
              <h4>Kisi-Kisi Terupdate</h4>
              <p>Modul pembelajaran kami selalu menyesuaikan dengan kisi-kisi terupdate</p>
              <div class="text-button">
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="service-item third-service">
              <div class="icon"></div>
              <h4>Latihan Soal dengan Sistem CAT</h4>
              <p>Kami menyediakan Latihan soal dengan sistem CAT lengkap dengan <em>timer</em></p>
              <div class="text-button">
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="service-item fourth-service">
              <div class="icon"></div>
              <h4>Evaluasi & Pembahasan</h4>
              <p>Setelah selesai mengerjakan soal, cek jawabanmu dengan pembahasan yang sudah kami sediakan</p>
              <div class="text-button">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    
    
    <div id="about" class="about-us section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 align-self-center">
            <div class="section-heading">
              <h4>Apa Saja yang Kami <em>Sediakan?</em></h4>
              <img src="{{asset('template/assets/images/heading-line-dec.png')}}" alt="">
              <p>Setelah kamu mendaftar dan membeli paket kami, konten berikut akan bisa kamu akses</p>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="box-item">
                  <h4><a href="#">Video Learning</a></h4>
                  <p>Materi video berupa Rekaman Zoom sudah kami sediakan, agar kamu lebih mudah paham</p>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="box-item">
                  <h4><a href="#"><em>Tryout</em>/ Latihan Soal</a></h4>
                  <p>Latihan soal kami menggunakan sistem CAT, dan dibuat semirip mungkin dengan tes sebenarnya</p>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="box-item">
                  <h4><a href="#">Materi Pembelajaran</a></h4>
                  <p>Materi bacaan untuk memantapkan pemahaman kamu</p>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="box-item">
                  <h4><a href="#">Paket Pembahasan</a></h4>
                  <p>Tiap latihan soal memiliki evaluasi pembahasan yg lengkap dan komprehensif</p>
                </div>
              </div>
              {{-- <div class="col-lg-12">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eismod tempor idunte ut labore et dolore adipiscing  magna.</p>
                <div class="gradient-button">
                  <a href="#">Start 14-Day Free Trial</a>
                </div>
                <span>*No Credit Card Required</span>
              </div> --}}
            </div>
          </div>
          <div class="col-lg-6">
            <div class="right-image">
              <img src="{{asset('template/assets/images/about-right-dec.png')}}" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div id="clients" class="the-clients">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 offset-lg-2">
            <div class="section-heading">
              <h4>Apa Kata Mereka yang Sudah <em>Bergabung?</em></h4>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="naccs">
              <div class="grid">
                <div class="row owl-carousel">
                  <div class="col-lg-12">
                    <ul class="nacc">
                      <li class="active">
                        <div>
                          <div class="thumb">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="client-content">
                                  <img src="{{asset('template/assets/images/quote.png')}}" alt="">
                                  <p class="text">“Selama mengikuti bimbel privat banyak benefits didapat untuk bekal dalam menghadapi tes. Pembelajaran tentang bagaimana menghadapi SKD, SKB, baik tes wawancara dan praktek micro teaching diulas secara lengkap tipsnya dari praktisi langsung yang telah berpengalaman, sehingga mudah dipahami peserta. Secara keseluruhan ikut bimbel privat sangat direkomendasikan”
                                  </p>
                                  <span class="more-btn" style="cursor: pointer; color:yellow">....selengkapnya</span>
                                </div>
                                <div class="down-content">
                                  <img src="{{asset('img/testi/testi2.png')}}" alt="">
                                  <div class="right-content">
                                    <h4>Alfan Dzikria Nurrachman, S.H., M.H.</h4>
                                    <span>PNS Dosen Kemdikbudristek </span><br>
                                    <span>Prodi Ilmu Hukum - Universitas Negeri Surabaya (UNESA)</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>  
                  <div class="col-lg-12">
                    <ul class="nacc">
                      <li class="active">
                        <div>
                          <div class="thumb">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="client-content">
                                  <img src="{{asset('template/assets/images/quote.png')}}" alt="">
                                  <p class="text">“Jadii awalnya saya gak sengaja menemukan akun Bu Riska d YouTube. .. karena basic saya ibu rumah tangga, belum pernah kerja sebelumnya, belum pernah jd dosen, belum ada pengalaman microteaching dan wawancara, akhirnya saya memilih les privat dengan Bu Riska utk persiapan microteaching dan wawancara CPNS dosen.. ketika les, Alhamdulillah saya d beri banyak informasi, pengetahuan, bagaimana kita bisa perform yg maksimal dihadapan dosen penguji, d beri tips dan trik, dll. Alhamdulillah saya lolos peringkat 1 di formasi saya, yg sebelumnya saya selalu insecure sama diri saya, dimana pesaing2 saya sudah berpengalaman dibidangnya. Alhamdulillah atas ijin Allah saya dipertemukan oleh Bu Riska.. semoga Bu Riska sukses selalu yaaa. Terima kasih banyak Bu Riska”
                                  </p>
                                  <span class="more-btn" style="cursor: pointer; color:yellow">....selengkapnya</span>
                                </div>
                                <div class="down-content">
                                  <img src="{{asset('img/testi/testi1.png')}}" alt="">
                                  <div class="right-content">
                                    <h4>Wida Aristanti S.AP., M.AP</h4>
                                    <span>PNS Dosen Kemdikbudristek</span><br>
                                    <span>Administrasi Perkantoran - Universitas Negeri Jakarta</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>         
                  <div class="col-lg-12">
                    <ul class="nacc">
                      <li class="active">
                        <div>
                          <div class="thumb">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="client-content">
                                  <img src="{{asset('template/assets/images/quote.png')}}" alt="">
                                  <p class="text">“Ikut Bimbel Privat sebelum menghadapi micro teaching pada seleksi SKB Kemenag 2023 di mbak Riska benar-benar sangat memotivasi dan membuat saya percaya diri. Tips dan trik yang diberikan sangat- sangat membantu. Terima kasih Coach Riska”
                                  </p>
                                  <span class="more-btn" style="cursor: pointer; color:yellow">....selengkapnya</span>
                                </div>
                                <div class="down-content">
                                  <img src="{{asset('img/testi/testi3.png')}}" alt="">
                                  <div class="right-content">
                                    <h4>Dian Pujiatma Vera Subchanifa, M.Sc.</h4>
                                    <span>Dosen PNS Kementerian Agama</span><br>
                                    <span>Ilmu Ekonomi - IAIN Kudus</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div> 
                  <div class="col-lg-12">
                    <ul class="nacc">
                      <li class="active">
                        <div>
                          <div class="thumb">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="client-content">
                                  <img src="{{asset('template/assets/images/quote.png')}}" alt="">
                                  <p class="text">“Alhamdulillah,berkat ikut bimbel di kak Riska saya jadi lebih percaya diri dalam tes wawancara kemarin karena materi yang diajarkan kak Riska hampir sama dengan apa yang ditanyakan saat wawancara. Beliau jg mengajarkan cara menjawab yang baik bagaimana sehingga kita lebih siap dalam ujian.”
                                  </p>
                                  <span class="more-btn" style="cursor: pointer; color:yellow">....selengkapnya</span>
                                </div>
                                <div class="down-content">
                                  <img src="{{asset('img/testi/testi4.png')}}" alt="">
                                  <div class="right-content">
                                    <h4>Hardiyanti S.Pd., M.Pd</h4>
                                    <span>PNS Dosen Kemdikbudristek</span><br>
                                    <span>Prodi PGSD - Universitas Negeri Makassar</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div> 
                  <div class="col-lg-12">
                    <ul class="nacc">
                      <li class="active">
                        <div>
                          <div class="thumb">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="client-content">
                                  <img src="{{asset('template/assets/images/quote.png')}}" alt="">
                                  <p class="text">“Sangat membantu dengan pengalaman coachnya terutama dalam mempersipkan wawancara dan microteacing yang sangat detail banget, dari mulai persiapan bahan sampai kita simulasi sehingga ada gambaran ketika tes, membantu juga dalam mempersiapkan mental ketika ujian, alhamdulillah hasilnya saya bisa maksimal dikedua tes tersebut dan finaly saya lulus cpns dosen. Rekomendasi pakee baget bimbel sama coach riska bagi temen2 yg ingin menjadi cpns dosen.”
                                  </p>
                                  <span class="more-btn" style="cursor: pointer; color:yellow">....selengkapnya</span>
                                </div>
                                <div class="down-content">
                                  <img src="{{asset('img/testi/testi5.png')}}" alt="">
                                  <div class="right-content">
                                    <h4>Yoghi Arief Susanto, S.H, M.H</h4>
                                    <span>Dosen PNS Kemdikbudristek</span><br>
                                    <span>Program Studi Ilmu Hukum - Universitas Diponegoro</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div> 
					<div class="col-lg-12">
                    <ul class="nacc">
                      <li class="active">
                        <div>
                          <div class="thumb">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="client-content">
                                  <img src="{{asset('template/assets/images/quote.png')}}" alt="">
                                  <p class="text">“Sangat senang awalnya ketemu mbak Rina via youtube dan menurutku salah satu guru yang sangat mengarahkan”
                                  </p>
                                  <span class="more-btn" style="cursor: pointer; color:yellow">....selengkapnya</span>
                                </div>
                                <div class="down-content">
                                  <img src="{{asset('img/testi/testi6.PNG')}}" alt="">
                                  <div class="right-content">
                                    <h4>Dominikus Andreo Maryadi M.Ak</h4>
                                    <span></span><br>
                                    <span>Prodi Akuntansi Keuangan  - Politeknik Negeri Manado</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div> 
					<div class="col-lg-12">
                    <ul class="nacc">
                      <li class="active">
                        <div>
                          <div class="thumb">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="client-content">
                                  <img src="{{asset('template/assets/images/quote.png')}}" alt="">
                                  <p class="text">“Terima kasih banyak Mbak Riska alhamdulillah akhirnya saya Lolos CPNS Formasi Dosen Tahun 2023. Senang sekali bisa banyak belajar dari Mbak Riska meski secara online. Banyak insight dan wawasan sebagai bekal saya berjuang di Tes SKB CPNS Dosen. Mbak Riska sangat baik mengajarnya, telaten, dan sabar banget. Pokoknya terbaik ❤🥺”
                                  </p>
                                  <span class="more-btn" style="cursor: pointer; color:yellow">....selengkapnya</span>
                                </div>
                                <div class="down-content">
                                  <img src="{{asset('img/testi/testi7.PNG')}}" alt="">
                                  <div class="right-content">
                                    <h4>Zahro Rokhmawati, M.Pd</h4>
                                    <span></span><br>
                                    <span>Prodi Linguistik Indonesia - UPN Veteran Jawa Timur</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div> 
					<div class="col-lg-12">
                    <ul class="nacc">
                      <li class="active">
                        <div>
                          <div class="thumb">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="client-content">
                                  <img src="{{asset('template/assets/images/quote.png')}}" alt="">
                                  <p class="text">“Maa syaa Allah tabarakallah banget ikut privat sama coach riska. Ilmu nyaa, cara penyampaiannya, cara ngejawab pertanyaannya bener2 tertata rapi, mudah dimengerti. Banyak hal yang belum saya tau sebelum kenal coach riska dan ikut privat sama coach riska jadii tauu, faham, dan mengerti. Alhamdulillah, selain dari kehendak Allah, dari perantara coach riska saya bisa lancar mempersiapkan SKB WW dan MT. Terima kasih coach😊”
                                  </p>
                                  <span class="more-btn" style="cursor: pointer; color:yellow">....selengkapnya</span>
                                </div>
                                <div class="down-content">
                                  <img src="{{asset('img/testi/testi8.PNG')}}" alt="">
                                  <div class="right-content">
                                    <h4>Nabila Afifah Azuga, S.Pi.,M.Si.</h4>
                                    <span></span><br>
                                    <span>Prodi Ilmu kelautan - Universitas Riau</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div> 
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
    
    <div id="pricing" class="pricing-tables" style="min-height: 800px">
      <div class="container">
        <div class="row" >
          <div class="col-lg-8 offset-lg-2">
            <div class="section-heading">
              <h4>Paket Belajar</h4>
              <img src="{{asset('template/assets/images/heading-line-dec.png')}}" alt="">
            </div>
            <div class="row justify-content-center mb-3">
              <div class="d-flex justify-content-center">
                <div class="bg-light p-2 rounded">
                  <button class="btn fw-bold" id="button-skd">SKB</button>
                  <button class="ms-2 btn btn-outline-primary fw-bold" id="button-skb">Paket Lainnya</button>
                </div>
              </div>
            </div>
            
          </div>
          
        </div>
        <div class="row" id="skd-list">
          
          <div class="col-lg-4">
            <div class="pricing-item-pro">
              <span class="price"> 0</span>
              <h4>GRATIS</h4>
              <div class="icon">
                <img src="{{asset('template/assets/images/pricing-table-01.png')}}" alt="">
              </div>
              <ul>
                <li>Akses Tryout Gratis</li>
                <li class="non-function">3 Tryout Premium</li>
                <li class="non-function">Kunci Jawaban & Pembahasan Tryout</li>
                <li class="non-function">Latihan Soal dengan Sistem CAT</li>
                <li class="non-function">Masa Berlaku 12 Bulan</li>
				  <li class="non-function">Materi SKB Terupdate</li>
              </ul>
              <div class="border-button">
                <a href="{{route('register')}}" class="btn btn-primary">Daftar Sekarang</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="pricing-item-pro">
              <span class="price"> 100K</span>
              <h4>PAKET TRYOUT</h4>
              <div class="icon">
                <img src="{{asset('template/assets/images/pricing-table-01.png')}}" alt="">
              </div>
              <ul>
                <li>Akses Tryout Gratis</li>
                <li>3 Tryout Premium</li>
                <li>Kunci Jawaban & Pembahasan Tryout</li>
                <li>Latihan Soal dengan Sistem CAT</li>
                <li>Masa Berlaku 12 Bulan</li>
				  <li class="non-function">Materi SKB Terupdate</li>
              </ul>
              <div class="border-button">
                <a href="{{url('beli-paket/2')}}" class="btn btn-primary">Beli Paket</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="pricing-item-pro">
              <span class="price"> 210K</span>
              <h4>PAKET BIMBEL</h4>
              <div class="icon">
                <img src="{{asset('template/assets/images/pricing-table-01.png')}}" alt="">
              </div>
              <ul>
                <li>Akses Tryout Gratis</li>
                <li>2 Tryout Premium</li>
                <li>Kunci Jawaban & Pembahasan Tryout</li>
                <li>Materi SKB Terupdate</li>
                <li>Latihan Soal dengan Sistem CAT</li>
                <li>Masa Berlaku 12 Bulan</li>
              </ul>
              <div class="border-button">
                <a href="{{url('beli-paket/1')}}" class="btn btn-primary">Beli Paket</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      
       <div class="row mt-2 justify-content-start d-none" id="skb-list">
        <div class="col-lg-8 offset-lg-2">
          <div class="row">
            @foreach ($bimbel as $mn)
            <div class="col-lg-4">
              <div class="border bg-white rounded p-4 mt-2">
                <div class="row">
                  <div class="col-lg-2 col-icon rounded">
                    <i class="fas fa-box fa-2x text-blue"></i>
                  </div>
                  <div class="col-lg-10">
                    <a href="{{url('beli-paket/'.$mn->id)}}">
                      {{$mn->nama}}
                    </a>
                  </div>
                </div>
              </div>
            </div> 
            @endforeach
          </div>
        </div>
      </div> 
      
    {{--   <div class="row mt-2 justify-content-start d-none" id="bimbel-list">
        <div class="col-lg-8 offset-lg-2">
          <div class="row">
            @foreach ($bimbel as $bb)
            <div class="col-lg-4">
              <div class="border bg-white rounded p-4 mt-2">
                <div class="row">
                  <div class="col-lg-2 col-icon rounded">
                    <i class="fas fa-box fa-2x text-blue"></i>
                  </div>
                  <div class="col-lg-10">
                    <a href="{{url('beli-paket/'.$bb->id)}}">
                      {{$bb->nama}}
                    </a>
                  </div>
                </div>
              </div>
            </div> 
            @endforeach
            
          </div>
          
          
        </div>
        
      </div> --}}
    </div>
    
    <div id="clientso" class="the-clients">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 offset-lg-2">
            <div class="section-heading">
              <h4>Yuk Kenalan dengan <em>CEO</em> cuitandosen.com</h4>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="naccs">
              <div class="grid">
                <div class="row">
                  <div class="col-lg-12">
                    <ul class="nacc">
                      <li class="active">
                        <div>
                          <div class="thumb">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="client-contento">
                                  <img src="{{asset('template/assets/images/quote.png')}}" alt="">
                                  <p>“Telah banyak yang mengikuti bimbel yang diajarkan dengan konsep yang detail dan persiapan yang matang dengan try out yang HOTS. Begabunglah bersama kami”
                                  </p>
                                </div>
                                <div class="down-content">
                                  <img src="{{asset('img/testi/testiceo.png')}}" alt="">
                                  <div class="right-content">
                                    <h4>Riska Sarofah</h4>
                                    <span>CEO cuitandosen.com  </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>  
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div> 
  
  <footer id="newsletter">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2 mb-5">
          <div class="section-heading">
            <h4>Hubungin Admin Via WA: 088238049508</h4>
          </div>
        </div>
        <div class="col-lg-6 offset-lg-3">
          {{--  <form id="search" action="#" method="GET">
            <div class="row">
              <div class="col-lg-6 col-sm-6">
                <fieldset>
                  <input type="address" name="address" class="email" placeholder="Email Address..." autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-6 col-sm-6">
                <fieldset>
                  <button type="submit" class="main-button">Subscribe Now <i class="fa fa-angle-right"></i></button>
                </fieldset>
              </div> 
            </div>
          </form> --}}
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <div class="footer-widget">
            <h4>Contact Us</h4>
            <p>YouTube: @cuitandosen</p>
            <p><a href="#">WA: 088238049508</a></p>
            <p><a href="#">Email: ciutandosen@gmail.com</a></p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="footer-widget">
            <h4>Useful Links</h4>
            <ul>
              <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
              <li class="scroll-to-section"><a href="#tentang">About</a></li>
              <li class="scroll-to-section"><a href="#services">Keunggulan</a></li>
              <li class="scroll-to-section"><a href="#clients">Testimoni</a></li>
              <li class="scroll-to-section"><a href="#pricing">Paket</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="footer-widget">
            <h4 style="margin-bottom: 0 !important">About Our Company</h4>
            <img src="{{asset('img/cuitan.png')}}" style="height: 150px; width:auto" alt="">
            <p>Platform bimbel seleksi CPNS dan PPPK</p>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="copyright-text">
            <p>Copyright © 2024 cuitandosen.com. All Rights Reserved. 
              <br>Publish & Work by: <a href="https://eda.co.id/" target="_blank" title="css templates">CV. Eksa Digital Agency</a>
              <br>Design: <a href="https://templatemo.com/" target="_blank" title="css templates">TemplateMo</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <div class="icon-container">
    <button class="btn btn-light mb-3 me-3 text-dark" style="background-color: #f8f9fa !important;border: 2px solid rgba(0, 0, 0, 0.25);">Hai Kak, perlu info lebih lanjut? Klik di sini!</button><a href="https://wa.me/6288238049508"><i class="fab fa-whatsapp fa-2x"></i></a>
  </div>
  
  <!-- Scripts -->
  <script src="{{asset('template/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('template/assets/js/owl-carousel.js')}}"></script>
  <script src="{{asset('template/assets/js/animation.js')}}"></script>
  <script src="{{asset('template/assets/js/imagesloaded.js')}}"></script>
  <script src="{{asset('template/assets/js/popup.js')}}"></script>
  <script src="{{asset('template/assets/js/custom.js')}}"></script>
  <script src="{{asset('OwlCarousel2-2.3.4/dist/owl.carousel.min.js')}}"></script>
  <script>
    $(document).ready(function(){
      $(".owl-carousel").owlCarousel({
        loop:true,
        margin:10,
        nav: false,
        items: 3,
        autoplay:2000
      });
      
      // Link Thumbnails with Main Carousel
      /* $(".owl-thumbs .owl-thumb-item").on("click", function(){
        $(".owl-thumbs .owl-thumb-item").removeClass("active");
        $(this).addClass("active");
        var slideIndex = $(this).data("slide");
        $("#main-carousel").trigger("to.owl.carousel", [slideIndex, 300]);
      }); */
    });
  </script>
  <script>
    $('#button-skd').on('click', function(){
      $('#skd-list').removeClass('d-none');
      $('#skb-list').addClass('d-none');
      /* $('#bimbel-list').addClass('d-none'); */
      
      $('#button-skd').removeClass('btn-outline-primary');
      $('#button-skb').addClass('btn-outline-primary');
/*       $('#button-bimbel').addClass('btn-outline-primary');
 */    })
    
    $('#button-skb').on('click', function(){
      console.log('clicked');
      $('#skd-list').addClass('d-none');
      $('#skb-list').removeClass('d-none');
/*       $('#bimbel-list').addClass('d-none');
 */      
      $('#button-skd').addClass('btn-outline-primary');
      $('#button-skb').removeClass('btn-outline-primary');
/*       $('#button-bimbel').addClass('btn-outline-primary');
 */    })
    
  /*   $('#button-bimbel').on('click', function(){
      console.log('clicked');
      $('#skd-list').addClass('d-none');
      $('#skb-list').addClass('d-none');
      $('#bimbel-list').removeClass('d-none');
      
      $('#button-skd').addClass('btn-outline-primary');
      $('#button-skb').addClass('btn-outline-primary');
      $('#button-bimbel').removeClass('btn-outline-primary');
    }) */
  </script>
  <script>
    $(document).ready(function() {
      var showChar = 100;  // Number of characters to show by default
      var ellipsisText = "...";
      var moreText = "selengkapnya";
      var lessText = "lebih sedikit";
      
      $('.text').each(function() {
        var content = $(this).text();
        if (content.length > showChar) {
          var visibleText = content.substr(0, showChar);
          var hiddenText = content.substr(showChar);
          
          var html = `${visibleText}<span class="more-ellipsis">${ellipsisText}</span><span class="more-content"><span>${hiddenText}</span></span>`;
          $(this).html(html);
        }
      });
      
      $(".more-btn").click(function() {
        var $p = $(this).prev('.text');
        if ($p.find('.more-content').is(":visible")) {
          $p.find('.more-content').hide();
          $p.find('.more-ellipsis').show();
          $(this).text(moreText);
        } else {
          $p.find('.more-content').show();
          $p.find('.more-ellipsis').hide();
          $(this).text(lessText);
        }
      });
    });
  </script>
</body>
</html>