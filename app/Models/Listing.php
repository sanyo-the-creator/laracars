<?php 

    namespace App\Models;

    class Listing {
        public static function allListings() {
            return [
                [
                    'id' => 1,
                    'title' => 'Volkswagen',
                    'desc' => 'facist ziguli yeaaaah'
                ],
                [
                    'id' => 2,
                    'title' => 'Skoda',
                    'desc' => 'czech ziguli yeaaaah'
                ],
                [
                    'id' => 3,
                    'title' => 'Audi',
                    'desc' => '300km/h ziguli yeaaaah'
                ],
            ];
        }

        public static function find($id) {
            $listings = self::allListings();

            foreach($listings as $listing) {
                if($listing['id'] == $id) {
                    return $listing;
                }
            }
        }
    }