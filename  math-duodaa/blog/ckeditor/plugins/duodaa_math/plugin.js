CKEDITOR.plugins.add( 'duodaa_math', {
    icons: 'duodaa_math',
    init: function( editor ) {
        // Plugin logic goes here...
        editor.addCommand( 'duodaa_math', new CKEDITOR.dialogCommand( 'duodaa_math' ) );
        editor.ui.addButton( 'duodaa_math', {
				    label: '哆嗒公式编辑',
				    command: 'duodaa_math',
				    toolbar: 'insert',
					icon: this.path + 'icons/duodaa_math.png'
				});
				CKEDITOR.dialog.add( 'duodaa_math', this.path + 'dialogs/duodaa_math.js' );
				
    }
});
