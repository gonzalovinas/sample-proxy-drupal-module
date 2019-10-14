<?php
/**
 * @file
 * Contains \Drupal\mae_api_download\Controller\HelloController.
 */
namespace Drupal\mae_api_download\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\BinaryResponse;


class HelloController {

  private function isJson($string) {
    json_decode($string);
    return (json_last_error() == JSON_ERROR_NONE);
   }

  public function content() {
    $uri_json = "https://api.myjson.com/bins/x6m12";
	 
    //$response_json = file_get_contents($uri_json);
   // $response_json = file_get_contents("https://www.agilesherpas.com/wp-content/uploads/2017/10/agile-manifesto-PDF.pdf");
    $response = new Response();
    
    //$data = stream_get_contents(fopen('https://www.agilesherpas.com/wp-content/uploads/2017/10/agile-manifesto-PDF.pdf"', "rb"));

    $file = file_get_contents("https://www.agilesherpas.com/wp-content/uploads/2017/10/agile-manifesto-PDF.pdf");
//echo $file;
    $response->setContent($file);
    $response->headers->set('Content-Type', 'application/octet-stream');
    $response->headers->set('Content-Transfer-Encoding', 'binary');
    $response->headers->set('Connection', 'Keep-Alive');
    $response->headers->set('Content-Disposition', 'attachment; filename="manifesto.pdf"');
    return $response;
  }
}
?>