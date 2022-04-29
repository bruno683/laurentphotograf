<?php

namespace App\Controller\Admin;

use DateTime;
use App\Entity\Post;
use App\Entity\User;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PostCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Post::class;
    }


    public function configureFields(string $pageName): iterable
    {
        
            yield IdField::new('id')->onlyOnDetail();
            yield TextField::new('title');
            yield TextareaField::new('content');
            yield TextField::new('author');
            yield ImageField::new('image')->setBasePath('/upload/post')->onlyOnIndex();
            yield TextField::new('imageFile')->setFormType(VichImageType::class)->onlyWhenCreating();
            yield UrlField::new('video')->setFormType(UrlType::class)->setLabel('URL de la video');
            yield BooleanField::new('isPublished');

            
            $createdAt = DateTimeField::new('createdAt')->setFormTypeOptions([
                'html5' => true,
                'years' => range(date('Y'), date('Y') + 5),
                'widget' => 'single_text',
            ]);
            yield $createdAt;
    }
}
