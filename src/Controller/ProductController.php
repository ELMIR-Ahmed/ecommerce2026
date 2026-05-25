<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProductController extends AbstractController
{
    private readonly ProductRepository $productRepo;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    #[Route('/products', name: 'app_products')]
    public function products()
    {
        $products = $this->productRepo->findAll();
        return $this->render('index.html.twig', [
            'products' => $products
        ]
        );
    }

    #[Route(path: '/category/products', name: 'app_by_categorie')]
    public function product_by_category() : Response
    {
        return $this->render('products_by_category.html.twig');
    }

    #[Route(path: '/products/details/{id}', name: 'app_product_show')]
    public function product_details(#[MapEntity()] Product $product): Response
    {
        return $this->render('product_details.html.twig', [
            'product' => $product,
        ]);
    }

}
