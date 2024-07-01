<?php

namespace App;

class Constant
{
    public const ADMIN_ROLE                     = 1;
    public const EDITOR_ROLE                    = 2;
    public const CUSTOMER_SERVICE_ROLE          = 3;

    public const ADMIN_ENABLE_STATUS            = 0;
    public const ADMIN_DISABLE_STATUS           = 1;

    public const MALE                           = 0;
    public const FEMALE                         = 1;

    public const MEMBER_UNVERIFIED              = 0;
    public const MEMBER_EMAIL_VERIFIED          = 1;
    public const MEMBER_VERIFICATION_PENDING    = 2;
    public const MEMBER_VERIFICATION_DENIED     = 3;
    public const MEMBER_VERIFIED                = 4;
    public const MEMBER_BANNED                  = 5;

    public const THUMB_WIDTH                    = 150;
    public const THUMB_HEIGHT                   = 200;
}
