<?php

namespace Ajtarragona\WebComponents\Helpers;


class GMapsHelper
{

  public $points;
  public $longitud;

  // Constructor


  public static function generateRectanglePoints($bounds){
    return [
        [ "lat"=> $bounds["north"], "lng"=>$bounds["east"] ],
        [ "lat"=> $bounds["south"], "lng"=>$bounds["east"] ],
        [ "lat"=> $bounds["south"], "lng"=>$bounds["west"]],
        [ "lat"=> $bounds["north"], "lng"=>$bounds["west"]],
    ];

  }


  public static function generateCirclePoints($center, $radius, $numPoints=100){
    $points = array();
  
    for ($i = 0; $i < $numPoints; $i++) {
      $theta = deg2rad($i * (360 / $numPoints));

        // Ajustar la conversión de metros a grados basándote en la latitud actual y el tamaño del mapa
        $radiusDegreesLat = $radius / (111.32 * 1000);
        $radiusDegreesLng = $radius / (111.32 * 1000 * cos(deg2rad($center['lat'])));

        $lat = $center['lat'] + $radiusDegreesLat * cos($theta);
        $lng = $center['lng'] + $radiusDegreesLng * sin($theta);

        $points[] = array('lat' => $lat, 'lng' => $lng);
    }
    return $points;
  }


  public static function encodePolygons($points)
  {
    $encoded = '';
    $index = 0;
    $lat_prev = 0;
    $lng_prev = 0;

    foreach ($points as $point) {
      $lat = $point['lat'];
      $lng = $point['lng'];

      $lat_diff = $lat - $lat_prev;
      $lng_diff = $lng - $lng_prev;

      $lat_prev = $lat;
      $lng_prev = $lng;

      $encoded .= self::encodeSingleValue($lat_diff);
      $encoded .= self::encodeSingleValue($lng_diff);
    }

    return $encoded;
  }

  private static function encodeSingleValue($value)
  {
    $value = (int)($value * 1e5);
    $value = ($value < 0) ? ~($value << 1) : ($value << 1);
    $encoded = '';

    while ($value >= 0x20) {
      $encoded .= chr((0x20 | ($value & 0x1F)) + 63);
      $value >>= 5;
    }

    $encoded .= chr($value + 63);
    return $encoded;
  }
}
