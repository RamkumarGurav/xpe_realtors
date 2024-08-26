<style>
  input.parsley-success,
  select.parsley-success,
  textarea.parsley-success {
    color: #468847;
    background-color: #dff0d8;
    border: 1px solid #d6e9c6;
  }

  input.parsley-error,
  select.parsley-error,
  textarea.parsley-error {
    color: #b94a48;
    background-color: #f2dede;
    border: 1px solid #eed3d7;
    margin-bottom: 5px;
  }

  .parsley-errors-list {
    margin: 2px 0 3px;
    padding: 0;
    list-style-type: none;
    font-size: 0.9em;
    line-height: 0.9em;
    opacity: 0;
    transition: all 0.3s ease-in;
    -o-transition: all 0.3s ease-in;
    -moz-transition: all 0.3s ease-in;
    -webkit-transition: all 0.3s ease-in;
    color: #d89e29;
  }

  .parsley-errors-list.filled {
    opacity: 1;
  }

  input[type="number"] {
    -moz-appearance: textfield;
  }

  ul.parsley-errors-list {
    order: 2;
    width: 100%;
    margin-top: 8px;
    margin-bottom: 8px;
  }
</style>



<section class="recently breadcrumb bg-white home18">
  <div class="container">
    <div class="sec-title pb-0">
      <h2><span>Contact </span>Us</h2>

    </div>
  </div>
