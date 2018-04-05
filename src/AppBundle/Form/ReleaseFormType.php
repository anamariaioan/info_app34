<?php
/**
 * Created by PhpStorm.
 * User: anamaria.ioan
 * Date: 3/7/2018
 * Time: 10:54 AM
 */

namespace AppBundle\Form;


use AppBundle\Entity\Application;
use AppBundle\Entity\Release;
use AppBundle\Repository\ApplicationRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReleaseFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('nameRelease')
            ->add('descriptionRelease')
            ->add('applicationRelease', EntityType::class, [
                'placeholder' => 'Choose an application',
                'class' => Application::class,
                'mapped' => 'false',
                'choice_label' => 'application',
                'query_builder' => function(ApplicationRepository $repo) {
                    return $repo->createAlphabeticalQueryBuilder();
                }
            ])
            ->add('That`s all? Save', SubmitType::class)
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Release::class
        ]);


    }

}