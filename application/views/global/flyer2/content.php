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


    <?php $body = str_replace("Loughton Seedbed Centre", "<strong>Loughton Seedbed Centre</strong>", "$body"); ?>



    <?= $body ?>

<?php endforeach; ?>


<?php foreach ($content as $row): ?>
    <?php if ($row->extra != NULL) { ?>
        <?= $this->load->view('extra/'.$row->extra) ?>
    <?php } ?>
<?php endforeach; ?>
    <div style="clear:both;"></div>