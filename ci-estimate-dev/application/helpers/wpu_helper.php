<?php

function is_logged_in()
{

    $ci  = get_instance();
    if (!$ci->session->userdata('userID')) {
        redirect('auth');
    } else {
        $AppAcc = $ci->session->userdata('ApprovalAccess');

        $menu = $ci->uri->segment(4);
    }
}