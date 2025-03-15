<?php

require_login();

$url = \local_tenant\helpers\url_helper::make_tenant_url('quacker', 'index.php');
$PAGE->set_url($url);
$PAGE->set_context(context_system::instance());

$PAGE->set_title("The quacking index!");
echo $OUTPUT->header();

$renderer = $PAGE->get_renderer('tenantplugin_quacker');
echo $renderer->render_index();

echo $OUTPUT->footer();

