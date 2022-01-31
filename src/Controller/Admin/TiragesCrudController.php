<?php

namespace App\Controller\Admin;

use App\Entity\Tirages;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;

class TiragesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Tirages::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('format'),
            MoneyField::new('prix')->setCurrency('EUR'),
            AssociationField::new('Photo'),
            BooleanField::new('enVente')
        ];
    }
}
