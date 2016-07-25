<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * DefaultController is here to help you get started.
 *
 * You would probably put most of your actions in other more domain specific
 * controller classes.
 *
 * Controllers are completely separated from Silex, any dependencies should be
 * injected through the constructor. When used with a smart controller resolver,
 * the Request object can be automatically added as an argument if you use type
 * hinting.
 *
 * @author Gunnar Lium <gunnar@aptoma.com>
 */
class DefaultController {

  /**
   * @var \Twig_Environment
   */
  private $twig;

  /**
   * @var LoggerInterface
   */
  private $logger;

  public function __construct(\Twig_Environment $twig, LoggerInterface $logger) {
    $this->twig = $twig;
    $this->logger = $logger;
  }

  public function indexAction() {
    $this->logger->debug('Executing DefaultController::indexAction');

    $menu = array(
      0 => array(
        'title' => 'Home',
        'href' => '/',
      ),
      1 => array(
        'title' => 'Community',
        'href' => '/community',
        'child' => array(
          0 => array(
            'title' => 'Community Home',
            'href' => '/community',
            'child' => array(
              0 => array(
                'title' => 'Irc',
                'href' => '/irc',
              ),
              1 => array(
                'title' => 'Events',
                'href' => '/events',
              ),
            ),
          ),
          1 => array(
            'title' => 'Getting Involved',
            'href' => '/getting-involved',
            'child' => array(
              0 => array(
                'title' => 'Translation',
                'href' => '/translation',
              ),
              1 => array(
                'title' => 'Design',
                'href' => '/contribute/themes',
              ),
              2 => array(
                'title' => 'Coding',
                'href' => '/contribute/development',
              ),
            ),
          ),
        ),
      ),
      2 => array(
        'title' => 'Support',
        'href' => '/support',
        'child' => array(
          0 => array(
            'title' => 'Search',
            'href' => '/search/apachesolr_search',
          ),
          1 => array(
            'title' => 'Forums',
            'href' => '/Forum',
          ),
          2 => array(
            'title' => 'Community Documentation',
            'href' => '/documentation',
          ),
        ),
      ),
    );

    return $this->twig->render('index.twig', array('menu' => $menu));
  }

}
