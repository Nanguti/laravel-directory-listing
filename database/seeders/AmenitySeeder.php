<?php

namespace Database\Seeders;

use App\Models\Amenity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AmenitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $amenityCategories = [
            'Basic' => [
                'Wifi', 'Heating', 'Air conditioning', 'Essentials(Towels, Bed Sheets, Soap, Toilet Paper)',
            ],
            'Bedroom' => [
                'Bed linens', 'Extra pillows and blankets', 'Hangers', 'Shampoo', 'Hair dryer', 'Iron',
                'Laptop-friendly workspace',
            ],
            'Kitchen' => [
                'Kitchen', 'Cooking basics', 'Refrigerator', 'Oven', 'Microwave', 'Coffee maker', 'Toaster',
                'Dishwasher',
            ],
            'Bathroom' => [
                'Private bathroom', 'Bathtub', 'Hot water', 'Towels', 'Conditioner', 'Body wash',
            ],
            'Entertainment' => [
                'TV', 'Cable TV', 'Netflix', 'Books', 'Board games',
            ],
            'Safety and Security' => [
                'Smoke detector', 'Carbon monoxide detector', 'First aid kit', 'Fire extinguisher',
                'Lock on bedroom door', 'Safety card', 'Fire blanket',
            ],
            'Outdoor' => [
                'Patio or balcony', 'Garden or backyard', 'Outdoor furniture',
            ],
            'Accessibility' => [
                'Elevator', 'Step-free access', 'Wide doorway',
            ],
            'Parking and Transportation' => [
                'Free parking on premises', 'Paid parking off premises', 'Street parking', 'Garage and driveway',
            ],
            'Other' => [
                'Gym', 'Pool', 'Hot tub', 'Sauna', 'Breakfast', '24-hour check-in', 'Long-term stays allowed',
                'Luggage drop-off allowed', 'Pets allowed',
            ],
        ];

        foreach ($amenityCategories as $category => $amenities) {
            foreach ($amenities as $amenity) {
                Amenity::create(['name' => $amenity, 'category' => $category]);
            }
        }
    
    }
}
