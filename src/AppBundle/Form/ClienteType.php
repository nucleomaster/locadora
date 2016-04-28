<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
//use \Symfony\Component\Form\Extension\Core\Type\BirthdayType;

//use \Symfony\Component\Form\Extension\Core\Type\TextareaType;
use \Symfony\Component\Form\Extension\Core\Type as FormType;

use Symfony\Component\Validator\Constraints as Assert;//Assert= validação

class ClienteType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome', FormType\TextType::class, array(
                'attr'=> array(
                    'maxlength'=> 200,
                    'min'=> 6
                    )
            ))
                
            //->add('endereco', TextareaType::class)
            ->add('endereco', FormType\TextType::class)
                
            ->add('email', FormType\TextType::class)
                
            //->add('dataNascimento', BirthdayType::class, array(
                
            ->add('dataNascimento', FormType\BirthdayType::class, array(
                'format'=>'ddMMyyyy'//ou dd/MMMM/yyyy
            ))//mudar ordem
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Cliente'
        ));
    }
}
