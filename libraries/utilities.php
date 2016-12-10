<?php

// ====================================
// Copyright (c) 2016 Hallyu Publishing
// ====================================

    function utility_access() {
        
        global $access;
        
        if (empty($access)) die("Access denied");
        
    }
    
    
    function utility_redirect($file) {
        
        header('Location: ' . DOMAIN . $file);
        exit;
        
    }
    

    function utility_time_ago ($time) {
    
        $time = time() - $time + 1;
    
        $values = array (
        
            31536000	=> 'year',
            2592000 	=> 'month',
            604800 		=> 'week',
            86400 		=> 'day',
            3600 		=> 'hour',
            60 			=> 'minute',
            1 			=> 'second'
            
        );
    
        foreach ($values as $unit => $text):
            
            if ($time < $unit) continue;
            
            $number = floor($time / $unit);
            
            return $number . ' ' . "\n" . $text . (($number > 1) ? 's' : '');
            
        endforeach;
    
    }

    function U_song($song_id) {
        
        global $db;
            
        $song = $db->get_row("SELECT * FROM songs WHERE song_id = '$song_id' LIMIT 0, 1");
    
        if ($song):
            
            return array(
            
                'id' 		         => $song->song_id,
                'artist' 		     => $song->song_artist,
                'video' 	         => $song->song_video,
                'released' 	         => $song->song_released,
                'title'              => stripslashes($song->song_title),
                'lyrics'             => stripslashes($song->song_lyrics),
                'lyrics_approved'    => $song->song_lyrics_approved,
                'hangul_title'       => stripslashes($song->song_title_hangul),
                'hangul_lyrics'      => stripslashes($song->song_lyrics_hangul),
                'hangul_approved'    => $song->song_hangul_approved,
                'romanised_title'    => stripslashes($song->song_title_romanised),
                'romanised_lyrics'   => stripslashes($song->song_lyrics_romanised),
                'romanised_approved' => $song->song_romanised_approved
                
            );
        
        else:
        
            return array(
            
                'id' 		         => 0,
                'artist' 		     => 0,
                'video' 	         => 0,
                'released' 	         => 0,
                'title'              => 0,
                'lyrics'             => 0,
                'lyrics_approved'    => 0,
                'hangul_title'       => 0,
                'hangul_lyrics'      => 0,
                'hangul_approved'    => 0,
                'romanised_title'    => 0,
                'romanised_lyrics'   => 0,
                'romanised_approved' => 0
                
            );
            
        endif;
        
    }

    function U_countries() {
        
        return array (
        
            '0' => 'Not telling',	
            'AF' => 'Afghanistan',
            'AX' => 'Aland Islands',
            'AL' => 'Albania',
            'DZ' => 'Algeria',
            'AS' => 'American Samoa',
            'AD' => 'Andorra',
            'AO' => 'Angola',
            'AI' => 'Anguilla',
            'AQ' => 'Antarctica',
            'AG' => 'Antigua And Barbuda',
            'AR' => 'Argentina',
            'AM' => 'Armenia',
            'AW' => 'Aruba',
            'AU' => 'Australia',
            'AT' => 'Austria',
            'AZ' => 'Azerbaijan',
            'BS' => 'Bahamas',
            'BH' => 'Bahrain',
            'BD' => 'Bangladesh',
            'BB' => 'Barbados',
            'BY' => 'Belarus',
            'BE' => 'Belgium',
            'BZ' => 'Belize',
            'BJ' => 'Benin',
            'BM' => 'Bermuda',
            'BT' => 'Bhutan',
            'BO' => 'Bolivia',
            'BA' => 'Bosnia And Herzegovina',
            'BW' => 'Botswana',
            'BV' => 'Bouvet Island',
            'BR' => 'Brazil',
            'IO' => 'British Indian Ocean Territory',
            'BN' => 'Brunei Darussalam',
            'BG' => 'Bulgaria',
            'BF' => 'Burkina Faso',
            'BI' => 'Burundi',
            'KH' => 'Cambodia',
            'CM' => 'Cameroon',
            'CA' => 'Canada',
            'CV' => 'Cape Verde',
            'KY' => 'Cayman Islands',
            'CF' => 'Central African Republic',
            'TD' => 'Chad',
            'CL' => 'Chile',
            'CN' => 'China',
            'CX' => 'Christmas Island',
            'CC' => 'Cocos (Keeling) Islands',
            'CO' => 'Colombia',
            'KM' => 'Comoros',
            'CG' => 'Congo',
            'CD' => 'Congo, Democratic Republic',
            'CK' => 'Cook Islands',
            'CR' => 'Costa Rica',
            'CI' => 'Cote D\'Ivoire',
            'HR' => 'Croatia',
            'CU' => 'Cuba',
            'CY' => 'Cyprus',
            'CZ' => 'Czech Republic',
            'DK' => 'Denmark',
            'DJ' => 'Djibouti',
            'DM' => 'Dominica',
            'DO' => 'Dominican Republic',
            'EC' => 'Ecuador',
            'EG' => 'Egypt',
            'SV' => 'El Salvador',
            'GQ' => 'Equatorial Guinea',
            'ER' => 'Eritrea',
            'EE' => 'Estonia',
            'ET' => 'Ethiopia',
            'FK' => 'Falkland Islands (Malvinas)',
            'FO' => 'Faroe Islands',
            'FJ' => 'Fiji',
            'FI' => 'Finland',
            'FR' => 'France',
            'GF' => 'French Guiana',
            'PF' => 'French Polynesia',
            'TF' => 'French Southern Territories',
            'GA' => 'Gabon',
            'GM' => 'Gambia',
            'GE' => 'Georgia',
            'DE' => 'Germany',
            'GH' => 'Ghana',
            'GI' => 'Gibraltar',
            'GR' => 'Greece',
            'GL' => 'Greenland',
            'GD' => 'Grenada',
            'GP' => 'Guadeloupe',
            'GU' => 'Guam',
            'GT' => 'Guatemala',
            'GG' => 'Guernsey',
            'GN' => 'Guinea',
            'GW' => 'Guinea-Bissau',
            'GY' => 'Guyana',
            'HT' => 'Haiti',
            'HM' => 'Heard Island & Mcdonald Islands',
            'VA' => 'Holy See (Vatican City State)',
            'HN' => 'Honduras',
            'HK' => 'Hong Kong',
            'HU' => 'Hungary',
            'IS' => 'Iceland',
            'IN' => 'India',
            'ID' => 'Indonesia',
            'IR' => 'Iran, Islamic Republic Of',
            'IQ' => 'Iraq',
            'IE' => 'Ireland',
            'IM' => 'Isle Of Man',
            'IL' => 'Israel',
            'IT' => 'Italy',
            'JM' => 'Jamaica',
            'JP' => 'Japan',
            'JE' => 'Jersey',
            'JO' => 'Jordan',
            'KZ' => 'Kazakhstan',
            'KE' => 'Kenya',
            'KI' => 'Kiribati',
            'KR' => 'Korea',
            'KW' => 'Kuwait',
            'KG' => 'Kyrgyzstan',
            'LA' => 'Lao People\'s Democratic Republic',
            'LV' => 'Latvia',
            'LB' => 'Lebanon',
            'LS' => 'Lesotho',
            'LR' => 'Liberia',
            'LY' => 'Libyan Arab Jamahiriya',
            'LI' => 'Liechtenstein',
            'LT' => 'Lithuania',
            'LU' => 'Luxembourg',
            'MO' => 'Macao',
            'MK' => 'Macedonia',
            'MG' => 'Madagascar',
            'MW' => 'Malawi',
            'MY' => 'Malaysia',
            'MV' => 'Maldives',
            'ML' => 'Mali',
            'MT' => 'Malta',
            'MH' => 'Marshall Islands',
            'MQ' => 'Martinique',
            'MR' => 'Mauritania',
            'MU' => 'Mauritius',
            'YT' => 'Mayotte',
            'MX' => 'Mexico',
            'FM' => 'Micronesia, Federated States Of',
            'MD' => 'Moldova',
            'MC' => 'Monaco',
            'MN' => 'Mongolia',
            'ME' => 'Montenegro',
            'MS' => 'Montserrat',
            'MA' => 'Morocco',
            'MZ' => 'Mozambique',
            'MM' => 'Myanmar',
            'NA' => 'Namibia',
            'NR' => 'Nauru',
            'NP' => 'Nepal',
            'NL' => 'Netherlands',
            'AN' => 'Netherlands Antilles',
            'NC' => 'New Caledonia',
            'NZ' => 'New Zealand',
            'NI' => 'Nicaragua',
            'NE' => 'Niger',
            'NG' => 'Nigeria',
            'NU' => 'Niue',
            'NF' => 'Norfolk Island',
            'MP' => 'Northern Mariana Islands',
            'NO' => 'Norway',
            'OM' => 'Oman',
            'PK' => 'Pakistan',
            'PW' => 'Palau',
            'PS' => 'Palestinian Territory, Occupied',
            'PA' => 'Panama',
            'PG' => 'Papua New Guinea',
            'PY' => 'Paraguay',
            'PE' => 'Peru',
            'PH' => 'Philippines',
            'PN' => 'Pitcairn',
            'PL' => 'Poland',
            'PT' => 'Portugal',
            'PR' => 'Puerto Rico',
            'QA' => 'Qatar',
            'RE' => 'Reunion',
            'RO' => 'Romania',
            'RU' => 'Russian Federation',
            'RW' => 'Rwanda',
            'BL' => 'Saint Barthelemy',
            'SH' => 'Saint Helena',
            'KN' => 'Saint Kitts And Nevis',
            'LC' => 'Saint Lucia',
            'MF' => 'Saint Martin',
            'PM' => 'Saint Pierre And Miquelon',
            'VC' => 'Saint Vincent And Grenadines',
            'WS' => 'Samoa',
            'SM' => 'San Marino',
            'ST' => 'Sao Tome And Principe',
            'SA' => 'Saudi Arabia',
            'SN' => 'Senegal',
            'RS' => 'Serbia',
            'SC' => 'Seychelles',
            'SL' => 'Sierra Leone',
            'SG' => 'Singapore',
            'SK' => 'Slovakia',
            'SI' => 'Slovenia',
            'SB' => 'Solomon Islands',
            'SO' => 'Somalia',
            'ZA' => 'South Africa',
            'GS' => 'South Georgia And Sandwich Isl.',
            'ES' => 'Spain',
            'LK' => 'Sri Lanka',
            'SD' => 'Sudan',
            'SR' => 'Suriname',
            'SJ' => 'Svalbard And Jan Mayen',
            'SZ' => 'Swaziland',
            'SE' => 'Sweden',
            'CH' => 'Switzerland',
            'SY' => 'Syrian Arab Republic',
            'TW' => 'Taiwan',
            'TJ' => 'Tajikistan',
            'TZ' => 'Tanzania',
            'TH' => 'Thailand',
            'TL' => 'Timor-Leste',
            'TG' => 'Togo',
            'TK' => 'Tokelau',
            'TO' => 'Tonga',
            'TT' => 'Trinidad And Tobago',
            'TN' => 'Tunisia',
            'TR' => 'Turkey',
            'TM' => 'Turkmenistan',
            'TC' => 'Turks And Caicos Islands',
            'TV' => 'Tuvalu',
            'UG' => 'Uganda',
            'UA' => 'Ukraine',
            'AE' => 'United Arab Emirates',
            'GB' => 'United Kingdom',
            'US' => 'United States',
            'UM' => 'United States Outlying Islands',
            'UY' => 'Uruguay',
            'UZ' => 'Uzbekistan',
            'VU' => 'Vanuatu',
            'VE' => 'Venezuela',
            'VN' => 'Viet Nam',
            'VG' => 'Virgin Islands, British',
            'VI' => 'Virgin Islands, U.S.',
            'WF' => 'Wallis And Futuna',
            'EH' => 'Western Sahara',
            'YE' => 'Yemen',
            'ZM' => 'Zambia',
            'ZW' => 'Zimbabwe'
            
        );
        
    }
    
    function U_select_countries() {
        
        echo	'<option value="unchanged" required>Unchanged</option>' . "\n" .
                '<option value="">Not telling</option>' . "\n" .
                '<option value="AF">Afghanistan</option>' . "\n" .
                '<option value="AX">Åland Islands</option>' . "\n" .
                '<option value="AL">Albania</option>' . "\n" .
                '<option value="DZ">Algeria</option>' . "\n" .
                '<option value="AS">American Samoa</option>' . "\n" .
                '<option value="AD">Andorra</option>' . "\n" .
                '<option value="AO">Angola</option>' . "\n" .
                '<option value="AI">Anguilla</option>' . "\n" .
                '<option value="AQ">Antarctica</option>' . "\n" .
                '<option value="AG">Antigua and Barbuda</option>' . "\n" .
                '<option value="AR">Argentina</option>' . "\n" .
                '<option value="AM">Armenia</option>' . "\n" .
                '<option value="AW">Aruba</option>' . "\n" .
                '<option value="AU">Australia</option>' . "\n" .
                '<option value="AT">Austria</option>' . "\n" .
                '<option value="AZ">Azerbaijan</option>' . "\n" .
                '<option value="BS">Bahamas</option>' . "\n" .
                '<option value="BH">Bahrain</option>' . "\n" .
                '<option value="BD">Bangladesh</option>' . "\n" .
                '<option value="BB">Barbados</option>' . "\n" .
                '<option value="BY">Belarus</option>' . "\n" .
                '<option value="BE">Belgium</option>' . "\n" .
                '<option value="BZ">Belize</option>' . "\n" .
                '<option value="BJ">Benin</option>' . "\n" .
                '<option value="BM">Bermuda</option>' . "\n" .
                '<option value="BT">Bhutan</option>' . "\n" .
                '<option value="BO">Bolivia, Plurinational State of</option>' . "\n" .
                '<option value="BQ">Bonaire, Sint Eustatius and Saba</option>' . "\n" .
                '<option value="BA">Bosnia and Herzegovina</option>' . "\n" .
                '<option value="BW">Botswana</option>' . "\n" .
                '<option value="BV">Bouvet Island</option>' . "\n" .
                '<option value="BR">Brazil</option>' . "\n" .
                '<option value="IO">British Indian Ocean Territory</option>' . "\n" .
                '<option value="BN">Brunei Darussalam</option>' . "\n" .
                '<option value="BG">Bulgaria</option>' . "\n" .
                '<option value="BF">Burkina Faso</option>' . "\n" .
                '<option value="BI">Burundi</option>' . "\n" .
                '<option value="KH">Cambodia</option>' . "\n" .
                '<option value="CM">Cameroon</option>' . "\n" .
                '<option value="CA">Canada</option>' . "\n" .
                '<option value="CV">Cape Verde</option>' . "\n" .
                '<option value="KY">Cayman Islands</option>' . "\n" .
                '<option value="CF">Central African Republic</option>' . "\n" .
                '<option value="TD">Chad</option>' . "\n" .
                '<option value="CL">Chile</option>' . "\n" .
                '<option value="CN">China</option>' . "\n" .
                '<option value="CX">Christmas Island</option>' . "\n" .
                '<option value="CC">Cocos (Keeling) Islands</option>' . "\n" .
                '<option value="CO">Colombia</option>' . "\n" .
                '<option value="KM">Comoros</option>' . "\n" .
                '<option value="CG">Congo</option>' . "\n" .
                '<option value="CD">Congo, the Democratic Republic of the</option>' . "\n" .
                '<option value="CK">Cook Islands</option>' . "\n" .
                '<option value="CR">Costa Rica</option>' . "\n" .
                '<option value="CI">Côte d\'Ivoire</option>' . "\n" .
                '<option value="HR">Croatia</option>' . "\n" .
                '<option value="CU">Cuba</option>' . "\n" .
                '<option value="CW">Curaçao</option>' . "\n" .
                '<option value="CY">Cyprus</option>' . "\n" .
                '<option value="CZ">Czech Republic</option>' . "\n" .
                '<option value="DK">Denmark</option>' . "\n" .
                '<option value="DJ">Djibouti</option>' . "\n" .
                '<option value="DM">Dominica</option>' . "\n" .
                '<option value="DO">Dominican Republic</option>' . "\n" .
                '<option value="EC">Ecuador</option>' . "\n" .
                '<option value="EG">Egypt</option>' . "\n" .
                '<option value="SV">El Salvador</option>' . "\n" .
                '<option value="GQ">Equatorial Guinea</option>' . "\n" .
                '<option value="ER">Eritrea</option>' . "\n" .
                '<option value="EE">Estonia</option>' . "\n" .
                '<option value="ET">Ethiopia</option>' . "\n" .
                '<option value="FK">Falkland Islands (Malvinas)</option>' . "\n" .
                '<option value="FO">Faroe Islands</option>' . "\n" .
                '<option value="FJ">Fiji</option>' . "\n" .
                '<option value="FI">Finland</option>' . "\n" .
                '<option value="FR">France</option>' . "\n" .
                '<option value="GF">French Guiana</option>' . "\n" .
                '<option value="PF">French Polynesia</option>' . "\n" .
                '<option value="TF">French Southern Territories</option>' . "\n" .
                '<option value="GA">Gabon</option>' . "\n" .
                '<option value="GM">Gambia</option>' . "\n" .
                '<option value="GE">Georgia</option>' . "\n" .
                '<option value="DE">Germany</option>' . "\n" .
                '<option value="GH">Ghana</option>' . "\n" .
                '<option value="GI">Gibraltar</option>' . "\n" .
                '<option value="GR">Greece</option>' . "\n" .
                '<option value="GL">Greenland</option>' . "\n" .
                '<option value="GD">Grenada</option>' . "\n" .
                '<option value="GP">Guadeloupe</option>' . "\n" .
                '<option value="GU">Guam</option>' . "\n" .
                '<option value="GT">Guatemala</option>' . "\n" .
                '<option value="GG">Guernsey</option>' . "\n" .
                '<option value="GN">Guinea</option>' . "\n" .
                '<option value="GW">Guinea-Bissau</option>' . "\n" .
                '<option value="GY">Guyana</option>' . "\n" .
                '<option value="HT">Haiti</option>' . "\n" .
                '<option value="HM">Heard Island and McDonald Islands</option>' . "\n" .
                '<option value="VA">Holy See (Vatican City State)</option>' . "\n" .
                '<option value="HN">Honduras</option>' . "\n" .
                '<option value="HK">Hong Kong</option>' . "\n" .
                '<option value="HU">Hungary</option>' . "\n" .
                '<option value="IS">Iceland</option>' . "\n" .
                '<option value="IN">India</option>' . "\n" .
                '<option value="ID">Indonesia</option>' . "\n" .
                '<option value="IR">Iran, Islamic Republic of</option>' . "\n" .
                '<option value="IQ">Iraq</option>' . "\n" .
                '<option value="IE">Ireland</option>' . "\n" .
                '<option value="IM">Isle of Man</option>' . "\n" .
                '<option value="IL">Israel</option>' . "\n" .
                '<option value="IT">Italy</option>' . "\n" .
                '<option value="JM">Jamaica</option>' . "\n" .
                '<option value="JP">Japan</option>' . "\n" .
                '<option value="JE">Jersey</option>' . "\n" .
                '<option value="JO">Jordan</option>' . "\n" .
                '<option value="KZ">Kazakhstan</option>' . "\n" .
                '<option value="KE">Kenya</option>' . "\n" .
                '<option value="KI">Kiribati</option>' . "\n" .
                '<option value="KP">Korea, Democratic People\'s Republic of</option>' . "\n" .
                '<option value="KR">Korea, Republic of</option>' . "\n" .
                '<option value="KW">Kuwait</option>' . "\n" .
                '<option value="KG">Kyrgyzstan</option>' . "\n" .
                '<option value="LA">Lao People\'s Democratic Republic</option>' . "\n" .
                '<option value="LV">Latvia</option>' . "\n" .
                '<option value="LB">Lebanon</option>' . "\n" .
                '<option value="LS">Lesotho</option>' . "\n" .
                '<option value="LR">Liberia</option>' . "\n" .
                '<option value="LY">Libya</option>' . "\n" .
                '<option value="LI">Liechtenstein</option>' . "\n" .
                '<option value="LT">Lithuania</option>' . "\n" .
                '<option value="LU">Luxembourg</option>' . "\n" .
                '<option value="MO">Macao</option>' . "\n" .
                '<option value="MK">Macedonia, the former Yugoslav Republic of</option>' . "\n" .
                '<option value="MG">Madagascar</option>' . "\n" .
                '<option value="MW">Malawi</option>' . "\n" .
                '<option value="MY">Malaysia</option>' . "\n" .
                '<option value="MV">Maldives</option>' . "\n" .
                '<option value="ML">Mali</option>' . "\n" .
                '<option value="MT">Malta</option>' . "\n" .
                '<option value="MH">Marshall Islands</option>' . "\n" .
                '<option value="MQ">Martinique</option>' . "\n" .
                '<option value="MR">Mauritania</option>' . "\n" .
                '<option value="MU">Mauritius</option>' . "\n" .
                '<option value="YT">Mayotte</option>' . "\n" .
                '<option value="MX">Mexico</option>' . "\n" .
                '<option value="FM">Micronesia, Federated States of</option>' . "\n" .
                '<option value="MD">Moldova, Republic of</option>' . "\n" .
                '<option value="MC">Monaco</option>' . "\n" .
                '<option value="MN">Mongolia</option>' . "\n" .
                '<option value="ME">Montenegro</option>' . "\n" .
                '<option value="MS">Montserrat</option>' . "\n" .
                '<option value="MA">Morocco</option>' . "\n" .
                '<option value="MZ">Mozambique</option>' . "\n" .
                '<option value="MM">Myanmar</option>' . "\n" .
                '<option value="NA">Namibia</option>' . "\n" .
                '<option value="NR">Nauru</option>' . "\n" .
                '<option value="NP">Nepal</option>' . "\n" .
                '<option value="NL">Netherlands</option>' . "\n" .
                '<option value="NC">New Caledonia</option>' . "\n" .
                '<option value="NZ">New Zealand</option>' . "\n" .
                '<option value="NI">Nicaragua</option>' . "\n" .
                '<option value="NE">Niger</option>' . "\n" .
                '<option value="NG">Nigeria</option>' . "\n" .
                '<option value="NU">Niue</option>' . "\n" .
                '<option value="NF">Norfolk Island</option>' . "\n" .
                '<option value="MP">Northern Mariana Islands</option>' . "\n" .
                '<option value="NO">Norway</option>' . "\n" .
                '<option value="OM">Oman</option>' . "\n" .
                '<option value="PK">Pakistan</option>' . "\n" .
                '<option value="PW">Palau</option>' . "\n" .
                '<option value="PS">Palestinian Territory, Occupied</option>' . "\n" .
                '<option value="PA">Panama</option>' . "\n" .
                '<option value="PG">Papua New Guinea</option>' . "\n" .
                '<option value="PY">Paraguay</option>' . "\n" .
                '<option value="PE">Peru</option>' . "\n" .
                '<option value="PH">Philippines</option>' . "\n" .
                '<option value="PN">Pitcairn</option>' . "\n" .
                '<option value="PL">Poland</option>' . "\n" .
                '<option value="PT">Portugal</option>' . "\n" .
                '<option value="PR">Puerto Rico</option>' . "\n" .
                '<option value="QA">Qatar</option>' . "\n" .
                '<option value="RE">Réunion</option>' . "\n" .
                '<option value="RO">Romania</option>' . "\n" .
                '<option value="RU">Russian Federation</option>' . "\n" .
                '<option value="RW">Rwanda</option>' . "\n" .
                '<option value="BL">Saint Barthélemy</option>' . "\n" .
                '<option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>' . "\n" .
                '<option value="KN">Saint Kitts and Nevis</option>' . "\n" .
                '<option value="LC">Saint Lucia</option>' . "\n" .
                '<option value="MF">Saint Martin (French part)</option>' . "\n" .
                '<option value="PM">Saint Pierre and Miquelon</option>' . "\n" .
                '<option value="VC">Saint Vincent and the Grenadines</option>' . "\n" .
                '<option value="WS">Samoa</option>' . "\n" .
                '<option value="SM">San Marino</option>' . "\n" .
                '<option value="ST">Sao Tome and Principe</option>' . "\n" .
                '<option value="SA">Saudi Arabia</option>' . "\n" .
                '<option value="SN">Senegal</option>' . "\n" .
                '<option value="RS">Serbia</option>' . "\n" .
                '<option value="SC">Seychelles</option>' . "\n" .
                '<option value="SL">Sierra Leone</option>' . "\n" .
                '<option value="SG">Singapore</option>' . "\n" .
                '<option value="SX">Sint Maarten (Dutch part)</option>' . "\n" .
                '<option value="SK">Slovakia</option>' . "\n" .
                '<option value="SI">Slovenia</option>' . "\n" .
                '<option value="SB">Solomon Islands</option>' . "\n" .
                '<option value="SO">Somalia</option>' . "\n" .
                '<option value="ZA">South Africa</option>' . "\n" .
                '<option value="GS">South Georgia and the South Sandwich Islands</option>' . "\n" .
                '<option value="SS">South Sudan</option>' . "\n" .
                '<option value="ES">Spain</option>' . "\n" .
                '<option value="LK">Sri Lanka</option>' . "\n" .
                '<option value="SD">Sudan</option>' . "\n" .
                '<option value="SR">Suriname</option>' . "\n" .
                '<option value="SJ">Svalbard and Jan Mayen</option>' . "\n" .
                '<option value="SZ">Swaziland</option>' . "\n" .
                '<option value="SE">Sweden</option>' . "\n" .
                '<option value="CH">Switzerland</option>' . "\n" .
                '<option value="SY">Syrian Arab Republic</option>' . "\n" .
                '<option value="TW">Taiwan, Province of China</option>' . "\n" .
                '<option value="TJ">Tajikistan</option>' . "\n" .
                '<option value="TZ">Tanzania, United Republic of</option>' . "\n" .
                '<option value="TH">Thailand</option>' . "\n" .
                '<option value="TL">Timor-Leste</option>' . "\n" .
                '<option value="TG">Togo</option>' . "\n" .
                '<option value="TK">Tokelau</option>' . "\n" .
                '<option value="TO">Tonga</option>' . "\n" .
                '<option value="TT">Trinidad and Tobago</option>' . "\n" .
                '<option value="TN">Tunisia</option>' . "\n" .
                '<option value="TR">Turkey</option>' . "\n" .
                '<option value="TM">Turkmenistan</option>' . "\n" .
                '<option value="TC">Turks and Caicos Islands</option>' . "\n" .
                '<option value="TV">Tuvalu</option>' . "\n" .
                '<option value="UG">Uganda</option>' . "\n" .
                '<option value="UA">Ukraine</option>' . "\n" .
                '<option value="AE">United Arab Emirates</option>' . "\n" .
                '<option value="GB">United Kingdom</option>' . "\n" .
                '<option value="US">United States</option>' . "\n" .
                '<option value="UM">United States Minor Outlying Islands</option>' . "\n" .
                '<option value="UY">Uruguay</option>' . "\n" .
                '<option value="UZ">Uzbekistan</option>' . "\n" .
                '<option value="VU">Vanuatu</option>' . "\n" .
                '<option value="VE">Venezuela, Bolivarian Republic of</option>' . "\n" .
                '<option value="VN">Viet Nam</option>' . "\n" .
                '<option value="VG">Virgin Islands, British</option>' . "\n" .
                '<option value="VI">Virgin Islands, U.S.</option>' . "\n" .
                '<option value="WF">Wallis and Futuna</option>' . "\n" .
                '<option value="EH">Western Sahara</option>' . "\n" .
                '<option value="YE">Yemen</option>' . "\n" .
                '<option value="ZM">Zambia</option>' . "\n" .
                '<option value="ZW">Zimbabwe</option>';
        
    }
    
    function utility_insert_log ($operation, $data) {
        
        global $db, $member;
        
        $user = $member['id'];
        $time = time();
        $ip = $_SERVER['REMOTE_ADDR'];
        $operation = addslashes($operation);
        $data = addslashes($data);
        
        $db->query("INSERT INTO logs VALUES (0, '$user', '$operation', '$data', '$time', '$ip')");
        
    }