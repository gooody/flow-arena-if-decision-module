

import { AbstractFlowElements } from 'virtual:AddOnAbstract';
import { WorkflowTypes } from 'virtual:AddOnMiscellaneous';
import img from "../assets/if-decision-logo.png";


export default class IfDecision extends AbstractFlowElements implements WorkflowTypes.FlowArenaMicroservicesInterface 
{
    /**
     * Unique node shape identifier used by @antv/x6 to define 
     * visual representation and behavior.
     */
    static readonly nodeShape = 'IfDecision';

    /**
     * Defines the default number of expansion points available 
     * when the node is initialized.
     */
    readonly defaultNumberOfExpansionPoint:number = 1;
    
    /**
     * Specifies the maximum allowed number of expansion points 
     * that can be added to the node.
     */
    readonly maximumNumberOfExpansionPoint:number = 2;

    /**
     * Specifies the minimum required number of expansion points 
     * that must exist on the node.
     */
    readonly minimumNumberOfExpansionPoint:number = 1;
    
    /**
     * List of required keys that cannot be removed to preserve 
     * essential node configuration.
     */
    protected keyDeletionForbidden = ['if'];

       
    /**
     * Returns the display label used to identify the node within 
     * the UI or workflow editor.
     * @returns string
     */
    protected getLabel():string {
        return 'iF (x)';
    }

    /**
     * Returns the node schema describing its structure, appearance, 
     * and interaction rules in @antv/x6.
     * @returns object
     */
    protected getNodeDefinition()
    {
        return {
            width: 140,
            height: 80,
            markup: [

                { tagName: 'polygon',  selector: 'body', },
                { tagName: 'circle', selector: 'iconBg', },
                { tagName: 'image', selector: 'icon', },
                { tagName: 'text', selector: 'label', },
            ],
            attrs: {
                body: {
                    refPoints: '70,0 140,40 70,80 0,40',
                    fill: '#75f764',
                    stroke: '#00000050',
                    strokeWidth: 2,
                },
                label: {
                    text: this.getLabel(),
                    fontSize: 14,
                    fill: '#000',
                    refX: 70,
                    refY: 40,
                    textAnchor: 'middle',
                    textVerticalAnchor: 'middle',
                },
                iconBg: {
                    cx: 30,
                    cy: 10,
                    r: 18,
                    fill: '#f0f0f0',
                    stroke: '#979797',
                    strokeWidth: 2,
                    pointerEvents: 'none',
                },
                icon: {
                    'xlink:href': img,
                    width: 60,
                    height: 60,
                    x: 0,
                    y: -18,
                    pointerEvents: 'none',
                },
            },
        }
    }    
}

