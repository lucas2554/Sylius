<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Sylius\Bundle\OrderBundle\Form\Type;

use PhpSpec\ObjectBehavior;
use Sylius\Component\Order\Model\OrderInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderStateChoiceTypeSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Sylius\Bundle\OrderBundle\Form\Type\OrderStateChoiceType');
    }

    function it_is_a_form()
    {
        $this->shouldHaveType(AbstractType::class);
    }

    function it_has_option(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'choices' => [
                OrderInterface::STATE_CART => 'sylius.order.state.checkout',
                OrderInterface::STATE_CANCELLED => 'sylius.order.state.cancelled',
                OrderInterface::STATE_FULFILLED => 'sylius.order.state.fulfilled',
            ],
        ])->shouldBeCalled();

        $this->configureOptions($resolver);
    }

    function it_has_parent()
    {
        $this->getParent()->shouldReturn('choice');
    }

    function it_has_name()
    {
        $this->getName()->shouldReturn('sylius_order_state_choice');
    }
}
