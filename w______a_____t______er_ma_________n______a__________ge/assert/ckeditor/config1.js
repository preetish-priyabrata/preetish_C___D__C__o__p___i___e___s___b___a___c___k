/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

// CKEDITOR.editorConfig = function( config ) {
// 	// Define changes to default configuration here. For example:
// 	// config.language = 'fr';
// 	// config.uiColor = '#AADC6E';
// };
CKEDITOR.editorConfig = function( config ) {
	// config.extraPlugins = 'uploadfile';
	 // config.extraPlugins = 'jsplus_image';
	config.toolbarGroups = [
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		'/',
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'others', groups: [ 'others' ] },

		{ name: 'about', groups: [ 'about' ] }
	];
	 // config.extraPlugins = 'imageuploader';
	config.removeButtons = 'Form,Checkbox,Radio,TextField,Textarea,Select,Button,HiddenField,Iframe,Maximize,ShowBlocks,About,Source,Save,NewPage,Preview,Print,Templates';
	// config.filebrowserBrowseUrl = '../assert/ckeditor/kcfinder/browse.php?opener=ckeditor&type=files';
 //   config.filebrowserImageBrowseUrl = '../assert/ckeditor/kcfinder/browse.php?opener=ckeditor&type=images';
 //   config.filebrowserFlashBrowseUrl = '../assert/ckeditor/kcfinder/browse.php?opener=ckeditor&type=flash';
 //   config.filebrowserUploadUrl = '../assert/ckeditor/kcfinder/upload.php?opener=ckeditor&type=files';
 //   config.filebrowserImageUploadUrl = '../assert/ckeditor/kcfinder/upload.php?opener=ckeditor&type=images';
 //   config.filebrowserFlashUploadUrl = '../assert/ckeditor/kcfinder/upload.php?opener=ckeditor&type=flash';

};
