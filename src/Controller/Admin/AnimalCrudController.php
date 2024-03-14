<?php

namespace App\Controller\Admin;

use App\Entity\Animal;
use Doctrine\DBAL\Types\FloatType;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class AnimalCrudController extends AbstractCrudController
{
    use Trait\Display;
    public static function getEntityFqcn(): string
    {
        return Animal::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name', "Nom"),
            TextField::new('description'),
            IntegerField::new('lifespan', "Espérance de vie en années"),
            IntegerField::new('weight', "Poids en kg"),
            IntegerField::new('height', "Taille en cm"),
            ChoiceField::new('lifestyle', "Mode de vie")->setChoices([
                'Diurne' => 'diurne',
                'Nocturne' => 'nocturne',
                ])->allowMultipleChoices(false),
            ChoiceField::new('diet', "Régime alimentaire")->setChoices([
                'Carnivore' => 'carnivore',
                'Herbivore' => 'herbivore',
                'Omnivore' => 'omnivore',
                'Autre' => 'autre',
                ])->allowMultipleChoices(false),
            NumberField::new('gestation', "Gestation en mois"),
            UrlField::new('picture', "Image"),
            AssociationField::new('origin', "Origines"),
            AssociationField::new('family', "Famille")
            
        ];
    }
    
}