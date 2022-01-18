<?php

namespace App\Enums;

enum VerificationStatus: string
{
    case NotReviewed = "not reviewed";
    case NotAccepted = "not accepted";
    case Accepted = "accepted";
    case FixRequire = "fix require";
    case Fixed = "fixed";
}
