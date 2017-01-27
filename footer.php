<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Street_Sheet_Theme
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
            <div class="streetsheet-footer-bar">
                <div class="streetsheet-footer-1">
                    <b>CONTACT US</b>
                    <p>
                        Street Sheet<br>
                        468 Turk Street<br>
                        San Francisco, CA 94102
                    </p>
                    <p>
                        Call: (415) 346-3740 ext 309
                    </p>
                </div>
                <div class="streetsheet-footer-2">
                    <b>NEWSLETTER SIGN-UP</b>
                        <?php
                            $args = array(  'prepend' => '', 
                                            'showname' => true,
                                            'nametxt' => '', 
                                            'nameholder' => 'Name', 
                                            'emailtxt' => '',
                                            'emailholder' => 'Email', 
                                            'showsubmit' => true, 
                                            'submittxt' => 'Submit', 
                                            'jsthanks' => true,
                                            'thankyou' => 'Thank you for subscribing to our mailing list'
                                         );
                            echo smlsubform($args);
                        ?>
                </div>
                <div class="streetsheet-footer-3">
                    <b>SOCIAL MEDIA</b>
                    <p>
                        <a href="https://www.facebook.com/streetsheetsf/ " target="_blank"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a>
                        <a href="https://twitter.com/TheCoalitionSF" target="_blank"><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></a>
                    </p>
                </div>
                <hr>
            </div>
            <div class="site-info">
                ©Copyright 2017 Street Sheet. All rights reserved.<br>Website Designed & Developed by <a href="https://www.linkedin.com/in/crystalcross">Crystal Cross</a>
            </div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
