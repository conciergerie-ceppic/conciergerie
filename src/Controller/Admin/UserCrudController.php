<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserCrudController extends AbstractCrudController


{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('email'),
            TextField::new('first_name'),
            TextField::new('last_name'),
            TextField::new('password'),
            TextField::new('phone'),
            TextField::new('address'),
            ChoiceField::new('roles')
                ->setChoices([
                    'Utilisateur' => 'ROLE_USER',
                    'Admin' => 'ROLE_ADMIN',
                    'Partenaire' => 'ROLE_PARTNER',
                ])
                ->allowMultipleChoices()
                ->renderExpanded(false),
          
            ImageField::new('avatar')
                ->setUploadDir('public/uploads/avatars/')
                ->setBasePath('uploads/avatars/')
                ->setRequired(false),
        ];
    }
}
