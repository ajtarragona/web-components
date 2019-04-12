<?php
	if (! function_exists('is_light')) {
		function is_light($color){
			//dd($color);
			if(!is_array($color)){
				$color=html2rgb($color);
			}

			if(count($color)>=3){
				return $color[0]>125 && $color[1]>125 && $color[2]>125;
			}

		}
	}

	if (! function_exists('is_dark')) {
		function is_dark($color){
			return !is_light($color);
		}
	}

	if (! function_exists('html2rgb')) {
		function html2rgb($color)
		{
			if (starts_with($color,'#')){
				$color = substr($color, 1);
			


				if (strlen($color) == 6)
					list($r, $g, $b) = array($color[0].$color[1],
											 $color[2].$color[3],
											 $color[4].$color[5]);

				elseif (strlen($color) == 3)
					list($r, $g, $b) = array($color[0].$color[0], $color[1].$color[1], $color[2].$color[2]);
				else
					return false;


				$r = hexdec($r); $g = hexdec($g); $b = hexdec($b);
				return array($r, $g, $b);
			}else if (starts_with($color,"rgb")){
				$colorcomps=explode(",",substr($color,strpos($color, "(")+1,-1));
				return $colorcomps;

			}


		}
	}

	if (! function_exists('rgb2html')) {
		function rgb2html($R,$G,$B){
			return "#".str_pad(dechex($R), 2, '0', STR_PAD_LEFT).str_pad(dechex($G), 2, '0', STR_PAD_LEFT).str_pad(dechex($B), 2, '0', STR_PAD_LEFT);
		}
	}


	if (! function_exists('rgb2hsv')) {
		function rgb2hsv($R, $G, $B)  // RGB Values:Number 0-255
		{                                 // HSV Results:Number 0-1
		   // Convert the RGB byte-values to percentages
			$R = ($R / 255);
			$G = ($G / 255);
			$B = ($B / 255);

			// Calculate a few basic values, the maximum value of R,G,B, the
			//   minimum value, and the difference of the two (chroma).
			$maxRGB = max($R, $G, $B);
			$minRGB = min($R, $G, $B);
			$chroma = $maxRGB - $minRGB;

			// Value (also called Brightness) is the easiest component to calculate,
			//   and is simply the highest value among the R,G,B components.
			// We multiply by 100 to turn the decimal into a readable percent value.
			$computedV = 100 * $maxRGB;

			// Special case if hueless (equal parts RGB make black, white, or grays)
			// Note that Hue is technically undefined when chroma is zero, as
			//   attempting to calculate it would cause division by zero (see
			//   below), so most applications simply substitute a Hue of zero.
			// Saturation will always be zero in this case, see below for details.
			if ($chroma == 0)
				return array(0, 0, $computedV);

			// Saturation is also simple to compute, and is simply the chroma
			//   over the Value (or Brightness)
			// Again, multiplied by 100 to get a percentage.
			$computedS = 100 * ($chroma / $maxRGB);

			// Calculate Hue component
			// Hue is calculated on the "chromacity plane", which is represented
			//   as a 2D hexagon, divided into six 60-degree sectors. We calculate
			//   the bisecting angle as a value 0 <= x < 6, that represents which
			//   portion of which sector the line falls on.
			if ($R == $minRGB)
				$h = 3 - (($G - $B) / $chroma);
			elseif ($B == $minRGB)
				$h = 1 - (($R - $G) / $chroma);
			else // $G == $minRGB
				$h = 5 - (($B - $R) / $chroma);

			// After we have the sector position, we multiply it by the size of
			//   each sector's arc (60 degrees) to obtain the angle in degrees.
			$computedH = 60 * $h;

			return array($computedH, $computedS, $computedV);
		}
	}



	if (! function_exists('hsv2rgb')) {
		function hsv2rgb($iH,$iS,$iV) {
			if($iH < 0)   $iH = 0;   // Hue:
				if($iH > 360) $iH = 360; //   0-360
				if($iS < 0)   $iS = 0;   // Saturation:
				if($iS > 100) $iS = 100; //   0-100
				if($iV < 0)   $iV = 0;   // Lightness:
				if($iV > 100) $iV = 100; //   0-100

				$dS = $iS/100.0; // Saturation: 0.0-1.0
				$dV = $iV/100.0; // Lightness:  0.0-1.0
				$dC = $dV*$dS;   // Chroma:     0.0-1.0
				$dH = $iH/60.0;  // H-Prime:    0.0-6.0
				$dT = $dH;       // Temp variable

				while($dT >= 2.0) $dT -= 2.0; // php modulus does not work with float
				$dX = $dC*(1-abs($dT-1));     // as used in the Wikipedia link

				switch($dH) {
					case($dH >= 0.0 && $dH < 1.0):
						$dR = $dC; $dG = $dX; $dB = 0.0; break;
					case($dH >= 1.0 && $dH < 2.0):
						$dR = $dX; $dG = $dC; $dB = 0.0; break;
					case($dH >= 2.0 && $dH < 3.0):
						$dR = 0.0; $dG = $dC; $dB = $dX; break;
					case($dH >= 3.0 && $dH < 4.0):
						$dR = 0.0; $dG = $dX; $dB = $dC; break;
					case($dH >= 4.0 && $dH < 5.0):
						$dR = $dX; $dG = 0.0; $dB = $dC; break;
					case($dH >= 5.0 && $dH < 6.0):
						$dR = $dC; $dG = 0.0; $dB = $dX; break;
					default:
						$dR = 0.0; $dG = 0.0; $dB = 0.0; break;
				}

				$dM  = $dV - $dC;
				$dR += $dM; $dG += $dM; $dB += $dM;
				$dR *= 255; $dG *= 255; $dB *= 255;

				return array(round($dR),round($dG),round($dB));
		}
	}


	if (! function_exists('lighten')) {
		function lighten($color,$inc=10){
			return darkerColor($color,(-1*$inc));
		}
	}

	if (! function_exists('darken')) {
		function darken($color,$inc=10){
			$rgb=html2rgb($color);
			//echo "/*";
			$hsv=rgb2hsv($rgb[0],$rgb[1],$rgb[2]);
			//var_dump($hsv);
			$newv=$hsv[2]-$inc;
			if($newv>100) $newv=100;
			if($newv<0) $newv=0;
			
			$newhsv=array($hsv[0],$hsv[1],$newv);
			//var_dump($newhsv);
			
			$newrgb=hsv2rgb($newhsv[0],$newhsv[1],$newhsv[2]);
			//var_dump($newrgb);
			return rgb2html($newrgb[0],$newrgb[1],$newrgb[2]);
			
			
			//echo "*/";
		}
	}