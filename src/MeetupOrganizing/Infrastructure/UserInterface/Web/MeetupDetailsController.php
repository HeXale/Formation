<?php
declare(strict_types = 1);

namespace MeetupOrganizing\Infrastructure\UserInterface\Web;

<<<<<<< HEAD
=======
use MeetupOrganizing\Domain\Model\MeetupId;
>>>>>>> 937cee3c946cdb6624d55b0da7d0f8776c6df241
use MeetupOrganizing\Domain\Model\MeetupRepository;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

final class MeetupDetailsController
{
    /**
     * @var MeetupRepository
     */
    private $meetupRepository;

    /**
     * @var TemplateRendererInterface
     */
    private $renderer;

    public function __construct(MeetupRepository $meetupRepository, TemplateRendererInterface $renderer)
    {
        $this->meetupRepository = $meetupRepository;
        $this->renderer = $renderer;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $out = null): ResponseInterface
    {
        $meetup = $this->meetupRepository->byId(MeetupId::fromString($request->getAttribute('id')));

        $response->getBody()->write($this->renderer->render('meetup-details.html.twig', [
            'meetup' => $meetup
        ]));

        return $response;
    }
}
