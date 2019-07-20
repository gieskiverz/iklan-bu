<?php

function check_already_login() {
    $ci =& get_instance();
    $user_session = $ci->session->userdata('email');
    if($user_session) {
        redirect('login/keluar');
    }
}

function check_not_login() {
    $ci =& get_instance();
    $user_session = $ci->session->userdata('email');
    if(!$user_session) {
        redirect('login');
    }
}