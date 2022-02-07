<DOCTYPE html>
<html>
    <head>
        <title> StreamHub | REGISTER </title>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="assets/images/icon.ico">
        <link rel="stylesheet" type="text/CSS" href="styles/navbar.css">
        <link rel="stylesheet" type="text/CSS" href="styles/signup.css">
        <link rel="stylesheet" type="text/CSS" href="styles/toast.css">
        <link rel="stylesheet" type="text/CSS" href="styles/bg.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php
            include("php-scripts/signup-script.php");
            include("php-scripts/background.php");

            $email = @$_GET['email'] ?: "";

		?>
        <nav>
            <div>
                <p><i class="brand fas fa-play-circle"></i></p>
            </div>
            <ul class="nav-menu">
                <li><a class="nav-link" href="index.php">Home</a></li>
                <li><a class="nav-link" href="index.php#about">About</a></li>
                <li><a class="nav-link" href="login.php">Log In</a></li>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
        
        <div class="flex-container">
            <p id="mainheader"> CREATE YOUR ACCOUNT </p> 
            <p id="subheader"> Watch, enjoy, and binge on thousands of videos. </p> 
            <form method="post" id="register-form">
                <span class="input-labels"> First name </span> 
                <input type="text" class="input-boxes" name="firstname" value="<?php echo $firstName?>" require> 
                <span class="input-labels"> Last name </span> 
                <input type="text" class="input-boxes" name="lastname" value="<?php echo $lastName?>" require> 
                <span class="input-labels"> Username </span> 
                <input type="text" class="input-boxes" name="username" value="<?php echo $username?>" require>
                <span class="input-labels"> Email </span> 
                <input type="email" class="input-boxes" name="email" value="<?php echo $email?>" require> 
                <span class="input-labels"> Password </span> 
                <input type="password" class="input-boxes" name="password" require> 
                <span class="input-labels"> Confirm Password </span> 
                <input type="password" class="input-boxes" name="confirm" require> 
                <div id="errorMsgDiv">
                    <p id="errorMsg"></p>
                </div>
                <input type="submit" name="submit" id="register" value="REGISTER">
                <!-- <button id="register" onclick="register()"> <strong> REGISTER </strong> </button> -->
                <div id="account">
                    <span> Already have an account? <a class="form-links" href="login.php"> Log in </a></span> 
                </div>
                <div id="termsModal">
                    <div id="termsModalContent">
                        <div class="termsHeader">
                            <p>StreamHub's Term of Use</p>
                            <p id="closeTermsBtn" onclick="closeTermsBtn()">&times;</p>
                        </div>
                        <div id="terms">
                            <p >
                                StreamHub provides a personalized subscription service that allows our members to access entertainment content (“StreamHub content”) over the Internet on certain Internet-connected TVs, computers and other devices ("StreamHub ready devices").
                                <br>
                                These Terms of Use govern your use of our service. As used in these Terms of Use, "StreamHub service", "our service" or "the service" means the personalized service provided by StreamHub for discovering and accessing StreamHub content, including all features and functionalities, recommendations and reviews, our websites, and user interfaces, as well as all content and software associated with our service.
                                <br>
                                <br><span>1. Membership</span><br>
                                <br>1.1. Your StreamHub membership will continue until terminated. To use the StreamHub service you must have Internet access and a StreamHub ready device, and provide us with one or more Payment Methods. “Payment Method” means a current, valid, accepted method of payment, as may be updated from time to time, and which may include payment through your account with a third party. Unless you cancel your membership before your billing date, you authorize us to charge the membership fee for the next billing cycle to your Payment Method (see "Cancellation" below).
                                <br>1.2. We may offer a number of membership plans, including memberships offered by third parties in conjunction with the provision of their own products and services. We are not responsible for the products and services provided by such third parties. Some membership plans may have differing conditions and limitations, which will be disclosed at your sign-up or in other communications made available to you. You can find specific details regarding your StreamHub membership by visiting the streamhub.com website and clicking on the "Account" link available at the top of the pages under your profile name.
                                <br>
                                <br><span>2. Promotional Offers</span><br><br>We may from time to time offer special promotional offers, plans or memberships (“Offers”). Offer eligibility is determined by StreamHub at its sole discretion and we reserve the right to revoke an Offer and put your account on hold in the event that we determine you are not eligible. Members of households with an existing or recent StreamHub membership may not be eligible for certain introductory Offers. We may use information such as device ID, method of payment or an account email address used with an existing or recent StreamHub membership to determine Offer eligibility. The eligibility requirements and other limitations and conditions will be disclosed when you sign-up for the Offer or in other communications made available to you.
                                <br>
                                <br><span>3. Billing and Cancellation</span><br>
                                <br>3.1. Billing Cycle. The membership fee for the StreamHub service and any other charges you may incur in connection with your use of the service, such as taxes and possible transaction fees, will be charged to your Payment Method on the specific payment date indicated on the "Account" page. The length of your billing cycle will depend on the type of subscription that you choose when you signed up for the service. In some cases your payment date may change, for example if your Payment Method has not successfully settled, when you change your subscription plan or if your paid membership began on a day not contained in a given month. Visit the streamhub.com website and click on the "Billing details" link on the "Account" page to see your next payment date. We may authorize your Payment Method in anticipation of membership or service-related charges through various methods, including authorizing it for up to approximately one month of service as soon as you register. If you signed up for StreamHub using your account with a third party as a Payment Method, you can find the billing information about your StreamHub membership by visiting your account with the applicable third party.
                                <br>3.2. Payment Methods. To use the StreamHub service you must provide one or more Payment Methods. You authorize us to charge any Payment Method associated to your account in case your primary Payment Method is declined or no longer available to us for payment of your subscription fee. You remain responsible for any uncollected amounts. If a payment is not successfully settled, due to expiration, insufficient funds, or otherwise, and you do not cancel your account, we may suspend your access to the service until we have successfully charged a valid Payment Method. For some Payment Methods, the issuer may charge you certain fees, such as foreign transaction fees or other fees relating to the processing of your Payment Method. Local tax charges may vary depending on the Payment Method used. Check with your Payment Method service provider for details.
                                <br>3.3. Updating your Payment Methods. You can update your Payment Methods by going to the "Account" page. We may also update your Payment Methods using information provided by the payment service providers. Following any update, you authorize us to continue to charge the applicable Payment Method(s).
                                <br>3.4. Cancellation. You can cancel your StreamHub membership at any time, and you will continue to have access to the StreamHub service through the end of your billing period. To the extent permitted by the applicable law, payments are non-refundable and we do not provide refunds or credits for any partial membership periods or unused StreamHub content. To cancel, go to the "Account" page and follow the instructions for cancellation. If you cancel your membership, your account will automatically close at the end of your current billing period. To see when your account will close, click "Billing details" on the "Account" page. If you signed up for StreamHub using your account with a third party as a Payment Method and wish to cancel your StreamHub membership, you may need to do so through such third party, for example by visiting your account with the applicable third party and turning off auto-renew, or unsubscribing from the StreamHub service through that third party.
                                <br>3.5. Changes to the Price and Subscription Plans. We may change our subscription plans and the price of our service from time to time; however, any price changes or changes to your subscription plans will apply no earlier than 30 days following notice to you.
                                <br>
                                <br><span>4. StreamHub Service</span><br>
                                <br>4.1. You must be at least 18 years of age, or the age of majority in your province, territory or country, to become a member of the StreamHub service. Minors may only use the service under the supervision of an adult.
                                <br>4.2. The StreamHub service and any content accessed through the service are for your personal and non-commercial use only and may not be shared with individuals beyond your household. During your StreamHub membership we grant you a limited, non-exclusive, non-transferable right to access the StreamHub service and StreamHub content. Except for the foregoing, no right, title or interest shall be transferred to you. You agree not to use the service for public performances.
                                <br>4.3. You may access the StreamHub content primarily within the country in which you have established your account and only in geographic locations where we offer our service and have licensed such content. The content that may be available will vary by geographic location and will change from time to time. The number of devices on which you may simultaneously watch depends on your chosen subscription plan and is specified on the "Account" page.
                                <br>4.4. The StreamHub service, including the content library, is regularly updated. In addition, we continually test various aspects of our service, including our websites, user interfaces, promotional features and availability of StreamHub content. You can turn off test participation at any time by visiting the "Account" page and changing the "Test participation" settings.
                                <br>4.5. Some Stream Hub content is available for temporary download and offline viewing on certain supported devices (“Offline Titles”). Limitations apply, including restrictions on the number of Offline Titles per account, the maximum number of devices that can contain Offline Titles, the time period within which you will need to begin viewing Offline Titles and how long the Offline Titles will remain accessible. Some Offline Titles may not be playable in certain countries and if you go online in a country where you would not be able to stream that Offline Title, the Offline Title will not be playable while you are in that country.
                                <br>4.6. You agree to use the StreamHub service, including all features and functionalities associated therewith, in accordance with all applicable laws, rules and regulations, or other restrictions on use of the service or content therein. You agree not to archive, reproduce, distribute, modify, display, perform, publish, license, create derivative works from, offer for sale, or use (except as explicitly authorized in these Terms of Use) content and information contained on or obtained from or through the StreamHub service. You also agree not to: circumvent, remove, alter, deactivate, degrade or thwart any of the content protections in the StreamHub service; use any robot, spider, scraper or other automated means to access the StreamHub service; decompile, reverse engineer or disassemble any software or other products or processes accessible through the StreamHub service; insert any code or product or manipulate the content of the StreamHub service in any way; or use any data mining, data gathering or extraction method. In addition, you agree not to upload, post, e-mail or otherwise send or transmit any material designed to interrupt, destroy or limit the functionality of any computer software or hardware or telecommunications equipment associated with the StreamHub service, including any software viruses or any other computer code, files or programs. We may terminate or restrict your use of our service if you violate these Terms of Use or are engaged in illegal or fraudulent use of the service.
                                <br>4.7. The quality of the display of the StreamHub content may vary from device to device, and may be affected by a variety of factors, such as your location, the bandwidth available through and/or speed of your Internet connection. HD, Ultra HD and HDR availability is subject to your Internet service and device capabilities. Not all content is available in all formats, such as HD, Ultra HD or HDR and not all subscription plans allow you to receive content in all formats. Default playback settings on cellular networks exclude HD, Ultra HD and HDR content. The minimum connection speed for SD quality is 1.0 Mbps; however, we recommend a faster connection for improved video quality. A download speed of at least 3.0 Mbps per stream is recommended to receive HD content (defined as a resolution of 720p or higher). A download speed of at least 15.0 Mbps per stream is recommended to receive Ultra HD (defined as a resolution of 4K or higher). You are responsible for all Internet access charges. Please check with your Internet provider for information on possible Internet data usage charges. The time it takes to begin watching StreamHub content will vary based on a number of factors, including your location, available bandwidth at the time, the content you have selected and the configuration of your StreamHub ready device.
                                <br>4.8. StreamHub software is developed by, or for, StreamHub and may solely be used for authorized streaming and to access StreamHub content through StreamHub ready devices. This software may vary by device and medium, and functionalities and features may also differ between devices. You acknowledge that the use of the service may require third party software that is subject to third party licenses. You agree that you may automatically receive updated versions of the StreamHub software and related third-party software.
                                <br>
                                <br><span>5. Passwords and Account Access</span><br><br>The member who created the StreamHub account and whose Payment Method is charged (the "Account Owner") is responsible for any activity that occurs through the StreamHub account. To maintain control over the account and to prevent anyone from accessing the account (which would include information on viewing history for the account), the Account Owner should maintain control over the StreamHub ready devices that are used to access the service and not reveal the password or details of the Payment Method associated with the account to anyone. You are responsible for updating and maintaining the accuracy of the information you provide to us relating to your account. We can terminate your account or place your account on hold in order to protect you, StreamHub or our partners from identity theft or other fraudulent activity.
                                <br>
                                <br><span>6. Warranties and Limitations on Liability</span><br><br>The StreamHub service is provided "as is" and without warranty or condition. In particular, our service may not be uninterrupted or error-free. You waive all special, indirect and consequential damages against us. These terms will not limit any non-waivable warranties or consumer protection rights that you may be entitled to under the mandatory laws of your country of residence.
                                <br>
                                <br><span>7. Class Action Waiver</span><br><br>WHERE PERMITTED UNDER THE APPLICABLE LAW, YOU AND StreamHub AGREE THAT EACH MAY BRING CLAIMS AGAINST THE OTHER ONLY IN YOUR OR ITS INDIVIDUAL CAPACITY, AND NOT AS A PLAINTIFF OR CLASS MEMBER IN ANY PURPORTED CLASS OR REPRESENTATIVE PROCEEDING. Further, where permitted under the applicable law, unless both you and StreamHub agree otherwise, the court may not consolidate more than one person's claims with your claims, and may not otherwise preside over any form of a representative or class proceeding.
                                <br>
                                <br><span>8. Miscellaneous</span><br><br>
                                <br>8.1. Governing Law. These Terms of Use shall be governed by and construed in accordance with the laws of the Republic of Singapore.
                                <br>8.2. Unsolicited Materials. StreamHub does not accept unsolicited materials or ideas for StreamHub content and is not responsible for the similarity of any of its content or programming in any media to materials or ideas transmitted to StreamHub.
                                <br>8.3. Customer Support. To find more information about our service and its features or if you need assistance with your account, please visit the StreamHub Help Center, which is accessible through the streamhub.com website. In certain instances, Customer Service may best be able to assist you by using a remote access support tool through which we have full access to your computer. If you do not want us to have this access, you should not consent to support through the remote access tool, and we will assist you through other means. In the event of any conflict between these Terms of Use and information provided by Customer Support or other portions of our websites, these Terms of Use will control.
                                <br>8.4. Survival. If any provision or provisions of these Terms of Use shall be held to be invalid, illegal, or unenforceable, the validity, legality and enforceability of the remaining provisions shall remain in full force and effect.
                                <br>8.5. Changes to Terms of Use and Assignment. StreamHub may, from time to time, change these Terms of Use. We will notify you at least 30 days before such changes apply to you. We may assign or transfer our agreement with you including our associated rights and obligations at any time and you agree to cooperate with us in connection with such an assignment or transfer.
                                <br>8.6. Electronic Communications. We will send you information relating to your account (e.g. payment authorizations, invoices, changes in password or Payment Method, confirmation messages, notices) in electronic form only, for example via emails to your email address provided during registration.
                            <div id="agreeCheckboxDiv">
                                <input type="checkbox" onclick="isAgreeChecked()" id="agreeCheckbox"/>
                                <span>I Agree to StreamHub Terms of Use</span>
                            </div>
                            </p>
                        </div>
                        <div id="termsBtnsDiv">
                            <input type="submit" name="submit" id="registerBtn">REGISTER</input>
                        </div>
                    </div>
                </div>
            </form>
            
        </div>
        <?php
            include("php-scripts/background.php");

		?>
        <footer id="footer"> 
                <span> © 2021 - 2022 StreamHub.com. All rights reserved. </span> 
            </footer>
        <script src="script/register.js"></script>
        <script src="script/navbar.js"></script>
        <script src="script/toast.js"></script>
    </body>
</html>