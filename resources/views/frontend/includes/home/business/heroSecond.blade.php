 <!-- Hero -->
 <section class="hero-section-wrap hero-home2">
     <div class="hero-section-content-wrap">
         <img class="bg-shape slide-left" src="{{ mix('img/imgs/bg-shape-6.svg') }}" alt="Shape" />
         <img class="bg-shape2 slide-right" src="{{ mix('img/imgs/bg-shape-5.svg') }}" alt="Shape" />
         <div class="custom-container">
             <div class="hero-section-content text-center">
                 <h5 class="section-subtitle">ACCELERATED GROWTH</h5>
                 <h1 class="section-title fade-in">Empowering business with
                     modern rules and insights</h1>
                 <p>Welcome to slack business consulting and solutions,
                     where success is not just a destination.</p>
                 <a href="#" class="theme-btn2">
                     Let’s talk to our team
                     <i class="iconoir-arrow-up-right"></i>
                 </a>
             </div>
         </div>
     </div>
     <div class="custom-container">

         <div class="hero-contact-form-wrap">
             <div class="hero-contact-form-inner-wrap">
                 <div class="mac-btns-wrap d-flex align-items-center justify-content-between">
                     <div class="mac-buttons d-flex align-items-center">
                         <span></span>
                         <span></span>
                         <span></span>
                     </div>

                     <div class="action-btn d-flex align-items-center">
                         <span></span>
                         <span></span>
                         <span></span>
                     </div>
                 </div>

                 <div class="hero-contact-form-header d-flex align-items-center justify-content-between">
                     <p>You can reach us anytime via <a href="mailto:bluebase@mail.com">bluebase@mail.com</a></p>

                     <a href="#" class="our-expert-team-box d-flex align-items-center">
                         <div class="our-expert-team-box-inner d-flex align-items-center">
                             <div class="imgs d-flex align-items-center">
                                 <img src="{{ mix('img/imgs/small-img-4.png') }}" alt="team" />
                                 <img src="{{ mix('img/imgs/small-img-3.png') }}" alt="team" />
                                 <img src="{{ mix('img/imgs/small-img-2.png') }}" alt="team" />
                                 <img src="{{ mix('img/imgs/small-img-1.png') }}" alt="team" />
                             </div>
                             <p>
                                 Meet
                                 <span>Our Experts</span>
                             </p>
                         </div>
                     </a>
                 </div>

                 <div class="hero-contact-form">
                     <form action="https://wpriverthemes.com/HTML/synck/assets/mail/contact2.php" method="POST" class="contact-form d-flex">
                         <div class="input-main-row">
                             <div class="input-row">
                                 <div class="input-group">
                                     <label for="first_name">First Name</label>
                                     <input type="text" placeholder="First Name" id="first_name" name="first_name" />
                                 </div>
                                 <div class="input-group">
                                     <label for="last_name">Last Name</label>
                                     <input type="text" placeholder="Last Name" id="last_name" name="last_name" />
                                 </div>
                             </div>
                             <div class="input-row">
                                 <div class="input-group">
                                     <label for="email">Email</label>
                                     <input type="email" placeholder="Your Email" id="email" name="email" />
                                 </div>
                             </div>
                             <div class="input-row">
                                 <div class="input-group phone-number">
                                     <select class="number-prefix">
                                         <option value="uk">UK</option>
                                         <option value="us">US</option>
                                     </select>
                                     <label for="phone_number">Phone Number</label>
                                     <input type="text" name="phone_number" placeholder="Your Number" />
                                 </div>
                                 <div class="input-group">
                                     <label for="country">Country</label>
                                     <input type="text" name="country" placeholder="Your Country" />
                                 </div>
                             </div>
                             <div class="input-row">
                                 <div class="input-group">
                                     <label>What's the type of your company?</label>
                                     <div class="choice-a-company flex-wrap d-flex">
                                         <div class="radio-box">
                                             <input type="radio" id="saas" name="choice_company" value="SAAS" />
                                             <label for="saas">SAAS</label>
                                         </div>
                                         <div class="radio-box">
                                             <input type="radio" id="banking" name="choice_company" value="Banking" />
                                             <label for="banking">Banking</label>
                                         </div>
                                         <div class="radio-box">
                                             <input type="radio" id="agency" name="choice_company" value="Agency" />
                                             <label for="agency">Agency</label>
                                         </div>
                                         <div class="radio-box">
                                             <input type="radio" id="business" name="choice_company" value="Business" />
                                             <label for="business">Business</label>
                                         </div>
                                         <div class="radio-box">
                                             <input type="radio" id="other" name="choice_company" value="Other" />
                                             <label for="other">Other</label>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="input-row">
                                 <div class="input-group">
                                     <label>What you need from us?</label>
                                     <div class="feedback-checkboxes d-flex flex-wrap">
                                         <div class="feedback-item">
                                             <input type="checkbox" id="app_design" name="services[]" value="App design" />
                                             <label for="app_design">App design</label>
                                         </div>
                                         <div class="feedback-item">
                                             <input type="checkbox" id="web_design" name="services[]" value="Web design" />
                                             <label for="web_design">Web design</label>
                                         </div>
                                         <div class="feedback-item">
                                             <input type="checkbox" id="branding" name="services[]" value="Branding" />
                                             <label for="branding">Branding</label>
                                         </div>
                                         <div class="feedback-item">
                                             <input type="checkbox" id="development" name="services[]" value="Development" />
                                             <label for="development">Development</label>
                                         </div>
                                         <div class="feedback-item">
                                             <input type="checkbox" id="cloud_service" name="services[]" value="Cloud service" />
                                             <label for="cloud_service">Cloud service</label>
                                         </div>
                                         <div class="feedback-item">
                                             <input type="checkbox" id="other" name="services[]" value="Other" />
                                             <label for="other">Other</label>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="input-main-row">
                             <div class="input-row">
                                 <div class="input-group">
                                     <label for="message">Message</label>
                                     <textarea name="message" id="message" placeholder="Leave us a message...."></textarea>
                                 </div>
                             </div>
                             <div class="input-row">
                                 <div class="input-group">
                                     <label for="budget">Budget</label>
                                     <input id="pi_input" type="range" min="0" max="200" step="1" style="padding: 0;" name="budget" />
                                     <div class="budget-values d-flex align-items-center justify-content-between w-full">
                                         <div class="left-value">$<span id="budget-value">300</span>k</div>
                                         <div class="right-value">$200k</div>
                                     </div>
                                 </div>
                             </div>
                             <div class="input-row">
                                 <div class="input-group input-checkbox">
                                     <input type="checkbox" id="privacy_policy_accept" name="privacy_policy_accept" value="1">
                                     <label for="privacy_policy_accept">Click the box and agree to our <a href="#">terms and conditions.</a></a></label>
                                 </div>
                             </div>
                             <div class="input-row">
                                 <div class="input-group">
                                     <button class="theme-btn" id="submit">Get Started</button>
                                 </div>
                             </div>
                             <!-- Alert Message -->
                             <div class="input-row">
                                 <div class="input-group alert-notification">
                                     <div id="alert-message" class="alert-msg"></div>
                                 </div>
                             </div>
                         </div>
                     </form>
                 </div>

             </div>
         </div>
     </div>
 </section>