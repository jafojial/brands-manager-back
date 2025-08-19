<?php

namespace App\DataFixtures;

use App\Entity\Brand;
use App\Entity\TopList;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    
    /**
     * Load the fixtures into the database.
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        // 1) Create brands
        $brandsData = [
            ['Mad casino', 'https://example.com/Mad-casino.png', 5],
            ['Robocat', 'https://example.com/Robocat.png', 4],
            ['Spinsy Casino', 'https://example.com/Spinsy_Casino.png', 4],
            ['Talismania Casino', 'https://example.com/Talismania-Casino.png', 3],
            ['Royal casino', 'https://example.com/Royal-casino.png', 4],
            ['Kingston', 'https://example.com/Kingston.png', 4],
            ['Spency Casino', 'https://example.com/Spency_Casino.png', 4],
            ['Legend Casino', 'https://example.com/Legend-Casino.png', 3],
            ['Green casino', 'https://example.com/Green-casino.png', 5],
            ['Kitcat', 'https://example.com/Kitcat.png', 4],
            ['Lapaz Casino', 'https://example.com/Lapaz_Casino.png', 4],
            ['Betwin Casino', 'https://example.com/Betwin-Casino.png', 3],
            ['Sky casino', 'https://example.com/Sky-casino.png', 5],
            ['Krotcat', 'https://example.com/Krotcat.png', 4],
            ['Spencer Casino', 'https://example.com/Spencer_Casino.png', 4],
            ['Betclic Casino', 'https://example.com/Betclic-Casino.png', 5],
            ['Pearson casino', 'https://example.com/Pearson-casino.png', 5],
            ['Robinson', 'https://example.com/Robinson.png', 4],
            ['Betmomo Casino', 'https://example.com/Betmomo-Casino.png', 3],
            ['First casino', 'https://example.com/First-casino.png', 5],
            ['Kracken', 'https://example.com/Kracken.png', 4],
            ['Kingbet Casino', 'https://example.com/Kingbet-Casino.png', 4],
            ['Relok casino', 'https://example.com/Relok-casino.png', 4],
            ['Trugen', 'https://example.com/Trugen.png', 4],
            ['King Casino', 'https://example.com/King_Casino.png', 4],
            ['Kingwin Casino', 'https://example.com/Kingwin-Casino.png', 3],
            ['Vinci casino', 'https://example.com/Vinci-casino.png', 5],
            ['Elementy', 'https://example.com/Elementy.png', 4],
            ['Bwin Casino', 'https://example.com/Bwin_Casino.png', 3],
            ['Talend Casino', 'https://example.com/Talend-Casino.png', 4],
            ['King casino', 'https://example.com/King-casino.png', 3],
            ['Comcat', 'https://example.com/Comcat.png', 5],
            ['24h Casino', 'https://example.com/24h_Casino.png', 4],
            ['Winwin Casino', 'https://example.com/Winwin-Casino.png', 3],
            ['Ford casino', 'https://example.com/Ford-casino.png', 4],
            ['Comwin', 'https://example.com/Comwin.png', 4],
            ['Grand Casino', 'https://example.com/Grand_Casino.png', 4],
        ];

        $brandEntities = [];
        foreach ($brandsData as $data) {
            $brand = new Brand();
            $brand->setBrandName($data[0]);
            $brand->setBrandImage($data[1]);
            $brand->setRating($data[2]);
            $manager->persist($brand);
            $brandEntities[] = $brand;
        }

        // 2) Create toplists
        $countryCodes = ['CM', 'FR', 'GB', 'US'];
        shuffle($brandEntities);
        foreach ($brandEntities as $brand) {
            $entry = new TopList();
            $randomIndex = array_rand($countryCodes);
            $entry->setCountryCode($countryCodes[$randomIndex]);
            $entry->setBrand($brand);
            $manager->persist($entry);
        }

        $manager->flush();
    }
}
