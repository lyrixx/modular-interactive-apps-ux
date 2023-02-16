<?php

namespace App\Twig\Runtime;

use Twig\Environment;
use Twig\Extension\RuntimeExtensionInterface;

class ImageExtensionRuntime implements RuntimeExtensionInterface
{
    public function __construct(
        private readonly Environment $twig,
    ) {
    }

    public function asyncImage(string $image, int $width = 240, int $height = 380): string
    {
        return $this->twig->render('helper/async-image.html.twig', [
            'image' => $image,
            'width' => $width,
            'height' => $height,
        ]);
    }
}
