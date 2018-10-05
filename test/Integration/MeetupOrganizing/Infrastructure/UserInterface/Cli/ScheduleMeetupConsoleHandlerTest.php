<?php
declare(strict_types=1);

<<<<<<< HEAD:test/MeetupOrganizing/Infrastructure/ScheduleMeetupConsoleHandlerTest.php
<<<<<<< HEAD:test/MeetupOrganizing/Infrastructure/ScheduleMeetupConsoleHandlerTest.php
namespace Tests\MeetupOrganizing\Infrastructure;
=======
namespace Tests\Integration\MeetupOrganizing\Infrastructure\UserInterface\Cli;
>>>>>>> twimm:test/Integration/MeetupOrganizing/Infrastructure/UserInterface/Cli/ScheduleMeetupConsoleHandlerTest.php

use MeetupOrganizing\Infrastructure\UserInterface\Cli\MeetupApplicationConfig;
=======
namespace MeetupOrganizing\Command;

>>>>>>> formation/master:test/MeetupOrganizing/Command/ScheduleMeetupConsoleHandlerTest.php
use Webmozart\Console\Args\StringArgs;
use Webmozart\Console\ConsoleApplication;
use Webmozart\Console\IO\OutputStream\BufferedOutputStream;

final class ScheduleMeetupConsoleHandlerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_schedules_a_meetup(): void
    {
        $container = require __DIR__ . '/../../../../../../app/container.php';

        $config = new MeetupApplicationConfig($container);
        $config->setTerminateAfterRun(false);
        $cli = new ConsoleApplication($config);

        $output = new BufferedOutputStream();
        $args = new StringArgs('schedule Akeneo Meetup "2018-04-20 20:00"');
        $cli->run($args, null, $output);

        $this->assertContains(
            'Scheduled the meetup successfully',
            $output->fetch()
        );
    }
}
