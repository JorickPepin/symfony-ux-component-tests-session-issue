<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent('example_twig_component')]
final class ExampleTwigComponent extends AbstractController
{
    public function __construct(
        private readonly RequestStack $requestStack
    ) {
    }

    #[ExposeInTemplate]
    public function openQuotes(): string
    {
        // Any kind of access to the session in the Twig component or its template causes the issue.
        return $this->requestStack->getSession()->getName();
    }
}
