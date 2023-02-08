<?php

namespace App\Controller\Admin;

use App\Entity\Patrimony;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PatrimonyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Patrimony::class;
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
