<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LuckyController extends AbstractController
{
    public function number()
    {
        $number = random_int(0, 100);

        return $this->render('lucky/number.html.twig', ['number' => $number]);
    }
}
