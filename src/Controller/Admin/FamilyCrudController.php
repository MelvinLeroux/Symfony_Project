<?php

namespace App\Controller\Admin;

use App\Entity\Family;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class FamilyCrudController extends AbstractCrudController
{
    
    public static function getEntityFqcn(): string
    {
         return Family::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            ChoiceField::new("name", "famille")->setChoices([
                "arthropodes" => "Arthropodes",
                "mollusques" =>"Mollusques",
                "mammifères" => "Mammifères",
                "oiseaux" =>"Oiseaux",
                "poissons" => "Poissons",
                "reptiles" => "Reptiles",
    ])->allowMultipleChoices(false),]; }

}