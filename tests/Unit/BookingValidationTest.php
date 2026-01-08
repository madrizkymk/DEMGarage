<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class BookingValidationTest extends TestCase
{
    public function test_vehicle_number_accepts_valid_formats_with_spaces()
    {
        $validFormats = [
            'B 1234 AB',
            'AB 1234 ABC',
            'A 1 B',
            'AB 9999 XYZ',
            'B 1',
            'B 12',
            'B 123',
        ];

        foreach ($validFormats as $format) {
            $validator = Validator::make([
                'vehicle_number' => $format,
                'booking_date' => now()->addDay()->format('Y-m-d'),
                'service_type' => 'minor service',
            ], [
                'vehicle_number' => 'required|string|max:12|regex:/^[A-Z]{1,2} \d{1,4}( [A-Z]{1,3})?$/',
            ]);

            $this->assertFalse($validator->fails(), "Format '$format' should be valid");
        }
    }

    public function test_vehicle_number_rejects_invalid_formats()
    {
        $invalidFormats = [
            'B1234AB',      // no spaces
            '1234 AB',      // starts with number
            'B 12345 AB',   // too many digits
            'ABC 1234 AB',  // too many letters at start
            'B 12345',      // too many digits, no letters
        ];

        foreach ($invalidFormats as $format) {
            $validator = Validator::make([
                'vehicle_number' => $format,
                'booking_date' => now()->addDay()->format('Y-m-d'),
                'service_type' => 'minor service',
            ], [
                'vehicle_number' => 'required|string|max:12|regex:/^[A-Z]{1,2} \d{1,4}( [A-Z]{1,3})?$/',
            ]);

            $this->assertTrue($validator->fails(), "Format '$format' should be invalid");
        }
    }
}
