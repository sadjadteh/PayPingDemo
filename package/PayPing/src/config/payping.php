<?php

return [
    /* The base URI of all requests. */
    'baseURI' => 'https://api.payping.ir/v1/',

    /* The authorization token will be sent in the header part of each requests */
    'authorizationToken' => 'Bearer aa86f26ab8caae5c695d76454c9bbdc7323e8e7363d0a007a4c53a6633b76415',

    /* This will be added to baseURI for get code (pay) request */
    'payURI' => 'pay/',

    /* This will be added to baseURI for verification request */
    'verifyURI' => 'pay/verify',

    'paymentPage' => 'pay/gotoipg/',
];
