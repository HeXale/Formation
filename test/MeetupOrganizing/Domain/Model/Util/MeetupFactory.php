<?php
declare(strict_types = 1);

<<<<<<< HEAD:test/MeetupOrganizing/Domain/Model/Util/MeetupFactory.php
namespace Tests\MeetupOrganizing\Domain\Model\Util;
=======
namespace MeetupOrganizing\Entity\Util;
>>>>>>> formation/master:test/MeetupOrganizing/Entity/Util/MeetupFactory.php

use MeetupOrganizing\Domain\Model\Description;
use MeetupOrganizing\Domain\Model\Meetup;
use MeetupOrganizing\Domain\Model\Name;
use MeetupOrganizing\Domain\Model\ScheduledDate;

class MeetupFactory
{
    public static function pastMeetup(): Meetup
    {
        return Meetup::schedule(
            Name::fromString('Name'),
            Description::fromString('Description'),
            ScheduledDate::fromPhpDateString('-5 days')
        );
    }

    public static function upcomingMeetup(): Meetup
    {
        return Meetup::schedule(
            Name::fromString('Name'),
            Description::fromString('Description'),
            ScheduledDate::fromPhpDateString('+5 days')
        );
    }

    public static function someMeetup(): Meetup
    {
        return self::upcomingMeetup();
    }
}
