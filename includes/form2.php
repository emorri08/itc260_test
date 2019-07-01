<?php
/**
 * multiple.php is a postback application designed to provide a 
 * contact form for users to email our clients.  
 * 
 * multiple.php provides a larger form with more elements to provide 
 * a richer example form.
 *
 * @package nmCAPTCHA2
 * @author Bill & Sara Newman <williamnewman@gmail.com>
 * @version 1.01 2015/11/17
 * @link http://www.newmanix.com/
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see contact_include.php 
 * @see recaptchalib.php
 * @see util.js 
 * @todo none
 */

#EDIT THE FOLLOWING:
$toAddress = "emorri08@seattlecentral.edu";  //place your/your client's email address here
$toName = "Eleanor A. Boyd"; //place your client's name here
$website = "eleanorboyd.com";  //place NAME of your client's website here
#--------------END CONFIG AREA ------------------------#
$sendEmail = TRUE; //if true, will send an email, otherwise just show user data.
$dateFeedback = true; //if true will show date/time with reCAPTCHA error - style a div with class of dateFeedback
include_once 'config.php'; #site keys go inside your config.php file
include 'contact-lib/contact_include.php'; #complex unsightly code moved here
$response = null;
$reCaptcha = new ReCaptcha($secretKey);
if (isset($_POST["g-recaptcha-response"]))
{// if submitted check response
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}
if ($response != null && $response->success)
    {#reCAPTCHA agrees data is valid (PROCESS FORM & SEND EMAIL)
        handle_POST($skipFields,$sendEmail,$toName,$fromAddress,$toAddress,$website,$fromDomain);             #Here we can enter the data sent into a database in a later version of this file
    ?>
    <!-- START HTML FEEDBACK -->
    <div id="feedback" class="contact-feedback">
        <h2>Thank you! Your message has been sent.</h2>
    
        <p>I will be in touch with you shortly.</p>
        
        <small>Please allow 24 hours for a response. Thank you for your patience.</small>
        
    </div>    
    <!-- END HTML FEEDBACK -->        
    <?php
}else{#show form, either for first time, or if data not valid per reCAPTCHA 
    if($response != null && !$response->success)
    {
        $feedback = dateFeedback($dateFeedback);
        send_POSTtoJS($skipFields); #function for sending POST data to JS array to reload form elements
    }//end failure feedback
 
?>
	<!-- START HTML FORM -->
	<form id="contactForm2" action="<?php echo basename($_SERVER['PHP_SELF']); ?>" method="post">
	<div id="nameContainer2">
		<label id="name2">
			Name:<br /><input type="text" name="Name" required="required" placeholder="Full Name (required)" title="Name is required" tabindex="10" size="44" />
		</label>
	</div>
	<div id="emailContainer2">	
		<label id="email2">
			Email:<br /><input type="email" name="Email" required="required" placeholder="Email (required)" title="A valid email is required" tabindex="20" size="44" />
		</label>
	</div>
	<!-- form elements -->
	<div id="selectContainer2">	
		<label id="select2">
			How Did You Hear About Us?:<br />
			<select name="How_Did_You_Hear_About_Us?" required="required" title="How You Heard is required" tabindex="30">
				<option value="">Choose How You Heard</option>
				<option value="Phone">Phone</option>
				<option value="Web">Web</option>
				<option value="Word of Mouth">Word of Mouth</option>
				<option value="Other">Other</option>
			</select>
		</label>
	</div>
	
	<div id="servicesContainer2">	
		<fieldset id="srvcs2">
			<legend id="services2">What Services Are You Interested In?</legend>
			<input id="newSite2" type="checkbox" name="Interested_In[]" value="New Web App" tabindex="40" /><span class="services"> New Web App </span><br />
			<input id="siteRedesign2" type="checkbox" name="Interested_In[]" value="Update Existing Web App" /><span class="services"> Update Existing Web App </span><br />
            <input id="siteRedesign2" type="checkbox" name="Interested_In[]" value="New Mobile App" /><span class="services"> New Mobile App </span><br />
            <input id="siteRedesign2" type="checkbox" name="Interested_In[]" value="Update Existing Mobile App" /><span class="services"> Update Existing Mobile App </span><br />
			<input id="specialApp2" type="checkbox" name="Interested_In[]" value="Logo Design" /><span class="services"> Logo Design </span><br />
			<input id="lollipop2" type="checkbox" name="Interested_In[]" value="Branding" /><span class="services"> Branding </span><br />
			<input id="udderStuff2" type="checkbox" name="Interested_In[]" value="Other" /><span class="services"> Other </span><br />
		</fieldset>
	</div>
	
<!--    commented out - join mailing list form section
		<div id="mailListContainer2">	
		<fieldset id="mailList2">
			<legend id="mailingList2">Would you like to join our mailing list?</legend>
			<input id="listYes2" type="radio" name="Join_Mailing_List?" value="Yes" 
			required="required" title="Mailing list is required" tabindex="50"  
			/> Yes <br />
			<input id="listNo2" type="radio" name="Join_Mailing_List?" value="No" /> No <br />
		</fieldset>
	</div>
-->
	<div id="commentContainer2">	
		<label id="comments2">
			Comments:<br /><textarea name="Comments" cols="36" rows="4" placeholder="Your comments are important to us!" tabindex="60"></textarea>
		</label>
	</div>	
	<div><?=$feedback?></div>
    <div class="g-recaptcha" data-sitekey="<?=$siteKey;?>"></div>
	<div>
		<input id="submitButton" type="submit" value="submit" />
	</div>
    </form>
	<!-- END HTML FORM -->
    <script type="text/javascript"
        src="https://www.google.com/recaptcha/api.js?hl=en">
    </script>
<?php
}
?>
