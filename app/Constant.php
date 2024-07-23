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
    public const UNDEFINED_GENDER               = 2;

    public const MEMBER_UNVERIFIED              = 0;
    public const MEMBER_EMAIL_VERIFIED          = 1;
    public const MEMBER_VERIFICATION_PENDING    = 2;
    public const MEMBER_VERIFICATION_DENIED     = 3;
    public const MEMBER_VERIFIED                = 4;
    public const MEMBER_BANNED                  = 5;

    public const SINGLE                         = 0;
    public const IN_RELATIONSHIP                = 1;

    public const THUMB_WIDTH                    = 150;
    public const THUMB_HEIGHT                   = 200;

    public const PARTNER_GENDER_MALE            = 0;
    public const PARTNER_GENDER_FEMALE          = 1;
    public const PARTNER_GENDER_BOTH            = 2;

    public const MIN_AGE                        = 18;
    public const MAX_AGE                        = 55;

    public const RELIGION_CHRISTIAN             = 1;
    public const RELIGION_ISLAM                 = 2;
    public const RELIGION_BUDDHIST              = 3;
    public const RELIGION_HINDU                 = 4;
    public const RELIGION_JAIN                  = 5;
    public const RELIGION_SHINTO                = 6;
    public const RELIGION_ATHEIST               = 7;
    public const RELIGION_OTHER                 = 8;

    public const RECORD_PER_PAGE                = 9;

    public const DATE_REQUEST_PENDING           = 0;
    public const DATE_REQUEST_REJECTED          = 1;
    public const DATE_REQUEST_ACCEPTED          = 2;

    public const POINT_PER_DATE_REQEUST         = 300;

    public const POINT_RECHARGE_PENDING         = 0;
    public const POINT_RECHARGED                = 1;

}
