<?php /* Smarty version 2.6.33, created on 2022-10-11 15:23:42
         compiled from /var/www/html/openemr/templates/hl7/general_parse.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'xlt', '/var/www/html/openemr/templates/hl7/general_parse.html', 19, false),array('modifier', 'text', '/var/www/html/openemr/templates/hl7/general_parse.html', 31, false),array('modifier', 'attr', '/var/www/html/openemr/templates/hl7/general_parse.html', 45, false),)), $this); ?>
<form name="prescribe" method="post" onsubmit="return top.restoreSession()">
<!--Example HL7 data<td></tr>
MSH|^~\&|ADT1|CUH|LABADT|CUH|198808181127|SECURITY|ADT^A01|MSG00001|P|2.3|
EVN|A01|198808181122||
PID|||PATID1234^5^M11||RYAN^HENRY^P||19610615|M||C|1200 N ELM STREET^^GREENSBORO^NC^27401-1020|GL|(919)379-1212|(919)271-3434 ||S||PATID12345001^2^M10|123456789|987654^NC|
NK1|JOHNSON^JOAN^K|WIFE||||||NK^NEXT OF KIN
PV1|1|I|2000^2053^01||||004777^FISHER^BEN^J.|||SUR||||ADM|A0|-->

    <div class="form-group">
        <label for="hl7data"><?php echo smarty_function_xlt(array('t' => 'Paste HL7 Data'), $this);?>
</label>
        <textarea class="form-control" rows="10" id="hl7data" name="hl7data"></textarea>
    </div>
    <div class="btn-group">
        <a href="javascript:document.forms[0].submit();" class="btn btn-secondary" onclick="top.restoreSession()">
            <i class="fa fa-play"></i>&nbsp;&nbsp;<?php echo smarty_function_xlt(array('t' => 'Parse HL7'), $this);?>

        </a>
        <a href="javascript:document.forms[0].reset();" class="btn btn-link" onclick="top.restoreSession()">
            <i class="fa fa-times"></i>&nbsp;&nbsp;<?php echo smarty_function_xlt(array('t' => 'Clear HL7 Data'), $this);?>

        </a>
    </div>
    <?php if (isset ( $this->_tpl_vars['hl7_message_err'] )): ?>
        <div class="alert alert-danger"><?php echo ((is_array($_tmp=$this->_tpl_vars['hl7_message_err'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
</div>
    <?php endif; ?>
    <?php if (isset ( $this->_tpl_vars['hl7_array'] )): ?>
      <div class="table-responsive">
          <table class="table">
          <?php $_from = $this->_tpl_vars['hl7_array']; if (($_from instanceof StdClass) || (!is_array($_from) && !is_object($_from))) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['hl7key'] => $this->_tpl_vars['hl7item']):
?>
              <tr height="25"><td colspan="3"><?php echo ((is_array($_tmp=$this->_tpl_vars['hl7key'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
</td></tr>
              <?php $_from = $this->_tpl_vars['hl7item']; if (($_from instanceof StdClass) || (!is_array($_from) && !is_object($_from))) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['segment_name'] => $this->_tpl_vars['segment_val']):
?>
                  <tr><td>&nbsp;</td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['segment_name'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
: </td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['segment_val'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
</td></tr>
              <?php endforeach; endif; unset($_from); ?>
          <?php endforeach; endif; unset($_from); ?>
          </table>
      </div>
    <?php endif; ?>
    <input type="hidden" name="process" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['PROCESS'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" />
</form>