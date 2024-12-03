<?php

namespace App\Form;

use App\Entity\Menu;
use App\Entity\Order;
use App\Entity\Youssef;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('total_price')
            ->add('order_time', null, [
                'widget' => 'single_text',
            ])
            ->add('status')
            ->add('user', EntityType::class, [
                'class' => Youssef::class,
                'choice_label' => 'id',
            ])
            ->add('menu_items', EntityType::class, [
                'class' => Menu::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Order::class,
        ]);
    }
}