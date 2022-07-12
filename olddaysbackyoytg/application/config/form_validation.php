<?php

$config = [

	'student_signup' => [

                              [
                              'field' => 'sname',
                              'label' => 'Name',
                              'rules' => 'required'
                              ],

                              [
                              'field' => 'semail',
                              'label' => 'Email Address',
                              'rules' => 'required|valid_email'
                              ],

                 			[
                              'field' => 'smobile',
                              'label' => 'Contact Number',
                              'rules' => 'required|numeric|exact_length[10]'
                              ],

                              [
                              'field' => 'spwd',
                              'label' => 'Password',
                              'rules' => 'required|min_length[6]'
                              ],

                              [
                              'field' => 'saddress',
                              'label' => 'Address',
                              'rules' => 'required'
                              ],

                              [
                              'field' => 'spin',
                              'label' => 'Postal Code',
                              'rules' => 'required'
                              ],
                			[
                              'field' => 'cpwd',
                              'label' => 'Confirm Password',
                              'rules' => 'required|min_length[6]|matches[spwd]'
                              ]

		],

'instructor_signup' => [

                        [
                        'field' => 'name',
                        'label' => 'Name',
                        'rules' => 'required'
                        ],

                        [
                        'field' => 'email',
                        'label' => 'Email Address',
                        'rules' => 'required|valid_email'
                        ],
                  
                  	[
                        'field' => 'mobile',
                        'label' => 'Contact Number',
                        'rules' => 'required|numeric|exact_length[10]'
                        ],

                        [
                        'field' => 'dob',
                        'label' => 'Date Of Birth',
                        'rules' => 'required'
                        ],

                        [
                        'field' => 'pwd',
                        'label' => 'Password',
                        'rules' => 'required|min_length[6]'
                        ],

          			[
                        'field' => 'c_pwd',
                        'label' => 'Confirm Password',
                        'rules' => 'required|min_length[6]|matches[pwd]'
                        ],

                        [
                        'field' => 'address',
                        'label' => 'Address',
                        'rules' => 'required'
                        ],

                        [
                        'field' => 'pin',
                        'label' => 'Postal Code',
                        'rules' => 'required'
                        ], 

                      	[
                        'field' => 'license_no',
                        'label' => 'License Number',
                        'rules' => 'required'
                        ]

		],

'instructor_login' => [

                        [
                        'field' => 'email',
                        'label' => 'Email ',
                        'rules' => 'required|valid_email'
                        ],

                        [
                        'field' => 'pwd',
                        'label' => 'Password',
                        'rules' => 'required|min_length[6]'
                        ]
            ],

'student_login' => [

                        [
                        'field' => 'semail',
                        'label' => 'Email ',
                        'rules' => 'required|valid_email'
                        ],

                        [
                        'field' => 'spwd',
                        'label' => 'Password',
                        'rules' => 'required|min_length[6]'
                        ]
            ],

'change_password' => [

                        [
                        'field' => 'n_pwd',
                        'label' => 'New Password',
                        'rules' => 'required|min_length[6]'
                        ],

                        [
                        'field' => 'nc_pwd',
                        'label' => 'Confirm Password',
                        'rules' => 'required|min_length[6]|matches[n_pwd]'
                        ]
            ],


    ];



?>