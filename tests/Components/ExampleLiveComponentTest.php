<?php
declare(strict_types=1);

namespace App\Tests\Components;

use App\Twig\Components\ExampleLiveComponent;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\UX\LiveComponent\Test\InteractsWithLiveComponents;

class ExampleLiveComponentTest extends KernelTestCase
{
    use InteractsWithLiveComponents;

    public function test_can_render_and_interact(): void
    {
        $sut = $this->createLiveComponent(
            name: ExampleLiveComponent::class
        );

        $this->assertStringContainsString(
            'This is the example Live Component.',
            $sut->render()->toString()
        );
    }
}
