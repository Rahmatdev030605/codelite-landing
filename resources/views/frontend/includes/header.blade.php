<!-- Header -->
<header class="header-area">

  <div class="custom-container">
    <div class="custom-row align-items-center justify-content-between">
      <div class="header-left d-flex align-items-center">
        <a href="/" class="logo">
          <img src="{{ mix('img/imgs/codelitelogolight.png') }}" alt="Logo" />
        </a>

        <div class="header-left-right">
          <a href="{{ route('frontend.contact') }}" class="theme-btn">
            @lang('menu.contactUs')
          </a>
          <span class="menu-bar">
            <i class="las la-bars"></i>
          </span>
        </div>
        <nav class="navbar-wrapper">
          <span class="close-menu-bar">
            <i class="las la-times"></i>
          </span>
          <ul>
            <li class="dropdown-menu-item">
              <a href="{{ route('frontend.index') }}">@lang('menu.home')</a>
              <span class="dropdown-menu-item-icon">
                <i class="las la-angle-down"></i>
              </span>
              <ul class="dropdown-menu">
                <li>
                  <a href="/">@lang('menu.itservices')</a>
                </li>
                <li>
                  <a href="{{ route('frontend.businessConsulting') }}">@lang('menu.business')</a>
                </li>
              </ul>
            </li>
            <li class="mega-menu-item">
              <a href="{{ route('frontend.company') }}">@lang('menu.company')</a>
              <span class="dropdown-menu-item-icon">
                <i class="las la-angle-down"></i>
              </span>
              <div class="mega-menu mega-menu-company">
                <div class="mega-menu-inner">
                  <div class="custom-container d-flex">
                    <div class="left">
                      <div class="mega-menu-link-wrap d-flex justify-content-between">
                        <div class="mega-menu-link">
                          <h3>Get Started</h3>
                          <ul>
                            <li><a href="#">Setup 101</a></li>
                            <li><a href="#">Adding users</a></li>
                            <li><a href="#">Video tutorials</a></li>
                            <li><a href="#">Libraries and SDKs</a></li>
                            <li><a href="#">Plugins</a></li>
                            <li><a href="#">Templates</a></li>
                          </ul>
                        </div>

                        <div class="mega-menu-links d-flex">
                          <div class="mega-menu-link">
                            <h3>@lang('menu.company')</h3>
                            <ul>
                              <li><a href="{{ route('frontend.about') }}">@lang('menu.aboutUs')</a></li>
                              <li><a href="{{ route('frontend.partners') }}">@lang('menu.partners')</a></li>
                              <li><a href="{{ route('frontend.careers') }}">@lang('menu.careers')</a></li>
                              <li><a href="{{ route('frontend.events') }}">@lang('menu.events')</a></li>
                              <li><a href="{{ route('frontend.team') }}">@lang('menu.team')</a></li>
                              <li><a href="{{ route('frontend.blog') }}">@lang('menu.blog')</a></li>
                            </ul>
                          </div>
                          <div class="mega-menu-link">
                            <h3>@lang('menu.product')</h3>
                            <ul>
                              <li><a href="{{ route('frontend.overview') }}">@lang('menu.overview')</a></li>
                              <li><a href="{{ route('frontend.pricing') }}">@lang('menu.pricing')</a></li>
                              <li><a href="{{ route('frontend.features') }}">@lang('menu.features')</a></li>
                              <li><a href="{{ route('frontend.caseStudies') }}">@lang('menu.caseStudies')</a></li>
                              <li><a href="{{ route('frontend.newReleases') }}">@lang('menu.newRelease')</a></li>
                              <li><a href="{{ route('frontend.solutions') }}">@lang('menu.solutions')</a></li>
                            </ul>
                          </div>
                          <div class="mega-menu-link">
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
                        </div>
                      </div>

                      <div class="mega-meu-footer d-flex align-items-center justify-content-between w-full">
                        <ul class="mega-menu-social d-flex align-items-center">
                          <li><a href="#"><i class="iconoir-dribbble"></i></a></li>
                          <li><a href="#"><i class="iconoir-twitter"></i></a></li>
                          <li><a href="#"><i class="iconoir-instagram"></i></a></li>
                          <li><a href="#"><i class="iconoir-linkedin"></i></a></li>
                        </ul>

                        <p>@lang('menu.looking') <a href="{{ route('frontend.careers') }}">@lang('menu.hiring')</a></p>
                      </div>
                    </div>
                    <div class="right">
                      <div class="mega-menu-ads">
                        <img src="{{ mix('img/imgs/iphone-13-1.jpg') }}" alt="Iphone" />
                        <h2>@lang('menu.solutionIn')</h2>
                        <p>@lang('menu.develop')<br><span>@lang('menu.analysis')</span> .</p>
                        <a href="{{ route('frontend.caseStudieSingle') }}">@lang('menu.viewMore')</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="mega-menu-item">
              <a href="{{ route('frontend.portfolio') }}">@lang('menu.portfolio')</a>
              <span class="dropdown-menu-item-icon">
                <i class="las la-angle-down"></i>
              </span>
              <div class="mega-menu mega-menu-portfolio">
                <div class="mega-menu-inner">
                  <div class="custom-container d-flex">
                    <div class="left">
                      <div class="mega-menu-link-wrap d-flex align-items-start justify-content-between">
                        <div class="mega-menu-portfolio-card">
                          <div class="img-box">
                            <img src="{{ mix('img/imgs/portfolio-mega-menu-1.jpg') }}" alt="Portfolio" />
                          </div>
                          <div class="content-box">
                            <h3><a href="{{ route('frontend.detailPortfolio') }}">E-commerce</a></h3>
                            <p>we undertook a project to <br>migrate their existing.
                            </p>
                          </div>
                        </div>
                        <div class="mega-menu-portfolio-card">
                          <div class="img-box">
                            <img src="{{ mix('img/imgs/portfolio-mega-menu-2.jpg') }}" alt="Portfolio" />
                          </div>
                          <div class="content-box">
                            <h3><a href="{{ route('frontend.detailPortfolio') }}">App Development</a></h3>
                            <p>The mobile application has <br>significantly
                              improved.</p>
                          </div>
                        </div>
                        <div class="mega-menu-portfolio-card">
                          <div class="img-box">
                            <img src="{{ mix('img/imgs/portfolio-mega-menu-3.jpg') }}" alt="Portfolio" />
                          </div>
                          <div class="content-box">
                            <h3><a href="{{ route('frontend.detailPortfolio') }}">SAAS Integration</a></h3>
                            <p>We partnered with DEF to <br>upgrade their outdated
                              IT.</p>
                          </div>
                        </div>
                        <div class="mega-menu-portfolio-card">
                          <div class="img-box">
                            <img src="{{ mix('img/imgs/portfolio-mega-menu-4.jpg') }}" alt="Portfolio" />
                          </div>
                          <div class="content-box">
                            <h3><a href="{{ route('frontend.detailPortfolio') }}">Virtual Reality</a></h3>
                            <p>Enter into the virtual reality <br>
                              world for real experience.</p>
                          </div>
                        </div>
                      </div>

                      <div class="mega-meu-footer d-flex align-items-center justify-content-between w-full">
                        <ul class="mega-menu-social d-flex align-items-center">
                          <li><a href="#"><i class="iconoir-dribbble"></i></a></li>
                          <li><a href="#"><i class="iconoir-twitter"></i></a></li>
                          <li><a href="#"><i class="iconoir-instagram"></i></a></li>
                          <li><a href="#"><i class="iconoir-linkedin"></i></a></li>
                        </ul>

                        <p>
                          <a href="{{ route('frontend.portfolio') }}">View Portfolio <i class="iconoir-arrow-up-right"></i></a>
                        </p>
                      </div>
                    </div>
                    <div class="right">
                      <div class="mega-menu-ads">
                        <img src="{{ mix('img/imgs/macbook.jpg') }}" alt="iPad" />
                        <h2>Mobile app for a new era</h2>
                        <p>Download slack in your mobile for <br>
                          your daily usage.</p>
                        <a href="{{ route('frontend.caseStudieSingle') }}">View more</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="mega-menu-item">
              <a href="{{ route('frontend.service') }}">@lang('menu.services')</a>
              <span class="dropdown-menu-item-icon">
                <i class="las la-angle-down"></i>
              </span>
              <div class="mega-menu">
                <div class="mega-menu-inner">
                  <div class="custom-container d-flex">
                    <div class="left">
                      <div class="mega-menu-link-wrap d-flex align-items-start justify-content-between">
                        <div class="mega-menu-service-cards align-items-start">
                          <div class="mega-menu-service-card">
                            <span class="icon">
                              <img src="{{ mix('img/imgs/hwd-icon-1.svg') }}" alt="Service" />
                            </span>
                            <div class="content">
                              <h2><a href="{{ route('frontend.howWeDoDetail') }}">Brainstroming</a></h2>
                              <p>Ideas</p>
                            </div>
                          </div>
                          <div class="mega-menu-service-card">
                            <span class="icon">
                              <img src="{{ mix('img/imgs/hwd-icon-4.svg') }}" alt="Service" />
                            </span>
                            <div class="content">
                              <h2><a href="{{ route('frontend.howWeDoDetail') }}">Product</a></h2>
                              <p>Design</p>
                            </div>
                          </div>
                          <div class="mega-menu-service-card">
                            <span class="icon">
                              <img src="{{ mix('img/imgs/hwd-icon-2.svg') }}" alt="Service" />
                            </span>
                            <div class="content">
                              <h2><a href="{{ route('frontend.howWeDoDetail') }}">SEO</a></h2>
                              <p>Optimization</p>
                            </div>
                          </div>
                          <div class="mega-menu-service-card">
                            <span class="icon">
                              <img src="{{ mix('img/imgs/hwd-icon-3.svg') }}" alt="Service" />
                            </span>
                            <div class="content">
                              <h2><a href="{{ route('frontend.howWeDoDetail') }}">Front-End</a></h2>
                              <p>Development</p>
                            </div>
                          </div>
                        </div>

                        <div class="mega-menu-links d-flex">
                          <div class="mega-menu-link">
                            <h3>Services</h3>
                            <ul>
                              <li><a href="{{ route('frontend.serviceDetail') }}">Development</a></li>
                              <li><a href="{{ route('frontend.serviceDetail') }}">Web Design</a></li>
                              <li><a href="{{ route('frontend.serviceDetail') }}">IT Support</a></li>
                              <li><a href="{{ route('frontend.serviceDetail') }}">E-Commerce</a></li>
                              <li><a href="{{ route('frontend.serviceDetail') }}">Cloud Things</a></li>
                              <li><a href="{{ route('frontend.serviceDetail') }}">CRM Solutions</a></li>
                            </ul>
                          </div>
                          <div class="mega-menu-link">
                            <h3>Our Fields</h3>
                            <ul>
                              <li><a href="{{ route('frontend.ourField') }}">Healthcare</a></li>
                              <li><a href="{{ route('frontend.ourField') }}">Banks</a></li>
                              <li><a href="{{ route('frontend.ourField') }}">Logistics</a></li>
                              <li><a href="{{ route('frontend.ourField') }}">Supermarkets</a></li>
                              <li><a href="{{ route('frontend.ourField') }}">Industries</a></li>
                              <li><a href="{{ route('frontend.ourField') }}">Hotels</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>

                      <div class="mega-meu-footer d-flex align-items-center justify-content-between w-full">
                        <ul class="mega-menu-social d-flex align-items-center">
                          <li><a href="#"><i class="iconoir-dribbble"></i></a></li>
                          <li><a href="#"><i class="iconoir-twitter"></i></a></li>
                          <li><a href="#"><i class="iconoir-instagram"></i></a></li>
                          <li><a href="#"><i class="iconoir-linkedin"></i></a></li>
                        </ul>

                        <p>Looking for new career? <a href="{{ route('frontend.careers') }}">We're hiring</a></p>
                      </div>
                    </div>
                    <div class="right">
                      <div class="mega-menu-ads">
                        <img src="{{ mix('img/imgs/ipad.jpg') }}" alt="iPad" />
                        <h2>Our product hits</h2>
                        <p>Our new best IT product of the <br>year 2023.</p>
                        <a href="{{ route('frontend.caseStudieSingle') }}">View more</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <a href="{{ route('frontend.faq') }}">FAQ</a>
            </li>
          </ul>
        </nav>
      </div>
      <div class="header-right">
        <div class="header-contact-info d-flex align-items-center">
          <div class="left">
            @if (config('boilerplate.locale.status') && count(config('boilerplate.locale.languages')) > 1)
            <div>
              @foreach (collect(config('boilerplate.locale.languages'))->sortBy('name') as $code => $details)
              @if ($code !== app()->getLocale())
              <x-utils.link class="dropdown-item pt-1 pb-1" :href="route('locale.change', $code)" :text="__(getLocaleName($code) . getLocaleName(app()->getLocale()))" />
              @endif
              @endforeach
            </div>
            @endif
          </div>
          <div class="phone-number">
            <a href="tel:+1-938-740-7555">
              @lang('menu.callUs')
              <i class="iconoir-arrow-up-right"></i>
            </a>
            +1-938-740-7555
          </div>
          <a href="{{ route('frontend.contact') }}" class="theme-btn">@lang('menu.contactUs')</a>
          <div>
            <a href="{{ route('frontend.getCoba') }}">COBA</a>
          </div>
        </div>
      </div>
    </div>
  </div>

</header>