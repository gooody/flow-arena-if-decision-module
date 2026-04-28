<?php

namespace FlowArenaModule\IfDecision;

use App\Common\AddOns\Contracts\ModuleInterface;
use FlowArenaModule\AddonCommon\Abstracts\AbstractModule;


class IfDecisionModule  extends AbstractModule implements ModuleInterface
{        
    /**
     * User-facing addon name displayed in UI and external interfaces.
     * @type string
     */
    protected string $title = "If Decision";

    /**
     * Unique internal addon alias, used system-wide; must not contain spaces.
     * @type string
     */    
    protected string $alias = 'IfDecision';

    /**
     * Programming language in which the addon is implemented and executed.
     * @type string
     */
    protected string $language = "php";
    
    /**
     * Human-readable description explaining what the addon does and its purpose.
     * @type string
     */
    protected string $description = "The 'If Decision' addon directs data flow based on a defined condition, similar to an if/else statement in programming. It evaluates whether the condition is true or false and routes the data accordingly to the appropriate branch. This enables simple yet powerful decision-making in your workflows, helping you control logic paths and handle conditional processing with clarity and flexibility.";
    
    /**
     * Defines addon category/usage context (e.g. decision, trigger, database, termination).
     * @type string
     */
    protected string $blockType = "decision";
    
    /**
     * Path to the TypeScript file defining frontend integration logic.
     * @type string
     */
    protected string $frontServiceProvider = "../resources/js/index.ts";
    
    /**
     * Fully qualified class responsible for processing addon logic.
     * @type string
     */
    protected string $handler = \FlowArenaModule\IfDecision\Handlers\IfDecisionHandler::class;

    /**
     * Returns absolute path to the frontend TypeScript service provider file or null if not set.
     * @return string|null
     */    
    public function getFrontServiceProvider():string|null 
    {
        return $this->relativePath(__DIR__, $this->frontServiceProvider);
    }

}
