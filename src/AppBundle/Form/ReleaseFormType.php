<?php
/**
 * Created by PhpStorm.
 * User: anamaria.ioan
 * Date: 3/7/2018
 * Time: 10:54 AM
 */

namespace AppBundle\Form;


use AppBundle\Entity\Application;
use AppBundle\Entity\Team;
use AppBundle\Entity\User;
use AppBundle\Entity\Release;
use AppBundle\Repository\ApplicationRepository;
use AppBundle\Repository\UserRepository;
use AppBundle\Repository\TeamRepository;
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
//            ->add('applicationsInvolved', EntityType::class, [
//                'placeholder' => 'Choose an application',
//                'class' => Application::class,
//                'choice_label' => 'application',
//                'multiple' => true,
//                'query_builder' => function(ApplicationRepository $repo) {
//                    return $repo->createAlphabeticalQueryBuilder();
//                }
//            ])
//            ->add('informedTeams', EntityType::class, [
//                'placeholder' => 'Choose a team',
//                'class' => Team::class,
//                'multiple' => true,
//                'query_builder' => function(TeamRepository $repo) {
//                    return $repo->createAlphabeticalQueryBuilder();
//                }
//             ])
//            ->add('informedUsers', EntityType::class, [
//                'placeholder' => 'Choose an user',
//                'class' => User::class,
//                'multiple' => true,
//                'query_builder' => function(UserRepository $repo) {
//                    return $repo->createAlphabeticalQueryBuilder();
//                }
//            ])
            ->add('Next', SubmitType::class)
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Release::class
        ]);


    }

}