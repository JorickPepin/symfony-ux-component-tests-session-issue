<?php

namespace App\Twig\Components;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\ComponentWithFormTrait;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent]
final class ExampleLiveComponent extends AbstractController
{
    use DefaultActionTrait;

    // For Live Components, it seems you need to have the
    // ComponentWithFormTrait and then build a form to see the issue.
    // The CSRF component is looking for a session which does not exist.

    use ComponentWithFormTrait;

    protected function instantiateForm(): FormInterface
    {
        return $this->createFormBuilder()
            ->setMethod(Request::METHOD_POST)
            ->getForm()
        ;
    }

    #[LiveAction]
    public function save(): Response
    {
        $this->addFlash('success', 'Saved OK');

        return $this->redirectToRoute('');
    }
}
