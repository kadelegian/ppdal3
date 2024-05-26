<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('format_date_id')) {
    /**
     * Format the date in Indonesian locale
     * 
     * @param string|DateTime $date
     * @param string $pattern
     * @return string
     */
    function format_tanggal_indo($date, $pattern = 'd MMMM yyyy')
    {
        // Ensure the default timezone is set
        date_default_timezone_set('Asia/Jakarta');

        // Create a DateTime object if the input is a string
        if (is_string($date)) {
            $date = new DateTime($date);
        }

        // Create an IntlDateFormatter object for the Indonesian locale
        $formatter = new IntlDateFormatter(
            'id_ID', // Indonesian locale
            IntlDateFormatter::FULL, // Full date format type
            IntlDateFormatter::NONE, // No time part
            'Asia/Jakarta' // Timezone
        );
        $formatter->setPattern($pattern);
        // Format the date
        return $formatter->format($date);
    }
}
