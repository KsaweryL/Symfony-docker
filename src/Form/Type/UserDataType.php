<?php
// src/Form/Type/UserData.php
namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use App\Entity\UserData;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

//used when creating from classes
class UserDataType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class,
            ['constraints' => new Length(['min'=>3])])
            ->add('surname', TextType::class,
                [
                 //   'required' => false,      //if we wanted to get rid of necessity of typing surname
                ])
            ->add('age', NumberType::class, )
            ->add('password', TextType::class,
                ['constraints' => new Length(['min'=>3])])
            ->add('checkbox', CheckboxType::class, [
                'label'    => ' ',
                'required' => false,
            ])
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => UserData::class,
        ]);
    }

}