<?php /* Smarty version 2.6.33, created on 2022-10-09 16:53:39
         compiled from /var/www/html/openemr/templates/documents/general_upload.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'text', '/var/www/html/openemr/templates/documents/general_upload.html', 15, false),array('modifier', 'nl2br', '/var/www/html/openemr/templates/documents/general_upload.html', 15, false),array('modifier', 'attr', '/var/www/html/openemr/templates/documents/general_upload.html', 59, false),array('modifier', 'attr_url', '/var/www/html/openemr/templates/documents/general_upload.html', 71, false),array('function', 'xlt', '/var/www/html/openemr/templates/documents/general_upload.html', 18, false),array('function', 'xla', '/var/www/html/openemr/templates/documents/general_upload.html', 42, false),array('function', 'xl', '/var/www/html/openemr/templates/documents/general_upload.html', 59, false),)), $this); ?>

<form method="post" enctype="multipart/form-data" action="<?php echo $this->_tpl_vars['FORM_ACTION']; ?>
" onsubmit="return top.restoreSession()">
    <input type="hidden" name="MAX_FILE_SIZE" value="64000000" />
    <h3><?php if (! empty ( $this->_tpl_vars['error'] )): ?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['error'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
<?php endif; ?></h3>
    <?php if (( ! ( $this->_tpl_vars['patient_id'] > 0 ) )): ?>
    <div class="text text-danger">
        <?php echo smarty_function_xlt(array('t' => "IMPORTANT: This upload tool is only for uploading documents on patients that are not yet entered into the system. To upload files for patients whom already have been entered into the system, please use the upload tool linked within the Patient Summary screen."), $this);?>

        <br/>
        <br/>
    </div>
    <?php endif; ?>
    <div class="text">
        <?php echo smarty_function_xlt(array('t' => "NOTE: Uploading files with duplicate names will cause the files to be automatically renamed (for example, file.jpg will become file.1.jpg). Filenames are considered unique per patient, not per category."), $this);?>

        <br/>
        <br/>
    </div>
    <div class="text font-weight-bold">
        <?php echo smarty_function_xlt(array('t' => 'Upload Document'), $this);?>
 <?php if ($this->_tpl_vars['category_name']): ?> <?php echo smarty_function_xlt(array('t' => 'to category'), $this);?>
 '<?php echo ((is_array($_tmp=$this->_tpl_vars['category_name'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
'<?php endif; ?>
    </div>
    <div class="text">
        <div class="form-group">
            <p>(<small><?php echo smarty_function_xlt(array('t' => "Multiple files can be uploaded at one time by selecting them using CTRL+Click or SHIFT+Click."), $this);?>
</small>)</p>
            <span><?php echo smarty_function_xlt(array('t' => 'Source File Path'), $this);?>
:</span>
            <input type="file" class="form-control-file" name="file[]" id="source-name" multiple="true" />
        </div>
        <div class="form-group">
            <p>(<small><?php echo smarty_function_xlt(array('t' => "Select below to Zip Directory of image slices."), $this);?>
</small>)</p>
            <input type="file" class="form-control-file" name="dicom_folder[]" id="dicom_folder" multiple directory=""  webkitdirectory="" moxdirectory="" />
        </div>
        <p>
            <span title="<?php echo smarty_function_xla(array('t' => 'Leave Blank To Keep Original Filename'), $this);?>
"><?php echo smarty_function_xlt(array('t' => 'Optional Destination or Dicom Study Name'), $this);?>
:</span>
            <input type="text" class="form-control" name="destination" title="<?php echo smarty_function_xla(array('t' => 'Leave Blank To Keep Original Filename'), $this);?>
" id="destination-name" />
        </p>
        <?php if (! $this->_tpl_vars['hide_encryption']): ?>
        <br />
        <p>
            <span title="<?php echo smarty_function_xla(array('t' => 'Check the box if this is an encrypted file'), $this);?>
"><?php echo smarty_function_xlt(array('t' => "Is The File Encrypted?"), $this);?>
:</span>
            <input type="checkbox" name="encrypted" title="<?php echo smarty_function_xla(array('t' => 'Check the box if this is an encrypted file'), $this);?>
" id="encrypted" />
        </p>
        <p>
            <span title="<?php echo smarty_function_xla(array('t' => 'Pass phrase to decrypt document'), $this);?>
"><?php echo smarty_function_xlt(array('t' => 'Pass Phrase'), $this);?>
:</span>
            <input type="text" class="form-control" name="passphrase" title="<?php echo smarty_function_xla(array('t' => 'Pass phrase to decrypt document'), $this);?>
" id="passphrase" />
        </p>
        <p><i><?php echo smarty_function_xlt(array('t' => 'Supports AES-256-CBC encryption/decryption only.'), $this);?>
</i></p>
        <?php endif; ?>
    </div>
    <p>
        <input type="submit" class="btn btn-primary" value="<?php echo smarty_function_xl(array('t' => ((is_array($_tmp='Upload')) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp))), $this);?>
" />
    </p>

    <input type="hidden" name="patient_id" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['patient_id'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" />
    <input type="hidden" name="category_id" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['category_id'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" />
    <input type="hidden" name="process" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['PROCESS'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" />
</form>

<br /><br />

<!-- Drag and drop uploader -->
<div id="autouploader">
    <form method="post" enctype="multipart/form-data" action="<?php echo $this->_tpl_vars['GLOBALS']['webroot']; ?>
/library/ajax/upload.php?patient_id=<?php echo ((is_array($_tmp=$this->_tpl_vars['patient_id'])) ? $this->_run_mod_handler('attr_url', true, $_tmp) : attr_url($_tmp)); ?>
&parent_id=<?php echo ((is_array($_tmp=$this->_tpl_vars['category_id'])) ? $this->_run_mod_handler('attr_url', true, $_tmp) : attr_url($_tmp)); ?>
&csrf_token_form=<?php echo ((is_array($_tmp=$this->_tpl_vars['CSRF_TOKEN_FORM'])) ? $this->_run_mod_handler('attr_url', true, $_tmp) : attr_url($_tmp)); ?>
" class="dropzone">
        <div class="dz-message" data-dz-message><span><?php echo smarty_function_xlt(array('t' => 'Drop files here to upload'), $this);?>
</span></div>
        <input type="hidden" name="MAX_FILE_SIZE" value="64000000" />
    </form>
</div>

<!-- Section for document template download -->
<form method='post' action='interface/patient_file/download_template.php' onsubmit='return top.restoreSession()'>
    <input type="hidden" name="csrf_token_form" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['CSRF_TOKEN_FORM'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" />
    <input type='hidden' name='patient_id' value='<?php echo ((is_array($_tmp=$this->_tpl_vars['patient_id'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
' />
    <div class='col-sm-6'>
        <p class='text font-weight-bold'><?php echo smarty_function_xlt(array('t' => 'Download document template for this patient and visit'), $this);?>
</p>
        <div class="input-group">
            <span class="input-group-prepend">
                <button type="submit" class="btn btn-primary btn-download"><?php echo smarty_function_xlt(array('t' => 'Fetch'), $this);?>
</button>
            </span>
            <select class="form-control" name='form_filename'><?php echo $this->_tpl_vars['TEMPLATES_LIST']; ?>
</select>
        </div>
    </div>
</form>
<!-- End document template download section -->

<!-- Section for portal document templates -->
<div class='col-sm-6'>
	<p class='text font-weight-bold'><?php echo smarty_function_xlt(array('t' => 'Patient Document Template Forms'), $this);?>
</p>
	<div class="input-group">
		<span class="input-group-prepend">
			<button class="btn btn-primary btn-download" onclick="callTemplateModule()"><?php echo smarty_function_xlt(array('t' => 'Open'), $this);?>
</button>
		</span>
		<select class="form-control" id='template_filename'><?php echo $this->_tpl_vars['TEMPLATES_LIST_PATIENT']; ?>
</select>
	</div>
</div>

<?php if (! empty ( $this->_tpl_vars['file'] )): ?>
	<div class="text font-weight-bold">
		<br/>
		<?php echo smarty_function_xlt(array('t' => 'Uploaded'), $this);?>

	</div>
	<?php $_from = $this->_tpl_vars['file']; if (($_from instanceof StdClass) || (!is_array($_from) && !is_object($_from))) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['file']):
?>
		<div class="text">
			<?php if ($this->_tpl_vars['error']): ?><i><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['error'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</i><br/><?php endif; ?>
			<?php echo smarty_function_xlt(array('t' => 'Name'), $this);?>
: <?php echo ((is_array($_tmp=$this->_tpl_vars['file']->get_name())) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
<br /><br />
		</div>
	<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>