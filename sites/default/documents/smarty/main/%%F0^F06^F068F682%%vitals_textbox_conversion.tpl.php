<?php /* Smarty version 2.6.33, created on 2022-10-02 20:35:37
         compiled from vitals_textbox_conversion.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'attr', 'vitals_textbox_conversion.tpl', 4, false),array('modifier', 'text', 'vitals_textbox_conversion.tpl', 23, false),array('modifier', 'string_format', 'vitals_textbox_conversion.tpl', 38, false),array('modifier', 'default', 'vitals_textbox_conversion.tpl', 41, false),array('modifier', 'xlt', 'vitals_textbox_conversion.tpl', 41, false),array('function', 'xlt', 'vitals_textbox_conversion.tpl', 23, false),)), $this); ?>
<tr class="hide">
    <td>
        <input type="hidden" class="vitals-conv-unit-save-value" id='<?php echo ((is_array($_tmp=$this->_tpl_vars['input'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
_input' name="<?php echo ((is_array($_tmp=$this->_tpl_vars['input'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
"
               value="<?php if (is_numeric ( $this->_tpl_vars['vitals']->{(($_var=$this->_tpl_vars['vitalsValue']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")}() )): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['vitals']->{(($_var=$this->_tpl_vars['vitalsValue']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")}())) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
<?php endif; ?>" />
    </td>
    <?php $_from = $this->_tpl_vars['results']; if (($_from instanceof StdClass) || (!is_array($_from) && !is_object($_from))) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['result']):
?>
        <td class="historicalvalues"></td>
    <?php endforeach; endif; unset($_from); ?>
</tr>

<!-- USA row comes first -->
    <?php if ($this->_tpl_vars['units_of_measurement'] == $this->_tpl_vars['MEASUREMENT_METRIC_ONLY']): ?>
    <tr class="hide">
    <?php else: ?>
    <tr>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['units_of_measurement'] == $this->_tpl_vars['MEASUREMENT_PERSIST_IN_METRIC']): ?>
        <td class="unfocus graph" id="<?php echo ((is_array($_tmp=$this->_tpl_vars['input'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
">
    <?php else: ?>
        <td class="graph" id="<?php echo ((is_array($_tmp=$this->_tpl_vars['input'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
">
    <?php endif; ?>
        <?php echo smarty_function_xlt(array('t' => $this->_tpl_vars['title']), $this);?>
 <?php if (! empty ( $this->_tpl_vars['codes'] )): ?><small>(<?php echo ((is_array($_tmp=$this->_tpl_vars['codes'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
)</small><?php endif; ?>
        </td>
    <?php if ($this->_tpl_vars['units_of_measurement'] == $this->_tpl_vars['MEASUREMENT_PERSIST_IN_METRIC']): ?>
        <td class="unfocus">
    <?php else: ?>
        <td>
    <?php endif; ?>
            <?php echo smarty_function_xlt(array('t' => $this->_tpl_vars['unit']), $this);?>

        </td>
    <?php if ($this->_tpl_vars['units_of_measurement'] == $this->_tpl_vars['MEASUREMENT_PERSIST_IN_METRIC']): ?>
        <td class="valuesunfocus">
    <?php else: ?>
        <td class='currentvalues p-2'>
    <?php endif; ?>
            <input type="text" class="form-control vitals-conv-unit skip-template-editor" size='5' id='<?php echo ((is_array($_tmp=$this->_tpl_vars['input'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
_input_usa'
                   value="<?php if (is_numeric ( $this->_tpl_vars['vitals']->{(($_var=$this->_tpl_vars['vitalsValue']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")}() )): ?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['vitals']->{(($_var=$this->_tpl_vars['vitalsValue']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")}())) ? $this->_run_mod_handler('string_format', true, $_tmp, $this->_tpl_vars['vitalsStringFormat']) : smarty_modifier_string_format($_tmp, $this->_tpl_vars['vitalsStringFormat'])))) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
<?php endif; ?>"
                   data-system="usa" data-unit="<?php echo ((is_array($_tmp=$this->_tpl_vars['unit'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" data-target-input="<?php echo ((is_array($_tmp=$this->_tpl_vars['input'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
_input"
                   data-target-input-conv="<?php echo ((is_array($_tmp=$this->_tpl_vars['input'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
_input_metric"
                   title='<?php echo ((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['vitalsValueUSAHelpTitle'])) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')))) ? $this->_run_mod_handler('xlt', true, $_tmp) : smarty_modifier_xlt($_tmp)); ?>
'/>
        </td>
    <td class="editonly">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'vitals_interpretation_selector.tpl', 'smarty_include_vars' => array('vitalDetails' => $this->_tpl_vars['vitals']->get_details_for_column($this->_tpl_vars['input']))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </td>
    <td class="editonly actions">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'vitals_actions.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </td>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'vitals_historical_values.tpl', 'smarty_include_vars' => array('useMetric' => false,'vitalsValue' => $this->_tpl_vars['vitalsValue'],'vitalsValueMetric' => $this->_tpl_vars['vitalsValueMetric'],'results' => $this->_tpl_vars['results'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </tr>

<!-- Metric row comes second -->
<?php if ($this->_tpl_vars['units_of_measurement'] == $this->_tpl_vars['MEASUREMENT_USA_ONLY']): ?>
    <tr class="hide">
<?php else: ?>
    <tr>
<?php endif; ?>
    <?php if ($this->_tpl_vars['units_of_measurement'] == $this->_tpl_vars['MEASUREMENT_PERSIST_IN_USA']): ?>
        <td class="unfocus graph" id="<?php echo ((is_array($_tmp=$this->_tpl_vars['input'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
_metric">
    <?php else: ?>
        <td class="graph" id="<?php echo ((is_array($_tmp=$this->_tpl_vars['input'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
_metric">
    <?php endif; ?>
        <?php echo smarty_function_xlt(array('t' => $this->_tpl_vars['title']), $this);?>
 <?php if (! empty ( $this->_tpl_vars['codes'] )): ?><small>(<?php echo ((is_array($_tmp=$this->_tpl_vars['codes'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
)</small><?php endif; ?>
        </td>
    <?php if ($this->_tpl_vars['units_of_measurement'] == $this->_tpl_vars['MEASUREMENT_PERSIST_IN_USA']): ?>
        <td class="unfocus">
    <?php else: ?>
        <td>
    <?php endif; ?>
            <?php echo smarty_function_xlt(array('t' => $this->_tpl_vars['unitMetric']), $this);?>

    </td>
    <?php if ($this->_tpl_vars['units_of_measurement'] == $this->_tpl_vars['MEASUREMENT_PERSIST_IN_USA']): ?>
        <td class="valuesunfocus">
    <?php else: ?>
        <td class='currentvalues p-2'>
    <?php endif; ?>
            <!-- Note we intentionally use vitalsValue not vitalValuesMetric because of how data is stored internally -->
            <input type="text" class="form-control vitals-conv-unit skip-template-editor" size='5' id='<?php echo ((is_array($_tmp=$this->_tpl_vars['input'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
_input_metric'
                   value="<?php if (is_numeric ( $this->_tpl_vars['vitals']->{(($_var=$this->_tpl_vars['vitalsValue']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")}() )): ?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['vitals']->{(($_var=$this->_tpl_vars['vitalsValueMetric']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")}())) ? $this->_run_mod_handler('string_format', true, $_tmp, $this->_tpl_vars['vitalsStringFormat']) : smarty_modifier_string_format($_tmp, $this->_tpl_vars['vitalsStringFormat'])))) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
<?php endif; ?>"
                   data-system="metric" data-unit="<?php echo ((is_array($_tmp=$this->_tpl_vars['unit'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" data-target-input="<?php echo ((is_array($_tmp=$this->_tpl_vars['input'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
_input"
                   data-target-input-conv="<?php echo ((is_array($_tmp=$this->_tpl_vars['input'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
_input_usa" />
        </td>
        <td class="editonly">
            <?php if ($this->_tpl_vars['units_of_measurement'] == $this->_tpl_vars['MEASUREMENT_METRIC_ONLY']): ?>
                <!-- we only show the selector if this the only row being displayed -->
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'vitals_interpretation_selector.tpl', 'smarty_include_vars' => array('vitalDetails' => $this->_tpl_vars['vitals']->get_details_for_column($this->_tpl_vars['input']))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <?php endif; ?>
        </td>
        <td class="editonly actions">
            <?php if ($this->_tpl_vars['units_of_measurement'] == $this->_tpl_vars['MEASUREMENT_METRIC_ONLY']): ?>
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'vitals_actions.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <?php endif; ?>
        </td>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'vitals_historical_values.tpl', 'smarty_include_vars' => array('useMetric' => true,'vitalsValue' => $this->_tpl_vars['vitalsValue'],'vitalsValueMetric' => $this->_tpl_vars['vitalsValueMetric'],'results' => $this->_tpl_vars['results'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </tr>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'vitals_reason_row.tpl', 'smarty_include_vars' => array('input' => $this->_tpl_vars['input'],'title' => $this->_tpl_vars['title'],'vitalDetails' => $this->_tpl_vars['vitals']->get_details_for_column($this->_tpl_vars['input']))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>