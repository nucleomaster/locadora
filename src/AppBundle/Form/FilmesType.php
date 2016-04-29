<?php
namespace AppBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class FilmesType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nome')
                ->add('genero', EntityType::class, array(
                    'class' => 'AppBundle:Genero',
                ))
                ->add('lancamento', ChoiceType::class, array(
                    'choices'=>array('Não'=> false, 'Sim'=>true),
                    'expanded'=>true,
                    'multiple'=>false,
                    'data'=>false
                ))
                ->add('sinopse', TextareaType::class, array(
                    'required'=>false
                ))
                ->add('data')
                ->add('capa', FileType::class, array(
                    'required'=>false
                ));                
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Filmes'
        ));
    }

}
