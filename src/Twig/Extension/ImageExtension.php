<?php

namespace App\Twig\Extension;

use App\Twig\Runtime\ImageExtensionRuntime;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class ImageExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('async_image', [ImageExtensionRuntime::class, 'asyncImage'], ['is_safe' => ['html']]),
        ];
    }
}
