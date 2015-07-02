<?php
// Set custommenu for frontpage only.
$custommenu = $OUTPUT->custom_menu($PAGE->theme->settings->custommenuitems);
$hascustommenu = (empty($PAGE->layout_options['nocustommenu']) && !empty($custommenu));
$hasbrandicon = (!empty($PAGE->theme->settings->brandicon));
?>

<div role="banner" class="navbar navbar-fixed-top moodle-has-zindex">
<nav role="navigation" class="navbar-inner">
<div class="container-fluid">
<?php
if ( $hasbrandicon ) {
    echo '<a class="brand" href="<' . $CFG->wwwroot. '"></a>';
} else {
    echo '<a class="brand" href="<' . $CFG->wwwroot. '>"><i class="fa fa-home"></i></a>';
} ?>
<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</a>
<?php echo $OUTPUT->user_menu(); ?>
<div class="nav-collapse collapse">

<?php
if ( $hascustommenu && !isloggedin()) {
    echo $custommenu;
} else {
    echo $OUTPUT->custom_menu();
} ?>
<ul class="nav pull-right">
        <li><?php echo $OUTPUT->page_heading_menu(); ?></li>
</ul>
</div>
</div>
</nav>
</div>
