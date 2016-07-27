<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController {

  /**
   * @var \Twig_Environment
   */
  private $twig;

  /**
   * @var LoggerInterface
   */
  private $logger;

  /**
   * Constructor.Setup vars
   * @param \Twig_Environment $twig
   * @param LoggerInterface $logger
   */
  public function __construct(\Twig_Environment $twig, LoggerInterface $logger) {
    $this->twig = $twig;
    $this->logger = $logger;
  }

  /**
   * Index action GET "/"
   */
  public function indexAction() {
    return $this->twig->render('index.twig', array('menu' => $this->getDefaultMenu()));
  }

  /**
   * Index action POST "/"
   */
  public function postAction() {
    $request = Request::createFromGlobals();
    $json = json_decode($request->get('serialized'));
    $menu = $this->objToArray($json);
    return $this->twig->render('index.twig', array('menu' => $menu));
  }

  /**
   * Parse objects and childs into array
   * @param type $obj
   * @return type array
   */
  private function objToArray($obj) {
    $it = is_object($obj) ? $obj : json_decode($obj);
    $array = array();
      foreach($it as $key => $val) {
        if (isset($val->child)) {
          $val->child = $this->objToArray($val->child);
        }
        $array[$key] = (array) $val;
      }
    return $array;
  }

  /**
   * Get the defaut menu
   * @return type array
   */
  private function getDefaultMenu() {
    return array(
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
  }

}
