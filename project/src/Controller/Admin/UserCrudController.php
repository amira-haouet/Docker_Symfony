<?php

namespace App\Controller\Admin;

use App\Entity\User;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Repository\UserRepository;

use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UserCrudController extends AbstractCrudController
{

    public static function getEntityFqcn(): string
    {
        return User::class;
    }




    #[Route('/API/AllServices/{iduser}', name: 'AllServices', methods: "GET")]

    public function getAllService($idUser)
    {
        $results = $this->getDoctrine()->getRepository(User::class)->Allservices($idUser);
        return new JsonResponse(['data' => $results]);
    }


    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
