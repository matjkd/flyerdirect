
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
    <head>

        <?= $this->load->view('template/' . $this->config_theme . '/header') ?>

    </head>

    <body>

        <!--   hidden input to pass base url to js files-->
        <input type="hidden" id="baseurl" value="<?= base_url() ?>"/>






        <!-- Primary Page Layout
        ================================================== -->

        <!-- Delete everything in this .container and get started on your own site! -->
        <div id="top_heading">
            <div class="container">
                <div class="ten columns logo" >
                    <h2 class="remove-bottom" ><img alt="Leaflet Distribution, Flyer Delivery, FlyerDirect London" src="<?= base_url() ?>images/template/flyerdirect/logo.png" width="188" /></h2>

                </div>
                <div class="six columns" >
                    <span  class="phonenumber"> <img src="<?= base_url() ?>images/template/flyerdirect/contact.png" /></span>

                </div>
            </div>


        </div>
        <div class="nav">
            <div class="container">
                <div class="sixteen columns left" id="menutop">

                    <?= $this->load->view('global/' . $this->config_theme . '/menu') ?>

                </div>

            </div>
        </div>

        <?= $this->load->view('/slideshow/slideshow') ?>

        <!--add top section here-->
        <?php if (isset($topsection) && $topsection != NULL) { ?>

            <div id="topbar" style="display:none;">
                <div class="container">
                    <?= $this->load->view("topbar/" . $topsection) ?>
                </div>
            </div>
        <?php } ?>


        <div class="container top_padding">







            <!--   set size of columns. -->
            <?php
            if (isset($mainsize)) {
                if ($mainsize == '0' xor $mainsize == NULL) {
                    $mainsize = "twelve";
                }
            } else {
                $mainsize = "twelve";
            }

            if (isset($rightsize)) {
                if ($rightsize == '0' xor $rightsize == NULL) {
                    $rightsize = "four";
                }
            } else {
                $rightsize = "four";
            }
            ?>

            <div class="<?= $mainsize ?> columns">



                <?= $this->load->view($main_content) ?>   
            </div>


            <div class="<?= $rightsize ?> columns features"  >  
                <?php
                if (isset($sidebox) && $sidebox != NULL) {
                    $this->load->view($sidebox);
                } else {
                	 $this->load->view('sidebox/flyer/mainsidebox');
                }
                ?>
            </div>

        </div><!-- container -->
        <div id="basebarfiller">&nbsp; </div>
        <div id="basebar">

            <div class="container">

                <div class="six columns" style="position:relative; z-index:502;">
                    <script src="http://www.freeindex.co.uk/widgets/awards.asp?BID=371510&type=1" type="text/javascript"></script>
                    <div style="text-align:center;width:326px;font-size:11px;font-family:arial;">Awarded by the FreeIndex 
                        <a style="font-family:arial;font-size:11px;" href="http://www.freeindex.co.uk/categories/business_services/advertising/leaflet_distribution/">Leaflet Distributors</a> directory</div>
                </div>
                <div class="ten columns" id="companylogos" style="z-index:0;">
                    <?= $this->load->view('global/flyer/links') ?>
                </div>

            </div>
        </div>

        <div class="sixteen columns" id="footerblock">
            <div class="container">
                <div class="sixteen columns">

                    <?= $this->load->view('global/flyer/seo_menu') ?>
                </div>

                <div class="twelve columns">
                    <?= $this->load->view('global/flyer2/footer_menu') ?>
                </div>
                <div class="four columns">
                    <?= $this->load->view('global/flyer/social_icons') ?>

                </div>
                
               <div class="sixteen columns footermenu">   
                <?=$this->load->view('global/flyer/menu')?> 
               </div>
            </div>


        </div>




        <?= $this->load->view('template/' . $this->config_theme . '/footer') ?>

        <!-- End Document
        ================================================== -->
    </body>
</html>