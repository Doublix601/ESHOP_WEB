<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\DomCrawler\Field\TextareaFormField;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Vich\UploaderBundle\Form\Type\VichFileType;


class EditProductFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('label', TextType::class, [
                'label' => 'Label'
            ])
            ->add('brand', TextType::class, [
                'label' => 'Marque'
            ])
            ->add('ht_price', IntegerType::class, [
                'label' => 'Prix HT'
            ])
            ->add('tva', IntegerType::class, [
                'label' => 'TVA (%)'
            ])
            ->add('stock', IntegerType::class, [
                'label' => 'Stock'
            ])
            ->add('description_courte', TextareaType::class, [
                'label' => 'Description courte'
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
