<?php

namespace App\Form\reissuevoucher;

use App\Entity\reissuevoucher\Voucher_reissue;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Security;


class Voucher_reissueTypeEdit extends AbstractType
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('reason', ChoiceType::class, [
                'label' => 'Reason',
                'choices' => [
                    'Lost' => 'Lost',
                    'Stolen' => 'Stolen',
                    'Damaged' => 'Damaged',
                    'Other' => 'Other',
                ],
                'expanded' => true,
                'multiple' => false,
                'attr' => ['class' => 'form-check', 'disabled' => true],
            ])
            ->add('name', TextType::class, ['label' => 'Name : ', 'attr' => ['class' => 'form-control', 'readonly' => true]])
            ->add('idNumber', TextType::class, ['label' => 'ID/Passport Number : ','attr' => ['class' => 'form-control', 'readonly' => true],])
            ->add('giftCardNumber', TextType::class, ['label' => 'Gift Card Number : ','attr' => ['class' => 'form-control', 'readonly' => true],])
            ->add('originalIssuingStore', TextType::class, ['label' => 'Original Issuing Store : ','attr' => ['class' => 'form-control', 'readonly' => true],])
            ->add('dateOfPurchase', DateType::class, ['label' => 'Date of Purchase : ','attr' => ['class' => 'form-control', 'disabled' => true ],'widget' => 'single_text','disabled' => true, ])
            ->add('timeOfPurchase', TimeType::class, ['label' => 'Time of Purchase : ','attr' => ['class' => 'form-control', 'readonly' => true],])
            ->add('valueLoadedOnCard', TextType::class, ['label' => 'Value Loaded on Card : ','attr' => ['class' => 'form-control', 'readonly' => true],])
            ->add('furtherDetails', TextareaType::class, ['label' => 'Any Further Details : ','attr' => ['class' => 'form-control', 'readonly' => true],])
            ->add('requestedBy', TextType::class, ['label' => 'Requested By : ','attr' => ['class' => 'form-control', 'readonly' => true],])
            ->add('requestedDate', DateType::class, ['label' => 'Requested Date : ','attr' => ['class' => 'form-control'],'widget' => 'single_text',

                'disabled' => true,])
            ->add('authorizedBy', TextType::class, ['label' => 'Authorized By : ','attr' => ['class' => 'form-control', 'readonly' => true],])
            ->add('sentOutBy', TextType::class, ['label' => 'Sent Out By : ','attr' => ['class' => 'form-control', 'readonly' => true],])
            ->add('authorizedDate', DateType::class, ['label' => 'Authorized Date : ','attr' => ['class' => 'form-control'],'widget' => 'single_text',

                'disabled' => true,])
            ->add('newEvoucherReference', TextType::class, ['label' => 'New eVoucher Reference : ','attr' => ['class' => 'form-control',],])
            ->add('newEvoucherDate', DateType::class, ['label' => 'New eVoucher Date : ','attr' => ['class' => 'form-control'],'widget' => 'single_text',])
            ->add('cardLinkedTo', TextType::class, ['label' => 'Card Linked To : ','attr' => ['class' => 'form-control'],])
            ->add('deliveredTo', TextType::class, ['label' => 'Delivered To : ','attr' => ['class' => 'form-control'],])
            ->add('reject', SubmitType::class, [
                'label' => 'Reject',
                'attr' => ['class' => 'form-control bg-danger',]

            ])
            ->add('sentOut', SubmitType::class, [
                'label' => 'Sent Out',
                'attr' => ['class' => 'form-control bg-info',]
            ])
        ;


            $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
                $form = $event->getForm();


                $isUserAuthenticated = $this->security->isGranted('ROLE_IBST_REPORT');

            
                if ($isUserAuthenticated) {
                    $form->add('approved', SubmitType::class, [
                        'label' => 'Approved',
                        'attr' => ['class' => 'form-control bg-success',]
                    ]);
                }

            });

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Voucher_reissue::class,
            'saveAndSubmit1' => false,
        ]);
    }
}

