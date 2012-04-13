
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
                <div class="sixteen columns" >
                    <h2 class="remove-bottom" ><img alt="Leaflet Distribution, Flyer Delivery, FlyerDirect London" src="<?= base_url() ?>images/template/flyerdirect/logo.png" width="188" height="66"/></h2>

                </div>
            </div>


        </div>
        <div class="nav">
            <div class="container">
                <div class="sixteen columns" id="menutop">
                    <?= $this->load->view('global/' . $this->config_theme . '/menu') ?>

                </div>
            </div>
        </div>

       <?=$this->load->view('/slideshow/slideshow')?>
        <!--add top section here-->
        <?php if (isset($topsection) && $topsection != NULL) { ?>

            <div id="topbar">
                <div class="container">
                    <?= $this->load->view("topbar/" . $topsection) ?>
                </div>
            </div>
        <?php } ?>


        <div class="container">







            <!--   set size of columns. -->
            <?php
            if (!isset($mainsize) xor $mainsize == '0' xor $mainsize == NULL) {
                $mainsize = "twelve";
            }
            if (!isset($rightsize) xor $rightsize == '0' xor $rightsize == NULL) {
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
                }
                ?>
            </div>

        </div><!-- container -->
        <div class="sixteen columns" id="footerblock">
            <div class="container">
                <div class="sixteen columns">
                   
                    <?= $this->load->view('global/flyer/seo_menu') ?>
                </div>




            </div>


        </div>




        <?= $this->load->view('template/' . $this->config_theme . '/footer') ?>

        <!-- End Document
        ================================================== -->
    </body>
</html>