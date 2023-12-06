<?php
/* 
 * Add api validations here
 */

return [
    'front_signup_validation' => [
        'name' => 'required|max:150',
        'email' => 'required|email|max:150|unique:users,email,',
        'password' => 'required|max:50|min:8',
    ],
    'front_signin_validation' => [
        'email' => 'required|email',
        'password' => 'required',
    ],
];

