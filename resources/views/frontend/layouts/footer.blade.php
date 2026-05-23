    <!-- Start Footer Area  -->
    <footer class="footer-area footer-style-one-wrapper bg-color-footer bg_images tmp-section-gap">
        <div class="container">
            <div class="footer-main footer-style-one">
                <div class="row g-5">
                    <div class="col-lg-5 col-md-6">
                        <div class="single-footer-wrapper border-right mr--20">
                            <div class="logo">
                                <a href="index.html">
                                    <img src="{{ asset('frontend-assets/images/logo/white-logo-reeni.png') }}" alt="Reeni - Personal Portfolio HTML Template for developers and freelancers">
                                </a>
                            </div>
                            <p class="description"><span>Get Ready</span> To Create Great</p>
                            <form action="#" class="newsletter-form-1 mt--40">
                                <input type="email" placeholder="Email Adress">
                                <span class="form-icon"><i class="fa-regular fa-envelope"></i></span>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-footer-wrapper quick-link-wrap">
                            <h5 class="ft-title">Quick Link</h5>
                            <ul class="ft-link tmp-link-animation">
                                <li>
                                    <a href="{{ route('about') }}">About Me</a>
                                </li>
                                <li>
                                    <a href="{{ route('services') }}">Service</a>
                                </li>
                                <li>
                                    <a href="{{ route('contact') }}">Contact Me</a>
                                </li>
                                <li>
                                    <a href="{{ route('blogs') }}">Blog Post</a>
                                </li>
                                <li>
                                    <a href="{{ route('projects') }}">Projects</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single-footer-wrapper contact-wrap">
                            <h5 class="ft-title">Contact </h5>
                            <ul class="ft-link tmp-link-animation">
                                <li><span class="ft-icon"><i class="fa-solid fa-envelope"></i></span><a href="#">shekhmohammadmohsin@gmail.com</a></li>
                                <li><span class="ft-icon"><i class="fa-solid fa-location-dot"></i></span>Mirpur-13, Dhaka, Bangladesh</li>
                                <li><span class="ft-icon"><i class="fa-solid fa-phone"></i></span><a href="#">01858012033</a></li>
                            </ul>
                            <div class="social-link footer">
                                <a href="https://www.instagram.com/shekh_mohsin07"><i class="fa-brands fa-instagram"></i></a>
                                <a href="https://linkedin.com/in/shekh-mohsin07"><i class="fa-brands fa-linkedin-in"></i></a>
                                <a href="https://github.com/shekhmohsin07"><i class="fa-brands fa-github"></i></a>
                                <a href="https://www.facebook.com/profile.php?id=100072255151442"><i class="fa-brands fa-facebook-f"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="copyright-area-one">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-wrapper">
                        <p class="copy-right-para tmp-link-animation"> ©<a href="#" target="_blank">Shekh Mohsin </a>
                            <script>
                                document.write(new Date().getFullYear())
                            </script> | All Rights Reserved
                        </p>
                        <ul class="tmp-link-animation">
                            <li><a href="#">Trams & Condition</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="{{ route('contact') }}">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Area  -->