<?php /* Smarty version 2.6.33, created on 2022-10-02 20:35:37
         compiled from vitals_actions.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'attr', 'vitals_actions.tpl', 1, false),)), $this); ?>
<button class="btn btn-secondary reason-code-btn" data-toggle-container="<?php echo ((is_array($_tmp=$this->_tpl_vars['input'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
_reason_code"><i class="fa fa-asterisk"></i></button>