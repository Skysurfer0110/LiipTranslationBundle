<?php

namespace Liip\TranslationBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Form to filter the translation list.
 *
 * This file is part of the LiipTranslationBundle. For more information concerning
 * the bundle, see the README.md file at the project root.
 *
 * @version 0.0.1
 *
 * @license http://opensource.org/licenses/MIT MIT License
 * @author David Jeanmonod <david.jeanmonod@liip.ch>
 * @author Gilles Crettenand <gilles.crettenand@liip.ch>
 * @author Sylvain Fankhauser <sylvain.fankhauser@liip.ch>
 * @copyright Copyright (c) 2013, Liip, http://www.liip.ch
 */
class FilterType extends CompatibleAbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $locales = $options['locales'];
        $domains = $options['domains'];

        $builder
            ->add('empty', CheckboxType::class, $this->decorateOption(array(
                'required' => false,
                'label' => 'form.filter.empty',
            ), $options))
            ->add('domain', ChoiceType::class, $this->decorateOption(array(
                'choices' => $domains,
                'multiple' => true,
                'expanded' => true,
                'required' => false,
                'label' => 'form.filter.domain',
            ), $options))
            ->add('languages', ChoiceType::class, $this->decorateOption(array(
                'choices' => $locales,
                'multiple' => true,
                'expanded' => true,
                'required' => false,
                'label' => 'form.filter.locale',
            ), $options))
            ->add('key', TextType::class, $this->decorateOption(array(
                'required' => false,
                'label' => 'form.filter.key',
            ), $options))
            ->add('value', TextType::class, $this->decorateOption(array(
                'required' => false,
                'label' => 'form.filter.value',
            ), $options))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'locales' => [],
            'domains' => [],
        ]);
    }

    public function getName()
    {
        return 'translation_filter';
    }
}
