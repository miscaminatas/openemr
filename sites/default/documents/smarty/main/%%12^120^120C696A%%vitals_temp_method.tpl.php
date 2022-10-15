<?php /* Smarty version 2.6.33, created on 2022-10-02 20:35:37
         compiled from vitals_temp_method.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'xlt', 'vitals_temp_method.tpl', 1, false),)), $this); ?>
<tr><td><?php echo smarty_function_xlt(array('t' => 'Temp Location'), $this);?>
 <small>(LOINC:8327-9)</small><td></td>
    <td class='currentvalues p-2'><select name="temp_method" class="form-control" id='temp_method'><option value=""> </option>
            <option value="Oral"              <?php if ($this->_tpl_vars['vitals']->get_temp_method() == 'Oral' || $this->_tpl_vars['vitals']->get_temp_method() == 2): ?> selected<?php endif; ?>><?php echo smarty_function_xlt(array('t' => 'Oral'), $this);?>

            <option value="Tympanic Membrane" <?php if ($this->_tpl_vars['vitals']->get_temp_method() == 'Tympanic Membrane' || $this->_tpl_vars['vitals']->get_temp_method() == 1): ?> selected<?php endif; ?>><?php echo smarty_function_xlt(array('t' => 'Tympanic Membrane'), $this);?>

            <option value="Rectal"            <?php if ($this->_tpl_vars['vitals']->get_temp_method() == 'Rectal' || $this->_tpl_vars['vitals']->get_temp_method() == 3): ?> selected<?php endif; ?>><?php echo smarty_function_xlt(array('t' => 'Rectal'), $this);?>

            <option value="Axillary"          <?php if ($this->_tpl_vars['vitals']->get_temp_method() == 'Axillary' || $this->_tpl_vars['vitals']->get_temp_method() == 4): ?> selected<?php endif; ?>><?php echo smarty_function_xlt(array('t' => 'Axillary'), $this);?>

            <option value="Temporal Artery"   <?php if ($this->_tpl_vars['vitals']->get_temp_method() == 'Temporal Artery'): ?> selected<?php endif; ?>><?php echo smarty_function_xlt(array('t' => 'Temporal Artery'), $this);?>

        </select></td>
    <td class="editonly"></td>
    <td class="editonly actions">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'vitals_actions.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </td>

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'vitals_historical_values.tpl', 'smarty_include_vars' => array('useMetric' => false,'vitalsValue' => 'get_temp_method','results' => $this->_tpl_vars['results'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</tr>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'vitals_reason_row.tpl', 'smarty_include_vars' => array('input' => $this->_tpl_vars['input'],'title' => $this->_tpl_vars['title'],'vitalDetails' => $this->_tpl_vars['vitals']->get_details_for_column($this->_tpl_vars['input']))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>