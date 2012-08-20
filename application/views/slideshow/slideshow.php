<div class="big_menu" style="display:none;">
    <div class="container">

        <div class="six  columns"  id="headerimage">
            <div class="slideshow-0">
                <img  src="<?= base_url() ?>images/slides/manonmap.jpg"/>
               
                 <img src="<?= base_url() ?>images/slides/design.jpg"/>
                  <img src="<?= base_url() ?>images/slides/seo.jpg"/>
            </div>
        </div>




        <div class="ten columns " id="headertext"> 
            <div class="slideshow-1" >
                <img src="<?= base_url() ?>images/slides/slide1Title.png"/>
                 <img src="<?= base_url() ?>images/slides/slideSpecialOffer.png"/>
                <img src="<?= base_url() ?>images/slides/seotitle.png"/>
               
            </div>
            <div class="six columns omega">

                <div class="slideshow-2">
                    &nbsp;
                    <span>  Professional Campaign Planning and Leaflet Distribution from Flyer Direct </span>

                     <span> Shared leaflet distribution from £35.00 per thousand<br/>
                         <a href="<?= base_url() ?>welcome/home/special-offer">Click here for more info</a> </span>


                    <span> Take advantage of our Search Engine Optimisation packages.<br/> <a href="<?= base_url() ?>seo">Click here for more info</a> </span>
                    
                    
                </div>
            </div>

            <div class="four columns omega">
                <div class="bluebox " id="freequote" >
                    <div id="bluebox_content" >
                        <img  id="opener"  src="<?= base_url() ?>images/titles/freequote.png"/>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>


<div id="dialog" title="Get a Free Quote" style="display:none; z-index:9999; ">
    <div id="quote_form">
        <?= form_open('email/quote'); ?>
        <br/>

        <?= form_label('Full Name') ?>
        <p class="form_name">

            <?= form_input('name', set_value('name')) ?>
        </p>

        <?= form_label('Phone Number') ?>
        <p class="form_phone">

            <?= form_input('phone', set_value('phone')) ?>
        </p>

        <?= form_label('Email') ?>
        <p class="form_email">

            <?= form_input('email', set_value('email')) ?>
        </p>
        <?= form_label('Subject') ?>
        <p class="form_subject">
            <?= form_input('qsubject', set_value('qsubject')) ?>
        </p>

        <p class="form_message">
            <?= form_textarea('qmessage', set_value('qmessage')) ?>
        </p>

        Enter the word you see below<br/>



        <input type="text" name="captcha" value="" /><br/>
        <?= form_label($captcha['image']) ?>

        <?= form_hidden('ip_address', $this->input->ip_address()) ?>
        <?= form_hidden('time', $captcha['time']) ?>
        <div id="contact_submit"><?= form_submit('submit', 'Submit') ?></div><br/>
        <?= form_close() ?>

    </div>
</div>