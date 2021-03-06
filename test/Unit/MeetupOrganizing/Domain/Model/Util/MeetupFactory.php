<?php
declare(strict_types = 1);

<<<<<<< HEAD:test/MeetupOrganizing/Domain/Model/Util/MeetupFactory.php
<<<<<<< HEAD:test/MeetupOrganizing/Domain/Model/Util/MeetupFactory.php
namespace Tests\MeetupOrganizing\Domain\Model\Util;
=======
namespace MeetupOrganizing\Entity\Util;
>>>>>>> formation/master:test/MeetupOrganizing/Entity/Util/MeetupFactory.php
=======
namespace Tests\Unit\MeetupOrganizing\Domain\Model\Util;
>>>>>>> twimm:test/Unit/MeetupOrganizing/Domain/Model/Util/MeetupFactory.php

use MeetupOrganizing\Domain\Model\Description;
use MeetupOrganizing\Domain\Model\Meetup;
use MeetupOrganizing\Domain\Model\MeetupId;
use MeetupOrganizing\Domain\Model\Name;
use MeetupOrganizing\Domain\Model\ScheduledDate;

class MeetupFactory
{
    public static function pastMeetup(): Meetup
    {
        return Meetup::schedule(
            MeetupId::fromString('2e9e389b-516e-4578-b087-7e4948cfe57b'),
            Name::fromString('Name'),
            Description::fromString('Description'),
            ScheduledDate::fromPhpDateString('-5 days')
        );
    }

    public static function upcomingMeetup(): Meetup
    {
        return Meetup::schedule(
            MeetupId::fromString('3fed0527-98bd-4cc0-9b29-98140509a1de'),
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
