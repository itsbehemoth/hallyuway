<?php

// ====================================
// Copyright (c) 2016 Hallyu Publishing
// ====================================

    function member_online($online_id) {
        
        global $db;
        
        $online_time = time();        
        $online_ip = $_SERVER['REMOTE_ADDR'];
    
        $db->query("UPDATE members SET member_visited = '$online_time', member_ip = '$online_ip' WHERE member_id = '$online_id'");
        
    }
    
    function member_fetch($fetch_id) {
        
        global $db;
            
        $member = $db->get_row("SELECT * FROM members WHERE member_id = '$fetch_id' LIMIT 0, 1");
    
        if ($member):
            
            return array(
            
                'id' 					=> $member->member_id,
                'name' 					=> stripslashes($member->member_name),
                'surname' 				=> stripslashes($member->member_surname),
                'email' 				=> stripslashes($member->member_email),
                'password' 				=> $member->member_password,
                'joined'				=> $member->member_joined,
                'birthdate'				=> $member->member_birthdate,
                'gender'				=> $member->member_gender,
                'visited'				=> $member->member_visited,
                'status'				=> $member->member_status,
                'level'					=> $member->member_level,
                'joined_ip'				=> $member->member_joined_ip,
                'ip'					=> $member->member_ip,
                'location'				=> $member->member_location,
                'about'					=> stripslashes($member->member_about),
                'ultimate_group'		=> stripslashes($member->member_ultimate_group),
                'ultimate_bias'			=> stripslashes($member->member_ultimate_bias),
                'subscribed'			=> $member->member_subscribed,
                'birthdate_permissions'	=> $member->member_birthdate_permissions,
                'email_permissions'		=> $member->member_email_permissions,
                'picture'               => $member->member_picture,
                'login'					=> 1
            
            );
            
        else:
            
            return array(
        
                'id' 					=> 0,
                'name' 					=> 0,
                'surname' 				=> 0,
                'email' 				=> 0,
                'password' 				=> 0,
                'joined'				=> 0,
                'birthdate'				=> 0,
                'gender'				=> 0,
                'visited'				=> 0,
                'status'				=> 0,
                'level'					=> 0,
                'joined_ip'				=> 0,
                'ip'					=> 0,
                'location'				=> 0,
                'about'					=> 0,
                'subscribed'			=> 0,
                'birthdate_permissions'	=> 0,
                'email_permissions'		=> 0,
                'picture'               => 0,
                'login'					=> 0
                
            );	
            
        endif;
        
    }
