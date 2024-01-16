@extends('layouts.front')

@section('carousal')
<section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url( {{ asset('img/slide/cover.jpg') }} )">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown"> <span>Hafsah Science Acadamy</span></h2>
              <p class="animate__animated animate__fadeInUp">Where Excellence Meets Diversity!

              At Hafsah Science Academy, we take pride in providing a dynamic educational experience that seamlessly blends both Islamic and Western education. Our mission is to nurture well-rounded individuals who excel academically, embody strong moral values, and embrace cultural diversity. Explore the unique fusion of tradition and modernity that sets Hafsah Science Academy apart.</p>
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url( {{ asset('img/slide/front.jpg') }} )">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Western Education</h2>
              <p class="animate__animated animate__fadeInUp">Our Western education program at Hafsah Science Academy is designed to provide students with a comprehensive and modern learning experience that aligns with global academic standards. Our curriculum encompasses a wide range of subjects, including mathematics, science, literature, social studies, and more. Through engaging and interactive teaching methods, we aim to foster critical thinking, problem-solving skills, and a thirst for knowledge.</p>
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url( {{ asset('img/slide/class.jpg') }} )">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Islamic Education</h2>
              <p class="animate__animated animate__fadeInUp">Our Islamic education program is at the core of Hafsah Science Academy's mission to provide a holistic learning experience. Rooted in the teachings of Islam, this program aims to nurture students spiritually, morally, and ethically. It encompasses Quranic studies, Hadith, Fiqh, Aqeedah, and more, creating a foundation for a life guided by Islamic principles.</p>
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

@endsection

@section('content')
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>About</h2>
            <p>About Us</p>
          </div>
  
          <div class="row content">
            <div class="col-lg-6">
              <p>
                At Hafsah Science Academy, we offer a comprehensive range of academic programs that cater to both Islamic studies and Western education. 
              </p>
              <ul>
                <li><i class="ri-check-double-line"></i> Combined excellent Islamic and Western education </li>
                <li><i class="ri-check-double-line"></i>Memorization of the Holy Qur'an at the end of middle basic</li>
                <li><i class="ri-check-double-line"></i> Billingual (Arabic & English) Academy</li>
                <li><i class="ri-check-double-line"></i> Sound upbringing in accordance with Islamic morals</li>
                <li><i class="ri-check-double-line"></i> Conducive environment for learning</li>
                <li><i class="ri-check-double-line"></i> Dedicated, qualified and experienced tutors</li>
  
              </ul>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0">
              <p>
                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                culpa qui officia deserunt mollit anim id est laborum.
              </p>
              <a href="#" class="btn-learn-more">Learn More</a>
            </div>
          </div>
  
        </div>
      </section><!-- End About Section -->
  
      <!-- ======= Frequently Asked Questions Section ======= -->
      <section id="faq" class="faq">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>F.A.Q</h2>
            <p>Frequently Asked Questions</p>
          </div>
  
                    <!-- FAQ Item 1 -->
            <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="500">
              <div class="col-lg-5">
                <i class="bx bx-help-circle"></i>
                <h4>What is Hafsah Science Academy?</h4>
              </div>
              <div class="col-lg-7">
                <p>
                  Hafsah Science Academy is an educational institution that provides a unique blend of both Islamic and Western education. Our mission is to foster academic excellence, moral integrity, and cultural diversity in a nurturing learning environment.
                </p>
              </div>
            </div><!-- End F.A.Q Item-->
  
            <!-- FAQ Item 2 -->
            <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="500">
              <div class="col-lg-5">
                <i class="bx bx-help-circle"></i>
                <h4>Where is Hafsah Science Academy located?</h4>
              </div>
              <div class="col-lg-7">
                <p>
                  We are located at Hayin Buba, 
                  Gusau, Zamfara state
                  Nigeria , providing a convenient and accessible location for students and their families.
                </p>
              </div>
            </div><!-- End F.A.Q Item-->
  
            <!-- FAQ Item 3 -->
            <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="500">
              <div class="col-lg-5">
                <i class="bx bx-help-circle"></i>
                <h4>What grades does Hafsah Science Academy cater to?</h4>
              </div>
              <div class="col-lg-7">
                <p>
                  Hafsah Science Academy offers education for students from  Reception, Nursery, Primary and Secondary including Tahfeez. Our programs cover both Islamic studies and a comprehensive range of Western subjects.
                </p>
              </div>
            </div><!-- End F.A.Q Item-->
  
            <!-- FAQ Item 10 -->
            <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="500">
              <div class="col-lg-5">
                <i class="bx bx-help-circle"></i>
                <h4>What is included in the Islamic education program?</h4>
              </div>
              <div class="col-lg-7">
                <p>
                  Our Islamic education program covers Quranic studies, Hadith, Fiqh, Aqeedah, and moral and ethical development. It is designed to provide students with a strong foundation in Islamic principles.
                </p>
              </div>
            </div><!-- End F.A.Q Item-->
  
            <!-- FAQ Item 11 -->
            <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="500">
              <div class="col-lg-5">
                <i class="bx bx-help-circle"></i>
                <h4>Is Islamic education compulsory for all students?</h4>
              </div>
              <div class="col-lg-7">
                <p>
                  Yes, Islamic education is an integral part of our curriculum, and all students are required to participate in these courses.
                </p>
              </div>
            </div><!-- End F.A.Q Item-->
  
  
        </div>
      </section><!-- End Frequently Asked Questions Section -->
  
      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact section-bg">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Contact</h2>
            <p>Contact Us</p>
          </div>
  
          <div class="row">
  
            <div class="col-lg-6">
  
              <div class="row">
                <div class="col-md-12">
                  <div class="info-box">
                    <i class="bx bx-map"></i>
                    <h3>Our Address</h3>
                    <p>Hayin Buba, <br>
                  Gusau, Zamfara state<br>
                  Nigeria </p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-box mt-4">
                    <i class="bx bx-envelope"></i>
                    <h3>Email Us</h3>
                    <p>hafsahscienceacadamygus@gmail.com
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-box mt-4">
                    <i class="bx bx-phone-call"></i>
                    <h3>Call Us</h3>
                    <p>08026570970  <br>08060454930   </p>
                  </div>
                </div>
              </div>
  
            </div>
  
            <div class="col-lg-6">
              <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="row">
                  <div class="col-md-6 form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                  </div>
                  <div class="col-md-6 form-group mt-3 mt-md-0">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                  </div>
                </div>
                <div class="form-group mt-3">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                </div>
                <div class="form-group mt-3">
                  <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                </div>
                <div class="my-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
              </form>
            </div>
  
          </div>
  
        </div>
      </section><!-- End Contact Section -->    
@endsection