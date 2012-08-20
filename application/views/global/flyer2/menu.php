<ul>
	<li>
		<div style="float: left; padding-top: 3px;">
			<img src="<?= base_url() ?>images/icons/icons/radar.png" />
		</div>
		<div style="float: left; padding-top: 7px; padding-left: 10px;">
			<a target="_blank" href="http://mytrackpanel.com/trackit247/">tracker</a>
		</div>
		<div style="float: left; height: 33px;">
			<img height="33px" src="<?= base_url() ?>images/icons/nav-arrow.png" />
		</div>
	</li>
</ul>



<ul style="float: right;" id="maintopMenu">
	<li><?= anchor('/', 'home') ?></li>
	<li><?= anchor('/services', 'services') ?></li>
		<li><?= anchor('/seo', 'SEO') ?></li>
	<li><?= anchor('/about', 'about us') ?></li>
	<li><?= anchor('/news', 'news') ?></li>
	<li><?= anchor('/social', 'charity') ?></li>
	<li><?= anchor('/jobs', 'jobs') ?></li>
	<li><?= anchor('/links', 'links') ?></li>
	<li><?= anchor('/contact', 'contact') ?></li>


	<?php
	$is_logged_in = $this->session->userdata('is_logged_in');
	$role = $this->session->userdata('role');
	if ($is_logged_in != 0 || $role == 1) {

		echo anchor('admin', 'Admin');
	}
	?>

</ul>

<div id="dropdownMenu">
	<form name="jump1">
		<select name="myjumpbox"
			OnChange="location.href=jump1.myjumpbox.options[selectedIndex].value">
			<option value="<?=base_url()?>" selected>Home</option>
			<option value="<?=base_url()?>services">Services</option>
			<option value="<?=base_url()?>seo">SEO</option>
			<option value="<?=base_url()?>about">About Us</option>
			<option value="<?=base_url()?>social">Charity</option>
			<option value="<?=base_url()?>jobs">Jobs</option>
			<option value="<?=base_url()?>contact">Contact</option>
		</select>
	</form>
</div>

