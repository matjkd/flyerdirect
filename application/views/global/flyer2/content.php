<!--Main content page for garden site-->



<?php foreach ($content as $row): ?>
               <h2>
<?php
if (isset($title)) {
    echo $title;
}
?>
                </h2>

    <?php
    $is_logged_in = $this->session->userdata('is_logged_in');
    if (!isset($is_logged_in) || $is_logged_in == true) {
        echo "<a href='" . base_url() . "admin/edit/" . $row->content_id . "'>edit this page</a><br/>";
    }
    ?>

    <?php
    if (isset($age)) {
        $body = str_replace("[age]", "$age", "$row->content");
    } else {
        $body = $row->content;
    }
    ?>


<?php  $body = str_replace("FlyerDirect", "<strong>FlyerDirect</strong>", "$body");?>
<?php  $body = str_replace("Flyer Direct", "<strong>FlyerDirect</strong>", "$body");?>
<?php  $body = str_replace("leaflet distribution", "<strong>leaflet distribution</strong>", "$body");?>
<?php  $body = str_replace("Leaflet distribution", "<strong>Leaflet distribution</strong>", "$body");?>
<?php if($row->added_by != "") {?>
<em>By <?= $row->added_by ?></em>
<?php } ?>
    <?= $body ?>

<?php endforeach; ?>


<?php foreach ($content as $row): ?>
    <?php if ($row->extra != NULL) { ?>
        <?= $this->load->view('extra/'.$row->extra) ?>
    <?php } ?>
<?php endforeach; ?>
    <div style="clear:both;"></div>