<?php
declare(strict_types=1);

namespace MeetupOrganizing\Infrastructure\Persistence\FileSystem;

use MeetupOrganizing\Domain\Model\Meetup;
<<<<<<< HEAD:src/MeetupOrganizing/Infrastructure/Persistence/FileSystem/FileBasedMeetupRepository.php
=======
use MeetupOrganizing\Domain\Model\MeetupId;
>>>>>>> 937cee3c946cdb6624d55b0da7d0f8776c6df241:src/MeetupOrganizing/Infrastructure/Persistence/FileSystem/FileBasedMeetupRepository.php
use MeetupOrganizing\Domain\Model\MeetupRepository;
use NaiveSerializer\Serializer;
use Ramsey\Uuid\Uuid;

final class FileBasedMeetupRepository implements MeetupRepository
{
    /**
     * @var string
     */
    private $filePath;

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    public function add(Meetup $meetup): void
    {
        $meetups = $this->persistedMeetups();
<<<<<<< HEAD
        $id = \count($meetups) + 1;
        $meetup->setId($id);
=======
>>>>>>> @{-1}
        $meetups[] = $meetup;
        file_put_contents($this->filePath, Serializer::serialize($meetups));
    }

    public function byId(MeetupId $meetupId): Meetup
    {
        foreach ($this->persistedMeetups() as $meetup) {
            if ($meetup->id() === (string)$meetupId) {
                return $meetup;
            }
        }

        throw new \RuntimeException('Meetup not found');
    }

    public function upcomingMeetups(\DateTimeImmutable $now): array
    {
        return array_values(array_filter($this->persistedMeetups(), function (Meetup $meetup) use ($now) {
            return $meetup->isUpcoming($now);
        }));
    }

    public function pastMeetups(\DateTimeImmutable $now): array
    {
        return array_values(array_filter($this->persistedMeetups(), function (Meetup $meetup) use ($now) {
            return !$meetup->isUpcoming($now);
        }));
    }

    public function allMeetups(): array
    {
        return $this->persistedMeetups();
    }

    /**
     * @return Meetup[]
     */
    private function persistedMeetups(): array
    {
        if (!file_exists($this->filePath)) {
            return [];
        }

        $rawJson = file_get_contents($this->filePath);
        if (empty($rawJson)) {
            return [];
        }

        return Serializer::deserialize(Meetup::class . '[]', $rawJson);
    }

    public function deleteAll(): void
    {
        file_put_contents($this->filePath, '[]');
    }

    public function nextIdentity(): MeetupId
    {
        return MeetupId::fromString((string)Uuid::uuid4());
    }
}
