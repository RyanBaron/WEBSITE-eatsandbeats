<script src='https://www.google.com/recaptcha/api.js'></script>

<div class="modal-header">
  <h5 class="modal-title" id="legalModalLabel">Contact Rjbstarter</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <i aria-hidden="true" class="fal fa-times"></i>
  </button>
</div>

<div class="modal-body headline-bold contact-legal">
  <div class="modal-contnet__wrapper">
    <div class="top-msg"></div>
    <form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="contact_legal">
      <input type="hidden" name="action" value="contact_legal">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-sm-6">
            <div class="form-group firstName-form-group">
              <label for="firstName"><?php _e("First Name*", "sage"); ?></label>
              <input id="firstName" name="firstName" class="form-control"  required="required" pattern="[a-zA-Z\s]+" oninvalid="this.setCustomValidity('First Name is required and can only contain letters.')" onchange="try{setCustomValidity('')}catch(e){}" oninput="setCustomValidity(' ')" maxlength="50"/>
              <div class="msg desc"></div>
            </div>
          </div>
          <div class="col-12 col-sm-6">
            <div class="form-group lastName-form-group">
              <label for="lastName"><?php _e("Last Name*", "sage"); ?></label>
              <input id="lastName" name="lastName" class="form-control"  required="required" pattern="[a-zA-Z\s]+" oninvalid="this.setCustomValidity('Last Name is required and can only contain letters.')" onchange="try{setCustomValidity('')}catch(e){}" oninput="setCustomValidity(' ')" maxlength="50" />
              <div class="msg desc"></div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12 col-sm-12">
            <div class="form-group form-group-email">
              <label for="email"><?php _e("Email*", "sage"); ?></label>
              <input id="email" name="email" type="email" class="form-control" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" oninvalid="this.setCustomValidity('Please enter a valid email address.')" onchange="try{setCustomValidity('')}catch(e){}" oninput="setCustomValidity(' ')" maxlength="150" />
              <div class="msg desc"></div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12 col-sm-12">
            <div class="form-group company-form-group">
              <label for="company"><?php _e("Company/Organization", "sage"); ?></label>
              <input id="company" name="company" class="form-control"  required="required" pattern="[a-zA-Z0-9\s]+" oninvalid="this.setCustomValidity('Company can only contain letters and numbers.')" onchange="try{setCustomValidity('')}catch(e){}" oninput="setCustomValidity(' ')" maxlength="50" />
              <div class="msg desc"></div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12 col-sm-12">
            <div class="form-group company-form-group">
              <label for="subject"><?php _e("Subject*", "sage"); ?></label>
              <input id="subject" name="subject" class="form-control"  required="required" pattern="[a-zA-Z0-9\s!?.-]+" oninvalid="this.setCustomValidity('The subject can only contain letters and numbers.')" onchange="try{setCustomValidity('')}catch(e){}" oninput="setCustomValidity(' ')" maxlength="100" />
              <div class="msg desc"></div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12 col-sm-12">
            <div class="form-group form-group-message">
              <label for="message"><?php _e("Message*", "sage"); ?></label>
              <textarea required="required" class="form-control" id="message" name="message" spellcheck="true" maxlength="1500" ></textarea>
              <div class="msg desc"></div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12 col-sm-12">
            <div class="form-group form-group-location">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="location" id="location1" value="in-us" <?php checked( "in-us", $privacy_location, true ); ?> >
                <label class="form-check-label" for="location1">
                  <?php _e("In the United States", "sage"); ?>
                </label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="location" id="location2" value="outside-us" <?php checked( "outside-us", $privacy_location, true ); ?>>
                <label class="form-check-label" for="location2">
                  <?php _e("Outside of the United States", "sage"); ?>
                </label>
              </div>
              <div class="msg desc"></div>
            </div>
          </div>
        </div>

        <div class="row row-btn">
          <div class="col-12">
            <div class="form-group form-group-g-recaptcha">
              <div class="g-recaptcha" data-sitekey="6LftlFoUAAAAACk-Ot-Kga-VGoK7CWZQQ9ffYt_P"></div>
              <div class="msg desc"></div>
            </div>
          </div>
          <div class="col-12 col-sm-12">
            <div class="form-group form-group-submit text-center">
              <button type="submit" class="btn btn-secondary"><?php _e("Send", "sage"); ?></button>
              <div class="spinner"></div>
            </div>
          </div>
        </div>
      </div>

    </form>
  </div>
</div>
