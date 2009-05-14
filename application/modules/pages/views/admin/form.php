<?= form_open($this->uri->uri_string()); ?>
<div class="fieldset fieldsetBlock active tabs">
		<div class="header">
				<? if($this->uri->segment(3,'create') == 'create'): ?>			<h3>Create Page</h3>		<? else: ?>			<h3>Edit Page "<?= $page->title; ?>"</h3>		<? endif; ?>
	</div>
    
    <div class="tabs">
		<ul class="clearfix">
			<li><a href="#fieldset1" title="Write post"><span>Page Content</span></a></li>
			<li><a href="#fieldset2" title="Post date"><span>Meta data</span></a></li>
		</ul>
		
		<!-- Page content tab -->
		<fieldset id="fieldset1" >
			<legend>Page content</legend>
						<div class="field">				<label for="title">Title</label>				<input type="text" id="title" name="title" maxlength="60" value="<?= $page->title; ?>" class="text" />
				<span class="required-icon tooltip">Required</span>			</div>						<div class="field">				<label for="slug">URL</label>				<?=site_url() ?>
				<input type="text" id="slug" name="slug" maxlength="60" size="20" value="<?= $page->slug; ?>" class="text width-10" />
				<span class="required-icon tooltip"></span>				<?=$this->config->item('url_suffix'); ?>
			</div>						<div class="field">				<label for="parent">Parent page</label>				<select name="parent" id="parent" size="1">					<option value="">-- None --</option>					<? create_tree_select($this->data->pages, 0, 0, $page->parent, $page->id); ?>				</select>			</div>
			
			<div class="field">
				<label for="lang">Language</label>
				<?=form_dropdown('lang', $languages, $page->lang); ?>
			</div>						<div class="field width-full">				<label for="body">Content</label>				<?= $this->spaw->show(); ?>			</div>
		</fieldset>

		
		<!-- MEta data tab -->
		<fieldset id="fieldset2" >
			<legend>Page content</legend>
						<div class="field">				<label for="meta_title">Meta title</label>				<input type="text" id="meta_title" name="meta_title" maxlength="255" value="<?= $page->meta_title; ?>" class="text" />			</div>						<div class="field">				<label for="meta_keywords">Meta keywords</label>				<input type="text" id="meta_keywords" name="meta_keywords" maxlength="255" value="<?= $page->meta_keywords; ?>" class="text" />			</div>						<div class="field">				<label for="meta_description">Meta description</label>				<textarea id="meta_description" name="meta_description"><?= $page->meta_description; ?></textarea>			</div>					</fieldset>
		
	</div>	
</div>
<? $this->load->view('admin/layout_fragments/table_buttons', array('buttons' => array('save', 'cancel') )); ?> <?= form_close(); ?>