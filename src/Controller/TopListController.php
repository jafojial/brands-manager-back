<?php

namespace App\Controller;

use App\Entity\TopList;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\BrandRepository;
use App\Repository\TopListRepository;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpKernel\Attribute\AsController;

// #[AsController]
final class TopListController extends AbstractController
{
    private $brandRepository;
    private $topListRepository;
    private $logger;

    public function __construct(
        BrandRepository $brandRepository,
        TopListRepository $topListRepository,
        LoggerInterface $logger,
    ) {
        $this->brandRepository = $brandRepository;
        $this->topListRepository = $topListRepository;
        $this->logger = $logger;
    }

    
    public function __invoke(Request $request): JsonResponse
    {
        $this->logger->info('BRANDS TOP LIST: In the endpoint.');
        $country = $request->headers->get('CF-IPCountry') ?? '';

        $entries = $this->topListRepository->findBy(
            ['countryCode' => $country]
        );

        // If empty, use DEFAULT
        if (!$entries) {
            $entries = $this->topListRepository->findBy(
                ['countryCode' => 'DEFAULT'],
            );
        }

        $data = [];
        foreach ($entries as $entry) {
            $brand = $entry->getBrand();
            $data[] = [
                'brand_name' => $brand->getBrandName(),
                'brand_image' => $brand->getBrandImage(),
                'rating' => $brand->getRating(),
            ];
        }

        return $this->json($data);
    }
}
