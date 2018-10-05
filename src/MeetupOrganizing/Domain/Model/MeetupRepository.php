<?php
declare(strict_types=1);

namespace MeetupOrganizing\Domain\Model;

interface MeetupRepository
{
    public function add(Meetup $meetup): void;

<<<<<<< HEAD
    public function byId(int $id): Meetup;
=======
    public function byId(MeetupId $meetupId): Meetup;
>>>>>>> 937cee3c946cdb6624d55b0da7d0f8776c6df241

    /**
     * @param \DateTimeImmutable $now
     * @return Meetup[]
     */
    public function upcomingMeetups(\DateTimeImmutable $now): array;

    /**
     * @param \DateTimeImmutable $now
     * @return Meetup[]
     */
    public function pastMeetups(\DateTimeImmutable $now): array;

    public function allMeetups(): array;

    public function deleteAll(): void;
<<<<<<< HEAD
=======

    public function nextIdentity(): MeetupId;
>>>>>>> 937cee3c946cdb6624d55b0da7d0f8776c6df241
}
