<?php
/**
 * Created by PhpStorm.
 * User: anamaria.ioan
 * Date: 3/31/2018
 * Time: 7:38 PM
 */

namespace AppBundle\Form;


use AppBundle\Entity\Application;
use AppBundle\Entity\Release;
use AppBundle\Entity\Team;
use AppBundle\Entity\User;
use AppBundle\Repository\ApplicationRepository;
use AppBundle\Repository\TeamRepository;
use AppBundle\Repository\UserRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InformFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('applicationsInvolved', EntityType::class, [
                'placeholder' => 'Choose an application',
                'class' => Application::class,
                'choice_label' => 'application',
                'multiple' => true,
                'query_builder' => function(ApplicationRepository $repo) {
                    return $repo->createAlphabeticalQueryBuilder();
                }
            ])
            ->add('informedTeams', EntityType::class, [
                'placeholder' => 'Choose a team',
                'class' => Team::class,
                'multiple' => true,
                'query_builder' => function(TeamRepository $repo) {
                    return $repo->createAlphabeticalQueryBuilder();
                }
             ])
            ->add('informedUsers', EntityType::class, [
                'placeholder' => 'Choose an user',
                'class' => User::class,
                'multiple' => true,
                'query_builder' => function(UserRepository $repo) {
                    return $repo->createAlphabeticalQueryBuilder();
                }
            ])
            ->add('That`s all? Save', SubmitType::class)
            ;
    }

        public function configureOptions(OptionsResolver $resolver)
    {
//        $resolver->setDefaults([
//            'data_class' => Applica::class
//        ]);
    }

}