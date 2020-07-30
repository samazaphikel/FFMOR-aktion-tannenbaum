<?php

/**
 * @copyright  Sebastian Weidemann 2020 <sama.zaphikel@gmail.com>
 * @author     Sebastian Weidemann
 * @package    FF Mor Aktion Tannenbaum
 * @license    MIT
 * @see        https://github.com/sebastianweidemann/ff-mor-aktion-tannenbaum
 *
 */


declare(strict_types=1);

namespace Sebastianweidemann\FfMorAktionTannenbaum\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment as TwigEnvironment;

/**
 * Class MyCustomController
 * @package Symfony
 *
 * @Route("/my_custom",
 *     name="sebastianweidemann.ff_mor_aktion_tannenbaum.mycustom",
 *     defaults={
 *         "_scope" = "frontend",
 *         "_token_check" = true
 *     }
 * )
 */
class MyCustomController extends AbstractController
{
    /** @var TwigEnvironment */
    private $twig;

    /**
     * MyCustomController constructor.
     * @param TwigEnvironment $twig
     */
    public function __construct(TwigEnvironment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function __invoke()
    {
        $animals = [

            [
                'species' => 'dogs',
                'color'   => 'white'
            ],
            [
                'species' => 'birds',
                'color'   => 'black'
            ], [
                'species' => 'cats',
                'color'   => 'pink'
            ], [
                'species' => 'cows',
                'color'   => 'yellow'
            ],
        ];

        return new Response($this->twig->render(
            '@SebastianweidemannFfMorAktionTannenbaum/my_custom_route.html.twig',
            ['animals' => $animals]
        ));
    }
}

