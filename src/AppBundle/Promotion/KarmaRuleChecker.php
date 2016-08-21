<?php

namespace AppBundle\Promotion;

use Sylius\Component\Promotion\Checker\RuleCheckerInterface;
use Sylius\Component\Promotion\Model\PromotionSubjectInterface;
use Sylius\Component\Core\Model\OrderInterface;
use AppBundle\Form\KarmaRuleCheckerType;

class KarmaRuleChecker implements RuleCheckerInterface
{
    public function isEligible(PromotionSubjectInterface $subject, array $configuration)
    {
        if (null === $customer = $subject->getCustomer()) {
            return false;
        }

        return $customer->getKarma() >= $configuration['karma_threshold'];
    }

    /**
     * {@inheritdoc}
     */
    public function getConfigurationFormType()
    {
        return KarmaRuleCheckerType::class;
    }
}