</section>
<section id="form-sec" class="mb-5 home18">
  <div class="container">
    <section class="news-one">
      <div class="news-one__shape-1 float-bob-x">
        <img src="<?= IMAGE ?>shapes/news-one-shape-1.png" alt="">
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <p class="mb-0"><b>Operating Location</b></p><br>
          </div>
          <div class="col-lg-12">
            <ul class="loc-btns mb-3">
              <button class="primarybtn" style="    background: #da9f3a;">Bengaluru</button>
              <button class="primarybtn" style="background: #6c757d;">Mysuru</button>
            </ul>
          </div>
        </div>
        <hr>
        <div class="row">

          <div class="col-lg-6">

            <div class="contact-one__right">
              <div class="contact-one__form-box wow slideInRight animated" data-wow-delay="100ms"
                data-wow-duration="2500ms"
                style="visibility: visible; animation-duration: 2500ms; animation-delay: 100ms; animation-name: slideInRight;">
                <div class="contact-form-bg" style="background-image: url(<?= IMAGE ?>contact-form-bg-img-1.jpg);">
                </div>
                <h5 class="section-title__title mb-3" style="font-size: 28px;">How Can We Help You?</h5>
                <!--  <div class="section-title text-left">
            <span class="section-title__tagline">contact with me</span>
            
            <h2 class="section-title__title">Get in Touch</h2>
            
            </div> -->
                <form name="enqForm" id="Contact-us" action="<?= MAINSITE ?>do_enquiry" onSubmit="submitForm(event)"
                  novalidate="novalidate" accept-charset="utf-8" autocomplete="off" enctype="multipart/form-data"
                  class="contact-one__form contact-one-validated" method="POST" data-parsley-validate>
                  <input type="hidden" name="enq_type" value="contact_us">
                  <input type="hidden" name="pagelink" value="contact-us">
                  <div class="row">
                    <div class="col-xl-12">
                      <div class="contact-one__input-box">
                        <input type="text" class="form" id="Contact-us-name" name="name_contact_us"
                          pattern="(?=.*[A-Za-z])[A-Za-z\s]*" required="required" placeholder="Your Name"
                          data-parsley-required-message="Name is required" />
                      </div>
                    </div>
                    <div class="col-xl-12">
                      <div class="contact-one__input-box">
                        <input type="email" class="form" id="Contact-us-email" name="email_contact_us"
                          required="required" placeholder="Email"
                          data-parsley-required-message="E-mail address is required" data-parsley-type="email"
                          data-parsley-type-message="Please enter valid e-mail address" />
                      </div>
                    </div>
                    <div class="col-xl-12">
                      <div class="contact-one__input-box">
                        <input type="text" class="form" id="Contact-us-contact" name="contact_contact_us" maxlength="10"
                          pattern="[0-9\\s]{10,10}" required="required" placeholder="Mobile"
                          data-parsley-required-message="Contact number is required" data-parsley-type="integer"
                          data-parsley-type-message="Please enter valid mobile number" />
                      </div>
                    </div>
                    <div class="col-xl-12">
                      <div class="contact-one__input-box">
                        <select required="required" placeholder="Select a Service" required="required"
                          id="Contact-us-service" name="service_contact_us"
                          data-parsley-required-message="Please Select a Service">
                          <option value=""> Select a Service</option>
                          <option value="Buying a property">Buying a property</option>
                          <option value="Selling a property">Selling a property</option>
                          <option value="I have property to rent out"> I have property to rent out</option>
                          <option value="I need rental property"> I need rental property</option>
                          <option value="Property Document related"> Property Document related</option>
                          <option value="Property Legal Service"> Property Legal Service
                          </option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xl-12 ">
                      <div class="contact-one__input-box text-message-box">
                        <textarea class="form textarea" id="Contact-us-message" name="message_contact_us"
                          required="required" placeholder="Enter the Message"
                          data-parsley-required-message="Message/Requirement is required" data-parsley-minlength="10"
                          data-parsley-trigger="keyup"
                          data-parsley-minlength-message="You need to enter at least a 10 character message.."></textarea>
                      </div>
                      <div class="row d-flex align-items-center  ">
                        <div class="col-lg-12">
                          <div class=" d-flex align-items-start justify-content-start">
                            <input type="checkbox" id="Contact-us-consent" name="consent_contact_us"
                              data-parsley-checkmin="1" required data-parsley-required-message="Consent is required"
                              value="1" style="margin-top: 5px">
                            <label for="terms" style="color: #fff !important"> By checking this check box, you are
                              providing your consent to PE-Realtors, they may contact you on the telephone number and
                              may send marketing calls and texts to you using an automated system for selection or
                              dialling of numbers or pre-recorded or artificial voice messages that relate to real
                              estate products or services.</label>
                          </div>
                        </div>
                      </div>

                      <button type="submit" data-callback="onSubmit" data-sitekey="<?= _google_recaptcha_site_key_ ?>"
                        data-wow-duration="1s" data-action="submit" class="g-recaptcha thm-btn contact-one__btn">Send a
                        message</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div class="col-lg-6">


            <ul class="contact">
              <li>
                <div class="info">
                  <div class="d-flex">
                    <i class="fa fa-map-marker" aria-hidden="true" style="    margin-top: 5px;margin-right: 5px"></i>
                    <p class="in-p mb-0"><b>Registered Office: </b>#329, 21st Main, JP Nagar 2nd Stage, Mysore Karnataka.
                      570008 <a target="_blank" href="https://maps.app.goo.gl/apYZwhUrpKnJM4g68?g_st=com.google.maps.preview.copy">Locate Here</a></p>

                  </div>
                    
                </div>
              </li>
                <li>
                <div class="info">
                
                  <div class="d-flex">
                    <i class="fa fa-map-marker" aria-hidden="true" style="    margin-top: 5px;margin-right: 5px"></i>
                    <p class="in-p mb-0"><b>Corporate Office: </b>No.2932/A New Corporation No.8 , Second Floor 14th Main
                      Road, R.P.C layout, Attiguppe, Vijayanagar, Bengaluru, Karnataka
                      560104 <a target="_blank" href="https://www.google.com/maps?q=12.956615447998047,77.53341674804688&z=17&hl=en">Locate Here</a>
                    </p>
                  </div>
                </div>
              </li>
               <li>
                <div class="info">
                
                  <div class="d-flex">
                    <i class="fa fa-map-marker" aria-hidden="true" style="    margin-top: 5px;margin-right: 5px"></i>
                    <p class="in-p mb-0"><b>Branch office [Bengaluru South] : </b>No.24 , 5th cross, 2nd Phase, J.P.Nagar,  Bangalore 560078 <a target="_blank" href="https://www.google.com/maps?q=12.912841796875,77.58663940429688&z=17&hl=en">Locate Here</a>
                    </p>
                  </div>
                </div>
              </li>
              <!-- <li><iframe
                  src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15552.95090098994!2d77.5334177!3d12.9566344!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae3e387cf57aeb%3A0x18aebb2ed188a219!2sPE-Realtors!5e0!3m2!1sen!2sin!4v1722419484592!5m2!1sen!2sin"
                  width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                  referrerpolicy="no-referrer-when-downgrade"></iframe></li>
              <li> -->

                <div class="info">
                  <div class="d-flex">
                    <i class="fa fa-phone" aria-hidden="true" style="    margin-top: 5px;margin-right: 5px"></i>

                    <p class="in-p"><b>Contact :</b><br>+91 6364003399 <br> +91 6364084823 <br> +91 6364098590</p>
                  </div>
                </div>
              </li>
              <li>
                <div class="info">

                  <div class="d-flex">
                    <i class="fa fa-envelope" aria-hidden="true" style="    margin-top: 5px;margin-right: 5px"></i>

                    <p class="in-p ti"><b>Email :</b> pe@perealtors.com</p>
                  </div>
                </div>
              </li>
            </ul>
            <hr>
            <h1 style="font-size: 15px;
                              text-align: left !important;
                              color: #000 !important;
                              font-weight: 600;text-tranform:none !important;    ">FOLLOW US ON SOCIAL MEDIA <span
                style="color:#d89e29"></span></h1>
            <ul class="netsocials">

              <li><a href="https://www.instagram.com/perealtors/?igsh=MXd0OG5wczF5OXpwYQ%3D%3D&utm_source=qr"
                  target="_blank"><i class="fab fa-instagram"></i></a></li>
              <li><a
                  href="https://www.facebook.com/people/Per-S/pfbid0jhduVLQmjRodr3q331jXK2rwJxr8egkiGiCjJvXumMA11GBY2YuCJQ7Rcf35LJKxl/?mibextid=LQQJ4d&rdid=DRgj6KtBzBXD9fvm&share_url=https%3A%2F%2Fwww.facebook.com%2Fshare%2FrJP1fQusRqAENJ19%2F%3Fmibextid%3DLQQJ4d"
                  target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <!-- <li><a href="mailto:pe@perealtors.com"><i class="fa fa-envelope" aria-hidden="true"></i></a></li> -->
              <li><a target="_blank" href="https://api.whatsapp.com/send?phone=+916364003399&amp;text=Hi%20"
                  target="_blank"><img src="<?= IMAGE ?>whatsapp.png" style="max-width: 40px;margin-top: -7px;"></a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>
  </div>
  </div>
</section>
<section class="google-map">
  <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15552.95090098994!2d77.5334177!3d12.9566344!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae3e387cf57aeb%3A0x18aebb2ed188a219!2sPE-Realtors!5e0!3m2!1sen!2sin!4v1722419484592!5m2!1sen!2sin" class="google-map__one" allowfullscreen=""></iframe> -->
</section>