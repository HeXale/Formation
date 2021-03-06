<?php
declare(strict_types = 1);

<<<<<<< HEAD:test/MeetupOrganizing/Infrastructure/MeetupRepositoryTest.php
namespace Tests\MeetupOrganizing\Infrastructure;

<<<<<<< HEAD:test/MeetupOrganizing/Infrastructure/MeetupRepositoryTest.php
=======
use MeetupOrganizing\Domain\Model\MeetupId;
>>>>>>> 937cee3c946cdb6624d55b0da7d0f8776c6df241:test/MeetupOrganizing/Infrastructure/FileBasedMeetupRepositoryTest.php
use MeetupOrganizing\Infrastructure\Persistence\FileSystem\FileBasedMeetupRepository;
use Tests\MeetupOrganizing\Domain\Model\Util\MeetupFactory;
=======
namespace MeetupOrganizing\Entity;

use MeetupOrganizing\Entity\Util\MeetupFactory;
>>>>>>> formation/master:test/MeetupOrganizing/Entity/MeetupRepositoryTest.php

final class FileBasedMeetupRepositoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var FileBasedMeetupRepository
     */
    private $repository;

    private $filePath;

    protected function setUp()
    {
        $this->filePath = tempnam(sys_get_temp_dir(), 'meetups');
        $this->repository = new FileBasedMeetupRepository($this->filePath);
    }

    /**
     * @test
     */
    public function it_persists_and_retrieves_meetups(): void
    {
        $originalMeetup = MeetupFactory::someMeetup();
        $this->repository->add($originalMeetup);

<<<<<<< HEAD:test/MeetupOrganizing/Infrastructure/MeetupRepositoryTest.php
        $this->assertGreaterThanOrEqual(1, $originalMeetup->id());

        $restoredMeetup = $this->repository->byId($originalMeetup->id());
=======
        $restoredMeetup = $this->repository->byId(MeetupId::fromString($originalMeetup->id()));
>>>>>>> @{-1}:test/MeetupOrganizing/Infrastructure/FileBasedMeetupRepositoryTest.php

        $this->assertEquals($originalMeetup, $restoredMeetup);
    }

    /**
     * @test
     */
    public function its_initial_state_is_valid(): void
    {
        $this->assertSame(
            [],
            $this->repository->upcomingMeetups(new \DateTimeImmutable())
        );
    }

    /**
     * @test
     */
    public function it_lists_upcoming_meetups(): void
    {
        $now = new \DateTimeImmutable();
        $pastMeetup = MeetupFactory::pastMeetup();
        $this->repository->add($pastMeetup);
        $upcomingMeetup = MeetupFactory::upcomingMeetup();
        $this->repository->add($upcomingMeetup);

        $this->assertEquals(
            [
                $upcomingMeetup
            ],
            $this->repository->upcomingMeetups($now)
        );
    }

    /**
     * @test
     */
    public function it_lists_past_meetups(): void
    {
        $now = new \DateTimeImmutable();
        $pastMeetup = MeetupFactory::pastMeetup();
        $this->repository->add($pastMeetup);
        $upcomingMeetup = MeetupFactory::upcomingMeetup();
        $this->repository->add($upcomingMeetup);

        $this->assertEquals(
            [
                $pastMeetup
            ],
            $this->repository->pastMeetups($now)
        );
    }

    /**
     * @test
     */
    public function it_can_delete_all_meetups(): void
    {
        $meetup = MeetupFactory::upcomingMeetup();
        $this->repository->add($meetup);
        $this->assertEquals([$meetup], $this->repository->allMeetups());

        $this->repository->deleteAll();

        $this->assertEquals([], $this->repository->upcomingMeetups(new \DateTimeImmutable()));
        $this->assertEquals([], $this->repository->pastMeetups(new \DateTimeImmutable()));
    }

    protected function tearDown()
    {
        unlink($this->filePath);
    }
}
