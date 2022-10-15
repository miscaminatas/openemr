<?php /* Smarty version 2.6.33, created on 2022-10-02 20:35:37
         compiled from vitals_textbox.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'attr', 'vitals_textbox.tpl', 6, false),array('modifier', 'text', 'vitals_textbox.tpl', 6, false),array('modifier', 'xlt', 'vitals_textbox.tpl', 7, false),array('modifier', 'string_format', 'vitals_textbox.tpl', 12, false),array('function', 'xlt', 'vitals_textbox.tpl', 6, false),)), $this); ?>
<?php if (isset ( $this->_tpl_vars['hide'] ) && $this->_tpl_vars['hide']): ?>
<tr class="hide">
<?php else: ?>
<tr>
<?php endif; ?>
    <td class="graph" id="<?php echo ((is_array($_tmp=$this->_tpl_vars['input'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
"><?php echo smarty_function_xlt(array('t' => $this->_tpl_vars['title']), $this);?>
 <?php if (! empty ( $this->_tpl_vars['codes'] )): ?><small>(<?php echo ((is_array($_tmp=$this->_tpl_vars['codes'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
)</small><?php endif; ?></td>
    <td><?php echo smarty_function_xlt(array('t' => ((is_array($_tmp=$this->_tpl_vars['unit'])) ? $this->_run_mod_handler('xlt', true, $_tmp) : smarty_modifier_xlt($_tmp))), $this);?>
</td>

    <td class='currentvalues p-2'>
        <?php if (isset ( $this->_tpl_vars['vitalsStringFormat'] )): ?>
        <input type="text" class="form-control skip-template-editor" size='5' name='<?php echo ((is_array($_tmp=$this->_tpl_vars['input'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
' id='<?php echo ((is_array($_tmp=$this->_tpl_vars['input'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
_input'
               value="<?php if (is_numeric ( $this->_tpl_vars['vitals']->{(($_var=$this->_tpl_vars['vitalsValue']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")}() )): ?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['vitals']->{(($_var=$this->_tpl_vars['vitalsValue']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")}())) ? $this->_run_mod_handler('string_format', true, $_tmp, $this->_tpl_vars['vitalsStringFormat']) : smarty_modifier_string_format($_tmp, $this->_tpl_vars['vitalsStringFormat'])))) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
<?php endif; ?>"/>
        <?php else: ?>
        <input type="text" class="form-control skip-template-editor" size='5' name='<?php echo ((is_array($_tmp=$this->_tpl_vars['input'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
' id='<?php echo ((is_array($_tmp=$this->_tpl_vars['input'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
_input'
               value="<?php if (is_numeric ( $this->_tpl_vars['vitals']->{(($_var=$this->_tpl_vars['vitalsValue']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")}() )): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['vitals']->{(($_var=$this->_tpl_vars['vitalsValue']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")}())) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
<?php endif; ?>"/>
        <?php endif; ?>

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
$this->_smarty_include(array('smarty_include_tpl_file' => 'vitals_historical_values.tpl', 'smarty_include_vars' => array('useMetric' => false,'vitalsValue' => $this->_tpl_vars['vitalsValue'],'results' => $this->_tpl_vars['results'],'vitalsStringFormat' => $this->_tpl_vars['vitalsStringFormat'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</tr>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'vitals_reason_row.tpl', 'smarty_include_vars' => array('input' => $this->_tpl_vars['input'],'title' => $this->_tpl_vars['title'],'vitalDetails' => $this->_tpl_vars['vitals']->get_details_for_column($this->_tpl_vars['input']))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>