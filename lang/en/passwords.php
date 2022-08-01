<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Password Reset Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are the default lines which match reasons
    | that are given by the password broker for a password update attempt
    | has failed, such as for an invalid token or invalid new password.
    |
    */

    'sent' => 'We have emailed your password reset link!',
    'throttled' => 'Please wait before retrying.',
    'token' => 'This password reset token is invalid.',
    'user' => "We can't find a user with that email address.",
    'area' => "This is a secure area of the application. Please confirm your password before continuing.",
    'forgot' => [
        'title' => "Forgot your password?",
        'text' => "No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.",
        'link' => "Send password reset link",
    ],
    'reset' => [
        'message' => 'Your password has been reset!',
        'title' => "Reset Password!",
        'text' => "Need to reset your password? Use your secret code!",
        'link' => "Reset password",
    ],
];
