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

        $this->logger->info('BRANDS TOP LIST: Country code: ' . $country);

        $entries = $this->topListRepository->findByCountryCode($country);

        // If empty, use the empty country code as default
        if (!$entries) {
            $entries = $this->topListRepository->findByCountryCode();
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


    #[Route('/', name: 'home')]
    public function index(Request $request): Response
    {
        
        return $this->render('base.html.twig', []);
    }
}
