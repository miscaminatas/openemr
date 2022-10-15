<?php /* Smarty version 2.6.33, created on 2022-10-02 20:35:37
         compiled from vitals_reason_row.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'attr', 'vitals_reason_row.tpl', 2, false),array('modifier', 'text', 'vitals_reason_row.tpl', 26, false),array('function', 'xlt', 'vitals_reason_row.tpl', 6, false),)), $this); ?>
<!-- Note if you change this id you need to change the vitals_actions.tpl and vitals.js to match -->
<tr id="<?php echo ((is_array($_tmp=$this->_tpl_vars['input'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
_reason_code" class="reasonCodeContainer <?php if (! ( $this->_tpl_vars['vitals']->has_reason_for_column($this->_tpl_vars['input']) )): ?>d-none<?php endif; ?>">
    <td colspan="5" class="border-top-0">
        <div class="card mt-2 mb-4">
            <div class="card-header">
                <?php echo smarty_function_xlt(array('t' => $this->_tpl_vars['title']), $this);?>
 <?php echo smarty_function_xlt(array('t' => 'Reason Information'), $this);?>

            </div>
            <div class="card-body">
                <div class="row">
                    <p class="col">
                        <?php echo smarty_function_xlt(array('t' => "When recording a reason for the value (or absence of a value) of an observation both the reason code and status of the reason are required"), $this);?>

                    </p>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label><?php echo smarty_function_xlt(array('t' => 'Reason Code'), $this);?>
</label>
                        <?php if (isset ( $this->_tpl_vars['vitalDetails'] ) && ! empty ( $this->_tpl_vars['vitalDetails']->get_reason_code() )): ?>
                        <input class="code-selector-popup form-control" placeholder="<?php echo smarty_function_xlt(array('t' => 'Select a reason code'), $this);?>
"
                               name="reasonCode[<?php echo ((is_array($_tmp=$this->_tpl_vars['input'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
]" type="text" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['vitalDetails']->get_reason_code())) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" />
                        <?php else: ?>
                        <input class="code-selector-popup form-control" placeholder="<?php echo smarty_function_xlt(array('t' => 'Select a reason code'), $this);?>
"
                               name="reasonCode[<?php echo ((is_array($_tmp=$this->_tpl_vars['input'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
]" type="text" value="" />
                        <?php endif; ?>

                        <?php if (isset ( $this->_tpl_vars['vitalDetails'] ) && ! empty ( $this->_tpl_vars['vitalDetails']->get_reason_description() )): ?>
                            <p class="code-selector-text-display"><?php echo ((is_array($_tmp=$this->_tpl_vars['vitalDetails']->get_reason_description())) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
</p>
                            <input type="hidden" name="reasonCodeText[<?php echo ((is_array($_tmp=$this->_tpl_vars['input'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
]" class="code-selector-text" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['vitalDetails']->get_reason_description())) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" />
                        <?php else: ?>
                            <p class="code-selector-text-display d-none"></p>
                            <input type="hidden" name="reasonCodeText[<?php echo ((is_array($_tmp=$this->_tpl_vars['input'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
]" class="code-selector-text" value="" />
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6 form-group">
                        <label><?php echo smarty_function_xlt(array('t' => 'Reason Status'), $this);?>
</label>
                        <select name="reasonCodeStatus[<?php echo ((is_array($_tmp=$this->_tpl_vars['input'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
]" class="form-control">
                            <?php $_from = $this->_tpl_vars['reasonCodeStatii']; if (($_from instanceof StdClass) || (!is_array($_from) && !is_object($_from))) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['codeDesc']):
?>
                                <option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['codeDesc']['code'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
"
                                    <?php if (isset ( $this->_tpl_vars['vitalDetails'] ) && $this->_tpl_vars['vitalDetails']->get_reason_status() == $this->_tpl_vars['codeDesc']['code']): ?>
                                        selected
                                    <?php endif; ?>
                                ><?php echo ((is_array($_tmp=$this->_tpl_vars['codeDesc']['description'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
</option>
                            <?php endforeach; endif; unset($_from); ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </td>

    <?php $_from = $this->_tpl_vars['results']; if (($_from instanceof StdClass) || (!is_array($_from) && !is_object($_from))) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['result']):
?>
        <td class="historicalvalues"></td>
    <?php endforeach; endif; unset($_from); ?>
</tr>