<?php
declare(strict_types = 1);

<<<<<<< HEAD:test/MeetupOrganizing/Domain/Model/NameTest.php
<<<<<<< HEAD:test/MeetupOrganizing/Domain/Model/NameTest.php
namespace Tests\MeetupOrganizing\Domain\Model;
=======
namespace Tests\Unit\MeetupOrganizing\Domain\Model;
>>>>>>> twimm:test/Unit/MeetupOrganizing/Domain/Model/NameTest.php

use MeetupOrganizing\Domain\Model\Name;
=======
namespace MeetupOrganizing\Entity;
>>>>>>> formation/master:test/MeetupOrganizing/Entity/NameTest.php

final class NameTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_wraps_a_string(): void
    {
        $nameText = 'Non-empty string';
        $name = Name::fromString($nameText);
        $this->assertEquals($nameText, (string)$name);
    }

    /**
     * @test
     */
    public function it_should_be_a_non_empty_string(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        Name::fromString('');
    }
}
