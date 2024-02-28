<!-- Footer -->
<footer class="footer-area">
  <img src="{{ mix('img/imgs/bg-shape-4.svg') }}" alt="Shape" class="animation-slide-right bg-shape" />
  <div class="footer-top">
    <div class="custom-container">
      <div class="custom-row align-items-end justify-content-between">
        <div class="left-content">
          <a href="/" class="logo">
            <img src="{{ mix('img/imgs/codelitelogodark.png') }}" alt="Logo" height="60" />
          </a>
          <p>@lang('menu.weProvide')<br>
            <span>@lang('menu.propel')</span>
          </p>
          <form action="https://wpriverthemes.com/HTML/synck/assets/mail/subscribe.php" method="POST" class="subscribe-form">
            <div class="subscribe-box d-flex">
              <input type="email" id="email" name="email" placeholder=" @lang('menu.enterEmail')" />
              <button id="submit2" class="theme-btn">@lang('menu.getStarted')</button>
            </div>
            <!-- Alert Message -->
            <div class="input-row">
              <div class="input-group alert-notification">
                <div id="alert-message-subscribe" class="alert-msg"></div>
              </div>
            </div>
          </form>
          <div class="footer-clients d-flex align-items-center">
            <div class="footer-client-img">
              <img src="{{ mix('img/imgs/youtube.svg') }}" alt="Youtube" />
            </div>
            <div class="footer-client-img">
              <img src="{{ mix('img/imgs/webflow.svg') }}" alt="webflow" />
            </div>
            <div class="footer-client-img">
              <img src="{{ mix('img/imgs/upwork.svg') }}" alt="upwork" />
            </div>
            <div class="footer-client-img">
              <img src="{{ mix('img/imgs/shopify.svg') }}" alt="shopify" />
            </div>
          </div>
        </div>

        <div class="right-content">
          <div class="right-content-inner">
            <h2>@lang('menu.letsStarted')</h2>
            <p>@lang('menu.ourITExpert')<br>
              <span>@lang('menu.providing')</span>
            </p>
            <a href="{{ route('frontend.contact') }}" class="theme-btn">@lang('menu.getAppointment')</a>

            <div class="footer-experience d-flex align-items-center">

              <div class="footer-experience-item">
                <h1>2 <span>@lang('menu.mins')</span></h1>
                <p>@lang('menu.responseTime')</p>
              </div>
              <div class="footer-experience-item">
                <h1>99%</h1>
                <p>@lang('menu.clientSatisfaction')</p>
              </div>
              <div class="footer-experience-item">
                <h1>22+ <span>@lang('menu.year')</span></h1>
                <p>@lang('menu.fieldExperience')</p>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="footer-bottom">
    <div class="custom-container">
      <div class="custom-row">
        <div class="footer-all-links-wrap justify-content-between d-flex">
          <div class="responsive-footer">
            <div class="footer-links">
              <h3>@lang('menu.services')</h3>
              <ul>
                <li><a href="service-details.html">IT Support</a></li>
                <li><a href="service-details.html">Web Design</a></li>
                <li><a href="service-details.html">Development</a></li>
                <li><a href="service-details.html">Cloud Things </a></li>
                <li><a href="service-details.html">E-Commerce</a></li>
                <li><a href="service-details.html">CRM Solutions</a></li>
              </ul>
            </div>
            <div class="footer-links">
              <h3>@lang('menu.company')</h3>
              <ul>
                <li><a href="blog.html">@lang('menu.blog')</a></li>
                <li><a href="about.html">@lang('menu.aboutUs')</a></li>
                <li><a href="partner.html">@lang('menu.partners')</a></li>
                <li><a href="career.html">@lang('menu.careers')</a></li>
                <li><a href="event.html">@lang('menu.events')</a></li>
                <li><a href="team.html">@lang('menu.team')</a></li>
              </ul>
            </div>

            <div class="footer-links">
              <h3>@lang('menu.product')</h3>
              <ul>
                <li><a href="case-studie.html">@lang('menu.caseStudies')</a></li>
                <li><a href="pricing.html">@lang('menu.pricing')</a></li>
                <li><a href="feature.html">@lang('menu.features')</a></li>
                <li><a href="overview.html">@lang('menu.overview')</a></li>
                <li><a href="new-release.html">@lang('menu.newRelease')</a></li>
                <li><a href="solution.html">@lang('menu.solutions')</a></li>
              </ul>
            </div>
          </div>

          <div class="responsive-footer">
            <div class="footer-links">
              <h3>Our Fields</h3>
              <ul>
                <li><a href="our-field-details.html">Healthcare</a></li>
                <li><a href="our-field-details.html">Banks</a></li>
                <li><a href="our-field-details.html">Logistics</a></li>
                <li><a href="our-field-details.html">Supermarkets</a></li>
                <li><a href="our-field-details.html">Industries</a></li>
                <li><a href="our-field-details.html">Hotels</a></li>
              </ul>
            </div>
            <div class="footer-links">
              <h3>Legal</h3>
              <ul>
                <li><a href="#">Licenses</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Cookies</a></li>
                <li><a href="#">Document</a></li>
                <li><a href="#">Terms</a></li>
                <li><a href="#">Privacy</a></li>
              </ul>
            </div>



            <div class="footer-contact-info">
              <div class="footer-contact-info-item">
                <h4>@lang('menu.phone')</h4>
                <p>
                  <a href="tel:+1-455-1482-236">+1-455-1482-236</a> <br>
                  <a href="tel:+1-938-740-75556">+1-938-740-7555</a>
                </p>
              </div>
              <div class="footer-contact-info-item">
                <h4>Mail</h4>
                <p>
                  <a href="mailto:bluebase@mail.com">bluebase@mail.com</a> <br>
                  <a href="mailto:mandrodio@mail.com">mandrodio@mail.com</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="copyright-area">
    <div class="custom-container">
      <div class="custom-row d-flex align-items-center justify-content-between">
        <ul class="social-links d-flex align-items-center">
          <li><a href="#">
              <i class="iconoir-dribbble"></i>
            </a></li>
          <li><a href="#">
              <i class="iconoir-twitter"></i>
            </a></li>
          <li><a href="#">
              <i class="iconoir-instagram"></i>
            </a></li>
          <li><a href="#">
              <i class="iconoir-linkedin"></i>
            </a></li>
        </ul>

        <p>&copy; 2023 All rights reserved by <a href="https://themeforest.net/user/wordpressriver/portfolio">WordpressRiver</a></p>
      </div>
    </div>
  </div>
</footer>