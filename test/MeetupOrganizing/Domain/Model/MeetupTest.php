<?php
declare(strict_types = 1);

<<<<<<< HEAD:test/MeetupOrganizing/Domain/Model/MeetupTest.php
namespace Tests\MeetupOrganizing\Domain\Model;

use MeetupOrganizing\Domain\Model\Meetup;
use MeetupOrganizing\Domain\Model\Name;
use MeetupOrganizing\Domain\Model\Description;
use MeetupOrganizing\Domain\Model\ScheduledDate;
=======
namespace MeetupOrganizing\Entity;
>>>>>>> formation/master:test/MeetupOrganizing/Entity/MeetupTest.php

final class MeetupTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_can_be_scheduled_with_just_a_name_description_and_date(): void
    {
        $name = Name::fromString('Name');
        $description = Description::fromString('Description');
        $scheduledFor = ScheduledDate::fromPhpDateString('now');

        $meetup = Meetup::schedule($name, $description, $scheduledFor);

        $this->assertEquals($name, $meetup->name());
        $this->assertEquals($description, $meetup->description());
        $this->assertEquals($scheduledFor, $meetup->scheduledFor());
    }

    /**
     * @test
     */
    public function can_determine_whether_or_not_it_is_upcoming(): void
    {
        $now = new \DateTimeImmutable();

        $pastMeetup = Meetup::schedule(
            Name::fromString('Name'),
            Description::fromString('Description'),
            ScheduledDate::fromPhpDateString('-5 days')
        );
        $this->assertFalse($pastMeetup->isUpcoming($now));

        $upcomingMeetup = Meetup::schedule(
            Name::fromString('Name'),
            Description::fromString('Description'),
            ScheduledDate::fromPhpDateString('+5 days')
        );
        $this->assertTrue($upcomingMeetup->isUpcoming($now));
    }
}
