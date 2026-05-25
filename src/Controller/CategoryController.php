<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CategoryController extends AbstractController
{
    private readonly CategoryRepository $categoryRepo;

    public function __construct(CategoryRepository $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    #[Route('/', name: 'app_home')]
    public function index(CategoryRepository $categoryRepository): Response
    {
        $categories = $this->categoryRepo->findAll();

        return $this->render('category/browse_categories.html.twig', [
            'categories' => $categories,
        ]);
    }

    #[Route(path: '/category/{id}/products', name: 'app_products_by_category')]
    public function product_by_category(Category $category): Response
    {
        return $this->render('product/products_by_category.html.twig', [
            'category' => $category,
        ]);
    }
}
