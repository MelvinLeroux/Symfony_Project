<?php

namespace App\Form;

use App\Entity\Animal;
use App\Entity\Family;
use App\Entity\Origin;
use Doctrine\DBAL\Types\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType as TypeTextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnimalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TypeTextType::class,[
                "label"=>'Nom',

            ])
            ->add('lifespan', IntegerType::class,[
                "label"=>"Espérance de vie en mois"
            ])
            ->add('weight', IntegerType::class,[
                "label"=>"Poids en kg"
            ])
            ->add('height', IntegerType::class,[
                "label"=>"Taille en cm"
            ])
            ->add('lifestyle', ChoiceType::class,[
                "label"=>"Mode de vie",
                "choices" => ["diurne" => "diurne",
                    "nocturne" => "nocturne"]
            ])
            ->add('diet', ChoiceType::class,[
                "label"=>"Régime alimentaire",
                "choices" =>[
                    "végétarien" => "végétarien",
                    "omnivore" => "omnivore",
                    "carnivore" => "carnivore"]
            ])
            ->add('picture', UrlType::class,[
                "label" => "Url de l'image"
            ])
            ->add('description', TextareaType::class,[
                "label" => "description"
            ])
            ->add('gestation',IntegerType::class,[
                "label"=>"Durée de gestation"
            ])
            ->add('family', EntityType::class, [
                'class' => Family::class,
                'choice_label' => 'id',
            ])
            ->add('origin', EntityType::class, [
                'class' => Origin::class,
                'choice_label' => 'country',
                'multiple' => true,
                'expanded' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Animal::class,
        ]);
    }
}
