<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
ini_set('MAX_EXECUTION_TIME', '-1');


if (!function_exists('generate_barcode')) {
    function generate_barcode($item_id)
    {
        // Load the barcode library
        $CI =& get_instance();
        $CI->load->library('zend');
        $CI->zend->load('Zend/Barcode');

        // Generate the barcode
        $barcodeOptions = array('text' => $item_id);
        $barcodeImage = Zend_Barcode::factory('code39', 'image', $barcodeOptions, array())->draw();

        // Set the appropriate headers
        ob_start();
        imagepng($barcodeImage);
        $imageData = ob_get_contents();
        ob_end_clean();

        // Generate the base64 encoded image source
        $imageSrc = 'data:image/png;base64,' . base64_encode($imageData);

        return $imageSrc;
    }
}
