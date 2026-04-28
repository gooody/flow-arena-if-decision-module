<?php
namespace FlowArenaModule\IfDecision\Handlers;

use App\Common\AddOns\Contracts\HandlerInterface;
use App\Common\AddOns\Contracts\StepProcessingContextInterface;
use Symfony\Component\ExpressionLanguage\ExpressionLanguage;

/**
 * Implements if-else logic to evaluate conditions and determine 
 * the next execution path in the automation workflow.
 * 
 * Class IfDecisionHandler
 * @package FlowArenaModule\IfDecision
 */
class IfDecisionHandler implements HandlerInterface
{
    public function execute(StepProcessingContextInterface $stepProcessingContext) :void
    {
        $el = new ExpressionLanguage();

        $options = $stepProcessingContext->getOptions();
        $data = $stepProcessingContext->getData();

        if ($el->evaluate($options['condition'], $data)) {
            $stepProcessingContext->busPublish( $data, 'if' );
        } else {
            if ( isset($options['useElseClause']) && (int) $options['useElseClause']) {
                $stepProcessingContext->busPublish( $data, 'else' );
            }
        }
    }

}