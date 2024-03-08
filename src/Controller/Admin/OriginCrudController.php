<?php

namespace App\Controller\Admin;

use App\Entity\Origin;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;


class OriginCrudController extends AbstractCrudController
{
    use Trait\Display;

    public static function getEntityFqcn(): string
    {
        return Origin::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            ChoiceField::new("country", "Continent")->setChoices([
                "Afrique" => "Afrique",
                "Amérique" =>"Amérique",
                "Antarctique" => "Antarctique",
                "Asie" =>"Asie",
                "Europe" => "Europe",
                "Océanie" => "Océanie",
    ])->allowMultipleChoices(false),]; }

}
