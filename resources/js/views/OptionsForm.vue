<script setup lang="ts">
/**
 * ----------------------------------------------------------
 * Imports
 * ----------------------------------------------------------
 */
import { ref, onMounted, CheckboxValue } from 'vue';

/**
 * ----------------------------------------------------------
 * Options
 * ----------------------------------------------------------
 */
defineOptions({
  name: 'OptionsForm'
});


/**
 * ----------------------------------------------------------
 * Props / Emits
 * ----------------------------------------------------------
 */
interface Props {
    addOnUses:any,
}
 
const props = defineProps<Props>();

/**
 * ----------------------------------------------------------
 * State (refs/reactive)
 * ----------------------------------------------------------
 */

const useElseClauseDisabled = ref(<boolean>true);
const IfKeyName = 'if';
const ElseKeyName = 'else';

const form = ref({
    condition:'',
    useElseClause:'0',
});

/**
 * ----------------------------------------------------------
 * Methods
 * ----------------------------------------------------------
 */
const onVueMounted = () => {
    props.addOnUses.getOptions(form.value);
    useElseClauseDisabled.value = !props.addOnUses.isExpansionPointDeletable(ElseKeyName);
}

 
const changeCondition = (condition:string) => {
    props.addOnUses.updateExpansionPoint( IfKeyName, `if( ${condition} )` );
    changeField('condition', condition)
}

const changeElseClause = (e:CheckboxValue) => {
    let result:number = parseInt(e);
    
    if (result) {
        props.addOnUses.createExpansionPoint( ElseKeyName, 'Else' );
    } else {
        props.addOnUses.deleteExpansionPoint( ElseKeyName );
    }
    changeField('useElseClause', `${result}`);
}

const changeField = (field:string, value:string) => {
    props.addOnUses.updateOption( [field], value );
}

/**
 * ----------------------------------------------------------
 * Lifecycle
 * ----------------------------------------------------------
 */
onMounted(onVueMounted)


</script>

<template>
    <b-col>
        <b-row>
            <b-col md="10"  class="mb-2">
                <BFormInput 
                    v-model="form.condition" 
                    @change="changeCondition(form.condition)"
                    placeholder="Enter condition" 
                />
            </b-col>
        </b-row>
        <b-row class="mt-2">
            <b-col md="12">
               <BFormCheckbox
                    v-model="form.useElseClause"
                    name="UseElseClauseCheckbox"
                    value="1"
                    unchecked-value="0"
                    switch
                    @update:model-value="changeElseClause"
                    :disabled="useElseClauseDisabled"
                >
                    Use else clause
                </BFormCheckbox>
            </b-col>
        </b-row>
    </b-col>
</template>
<style lang="scss">


</style>




