<?php
declare(strict_types=1);

namespace App\Tests\Components;

use App\Controller\ExampleTwigComponent;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\UX\TwigComponent\Test\InteractsWithTwigComponents;

class ExampleTwigComponentTest extends KernelTestCase
{
    use InteractsWithTwigComponents;

    public function test_component_mount(): void
    {
        $component = $this->mountTwigComponent(
            name: ExampleTwigComponent::class,
        );

        $this->assertInstanceOf(ExampleTwigComponent::class, $component);
    }

    public function test_component_renders(): void
    {
        $rendered = $this->renderTwigComponent(
            name: ExampleTwigComponent::class,
        );

        $this->assertStringContainsString('This is the example Twig Component.', $rendered->toString());
    }
}
